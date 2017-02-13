<?php
/**
 * The search form for the theme and search widget
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Underscores_HTML
 */

?>
 <form role=" search" action="/" method="get" class="search-form form-inline">
  <div class="form-group">
    <label for="search">
      <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    </label>
    <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" id="search" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  </div>
  <input type="submit" class="search-submit btn-btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
</form>
