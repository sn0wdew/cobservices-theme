<?php
/**
 * Template part for displaying Featured Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<div class="card mx-auto w-100">
    <div class="card-body">
        <img class="float-left" src="<?php echo esc_attr(get_avatar_url(get_the_author_meta('ID'), array('size' => 56))); ?>">
        <div class="float-left">
            <div style="height:56px" class="table">
                <div class="table-cell">
                    <h3 class="card-title"><?php echo esc_attr(get_the_author_meta('display_name')); ?></h3>
                    <p class="h4 card-subtitle text-muted"><?php echo esc_attr(get_the_date('F jS, Y')); ?></p>
                </div><!-- .table-cell -->
            </div><!-- .table -->
        </div><!-- .float-left -->

        <div class="clearfix"></div>
        <p class="card-text h2"><?php echo strip_tags(get_the_content()); ?></p>
    </div><!-- .card-body -->
</div><!-- .card .mx-auto .w-100 -->
