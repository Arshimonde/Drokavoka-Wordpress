<?php 
$args = array (
    'role'       => 'lawyer',
    'order'      => 'ASC',
    'orderby'    => 'display_name',
);
$user_query = new WP_User_Query( $args );
$lawyers = $user_query->get_results();

if ( ! empty( $lawyers ) ): 

?>
<div class="bg_color_1">
    <div class="container margin_120_95">
        <div class="main_title">
            <h2><?=_e("Les avocats les plus consultés")?></h2>
            <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
        </div>
        <div id="reccomended" class="owl-carousel owl-theme">
            <?php 
                foreach ( $lawyers as $lawyer ):
                    $user_id = $lawyer->ID;
                    $lawyer_info = get_userdata( $user_id );
                    $first_name = $lawyer_info->first_name;
                    $last_name = $lawyer_info->last_name;
                    $img_id = get_user_meta($user_id,"wp_user_avatar",true);
                    $user_avatar_url = wp_get_attachment_image_url($img_id,"");
            ?>
            <div class="item">
                <a href="/lawyer-profil?id=<?=$user_id?>">
                    <!-- <div class="views"><i class="icon-eye-7"></i>140</div> -->
                    <div class="title">
                        
                        <h4>
                            <small class="d-block"><?= _e("Maître") ?></small>
                            <?=$first_name ?> <?=$last_name ?>
                        </h4>
                    </div>
                    <img src="<?=get_wp_user_avatar_src($user_id,"original")?>" alt="<?=$first_name ?> <?=$last_name ?>">
                </a>
            </div>
            <?php endforeach;?>
        </div>
        <!-- /carousel -->
    </div>
    <!-- /container -->
</div>
<!-- /white_bg -->
<?php endif; ?>