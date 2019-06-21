<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <?php if($section != "dashboard"): ?>
    <li class="breadcrumb-item">
        <a href="/dashboard?section=dashboard"><?=__("Tableau de bord","drokavoka");?></a>
    </li>
    <?php endif;?>
    <!-- get the current bread -->
    <?php
        $current_bread = "";
        switch($section){
            case "dashboard":{
                $current_bread = __("Tableau de bord","drokavoka");
                break;
            }
            case "lawyer-profil":{
                $current_bread = __("Mon profil","drokavoka");
                break;
            }
            case "bookings":{
                $current_bread = __("Réservations","drokavoka");
                break;
            }
            case "reviews":{
                $current_bread = __("Avis","drokavoka");
                break;
            }
            case "badges":{
                $current_bread = __("Badges","drokavoka");
                break;
            }
        }
    ?>
    <!-- get the current bread end -->

    <li class="breadcrumb-item active"><?=$current_bread?></li>
</ol>