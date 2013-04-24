<?php 
global $berry_plugins;
if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
{
	die('Direct Comment Access Not Allowed');
}
if(post_password_required())
{
	echo 'This post is password protected. Enter the password to view comments.';
	return;
}
//If we have comments
?>
<?php
if(have_comments())
{ ?>
	<?php if(!empty($comments_by_type['pings']))
	{?>
	<h3 id="pings">Trackbacks/Pingbacks</h3>
	<ol class="pinglist">
	<?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
	<?php } ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	<ul class="commentlist">
		<?php wp_list_comments('avatar_size=40&type=comment&callback=list_comments'); ?>
	</ul>
	<div class="botnav">
		<?php 
			previous_comments_link();
			next_comments_link(); 
		?>
	</div>
<?php 
}
if('open' == $post->comment_status)
{?>
<?php 	if(get_option('comment_registration') && !$user_ID)
	{
		?><p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to leave a comment.</p><?php
	}
	else
	{
		?>
		<div id="respond">
			<h3><?php comment_form_title(); ?></h3>
			<div>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="commentform">
					<div id="cancel-comment-reply">
						<small><?php cancel_comment_reply_link(); ?></small>
					</div><?php
					if($user_ID)
					{
						?><p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log Out</a></p><?php
					}
					else
					{?>
						<p>
							<label for="author">Name <span><?php if ($req) echo "(required)"; ?></span></label>
							<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
						</p>
						<p>
							<label for="email">Mail <span>(not published) <?php if ($req) echo "(required)"; ?></span></label>
							<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
						</p>
						<p>
							<label for="url">Website</label>
							<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
						</p>
					<?php 
					} ?>
					<p><textarea name="comment" id="comment" rows="10" tabindex="4" cols="6" ></textarea></p>
					<p><small>You may use these <strong>(x)HTML</strong> tags: <?php echo allowed_tags(); ?></small></p>
					<button type="submit" tabindex="5">Submit Comment</button>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			</div>
		</div>
		<?php
	}
}
else
{
?><h3>Comments Closed</h3><?php
}
?>