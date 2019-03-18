<?php
function drokavoka_styles() {
	$css_url = get_template_directory_uri()."/assets/css";
	// BASE CSS
	wp_enqueue_style("bootstrap","$css_url/bootstrap.min.css");
	wp_enqueue_style("icons","$css_url/all_icons_min.css");
	wp_enqueue_style("bootstrap-select","https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css");

	//VENDORS
	$vendor_url = get_template_directory_uri()."/assets/vendor";
	wp_enqueue_style("font-awesome","$vendor_url/font-awesome/css/font-awesome.min.css");
	wp_enqueue_style("datatable","$vendor_url/datatables/dataTables.bootstrap4.css");
	wp_enqueue_style("dropzone","$vendor_url/dropzone.css");

	//CUSTOM CSS
	if(is_page("dashboard")):
		wp_enqueue_style("admin","$css_url/admin.css");
	else:
		wp_enqueue_style("style-template","$css_url/style.css");
		wp_enqueue_style("menu","$css_url/menu.css");
		wp_enqueue_style("vendors","$css_url/vendors.css");
		wp_enqueue_style("custom","$css_url/custom.css");
	endif;
}

add_action( 'wp_enqueue_scripts', 'drokavoka_styles' );
?>