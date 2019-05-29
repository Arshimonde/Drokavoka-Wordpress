<div class="strip_list wow fadeIn 
        <?php
            if ($layout == "map") {
                echo ' visible';
            }
        ?>
    "
>
    <!-- <a href="#0" class="wish_bt"></a> -->
    <figure>
        <a href="/lawyer-profil?id=<?=$user_id?>">
            <?php
                $user_avatar = "http://via.placeholder.com/565x565.jpg";
                if(isset($user_avatar_url) && !empty($user_avatar_url))
                    $user_avatar = $user_avatar_url;
            ?>
            <img src="<?=$user_avatar ?>" alt="<?=$last_name?> <?=$first_name?>">
        </a>
    </figure>
    <h3 class="mb-1">
        <a href="/lawyer-profil?id=<?=$user_id?>">
            <span class="font-weight-light">Maître</span> 
            <?=$last_name?> <?=$first_name?>
        </a>
    </h3>
    <div class="mb-5">
        <?php
            foreach($specialties as $specialty):
                $specialty_term = get_term($specialty);
        ?>
        <small class="d-inline-block badge badge-secondary text-white">
            <?= $specialty_term->name ?>
        </small>
        <?php
            endforeach;
        ?>
    </div>
    <!-- <p>Id placerat </p> -->
    <!-- <span class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i
            class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></span> -->
    <!-- <a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level"
        class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a> -->
    <ul>
        <li>
            <a 
                class="view-on-map" 
                data-location-type = "Doctors"
                data-key = "<?=$marker_key?>" 
                href="#"
            >
                <i class="icon_pin_alt"></i>
                <?=__("Voir sur carte","drokavoka")?>
            </a>
        </li>
        <li><a href="https://www.google.com/maps/dir//Assistance+%E2%80%93+H%C3%B4pitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x0:0xa6a9af76b1e2d899!2sAssistance+%E2%80%93+H%C3%B4pitaux+De+Paris!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank"><i class="icon_pin_alt"></i>Directions</a></li>
        <li><a href="/lawyer-profil?id=<?=$user_id?>"><?=__("Voir profil")?></a></li>
    </ul>
</div>
<!-- /strip_list -->