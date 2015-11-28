
		<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
			<div class="wrap clearfix">

			    <!-- Links -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				    <?php if( has_nav_menu( 'footer-menu' ) ) : ?>

					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'footer-menu',
								    'container'      => false,
								    'menu_id'        => 'links',
								    'menu_class'     => 'footer-menu',
								    'depth'          => '1'
							    )
						    );
					    ?>

			    	<?php endif; ?>
				</nav>

			    <!-- Copyright -->
				<p class="copyright">

				<?php if ( of_get_option( 'footer-text' ) ) : ?>
					<?php echo of_get_option( 'footer-text' ); ?>
				<?php else : ?>
					<a href="http://meetmighty.com/themes/relevant/" target="_blank"><?php _e( 'Relevant', 'mighty' ); ?></a> <?php _e( 'WordPress Theme by', 'mighty' ); ?> <a href="http://meetmighty.com/" target="_blank" title="Mighty WordPress Themes">Mighty Themes</a>
				<?php endif; ?>

				<span>
				<?php if ( of_get_option( 'copyright-text' ) ) : ?>
					<?php echo of_get_option( 'copyright-text' ); ?>
				<?php else : ?>
					<?php _e( 'Copyright', 'mighty' ); ?> &copy; <?php echo date( 'Y' ); ?> <?php _e( 'All rights reserved', 'mighty' ); ?>
				<?php endif; ?>
				</span>
				
				</p>


			</div>
		</footer>

		<?php if ( of_get_option( 'footer-scripts' ) ) : ?>
			<script type="text/javascript">
				<?php echo of_get_option( 'footer-scripts' ); ?>
			</script>
		<?php endif; ?>

		<?php wp_footer(); ?>

	</body>
</html>