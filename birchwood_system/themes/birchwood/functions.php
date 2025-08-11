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


	// Overlapping Cards
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

	// Two Column
	acf_register_block_type(array(
		'name'				=> 'card-two-column',
		'title'				=> __('Two Column'),
		'description'		=> __('Two Column'),
		'render_template'	=> 'template-parts/blocks/card-two-column.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Two Column Title / Text / Image
	acf_register_block_type(array(
		'name'				=> 'card-two-column-title-image',
		'title'				=> __('Two Column Title / Text / Image'),
		'description'		=> __('Two Column Title / Text / Image'),
		'render_template'	=> 'template-parts/blocks/card-two-column-title-image.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Title / Two Column Text
	acf_register_block_type(array(
		'name'				=> 'card-title-two-column-text',
		'title'				=> __('Title / Two Column Text'),
		'description'		=> __('Title / Two Column Text'),
		'render_template'	=> 'template-parts/blocks/card-title-two-column-text.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Data Table
	acf_register_block_type(array(
		'name'				=> 'card-table',
		'title'				=> __('Table'),
		'description'		=> __('Table'),
		'render_template'	=> 'template-parts/blocks/card-table.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	// Block
	acf_register_block_type(array(
		'name'				=> 'card-block',
		'title'				=> __('Card'),
		'description'		=> __('Card'),
		'render_template'	=> 'template-parts/blocks/card-block.php',
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

	// Grid Column
	acf_register_block_type(array(
		'name'				=> 'card-grid-column',
		'title'				=> __('Grid Column'),
		'description'		=> __('Grid Column'),
		'render_template'	=> 'template-parts/blocks/card-grid-column.php',
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

	//Iframe
	acf_register_block_type(array(
		'name'				=> 'card-iframe',
		'title'				=> __('Iframe'),
		'description'		=> __('Iframe'),
		'render_template'	=> 'template-parts/blocks/card-iframe.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	//Downloads
	acf_register_block_type(array(
		'name'				=> 'card-downloads',
		'title'				=> __('Downloads'),
		'description'		=> __('Downloads'),
		'render_template'	=> 'template-parts/blocks/card-downloads.php',
		'category'			=> 'formatting',
		'mode'	=> 'edit',
		'supports' => array('mode' => false, 'anchor' => true),
		'icon'				=> 'layout'
	));

	//Content Block
	acf_register_block_type(array(
		'name'				=> 'card-content',
		'title'				=> __('Content'),
		'description'		=> __('Content'),
		'render_template'	=> 'template-parts/blocks/card-content.php',
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

// Downloads
register_post_type('downloads', array(
	'labels' => array(
		'name'			=> __('Downloads', 'bwp'),
		'singular_name'	=> __('Download', 'bwp'),
		'menu_name'		=> __('Downloads', 'bwp')
	),
	'public'		=> true,
	'has_archive'	=> false,
	'menu_icon'		=> 'dashicons-book',
	'show_in_rest'	=> true,
	'supports'		=> array('title', 'editor', 'excerpt', 'thumbnail'),
	'rewrite'		=> array(
		"slug"			=> "downloads",
		// "with_front"	=> true
	)
));
register_taxonomy(  
	'download_category',
	'downloads',
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

// Handle Gravity Forms Login Authentication
add_action('gform_after_submission_2', 'process_login_form', 10, 2);

function process_login_form($entry, $form) {
    // Get form field values (adjust field IDs as needed)
    $username = rgar($entry, '1');    // Username/Email field ID
    $password = rgar($entry, '2');    // Password field ID
    
    // Clean the inputs
    $username = sanitize_text_field($username);
    $password = sanitize_text_field($password);
    
    // Prepare credentials for wp_signon
    $credentials = array(
        'user_login'    => $username,
        'user_password' => $password,
        'remember'      => true
    );
    
    // Attempt authentication using wp_signon
    $user = wp_signon($credentials, false);
    
    if (!is_wp_error($user)) {
        // Login successful - user is now logged in
        
        // Default redirect to homepage
        $redirect_url = home_url('/');
        
        // Check if there was an intended destination stored
        if (isset($_GET['redirect_to']) && !empty($_GET['redirect_to'])) {
            $requested_redirect = urldecode($_GET['redirect_to']);
            // Validate the redirect URL for security
            $requested_redirect = wp_validate_redirect($requested_redirect, $redirect_url);
            if ($requested_redirect) {
                $redirect_url = $requested_redirect;
            }
        }
        
        // Perform the redirect
        wp_safe_redirect($redirect_url);
        exit;
        
    } else {
        // Login failed - stay on login page with error
        $error_message = $user->get_error_message();
        
        // Preserve the redirect_to parameter if it exists
        $redirect_params = array(
            'login_error' => '1',
            'error_msg' => urlencode($error_message)
        );
        
        if (isset($_GET['redirect_to'])) {
            $redirect_params['redirect_to'] = $_GET['redirect_to'];
        }
        
        $login_url = add_query_arg($redirect_params, wp_get_referer());
        
        wp_safe_redirect($login_url);
        exit;
    }
}

// Display login error messages
add_action('wp_head', 'display_login_errors');

function display_login_errors() {
    if (isset($_GET['login_error']) && $_GET['login_error'] == '1') {
        $error_message = isset($_GET['error_msg']) ? urldecode($_GET['error_msg']) : 'Login failed. Please check your credentials and try again.';
        
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var errorDiv = document.createElement("div");
                errorDiv.className = "login-error alert alert-danger";
                errorDiv.style.cssText = "background:#f8d7da;color:#721c24;padding:15px;margin:15px 0;border:1px solid #f5c6cb;border-radius:4px;font-weight:bold;";
                errorDiv.innerHTML = "' . esc_js($error_message) . '";
                
                var form = document.querySelector(".gform_wrapper");
                if (form) {
                    form.parentNode.insertBefore(errorDiv, form);
                }
                
                // Auto-hide error after 10 seconds
                setTimeout(function() {
                    if (errorDiv.parentNode) {
                        errorDiv.parentNode.removeChild(errorDiv);
                    }
                }, 10000);
            });
        </script>';
    }
}

// Protect specific pages - redirect non-logged-in users to login page
add_action('template_redirect', 'protect_member_pages');

function protect_member_pages() {
    // Don't protect admin pages or login process
    if (is_admin() || is_user_logged_in()) {
        return;
    }
    
    // Define protected page slugs
    $protected_pages = array(
        'home', 
        'overview', 
        'the-park', 
        'industrial', 
        'industrial-development', 
        'office', 
        'amenity', 
        'business-plan', 
        'portfolio-analytics', 
        'downloads'
    );
    
    // Check if current page is protected
    if (is_page($protected_pages)) {
        // Store the intended destination
        $current_url = home_url($_SERVER['REQUEST_URI']);
        $redirect_to = urlencode($current_url);
        
        // Redirect to login page (change 'login' to your actual login page slug)
        $login_page_slug = 'login'; // Change this to your login page slug
        $login_url = add_query_arg('redirect_to', $redirect_to, home_url('/' . $login_page_slug . '/'));
        
        wp_safe_redirect($login_url);
        exit;
    }
}

// Optional: Prevent access to login page if already logged in
add_action('template_redirect', 'redirect_logged_in_users');

function redirect_logged_in_users() {
    // Change 'login' to your actual login page slug
    $login_page_slug = 'login';
    
    if (is_user_logged_in() && is_page($login_page_slug)) {
        wp_safe_redirect(home_url('/'));
        exit;
    }
}

// Handle logout functionality
add_action('init', 'handle_custom_logout');

function handle_custom_logout() {
    if (isset($_GET['action']) && $_GET['action'] == 'logout' && isset($_GET['_wpnonce'])) {
        if (wp_verify_nonce($_GET['_wpnonce'], 'logout')) {
            wp_logout();
            wp_safe_redirect(home_url('/'));
            exit;
        }
    }
}

// Add logout link function (use this in your templates)
function get_logout_url() {
    return wp_nonce_url(add_query_arg('action', 'logout', home_url('/')), 'logout');
}

// Your existing email function
function custom_new_user_notification_email($wp_new_user_notification_email, $user, $blogname) {
    $key = get_password_reset_key($user);
    if (is_wp_error($key)) {
        return $wp_new_user_notification_email;
    }
    
    // Use default WordPress password reset URL
    $default_password_url = network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login');
    
    $wp_new_user_notification_email['subject'] = sprintf('[%s] Welcome! Set up your account', $blogname);
    
    $wp_new_user_notification_email['message'] = sprintf(
        "Welcome to %s!\n\n" .
        "Your account has been created with the following details:\n\n" .
        "Username: %s\n" .
        "Email: %s\n\n" .
        "To complete your account setup and create your password, please click the link below:\n\n" .
        "If you have any questions, feel free to contact us.\n\n" .
        "Welcome aboard!\n" .
        "The %s Team",
        $blogname,
        $user->user_login,
        $user->user_email,
        $default_password_url,
        $blogname
    );
    
    return $wp_new_user_notification_email;
}
add_filter('wp_new_user_notification_email', 'custom_new_user_notification_email', 10, 3);


// Enhanced version with proper WordPress URLs
add_filter('gform_submit_button', 'add_enhanced_login_links', 10, 2);

function add_enhanced_login_links($button, $form) {
    if ($form['id'] == '2') {
        $login_links = '
        <div class="login-links">
            <div class="login-divider"></div>
            <div class="login-actions">
                <p class="register-link">
                    Don\'t have a login? Register for access              
                </p>
                <a href="/register" class="btn btn-register">
                    Register
                    <span class="arrow-icon"></span>
                </a>
            </div>
        </div>';
        
        return $button . $login_links;
    }
    return $button;
}