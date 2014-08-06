<?php
/*
Plugin Name: Easy Digital Downloads - Maps Integration
*/

// setup contants
if( !defined( 'VP_EDD_MAPS_PLUGIN_FILE' ) )
	define( 'VP_EDD_MAPS_PLUGIN_FILE', __FILE__ );

require_once 'includes/notices.php';

/**
 * We need the functions to check for EDD existance, so if it's not loaded, load em.
 */
$edd_slug = 'easy-digital-downloads';

if(!vp_is_plugin_active_from_slug($edd_slug))
{
	if(is_admin())
		// give admin notice
		add_action('admin_notices', 'vp_edd_maps_no_edd_notice');
	else
		// halt plugin in front end
		return;	
}
else
{
	add_action('init'                      , 'vp_edd_maps_add_column');

}

require_once 'includes/installer.php';
// using settings.php as a filename caused an error
require_once 'includes/edd-maps-settings.php';
require_once 'includes/edd-functions.php';
require_once 'includes/shortcodes.php';


function vp_edd_maps_build_download_list_url($did)
{
	global $edd_options;

	$list_url = vp_edd_fd_build_download_list_url($did);
	return $edd_options['vp_edd_maps_redirect_url'] . '/?url=' . urlencode($list_url);
}

/**
 * This block of 3 functions add download counts column in downloads table so that we can track the statistic easier
 * since our free download won't have sales counted.
 */
function vp_edd_maps_add_column()
{
	add_filter( 'manage_edit-download_columns', 'vp_edd_maps_download_columns' );
	add_action( 'manage_download_posts_custom_column'  , 'vp_edd_maps_render_download_columns', 10, 2 );
}

function vp_edd_maps_download_columns( $download_columns ) {
	unset($download_columns['downloads']);

	$downloads        = array('maps_downloads' => __( 'Downloads', 'vp_edd_maps' ));
	$download_columns = array_push_after($download_columns, $downloads, 'sales');

	unset($download_columns['sales']);
	unset($download_columns['price']);
	unset($download_columns['earnings']);
	
	return $download_columns;
}

function vp_edd_maps_render_download_columns( $column_name, $post_id )
{
	// if ( get_post_type( $post_id ) == 'download' )
	// {
		global $edd_options;
		switch ( $column_name) {
			case 'maps_downloads':
				$list_url = vp_edd_fd_build_download_list_url($post_id);
				$count_url = $edd_options['vp_edd_maps_count_url'] . '/?url=' . urlencode($list_url) . '&access_key=' . $edd_options['vp_edd_maps_access_key'];
				$count = file_get_contents($count_url);
				echo '<a href="javascript:vp_edd_maps_visitors(' . $post_id . ');">' . $count . '</a>';
				break;
		}
	// }
}

add_action( 'wp_ajax_vp_edd_maps_visitors', 'vp_edd_maps_visitors' );

function vp_edd_maps_visitors() {
	global $edd_options;

	$did = intval( $_POST['did'] );

	$list_url = vp_edd_fd_build_download_list_url($did);
	$visitors_url = $edd_options['vp_edd_maps_list_url'] . '/?url=' . urlencode($list_url) . '&access_key=' . $edd_options['vp_edd_maps_access_key'];
	$visitors = file_get_contents($visitors_url) or die();

        echo $visitors;

	die(); // this is required to return a proper result
}

add_action( 'admin_footer', 'vp_edd_maps_visitors_javascript' );

function vp_edd_maps_visitors_javascript() {
?>
<script type="text/javascript" >
function vp_edd_maps_visitors(did) {
	var $ = jQuery;
	var data = {
		'action': 'vp_edd_maps_visitors',
		'did': did
	};

	var modal = $('#vp_edd_maps_modal_wrapper');
	if (modal.length == 0) {
		modal = $('<div id="vp_edd_maps_modal_wrapper" style="width: 100%; height: 100%; position: fixed; z-index: 1000; top: 0px;"><div  id="vp_edd_maps_modal" style="position: relative; top: 100px; background: white; border: 1px solid silver; padding: 5px; width: 600px; height: 400px; margin: 0 auto;"><div id="vp_edd_maps_close" style="text-align: right; cursor: pointer;">x</div><div id="vp_edd_maps_modal_content" style="overflow: auto; height: 90%;"></div></div></div>');
		$(document.body).append(modal);
		modal.click(function() { modal.hide(); });
		modal.find('#vp_edd_maps_close').click(function(){ modal.hide(); });
		modal.find('#vp_edd_maps_modal').click(function(event){
			event.stopPropagation();
		});
	}
	
	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	$.post(ajaxurl, data, function(response) {
                visitors = '<table style="width: 100%;"><theader><td>Name</td><td>Email</td><td>Organization</td><td>Country</td><td>Downloaded Date</td></theader>';
                console.log(response);
                for(var i=0; i<response.count; i++) {
			visitors = visitors + '<tr><td><a href="/user/' + response.visits[i].visitorId + '">' + response.visits[i].visitorName + '</a></td><td>' + response.visits[i].visitorEmail + '</td><td>' + response.visits[i].visitorOrganization + '</td><td>' + response.visits[i].visitorCountry + '</td><td>' + response.visits[i].visitedDate + '</td></tr>' 
		}
                visitors = visitors + '</table>';
		modal.find('#vp_edd_maps_modal_content').html(visitors);
		modal.show();
	}, 'json');
};
</script>
<?php
}
/**
 * EOF
 */
