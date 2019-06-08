<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>

    <!-- get the current bread -->
    <?php
        $current_bread = "";
        switch($section){
            case "lawyer-profil":{
                $current_bread = __("Mon profil","drokavoka");
                break;
            }
            case "bookings":{
                $current_bread = __("Réservations","drokavoka");
                break;
            }
        }
    ?>
    <!-- get the current bread end -->

    <li class="breadcrumb-item active"><?=$current_bread?></li>
</ol>