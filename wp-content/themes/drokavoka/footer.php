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

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?= home_url() ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'drokavoka' ), 'Redbull' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'drokavoka' ), 'drokavoka', '<a href="http://underscores.me/">Oualid El Abdi</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<?php endif;?>

<?php wp_footer(); ?>

</body>
</html>
