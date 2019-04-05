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
                <?php
                    $cites = get_terms(array(
                        'taxonomy' => 'cities',
                        'hide_empty' => false,
                    ));
                    shuffle( $cites );
                    $cites = array_slice( $cites, 0, 18 );

                    $counter = 1;
                    foreach($cites as $city):
                ?>
                    <li>
                        <a href="#0">
                            <strong><?=$counter?></strong>
                            <?=$city->name?>
                        </a>
                    </li>
                <?php
                    $counter++;
                    endforeach;
                ?>
                    <li>
                        <a  
                        href="/listing-lawyers?term_id=<?=$city->term_id?>&taxonomy=cities"
                        >
                            <?=_e("Plus")?>
                        </a>
                    </li>
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
                        <a 
                        href="/listing-lawyers?term_id=<?=$spec->term_id?>&taxonomy=lawyer_specialte"
                        >
                            <strong><?=$counter?></strong>
                            <?=$spec->name?>
                        </a>
                    </li>
                    <?php
                        $counter++;
                        endforeach;
                    ?>
                    <li>
                        <a href="#0">
                            <?=_e("Plus")?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->