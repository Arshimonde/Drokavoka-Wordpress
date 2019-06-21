<!-- Rating -->
<?php
    $views = get_user_meta( $user_id,"user_views",true);
    $clients_count = get_user_clients_count($user_id);
    $reviews_args = array(
        "post_type" => "site-review",
        "meta_key" => "assigned_to",
        "meta_value" => $user_id,
    );
    $reviews = new WP_Query($reviews_args);
    $rating_html  = do_shortcode('[site_reviews_summary hide="bars,rating,summary" assigned_to="'.$user_id.'"]');
?>
<span class="rating">
    <?php
        echo $rating_html;
    ?> 
    <small>(<?=$reviews->found_posts?>)</small>
</span>  
<!-- Rating END-->
<!-- Badges -->
<?php
    $level = get_badge_level($views,$clients_count);
    if($level != 0) :
?>
<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?=__("Niveau","drokavoka")?> <?=$level?>" class="badge_list_1">
    <img 
        src="<?=get_template_directory_uri()?>/assets/images/badges/badge_<?=$level?>.svg" 
        width="15" height="15" alt="badge"
    >
</a>
<?php endif; ?>