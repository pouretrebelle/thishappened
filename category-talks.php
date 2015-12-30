<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<div class="clearfix">

			<?php
			/*
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}

				$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 9, 'paged' => $paged );

				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query( $args );

				$count = 1;
				*/
			?>

		

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

						<?php $event = get_field('event'); ?>

						<?php if ($event) : ?>
							<a href="<?php echo get_permalink($event); ?>"><?php echo get_the_title($event); ?></a> / <?php echo get_the_date('F Y', $event->ID); ?>
						<?php else : ?>
						 	<a href="../city/<?php the_author_meta('user_nicename'); ?>"/><?php the_author_meta('display_name'); ?></a> / <?php the_date( "F Y" ); ?>
						<?php endif; ?>
					</h2>

				</article>

		<?php endwhile; ?>

		</div>

		

	<?php endif; ?>
				
				
				
				

			</div><!--/.clearfix-->

		
		</main>

	</div>

</div>
			
<?php get_footer(); ?>
