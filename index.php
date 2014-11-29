<?php get_header(); ?>

<?php switch (pll_current_language()) {
	case 'en':
		layerslider(3, 'homepage');
		// echo wp_trim_words( get_the_content(), 20 );
		break;
	
	default:
		layerslider(7, 'homepage');
		// echo wp_trim_words( get_the_content(), 50 );
		break;
}?>

	<?php // Home Slider
		if ( is_active_sidebar( 'home-slider' ) ) : 
	?>
	
		<div id="home-slider">
		
			<?php dynamic_sidebar( 'home-slider' ); ?>
				
		</div><!-- #home-slider -->
			
	<?php endif; ?>
		

	<?php // Mini Features
		if(get_option($shortname.'_home_features_enable') == 'on') { 
	?>
		<div id="home-features">
			
			<div class="container clearfix">
				<h1 class="ty-section-title">
					<?php switch (pll_current_language()) {
						case 'en':
							echo 'Services';
							break;
						
						default:
							echo '我们的服务';
							break;
					}?>
				</h1>
				<?php
				    query_posts( array(
					'post_type' => 'feature',
					'posts_per_page' => get_option($shortname.'_home_features_num'),
					'order'          => 'asc'
					));				
					$feature_count = 1; 
					if (have_posts()) : while (have_posts()) : the_post(); 
				    $has_icon = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large')[0];
				    //$has_icon = get_post_meta(get_the_ID(), 'tj_feature_icon', TRUE);
				    //$more_link = get_post_meta(get_the_ID(), 'tj_feature_more_link', TRUE);				    
				?>	
				<div class="feature-block <?php if($feature_count%3==0) { echo "last-feature"; } ?>">
					<a href="<?php if(get_page_by_title( '服务' )) echo get_permalink( get_page_by_title( '服务' ) ); ?>">
					<?php if($has_icon <> '') { echo '<img class="entry-thumb" src="'.$has_icon.'" alt="';the_title();echo '"/>'; } ?>			
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<p><?php switch (pll_current_language()) {
							case 'en':
								echo wp_trim_words( get_the_content(), 40);
								break;
							
							default:
								echo wp_trim_words( get_the_content(), 110);
								break;
					}?></p>
						<div class="all">
							<span><?php switch (pll_current_language()) {
								case 'en':
									echo 'Read More &raquo';
									break;
								
								default:
									echo '全文 &raquo';
									break;
							}?></span>
						</div><!-- .all -->
					</a>
				</div><!-- .feature-block -->
				<?php 
					if($feature_count%4==0) { 
						echo "<div class='clear'></div>"; 
					}
					$feature_count++; 
					endwhile; endif;
					wp_reset_postdata();
				?>
			</div><!-- .container -->
			
		</div><!-- #home-features -->	
		
	<?php } ?>	
	
		
	<?php // Portfolio
		if(get_option($shortname.'_home_portfolio_enable') == 'on') { 
	?>		
		
		<div id="home-work">
		<div class="container">
			<div class="section-desc">
				<h3 class="section-title">
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Community';
							break;
						
						default:
							echo '社区';
							break;
					}?>
				</h3>			
				<p>
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, eius.';
							break;
						
						default:
							echo '博客，仅音译，它的正式名称为网络日志；又音译为部落格或部落阁等，是一种通常由个人管理、不定期张贴新的文章的网站。';
							break;
					}?>
				</p>
				<div class="more-button"><a href="<?php if(get_page_by_title( '分享' )) echo get_permalink( get_page_by_title( '分享' ) ); ?>">
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Community Share';
							break;
						
						default:
							echo '社区分享';
							break;
					}?>
				</a></div>
			</div><!-- .section-desc -->
			<div class="section-content">
				<?php
					$i = 1;
					query_posts( array(
						'post_type' => 'portfolio',
						'posts_per_page' => get_option($shortname.'_home_portfolio_num')
						));
					if ( have_posts() ) : while ( have_posts() ) : the_post();
					$short_desc = get_post_meta(get_the_ID(), 'tj_portfolio_short_desc', TRUE);
				?>
					<article id="portfolio-<?php the_ID(); ?>" class="portfolio-item <?php if($i%3==0) { echo "item-last"; } ?>">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio-thumb', array('class' => 'entry-thumb')); ?></a>	
                        <h1 class="entry-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
