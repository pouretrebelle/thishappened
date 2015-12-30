<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
				  <a href="../city/<?php the_author_meta('user_nicename'); ?>"/><?php the_author_meta('display_name'); ?></a> / <?php the_date( "j F Y" ); ?>
				  <div class="entry-image clearfix">
					
					
					<?php 
			
					$content = $post->post_content;
					
					// http://vimeo.com/74209516 OR https
					
					$posvideo = strpos($content, "http://vimeo.com/");

					$regex = '/https?:\/\/vimeo\.com\//';
					preg_match($regex, $content, $matches, PREG_OFFSET_CAPTURE);
					$posvideo = $matches[1];
					
					if ($posvideo === false) {
					
					
					} else {
					
						$posbreak = strpos($content, "\n");
						
						$rest = substr($content, $posvideo, $posbreak-1);
						
						//echo(".".$rest.".");
						
						$content = substr($content, $posbreak);
						
						
						$wp_embed = new WP_Embed();
								//$post_embed = $wp_embed->run_shortcode( '[embed width="980"]' . get_post_meta( get_the_ID(), '_mighty_video-embed', true ) . '[/embed]' );
								
								//global $wp_embed;
						$post_embed = $wp_embed->run_shortcode('[embed]'.$rest.'[/embed]');
						
						echo $post_embed;
					
					}

					?>



					</div>

					<div class="whiteboard clearfix">
						<div class="entry-content" itemprop="text">
							<?php echo($content);//the_content(); ?>
						</div>

					</div>

				</article>

				<?php 
				//get_template_part( 'loop', 'portfolio' );
				?>

			<?php endwhile; endif; ?>
		
		</main>

	</div>

</div>
		
<?php get_footer(); ?>