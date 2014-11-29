<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php
	        $image = array();
	        $video_embed = get_post_meta(get_the_ID(), 'tj_video_embed_portfolio', TRUE);
            $have_embed = FALSE;
	        $have_img = FALSE;

            if($video_embed <> ''){
                $have_embed = TRUE;
            }
			$short_desc = get_post_meta(get_the_ID(), 'tj_portfolio_short_desc', TRUE);
			$client = get_post_meta(get_the_ID(), 'tj_portfolio_client', TRUE);				     
			$link = get_post_meta(get_the_ID(), 'tj_portfolio_link', TRUE);	
		?>
		
			<div class="page-header">
							
				<h1 class="page-title container"><?php the_title(); ?></h1>
							
			</div><!-- .page-header -->
		
			<div id="main" class="clearfix">

	        <div id="content" class="one-col">
	        
			    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			    
			    	<!-- <div class="entry-header">
		    			<h1 class="widget-title"><?php the_title(); ?></h1>
						<p class="entry-desc">
							<?php echo $short_desc; ?>
						</p>
			    	</div> --><!-- .entry-header -->
					
			    	<?php if($video_embed == '') : ?>
					<?php
		                $meta = get_post_meta( get_the_ID(), 'tj_image_ids', true );
		                $button_text = ($meta) ? __('Edit Gallery', 'junkie') : $field['std'];
		                if( $meta ) {
		                    $field['std'] = __('Edit Gallery', 'junkie');
		                    $thumbs = explode(',',rtrim($meta, ','));
		                    $thumbs_output = "<div class='flexslider'><ul class='slides'>";
		                    foreach( $thumbs as $thumb ) {
		                        $thumbs_output .= '<li>' . wp_get_attachment_image( $thumb,"large" ) . '</li>';
		                    }
		                    echo $thumbs_output."</ul></div>";
		                }
		            ?>
		            
		            <?php endif; ?>
					
					<?php if($video_embed!=''):?>
						<div class="video-portfolio">
							<?php echo stripslashes(htmlspecialchars_decode($video_embed)); ?>
						</div><!-- .video-portfolio -->
					<?php endif; ?>
	
			    </div><!-- #post-<?php the_ID(); ?> -->
			    
		
		<?php endwhile; else: ?>
	
		<?php endif; ?>
	
		<div class="clear"></div>

	        <div class="entry-meta">
	        <span class="date">
				<strong><?php the_date(); ?></strong>			
	        </span><!-- .date -->
	        <?php if($client != null) : ?>
		        <span class="client">
					<strong>
					<?php switch (pll_current_language()) {
						case 'en':
							echo 'shake_error_codes';
							// echo wp_trim_words( get_the_content(), 20 );
							break;
						
						default:
							echo '分享者';
							// echo wp_trim_words( get_the_content(), 50 );
							break;
					}?>
					: </strong>			
		        	<?php echo $client; ?>
		        </span><!-- .client -->
	        <?php endif; ?>      
	        <span class="skills"> 					
			<?php $terms = get_the_terms( get_the_ID(), 'portfolio-type' ); ?>
			<?php if(is_array($terms)){ ?>
					<strong><?php _e('Skills', 'junkie'); ?>: </strong>			
						<?php foreach ($terms as $term) :  ?>
							<?php echo $term->name; ?><br/>
						<?php endforeach; ?>
					<div class="clear"></div>
			<?php } ?>
	        </span><!-- .skills -->
								
			</div><!-- .entry-meta -->
			
			<div class="entry-content">
				<?php the_content(''); ?>				
				<?php edit_post_link( __('Edit', 'junkie'), '<span class="edit-post">', '</span>' ); ?>
	        </div><!-- .entry-content -->
			
	        <div class="clear"></div>
	
	
       
			</div><!-- #content -->
       
       
       </div><!-- #main -->
                	
<?php get_footer(); ?>