<div class="filters_listing">
    <div class="container">
        <ul class="clearfix">
            <!-- <li>
                <h6>Layout</h6>
                <div class="layout_view">
                    <a href="grid-list.html"><i class="icon-th"></i></a>
                    <a href="#0" class="active"><i class="icon-th-list"></i></a>
                    <a href="list-map.html"><i class="icon-map-1"></i></a>
                </div>
            </li> -->
            <li>
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
            </li>
        </ul>
    </div>
    <!-- /container -->
</div>
<!-- /filters -->