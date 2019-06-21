<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Drokavoka
 */

?>

	</div><!-- #content -->
	<?php
		$layout = "list";
		if (isset($_GET["layout"])) {
			$layout = $_GET["layout"];
		}

		if (isset($_POST["layout"])) {
			$layout = $_POST["layout"];
		}
		if(!is_page("dashboard") && $layout != 'map'):?>

			<footer>
				<div class="container margin_60_35">
					<div class="row">
						<div class="col-lg-3 col-md-12">
							<p class="text-center">
								<a href="/" title="Drokavoka">
									<?php the_custom_logo(); ?>
								</a>
							</p>
						</div>
						<div class="col-lg-3 col-md-4">
							<h5><?=__("à propos","drokavoka")?></h5>
							<ul class="links">
								<li><a href="#0"><?=__("Qui sommes nous ?","drokavoka")?></a></li>
								<li><a href="/login"><?=__("S'authentifier","drokavoka")?></a></li>
								<li><a href="/signup"><?=__("S'inscrire","drokavoka")?></a></li>
							</ul>
						</div>
						<div class="col-lg-3 col-md-4">
							<h5><?=__("Liens utiles","drokavoka")?></h5>
							<ul class="links">
								<li><a href="/contact"><?=__("Contactez nous","drokavoka")?></a></li>
								<li><a href="/listing-lawyers"><?=__("Avocats","drokavoka")?></a></li>
								<li><a href="/listing-lawyers/?layout=map"><?=__("Avocats sur map","drokavoka")?></a></li>
								<!-- <li><a href="#0">Specialization</a></li>
								<li><a href="#0">Download App</a></li> -->
							</ul>
						</div>
						<div class="col-lg-3 col-md-4">
							<h5><?=__("Contactez nous","drokavoka") ?></h5>
							<ul class="contacts">
								<li><a href="tel://0600000000"><i class="icon_mobile"></i> + 06 00 00 00 00</a></li>
								<li><a href="mailto://contact@drokavoka.com"><i class="icon_mail_alt"></i> contact@drokavoka.com</a></li>
							</ul>
							<div class="follow_us">
								<h5><?=__("Liens Réseaux Sociaux","drokavoka") ?></h5>
								<ul>
									<li><a href="#0"><i class="social_facebook"></i></a></li>
									<li><a href="#0"><i class="social_twitter"></i></a></li>
									<li><a href="#0"><i class="social_linkedin"></i></a></li>
									<li><a href="#0"><i class="social_instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!--/row-->
					<hr>
					<div class="row">
						<div class="col-md-8">
							<p><?=__("Tous les droits sont réservés","drokavoka")?></p>
							<!-- <ul id="additional_links">
								<li><a href="#0">Terms and conditions</a></li>
								<li><a href="#0">Privacy</a></li>
							</ul> -->
						</div>
						<div class="col-md-4">
							<div id="copy">© <?= date("Y") ?> Drokavoka</div>
						</div>
					</div>
				</div>
			</footer>
			<!--/footer-->

	<?php endif;?>

<?php wp_footer(); ?>

</body>
</html>
