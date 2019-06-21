<div class="container margin_60">
    <?php
        $date = "";
        $time = "";
        $needs = "";
        $name  = "";
        $lawyer_id  = "";
        if (isset($_POST) && !empty($_POST)) {
            $date = $_POST["date"];
            $time = $_POST["time"];
            $needs = $_POST["need"];
            $name = $_POST["full_name"];
            $lawyer_id = $_POST["lawyer_id"];
        }else {
            wp_redirect("/404");
            exit();
        }
    ?>
    <form class="row" action = "/booking-success" method = "POST" >
        <input type="hidden" name="lawyer_id" value="<?=$lawyer_id?>">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="time" value="<?=$time?>">
        <div class="col-xl-8 col-lg-8">
            <div class="box_general_3 cart">
                <!-- <div class="message">
                    <p>Exisitng Customer? <a href="#0">Click here to login</a></p>
                </div> -->
                <div class="form_title">
                    <h3><?=__("Vos détails","drokavoka")?></h3>
                    <p>
                        Mussum ipsum cacilds, vidis litro abertis.
                    </p>
                </div>
                <div class="step">
                     <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label><?=__("Prénom","drokavoka")?></label>
                                <input type="text" class="form-control" id="firstname_booking" name="firstname_booking" placeholder="Lorem" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label><?=__("Nom","drokavoka")?></label>
                                <input type="text" class="form-control" id="lastname_booking" name="lastname_booking" placeholder="ipsum" 
                                value=""
                                required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label><?=__("Email","drokavoka")?></label>
                                <input type="email" id="email_booking" name="email_booking" class="form-control"
                                value="" placeholder="example@doe.com" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>
                                    <?=__("Confirmer l'email","drokavoka")?>
                                </label>
                                <input type="email" id="email_booking_2" name="email_booking_2" class="form-control" placeholder="example@doe.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label><?=__("Téléphone","drokavoka")?></label>
                                <input type="text" id="telephone_booking" name="telephone_booking" class="form-control" placeholder="00 00 00 00 00" 
                                value=""
                                required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End step -->
            </div>
        </div> 
        <!-- /col -->
        <aside class="col-xl-4 col-lg-4">
            <div class="box_general_3 booking">

                    <div class="title">
                        <h3><?=__("Votre réservation","drokavoka")?></h3>
                    </div>
                    <div class="summary">
                        <ul>
                            <li>
                                <?=__("Date","drokavoka")?>: 
                                <strong class="float-right"><?=$date?></strong>
                            </li>
                            <li>
                                <?=__("Temps","drokavoka")?>: 
                                <strong class="float-right"><?=$time?></strong>
                            </li>
                            <li>
                                <?=__("Maître","drokavoka")?>: 
                                <strong class="float-right">
                                   <?=$name?>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <ul class="treatments checkout clearfix">
                        <?php
                            $total_price = 0;
                            if(!empty($needs) && isset($needs)):
                            foreach ($needs as $need) {
                                $need = explode(";",$need);
                                $total_price += intval($need[1]);
                        ?>
                        <li>
                            <input type="hidden" name="need[]" value="<?=$need[0]?>;<?=$need[1]?>"/>
                            <?=$need[0]?> 
                            <strong class="float-right"><?=$need[1]?> DH</strong>
                        </li>
                        <?php 
                            }
                            endif;
                        ?>
                        <li class="total">
                            <?=__("Total","drokavoka")?> 
                            <strong class="float-right">
                                <?=$total_price?> DH
                            </strong>
                        </li>
                    </ul>
                    <hr>
                    <button type="submit" class="btn_1 full-width">
                        <?=__("Confirmer","drokavoka")?>
                    </button>

            </div>
            <!-- /box_general -->
        </aside>
        <!-- /asdide -->
    </form>
    <!-- /row -->
</div>