<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package COB_Services
 */

get_header();
?>

	<section id="primary" class="container">
		<main id="main" class="site-main">

		<?php

		 if ( have_posts() ) : ?>

			<header class="row">
				<div class="col">
					<h1>
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'cob-services' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</div>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				echo '<div class="row border-bottom">';

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

				echo '</div>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		wp_reset_postdata();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
