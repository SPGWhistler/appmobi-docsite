<?php global $berry_plugins, $wpdb;//Sidebar for single posts and pages
if(is_single() || is_page())
{?>
<div class="sidebar">
	<ul>
	<li>
		<h2><?php if(is_page()){echo "Page ";} else{echo "Post ";}?>Details</h2>
		<small class="metadata">
			<span class="postname cblock">&quot;<?php the_title(); ?>&quot;</span>
			<span class="date"><?php the_time('l, F jS, Y'); ?></span><br />
			<span class="time"><?php the_time(); ?></span>
			<span class="author"><?php the_author_posts_link(); ?></span>
			<?php			edit_post_link('Edit','<br /><span class="editlink">','</span>'); 
			if('open' == $post->comment_status)
			{
				?><br />
				<span class="feed"><?php post_comments_feed_link('Comments Feed'); ?></span><?php
			}
			if(is_single())
			{
				?><br />
				<span class="category cblock"><?php the_category(', ');?></span>
				<br /><?php 				wp_tag_cloud(array('taxonomy'=>'route'));
			}
			comments_popup_link('0&nbsp;<span>Comments</span>', '1&nbsp;<span>Comment</span>', '%&nbsp;<span>Comments</span>', 'commentslink', '<span class="commentslink">Closed</span>');
			?>
		</small>
	</li>
	<?php
	if(is_page())
	{
		if($post->post_parent)
		{ 
			//Page is a child
			$title = '<h2>Subpages of <a href="' . get_permalink($post->post_parent) . '">' . $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE ID=" . $post->post_parent) . '</a></h2>';
			wp_list_pages('sort_column=menu_order&title_li=' . $title . ' &child_of=' . $post->post_parent);
		}
		elseif(wp_list_pages("child_of=".$post->ID."&echo=0"))
		{
			//Page has children
			wp_list_pages('sort_column=menu_order&title_li=<h2>Subpages</h2>&child_of='.$post->ID); 
		}
	}
	?>
	<li>
		<?php $berry_plugins->relposts(); ?>
	</li>
</ul>
</div>
<?php }
//Sidebar for everything else
else {?>
<div class="sidebar">
	<ul>
		<?php 
			//Yes, we support sidebar widgets
			if(!function_exists('dynamic_sidebar')|| !dynamic_sidebar())
			{
				?>
				<li><h2>Categories</h2>
				<ul>
					<?php wp_list_categories('orderby=name&show_count=1&exclude=10&title_li');?>
				</ul>
				</li>
				<li><h2>Tags</h2>
					<ul>
						<li>
							<?php wp_tag_cloud(''); ?>
						</li>
					</ul>
				</li>
					<?php wp_list_bookmarks();?>
				<li><h2>Meta</h2>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.1 Strict">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
						<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
						<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
				<?php
			}?>
	</ul>
</div>	
<?php }?>