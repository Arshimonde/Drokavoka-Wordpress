<aside class="col-xl-3 col-lg-4">
    <div class="box_profile">
        <figure class="mt-2">
            <img width="100" src="<?=$user_avatar_url?>" alt="<?=$first_name?> <?=$last_name?>" class="img-fluid">
        </figure>
        <small><?=_e("Maître")?></small>
        <h1><?=$first_name?> <?=$last_name?></h1>
        <?php 
           include(locate_template("template-parts/page/listing-lawyers/ratings.php")); 
        ?>
        
        <ul class="statistic">
            <?php
                if (empty($views)) {
                    $views = 0;
                }

                if ($views > 1) {
                    $plural = "s";
                }  
            ?>
            <li><?= $views." ". __("Vue$plural","drokavoka") ?></li>
            <!-- Clients -->
            <?php
                $count = get_user_clients_count($user_id);
                $plural = "";
                if ($count > 1) {
                    $plural = "s";
                }                
            ?>
            <li><?= $count ." ". __("Client$plural","drokavoka") ?></li>
        </ul>
        <ul class="contacts row">
            <?php 
                if(isset($city) && !empty($city)):
                    $city_term = get_term($city,"cities");
                    $city_name = $city_term->name;
            ?>
            <li class="col-md-6 pl-0 px-1"><h6><?=_e("Ville")?></h6><?=$city_name?></li>
            <?php endif; ?>
            
            <?php if(isset($phone) && !empty($phone)): ?>
            <li class="col-md-6 px-1"><h6><?=_e("Téléphone")?></h6><a href="tel://<?=$phone?>"><?=$phone?></a></li>
            <?php endif; ?>

            <?php if(isset($fix) && !empty($fix)): ?>
            <li class="col-md-6 pl-0 px-1"><h6><?=_e("Fix")?></h6><a href="tel://<?=$fix?>"><?=$fix?></a></li>
            <?php endif; ?>

            <?php if(isset($fax) && !empty($fax)): ?>
            <li class="col-md-6 px-1"><h6><?=_e("Fax")?></h6><?=$fax?></li>
            <?php endif; ?>
            <?php if(isset($address) && !empty($address)): ?>
            <li class="col-md-12 px-0"><h6><?=_e("Adresse")?></h6><?=$address?>, <?=$postal_code?></li>
            <?php endif; ?>
        </ul>
        <div class="text-center"><a href="#" class="btn_1 outline"><i class="icon_pin"></i> <?=_e("Voir sur map")?></a></div>
    </div>
</aside>
<!-- /asdide -->