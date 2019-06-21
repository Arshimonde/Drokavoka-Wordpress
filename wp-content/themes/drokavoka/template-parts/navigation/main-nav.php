<nav class="col-lg-9 col-6">
    
    <!-- Mobile Menu toggle  -->
    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0">
        <span>Menu mobile</span>
    </a>
    <!-- Mobile Menu toggle end -->

    <!-- user account access -->
    <ul id="top_access">
        <?php if(!is_user_logged_in()):?>
        <li><a href="/login" data-toggle="tooltip" title="<?=__("S'authentifier","drokavoka")?>"><i class="pe-7s-user"></i></a></li>
        <li><a href="/signup" data-toggle="tooltip" title="<?=__("S'inscrire","drokavoka")?>"><i class="pe-7s-add-user"></i></a></li>
        <?php 
            else: 
                $current_user = wp_get_current_user();
                $user_id =  $current_user->ID;
                // full name
                $fname = $current_user->user_firstname ;
                $lname = $current_user->user_lastname; 
                $fullname = $fname.' '.$lname;
                if (!isset($fullname) || empty($fullname)) {
                   $fullname = $current_user->user_login;
                }
                // image
                $img_id = get_user_meta($user_id,"wp_user_avatar",true);
                $avatar_url = wp_get_attachment_image_url($img_id);
                if($avatar_url == false){
                    $avatar_url = "http://via.placeholder.com/150x150.jpg";
                }
            
        ?>
        <li id="user">
            <a href="/dashboard?section=dashboard">
                <figure>
                    <img 
                        src="<?=$avatar_url?>" 
                        alt="<?=$fullname?>"
                    >
                </figure>
                <?=$fullname?>
            </a>
        </li>
        <?php endif;?>
    </ul>
     <!-- user account access end-->

     <!-- main menu -->
    <?php
       wp_nav_menu(
            array(
                "container"         => "nav",
                "container_class"   => "main-menu",
                "container_id"      => "nav",
                "fallback_cb"       => false,
                "theme_location"    => "main-menu",
            )
        );
    ?>
    <!-- main-menu end -->
</nav>