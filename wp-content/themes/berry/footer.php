<?php global $berry_opts;?>
	</div>
	<div class="footer">
		<div class="container">
			<p>
				<?php
				if($berry_opts['footer_berry_disp'] === 'fancy')
				{
					echo berry_info('wplogolink') . berry_info('logolink');
				}
				else 
				{ 
					?>
					Powered By <a title="Go to WordPress.org" href="http://wordpress.org/">WordPress <?php echo bloginfo('version');?></a>
					and <?php echo berry_info('link'); ?>.
					<?php
				} ?>		
			</p>
			<span>			
				<?php echo get_num_queries(); ?> queries.
				<?php timer_stop(1); ?> seconds.
				<a href="feed:<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | 
				<a href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
			</span>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>