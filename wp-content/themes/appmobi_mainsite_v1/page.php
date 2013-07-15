<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="template-front-page top template-full-page">
	<div class="template-front-page logo">
		<a href="http://appmobi.com/"><img src="http://docs.appmobi.com/wp-content/uploads/2013/07/logo_documentation.png" width="303" height="74" /></a>
	</div>
	<div class="clear"></div>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
</nav><!-- #site-navigation -->

<div class="content-wrap">
	<?php get_sidebar(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<div class="clear"></div>
</div>

<?php get_footer(); ?>
