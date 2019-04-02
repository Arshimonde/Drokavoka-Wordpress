<div class="container margin_120_95">
    <div class="main_title">
        <h2><?=_e("Trouvez votre avocat")?></h2>
        <p>Nec graeci sadipscing disputationi ne, mea ea nonumes percipitur. Nonumy ponderum oporteat cu mel, pro movet cetero at.</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="list_home">
                <div class="list_title">
                    <i class="icon_pin_alt"></i>
                    <h3><?=_e("Recherche par ville")?></h3>
                </div>
                <ul>
                    <li><a href="#0"><strong>23</strong>Albany</a></li>
                    <li><a href="#0"><strong>23</strong>Albuquerque</a></li>
                    <li><a href="#0"><strong>23</strong>Atlanta</a></li>
                    <li><a href="#0"><strong>23</strong>Baltimore</a></li>
                    <li><a href="#0"><strong>23</strong>Baton Rouge</a></li>
                    <li><a href="#0"><strong>23</strong>Birmingham</a></li>
                    <li><a href="#0"><strong>23</strong>Boston</a></li>
                    <li><a href="#0"><strong>23</strong>Buffalo</a></li>
                    <li><a href="#0"><strong>23</strong>Charleston</a></li>
                    <li><a href="#0">More...</a></li>
                </ul>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-6">
            <div class="list_home">
                <div class="list_title">
                    <i class="icon_archive_alt"></i>
                    <h3><?=_e("Recherche par spécialité")?></h3>
                </div>
                <ul>
                    <?php
                        $specialties = get_terms(array(
                            'taxonomy' => 'lawyer_specialte',
                            'hide_empty' => false,
                            "parent"=>0,
                            "hierarchical"=>false,
                        ));
                        $counter = 1;
                        foreach($specialties as $spec):
                            $class = "";
                            if($spec->parent == 0) 
                                $class ="";
                            else  $class ="";
                    ?>
                    <li>
                        <a href="#0">
                            <strong><?=$counter?></strong>
                            <?=$spec->name?>
                        </a>
                    </li>
                    <?php
                        $counter++;
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->