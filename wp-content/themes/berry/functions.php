<?php
/*
This is Berry, "Cran-Berry" Build 2S00
Here lies the objects/classes that contain 
additional admin functions and aid in the 
immense customizability of the Berry platform.
*/
//require_once(dirname(__FILE__) . '/ext_breadcrumb_navxt.php');
$berry_version = "Cran-Berry Build 200";
//The options array, simmilar to the one in Breadcrumb NavXT
$berry_opts = array
(
	//Possible options normal, fancy
	'footer_berry_disp' => 'normal',
	//Try loading a image logo?
	'blog_logo_display' => 'true',
	//Location of the logo
	'blog_logo_location' => get_bloginfo('template_directory') . '/images/logo.png',
	//Alternative text for the logo
	'blog_logo_alt_txt' => get_bloginfo('name')
);
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
	global $id;
	$comments_by_type = &separate_comments(get_comments('post_id=' . $id));
	return count($comments_by_type['comment']);
}
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php }
function berry_manage_comment($id)
{
	if(current_user_can('moderate_comments'))
	{
		echo '<span class="comment-admin">[ ';
		edit_comment_link('Edit','','&nbsp;');
		echo '| <a href="' . admin_url("comment.php?action=cdc&c=$id").'">Delete</a> ';
		echo '| <a href="' . admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a> ]</span>';
	}
}
function list_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if('div' == $args['style'])
	{
		$tag = 'div';
		$add_below = 'comment';
	}
	else
	{
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
<?php if('ul' == $args['style'])
{?>
	<div id="div-comment-<?php comment_ID() ?>">
<?php }?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'], get_option('siteurl') . '/wp-content/themes/berry/images/gravatar.png' ); ?>
	<?php printf(__('<cite>%s</cite>'), get_comment_author_link()) ?>
	<?php berry_manage_comment($comment->comment_ID); ?>
	</div>
<?php if($comment->comment_approved == '0')
{ ?>
	<em><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php } ?>
	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID, $page ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date('F jS, Y'),  get_comment_time()) ?></a> </div>
	<div id="q-<?php comment_ID() ?>">
		<?php comment_text() ?>
	</div>
	<div class="reply">
	<?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	<?php if(function_exists('qcmt_comment_quote_link'))
	{
		qcmt_comment_quote_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' | ')));
	}?>
	</div>
<?php if('ul' == $args['style']){ ?></div><?php }
}
//General purpose berry information grabber function
function berry_info($request)
{
	global $wpdb;
	if ($request == 'link'){
		?><a title="Go to Berry's website." href="http://mtekk.weblogs.us/code/berry">Cran-Berry</a><?php
	}
	elseif ($request == 'logolink'){
		?><a title="Go to Berry's website." href="http://mtekk.weblogs.us/code/berry"><img alt="Blu-Berry" src="<?php echo bloginfo('template_directory') ?>/images/blogo.png" /></a><?php
	}
	elseif ($request == 'wplogolink'){
		?><a title="Go to WordPress.org." href="http://wordpress.org/"><img alt="WordPress" src="<?php echo bloginfo('template_directory') ?>/images/wplogo.png" /></a><?php
	}
}
//This class does the safe calling and setting of any supported plugins and their settings
class berry_plugins{	//This calls Breadcrumb NavXT	function breadcrumb()	{		bcn_display();	}	//This calls WP-PageNavi	function pagenav()	{		if(function_exists('wp_pagenavi'))		{			wp_pagenavi();		}		else		{ ?>			<div class="navigation">				<div class="left"><?php next_posts_link('<span>&laquo;</span> Previous Entries') ?></div>				<div class="right"><?php previous_posts_link('Next Entries <span>&raquo;</span>') ?></div>				<div class="clear"></div>
			</div><?php
		}
	}
	//This calls WP Related Posts
	function relposts()
	{ 
		if(function_exists('related_posts') && get_option('berry_relposts') == 1)
		{
			?>
			<h2><?php echo get_option('berry_relposts_title');?></h2>
			<ul><?php
			related_posts();
			?></ul><?php
		}
	}
}
$berry_plugins = new berry_plugins;
//Enable sidebar widgets
if(function_exists('register_sidebar'))
{
	register_sidebar();
}
?>