<nav class="col-lg-9 col-6">
    
    <!-- Mobile Menu toggle  -->
    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0">
        <span>Menu mobile</span>
    </a>
    <!-- Mobile Menu toggle end -->

    <!-- user account access -->
    <ul id="top_access">
        <li><a href="#"><i class="pe-7s-user"></i></a></li>
        <li><a href="#"><i class="pe-7s-add-user"></i></a></li>
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
                //"menu_class"        => "six columns omega main-nav sf-menu",
                "theme_location"    => "main-menu",
                //"walker"            => 'Wpse8170_Menu_Walker',
            )
        );
    ?>
    <!-- main-menu end -->
</nav>