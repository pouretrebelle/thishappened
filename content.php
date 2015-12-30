<?php /* Post Format: Standard */ ?>

	<?php if ( !is_single() ) : ?>

		<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">


			<h2 class="entry-title" itemprop="headline">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>

		<!-- <p class="entry-meta">
			<time class="entry-time" itemprop="datePublished" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
			<?php _e( ' by ', 'mighty' ); ?>
			<span class="entry-author vcard" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" itemprop="url" rel="author"><?php echo get_the_author(); ?></a></span>
			<?php _e( ' with ', 'mighty' ); ?>
			<span class="entry-comments"><?php comments_popup_link( __( '0 Comments', 'mighty' ), __( '1 Comment', 'mighty' ), __( '% Comments', 'mighty' ) ); ?></span>
		</p> //-->
		
		</header>

	<?php endif; ?>

	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
	</div>

	<?php if (in_category('event')) : 
		
		$posts = get_field('talks');

		if ($posts) :

			?>

			<h2>Talks</h2>

			<ul class="event-talks">
			<?php foreach ($posts as $post) : ?>
				<?php setup_postdata($post); ?>
				<li class="event-talk">
					<?php the_content(); ?>
				</li>
			<?php endforeach; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

	<?php wp_link_pages( 'before=<div class="entry-links">&after=</div>' ); ?>
	
	<?php endif; ?>
