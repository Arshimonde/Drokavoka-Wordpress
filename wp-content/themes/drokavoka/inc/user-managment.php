<?php
    // Register lawyer
    add_action("wp_ajax_nopriv_register_lawyer", "register_lawyer");
    add_action("wp_ajax_register_lawyer","register_lawyer");

    function register_lawyer(){
        check_ajax_referer( 'ajax_nounce', 'nonce' );
        //We use parse_str to convert string of params to array
        parse_str($_POST["data"], $data);

        $userdata = array(
            'user_login' =>  $data["username"],
            'user_email'   =>  $data["email"],
            'user_pass'  => $data["password"] ,
            "last_name" => $data["last_name"],
            "first_name" => $data["first_name"],
            "role" => "lawyer"
        );
         
        $user_id = wp_insert_user( $userdata ) ;


        // On success.
        if ( ! is_wp_error( $user_id ) ) {
            // insert user meta
            if(isset($data["gender"]) && !empty($data["gender"])){
                update_user_meta($user_id, "gender", $data["gender"]);
            }
            if(isset($data["address"]) && !empty($data["address"])){
                update_user_meta($user_id, "address", $data["address"]);
            }
            if(isset($data["postal_code"]) && !empty($data["postal_code"])){
                update_user_meta($user_id, "postal_code", $data["postal_code"]);
            }
            if(isset($data["city"]) && !empty($data["city"])){
                update_user_meta($user_id, "city", $data["city"]);
            }
            if(isset($data["mobile_phone"]) && !empty($data["mobile_phone"])){
                update_user_meta($user_id, "phone", $data["mobile_phone"]);
            }
            if(isset($data["fix"]) && !empty($data["fix"])){
                update_user_meta($user_id, "fix", $data["fix"]);
            }
            
            if(isset($data["specialite"]) && !empty($data["specialite"])){
                update_field('specialties', $data["specialite"], 'user_' . $user_id);
            }

            //return data
            wp_send_json_success();

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
            
            $user = wp_authenticate($data["email"], $data["password"]);

            if(! is_wp_error($user)):
                //HERE TO CHECK IF USER IS LAWYER OR CLIENT TO REDIRECT
                wp_send_json_success(array("redirect"=>home_url()));
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