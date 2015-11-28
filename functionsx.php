<?php

function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'talks' )) {
          $single_template = dirname( __FILE__ ) . '/single-talks.php';
     }
     return $single_template;
}
add_filter( "single_template", "get_custom_cat_template" ) ;



function mighty_theme_setup() {
    	
    	/* Register WP3+ menus */
 		//register_nav_menu( 'header-menu', __( 'Header Menu', 'mighty' ) );
        //register_nav_menu( 'footer-menu', __( 'Footer Menu', 'mighty' ) );

    	/* Configure WP 2.9+ thumbnails */
    	add_theme_support( 'post-thumbnails' );
    	set_post_thumbnail_size( 295, 166 );

        //add_image_size( 's', 300, 300, true );
        //add_image_size( 'm', 640, '', true );
       // add_image_size( 'l', 980, '', true );

		//update_option( 'thumbnail_size_w', 80 );
		//update_option( 'thumbnail_size_h', 80 );
		//update_option( 'thumbnail_crop', 1 );

       // add_theme_support( 
       //     'post-formats', 
       //     array(
       //         'gallery',
       //         'link',
       //         'quote',
       //         'video',
        //        'audio'
       //     ) 
       // );     

       // add_theme_support( 'automatic-feed-links' );
       // add_post_type_support( 'page', 'excerpt' );

    
}

add_action( 'after_setup_theme', 'mighty_theme_setup' );

/*
function change_author_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'city';
    $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
}
add_action('init','change_author_permalinks');
*/
?>