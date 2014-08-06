<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<?php
$post = $wp_query->get_queried_object();
$post_name = '';
if ($post->post_name) { $post_name = 'page-' . $post->post_name; }
?>
<body <?php body_class($post_name); ?>>
<header id="masthead" class="site-header" role="banner">
	<hgroup class="site-title-container">
		<h1 class="site-title"><a href="/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="site-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="Logo"><div class="site-title-text"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-text.png" atl="<?php bloginfo( 'name' ); ?>"></div></a></h1></hgroup><nav id="site-navigation" class="main-navigation" role="navigation">
		<h3 class="menu-toggle"><?php _e( 'Menu', 'childfriendlyplaces' ); ?></h3>
		<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'childfriendlyplaces' ); ?>"><?php _e( 'Skip to content', 'childfriendlyplaces' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
	</nav><!-- #site-navigation -->

	<?php $lang_param = (qtrans_getLanguage() == 'en') ? "" : ("?lang=" . qtrans_getLanguage()); ?>

	<div class="main-links">
		<ul>
		<li class="main-link-about"><a href="<?php echo esc_url_raw( home_url( '/about/' . $lang_param ) ); ?>"><?php _e("About", 'childfriendlyplaces'); ?></a>
		</li><li class="main-link-resource-kit"><a href="<?php echo esc_url( home_url( '/' . $lang_param ) ); ?>"><?php _e("Resource Kit", 'childfriendlyplaces'); ?></a>
		</li><li class="main-link-case-studies"><a href="/project/2"><?php _e("Case Studies", 'childfriendlyplaces'); ?></a>
		</li><li class="main-link-maps"><a href="/project/"><?php _e("Maps", 'childfriendlyplaces'); ?></a>
		</li><li class="main-link-collaborate"><a href="<?php echo esc_url( home_url( '/collaborate/' . $lang_param ) ); ?>"><?php _e("Collaborate", 'childfriendlyplaces'); ?></a></li>
		</ul>
	</div>

	<!--
	<div class="search-box">
		<?php include (get_stylesheet_directory() . '/searchform.php'); ?>
	</div>
	-->
	<ul class="language_selector">
		<li><a><?php echo(qtrans_getLanguage()); ?> ▾</a>
		<?php qtrans_generateLanguageSelectCode('text'); ?>
		</li>
	</ul>

</header><!-- #masthead -->
<div id="page" class="hfeed site">

	<div id="main" class="wrapper">
