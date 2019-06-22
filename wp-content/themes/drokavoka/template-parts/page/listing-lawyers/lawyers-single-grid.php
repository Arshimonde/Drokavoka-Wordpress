<div class="box_list wow fadeIn">
    <figure>
        <a href="/lawyer-profil?id=<?=$user_id?>">
            <?php
                $user_avatar = "http://via.placeholder.com/565x565.jpg";
                if(isset($user_avatar_url) && !empty($user_avatar_url))
                    $user_avatar = $user_avatar_url;
            ?>
            <img src="<?=$user_avatar ?>" class="img-fluid" alt="<?=$last_name?> <?=$first_name?>">
            <div class="preview"><span><?=__("Savoir plus","drokavoka")?></span></div>
        </a>
    </figure>
    <div class="wrapper">
        <h3 class="mb-1">
            <a href="/lawyer-profil?id=<?=$user_id?>">
                <span class="font-weight-light">Maître</span> 
                <?=$last_name?> <?=$first_name?>
            </a>
        </h3>
        <div class="mb-4">
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
        <?php include "ratings.php"; ?>
    </div>
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
        <li>            
            <a 
                href="#" class="show-direction"                 
                data-location-type = "Doctors"
                data-key = "<?=$marker_key?>">
                <i class="icon_pin_alt"></i>
                <?=__("Directions","drokavoka")?>
            </a>
        </li>
        <li><a href="/lawyer-profil?id=<?=$user_id?>"><?=__("Voir profil")?></a></li>
    </ul>
</div>
<!-- /box_list -->