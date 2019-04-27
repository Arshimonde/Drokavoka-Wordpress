<!-- VARIABLES -->
<?php
    $user_id = get_current_user_id();
    $img_id = get_user_meta($user_id,"wp_user_avatar",true);
    $user_avatar_url = wp_get_attachment_image_url($img_id);
    $user_info = get_userdata($user_id);
    $first_name = get_user_meta($user_id, "first_name",true);
    $last_name = get_user_meta($user_id, "last_name",true);
    $email = $user_info->user_email;
    $gender = get_user_meta($user_id, "gender",true);
    $address = get_user_meta($user_id, "address",true);
    $postal_code = get_user_meta($user_id, "postal_code",true);
    $latitude = get_user_meta($user_id, "latitude",true);
    $longitude = get_user_meta($user_id, "longitude",true);
    $state = get_user_meta($user_id, "state",true);
    $city = get_user_meta($user_id, "city",true);
    $user_specialties = get_user_meta($user_id, "specialties",true);
    $is_free_consultation = get_user_meta($user_id, "free_consultation",true)[0];
    $cv = get_field("cv","user_".$user_id);
    $phone = get_user_meta($user_id, "phone",true);
    $fax = get_user_meta($user_id, "fax",true);
    $fix = get_user_meta($user_id, "fix",true);
    $twitter = get_user_meta($user_id, "social_media_twitter",true);
    $facebook = get_user_meta($user_id, "social_media_facebook",true);
    $linkedin = get_user_meta($user_id, "social_media_linkedin",true);
?>
<!-- VARIABLES END-->

<!-- USER AVATAR -->
<div class="box_general padding_bottom">
    <div class="header_box version_2">
        <h2>
            <i class="fa fa-file"></i>
            <?=_e("Photo de profil")?>
        </h2>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <!-- img here -->
            <?php echo do_shortcode("[avatar_upload]");?>
        </div>
    </div>
    <!-- /row-->
