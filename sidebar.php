<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( is_author() ) : ?>
        
        <?php get_template_part('sidebar-city'); ?>
        <?php //dynamic_sidebar( 'sidebar-author' ); echo "<div>TIJMEN IS TOF</div>"; ?>

	<?php elseif ( is_blog() ) : ?>
        
        <?php dynamic_sidebar( 'sidebar-blog' ); ?>

        <?php
            $images = get_field('images');
            if ($images) :
            ?>
            <h3>Photos</h3>
            <ul class="galleria">
                <?php foreach($images as $image): ?>
                    <img data-jslghtbx="<?php echo $image['url']; ?>" data-jslghtbx-caption="<?php echo $image['caption']; ?>" data-jslghtbx-group="event" style="background-image: url('<?php echo $image['sizes']['s']; ?>');" class="gallery__thumb" data-jslghtbx></img>
                <?php endforeach; ?>
            </ul>
            <script src="<?php echo get_stylesheet_directory_uri(); ?>/includes/js/lightbox.min.js" type="text/javascript"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/includes/lightbox.css">
            <script>
                var lightbox = new Lightbox();
                lightbox.load();
            </script>
        <?php endif; ?>

	<?php else : ?>

		<?php dynamic_sidebar( 'sidebar-page' ); ?>
		
	<?php endif; ?>

</aside>