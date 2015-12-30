<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( is_author() ) : ?>
        
        <?php get_template_part('sidebar-city'); ?>
        <?php //dynamic_sidebar( 'sidebar-author' ); echo "<div>TIJMEN IS TOF</div>"; ?>

	<?php elseif ( is_blog() ) : ?>
        
        <?php dynamic_sidebar( 'sidebar-blog' ); ?>

	<?php else : ?>

		<?php dynamic_sidebar( 'sidebar-page' ); ?>
		
	<?php endif; ?>

</aside>