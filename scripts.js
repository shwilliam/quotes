/* global wp_vars */

let $fetchBtn
let $quoteError
let $quoteForm
let $quoteFormSuccess
let $quoteFormError
let $quoteAuthor
let $quoteContent
let $quoteSource
let $quoteUrl
let $activeQuote

jQuery(() => {
  $activeQuote = jQuery('#quote-active')
  $quoteError = jQuery('#quote__error-msg')
  $fetchBtn = jQuery('#quote__fetch-btn')
  $quoteForm = jQuery('#quote__form')
  $quoteFormSuccess = jQuery('#quote__form-success-msg')
  $quoteFormError = jQuery('#quote__form-error-msg')
  $quoteAuthor = $quoteForm.find('#quote__author')
  $quoteContent = $quoteForm.find('#quote__content')
  $quoteSource = $quoteForm.find('#quote__source')
  $quoteUrl = $quoteForm.find('#quote__url')

  window.addEventListener('popstate', forceUpdate)

  $fetchBtn.on('click', e => {
    e.preventDefault()
    fetchRandomQuote()
  })

  $quoteForm.on('submit', e => {
    e.preventDefault()
    submitQuote({
      title: $quoteAuthor.val(),
      content: $quoteContent.val(),
      _qod_quote_source: $quoteSource.val(),
      _qod_quote_source_url: $quoteUrl.val(),
      status: 'pending',
    })
  })
})

function fetchRandomQuote() {
  return jQuery
    .ajax({
      url: `${wp_vars.rest_url}posts?filter[orderby]=rand&filter[posts_per_page]=1`,
      beforeSend: xhr =>
        xhr.setRequestHeader('X-WP-Nonce', wp_vars.wpapi_nonce),
    })
    .success(res => {
      const randQuote = res[0]
      const {
        content,
        title,
        link,
        _qod_quote_source: source,
        _qod_quote_source_url: sourceUrl,
      } = randQuote

      $activeQuote.empty().append(
        `<p>${content.rendered}<p>
        <footer>
          — ${title.rendered}
          ${
            source
              ? `, <cite class="quote__cite">
                <a href="${sourceUrl}" target="_blank" rel="noopener noreferrer">
                  ${source}
                </a>
              </cite>`
              : ''
          }
        </footer>`,
      )

      history.pushState({}, '', link)
    })
    .success(() => {
      $quoteError.hide()
    })
    .error(() => {
      $quoteError.show()
    })
}

function submitQuote(payload) {
  return jQuery
    .ajax({
      url: `${wp_vars.rest_url}posts`,
      method: 'POST',
      data: payload,
      beforeSend: xhr =>
        xhr.setRequestHeader('X-WP-Nonce', wp_vars.wpapi_nonce),
    })
    .success(() => {
      $quoteFormSuccess.show()
      $quoteFormError.hide()
      $quoteAuthor.val('')
      $quoteContent.val('')
      $quoteSource.val('')
      $quoteUrl.val('')
    })
    .error(() => {
      $quoteFormError.show()
    })
}

// navigates to appropriate url on history navigation
function forceUpdate() {
  window.location = window.location // eslint-disable-line
}
