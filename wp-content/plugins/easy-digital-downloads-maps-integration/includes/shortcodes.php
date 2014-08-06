<?php

/**
 * Output free download URL
 */
function vp_edd_maps_download_shortcode( $atts, $content = null ) {
	global $post, $edd_options;

	$button_text  = (isset($edd_options['vp_edd_fd_button_text']) and $edd_options['vp_edd_fd_button_text'] !== '') ? $edd_options['vp_edd_fd_button_text'] : __('Download', 'vp_edd_fd');
	$button_class = (isset($edd_options['vp_edd_fd_button_class']) and $edd_options['vp_edd_fd_button_class'] !== '') ? $edd_options['vp_edd_fd_button_class'] : __('edd-fd-button', 'vp_edd_fd');

	extract( shortcode_atts( array(
			'id' 	=> $post->ID,
			'text'  => $button_text,
			'class' => $button_class,
		),
		$atts )
	);

	$download = edd_get_download( $id );
	$text     = str_replace('%name%', $download->post_title, $text);

	if ( $download )
	{
		return '<a href="'.vp_edd_maps_build_download_list_url($id).'" class="' . $class .'">' . $text . '</a>';
	}
}
add_shortcode( 'download_link', 'vp_edd_maps_download_shortcode' );

