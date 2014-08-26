<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php if ( get_field( 'supporting_tools' ) or get_field( 'background_material' ) ): ?>
			<section class="activity-downloads">
				<?php if ( get_field( 'supporting_tools' ) ): ?>
				<div class="activity-supporting-tools">
					<h1><?php _e( 'Supporting Tools', 'childfriendlyplaces' ); ?></h1>
					<ul>
					<?php foreach ( get_field( 'supporting_tools' ) as $download ): ?>
						<li class="activity-download <?php echo get_download_filetype( $download ); ?>">
							<a class="activity-download-title" href="<?php echo get_download_url( $download ); ?>"><?php _e( $download->post_title ); ?></a>
							<div class="activity-download-description"><?php _e( $download->post_content ); ?></div>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>

				<?php if ( get_field( 'background_materials' ) ): ?>
				<div class="activity-background-materials">
					<h1><?php _e( 'Background Materials', 'childfriendlyplaces' ); ?></h1>
					<ul>
					<?php foreach ( get_field( 'background_materials' ) as $download ): ?>
						<li class="activity-download <?php echo get_download_filetype( $download ); ?>">
							<a class="activity-download-title" href="<?php echo get_download_url( $download ); ?>"><?php _e( $download->post_title ); ?></a>
							<div class="activity-download-description"><?php _e( $download->post_content ); ?></div>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</section>
			<?php endif; ?>

			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
