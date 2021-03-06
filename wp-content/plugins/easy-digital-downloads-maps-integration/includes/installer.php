<?php

function vp_edd_maps_install()
{
	global $wpdb, $edd_options;

	if(is_null($edd_options))
	{
		$key         = 'edd_settings_misc';
		$edd_options = get_option($key);
	}

	$access_key     = isset( $edd_options['vp_edd_maps_access_key'] )? $edd_options['vp_edd_maps_access_key'] : '';
	$redirect_url   = isset( $edd_options['vp_edd_maps_redirect_url'] )? $edd_options['vp_edd_maps_redirect_url'] : '/tracking/redirect';
	$count_url   = isset( $edd_options['vp_edd_maps_count_url'] )? $edd_options['vp_edd_maps_count_url'] : '/tracking/count';
	$list_url   = isset( $edd_options['vp_edd_maps_list_url'] )? $edd_options['vp_edd_maps_list_url'] : '/tracking/list';

	// Store our page IDs
	$options = array(
		'vp_edd_maps_access_key'  => $access_key,
		'vp_edd_maps_redirect_url'  => $redirect_url,
		'vp_edd_maps_count_url'  => $count_url,
		'vp_edd_maps_list_url'  => $list_url,
	);

	// merge and saving settings
	$misc_settings = get_option('edd_settings_misc');

	if(!is_array($misc_settings))
	{
		$misc_settings = array();
	}

	$misc_settings = array_merge($misc_settings, $options);
	update_option( 'edd_settings_misc', $misc_settings );
}

register_activation_hook(VP_EDD_MAPS_PLUGIN_FILE, 'vp_edd_maps_install');

/**
 * EOF
 */
