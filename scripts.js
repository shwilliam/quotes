/* global wp_vars */

let $fetchBtn
let $activeQuote

jQuery(() => {
  $fetchBtn = jQuery('#btn-fetch-quote')
  $activeQuote = jQuery('#quote-active')

  window.addEventListener('popstate', forceUpdate)

  $fetchBtn.on('click', e => {
    e.preventDefault()
    fetchRandomQuote()
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
      const {content, title, link} = randQuote

      $activeQuote.empty().append(
        `<p>${content.rendered}<p>
        <footer>— ${title.rendered}</footer>`,
      )

      history.pushState({}, '', link)
    })
    .fail(err => console.error(err)) // TODO: show err
}

// fixes back btn when using pushstate
function forceUpdate() {
  window.location = window.location // eslint-disable-line
}
