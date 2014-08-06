<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$post = $wp_query->get_queried_object();
?>

	<h1 class="resource-kit-title"><?php _e( 'Facilitator\'s Guide', 'childfriendlyplaces' ); ?></h1>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content activity-content <?php if ($post->post_name) { echo 'page-' . $post->post_name; } ?>">
		<?php
switch ($post->post_name) {
case 'introduce':
	$facilitator_button = __('What are Child Friendly Places?', 'childfriendlyplaces');
	break;
case 'explore':
	$facilitator_button = __('Community and School Mapping', 'childfriendlyplaces');
	break;
case 'assess':
	$facilitator_button = __('Assessing Your Community and School', 'childfriendlyplaces');
	break;
case 'analyze':
	$facilitator_button = __('Tabulating and Displaying the Results', 'childfriendlyplaces');
	break;
case 'plan':
	$facilitator_button = __('Making an Improvement Plan', 'childfriendlyplaces');
	break;
case 'share':
	$facilitator_button = __('Presenting and Discussing the Results with others', 'childfriendlyplaces');
	break;
case 'act':
	$facilitator_button = __('Classroom Design', 'childfriendlyplaces');
	break;
case 'review':
	$facilitator_button = __('Monitoring and Evaluating the Initiative', 'childfriendlyplaces');
	break;
}
		?>
			<?php if (get_field('facilitators_guide')): ?>
				<a class="activity-facilitator-button <?php echo $post->post_name; ?>" href="<?php echo get_download_url(get_field('facilitators_guide')); ?>"><?php echo $facilitator_button; ?></a>
			<?php endif; ?>
			<?php if ( get_field( 'hours' ) or get_field( 'participants' ) or get_field( 'group_size' ) ): ?>
			<div class="activity-info">
				<ul>
					<?php if ( get_field( 'hours' ) ): ?>
					<li class="activity-info-hours activity-info-item" title="<?php _e( get_field( 'hours_description' ) ); ?>"><?php printf( __( '%s hours', 'childfriendlyplaces' ), get_field( 'hours' ) ); ?></li>
					<?php endif; ?>
					<?php if ( get_field( 'participants' ) ): ?>
					<li class="activity-info-participants activity-info-item" title="<?php _e( get_field( 'participants_description' ) ); ?>"><?php printf( __( '%s participants', 'childfriendlyplaces' ), get_field( 'participants' ) ); ?></li>
					<?php endif; ?>
					<?php if ( get_field( 'group_size' ) ): ?>
					<li class="activity-info-group-size activity-info-item" title="<?php _e( get_field( 'group_description' ) ); ?>"><?php printf( __( 'group size: %s', 'childfriendlyplaces' ), get_field( 'group_size' ) ); ?></li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'childfriendlyplaces' ), 'after' => '</div>' ) ); ?>

			<?php if ( get_field( 'evaluate_url' ) ): ?>
			<div class="activity-evaluate">
				<a href="<?php echo str_replace('(English) ', '', __(get_field( 'evaluate_url' ))); ?>"><?php _e( 'Evaluate this Activity', 'childfriendlyplaces' ); ?></a>
			</div>
			<?php endif; ?>
		</div><!-- .entry-content -->

		<div class="activity-photos">
			<div class="activity-photo">
				<?php the_post_thumbnail(); ?>
			</div>

			<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
			<?php if( $attachments->exist() ): ?>
			<div class="activity-slideshow">
				<div class="flexslider activity-slider">
					<ul class="slides">
						<?php while( $attachments->get() ) : ?>
						<li>
							<?php echo $attachments->image( 'medium' ); ?>
							<span class="slide-title"><?php _e( $attachments->field('title') ); ?></span>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<script type="text/javascript" charset="utf-8">
					jQuery(window).load(function() {
						jQuery('.flexslider').flexslider();
					});
				</script>
			</div>
			<?php endif; ?>
		</div>

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

		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'childfriendlyplaces' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
