<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Drokavoka
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<h2>404 <i class="icon_error-triangle_alt"></i></h2>
						<p><?= __("Nous sommes désolés, mais la page que vous recherchiez n'existe pas.")?></p>
					</div>
					<div class="col-md-12">
						<?php get_template_part("template-parts/page/404/search"); ?>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error_page -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
