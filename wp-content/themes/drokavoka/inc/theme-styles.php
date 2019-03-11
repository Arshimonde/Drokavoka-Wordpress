<?php
function drokavoka_styles() {
	$css_url = get_template_directory_uri()."/assets/css";
	// BASE CSS
	wp_enqueue_style("bootstrap","$css_url/bootstrap.min.css");
	wp_enqueue_style("style-template","$css_url/style.css");
	wp_enqueue_style("menu","$css_url/menu.css");
	wp_enqueue_style("vendors","$css_url/vendors.css");
	wp_enqueue_style("icons","$css_url/all_icons_min.css");
	wp_enqueue_style("bootstrap-select","https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css");
	//CUSTOM CSS
	wp_enqueue_style("custom","$css_url/custom.css");

}
add_action( 'wp_enqueue_scripts', 'drokavoka_styles' );

?>