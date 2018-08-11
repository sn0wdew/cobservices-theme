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
					<h1>Search Results</h1>
					<h2 class="mb-5">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'You searched for: %s', 'cob-services' ), '<span class="badge badge-secondary">' . get_search_query() . '</span>' );
						?>
					</h2>
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
				wp_reset_postdata();

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		wp_reset_postdata();
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
