<!-- VARIABLES -->
<?php
    if(isset($_GET["id"]) && !empty($_GET["id"])):
        $user_id = $_GET["id"];
        $lawyer_info = get_userdata( $user_id );
        $first_name = $lawyer_info->first_name;
        $last_name = $lawyer_info->last_name;
        $specialties = get_user_meta( $user_id,"specialties",true);
        $img_id = get_user_meta($user_id,"wp_user_avatar",true);
        $user_avatar_url = wp_get_attachment_image_url($img_id);
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