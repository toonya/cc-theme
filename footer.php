<?php 
	$themename = wp_get_theme()->Name;
	$shortname = strtolower(wp_get_theme()->Name);
?>
	
	<div class="clear"></div>
	
	<?php if(get_option($shortname.'_footer_ad_enable') == 'on') { ?>
		<div class="footer-ad">
			<?php echo get_option($shortname.'_footer_ad_code'); ?>
		</div><!-- .footer-ad -->
	<?php } ?>

	<footer id="footer">	
		<div class="ty-footer-nav container">
			<?php    /**
				* Displays a navigation menu
				* @param array $args Arguments
				*/
				$args = array(
					'theme_location' => 'footer-menu',
					'menu' => '',
					'container_id' => '',
					'menu_class' => 'ty-footer-menu',
					'menu_id' => '',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth' => 0,
					'walker' => ''
				);
			
				wp_nav_menu( $args ); ?>
				<div class="clearfix"></div>
		</div>			
		<!-- <div id="copyright" class="container clearfix">
			<div class="left">
					<p><img src="<?php echo get_option($shortname.'_footer_logo'); ?>" alt="<?php bloginfo('name'); ?>" / ></p>
			</div>

			<div class="right">

			<p>&copy; <?php echo mysql2date('Y',current_time('timestamp')); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>. <?php echo get_option($shortname.'_footer_credit'); ?></p>
			</div>				
		</div> --><!-- #copyright -->
		
	</footer><!-- #footer -->
	
<?php wp_footer(); ?>

</body>
</html>