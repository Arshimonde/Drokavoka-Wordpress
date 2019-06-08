<?php

    $post_status =  array( 'pending', 'publish', 'trash' );

    if (isset($_GET["status"]) && !empty($_GET["status"])) {

        if($_GET["status"] != "any_status"){
            $post_status = $_GET["status"];
        }else {
            $post_status =  array( 'pending', 'publish', 'trash' );
        }
      
    }

    $user_id = get_current_user_id();

    // WP QUERY
    $args = array(
        "post_type" => "booking",
        "author" => $user_id,
        "post_status" => $post_status,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
        "posts_per_page" => 3
    );
    $bookings = new WP_Query($args);
?>

<div class="box_general">
    <div class="header_box">
        <h2 class="d-inline-block"><?=_e("Liste de réservations","drokavoka")?></h2>
        <div class="filter d-flex" style="width:auto">
            <select id="orderby" name="orderby" class="selectbox">
                <option value="any_status" <?php $post_status == "any_status" ? print("selected") : "" ;?>><?=_e("Tout","drokavoka")?></option>
                <!--wp status : *-->
                <option value="publish" <?php $post_status == "publish" ? print("selected") : "" ;?>> <?=_e("Confirmé","drokavoka")?></option>
                <!--wp status : publish-->
                <option value="pending" <?php $post_status == "pending" ? print("selected") : "" ;?>><?=_e("En attente","drokavoka")?></option>
                <!--wp status : pending-->
                <option value="trash" <?php $post_status == "trash" ? print("selected") : "" ;?>><?=_e("Annulé","drokavoka")?></option>
                <!--wp status : trash-->
            </select>
            <button 
                id="orderby-submit" 
                class="btn_1 gray d-block ml-2 rounded"
            >
                <?=_e("Ok","drokavoka")?>
            </button>
        </div>
    </div>
    <div class="list_general">
        <?php if( $bookings->have_posts() ) : ?>
        <ul>
            <?php while ( $bookings->have_posts() ) : $bookings->the_post(); ?>
            <li class="px-5">
                <?php
                        $post_id  = get_the_ID();
                        $status = get_post_status($post_id);
                        $status_class = "pending";
                        switch ($status) {
                            case 'pending':
                                $status = __("En attente","drokavoka");
                                $status_class = "pending";
                                break;
                            case 'publish':
                                $status = __("Confirmé","drokavoka");
                                $status_class = "approved";
                                break;
                            case 'trash':
                                $status = __("Annulé","drokavoka");
                                $status_class = "cancel";
                                break;
                            default:
                                $status = __("","drokavoka");
                                $status_class = "pending";
                                break;
                        }
                    ?>
                <h4><?=the_field("client_name")?> <i class="<?=$status_class?>"><?=$status?></i></h4>
                <ul class="booking_details">
                    <li><strong><?=__("Date","drokavoka")?></strong><?=the_field("booking_date")?></li>
                    <li><strong><?=__("Heure","drokavoka")?></strong><?=the_field("booking_time")?></li>

                    <?php 
                            $needs = "";
                            if ( have_rows('booking_needs') ) : 
                        ?>

                    <?php while( have_rows('booking_needs') ) : the_row(); ?>

                    <?php  $needs .= get_sub_field('need').","; ?>

                    <?php endwhile; ?>
                    <?php endif; ?>

                    <li><strong><?=__("Besoin","drokavoka")?></strong><?=rtrim($needs,",")?></li>
                    <li><strong><?=__("Téléphone","drokavoka")?></strong><?=the_field("client_phone")?></li>
                    <li><strong><?=__("Email","drokavoka")?></strong><?=the_field("client_email")?></li>
                </ul>
                <?php?>
                <ul class="buttons">
                    <?php if ( in_array($status_class, array("pending","cancel")) ): ?>
                    <li>
                        <a href="#" class="btn_1 gray approve" data-post_id = <?=$post_id?>>
                            <i class="fa fa-fw fa-check-circle-o"></i>
                            <?=__("Confirmer","drokavoka")?>
                        </a>
                    </li>
                    <?php endif;?>

                    <?php if ( in_array($status_class, array("approved","pending")) ): ?>
                    <li>
                        <a href="#" class="btn_1 gray delete" data-post_id = <?=$post_id?>>
                            <i class="fa fa-fw fa-times-circle-o"></i>
                            <?=__("Annuler","drokavoka")?>
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      
    </div>
</div>
<!-- /box_general-->
<nav class="mb-2 float-right">
    <?php
        $big = 999999999; // need an unlikely integer
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => '?paged=%#%&section=bookings',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $bookings->max_num_pages
        ) );
    ?>
</nav>
<!-- /pagination-->  
<?php wp_reset_query(); ?>