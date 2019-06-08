<?php

// CONFIRM BOOKING
add_action("wp_ajax_confirm_booking","confirm_booking");
add_action("wp_ajax_nopriv_confirm_booking","confirm_booking");
function confirm_booking(){
    check_ajax_referer('ajax_nounce', 'nonce');

    $id = wp_update_post(array(
        'ID'    =>  intval($_POST["post_id"]),
        'post_status'   =>  'publish'
    ));

    if (!is_wp_error($id)) {
        wp_send_json(array("success" => true));
    }
}
// CONFIRM BOOKING END

// cancel BOOKING
add_action("wp_ajax_cancel_booking","cancel_booking");
add_action("wp_ajax_nopriv_cancel_booking","cancel_booking");
function cancel_booking(){
    check_ajax_referer('ajax_nounce', 'nonce');

    $id = wp_update_post(array(
        'ID'    =>  intval($_POST["post_id"]),
        'post_status'   =>  'trash'
    ));

    if (!is_wp_error($id)) {
        wp_send_json(array("success" => true));
    }
}
// cancel BOOKING END

?>