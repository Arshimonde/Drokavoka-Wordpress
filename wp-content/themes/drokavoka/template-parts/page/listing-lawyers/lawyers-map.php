<div id="map_listing" class="normal_list">
<?php
    $shortcode ="[leaflet-map fitbounds scrollwheel zoom=12]\n"; 
    //   $shortcode .= " [leaflet-marker]\n" ;
    $shortcode .= " [leaflet-marker address='rabat']\n" ;
    $shortcode .= " [leaflet-marker address = 'temara']" ;

    echo do_shortcode($shortcode);

    if(isset($addresses) && !empty($addresses)):
        foreach($addresses as $address):

        endforeach;
    endif;
?>
</div>
<!-- /aside -->