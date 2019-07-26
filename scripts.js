/* global wp_vars */

jQuery(() => {
  jQuery.ajax({
    url: `${wp_vars.rest_url}posts`, 
    beforeSend: function(xhr) {
      xhr.setRequestHeader('X-WP-Nonce', wp_vars.wpapi_nonce)
    }
  }).success(res => {
    const posts = res 
    const randIndex = getRandIndex()

    // initial post
    console.log(posts[randIndex], randIndex)
    // TODO: show in dom 

    jQuery('#btn-fetch-quote').on('click', e => {
      e.preventDefault()
      const nextRandIndex = getRandIndex()

      // next post
      console.log(posts[nextRandIndex])
      // TODO: replace prev post
      
    })
  }).fail(err => console.error(err)) // TODO: show err
})

function getRandIndex() {
  return Math.floor(Math.random() * wp_vars.posts_amount)
}
