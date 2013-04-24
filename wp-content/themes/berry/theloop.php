<?php
//The actual Loop, first check for collected posts
if (have_posts())
{
	while (have_posts())
	{ 
		the_post();
		?>
<div id="post-<?php the_ID(); ?>" class="post">
	<?php 
	//For single pages
	if (is_single() || is_page())
	{ ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title='Permanent Link to "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h2>
		<?php
	}
	//For main page/archives
	else
	{ ?>
	<div class="itemhead">
		<div class="datebadge"><?php the_time('M'); ?><span>&nbsp;<?php the_time('jS'); ?>&nbsp;</span><?php the_time('Y');?></div>
		<div class="itemmteta">	
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title='Permanent Link to "<?php strip_tags(the_title()); ?>"'><?php the_title(); ?></a></h2>
			<small class="metadata">
				<span class="author"><?php the_author_posts_link(); ?></span>
				<span class="category"><?php the_category(', '); ?></span>
				<?php 
					the_tags('<span class="tag">', ', ', '</span>');
					comments_popup_link('No&nbsp;Comments','1&nbsp;Comment','%&nbsp;Comments','comments','<span class="cl-comments">Closed</span>');
					edit_post_link('Edit','<span class="editlink">','</span>'); 
				?>
			</small>
			<hr />
		</div>
	</div> 
	<?php } ?>
	<div <?php if(is_single() || is_page()){echo 'class="itembody" ';} else{echo 'class="itemfront"';}?>>
		<?php
		if (is_archive() or is_search())
		{ 
			the_excerpt();
		}
		else 
		{
			the_content("[transmission continues, read more ]");
		}
		wp_link_pages('<p><strong>Pages:</strong> ', '</p>', 'number');?>
	</div>
</div>
<?php
	}
}
//Nothing in the loop, mostlikely a search gone bad
else
{ ?>
	<div class="error">
		<h2>Not Found</h2>
		<div class="itemtext">
			<p>No matches to "<?php echo wp_specialchars($s, 1); ?>" were found in this blog's posts or pages. Try rephrasing your query or go back to the home page.</p>
		</div>
	</div>
<?php }?>