<div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
    <?php if(isset($specialties) && !empty($specialties)):?>
    <div class="indent_title_in">
        <i class="pe-7s-study"></i>
        <h3><?=_e("Spécialités")?></h3>
        <p><?=_e("Compétences & Recommandations")?></p>
    </div>
    <div class="wrapper_indent">
        <div class="row">
            <?php
                $half = round(count($specialties) / 2);
                $counter = 1;
                foreach($specialties as $specialty):
                    $specialty_term = get_term($specialty);
            ?>
                <div class="col-lg-6">
                    <ul class="bullets">
                        <li><?= $specialty_term->name ?></li>
            <?php
                    if($counter > $half){
                        echo "</ul></div>";
                        echo '<div class="col-lg-6"><ul class="bullets">';
                    }
            ?>
                    </ul>
                </div>   
            <?php  endforeach ?>
        </div>
        <!-- /row-->
    </div>
    <!-- /wrapper indent -->
    <?php endif;?>
    <hr>

    <?php if(isset($cv) && !empty($cv)): ?>
    <div class="indent_title_in">
        <i class="pe-7s-news-paper"></i>
        <h3><?=_e("Curriculum Vitae")?></h3>
        <p><?= _e("Education")?>, <?=_e("Diplômes")?>, <?=_e("Expériences")?>... </p>
    </div>
    <div class="wrapper_indent">
        <?= $cv ?>
    </div>
    <!--  End wrapper indent -->
    <?php endif;?>
    <hr>

    <?php
        
        if( have_rows('treatments',"user_".$user_id) ):
    ?>
    <div class="indent_title_in">
        <i class="pe-7s-cash"></i>
        <h3><?=_e("Service et Prix")?></h3>
        <p><?=_e("Les traitement que nous offrons")?></p>
    </div>
    <div class="wrapper_indent">

        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th><?=_e("Service")?></th>
                    <th><?=_e("Prix")?></th>
                </tr>
            </thead>
            <tbody>
               <?php
                    // loop through the rows of data
                    while ( have_rows('treatments',"user_".$user_id) ) : 
                        the_row();
               ?>
               <tr>
                   <td><?= the_sub_field('title') ?></td>
                   <td>
                        <?= the_sub_field('price') ?>
                        <small class="badge badge-secondary">DH</small>
                    </td>
               </tr>
               <?php
                    endwhile;
               ?>
            </tbody>
        </table>
    </div>
    <?php endif;?>
    <!--  End wrapper_indent -->

    <hr>

    <?php
        $is_one_set = false;

        if(isset($facebook) && !empty($facebook)):
            $is_one_set = true;
        elseif(isset($twitter) && !empty($twitter)):
            $is_one_set = true;
        elseif(isset($linkedin) && !empty($linkedin)):    
            $is_one_set = true;
        endif;

        if($is_one_set):
    ?>
    <div class="indent_title_in">
        <i class="pe-7s-global"></i>
        <h3><?=_e("Réseaux Sociaux")?></h3>
        <p><?=_e("Facebook, Twitter, Linkedin ")?></p>
    </div>
    <div class="wrapper_indent">
            <div class="d-flex">
                <?php if(isset($facebook) && !empty($facebook)): ?>
                <h3 class="mx-2">
                    <a href="<?=$facebook?>">
                        <span class="social_facebook_square"></span>
                    </a>
                </h3>
                <?php endif;?>

                <?php if(isset($twitter) && !empty($twitter)): ?>
                <h3 class="mx-2">
                    <a href="<?=$twitter?>">
                        <span class="social_twitter_square"></span>
                    </a>
                </h3>
                <?php endif;?>


                <?php if(isset($linkedin) && !empty($linkedin)):?>
                <h3 class="mx-2">
                    <a href="<?=$linkedin?>">
                        <span class="social_linkedin_square"></span>
                    </a>
                </h3>
                <?php endif;?>
            </div>
    </div>
    <?php endif;?>
</div>
<!-- /tab_2 -->