<style>
    html,
    body,
    #content,
    #primary,
    #main {
        height: 100%;
    }
</style>
<div class="row row-height">
    <div class="col-lg-5 content-left">
        <?php
            echo "<br><br>";
            include "results-search.php";
            include "sort-by.php";

            if ( ! empty( $lawyers ) ):
                $addresses = array();
                $marker_key = 0;
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
                    include "lawyers-single.php";  
                    $marker_key++;
                endforeach;
                // pagination
                include "pagination.php";  
            endif;
        ?>
    </div>
    <!-- /content-left-->
    <div class="col-lg-7 map-right">
        <?php include "lawyers-map.php"; ?>
        <!-- map-->
    </div>
    <!-- /map-right-->
</div>