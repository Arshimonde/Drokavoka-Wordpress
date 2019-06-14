<?php
    if(isset($_GET["id"]) && !empty($_GET["id"])):
        $user_id = $_GET["id"];
        $views_key = 'user-'.$user_id.'-viewed';
        $views = get_user_meta( $user_id,"user_views",true);
        // <!-- COUNT Views -->
        if (!isset($_SESSION[$views_key])) {
            $_SESSION[$views_key] = true;
            $_SESSION["views_time"] = time(); 
            if (!empty($views)) {
                update_user_meta($user_id, "user_views", ($views + 1));
            }else {
                update_user_meta($user_id, "user_views", 1);
            }
        }else {
            if((time() - $_SESSION["views_time"]) > (60 * 60 * 1) ){
                unset($_SESSION[$views_key]);
            }
        }
        // <!-- VARIABLES -->
        $lawyer_info = get_userdata( $user_id );
        $first_name = $lawyer_info->first_name;
        $last_name = $lawyer_info->last_name;
        $specialties = get_user_meta( $user_id,"specialties",true);
        $img_id = get_user_meta($user_id,"wp_user_avatar",true);
        $user_avatar_url = wp_get_attachment_image_url($img_id);
        if(!isset($user_avatar_url) || empty($user_avatar_url))
            $user_avatar_url = "http://via.placeholder.com/565x565.jpg";
        $address = get_user_meta($user_id,"address",true);
        $city = get_user_meta($user_id,"city",true);
        $postal_code = get_user_meta($user_id,"postal_code",true);
        $phone = get_user_meta($user_id,"phone",true);
        $fax = get_user_meta($user_id,"fax",true);
        $fix = get_user_meta($user_id,"fix",true);
        $cv = get_field("cv","user_".$user_id);
        $twitter = get_user_meta($user_id, "social_media_twitter",true);
        $facebook = get_user_meta($user_id, "social_media_facebook",true);
        $linkedin = get_user_meta($user_id, "social_media_linkedin",true);
    endif;
?>
<!-- VARIABLES END -->

<div class="container margin_60">
    <div class="row">
        <?php include "lawyer-profil/aside.php" ?>
        <?php include "lawyer-profil/tabs.php" ?>
    </div>
</div>