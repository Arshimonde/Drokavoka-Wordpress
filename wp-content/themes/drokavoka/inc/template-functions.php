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


function get_lawyers_listing_query($number_to_display)
{
    // WP USER QUERY 
	// paginations
	$no=$number_to_display;// total no of lawyers to display

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if($paged==1){
		$offset=0;  
	}else {
		$offset= ($paged-1) * $no;
	}

	$meta_query = array(
		'relation' => 'AND'
	);
	// Meta from home page link
	if(isset($_GET["taxonomy"]) && !empty($_GET["taxonomy"])){
		$key = $_GET["taxonomy"] == "cities" ? "city" : 'specialties';
		array_push($meta_query,array(
			'key'     => $key,
			'value'   =>$_GET["term_id"],
			'compare' => 'LIKE',
		));
	}
	// SEARCH FORM ARGS
	$specialty = $_POST["lawyer-specialte"];
	$city = $_POST["city"];
	$full_name = $_POST["lawyer-name"];
	$listing_search_data = $_POST["list-lawyer-search"]; 

	if (isset($listing_search_data) && !empty($listing_search_data)) {

		$city_term = get_term_by('name', $listing_search_data, 'cities');
		$specialty_term = get_term_by('name', $listing_search_data, 'lawyer_specialte');

		if ($city_term) {
			$city = $city_term->term_id;
		}elseif ($specialty_term) {
			$specialty = $specialty_term->term_id;
			$specialty_parent = $specialty_term->parent;
		}else{
			$full_name =  $listing_search_data;
		}

	}

	if(isset($specialty) && !empty($specialty) && $specialty!="-1"){
		$specialty_query = array(
			"relation" => "OR",
			array(
				'key'     => "specialties",
				'value'   => serialize(strval($specialty)),
				'compare' => 'LIKE'
			)
		);

		if (isset($specialty_parent)) {
			array_push($specialty_query, array(
				'key'     => "specialties",
				'value'   =>serialize(strval($specialty_parent)),
				'compare' => 'LIKE'
			));
		}
		
		array_push($meta_query,$specialty_query);
	}

	if(isset($city) && !empty($city) && $city!="-1"){
		array_push($meta_query,array(
			'key'     => "city",
			'value'   =>$city,
			'compare' => '='
		));
	}

	if(isset($full_name) && !empty($full_name)){
		$name = explode(" ",$full_name);
		$first_name = $name[0];
		$last_name = $name[1];

		array_push($meta_query,array(
			'key'     => "first_name",
			'value'   => $first_name,
			'compare' => 'LIKE'
		));

		array_push($meta_query,array(
			'key'     => "last_name",
			'value'   => $last_name,
			'compare' => 'LIKE'
		));
	}

	// USER ARGS
	$args = array (
		'role'       => 'lawyer',
		'order'      => 'ASC',
		'orderby'    => 'display_name',
		'number' => $no, 
		'offset' => $offset,
		'meta_query' => $meta_query
	);
	
	return new WP_User_Query( $args );
}


function get_lawyers_for_maps(){
	$user_query  = get_lawyers_listing_query(9);
	$lawyers = $user_query->get_results();
	$data = array();
	foreach ( $lawyers as $lawyer ):
		//basic info
		$user_id = $lawyer->ID;
		$lawyer_info = get_userdata( $user_id );
		$first_name = $lawyer_info->first_name;
		$last_name = $lawyer_info->last_name;
		$fname = " Maître ".$first_name." ".$last_name;
		$phone = get_user_meta( $user_id,"phone",true);
		// specialty
		$specialties = get_user_meta( $user_id,"specialties",true);
		$specialty_term = get_term($specialties[0], "lawyer_specialte");
		$spec_text = $specialty_term->name."...";
		// location
		$lat = get_user_meta( $user_id,"latitude",true);
		$lon = get_user_meta( $user_id,"longitude",true);
		$address = get_user_meta( $user_id,"address",true);
		// image
		$img_id = get_user_meta($user_id,"wp_user_avatar",true);
		$user_avatar_url = wp_get_attachment_image_url($img_id);
		if($user_avatar_url == false):
			$user_avatar_url = "http://via.placeholder.com/150x150.jpg";
		endif;

		array_push($data,array(
			"name" =>  $fname,
			"location_latitude" => $lat , 
			"location_longitude"=> $lon,
			"map_image_url"	=> $user_avatar_url ,
			"type"=> $spec_text,
			"url_detail" => '/lawyer-profil?id='.$user_id,
			"name_point" => $fname,
			"description_point" => $address,
			"get_directions_start_address" =>  '',
			"phone" => $phone
		));

	endforeach;

	return $data;
}

