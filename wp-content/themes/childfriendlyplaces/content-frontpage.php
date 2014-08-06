<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<h1 class="resource-kit-title"><?php _e( 'Resource Kit', 'childfriendlyplaces' ); ?> <span class="resource-kit"><?php _e( 'Overview', 'childfriendlyplaces' ); ?></span></h1>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry-content activity-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'childfriendlyplaces' ), 'after' => '</div>' ) ); ?>

		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'childfriendlyplaces' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
