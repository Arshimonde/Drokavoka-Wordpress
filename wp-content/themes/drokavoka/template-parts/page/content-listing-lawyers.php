<?php
    $no = 9;
    $user_query = get_lawyers_listing_query($no);
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

