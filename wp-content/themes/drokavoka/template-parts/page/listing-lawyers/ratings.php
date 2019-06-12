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
    $reviews->the_post();
    $rating = get_post_meta(get_the_ID(), "rating", true);
?>
<span class="rating">
    <?php
    for ($i=0; $i < 5 ; $i++) { 
        $class = "voted";
        if($i >= $rating ){
            $class = "";
        }
        echo '<i class="icon_star '.$class.'"></i>';
    }
?> 
    <small>(<?=$reviews->found_posts?>)</small>
</span>  
<!-- Rating END-->
<!-- Badges -->
<?php
    $level = get_badge_level($views,$clients_count);
    if($level != 0) :
?>
<a href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?=__("Niveau","drokavoka")?>" class="badge_list_1">
    <img 
        src="<?=get_template_directory_uri()?>/assets/images/badges/badge_<?=$level?>.svg" 
        width="15" height="15" alt="badge"
    >
</a>
<?php endif; ?>