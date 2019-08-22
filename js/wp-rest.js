/* global wp_vars */

// eslint-disable-next-line
;(() => {
  const $activeQuote = jQuery('#quote-active')
  const $quoteError = jQuery('#quote__error-msg')
  const $fetchBtn = jQuery('#quote__fetch-btn')
  const $quoteForm = jQuery('#quote__form')
  const $quoteFormSuccess = jQuery('#quote__form-success-msg')
  const $quoteFormError = jQuery('#quote__form-error-msg')
  const $quoteAuthor = $quoteForm.find('#quote__author')
  const $quoteContent = $quoteForm.find('#quote__content')
  const $quoteSource = $quoteForm.find('#quote__source')
  const $quoteUrl = $quoteForm.find('#quote__url')

  // force hard refresh on browser 'back'
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

        $quoteError.hide()
        $activeQuote.empty().append(
          `<p>${content.rendered}<p>
        <footer class="quote__footer">
          — ${title.rendered}
          ${
            source && sourceUrl
              ? `, <cite class="quote__cite">
                <a href="${sourceUrl}" target="_blank" rel="noopener noreferrer">
                  ${source}
                </a>
              </cite>`
              : source
              ? `, <cite class="quote__cite">
                    ${source}
                  </cite>`
              : ''
          }
        </footer>`,
        )

        history.pushState({}, '', link)
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
})()
