<div class="col-lg-6">
    <?php
        if(have_posts()):
            the_post();
            the_content();
        endif;
    ?>
</div>
<!-- /col -->