</div>
<!-- OTHER FIELDS -->
<form id="lawyer-update-profile">
    <input type="hidden" value="<?=$user_id?>" name="user_id">
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2>
                <i class="fa fa-file"></i>
                <?=_e("Informations de base")?>
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <!-- Gender -->
                    <div class="custom-control custom-radio custom-control-inline">
                        <?php
                            $checked = ($gender == "man") ? "checked" : "";
                            
                        ?>
                        <input class="custom-control-input" type="radio" name="gender" id="mr" value="man" <?php echo $checked; ?>>
                        <label class="custom-control-label mt-1" for="mr">Monsieur</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <?php
                            $checked = ($gender == "women") ? "checked" : "";
                        ?>
                        <input class="custom-control-input" type="radio" name="gender" id="mme" value="women" <?php echo $checked; ?>>
                        <label class="custom-control-label mt-1" for="mme">Madame</label>
                    </div>
                </div>
            </div>
    
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Prénom")?></label>
                    <input 
                        type="text" class="form-control" name="first_name"
                        placeholder="<?=_e("Votre Prénom")?>"
                        value = "<?=$first_name?>"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Nom")?></label>
                    <input 
                        type="text" class="form-control" name="last_name"
                        placeholder="<?=_e("Votre nom")?>"
                        value = "<?=$last_name?>"
                    >
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Téléphone")?></label>
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="<?=_e("Votre numéro de téléphone")?>"
                        name="phone"
                        value ="<?=$phone?>"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Email")?></label>
                    <input 
                        type="email" 
                        class="form-control" 
                        name="email"
                        placeholder="<?=_e("Votre adresse de messagerie")?>"
                        value="<?=$email?>"
                    >
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Fix")?></label>
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="<?=_e("Votre numéro de téléphone fixe")?>"
                        name="fix"
                        value="<?=$fix?>"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Fax")?></label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="fax"
                        placeholder="<?=_e("Votre numéro de faxe")?>"
                        value="<?=$fax?>"
                    >
                </div>
            </div>
        </div>
        <!-- /row-->
    </div>
    <!-- /box_general-->
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-map-marker"></i>
                <?=_e("Adresse")?>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Ville")?></label>
                    <?php render_cities_select($city); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Adresse")?></label>
                    <input 
                        type="text" class="form-control" name="address"
                        placeholder="<?=_e("Votre adresse")?>"
                        value="<?=$address?>"
                    >
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Région")?></label>
                    <input 
                        type="text" class="form-control" name="state"
                        placeholder="<?=_e("Votre région")?>"
                        value="<?=$state?>"
                    >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Code postal")?></label>
                    <input 
                        type="text" class="form-control" name="postal_code"
                        placeholder="<?=_e("Votre code postal")?>"
                        value="<?=$postal_code?>"
                    >
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Latitude")?></label>
                    <input 
                        type="text" class="form-control" id="latitude" name="latitude"
                        placeholder="<?=_e("Votre Latitude")?>"
                        value="<?=$latitude?>"
                    >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><?=_e("Longitude")?></label>
                    <input 
                        type="text" class="form-control" id="longitude" name="longitude"
                        placeholder="<?=_e("Votre longitude")?>"
                        value="<?=$longitude?>"
                    >
                </div>
            </div>

            <div class="col-md-12">
                <label><?=_e("Glisser le markeur à votre position")?></label>
                <div id="lawyer_map"></div>
            </div>
        </div>
    </div>
    <!-- /box_general-->
    
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-file-text"></i>
                <?=_e("Curriculum vitae")?>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label><?=_e("Spécialité(s)")?></label>
                    <!-- spécialité -->
                    <select name="specialite[]" id="specialites" class="selectpicker border" title="Choisir une ou plusieurs spécialité*"
                        data-live-search="true" data-width="100%" data-size="5" multiple required>
                        <?php
                            $specilities = get_terms( "lawyer_specialte",array( 
                                    "hide_empty" => 0,
                                    "parent" => 0
                                )  
                            );
                            foreach($specilities as $speciality):
                                $selected = "";
                                foreach ($user_specialties as $user_sp) {
                                    if($user_sp == $speciality->term_id){
                                        $selected = "selected";
                                        break;
                                    }
                                }
                                           
                        ?>
                            <option 
                                value="<?= $speciality->term_id ?>" 
                                <?=$selected?>
                            >
                                <?= $speciality->name  ?>
                            </option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <label><?=_e("Déscription")?></label>
                    <small class="text-muted d-block">
                        <?=__("Conférences, écoles, livres écrits, associations, entreprises créées et récompenses")?>
                    </small>
                    <?php
                        $content = $cv;
                        $editor_id = 'cv';
                        wp_editor( $content, $editor_id );
                    ?>
                </div>
            </div>
        </div>
        <!-- /row-->
    </div>
    <!-- /box_general-->
    
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-folder"></i><?=_e("Tarifs")?></h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="custom-control custom-checkbox d-flex align-items-center w-100 mb-3">
                    <?php
                        $checked = $is_free_consultation == 0 ? "" : "checked";
                    ?>
                    <input type="checkbox" class="custom-control-input" id="free" name="free_consultation"  <?php echo $checked; ?>>
                    <label class="custom-control-label" for="free">
                        <h6 class="my-0"><?=_e("J'offre la consultation gratuite")?></h6>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <h6><?=_e("Traitements")?></h6>
                <table id="pricing-list-container" style="width:100%;">
                    <!-- treatments -->
                    <?php
                        if( have_rows('treatments',"user_".$user_id) ):

                            // loop through the rows of data
                        while ( have_rows('treatments',"user_".$user_id) ) : 
                                the_row();
                    ?>
                    <tr class="pricing-list-item">
                        <td class="treatment">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control tarif-title" placeholder="<?=_e("Titre (Divorce,Héritage,Conseil Business...)")?>"
                                        value="<?=the_sub_field('title')?>"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex align-items-center">
                                        <input type="text" class="form-control tarif-price"  placeholder="<?=_e("Prix (MAD)")?>"
                                        value="<?=the_sub_field('price')?>"
                                        >
                                        <small class="badge badge-secondary rounded-circle p-2 ml-1">DH</small>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                            endwhile;
                        else:
                    ?>
                         <tr class="pricing-list-item">
                        <td class="treatment">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control tarif-title" placeholder="<?=_e("Titre (Divorce,Héritage,Conseil Business...)")?>"
                                        value="<?=the_sub_field('title')?>"
                                        >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group d-flex align-items-center">
                                        <input type="text" class="form-control tarif-price"  placeholder="<?=_e("Prix (MAD)")?>"
                                        value="<?=the_sub_field('price')?>"
                                        >
                                        <small class="badge badge-secondary rounded-circle p-2 ml-1">DH</small>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php        
                        endif;
                    ?>
                    <!-- treatments end-->
                </table>
                <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i><?=_e("Ajouter nouveau traitement")?></a>
                </div>
        </div>
        <!-- /row-->
    </div>
    <!-- /box_general-->
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-globe"></i>
                <?=_e("Réseaux sociaux")?>
            </h2>
        </div>
        <div class="row">
           <div class="col-md-12">
                <div class="form-group">
                    <label><?=_e("Facebook")?></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >
                                <i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input 
                            type="url" class="form-control" name="facebook"
                            placeholder="<?=_e("Lien Facebook")?>"
                            value = "<?=$facebook?>"
                        >
                    </div>
                </div>            
           </div>
           <div class="col-md-12">
                <div class="form-group">
                    <label><?=_e("Twitter")?></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input 
                            type="url" class="form-control" name="twitter"
                            placeholder="<?=_e("Lien twitter")?>"
                            value = "<?=$twitter?>"                      
                        >
                    </div>
                </div>                 
           </div>
           <div class="col-md-12">
                <div class="form-group">
                    <label><?=_e("Linkedin")?></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i>
                            </span>
                        </div>
                        <input 
                            type="url" class="form-control" name="linkedin"
                            placeholder="<?=_e("Lien Linkedin")?>"
                            value = "<?=$linkedin?>"                
                        >
                    </div>
                </div>  
           </div>
        </div>
        <!-- /row-->
    </div>
    <!-- /box_general-->
    <button type="submit" class="btn_1 medium" id="submit-update-profile">Save</button>
</form>