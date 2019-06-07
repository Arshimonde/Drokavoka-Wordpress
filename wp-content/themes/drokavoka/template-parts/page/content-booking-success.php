<div class="container margin_120">

    <?php
        $email = "";
        $date = "";
        $time = "";
        $needs = "";
        $name  = "";
        $phone  = "";
        $lawyer_id  = "";
        if (isset($_POST) && !empty($_POST)) {
            $email = $_POST["email_booking"];
            $date = $_POST["date"];
            $time = $_POST["time"];
            $needs = $_POST["need"];
            $name  = $_POST["firstname_booking"]." ".$_POST["lastname_booking"];
            $phone  = $_POST["telephone_booking"];
            $lawyer_id  = $_POST["lawyer_id"];
            insert_booking($lawyer_id,$date,$time,$needs,$name,$phone,$email);
        }else {
            wp_redirect("/404");
            exit();
        }
    ?>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div id="confirm">
                <div class="icon icon--order-success svg add_bottom_15">
                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
                        <g fill="none" stroke="#8EC343" stroke-width="2">
                            <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                            <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                        </g>
                    </svg>
                </div>
                <h2><?=__("Merci pour votre réservation!","drokavoka")?></h2>
                <p> <?=__("Vous recevrez un email de confirmation à l'adresse mail","drokavoka")?> <em><?=$email?></em></p>
                <a href="/" class = "btn_1">
                    <?=__("Continuer","drokavoka")?>
                </a>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->