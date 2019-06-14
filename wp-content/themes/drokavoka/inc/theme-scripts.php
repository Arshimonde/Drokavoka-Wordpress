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
	wp_enqueue_script( 'typeahead', $js_url. '/typeahead.bundle.js');

	// VENDOR JS
	$vendor_url = get_template_directory_uri()."/assets/vendor";	
	wp_enqueue_script( 'bootstrap-bundle', $vendor_url."/bootstrap/js/bootstrap.bundle.min.js",array("jQuery"));
	wp_enqueue_script( 'jquery-easing', $vendor_url."/jquery-easing/jquery.easing.min.js");
	wp_enqueue_script( 'select-box', $vendor_url."/jquery.selectbox-0.2.js");
	wp_enqueue_script( 'retina-replace', $vendor_url."/retina-replace.min.js");
	wp_enqueue_script( 'magnific-popup', $vendor_url."/jquery.magnific-popup.min.js");
	// Custom JS
	if(is_page("dashboard")):
		wp_enqueue_script( 'chart-js', $vendor_url."/chart.js/Chart.min.js");
		wp_enqueue_script( 'datatables-js', $vendor_url."/datatables/jquery.dataTables.js");
		wp_enqueue_script( 'datatables-bootstrap', $vendor_url."/datatables/dataTables.bootstrap4.js");
		wp_enqueue_script( 'admin', $js_url. '/admin.js');
		wp_enqueue_script( 'admin-chart', $js_url. '/admin-charts.js',array("chart-js"));

		wp_localize_script("admin","ajax_object", array(
			"ajax_url"=>admin_url("admin-ajax.php"),
			'nonce' => wp_create_nonce( "ajax_nounce" )
		));
		wp_localize_script("admin-chart","wp", array(
			"bookings" => get_booking_statistics(),
			"bookings_label" => __("Clients","drokavoka")
		));
	endif;

	wp_enqueue_script( 'leaflet-js',$js_url.'/leaflet.js');	wp_enqueue_script( 'dropzone-js', $vendor_url. '/dropzone.min.js');
	wp_enqueue_script( 'date-picker', $js_url. '/bootstrap-datepicker.js');
	if (is_page("listing-lawyers")) {
		// maps
		//key 1 = AIzaSyAfkwBPa0opzRFbC7gbJ1p1ytH-4O_6vT4
		wp_enqueue_script( 'maps-api', 'http://maps.googleapis.com/maps/api/js?key=AIzaSyBsQd3zWjwAuIc-Hw-3TvEanyiRFUoOAzI');
		wp_enqueue_script( 'infobox', $js_url. '/infobox.js',array("maps-api"));
		wp_enqueue_script( 'map-listing', $js_url. '/map_listing.js',array('maps-api','infobox'));
		// maps end
	}
	wp_enqueue_script( 'custom', $js_url. '/custom.js');

    //Comments  JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// WP LOCALIZE SCRIPT
	
	$lawyers_name = get_lawyers_names();
	// list lawyers search data
	$search_data = get_listing_search_data();
	// list lawyers search data end
	$params = array(
		"ajax_url"=>admin_url("admin-ajax.php"),
		'nonce' => wp_create_nonce( "ajax_nounce" ),
	);
	$params["lawyers_names"] = $lawyers_name;
	$params["listing_search_data"] = $search_data;
	wp_localize_script("custom", "ajax_object",$params);

	// pass url of theme to map_listing.js
	$theme_url = get_template_directory_uri();
	$lawyers = get_lawyers_for_maps();
	wp_localize_script("maps-api", "theme", array(
		"theme_url" => $theme_url,
		"images_url" => $theme_url."/assets/images",
		"lawyers" => $lawyers 
	));
}

add_action( 'wp_enqueue_scripts', 'drokavoka_scripts' );

?>