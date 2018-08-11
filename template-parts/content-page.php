<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COB_Services
 */

?>

<?php if(!is_search()): ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php cob_services_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cob-services' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'cob-services' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php else:

  // Check if page has the 'Single Form Page' template
	if( get_page_template_slug() == "templates/singleform.php" ) :
	?>

	<article class="col-sm-12 col-md-6">
		<header>
			<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), ' <i class="fa fas fa-file"></i></a></h2>' ); ?>
		</header><!-- .entry-header -->
	</article><!-- #post-<?php the_ID(); ?> -->

<?php else: //if template file doesn't match ?>
	<article class="col-sm-12 col-md-6">
		<header>
			<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), ' <i class="fa fas fa-link"></i></a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt();?>
		</div><!-- .entry-summary -->
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>


<?php endif; ?>
