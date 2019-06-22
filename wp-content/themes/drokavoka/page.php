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
				//Confirm booking
				elseif(is_page("confirm-reserving")):
					get_template_part("template-parts/page/content","booking");
				//Confirm booking
				elseif(is_page("booking-success")):
					get_template_part("template-parts/page/content","booking-success");

				else: 
				?>
					<div class="container margin_60">
    					<div class="row">
							<?php 
								global $post;
								$my_postid = $post->ID;//This is page id or post id
								$content_post = get_post($my_postid);
								$content = $content_post->post_content;
								$content = apply_filters('the_content', $content);
								echo "<h1 class='w-100 mb-3'>".get_the_title($post)."</h1>";
								echo $content;
							?>
						</div>
					</div>
				<?php
				endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
