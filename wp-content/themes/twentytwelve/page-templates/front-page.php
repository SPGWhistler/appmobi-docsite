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
?>

<style>
/*
  First define a content are width and position, if needed. I'm centering
  the 623px wide shell
*/
#clb-shell {
  margin : auto;
  width : 825px;
}

/*
  Now I'm resetting the paragraph padding (it was zeroed). I'm also clearing
  the p, but I don't really need this for the top one, only the bottom. The 
  top has no effect (it'll clear the heading by default), but it is needed 
  for the bottom (depending on the shell width versus the ul width). It may 
  not be needed at all. Your situation will determine.
*/
#clb-shell p {
  padding : 10px;
  clear : both;
}

/*
  I define the width of the ul, set the height (in ems!) align the text and
  remove list styles. The last may not be needed on most browsers
*/
ul#clb {
  width : 825px;
  height : 9em;
  text-align : center;
  list-style-type : none;
}

/*
  Now I style the individual boxes (li)
*/
ul#clb li {
  margin : 2px 2px;
  border : 1px solid #666;
  -webkit-border-radius: 7px;
  -moz-border-radius: 7px;
  border-radius: 7px;
  width : 200px;
  height : auto;
  /*background : #ffffea url(images/clb_li_back.jpg);*/
  background : #ffffea;
  float : left;
  display : inline;
}

/*
  Style the li links
*/
#clb-shell a {
  color : #669900;
}
#clb-shell a:hover, #clb-shell a:focus, #clb-shell a:active {
  color : #000;
  text-decoration : none;
}
#clb-shell a:focus, #clb-shell a:active {
  background-color : #fff;
}

/*
  Style the h3 links
*/
#clb-shell ul#clb h3 a {
  color : #ffffaa;
  display : block;
  width : 194px;
  padding : 2px 3px;
  /*background : #333 url(images/clb_h3_back.jpg) repeat-x;*/
  background : #333;
  border-bottom : 1px solid #666;
  -webkit-border-top-left-radius: 7px;
  -webkit-border-top-right-radius: 7px;
  -moz-border-radius-topleft: 7px;
  -moz-border-radius-topright: 7px;
  border-top-left-radius: 7px;
  border-top-right-radius: 7px;
  text-decoration : none;
}
#clb-shell ul#clb h3 a:hover, #clb-shell ul#clb h3 a:focus, #clb-shell ul#clb h3 a:active {
  /*background : #957412 url(images/clb_h3_back_over.jpg) repeat-x;*/
  background : #957412;
  color : #fff;
}

/*
  This tyles the text p content within the li separately. The most important 
  thing here is to re-kill the padding and add the margin to create good gutters
*/
ul#clb p {
  font-size : 0.9em;
  padding : 0;
  margin : 10px;
}
</style>

<?php get_header(); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php
		$args = array(
			'parent' => 0,
			'sort_column' => 'menu_order',
		);
		$pages = get_pages($args);
		?>
		<div id="clb-shell">
			<ul id="clb">
				<?php
				foreach ($pages as $page)
				{
					if ($page->post_title !== 'home')
					{
						echo "<li><h3><a href='" . $page->guid . "'>" . $page->post_title . "</a></h3>";
						echo "<p>" . get_metadata('post', $page->ID, 'appmobi_page_description', true) . "</p></li>";
					}
				}
				?>
			</ul>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
