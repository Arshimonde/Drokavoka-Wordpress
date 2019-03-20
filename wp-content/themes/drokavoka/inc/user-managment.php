<?php
    // Register lawyer
    add_action("wp_ajax_nopriv_register_lawyer", "register_lawyer");
    add_action("wp_ajax_register_lawyer","register_lawyer");

    function register_lawyer(){
        check_ajax_referer( 'ajax_nounce', 'nonce' );
        //We use parse_str to convert string of params to array
        parse_str($_POST["data"], $data);
        $is_updated = $_POST["is_update"];
        $tarifs = $_POST["tarifs"];


        $userdata = array(
            'user_login' =>  $data["username"],
            'user_email'   =>  $data["email"],
            'user_pass'  => $data["password"] ,
            "last_name" => $data["last_name"],
            "first_name" => $data["first_name"],
            "role" => "lawyer"
        );
        
        if(isset($is_updated) && $is_updated == "true"):
            unset($userdata["user_login"]);
            unset($userdata["user_pass"]);
            unset($userdata["role"]);
            $userdata["ID"] = $data["user_id"];
            //update first & last name & email 
            $user_id = wp_update_user($userdata);
        else:
            $user_id = wp_insert_user( $userdata ) ;
        endif;


        // On success.
        if ( ! is_wp_error( $user_id ) ) {
            // insert user meta
                // gender
            if(isset($data["gender"]) && !empty($data["gender"])){
                update_user_meta($user_id, "gender", $data["gender"]);
            }
                // address
            if(isset($data["address"]) && !empty($data["address"])){
                update_user_meta($user_id, "address", $data["address"]);
            }
                // postal code
            if(isset($data["postal_code"]) && !empty($data["postal_code"])){
                update_user_meta($user_id, "postal_code", $data["postal_code"]);
            }
                // city
            if(isset($data["city"]) && !empty($data["city"])){
                update_user_meta($user_id, "city", $data["city"]);
            }
                 // state
            if(isset($data["state"]) && !empty($data["state"])){
                update_user_meta($user_id, "state", $data["state"]);
            }
                // mobile phone
            if(isset($data["mobile_phone"]) && !empty($data["mobile_phone"])){
                update_user_meta($user_id, "phone", $data["mobile_phone"]);
            }
                // fix
            if(isset($data["fix"]) && !empty($data["fix"])){
                update_user_meta($user_id, "fix", $data["fix"]);
            }
                // fax
            if(isset($data["fax"]) && !empty($data["fax"])){
                update_user_meta($user_id, "fax", $data["fax"]);
            }
                // specialities
            if(isset($data["specialite"]) && !empty($data["specialite"])){
                update_field('specialties', $data["specialite"], 'user_' . $user_id);
            }
                // free consultation

            if(isset($data["free_consultation"]) && !empty($data["free_consultation"])){
                update_user_meta($user_id, "free_consultation", 1);
            }else{
                update_user_meta($user_id, "free_consultation", 0);
            }
                // cv
            if(isset($data["cv"]) && !empty($data["cv"])){
                update_user_meta($user_id, "cv", $data["cv"]);
            }
                // twitter
            if(isset($data["twitter"]) && !empty($data["twitter"])){
                update_user_meta($user_id, "social_media_twitter", $data["social_media_twitter"]);
            }
                // facebook
            if(isset($data["facebook"]) && !empty($data["facebook"])){
                update_user_meta($user_id, "social_media_facebook", $data["social_media_facebook"]);
            }
                // twitter
            if(isset($data["linkedin"]) && !empty($data["linkedin"])){
                update_user_meta($user_id, "social_media_linkedin", $data["social_media_linkedin"]);
            }
                // tarifs
            if(isset($tarifs)){
               update_field("treatments",$tarifs,"user_".$user_id);
            }
            //return data
            wp_send_json_success(array(
                "message" => __("Modification passé avec succès")
            ));

        }else{
            wp_send_json_error(array(
                "message" => $user_id->get_error_message() 
            ));
        }

        die();
    }
    //Register lawyer END

    // Login USER
    add_action("wp_ajax_login_user","login_user");
    add_action("wp_ajax_nopriv_login_user","login_user");
    
    function login_user(){
        check_ajax_referer('ajax_nounce', 'nonce');
        
        parse_str($_POST["data"],$data);
        

        if(isset($data["email"]) && isset($data["password"])
            && !empty($data["email"])  && !empty($data["password"])):
            $creds = array(
                'user_login'    => $data["email"],
                'user_password' => $data["password"],
                'remember'      => true
            );
         
            $user = wp_signon( $creds, false );

            if(! is_wp_error($user)):
                //HERE TO CHECK IF USER IS LAWYER OR CLIENT TO REDIRECT
                wp_send_json_success(array("redirect"=>home_url("dashboard")));
            else:
                wp_send_json_error(array(
                    "message" => $user->get_error_message() 
                ));
            endif;
        else:
            wp_send_json_error();
        endif;

        die();
    }
    // Login USER END
?>