<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Drokavoka
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- screen readers skip link -->
	<a class="skip-link screen-reader-text sr-only" href="#content">
		<?php esc_html_e( 'Skip to content', 'drokavoka' ); ?>
	</a>
	<!-- screen readers skip link end -->

	<!-- header -->
	<div class="layer"></div><!-- Mobile menu overlay mask end-->
	<?php
		get_template_part( 'template-parts/header/preloader');
	?>
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<?php
					get_template_part( 'template-parts/header/site',"logo");
					get_template_part( 'template-parts/navigation/main',"nav");
				?>
			</div>
		</div>
	</header>
	<!-- header end -->

	<!-- content -->
	<div id="content" class="site-content">
