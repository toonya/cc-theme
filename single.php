<?php get_header(); ?>

	<div class="page-header">
	
		<h1 class="page-title container">
			<?php switch (pll_current_language()) {
				case 'en':
					echo 'Gene';
					// echo wp_trim_words( get_the_content(), 20 );
					break;
				
				default:
					echo '基因';
					// echo wp_trim_words( get_the_content(), 50 );
					break;
			}?>
		</h1>
		
	</div><!-- .page-header -->

	<div id="main" class="clearfix">
	
		<div id="content">
		
			<?php while ( have_posts() ) : the_post(); ?>
		
				<?php get_template_part( 'content' ); ?>
				
				<?php if(get_option($shortname.'_show_post_comments') == 'on') { ?>
				
			  		<?php //comments_template('', true);  ?>
			  		
			  	<?php } ?>
			  		
			<?php endwhile; ?>
		
		</div><!-- #content -->
	
		<?php get_sidebar(); ?>
	
	</div><!-- #main -->

<?php get_footer(); ?>