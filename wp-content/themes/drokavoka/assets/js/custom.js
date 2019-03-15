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
                                window.location.href="/";
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
        $('#submit-register').click(function() {
            $('#register_doctor').submit();
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
    });
});
