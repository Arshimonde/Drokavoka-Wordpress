<div id="results">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>
                    <?=__("Total Nombre d'avocats trouvé est ")?>
                    <strong> 
                        <?= $user_query->get_total();?>
                    </strong> 
                </h4>
            </div>
            <div class="col-md-6">
                <!-- <div class="search_bar_list">
                    <input type="text" class="form-control" placeholder="Ex. Specialist, Name, Doctor...">
                    <input type="submit" value="Search">
                </div> -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /results -->