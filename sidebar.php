<aside id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

	<?php if ( is_blog() ) : ?>

		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
		
	<?php elseif ( is_author() ) : ?>

		<?php dynamic_sidebar( 'sidebar-author' ); echo "<div>TIJMEN IS TOF</div>"; ?>

	<?php else : ?>

		<?php dynamic_sidebar( 'sidebar-page' ); ?>
		
	<?php endif; ?>

</aside>