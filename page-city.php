<?php /* Template Name: City Profile */ ?>

<?php get_header(); ?>

<div class="container">

	<div class="wrap clearfix">

		<?php if ( has_post_thumbnail() ) : ?>

			<?php $content_width = 980; ?>

			<div class="entry-image">
				<?php the_post_thumbnail( 'l' ); ?>
			</div>

		<?php endif; ?>

		<main id="content" role="main" itemprop="mainContentOfPage">

			<?php while ( have_posts() ) : the_post(); ?>

				hello	
				<?php var_dump($post); ?>

				<!-- Article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

					<div class="entry-content" itemprop="text">
						<?php the_content(); ?>
					</div>

					<?php wp_link_pages( array( 'before' => '<nav class="pagination">', 'after' => '</nav>' ) ); ?>

				</article>

			<?php endwhile; ?>
		
		</main>

		<!--Sidebar-->
		<?php get_sidebar(); ?>

	</div>

</div>
			
<?php get_footer(); ?>
