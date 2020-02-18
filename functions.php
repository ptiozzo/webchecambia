<?php

//remove version
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


/*  Include Styles & Script
/* ------------------------------------ */
if ( ! function_exists( 'wcc_styles_scripts' ) ) {
	function wcc_style_scripts() {

		wp_enqueue_style( 'wcc-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'wcc-swup-css', get_template_directory_uri().'/assets/swup/swup.css');
		wp_enqueue_style( 'wcc', get_template_directory_uri().'/style.css');

		wp_enqueue_script('jquery');

		wp_enqueue_script( 'wcc-popper-js', get_template_directory_uri().'/assets/js/popper.min.js','','',true);
		wp_enqueue_script( 'wcc-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js','','',true);
		wp_enqueue_script( 'wcc-swup-js', get_template_directory_uri().'/assets/swup/swup.min.js','','',true);
		wp_enqueue_script( 'wcc-swupScrollPlugin-js', get_template_directory_uri().'/assets/swup/SwupScrollPlugin.min.js','','',true);
		wp_enqueue_script( 'wcc-swupFormsPlugin-js', get_template_directory_uri().'/assets/swup/SwupFormsPlugin.min.js','','',true);
		wp_enqueue_script( 'wcc-swupGaPlugin-js', get_template_directory_uri().'/assets/swup/SwupGaPlugin.min.js','','',true);
		wp_enqueue_script( 'wcc-swupScriptsPlugin-js', get_template_directory_uri().'/assets/swup/SwupScriptsPlugin.min.js','','',true);
		wp_enqueue_script( 'wcc-swup-custom-js', get_template_directory_uri().'/assets/swup/script.js','','',true);
		wp_enqueue_script( 'wcc-fontawsome-js', '//kit.fontawesome.com/befb91387f.js','','',true);
	}
}
add_action( 'wp_enqueue_scripts', 'wcc_style_scripts' );

/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'wcc_setup' ) ) {
	function wcc_setup() {
		add_theme_support( "title-tag" );
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		// Enable featured image
		add_theme_support( 'post-thumbnails' );

		// Custom menu areas
		register_nav_menus( array(
			'menu-principale' => esc_html__( 'Menu principale', 'wcc' ),
			'menu-social' => esc_html__( 'Menu social', 'wcc' ),
			'menu-footer' => esc_html__( 'Menu footer', 'wcc' ),
		) );
	}
}
add_action( 'after_setup_theme', 'wcc_setup' );
require_once('assets/bs4navwalker.php');


if ( ! function_exists( 'wcc_sidebars' ) ) {
	function wcc_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'wcc' ),'id' => 'primary','description' => esc_html__( 'Sidebar homepage non visualizzata su mobile', 'wcc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}
add_action( 'widgets_init', 'wcc_sidebars' );

/*
* Add Response code to video embeds in WordPress
*
* @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
*/
function abl1035_alx_embed_html( $html ) {

 return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'abl1035_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'abl1035_alx_embed_html' ); // Jetpack



?>
