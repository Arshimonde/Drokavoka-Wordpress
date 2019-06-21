<?php
    $user_id = get_current_user_id();
    $views = get_user_meta( $user_id,"user_views",true);
    $clients_count = get_user_clients_count($user_id);
    $level = get_badge_level($views,$clients_count);
    //count new bookings
    $args = array(
        "post_type" => "booking",
        "author" => $user_id,
        "post_status" => "pending",
    );
    $bookings = new WP_Query($args);
    $new_count = $bookings->found_posts;
    // count avis
    $args = array(
        "post_type" => "site-review",
        "meta_key" => "assigned_to",
        "meta_value" => $user_id
    );
    $reviews = new WP_Query($args);
    $reviews_count = $reviews->found_posts;
?>

<div class="row">
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-secondary o-hidden h-100">
    <div class="card-body">
        <div class="text-center">
            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="<?=__("Niveau","drokavoka")?> <?=$level?>" class="badge_list_1">
                <img 
                    src="<?=get_template_directory_uri()?>/assets/images/badges/badge_<?=$level?>.svg" 
                   class="img-fluid" width="80" alt="badge"
                >
            </a>
        </div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="/dashboard?section=badges">
        <span class="float-left"><?=__("Voir les détails","drokavoka")?></span>
        <span class="float-right">
        <i class="fa fa-angle-right"></i>
        </span>
    </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-success o-hidden h-100">
    <div class="card-body">
        <div class="card-body-icon">
        <i class="fa fa-fw fa-calendar-check-o"></i>
        </div>
        <div class="mr-5">
            <h5><?= $new_count ?> <?=__("Nouvelles réservations!","drokavoka")?></h5>
        </div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="/dashboard?section=bookings">
        <span class="float-left"><?=__("Voir les détails","drokavoka")?></span>
        <span class="float-right">
        <i class="fa fa-angle-right"></i>
        </span>
    </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-warning o-hidden h-100">
    <div class="card-body">
        <div class="card-body-icon">
        <i class="fa fa-fw fa-comment "></i>
        </div>
        <div class="mr-5">
            <h5>
                <?=$reviews_count?> <?=__("Avis","drokavoka")?>
            </h5>
        </div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="/dashboard?section=reviews">
        <span class="float-left"><?=__("Voir les détails","drokavoka")?></span>
        <span class="float-right">
        <i class="fa fa-angle-right"></i>
        </span>
    </a>
    </div>
</div>
<div class="col-xl-3 col-sm-6 mb-3">
    <div class="card dashboard text-white bg-primary o-hidden h-100">
    <div class="card-body">
        <div class="card-body-icon">
        <i class="fa fa-fw fa-star"></i>
        </div>
        <div class="mr-5">
            <h5>
                <?php     echo do_shortcode('[site_reviews_summary hide="bars,rating" assigned_to="'.$user_id.'"]'); ?>
            </h5>
        </div>
    </div>
    <a class="card-footer text-white clearfix small z-1" href="/dashboard?section=reviews">
        <span class="float-left"><?=__("Voir les détails","drokavoka")?></span>
        <span class="float-right">
        <i class="fa fa-angle-right"></i>
        </span>
    </a>
    </div>
</div>
</div>
<!-- /cards -->
<h2></h2>
<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2><i class="fa fa-bar-chart"></i>Statistic</h2>
    </div>
    <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
</div>