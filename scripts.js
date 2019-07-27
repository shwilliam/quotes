/* global wp_vars */

jQuery(() => {
  // fetch initial quote
  fetchRandomQuote()

  jQuery('#btn-fetch-quote').on('click', e => {
    e.preventDefault()
    fetchRandomQuote()
  })
})

function fetchRandomQuote() {
  return jQuery
    .ajax({
      url: `${wp_vars.rest_url}posts?filter[orderby]=rand&filter[posts_per_page]=1`,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', wp_vars.wpapi_nonce)
      },
    })
    .success(res => {
      console.log(res) // TODO: show in dom
    })
    .fail(err => console.error(err)) // TODO: show err
}
