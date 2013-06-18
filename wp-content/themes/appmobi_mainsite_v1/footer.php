<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://apphub.appmobi.com/', 'twentytwelve' ) ); ?>"><?php printf( __( 'AppHub', 'twentytwelve' ), 'AppHub' ); ?></a>
			<span class="site-info-spacer">|</span>
			<a href="<?php echo esc_url( __( 'http://appmobi.com/documentation/', 'twentytwelve' ) ); ?>"><?php printf( __( 'Documentation', 'twentytwelve' ), 'Documentation' ); ?></a>
			<span class="site-info-spacer">|</span>
			<a href="<?php echo esc_url( __( 'http://apphub.appmobi.com/', 'twentytwelve' ) ); ?>"><?php printf( __( 'Login / SignUp', 'twentytwelve' ), 'Login / SignUp' ); ?></a>
		</div><!-- .site-info -->
		<div class="site-info-contact">
			<a id="contactuslink" class="site-info-contact-anchor" href="#">contact</a>
		</div>
	</footer><!-- #colophon -->
	<div id="appMobi_lightbox" style="display: none; overflow: hidden; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: 1000; background-color: rgba(0,0,0, 0.5);">
		<div style="color: #fff; position: fixed; top: 50%; margin-top: -250px; height: 500px; width: 100%; background-color: rgba(0,0,0, 0.85);">
			<div class="contactusbox" id="contactusbox" style="display: none; text-align: left; width: 340px; margin: 68px auto 0 auto;">
				<p style="color: #97c93e; float: left; font-size: 24px;">Contact Us</p>
				<a href="#" class="closelink"><img style="float: right; position: relative; top: 2px; right: -10px;" src="/images/x.png" width="16" height="15" /></a>
				<?php echo do_shortcode( '[contact-form-7 id="39" title="contact us"]' ); ?>
			</div>
			<div id="findoutbox" style="display: none; text-align: left; width: 340px; margin: 40px 50% 0; position: relative; left: 105px;">
				<p style="padding-bottom: 5px; color: #57c1cd; float: left; font-size: 24px;">Getting Started is Simple</p>
				<a href="#" class="closelink"><img style="float: right; position: relative; top: 2px; right: -10px;" src="/images/x.png" width="16" height="15" /></a>
				<div class="clear"></div>
				<p style="color: #ddd; font-family: helvetica; font-size: 16px; line-height: 1.4;">Just provide us with your name and email address. Then we'll follow-up with you to get all the information needed to equip you with the tools to make your app come alive.</p>
				<?php echo do_shortcode( '[contact-form-7 id="37" title="get started button"]' ); ?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery('#contactuslink').click(function(){
			showLightbox('contactusbox');
		});
		jQuery('.closelink').click(function(){
			hideLightbox();
		});
		jQuery(document).bind('mailsent.wpcf7', function() {
			setTimeout(function(){
				hideLightbox();
			}, 2000);
		});
		jQuery(document).bind('keydown', function(evt) {
			if (evt.which === 27) { //Escape
				hideLightbox();
			}
		});
		function hideLightbox() {
			jQuery('#appMobi_lightbox').fadeOut(function() {
				jQuery('#appMobi_lightbox>div>div').each(function(){
					jQuery(this).hide();
				});
			});
		}
		function showLightbox(boxid) {
			jQuery('#' + boxid).show();
			jQuery('#appMobi_lightbox').fadeIn();
		}
	</script>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
