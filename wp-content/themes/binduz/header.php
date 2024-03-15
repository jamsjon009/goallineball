<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package binduz
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php 
	    if ( function_exists( 'wp_body_open' ) ){
			wp_body_open();
		}
		
	?>
     <a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'binduz' ); ?></a>
		<?php 
		      
				$header_style         = binduz_option('header_layout_style','style1');
				$page_override_header = binduz_meta_option( get_the_ID(), 'page_header_override' );
				
				if($page_override_header=='yes'):
					$page_header_layout_style = binduz_meta_option( get_the_ID(), 'page_header_layout_style','style1' );
					$header_style             = $page_header_layout_style;
				endif;  
			     
				
				get_template_part( 'template-parts/headers/header', $header_style ); 
		?>
	
