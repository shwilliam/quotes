<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
  <input type="search" class="input" placeholder="SEARCH ..." value="<?= esc_attr(get_search_query()); ?>" name="s" title="Search" />
  <button class="button button--icon">
    <span class="screen-reader-text">Search</span>
    <i class="fa fa-search" aria-hidden="true"></i> 
  </button>
</form>
