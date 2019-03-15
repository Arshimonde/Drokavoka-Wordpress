<div class="col-lg-5 ml-auto">
    <div class="box_form">
        <div id="message-register"></div>
        <!-- Form Start -->
        <form method="post" action="assets/register_doctor.php" id="register_doctor">
            <!-- /row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <!-- Gender -->
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" id="mr" value="mr" checked="">
                            <label class="custom-control-label mt-1" for="mr">Monsieur</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="gender" id="mme" value="mm">
                            <label class="custom-control-label mt-1" for="mme">Madame</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <!-- first name -->
                <div class="col-md-6 ">
                    <div class="form-group">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Prénom*")?>" 
                            name="first_name" id="first_name"
                            required
                        >
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
                <!-- last name -->
                <div class="col-md-6">
                    <div class="form-group">
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Nom*")?>" 
                            name="last_name" 
                            id="last_name"
                            required
                        >
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <!-- spécialité -->
                        <select name="specialite[]" id="specialites" class="selectpicker" title="Choisir une ou plusieurs spécialité*"
                            data-live-search="true" data-width="100%" data-size="5" multiple required>
                            <?php
                                $specilities = get_terms( "lawyer_specialte",         array( 
                                        "hide_empty" => 0,
                                        "parent" => 0
                                    )  
                                );
                                foreach($specilities as $speciality):
                           ?>
                            <option value="<?= $speciality->term_id ?>">
                                <?= $speciality->name  ?>
                            </option>
                           <?php endforeach;?>
                        </select>
                        <small class="form-text text-muted">
                            <?=_e("Choisir au minimum 1 spécialité")?>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- ville -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Ville*")?>" 
                            name="city" 
                            id="city"
                            required
                        >
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- code postal -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Code Postale")?>" 
                            name="postal_code" 
                            id="postal_code"
                        >
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <!-- address -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Adresse*")?>" 
                            name="address" 
                            id="address"
                            required
                        >
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Mobile phone -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("GSM")?>" 
                            name="mobile_phone" id="mobile_phone"
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Office Phone -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Numéro de bureau")?>" 
                            name="fix" id="fix"
                        >
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <!-- email -->
                        <input 
                            type="email" 
                            class="form-control" 
                            placeholder="<?=_e("Adresse mail*")?>" 
                            name="email" id="email"
                            required
                        />
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis. ex: example@test.com")?>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <!-- username -->
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="<?=_e("Nom d'utilisateur*")?>" 
                            name="username" id="username"
                            required
                        />
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <!-- password -->
                        <input 
                            type="password" 
                            class="form-control" 
                            placeholder="<?=_e("Mot de passe*")?>" 
                            name="password" id="password"
                            required
                        />
                        <small class="form-text text-muted">
                            <?=_e("Ce champ est requis")?>
                        </small>
                    </div>
                </div>
            </div>
            <!-- /row -->
            <div>
                <input type="submit" class="btn_1" value="Submit" id="submit-register"
            ></div>
        </form>
         <!-- Form END -->
    </div>
    <!-- /box_form -->
</div>
<!-- /col -->