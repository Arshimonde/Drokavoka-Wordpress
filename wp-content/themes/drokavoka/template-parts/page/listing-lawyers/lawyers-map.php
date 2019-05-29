<?php
    $map_class = "normal_list";
    if(isset($layout) && $layout == 'map'){
        $map_class = "";
    }
?>
<div id="map_listing" class="<?=$map_class?>">
</div>
<!-- /aside -->