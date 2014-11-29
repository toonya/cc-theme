<?php
/*
Template Name: 立刻试用
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

<div id="main" class="clearfix trynow">

	<div id="content" class="one-col">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="entry-content">
				
					<?php the_content(); ?>
					
				</div><!-- .entry-content -->
				
			</article>
		  	
		<?php endwhile; ?>

	</div><!-- #content -->

</div><!-- #main -->

<div class="footer-up">
	<div class="container">
		<p>
			<?php switch (pll_current_language()) {
				case 'en':
					echo 'Lorem ipsum dolor sit amet.';
					// echo wp_trim_words( get_the_content(), 20 );
					break;
				
				default:
					echo '口号口号口号口号';
					// echo wp_trim_words( get_the_content(), 50 );
					break;
			}?>
		</p>
	</div>
</div>

<?php get_footer(); ?>
