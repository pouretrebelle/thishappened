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
				<article class="post<?php //if( $count %3 == 0 ) { echo ' last'; }; ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
					<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
							<div class="item">
							  <?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<?php the_post_thumbnail( 'm' ); ?>
									<div class="overlay"></div>
									<span class="view"><?php _e( 'Watch', 'mighty' ); ?></span>
								</a>
							</div>
					  <?php endif; ?>
						<h2 class="entry-title" itemprop="headline">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?>
						<?php the_excerpt(); ?></a>
						  <a href="../city/<?php the_author_meta('user_nicename'); ?>"/><?php the_author_meta('display_name'); ?></a> / <?php the_date( "F Y" ); ?>
						</h2>

					</header>

					

				</article>

				<?php if( $count %3 == 0 ) : ?>
					<!--<div class="clearfix"></div> //-->
				<?php endif; ?>

				<?php $count ++; ?>

		<?php endwhile; ?>

		</div>

		

	<?php endif; ?>
				
				
				
				

			</div><!--/.clearfix-->

		
		</main>

	</div>

</div>
			
<?php get_footer(); ?>
