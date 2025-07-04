<?php
//Register theme support
function bwp_theme_support() {
	add_theme_support('post-thumbnails');
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'bwp_theme_support');

function gg_gfonts_prefetch() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>';
  echo '<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>';  
 }
 add_action( 'wp_head', 'gg_gfonts_prefetch' );

//Register stylesheets
function bwp_register_styles() {
	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version, false);
	wp_enqueue_style('funnel-fonts-css', 'https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swapp', array(), $theme_version, false);
	wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version, false);
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/css/slick.css', array(), $theme_version, false);
}
add_action('wp_enqueue_scripts', 'bwp_register_styles');


//Register scripts
function bwp_register_scripts() {
	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_script( 'boot', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), $theme_version, false);
	wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, false);
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), $theme_version, false);
}
add_action('wp_enqueue_scripts', 'bwp_register_scripts');

//Register Menus
function bwp_menus() {
	$locations = array(
		'header'				=> __('Header Menu',	'bwp'),
		'header_mobile'			=> __('Header - Mobile',	'bwp'),
		'footer_nav_1'			=> __('Footer Nav 1',	'bwp'),
		'footer_nav_2'			=> __('Footer Nav 2',	'bwp')
	);

	register_nav_menus($locations);
}
add_action( 'init', 'bwp_menus' );



// Register widget areas
function register_bwp_sidebars(){
	register_sidebar( array(
		'name'			=> 'Footer company info',
		'id'			=> 'footer_company_info',
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
	));
	register_sidebar( array(
		'name'			=> 'Footer Nav 1',
		'id'			=> 'footer_nav_1',
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	));
	register_sidebar( array(
		'name'			=> 'Footer Nav 2',
		'id'			=> 'footer_nav_2',
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>',
	));
	register_sidebar( array(
		'name'			=> 'Footer contact info',
		'id'			=> 'footer_contact_info',
		'before_widget'	=> '<div>',
		'after_widget'	=> '</div>',
	));
}
add_action('widgets_init', 'register_bwp_sidebars');



// Enable svg support
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4 );
	
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
	function fix_svg() {
	echo '<style type="text/css">
			.attachment-266x266, .thumbnail img {
				width: 100% !important;
				height: auto !important;
			}
			</style>';
	}
add_action( 'admin_head', 'fix_svg' );


// Clear pre fill customer details bug
add_filter('woocommerce_checkout_get_value','__return_empty_string', 1, 1);


//Theme Options
if(function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

//Register blocks
function register_acf_block_types() {


	// Two Column Content With Stats
	acf_register_block_type(array(
		'name'				=> 'card-overlapping-cards',
		'title'				=> __('Overlapping Cards'),
		'description'		=> __('Overlapping Cards'),
		'render_template'	=> 'template-parts/blocks/card-overlapping-cards.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Highlighted Text
	acf_register_block_type(array(
		'name'				=> 'card-highligted-text',
		'title'				=> __('Scrollable Highlighted Text'),
		'description'		=> __('Scrollable Highlighted Text'),
		'render_template'	=> 'template-parts/blocks/card-highlighted-text.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Grid
	acf_register_block_type(array(
		'name'				=> 'card-grid',
		'title'				=> __('Grid'),
		'description'		=> __('Grid'),
		'render_template'	=> 'template-parts/blocks/card-grid.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Small Cards
	acf_register_block_type(array(
		'name'				=> 'card-small-cards',
		'title'				=> __('Small Cards'),
		'description'		=> __('Small Cards'),
		'render_template'	=> 'template-parts/blocks/card-small-cards.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Key Contacts
	acf_register_block_type(array(
		'name'				=> 'card-key-contacts',
		'title'				=> __('Key Contacts'),
		'description'		=> __('Key Contacts'),
		'render_template'	=> 'template-parts/blocks/card-key-contacts.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Image Slider
	acf_register_block_type(array(
		'name'				=> 'card-image-slider',
		'title'				=> __('Image Slider'),
		'description'		=> __('Image Slider'),
		'render_template'	=> 'template-parts/blocks/card-image-slider.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	//Video with stats
	acf_register_block_type(array(
		'name'				=> 'card-video-with-stats',
		'title'				=> __('Video with stats'),
		'description'		=> __('Video with stats'),
		'render_template'	=> 'template-parts/blocks/card-video-with-stats.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

}

if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}


add_filter( 'acf/the_field/escape_html_optin', '__return_true' );
add_action( 'acf/init', 'set_acf_settings' );
function set_acf_settings() {
    acf_update_setting( 'enable_shortcode', false );
}

//Register custom post types
function setup_custom_post_types(){

// Key Contacts
register_post_type('team', array(
	'labels' => array(
		'name'			=> __('Team', 'bwp'),
		'singular_name'	=> __('Team', 'bwp'),
		'menu_name'		=> __('Team', 'bwp')
	),
	'public'		=> true,
	'has_archive'	=> false,
	'menu_icon'		=> 'dashicons-book',
	'show_in_rest'	=> true,
	'supports'		=> array('title', 'editor','thumbnail'),
	'rewrite'		=> array(
		"slug"			=> "team",
		// "with_front"	=> true
	)
));
register_taxonomy(  
	'team_category',
	'team',
	array(
		'hierarchical'		=> true,
		'label'				=> 'Category',
		'query_var'			=> true,
		'show_in_rest'		=> true,
		// 'rewrite' => array(
		// 	'slug'			=> 'c'
		// )
	)  
);
}
add_action('init', 'setup_custom_post_types');


/**
* Removes Top Level Menu - Comments
*/

function prefix_remove_comments_tl() {
remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', 'prefix_remove_comments_tl' );

