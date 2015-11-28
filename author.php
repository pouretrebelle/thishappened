<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<main id="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<h2 class="archive-title">

			<?php

				if ( is_category() ) {
					printf( __( 'Category: %s', 'mighty' ), single_cat_title( '', false ) );
				} elseif ( is_tag() ) {
				    printf( __( 'Tagged: %s', 'mighty' ), single_tag_title( '', false ) );
				} elseif ( is_author() ) {
					$user = get_user_by( 'email', get_the_author_meta( 'email' ) );
					printf( __( '%s', 'mighty' ), $user->display_name );
				} elseif ( is_day() ) {
				    printf( __( 'Day: %s', 'mighty' ), get_the_date() );
				} elseif ( is_month() ) {
				    printf( __( 'Month: %s', 'mighty' ), get_the_date( 'F Y' ) );
				} elseif ( is_year() ) {
				    printf( __( 'Year: %s', 'mighty' ), get_the_date( 'Y' ) );
				} else {
				    _e( 'Archives', 'mighty' );
				}

			?>
			
			</h2>

			<?php if ( is_author( $author ) ) : ?>

				<!-- Author -->
				<section class="author-bio clearfix" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
					<?php //echo get_avatar( get_the_author_meta( 'email' ), '75', get_the_author() ); ?>
					<h1 class="author-name" itemprop="name">
						<?php //the_author_posts_link(); ?>
					</h1>
					<p class="author-description" itemprop="description">
						<?php the_author_meta( 'description' ); ?>
					</p>
				</section>

			<?php endif; ?>

<!-- The Loop -->

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php if ( in_category( 'Events' )) { ?>
        <article>
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="contentlist_thumbnail">
                <?php the_post_thumbnail( 's' ); ?>
            </div>
            <?php endif; ?>
            <div class="contentlist_text">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
                <?php the_title(); ?></a>
                <?php //the_time('d M Y'); ?> <?php //the_category('&');?>
                <p><?php the_excerpt(); ?> </p><hr/>
            </div>
        </article>    
        <?php }; ?>
    <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

<!-- End Loop -->

				<?php if ( $wp_query->max_num_pages > 1 ) : ?>

					<!--Pagination-->
					<div class="pagination">

						<?php if ( function_exists( 'wp_pagenavi' ) ) : ?>

							<?php wp_pagenavi(); ?>

						<?php else : ?>

							<?php next_posts_link( '<span>&larr;</span> '.__( 'Older Posts', 'mighty' ).'' ); ?>
							<?php previous_posts_link( __( 'Newer Posts', 'mighty' ).' <span>&rarr;</span>' ); ?>

						<?php endif; ?>

					</div>

				<?php endif; ?>

		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>
	
	</div>
	
</div>
			
<?php get_footer(); ?>