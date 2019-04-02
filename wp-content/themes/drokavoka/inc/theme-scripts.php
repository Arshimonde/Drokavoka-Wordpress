<?php
function drokavoka_scripts() {
	$js_url = get_template_directory_uri()."/assets/js";
	wp_enqueue_script( 'drokavoka-navigation', $js_url. '/navigation.js');

	//COMMON JS
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script( 'common_scripts', $js_url. '/common_scripts.min.js');
	wp_enqueue_script( 'functions', $js_url. '/functions.js');
	wp_enqueue_script( 'bootstrap-select-js', "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js");
	wp_enqueue_script( 'sweet-alerts-2', "https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js");

	// VENDOR JS
	$vendor_url = get_template_directory_uri()."/assets/vendor";	
	wp_enqueue_script( 'bootstrap-bundle', $vendor_url."/bootstrap/js/bootstrap.bundle.min.js",array("jQuery"));
	wp_enqueue_script( 'jquery-easing', $vendor_url."/jquery-easing/jquery.easing.min.js");
	wp_enqueue_script( 'chart-js', $vendor_url."/chart.js/Chart.min.js");
	wp_enqueue_script( 'datatables-js', $vendor_url."/datatables/jquery.dataTables.js");
	wp_enqueue_script( 'datatables-bootstrap', $vendor_url."/datatables/dataTables.bootstrap4.js");
	wp_enqueue_script( 'select-box', $vendor_url."/jquery.selectbox-0.2.js");
	wp_enqueue_script( 'retina-replace', $vendor_url."/retina-replace.min.js");
	wp_enqueue_script( 'magnific-popup', $vendor_url."/jquery.magnific-popup.min.js");
	
	// Custom JS
	if(is_page("dashboard")):
		wp_enqueue_script( 'admin', $js_url. '/admin.js');
	endif;

	wp_enqueue_script( 'leaflet-js',$js_url.'/leaflet.js');
	wp_enqueue_script( 'custom', $js_url. '/custom.js');
	wp_enqueue_script( 'dropzone-js', $vendor_url. '/dropzone.min.js');
	wp_enqueue_script( 'date-picker', $js_url. '/bootstrap-datepicker.js');
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