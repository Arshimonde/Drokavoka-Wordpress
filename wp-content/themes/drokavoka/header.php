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

<?php
	$id="";
	$classes = array();
	if(is_page("dashboard")):
		$id="page-top";
		$classes[] = "fixed-nav sticky-footer";
	endif;
?>
<body id="<?=$id?>" <?php body_class($classes); ?>>
	<!-- screen readers skip link -->
	<a class="skip-link screen-reader-text sr-only" href="#content">
		<?php esc_html_e( 'Skip to content', 'drokavoka' ); ?>
	</a>
	<!-- screen readers skip link end -->

	<!-- header -->
	<div class="layer"></div><!-- Mobile menu overlay mask end-->
	<?php
		get_template_part( 'template-parts/header/preloader');
		//don't show the header if page == dashboard
		if(!is_page("dashboard")):
			$header_class = "header_sticky";
			if (isset($_GET["layout"]) && $_GET["layout"] == 'map' ) {
				$header_class = "header_map";
			}
	?>
	<header class="<?=$header_class?>">
		<div class="container">
			<div class="row">
				<?php
					get_template_part( 'template-parts/header/site',"logo");
					get_template_part( 'template-parts/navigation/main',"nav");
				?>
			</div>
		</div>
	</header>
	<?php
		endif;
	?>
	<!-- header end -->

	<!-- content -->
	<div id="content" class="site-content">
