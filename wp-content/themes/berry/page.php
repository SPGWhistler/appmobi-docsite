<?php get_header(); ?>
<div class="main">
	<div class="articles">
		<?php include (TEMPLATEPATH . '/theloop.php'); ?>
		<?php if ('open' == $post->comment_status){comments_template('', true); }?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>