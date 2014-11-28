<?php
/*
Template Name: 服务
*/
?>

<?php get_header(); ?>

	<!-- <div class="page-header">
	
		<h1 class="page-title container"><?php the_title(); ?></h1>
		
	</div> --><!-- .page-header -->
	
	<?php $ty_banner = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full')[0];
	if(!empty($ty_banner)):;?>
	<div class="ty-banner">
		<div class="ty-banner-inner">
			<img src="<?php echo esc_url($ty_banner); ?>" alt="">
		</div>
	</div>
	<?php endif;?>

	<div id="home-features">
		
		<div class="container clearfix">
			<?php
			    query_posts( array(
				'post_type' => 'feature',
				'posts_per_page' => get_option($shortname.'_home_features_num')
				));				
				$feature_count = 1; 
				if (have_posts()) : while (have_posts()) : the_post(); 
			    $has_icon = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large')[0];
			    //$has_icon = get_post_meta(get_the_ID(), 'tj_feature_icon', TRUE);
			    //$more_link = get_post_meta(get_the_ID(), 'tj_feature_more_link', TRUE);				    
			?>	
			<div class="feature-block <?php if($feature_count%3==0) { echo "last-feature"; } ?>">
				<?php if($has_icon <> '') { echo '<div class="ty-thumbnail"><img src="'.$has_icon.'" alt="';the_title();echo '"/></div>'; } ?>	
				<h1 class="ty-title"><?php the_title(); ?></h1>
				<div class="ty-services-content" style="text-align:left;"><?php the_content(); ?></div>
			</div><!-- .feature-block -->
			<?php 
				if($feature_count%4==0) { 
					echo "<div class='clear'></div>"; 
				}
				$feature_count++; 
				endwhile; endif;
				wp_reset_postdata();
			?>
		</div>
	<div class="clear"></div><!-- .entry-content --><!-- #content -->

</div><!-- #main -->
<?php get_footer(); ?>
