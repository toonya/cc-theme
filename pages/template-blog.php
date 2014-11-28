<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
	
	<!-- <div class="page-header">
		
		<div class="container">
	
			<h1 class="page-title"><?php the_title(); ?></h1>
		
		</div>
	
	</div> --><!-- .page-header -->

	<?php $ty_banner = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full')[0];
	if(!empty($ty_banner)):;?>
	<div class="ty-banner">
		<div class="ty-banner-inner">
			<img src="<?php echo esc_url($ty_banner); ?>" alt="">
		</div>
	</div>
	<?php endif;?>
	
	<div id="main" class="clearfix">
	
		<div id="content" class="content-loop">
			
			<?php
				wp_reset_query();
				$i = 1;
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post();
			?>
				<?php if($i==1) { echo "<div class=\"first-post\">"; } ?>
				
				<?php get_template_part('content'); ?>
				
				<?php if($i==1) { echo "</div>"; } ?>
				
				<?php if(($i - 1)%2==0) { echo "<div class=\"clear\"></div>"; } ?>				

		    <?php $i++; endwhile; ?>
		    
		    <div class="clear"></div>
		    	    
		    <div class="junkie-pagination">
		    	<?php junkie_pagination(); ?>
		    </div><!-- .junkie-pagination -->
		    
			<?php $wp_query = null; $wp_query = $temp; ?>
		</div><!-- #content -->
		
		<?php get_sidebar(); ?>
			
	</div><!-- #main -->

<?php get_footer(); ?>