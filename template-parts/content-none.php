<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<header class="row">
	<div class="col">
		<h1>Search Results</h1>
		<h2 class="">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'You searched for: %s', 'cob-services' ), '<span class="badge badge-secondary">' . get_search_query() . '</span>' );
			?>
		</h2>
	</div>
</header><!-- .page-header -->


<section class="col">
	<div class="page-content">
		<div class="alert alert-info" role="alert">
			<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cob-services' ); ?>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
