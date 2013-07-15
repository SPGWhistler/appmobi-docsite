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
  background : #fff;
  float : left;
  display : inline;
}

/*
  Style the li links
*/
#clb-shell a {
  color : #fff;
}
#clb-shell a:hover, #clb-shell a:focus, #clb-shell a:active {
  color : #fff;
  text-decoration : none;
}
#clb-shell a:focus, #clb-shell a:active {
  background-color : #fff;
}

/*
  Style the h3 links
*/
#clb-shell ul#clb h3 a {
  color : #fff;
  display : block;
  width : 194px;
  padding : 2px 3px;
  /*background : #333 url(images/clb_h3_back.jpg) repeat-x;*/
  background : #fff;
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
  background : #57c1cd;
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

div.pageBox{
	background:#57c1cd;
	margin:10px 0 20px 0;
	padding:10px;
	text-align:left;
	cursor:pointer;
	
}
div.pageBox > p{padding:0px; margin:0px; font-size:1.5em;}
div.pageBox:hover{
	background: #97c93e;
}
div.pageBox>h3{margin:0 0 20px 0; }
div.pageBox>h3>a{font-size:2em}
</style>

<?php get_header(); ?>
<div class="template-front-page top template-full-page">
	<div class="template-front-page logo">
		<a href="http://appmobi.com/"><img src="http://tmp.appmobi.com/wp-content/uploads/2013/05/logo_cloudservices.png" width="303" height="74" /></a>
	</div>
	<div class="clear"></div>
</div>
<div id="primary" class="site-content template-front-page">
	<div id="content" role="main">
		<?php
		$args = array(
			'parent' => 0,
			'sort_column' => 'menu_order',
		);
		$pages = get_pages($args);
		?>
		<div id="clb-shell">
			
				<?php
				foreach ($pages as $page)
				{
					if ($page->post_title !== 'home')
					{
						echo "<div class=\"pageBox\" onclick=\"window.location='".$page->guid."'\"><h3><a href='" . $page->guid . "'>" . $page->post_title . "</a></h3>";
						echo "<p>" . get_metadata('post', $page->ID, 'appmobi_page_description', true) . "</p></div>";
					}
				}
				?>
			
		</div>
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>
