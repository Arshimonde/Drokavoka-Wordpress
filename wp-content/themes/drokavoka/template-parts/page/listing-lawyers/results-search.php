<div id="results">
    <div class="container">
        <div class="row">
            <?php
                $col_class ="col-md-6" ;
                if ($layout == "map") {
                    $col_class ="col-md-12 mb-2";
                }
            ?>
            <div class="<?=$col_class?>">
                <h4>
                    <?=__("Total Nombre d'avocats trouvé est ")?>
                    <strong> 
                        <?= $user_query->get_total();?>
                    </strong> 
                </h4>
            </div>
            <div class="<?=$col_class?>">
                <form method="post" action="/listing-lawyers">
                    <input type="hidden" name="layout" value="<?=$layout?>"/>
                    <div class="search_bar_list">
                        <?php
                            $search_value = "";
                            if (isset($_POST["list-lawyer-search"])) {
                                $search_value = $_POST["list-lawyer-search"];
                            }
                        ?>
                        <input 
                            type="text"
                            name="list-lawyer-search" 
                            class=" search-query typeahead-list-lawyers form-control" 
                            placeholder="<?=_e("Ex: Nom d'avocat, Spécialité, Ville")?>"
                            autocomplete="off"
                            value="<?=$search_value?>"
                        >
                        <input type="submit" value="Search">
                    </div> 
                </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /results -->