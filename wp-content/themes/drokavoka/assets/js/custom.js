jQuery(function($){
    $(document).ready(function(){
        //Select Picker
        // $(".selectpicker").selectpicker();
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
        
        // AUTOCOMPLETE
        $('.typeahead-lawyers').typeahead({
            hint: true,
            highlight: true,
          },
          {
            source : function (query, syncResults) {
                var result = findMatches(query,ajax_object.lawyers_names);
                syncResults(result);
            },
            limit: 8
        });
        $('.typeahead-list-lawyers').typeahead({
            hint: true,
            highlight: true,
          },
          {
            source : function (query, syncResults) {
                var result = findMatches(query,ajax_object.listing_search_data);
                syncResults(result);
            },
            limit: 8
        });
        // AUTOCOMPLETE END


        // Datepicker
		$('#calendar').datepicker({
			todayHighlight: true,
			daysOfWeekDisabled: [0],
			weekStart: 1,
			format: "yyyy-mm-dd",
			datesDisabled: ["2017/10/20", "2017/11/21", "2017/12/21", "2018/01/21", "2018/02/21", "2018/03/21"],
        }).datepicker('setDate', 'now');
        // before change date
        changeBookingDate();
        // after change date
        $('#calendar').on('changeDate', function() {
            changeBookingDate();
        });
        // Datepicker END
    });

    function changeBookingDate() {
        $('#date').val(
            $('#calendar').datepicker('getFormattedDate')
        );
    }

    function findMatches(q,data) {
        var matches, substringRegex;
    
        // an array that will be populated with substring matches
        matches = [];
    
        // regex used to determine if a string contains the substring `q`
        substringRegex = new RegExp(q, 'i');
    
        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(data, function(i, str) {
            if (substringRegex.test(str)) {
                matches.push( decodeHtml(str) );
            }
        });
        
        return matches;
    }

    function decodeHtml(html) {
        var txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }


});
