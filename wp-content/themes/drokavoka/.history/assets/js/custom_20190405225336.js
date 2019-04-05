jQuery(function($){
    $(document).ready(function(){
        //Select Picker
        $(".selectpicker").selectpicker();
        //Select Picker END

        // Lawyer REGISTER AJAX
        $('#register_doctor').submit(function(){
            $('#submit-register')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled','disabled');
            $.ajax({
                type:"POST",
                url:ajax_object.ajax_url,
                data:{
                    action:"register_lawyer",
                    nonce: ajax_object.nonce,
                    data:$(this).serialize(),
                    is_update: false,
                },
                success:function(response){
                    if(response.success === true){
                        //Redirect user to his appropriate page
                        swal({
                            type: "success",
                            text:"Bienvenue dans votre platforme",
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            if(result.value){
                                window.location.href="/login";
                            }
                        });
                    }else{
                        swal({
                            type: "warning",
                            html:response.data.message,
                        });
                        $('#submit-register').next(".icon-spin4").remove();
                        $('#submit-register').prop("disabled", false); 
                    }
                }
            });
            return false;
        });
        // Lawyer REGISTER AJAX END

        // USER LOGIN AJAX
        $('#login-form').submit(function(){
            $('#login-submit')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled','disabled');

            $.ajax({
                type:"POST",
                url:ajax_object.ajax_url,
                data:{
                    action:"login_user",
                    nonce: ajax_object.nonce,
                    data:$(this).serialize(),
                },
                success:function(response){
                    if(response.success === true){
                        //Redirect user to his appropriate page
                        window.location.href = response.data.redirect;
                    }else{
                        swal({
                            type: "warning",
                            html:response.data.message,
                        });
                        $('#login-submit').next(".icon-spin4").remove();
                        $('#login-submit').prop("disabled", false); 
                    }
                }
            });
            return false;
        });
        // USER LOGIN AJAX END

        // USER UPDATE PROFILE
        $('#lawyer-update-profile').submit(function(){
            $('#submit-update-profile')
            .after('<i class="icon-spin4 animate-spin loader"></i>')
            .attr('disabled','disabled');

            tinyMCE.triggerSave();
            //get treatments
            let treatment = [];
            $(".treatment").each(function(){
                let title = $(this).find(".tarif-title").val();
                let price = $(this).find(".tarif-price").val();
                treatment.push({
                    title:title,
                    price:price
                });
            });
            
            //USER UPDATE PROFILE
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data:{
                    action:"register_lawyer",
                    nonce: ajax_object.nonce,
                    data: $(this).serialize(),
                    tarifs:treatment,
                    is_update: true,
                },
                success: function (response) {
                    if(response.success === true){
                        //Redirect user to his appropriate page
                        swal({
                            type: "success",
                            text:response.data.message,
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            if(result.value){
                                location.reload();
                            }
                        });
                    }else{
                        swal({
                            type: "warning",
                            html:response.data.message,
                        });
                        $('#submit-update-profile').next(".icon-spin4").remove();
                        $('#submit-update-profile').prop("disabled", false); 
                    }
                }
            });

            return false;
        });
        // USER UPDATE PROFILE END

        // LOGOUT FROM DASHBOARD
        $("#dashboard-logout").click(function() {
            $.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data:{
                    action:"user_logout",
                    nonce: ajax_object.nonce,
                },
                success: function (response) {
                    if(response.success === true){
                        //Redirect user to his appropriate page
                        window.location.href = response.data.redirect;
                    }
                }
            });
        });
        // LOGOUT FROM DASHBOARD END
     
    });
    
    // AUTOCOMPLETE
    $('.typeahead').typeahead(
      {
        source: function(query, process) {
           return process( 
                ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
                'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
                'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
                'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
                'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
                'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
                'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
                'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
                'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
                ] 
            ); 
        }
    });
    // AUTOCOMPLETE END

});
