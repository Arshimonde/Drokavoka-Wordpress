(function($) {
  "use strict"; // Start of use strict
  $(document).ready(function() {
      // Configure tooltips for collapsed side navigation
      $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
        template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
      })
      // Toggle the side navigation
      $("#sidenavToggler").click(function(e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
        $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
        $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
      });
      // Force the toggled class to be removed when a collapsible nav link is clicked
      $(".navbar-sidenav .nav-link-collapse").click(function(e) {
        e.preventDefault();
        $("body").removeClass("sidenav-toggled");
      });
      // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
      $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
        var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;
        this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        e.preventDefault();
      });
      // Scroll to top button appear
      $(document).scroll(function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
          $('.scroll-to-top').fadeIn();
        } else {
          $('.scroll-to-top').fadeOut();
        }
      });
      // Configure tooltips globally
      $('[data-toggle="tooltip"]').tooltip()
      // Smooth scrolling using jQuery easing
      $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
      });
      
      // Inline popups
      $('.inline-popups').each(function () {
        $(this).magnificPopup({
          delegate: 'a',
          removalDelay: 500, //delay removal by X to allow out-animation
          callbacks: {
            beforeOpen: function () {
              this.st.mainClass = this.st.el.attr('data-effect');
            }
          },
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });
      });

    // Bookmarks
    $('.wishlist_close').on('click', function (c) {
      $(this).parent().parent().parent().fadeOut('slow', function (c) {});
    });
      
      // Selectbox
      $(".selectbox").selectbox();
      
      // Pricing add
      function newMenuItem() {
        var newElem = $('tr.pricing-list-item').first().clone();
        newElem.find('input').val('');
        newElem.appendTo('table#pricing-list-container');
      }
      if ($("table#pricing-list-container").is('*')) {
        $('.add-pricing-list-item').on('click', function (e) {
          e.preventDefault();
          newMenuItem();
        });
        $(document).on("click", "#pricing-list-container .delete", function (e) {
          e.preventDefault();
          $(this).parent().parent().parent().remove();
        });
      }
      
      // LAWYER MAP FIELD
      if($("#lawyer_map").length != 0){
        let lat = $("#latitude");
        let lon = $("#longitude");

        let lat_value = "34.02061708722915";
        let lon_value = "-6.834633350372315";
        
        if(lat.val() !== "" && lon.val() !== ""){
          lat_value = lat.val();
          lon_value = lon.val();
        }
        
        var map = L.map('lawyer_map').setView(new L.LatLng(lat_value, lon_value), 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
  
        map.panTo(new L.LatLng(lat_value, lon_value));

        L.marker([lat_value, lon_value],{ draggable: true })
        .on("dragend",function (e) {
          lat.val( this.getLatLng().lat);
          lon.val(this.getLatLng().lng);
        })
        .addTo(map);
      }

      // LAWYER CONFIRM BOOKING
      $(".approve").click(function(evt) {
        $(this).html('<i class="fa fa-lg fa-cog fa-spin"></i>');
        evt.preventDefault();
        var post_id = $(this).data("post_id");
        $.ajax({
            type : "POST",
            url: ajax_object.ajax_url,
            data:{
              "action": "confirm_booking",
              "nonce" : ajax_object.nonce,
              "post_id" : post_id
            },
            success: function(response) {
              swal({
                type: "success",
                text:"Rendez-vous a été confirmé",
                confirmButtonText: 'OK!'
              }).then((result) => {
                  if(result.value){
                      location.reload();
                  }
              });
            }
        });
      });
      // LAWYER CANCEL BOOKING
      $(".delete").click(function(evt) {
        evt.preventDefault();
        $(this).html('<i class="fa fa-lg fa-cog fa-spin"></i>');
        var post_id = $(this).data("post_id");
        $.ajax({
            type : "POST",
            url: ajax_object.ajax_url,
            data:{
              "action": "cancel_booking",
              "nonce" : ajax_object.nonce,
              "post_id" : post_id
            },
            success: function(response) {
              swal({
                type: "success",
                text:"Rendez-vous a été annulé",
                confirmButtonText: 'OK!'
              }).then((result) => {
                  if(result.value){
                      location.reload();
                  }
              });
            }
        });
      });
      // Filter 
      $("#orderby-submit").click(function() {
        var val = $("#orderby").val();
        window.location.href = "/dashboard/?section=bookings&status="+val;
      });

  });
})(jQuery); // End of use strict
