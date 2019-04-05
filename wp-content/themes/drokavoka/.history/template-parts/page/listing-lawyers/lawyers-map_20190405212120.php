<div id="map_listing" class="normal_list">
<?php
    $shortcode ="[leaflet-map zoom=18 fitbounds scrollwheel]\n"; 

    if(isset($addresses) && !empty($addresses)):
        foreach($addresses as $address):
            $shortcode .= " [leaflet-marker visible lat=".$address["lat"]." lng=".$address["lon"]."]". $address['lawyer_name']."[/leaflet-marker]\n" ;
        endforeach;
    endif;

    echo do_shortcode($shortcode);
?>
</div>
<!-- /aside -->