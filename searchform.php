<?php
/**
 * The template for displaying the search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COB_Services
 */

?>
<form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
    <label style="margin-bottom: 0;">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'cob-services' ) ?></span>
        <input type="search" class="search-field form-control" style="font-size:13px;"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'cob-services' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label', 'cob-services' ) ?>" />
    </label>
    <input type="submit" class="search-submit search-submit btn btn-dark" style="font-size:13px;"
        value="<?php echo esc_attr_x( 'Search', 'submit button', 'cob-services' ) ?>" />
</form>
