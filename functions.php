<?php 

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





?>