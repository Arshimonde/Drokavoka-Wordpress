<?php
function drokavoka_scripts() {
	$js_url = get_template_directory_uri()."/assets/js";
	wp_enqueue_script( 'drokavoka-navigation', $js_url. '/navigation.js');

	//COMMON JS
	wp_enqueue_script( 'jquery', $js_url. '/jquery-2.2.4.min.js');
	wp_enqueue_script( 'common_scripts', $js_url. '/common_scripts.min.js');
	wp_enqueue_script( 'functions', $js_url. '/functions.js');
	wp_enqueue_script( 'bootstrap-select-js', "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js");
	wp_enqueue_script( 'sweet-alerts-2', "https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js");
	// Custom JS
	wp_enqueue_script( 'custom', $js_url. '/custom.js');
    //Comments  JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// WP LOCALIZE SCRIPT
	wp_localize_script("custom", "ajax_object",array(
		"ajax_url"=>admin_url("admin-ajax.php"),
		'nonce' => wp_create_nonce( "ajax_nounce" ),
	));
	
}

add_action( 'wp_enqueue_scripts', 'drokavoka_scripts' );


?>