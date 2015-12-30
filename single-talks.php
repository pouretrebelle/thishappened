<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
					
					<?php $event = get_field('event'); ?>

					<?php if ($event) : ?>

						<a href="<?php echo get_permalink($event); ?>"><?php echo get_the_title($event); ?></a> happened on <?php echo get_the_date('j F Y', $event->ID); ?>

					<?php else : ?>

					  <a href="../city/<?php the_author_meta('user_nicename'); ?>"/><?php the_author_meta('display_name'); ?></a> / <?php the_date( "j F Y" ); ?>

					<?php endif; ?>


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


			<?php if ($event) :

				$curID = $post->ID;
				$talks = get_field('talks', $event->ID);

				if (count($talks) > 1) :

					?>

					<h3 style="margin-top: 2em;">More talks from this event</h3>

					<ul class="category-talks clearfix">
					<?php foreach ($talks as $post) : ?>

						<?php if ($post->ID !== $curID) : ?>
						<?php setup_postdata($post); ?>


						<!-- Article -->
						<article class="post" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
							<?php
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'm', true);
								$thumb_url = $thumb_url_array[0];
							?>

							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="talk-thumb" style="background-image: url('<?php echo $thumb_url; ?>');"></div>
							</a>

							<h2 class="talk-title" itemprop="headline">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?>
								<?php the_excerpt(); ?></a>
							</h2>

						</article>

					<?php endif; endforeach; ?>
					</ul>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			<?php endif; ?>
				

			<?php endwhile; endif; ?>
		
		</main>

	</div>

</div>
		
<?php get_footer(); ?>