<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Drokavoka
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
				if(!is_page("dashboard")):
					get_template_part("template-parts/header/breadcrumb");
				endif;	

				//Registration Page 
				if(is_page("signup")):
					get_template_part("template-parts/page/content","signup");
				//login Page 
				elseif(is_page("login")):
					get_template_part("template-parts/page/content","login");
				//Dashboard Page 
				elseif(is_page("dashboard")):
					get_template_part("template-parts/dashboard/content","dashboard");
				//Lawyers List  Page 
				elseif(is_page("listing-lawyers")):
					get_template_part("template-parts/page/content","listing-lawyers");
				//Lawyer Profil  Page 
				elseif(is_page("lawyer-profil")):
					get_template_part("template-parts/page/content","lawyer-profil");
				endif;
				//Registration Page END
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
