<?php

add_filter('show_admin_bar', '__return_false');

function cfp_setup() {
	load_theme_textdomain( 'childfriendlyplaces', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'cfp_setup' );

function get_translated ( $content ) {
	if ( function_exists( 'qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage' ) ) {
		return qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage( $content );
	}

	return $content;
}

function get_download_url ( $download ) {
	$url = '';
	if ( function_exists( 'vp_edd_maps_build_download_list_url' ) ) {
		$list_url = vp_edd_maps_build_download_list_url( $download->ID );
	} else {
		$list_url = vp_edd_fd_build_download_list_url( $download->ID );
	}
	$lang = qtrans_getLanguage();
	foreach ( get_download_files( $download ) as $file ) {
		if ( strpos( $file['name'], $lang ) === 0 ) {
			$url = get_download_file_url( $download, $file );
		}
	}

	/* Found no specific file to download, so display the download list. */
	if ( $url == '' ) {
		$url = $list_url;
	}

	return $url;
}

function get_download_files ( $download ) {
	$files = edd_get_download_files( $download->ID );
	return $files;
}

function get_download_file_url ( $download, $file ) {
	$file_id = array_search( $file, get_download_files( $download ) );
	return vp_edd_fd_build_download_gateway_url( $download->ID, $file_id );
}

function get_file_extension ( $path ) {
	return strtolower( pathinfo( $path, PATHINFO_EXTENSION ) );
}

function get_download_file_extension ( $download ) {
	$files = get_download_files( $download );
	$extension = '';
	if ( $files ) {
		$file = $files[0];
		$extension = get_file_extension( $file['file'] );
	}
	return $extension;
}

function get_download_filetype ( $download ) {
	$extension = get_download_file_extension ( $download );
	switch ( $extension ) {
	case 'pdf':
		return 'pdf';
	case 'doc':
	case 'docx':
	case 'odt':
		return 'word';
	case 'ppt':
	case 'pptx':
	case 'pps':
	case 'ppsx':
	case 'odp':
		return 'powerpoint';
	case 'xls':
	case 'xlsx':
	case 'ods':
		return 'excel';
	case 'png':
	case 'jpg':
	case 'gif':
	case 'tiff':
		return 'image';
	case 'zip':
	case 'rar':
	case 'gz':
	case 'tgz':
		return 'zip';
	default:
		return 'text';
	}
}

function my_scripts() {
	wp_enqueue_script(
		'flexslider',
		get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js',
		array( 'jquery' ),
		'2.1'
	);
	wp_register_style(
		'flexslider',
		get_stylesheet_directory_uri() . '/inc/flexslider.css',
		array(),
		'2.2',
		'all'
	);
	wp_enqueue_style( 'flexslider' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

function attachments( $attachments ) {
	$fields = array(
		array(
			'name'      => 'title',                         // unique field name
			'type'      => 'text',                          // registered field type
			'label'     => __( 'Title', 'attachments' ),    // label to display
			'default'   => 'title',                         // default value upon selection
		)
	);

	$args = array(
		// title of the meta box (string)
		'label'         => __( 'Slideshow', 'childfriendlyplaces' ),
		// all post types to utilize (string|array)
		'post_type'     => array( 'page' ),
		// meta box position (string) (normal, side or advanced)
		'position'      => 'normal',
		// meta box priority (string) (high, default, low, core)
		'priority'      => 'high',
		// allowed file type(s) (array) (image|video|text|audio|application)
		'filetype'      => null,  // no filetype limit
		// include a note within the meta box (string)
		'note'          => __( 'Add photos here', 'childfriendlyplaces' ),
		// by default new Attachments will be appended to the list
		// but you can have then prepend if you set this to false
		'append'        => true,
		// text for 'Attach' button in meta box (string)
		'button_text'   => __( 'Add Photo', 'childfriendlyplaces' ),
		// text for modal 'Attach' button (string)
		'modal_text'    => __( 'Add', 'childfriendlyplaces' ),
		// which tab should be the default in the modal (string) (browse|upload)
		'router'        => 'browse',
		// fields array
		'fields'        => $fields,
	);
	$attachments->register( 'attachments', $args ); // unique instance name
}
add_action( 'attachments_register', 'attachments' );
?>
