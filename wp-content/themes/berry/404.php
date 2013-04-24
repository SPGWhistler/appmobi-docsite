<?php
ob_start();
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
global $berry_plugins; 
get_header(); ?>
<div class="main">
	<div class="articles">
		<div class="error">
			<h2>Not Found</h2>
			<div class="itemtext">
				<p>The page or file you requested no longer resides at this address, or never existed in the first place. Try searching for the desired content.</p>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>