<?php the_title(); ?></a></h1>
                        <p class="entry-desc">
							<?php echo $short_desc; ?>
						</p><!-- .entry-desc -->
					</article><!-- .portfolio-item -->
					<?php if($i%3==0) { echo "<div class='clear'></div>"; } ?>
						
					<?php $i++; endwhile; else: ?>
					<?php endif; wp_reset_postdata(); wp_reset_query(); ?>
			</div><!-- .section-content -->
			<div class="clear"></div>
		</div><!-- .container -->
		</div><!-- #home-work -->
	
	<?php } ?>	

	<?php //Posts
		if(get_option($shortname.'_home_posts_enable') == 'on') { 
	?>		

		<div id="home-posts">
			<div class="container">
			<div class="section-desc">
				<h3 class="section-title">
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Gene';
							break;
						
						default:
							echo '基因';
							break;
					}?>
				</h3>			
				<p>
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, eius.';
							break;
						
						default:
							echo '博客，仅音译，它的正式名称为网络日志；又音译为部落格或部落阁等，是一种通常由个人管理、不定期张贴新的文章的网站。';
							break;
					}?>
				</p>
				<div class="more-button"><a href="<?php if(get_page_by_title( '基因' )) echo get_permalink( get_page_by_title( '基因' ) ); ?>">
				<?php switch (pll_current_language()) {
						case 'en':
							echo 'Read More';
							break;
						
						default:
							echo '浏览更多';
							break;
					}?>
				</a></div>
			</div><!-- .section-desc -->			
			<div class="section-content">
						<?php
							$i = 1;
						    query_posts( array(
								'posts_per_page' => get_option($shortname.'_home_posts_num')
							));
							if (have_posts()) : while (have_posts()) : the_post(); 
						?>
							
							<article id="post-<?php the_ID(); ?>" class="hentry post <?php if($i%3==0) { echo "item-last"; } ?>">
								
								<div class="post-thumb">
										<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('post-thumb', array('class' => 'entry-thumb')); ?>
										</a>
								</div><!-- .post-thumb -->
							
				<div class="published"><?php the_time('m'); ?>/<?php the_time('d'); ?></div>		                            
								
									<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
										
									<div class="entry-excerpt">
										<?php switch (pll_current_language()) {
											case 'en':
												echo wp_trim_words( get_the_content(), 20 );
												break;
											
											default:
												echo wp_trim_words( get_the_content(), 50 );
												break;
										}?>
									</div><!-- .entry-excerpt -->
									
								<div class="clear"></div>
							
							</article><!-- #post -->
							
							<?php if($i%3==0) { echo "<div class='clear'></div>"; } ?>
															
						<?php $i++; endwhile; else: ?>
						<?php endif; wp_reset_postdata(); wp_reset_query(); ?>	
					</ul>
			</div><!-- .section-content -->
			<div class="clear"></div>
			</div><!-- .container -->
		</div><!-- #home-posts -->

	<?php } ?>	

	<?php //Testimonials
		if(get_option($shortname.'_home_testimonials_enable') == 'on') { 
	?>		
	
		<div id="home-testimonials">
		<div class="block-heading">
		<?php switch (pll_current_language()) {
						case 'en':
							echo 'Trusted by <strong>12,309</strong> happy customers';
							break;
						
						default:
							echo '12309 位客户信任我们';
							break;
					}?>
		</div>
		
		<div class="container clearfix">
				<?php
					query_posts( array(
					    'post_type' => 'testimonial',
					    'posts_per_page' => 10
					));
					if (have_posts()) : while (have_posts()) : the_post();
				    // $author_name = get_post_meta(get_the_ID(), 'tj_testimonial_author_name', TRUE);
				    // $site_name = get_post_meta(get_the_ID(), 'tj_testimonial_site_name', TRUE);
				    // $site_url = get_post_meta(get_the_ID(), 'tj_testimonial_site_url', TRUE);				
				?>
				
					<article id="testimonial<?php the_ID(); ?>" class="testimonial">
						<div class="testimonial-content">
							<blockquote><p>
							<?php switch (pll_current_language()) {
								case 'en':
									echo wp_trim_words( get_the_content(), 20 );
									break;
								
								default:
									echo wp_trim_words( get_the_content(), 50 );
									break;
							}?>
							</p></blockquote>
						</div><!-- .testimonial-content -->
						<div class="testimonial-author">
							<span class="author-name"><?php the_title(); ?></span> <span class="site-url">&#8211;</span>
						</div><!-- .testimonial-author -->
					</article><!-- .testimonial -->
					
				<?php endwhile; else: ?>
				<?php endif; wp_reset_postdata(); wp_reset_query(); ?>
				<div class="testimonial-nav-wrapper clearfix">
				<ul class="testimonial-nav">					
				<?php
					query_posts( array(
					    'post_type' => 'testimonial',
					    'posts_per_page' => 10
					));
					if (have_posts()) : while (have_posts()) : the_post();						
				    $author_avatar = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large')[0];								    								    
				?>
					<li><a href="#testimonial<?php the_ID(); ?>"><img class="author-avatar" src="<?php echo $author_avatar; ?>" alt="<?php the_title(); ?>"/></a></li>
				<?php endwhile; else: ?>
				<?php endif; wp_reset_postdata(); wp_reset_query(); ?>
				</ul><!-- .testimonial-authors -->
				</div><!-- .testimonial-nav-wrapper -->
							
		</div>

		</div><!-- #home-testimonials -->

	<?php } ?>

<?php get_footer(); ?>