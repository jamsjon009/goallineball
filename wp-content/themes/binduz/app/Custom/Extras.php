<?php
namespace Binduz\Custom;

/**
 * Extras.
 */
class Extras
{
	/**
     * register default hooks and actions for WordPress
     * @return
     */
	public function register()
	{
		add_filter( 'body_class', array( $this, 'body_class' ) );
		add_filter( 'post_class', array( $this, 'binduz_post_class' ) );
	    add_action( 'wp_head', array( $this, 'binduz_pingback_header' )  );
	}

	public function body_class( $classes )
	{
       
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		
		if ( is_active_sidebar( 'sidebar-1' ) ) {
		  $classes[] = 'sidebar-active';
		}else{
			$classes[] = 'sidebar-inactive';
		}
		// page color
		if(is_page()){

			$dark =  binduz_meta_option(get_the_id() ,'dark_page','no');
			
			if($dark == 'yes'){
				$classes[] = 'dark-theme';
				$classes[] = 'primay_bg';
			}

		}
	
	    return $classes;
	
	}

	function binduz_post_class( $classes ) {
 
		if ( 'post' === get_post_type() ) {

			if ( is_single() && !has_post_thumbnail() ) {
				$classes[] = 'post-no-thumbnail';
			}
		}
		return $classes;
	}
 

	public function binduz_pingback_header() {

		if ( is_singular() && pings_open() ) {
			
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}


