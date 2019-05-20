<?php
    // WP USER QUERY 
        // paginations
    $no=9;// total no of lawyers to display

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
    
    $user_query = new WP_User_Query( $args );
    $lawyers = $user_query->get_results();

    // WP USER QUERY END

    include "listing-lawyers/results-search.php";
?>
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-7">
            <?php 
                if ( ! empty( $lawyers ) ):
                    $addresses = array();
                    foreach ( $lawyers as $lawyer ):
                        $user_id = $lawyer->ID;
                        $lawyer_info = get_userdata( $user_id );
                        $first_name = $lawyer_info->first_name;
                        $last_name = $lawyer_info->last_name;
                        $specialties = get_user_meta( $user_id,"specialties",true);

                        $lat = get_user_meta( $user_id,"latitude",true);
                        $lon = get_user_meta( $user_id,"longitude",true);

                        $img_id = get_user_meta($user_id,"wp_user_avatar",true);
                        $user_avatar_url = wp_get_attachment_image_url($img_id);

                        if(!empty($lat) && !empty($lon)):
                            array_push($addresses,array(
                                "lat" => $lat,
                                "lon" => $lon,
                                'lawyer_name'=>__("Maitre"). " " .$last_name." ". $first_name 
                            ));
                        endif;
                        // view
                        include "listing-lawyers/lawyers-single.php";  

                    endforeach;
                    // pagination
                    include "listing-lawyers/pagination.php";  
                endif;
             ?>
        </div>
        <aside class="col-lg-5" id="sidebar">
            <?php include "listing-lawyers/lawyers-map.php"; ?> 
        </aside>
    </div>
</div>

