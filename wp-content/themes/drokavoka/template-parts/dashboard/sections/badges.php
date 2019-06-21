<?php 
    $views = get_user_meta( $user_id,"user_views",true);
    $clients_count = get_user_clients_count($user_id);
    $level = get_badge_level($views,$clients_count);
    $imgs_url = get_template_directory_uri()."/assets/images/badges"; 
?>

<div class="main_title">
    <h1 class="text-center mb-3">
        <strong><?=__("Niveaux","drokavoka")?></strong> <?=__("atteints","drokavoka")?>
    </h1>
</div>
<div class="row">

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_1" class="<?php if($level < 1 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_1.svg" alt="" width="100" height="100">
                <?php if($level < 1 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 1</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> &lt; 10 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 0 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_2" class="<?php if($level < 2 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_2.svg" alt="" width="100" height="100">
                <?php if($level < 2 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 2</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> 10 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 2 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_3" class="<?php if($level < 3 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_3.svg" alt="" width="100" height="100">
                <?php if($level < 3 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 3</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> 30 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 4 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_4" class="<?php if($level < 4 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_4.svg" alt="" width="100" height="100">
                <?php if($level < 4 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 4</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> 50 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 10 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_5" class="<?php if($level < 5 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_5.svg"  width="100" height="100">
                <?php if($level < 5 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 5</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> 100 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 15 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="box_badges">
            <div id="badge_level_6" class="<?php if($level < 6 ) echo "disabled_badge" ?>">
                <img src="<?=$imgs_url?>/badge_6.svg" alt="" width="100" height="100">
                <?php if($level < 6 ): ?>
                <i class="icon-lock"></i>
                <?php endif;?>
            </div>
            <h3><?= __("Niveau","drokavoka") ?> 6</h3>
            <ul class="px-0">
                <li><i class="icon-eye-7"></i> 200 <?=__("Vues","drokavoka")?></li>
                <li><i class="icon-users-1"></i> 25 <?=__("Clients","drokavoka")?></li>
            </ul>
        </div>
    </div>

</div>
<!--/row-->