<div id="sidebar">

	<aside id="recent-posts-3" class="widget widget_recent_entries">		
		<!-- <h3 class="widget-title">Recent Posts</h3>		 -->
		<?php  
		   /**
			* Displays a navigation menu
			* @param array $args Arguments
			*/
			$args = array(
				'theme_location' => 'footer-menu',
				'menu' => '',
				'container_id' => '',
				'menu_class' => 'sf-nav',
				'menu_id' => '',
				'echo' => true,
				'fallback_cb' => 'wp_page_menu',
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
				'depth' => 0,
				'walker' => ''
			);
		
			wp_nav_menu( $args );
	?>
	</aside>
	
</div><!-- #sidebar -->