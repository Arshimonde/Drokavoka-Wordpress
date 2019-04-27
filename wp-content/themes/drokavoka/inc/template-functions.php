<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Drokavoka
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function drokavoka_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'drokavoka_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function drokavoka_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'drokavoka_pingback_header' );


// GET AUT COMPLETE DATA
function get_search_data(){

	// Specialities 
	$specilities = get_terms( "lawyer_specialte",array( 
		"hide_empty" => false,
	));

	// cities
	$cities = get_terms( "cities",array( 
		"hide_empty" => false,
	));

	return array(
		"lawyers" => $lawyers,
		"specialties" => $specilities,
		"cities" => $cities
	);
}

// GET AUT COMPLETE DATA END


// GET LAWYERS NAMES
function get_lawyers_names(){
	// USERS
	$user_args = array (
		'role'       => 'lawyer',
		'order'      => 'ASC',
		'orderby'    => 'display_name',
	);
	
	$user_query = new WP_User_Query($user_args);
	$lawyers = $user_query->get_results();

	$lawyers_names = array();

	foreach ($lawyers as $lawyer) {
		$user_id = $lawyer->ID;
		$lawyer_info = get_userdata($user_id);
		$full_name = $lawyer_info->first_name." ".$lawyer_info->last_name;

		array_push($lawyers_names,$full_name);
	}

	return $lawyers_names;
}
// GET LAWYERS NAMES END

// GET cities names NAMES
function get_cities_names(){
	$cities = get_terms( "cities",array( 
		"hide_empty" => false,
	));

	$cities_names = array();

	foreach ($cities as $city) {
		array_push($cities_names,$city->name);
	}

	return $cities_names;
}
// GET cities NAMES END

// GET specialites names NAMES
function get_specialties_names(){
	$specilities = get_terms( "lawyer_specialte",array( 
		"hide_empty" => false,
	));

	$specilities_names = array();

	foreach ($specilities as $spec) {
		array_push($specilities_names,$spec->name);
	}

	return $specilities_names;
}
// GET specialites NAMES END

// GET LISTING LAWYERS SEARCH DATA
function get_listing_search_data(){
	$cities = get_specialties_names();
	$specilities = get_cities_names();
	$lawyers_names = get_lawyers_names();
	return array_merge($cities,$specilities,$lawyers_names);
}
// GET LISTING LAWYERS SEARCH DATA END







//-------------------- FORMS

// Cities Select
function render_cities_select($city = null){
	$html = '<select 
		name="city" 
		class="selectpicker form-control"
		data-live-search="true"
		data-size="4"
		required
	>';

	$cities = get_terms( "cities",array( 
		"hide_empty" => false,
	));

	foreach ($cities as $city_item) {
		$selected = "";
		if(isset($city) && $city_item->term_id == $city):
			$selected="selected";
		else:
			$selected="";
		endif;

		$html .= '<option';
		$html .= ' value="'.$city_item->term_id.'" ';
		$html .= $selected; 
		$html .= '>';
		$html .= $city_item->name;
		$html .= '</option>';
	} 
	$html .= '</select>';
	
	echo $html;
}