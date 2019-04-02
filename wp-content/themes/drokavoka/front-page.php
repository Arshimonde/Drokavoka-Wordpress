<?php
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!-- search -->
        <?php get_template_part("template-parts/page/front-page/search"); ?>

        <!-- discouver -->
        <?php get_template_part("template-parts/page/front-page/discouver"); ?>

        <!-- lawyers slider -->
        <?php get_template_part("template-parts/page/front-page/lawyers-slider"); ?>

        <!-- search by -->
        <?php get_template_part("template-parts/page/front-page/search-by"); ?>
    </main>
</div>


<?php
get_footer();