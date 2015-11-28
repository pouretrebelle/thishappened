<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
					<div class="entry-image clearfix">

						<?php
							// First check if slideshow gallery is checked
							if ( get_post_meta( get_the_ID(), '_mighty_slideshow-gallery', true ) ) :
						?>

							<div class="flexslider">
							    <ul class="slides">
							        <?php mighty_gallery( $post->ID ); ?>
							    </ul>
							</div>

						<?php 
							// Check for self-hosted video, if found display it
							elseif ( get_post_meta( get_the_ID(), '_mighty_video-url', true ) ) :
						?>
							
							<?php if ( has_post_thumbnail() ) : ?>

								<?php
									$poster = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'l' );
									$url = $poster['0'];
								?>

								<?php echo do_shortcode( '[video src="' . get_post_meta( get_the_ID(), '_mighty_video-url', true ) . '" poster="' . $url . '" width="980"]' ); ?>

							<?php else : ?>

								<?php echo do_shortcode( '[video src="' . get_post_meta( get_the_ID(), '_mighty_video-url', true ) . '" width="980"]' ); ?>
								
							<?php endif; ?>

						<?php
							// Check for third-party embedded video, if found display it
							elseif ( get_post_meta( get_the_ID(), '_mighty_video-embed', true ) ) :
						?>

							<?php
								$wp_embed = new WP_Embed();
								$post_embed = $wp_embed->run_shortcode( '[embed width="980"]' . get_post_meta( get_the_ID(), '_mighty_video-embed', true ) . '[/embed]' );
							?>

							<?php echo $post_embed; ?>

						<?php
							// Check if audio file has been assigned, if so, display it.
							elseif ( get_post_meta( get_the_ID(), '_mighty_audio-file', true ) ) :
						?>

							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'l' ); ?>
							<?php endif; ?>
							<?php echo do_shortcode( '[audio src="' . get_post_meta( get_the_ID(), '_mighty_audio-file', true ) . '" width="980"]' ); ?>

						<?php
							// Lastly, just display the single featured thumbnail.
							else :
						?>

							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'l' ); ?>
							<?php endif; ?>

						<?php endif; ?>

					</div>

					<div class="whiteboard clearfix">

						<aside class="portfolio-meta">

							<?php if ( get_post_meta( get_the_ID(), '_mighty_project-date', true ) ) : ?>
								<p><?php _e( 'Date', 'mighty' ); ?>: <span><?php echo get_post_meta( $post->ID, '_mighty_project-date', true ) ?></span></p>
							<?php endif; ?>

							<?php if ( get_post_meta( get_the_ID(), '_mighty_client-name', true ) ) : ?>
								<?php if ( get_post_meta( get_the_ID(), '_mighty_client-url', true ) ) : ?>
									<p><?php _e( 'Client', 'mighty' ); ?>: <span><a href="<?php echo get_post_meta( $post->ID, '_mighty_client-url', true ) ?>" title="<?php echo get_post_meta( $post->ID, '_mighty_client-name', true ) ?>"><?php echo get_post_meta( $post->ID, '_mighty_client-name', true ) ?></a></span></p>
								<?php else : ?>
									<p><?php _e( 'Client', 'mighty' ); ?>: <span><?php echo get_post_meta( $post->ID, '_mighty_client-name', true ) ?></span></p>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( get_post_meta( get_the_ID(), '_mighty_project-skills', true ) ) : ?>
								<p><?php _e( 'Skills', 'mighty' ); ?>: <span><?php echo get_post_meta( $post->ID, '_mighty_project-skills', true ) ?></span></p>
							<?php endif; if ( get_post_meta( get_the_ID(), '_mighty_project-url', true ) ) : ?>
								<p><a href="<?php echo get_post_meta( $post->ID, '_mighty_project-url', true ) ?>" target="_blank"><?php if ( get_post_meta( get_the_ID(), '_mighty_project-link-text', true ) ) : ?><?php echo get_post_meta( $post->ID, '_mighty_project-link-text', true ); ?><?php else : ?><?php echo get_post_meta( $post->ID, '_mighty_project-url', true ) ?><?php endif; ?></a></p>
							<?php endif; ?>	

						</aside>

						<div class="entry-content" itemprop="text">
							<?php the_content(); ?>
						</div>

					</div>

				</article>

				<?php get_template_part( 'loop', 'portfolio' ); ?>

			<?php endwhile; endif; ?>
		
		</main>

	</div>

</div>
			
<?php get_footer(); ?>