<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<?php

?>

	<div class="container mb-5">
		<?php if( ! is_singular( 'product' )): ?>
		<div class="row justify-content-center text-center">
			<h1 class="w-100"><?php echo get_the_title('258'); ?></h1>
			<div class="col-12 col-md-6">
				<h2>Thank you for shopping with CoB Services. Please have your account number on-hand before going to check-out.</h2>
			</div>

		</div>
	<?php endif; ?>
		<div class="row mt-4 mb-2"><div class="col"><?php woocommerce_breadcrumb(); ?></div></div>
		<div class="row w-100 mb-2"><?php wc_print_notices(); ?></div>
		<div class="row">

			<?php if(! is_singular( 'product' )): ?>
				<div class="col-12 col-lg-2">
					<?php get_sidebar(); ?>
				</div>
				<main class="col-12 col-lg-10">

			<?php endif;

				if ( is_singular( 'product' ) ) {

					 while ( have_posts() ) :
							 the_post();
							 wc_get_template_part( 'content', 'single-product' );
					 endwhile;

			 } else if( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>
				<?php endif;

				if ( woocommerce_product_loop() ) {
					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked wc_print_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );
					woocommerce_product_loop_start();
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
							wc_get_template_part( 'content', 'product' );
						}
					}
					woocommerce_product_loop_end();
					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				?>
			<?php (!is_singular( 'product' )) ? '</main>' : '' ?><!-- #main -->
		</div><!-- .row -->
	</div><!-- #container -->

<?php
get_footer();
?>
