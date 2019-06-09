<?php

   include "sections/dashboard-nav.php";
?>
  <div class="content-wrapper">
      <div class="container-fluid">
         <?php
            $section = $_GET["section"];
            if(isset($section) && !empty($section)):
               // breadcrumb
               include "sections/breadcrumb.php";
               // content
               switch($section){
                  case "lawyer-profil":{
                     include "sections/lawyer-profil.php";
                     break;
                  }
                  case "bookings":{
                     include "sections/bookings.php";
                     break;
                  }
                  case "reviews":{
                     include "sections/reviews.php";
                     break;
                  }
               }

            endif;
         ?>
      </div> <!-- /.container-fluid-->
   </div><!-- /.container-wrapper-->

<?php
   include "sections/footer.php";
   include "sections/logout-modal.php";
?>
   