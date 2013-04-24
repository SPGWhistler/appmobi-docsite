<?php
global $berry_plugins; 
get_header(); ?>
<div class="main">
	<div class="articles">
		<?php include (TEMPLATEPATH . '/theloop.php'); ?>
		<div class="botnav">
			<?php $berry_plugins->pagenav(); ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>