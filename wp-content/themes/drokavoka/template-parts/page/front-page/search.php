<?php
    $search_data = get_search_data();
    $cities = $search_data["cities"];
    $specialties = $search_data["specialties"];
?>

<div class="hero_home version_1">
    <div class="content">
        <h3><?= _e("trouver un avocat!") ?></h3>
        <p>
            Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
        </p>
        <form method="post" action="/listing-lawyers">
            <div class="container">
                <div id="custom-search-input" class="row justify-content-center">
                    <div class="col-md-3 px-2">
                        <input 
                            type="text"
                            name="lawyer-name" 
                            class=" search-query typeahead-lawyers form-control" 
                            placeholder="<?=_e("Nom d'avocat")?>"
                            autocomplete="off"
                        >
                    </div>
                    <div class="col-md-3 px-2">
                        <select 
                            name="lawyer-specialte"
                            class="selectpicker form-control" 
                            title = "<?=_e("Spécialité")?>" 
                            data-live-search="true"
                            data-size="4"
                        >
                            <option value="-1">
                                <?= _e("Tout les spécialités") ?>
                            </option>
                            <?php 
                                foreach ($specialties as $spec) {
                            ?>
                                <option value="<?= $spec->term_id ?>">
                                    <?= $spec->name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-3 px-2">
                        <select 
                            name="city" 
                            class="selectpicker form-control"
                            title = "<?=_e("Ville")?>"
                            data-live-search="true"
                            data-size="4"
                        >
                        >
                            <option value="-1">
                                <?= _e("Tout les villes") ?>
                            </option>
                            <?php 
                                foreach ($cities as $city) {
                            ?>
                                <option value="<?= $city->term_id ?>">
                                    <?= $city->name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-2 px-2">
                        <input 
                        type="submit" class="btn_search rounded"
                        value="<?=_e("Chercher")?>">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /Hero -->