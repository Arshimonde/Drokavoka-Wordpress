<?php
    $list_active = "active";
    $grid_active = "";
    $map_active = "";
    if (isset($_GET["layout"]) && !empty($_GET["layout"])) {
        switch ($_GET["layout"]) {
            case 'grid':
                $list_active = "";
                $grid_active = "active";
                $map_active = "";
                break;
            case 'map':
                $list_active = "";
                $grid_active = "";
                $map_active = "active";
                break;
            default:
                $list_active = "active";
                $grid_active = "";
                $map_active = "";
                break;
        }
    }
?>
<div class="filters_listing">
    <div class="container">
        <ul class="clearfix">
            <li>
                <h6><?= __("Mise en page","drokavoka")?></h6>
                <div class="layout_view">
                    <a  
                        <?php 
                            if (empty($grid_active)) {
                                echo 'href="/listing-lawyers?layout=grid"';
                            }else {
                                echo '#';
                            }
                        ?>
                        data-toggle="tooltip"
                        data-placement="bottom"  
                        title="<?= __("Grille","drokavoka")?>"
                        class = "<?=$grid_active?>"
                        
                    >
                        <i class="icon-th"></i>
                    </a>
                    <a 
                        <?php 
                            if (empty($list_active)) {
                                echo 'href="/listing-lawyers?layout=list"';
                            }else {
                                echo '#';
                            }
                        ?>
                        data-toggle="tooltip"
                        data-placement="bottom"
                        title="<?= __("Liste","drokavoka")?>"
                        class = "<?=$list_active?>"
                    >
                        <i class="icon-th-list"></i>
                    </a>
                    <a 
                        <?php 
                            if (empty($map_active)) {
                                echo 'href="/listing-lawyers?layout=map" ';
                            }else {
                                echo '#';
                            }
                        ?>
                        data-toggle="tooltip"
                        data-placement="bottom" 
                        class = "<?=$map_active?>"
                        title="<?= __("Carte","drokavoka")?>"
                    >
                        <i class="icon-map-1"></i>
                    </a>
                </div>
            </li>
            <!-- <li>
                <h6><?=_e("Trier par")?></h6>
                <select name="orderby" class="selectbox">
                    <option value="firstname_asc">
                        <?=_e("Nom ASC")?>
                    </option>
                    <option value="firstname_desc">
                        <?=_e("Nom DESC")?>
                    </option>
                    <option value="lastname_asc">
                        <?=_e("Prénom ASC")?>
                    </option>
                    <option value="lastname_desc">
                        <?=_e("Prénom DESC")?>
                    </option>
                </select>
            </li> -->
        </ul>
    </div>
    <!-- /container -->
</div>
<!-- /filters -->