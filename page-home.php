<?php
/**
 * The home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

get_header();
?>

<!-- Home Feature Section -->

<div class="home-feature" style="background-image: url( <?php echo get_theme_mod('cob-services-hf-image') ?> ) ">
    <div class="home-feature-wrapper container">
        <div class="row no-gutters">
            <div class="col-md-7">
                <h1><?php echo get_theme_mod('cob-services-hf-headline') ?></h1>
                <h2><?php echo get_theme_mod('cob-services-hf-subline') ?></h2>
                <form class="home-feature-form" action="#">
                    <input class="btn btn-outline-dark" type="button"
                           value="<?php echo get_theme_mod('cob-services-hf-button') ?>"
                           onclick="window.location.href='<?php echo get_permalink(get_theme_mod('cob-services-hf-link')) ?>'" />
                </form>
            </div>
        </div>
    </div>
</div>



	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
