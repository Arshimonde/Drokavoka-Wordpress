<?php
/**
 * Drokavoka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Drokavoka
 */


/**
 * Implements Custom Taxonomies .
 *
 */
include "inc/RegisterTaxonomies.php";

/**
 * Implements Theme Setup 
 *
 */

 require get_template_directory().'/inc/theme-setup.php';

/**
 * Implements widget .
 *
 */

require get_template_directory().'/inc/theme-widgets.php';

/**
 * Implements scripts and styles.
 */
require get_template_directory().'/inc/theme-styles.php';
require get_template_directory().'/inc/theme-scripts.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

