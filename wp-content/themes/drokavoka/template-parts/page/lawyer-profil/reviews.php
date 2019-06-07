<?php 
    $user_id = $_GET["id"]; 
?>

<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="general-tab">
    <div class="reviews-container">
        <!-- sumamry -->
        <?php 
            glsr_calculate_ratings();
            echo do_shortcode('[site_reviews_summary assigned_to="'.$user_id.'"]');
        ?>
        <hr>
        <!-- reviews -->
        <?php echo do_shortcode('[site_reviews count="3" pagination="ajax" fallback="'.__("Soyez le premier à donner votre avis.","drokavoka").'" assigned_to = "'.$user_id.'" ]'); ?>
    </div>
<!-- End review-container -->
<hr class="mt-0">

<h3 class="text-primary"><?=__("Donner votre avis","drokavoka")?></h3>
<?php
    echo do_shortcode('[site_reviews_form assign_to= "'.$user_id.'" ]');
?>

</div>
<!-- /tab_2 -->