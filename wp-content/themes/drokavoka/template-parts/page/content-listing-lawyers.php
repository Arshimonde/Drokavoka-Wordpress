<?php
    $no = 9;
    $user_query = get_lawyers_listing_query($no);
    $lawyers = $user_query->get_results();
    // WP USER QUERY END
    $layout = "list";
    if (isset($_GET["layout"]) && !empty($_GET["layout"])) {
        $layout = $_GET["layout"];
    }

    // container type 
    $container_class = "container-fluid full-height";
    if($layout != 'map'){
        include "listing-lawyers/results-search.php";
        include "listing-lawyers/sort-by.php";
        $container_class = "container margin_60_35";
    }
?>
<div class="<?=$container_class?>">
    <?php
        switch ($layout) {
            case 'grid':
                include "listing-lawyers/lawyers-grid.php";
                break;
            case 'map':
                include "listing-lawyers/lawyers-list-map.php";
                break;
            default:
                include "listing-lawyers/lawyers-list.php";
                break;
        }
    ?>
</div>

