<div class="tab-pane fade show active" id="book" role="tabpanel" aria-labelledby="book-tab">
    <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
    <form>
        <div class="main_title_3">
            <h3><strong>1</strong>Select your date</h3>
        </div>
        <div class="form-group add_bottom_45">
            <div id="calendar"></div>
            <input type="hidden" id="my_hidden_input">
            <ul class="legend">
                <li><strong></strong>Available</li>
                <li><strong></strong>Not available</li>
            </ul>
        </div>
        <div class="main_title_3">
            <h3><strong>2</strong>Select your time</h3>
        </div>
        <div class="row justify-content-center add_bottom_45">
            <div class="col-md-3 col-6 text-center">
                <ul class="time_select">
                    <li>
                        <input type="radio" id="radio1" name="radio_time" value="09.30am">
                        <label for="radio1">09.30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio2" name="radio_time" value="10.00am">
                        <label for="radio2">10.00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio3" name="radio_time" value="10.30am">
                        <label for="radio3">10.30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio4" name="radio_time" value="11.00am">
                        <label for="radio4">11.00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio5" name="radio_time" value="11.30am">
                        <label for="radio5">11.30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio6" name="radio_time" value="12.00am">
                        <label for="radio6">12.00</label>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-6 text-center">
                <ul class="time_select">
                    <li>
                        <input type="radio" id="radio7" name="radio_time" value="01.30pm">
                        <label for="radio7">13:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio8" name="radio_time" value="02.00pm">
                        <label for="radio8">14:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio9" name="radio_time" value="02.30pm">
                        <label for="radio9">14:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio10" name="radio_time" value="03.00pm">
                        <label for="radio10">15:00</label>
                    </li>
                    <li>
                        <input type="radio" id="radio11" name="radio_time" value="03.30pm">
                        <label for="radio11">15:30</label>
                    </li>
                    <li>
                        <input type="radio" id="radio12" name="radio_time" value="04.00pm">
                        <label for="radio12">16:00</label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /row -->
        
        <div class="main_title_3">
            <h3><strong>3</strong>Select visit</h3>
        </div>
        <ul class="treatments clearfix">
            <?php
                if( have_rows('treatments',"user_".$user_id) ):
                    while ( have_rows('treatments',"user_".$user_id) ) : 
                        the_row();
            ?>
            <li>
                <div class="checkbox">
                    <input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
                    <label for="visit1" class="css-label">
                        <?= the_sub_field('title') ?>
                         <strong>                        
                            <?= the_sub_field('price') ?> DH
                        </strong>
                    </label>
                </div>
            </li>
            <?php 
                    endwhile;
                endif;
            ?>
        </ul>
    </form>					
    <hr>
    <p class="text-center"><a href="booking-page.html" class="btn_1 medium">Book Now</a></p>
</div>
<!-- /tab_1 -->