<div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
    <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
    <form action="/confirm-reserving" method="POST">
        <input type="hidden" name="full_name" value="<?=$first_name?> <?=$last_name?>">
        <input type="hidden" name="lawyer_id" value="<?=$user_id?>">
        <div class="main_title_3">
            <h3>
                <strong>1</strong>
                <?=__("Sélectionnez votre date","drokavoka")?>
            </h3>
        </div>
        <div class="form-group add_bottom_45">
            <div id="calendar"></div>
            <input type="hidden" id="date" name="date">
            <ul class="legend">
                <li>
                    <strong></strong>
                    <?=__("Disponible","drokavoka")?>
                </li>
                <li>
                    <strong></strong>
                    <?=__("Indisponible","drokavoka")?>
                </li>
            </ul>
        </div>
        <div class="main_title_3">
            <h3>
                <strong>2</strong>
                <?=__("Sélectionnez votre heure","drokavoka")?>
            </h3>
        </div>
        <div class="row justify-content-center add_bottom_45">
            <div class="col-md-3 col-6 text-center">
                <ul class="time_select">
                    <li>
                        <input type="radio" id="radio1" name="time" value="09:30">
                        <label for="radio1">09:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio2" name="time" value="10:00">
                        <label for="radio2">10:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio3" name="time" value="10:30">
                        <label for="radio3">10:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio4" name="time" value="11:00">
                        <label for="radio4">11:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio5" name="time" value="11:30">
                        <label for="radio5">11:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio6" name="time" value="12:00">
                        <label for="radio6">12:00</label>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-6 text-center">
                <ul class="time_select">
                    <li>
                        <input type="radio" id="radio7" name="time" value="13:30">
                        <label for="radio7">13:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio8" name="time" value="14:00">
                        <label for="radio8">14:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio9" name="time" value="14:30">
                        <label for="radio9">14:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio10" name="time" value="15:00">
                        <label for="radio10">15:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio11" name="time" value="15:30">
                        <label for="radio11">15:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio12" name="time" value="16:00">
                        <label for="radio12">16:00</label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /row -->
        
        <div class="main_title_3">
            <h3>
                <strong>3</strong>
                <?=__("Quel est votre besoin ?","drokavoka")?>
            </h3>
        </div>
        <ul class="treatments clearfix">
            <?php
                if( have_rows('treatments',"user_".$user_id) ):
                    $increment = 1;
                    while ( have_rows('treatments',"user_".$user_id) ) : 
                        the_row();
            ?>
            <li>
                <div class="checkbox">
                    <input type="checkbox" class="css-checkbox" id="visit<?=$increment?>" name="need[]" value="<?= the_sub_field('title') ?>;<?=the_sub_field('price') ?>">
                    <label for="visit<?=$increment?>" class="css-label">
                        <?= the_sub_field('title') ?>
                         <strong>                        
                            <?= the_sub_field('price') ?> DH
                        </strong>
                    </label>
                </div>
            </li>
            <?php  
                    $increment++;
                    endwhile;
                endif;
            ?>
        </ul>
        <hr>
        <p class="text-center">
            <button type="submit" class="btn_1 medium">
                <?=__("Reserver maintenant","drokavoka")?>
            </button>
        </p>
    </form>					
</div>
<!-- /tab_1 -->