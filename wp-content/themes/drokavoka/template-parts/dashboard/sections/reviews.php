<?php

$user_id = get_current_user_id();
$order = "DESC";

if (isset($_GET["order"]) && !empty($_GET["order"])) {
    $order =  $_GET["order"];
}

// WP QUERY
$args = array(
    "post_type" => "site-review",
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    "posts_per_page" => 3,
    "meta_key" => "assigned_to",
    "meta_value" => $user_id,
    "order" => $order
);
$reviews = new WP_Query($args);
?>

<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block">Reviews List</h2>
        <div class="filter d-flex" style="width:auto">
            <select id="orderby-reviews" name="orderby-reviews" class="selectbox">
                <option value="DESC" <?php $order == "DESC" ? print("selected") : "" ;?>>Dernier</option>
                <option value="ASC" <?php $order == "ASC" ? print("selected") : "" ;?>>Ancien</option>
            </select>
            <button 
                id="orderby-reviews-submit" 
                class="btn_1 gray d-block ml-2 rounded"
            >
                <?=_e("Ok","drokavoka")?>
            </button>
        </div>
    </div>
    <div class="list_general reviews">
    <?php if($reviews->have_posts() ) : ?>
        <ul>
            <?php while ($reviews->have_posts() ) :$reviews->the_post(); 
                    $post_id = get_the_ID();
                    $rating = get_post_meta($post_id, "rating", true);
                    $name = get_post_meta($post_id, "author", true);
                    $review = get_post_meta($post_id, "content", true);
                    $date = get_post_meta($post_id, "date", true);
                    $date = strtotime($date);
                    $date = date("d/m/Y",$date);
            ?>
            <li class="px-5">
                <span><?=$date?></span>
                <span class="rating">
                    <?php
                        for ($i=0; $i < 5 ; $i++) { 
                            $class = "yellow";
                            if($i >= $rating ){
                                $class = "";
                            }
                            echo '<i class="fa fa-fw fa-star '.$class.'"></i>';
                        }
                    ?>
                </span>
                <h4><?=$name?></h4>
                <p><?=$review?></p>
            </li>
            <?php endwhile;?>
        </ul>
    <?php endif;?> 
    </div>
</div>
<!-- /box_general-->
<nav class="mb-2 float-right">
    <?php
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%&section=reviews',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $reviews->max_num_pages
        ) );
    ?>
</nav>
<!-- /pagination-->