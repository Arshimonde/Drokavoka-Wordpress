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

    $args = array (
        'role'       => 'lawyer',
        'order'      => 'ASC',
        'orderby'    => 'display_name',
        'number' => $no, 
        'offset' => $offset 
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
                        $user_address = get_user_meta( $user_id,"address",true);
                        $img_id = get_user_meta($user_id,"wp_user_avatar",true);
                        $user_avatar_url = wp_get_attachment_image_url($img_id);
                        if(!empty($user_address)):
                            array_push($addresses,$user_address);
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

