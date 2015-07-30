<?php 

function remove_admin_bar()
{
    return false;
}

//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar



if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    // add_image_size('large', 700, '', true); // Large Thumbnail
    // add_image_size('medium', 250, '', true); // Medium Thumbnail
    // add_image_size('small', 120, '', true); // Small Thumbnail
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

}

/**
 * Load site scripts.
 */
function devframework_scripts() {
	$template_url = get_template_directory_uri();

	// Load main stylesheet.
	wp_enqueue_style( 'devframework-style', get_stylesheet_uri(), array(), null, 'all' );

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// General scripts.
	wp_enqueue_script( 'devframework-scripts', $template_url . '/dist/js/scripts.combined.min.js', array(), null, true );

}

add_action( 'wp_enqueue_scripts', 'devframework_scripts', 1 );

/**
 * Custom stylesheet URI.
 */
function devframewok_stylesheet_uri( $uri, $dir ) {
	return $dir . '/dist/css/styles.combined.min.css';
}

add_filter( 'stylesheet_uri', 'devframewok_stylesheet_uri', 10, 2 );


/**
 * Register menu navigation.
 */
function register_menu()
{
    register_nav_menu(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu') // Main Navigation
    ));
}

add_action('init', 'register_menu');


?>