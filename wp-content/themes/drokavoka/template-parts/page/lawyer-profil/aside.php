<aside class="col-xl-3 col-lg-4" id="sidebar">
    <div class="box_profile">
        <figure class="mt-2">
            <img src="<?=$user_avatar_url?>" alt="<?=$first_name?> <?=$last_name?>" class="img-fluid">
        </figure>
        <small><?=_e("Maître")?></small>
        <h1><?=$first_name?> <?=$last_name?></h1>
        <!-- <span class="rating">
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star voted"></i>
            <i class="icon_star"></i>
            <small>(145)</small>
            <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
        </span>
        <ul class="statistic">
            <li>854 Views</li>
            <li>124 Patients</li>
        </ul> -->
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