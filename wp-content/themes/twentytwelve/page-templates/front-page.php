<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php
			$my_wp_query = new WP_Query();
			$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
			$page =  get_page_by_title('home');
			$page_children = get_page_children( $page->ID, $all_wp_pages );
			foreach ($page_children as $child)
			{
				if ($child->post_parent === 0)
				{
					echo "<a href='" . $child->guid . "'>" . $child->post_title . "</a>";
					echo "<span>" . get_metadata('post', $child->ID, 'appmobi_page_description', true) . "</span><br>";
				}
			}
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
