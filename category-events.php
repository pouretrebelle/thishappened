<?php /* Template Name: Events */ ?>

<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" class="full-width" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

		<div class="clearfix category-events">


        <?php 
            $args = array(
                'category_name'  => 'event',
                'posts_per_page' => 12,
                'post_status'    => 'future,publish',
            );

            $events = new WP_Query($args);
        ?>


		<?php if ( $events->have_posts() ) : ?>
			<?php while ( $events->have_posts() ) : $events->the_post(); ?>

				<!-- Article -->
				<article class="clearfix post<?php if( $count %3 == 0 ) { echo ' last'; }; ?>" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="item entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail( 's' ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="entry-wrap">

						<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

							<h2 class="entry-title" itemprop="headline">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>

							<?php
							$field_date = get_field('date');
							if ($field_date) :
								$date = DateTime::createFromFormat('Ymd', $field_date);
							?>
								<h5 class="entry-date"><?php echo $date->format('F d, Y'); ?></h5>
							<?php endif; ?>

						</header>

						<div class="entry-content" itemprop="text">
							<?php the_excerpt(); ?>
						</div>

					</div>

				</article>

				<?php if( $count %3 == 0 ) : ?>
					<div class="clearfix"></div>
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
