<div class="col-xl-9 col-lg-8">

    <div class="tabs_styled_2">

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true"><?=_e("Information général")?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="general-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-expanded="true"><?=_e("Avis")?></a>
            </li>
        </ul>
        <!--/nav-tabs -->

        <div class="tab-content">
            <?php include "general_info.php" ?>
            <?php include "reviews.php" ?>
        </div>
        <!-- /tab-content -->
    </div>
    <!-- /tabs_styled -->
</div>
<!-- /col -->