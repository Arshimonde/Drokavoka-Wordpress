<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <!-- logo -->
    <a class="navbar-brand" href="<?=home_url()?>">
        <?php 
            $logo_url = get_template_directory_uri()."/assets/images/logo.png";
        ?>
        <img src="<?=$logo_url?>" data-retina="true" alt="" height="36">
        <span class="h5 mb-0">Drokavoka</span>
    </a>
    <!-- logo end -->
    <!-- toggle menu -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- toggle menu end-->
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <!-- side nav -->
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <!-- profil link -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?=_e("Mon profil")?>">
                <a class="nav-link" href="/dashboard?section=lawyer-profil">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text"><?=_e("Mon profil")?></span>
                </a>
            </li>
        </ul>
        <!-- side nav END-->

        <!-- collapse btn -->
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-angle-left"></i>
            </a>
            </li>
        </ul>
        <!-- collapse btn END-->

        <!-- top nav -->
        <ul class="navbar-nav ml-auto">
            <!-- logout btn -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
            <!-- logout btn end -->
        </ul>
        <!-- top nav END -->
    </div>
  </nav>
  <!-- /Navigation-->