<?php
    $img_url = get_template_directory_uri()."/assets/images"
?>

<div class="container margin_120_95">
    <div class="main_title">
        <h2>
            <?=_e("découvrez le rendez-vous")?>
            <strong><?=_e("en ligne!")?></strong>
        </h2>
        <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie. Sed ad debet scaevola, ne mel.</p>
    </div>
    <div class="row add_bottom_30">
        <div class="col-lg-4">
            <div 
                class="box_feat" id="icon_1" 
                style="background-image:url(<?=$img_url?>/icon-home-1.svg);"
            >
                <span style="background-image:url(<?=$img_url?>/arrow-gray-1.svg);"></span>
                <h3><?=_e("Trouver un avocat")?></h3>
                <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div 
                class="box_feat" id="icon_2"
                style="background-image:url(<?=$img_url?>/icon-home-2.svg);"
            >
                <span style="background-image:url(<?=$img_url?>/arrow-gray-1.svg);"></span>
                <h3><?=_e("Voir le profil")?></h3>
                <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div 
                class="box_feat" id="icon_3"
                style="background-image:url(<?=$img_url?>/icon-home-3.svg);"
            >
                <h3><?=_e("Réserver une visite")?></h3>
                <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri. In eum omnes molestie.</p>
            </div>
        </div>
    </div>
    <!-- /row -->
    <p class="text-center"><a href="/listing-lawyers" class="btn_1 medium"><?=_e("Trouver un avocat")?></a></p>

</div>
<!-- /container -->