<?php

namespace Binduz\Setup;
use Binduz\Core\Hook\binduz_Unyson_Google_Fonts;

/**
* Enqueue.
*/

class InlineStyle  {
    /**
    * register default hooks and actions for WordPress
    * @return
    */

    public function register()
    {
        add_action( 'wp_enqueue_scripts',  array( $this, 'dynamic_style' ) );
    }

    public function dynamic_style() {
       
        $unit      = 'px';
        $container = '';
        // style option
        $style_body_bg = binduz_option( 'style_body_bg', '#f8f8f8' );

        $blog_cat_color                  = binduz_option( 'blog_cat_color' );
        $blog_cat_background_color       = binduz_option( 'blog_cat_background_color' );
        $blog_cat_background_hover_color = binduz_option( 'blog_cat_background_hover_color' );
      
        $blog_main_section = binduz_option( 'blog_main_section' );
        $container         = binduz_option( 'style_container_width' );

        $style_primary        = binduz_option( 'style_primary' );
        $blog_meta_color      = binduz_option( 'blog_meta_color' );
        $blog_meta_icon_color = binduz_option( 'blog_meta_icon_color' );

        $title_color        = binduz_option( 'title_color' );
        $body_font          = binduz_option( 'body_font' );
        $heading_font_one   = binduz_option( 'heading_font_one' );
        $heading_font_two   = binduz_option( 'heading_font_two' );
        $heading_font_three = binduz_option( 'heading_font_three' );

		$topbar_bg_img = binduz_option('topbar_bg_image');
		$topbar_show   = binduz_option('topbar_show');
        
        // sidebar
        $sidebar_background_color           = binduz_option( 'sidebar_background_color' );
        $sidebar_padding_top                = binduz_option( 'sidebar_padding_top' );
        $sidebar_padding_bottom             = binduz_option( 'sidebar_padding_bottom' );
        $sidebar_padding_lf                 = binduz_option( 'sidebar_padding_lf' );
        $sidebar_widget_title_margin_top    = binduz_option( 'sidebar_widget_title_margin_top' );
        $sidebar_widget_title_margin_bottom = binduz_option( 'sidebar_widget_title_margin_bottom' );
        $sidebar_widget_bottom_margin       = binduz_option( 'sidebar_widget_bottom_margin' );
        $sidebar_alignment                  = binduz_option( 'sidebar_alignment' );
        $sidebar_widget_title_color         = binduz_option( 'sidebar_widget_title_color' );
        $sidebar_widget_content_color       = binduz_option( 'sidebar_widget_content_color' );

        // footer
        $footer_bg_color                   = binduz_option( 'footer_bg_color', '#17222B' );
        $footer_copyright_bg_color         = binduz_option( 'footer_copyright_bg_color' );
        $footer_copyright_color            = binduz_option( 'footer_copyright_color','#999999' );
        $footer_copyright_link_color       = binduz_option( 'footer_copyright_link_color','#999999' );
        $footer_padding_top                = binduz_option( 'footer_padding_top' );
		
        $footer_padding_bottom             = binduz_option( 'footer_padding_bottom' );
        $footer_bg_img                     = binduz_option( 'footer_bg_img' );
        $footer_copyright_font_size        = binduz_option( 'footer_copyright_font_size' );
		$footer_widget_title_margin_bottom = binduz_option( 'footer_widget_title_margin_bottom' );
		
		$footer_widget_title_margin_top    = binduz_option( 'footer_widget_title_margin_top' );
		$footer_builder_style_settings     = binduz_option('footer_builder_style_settings');
   
        $footer_text_color                 = binduz_option( 'footer_text_color' );
		$footer_widget_title_color         = binduz_option( 'footer_widget_title_color' );
		
		$related_post_background           = '';
		$related_post_box_padding          = '';

		if(is_single()){
			$related_post_background   = binduz_meta_option( get_the_ID(),'related_post_background' );
			$related_post_box_padding  = binduz_meta_option( get_the_ID(),'related_post_box_padding' );
		}
		
        //header
        $header_style = 'style1';

        $header_builder_style_settings = binduz_option( 'header_builder_style_settings' );

        if ( isset( $header_builder_style_settings['no'] ) ) {

            $header_style  = isset( $header_builder_style_settings['no']['header_layout_style'] ) ? $header_builder_style_settings['no']['header_layout_style'] : 'style1';

        }

        $page_override_header     = binduz_meta_option( get_the_ID(), 'page_header_override' );
        $page_header_layout_style = binduz_meta_option( get_the_ID(), 'page_header_layout_style', 'style1' );
        $page_container           = binduz_meta_option( get_the_ID(), 'style_container_width' );

        if ( is_page() ) {

            $custom_body_bg  = binduz_meta_option( get_the_ID(), 'style_body_bg' );

            if ( $custom_body_bg != '' ) {
                $style_body_bg = $custom_body_bg;

            }

        }

        if ( $page_override_header == 'yes' ):
        $header_style = $page_header_layout_style;
        endif;

        $custom_css = "
	  	   body{
				  background:{$style_body_bg };
			   } 
			";

        if ( $blog_cat_color != '' ) {
            $custom_css .= "
			.qs__blog__content .binduz-er-author-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,
			.qs__blog__content .binduz-er-latest-news-item .binduz-er-content .binduz-er-meta-categories a,
			.qs__blog__content .binduz-er-news-viewed-most .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,
			.qs__blog__content .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-categories a{
				color:{$blog_cat_color };
			} 
		 ";

        }

		if ( $blog_cat_background_color != '' ) {
            $custom_css .= "
			 .qs__blog__content .binduz-er-author-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,
			 .qs__blog__content .binduz-er-latest-news-item .binduz-er-content .binduz-er-meta-categories a,
			 .qs__blog__content .binduz-er-news-viewed-most .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,
			 .qs__blog__content .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-categories a{
				background-color:{$blog_cat_background_color };
			} 
		 ";

        }
		if ( $blog_cat_background_hover_color != '' ) {
            $custom_css .= "
			 .qs__blog__content .binduz-er-author-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a:hover,
			 .qs__blog__content .binduz-er-latest-news-item .binduz-er-content .binduz-er-meta-categories a:hover,
			 .qs__blog__content .binduz-er-news-viewed-most .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a:hover,
			 .qs__blog__content .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-categories a:hover{
				background-color:{$blog_cat_background_hover_color };
			} 
		 ";

        }


    
        $body_font = binduz_typhography_option( $body_font );
        
        $custom_css .= "
				body{
					$body_font
				} 
			";
	
        $heading_font_one = binduz_typhography_option( $heading_font_one );

        $custom_css .= "
			h1,h2{
				$heading_font_one
				} 
		   ";

        $heading_font_two   = binduz_typhography_option( $heading_font_two );

        $custom_css .= "
				h3{ 
					$heading_font_two 
				}
			";

        $heading_font_three = binduz_typhography_option( $heading_font_three );
        $custom_css .= "
				h4,h5{ 
					$heading_font_three 
				}
			";

        if ( $style_primary != '' ) {
            $custom_css	 .= " 
                body{
                    color:$style_primary;
                    }
                ";
        }
        if ( $blog_meta_color != '' ) {
            $custom_css	 .= " 
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-item a span, .binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-meta-list ul li,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-author span span a,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-date span,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-author span{
                    color:$blog_meta_color;
                    }
                ";
        } 
		
		
		if ( $blog_meta_icon_color != '' ) {
            $custom_css	 .= " 
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-item a span i, .binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-meta-list ul li i,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-author span span i,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-date span i,
			.binduz-er-author-item .binduz-er-content .binduz-er-meta-author .binduz-er-author span i{
                    color:$blog_meta_icon_color;
                    }
                ";
        }

        if ( $title_color != '' ) {
            $custom_css	 .= " 
			.binduz-er-author-item .binduz-er-content .binduz-er-title a{
                        color:$title_color;
                        }
                ";
        }

        // sidebar

        if ( $sidebar_background_color != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar {
				background:$sidebar_background_color;
				}
			";
        }

        if ( $sidebar_widget_title_color != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar .widget-title{
				color:$sidebar_widget_title_color;
				}
			";
        }

        if ( $sidebar_widget_content_color != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar .search-input,
			.qs__blog__sidebar .search-input::placeholder,
			.qs__blog__sidebarr .search-submit svg,
			.qs__blog__sidebar ul li a.url,
			.qs__blog__sidebar .tagcloud a,
			.qs__blog__sidebar ul li,
			.qs__blog__sidebarr select option,
			.qs__blog__sidebar .widget,
			 .qs__blog__sidebar , 
			  .qs__blog__sidebar ul li a, 
			  .binduz-er-latest-news-item .binduz-er-content .binduz-er-title a,
			  .binduz-er-populer-news-social .binduz-er-recently-viewed-item .binduz-er-latest-news-item .binduz-er-content .binduz-er-meta-author span span,
			  .binduz-er-sidebar-latest-post-box .binduz-er-sidebar-latest-post-item .binduz-er-content span,
			  .binduz-er-sidebar-latest-post-box .binduz-er-sidebar-latest-post-item .binduz-er-content .binduz-er-title a
			  {
				   color:$sidebar_widget_content_color;
				}
			";
        }

        if ( $sidebar_padding_top != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar {
				padding-top:$sidebar_padding_top$unit;
				}
			";
        }

        if ( $sidebar_padding_bottom != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar {
				padding-bottom:$sidebar_padding_bottom$unit;
				}
			";
        }

        if ( $sidebar_padding_lf != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar{
				padding-left:$sidebar_padding_lf$unit;
				padding-right:$sidebar_padding_lf$unit;
				}
			";
        }

        if ( $sidebar_widget_title_margin_bottom != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar .widget .widget-title {
				margin-bottom:$sidebar_widget_title_margin_bottom$unit;
				
				}
			";
        }

        if ( $sidebar_widget_title_margin_top != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar .widget .widget-title {
				margin-top:$sidebar_widget_title_margin_top$unit;
				
				}
			";
        }
        if ( $sidebar_widget_bottom_margin != '' ) {
            $custom_css	 .= " 
			.qs__blog__sidebar .widget {
				margin-bottom:$sidebar_widget_bottom_margin$unit;
				
				}
			";
        }

		 // footer

		if($footer_bg_color!=''){

		$custom_css .= "
			.qs__blog__footer__top__area {
				background: $footer_bg_color;
			}
		";

        }
		if($footer_widget_title_color!=''){
		$custom_css .= "
			.qs__blog__footer__top__area .widget-title
			{
				color: $footer_widget_title_color;
			}
		";

        }

        if ( $footer_text_color != '' ) {

			$custom_css .= "
			.qs__blog__footer__top__area .rsswidget, 
			.qs__blog__footer__top__area .tagcloud a ,
			.qs__blog__footer__top__area ul .cat-item a,
			.qs__blog__footer__top__area select option, 
			.qs__blog__footer__top__area caption,
			.qs__blog__footer__top__area,.footer a,
			.qs__blog__footer__top__area p ,
			.qs__blog__footer__top__area .footer-text,
			.qs__blog__footer__top__area ul li,
			.qs__blog__footer__top__area ul li a,
			.qs__blog__footer__top__area .single_footer_nav ul li a,
			.qs__blog__footer__top__area .extra_newss .single_extra_news a,
			.qs__blog__footer__area .extra_newss .single_extra_news p a,
			.qs__blog__footer__area .extra_newss .single_extra_news p span,
			.qs__blog__footer__area .extra_newss .single_extra_news span.news_counter,
			.qs__blog__footer__area .twitter_feeds .single_twitter_feed h6,
			.qs__blog__footer__area .twitter_feeds .single_twitter_feed p,
			.qs__blog__footer__area .widget a,
			.qs__blog__footer__area .extra_newss .single_fcontact a,
			.qs__blog__footer__area ul li a svg{
					color: $footer_text_color;
				}
			";
			$custom_css .= "
				.widget_rss li cite:before{
					background: $footer_text_color;
				}
			"; 
	
		}

		if($footer_copyright_bg_color!=''){

			$custom_css .= "
			.qs__blog__footer__bottom__area {
					background: $footer_copyright_bg_color;
				}
			";

		}

		if($footer_copyright_font_size > 0){
			$custom_css .= "
			.qs__blog__footer__copyright p {
					font-size: $footer_copyright_font_size$unit;
				}
			";
		}

		if($footer_copyright_color !=''){
			$custom_css .= "
			.qs__blog__footer__copyright p{
					color: $footer_copyright_color;
				}
			";
		}

		if($footer_copyright_link_color !=''){
			$custom_css .= "
			.qs__blog__footer__copyright p a{
					color: $footer_copyright_link_color;
				}
			";
		}

        if($footer_padding_top > 0 ){
			$custom_css .= "
			.qs__blog__footer__top__area{
					padding-top: $footer_padding_top$unit;
				}
			";

		}
		
        if( $footer_padding_bottom > 0 ) {      
			$custom_css .= "
			.qs__blog__footer__top__area{
					padding-bottom: $footer_padding_bottom$unit;
				}
			";
		}

		if( $footer_widget_title_margin_top != '' ) {
			$custom_css .= "
			.qs__blog__footer__area .widget-title , .qs__blog__footer__area .widget-title2{
					margin-top: $footer_widget_title_margin_top$unit;
				}
			";

        }

        if ( $footer_widget_title_margin_bottom != '' ) {

			$custom_css .= "
			.qs__blog__footer__area .widget-title , .qs__blog__footer__area .widget-title2{
					margin-bottom: $footer_widget_title_margin_bottom$unit;
				}
			";

		}
	
		if(isset($footer_bg_img['url'])){
			$footer_img_url = $footer_bg_img['url'];
		 
			$custom_css .= "
			   .qs__blog__footer__top__area{
					background: url($footer_img_url);
					background-repeat: no-repeat;
					background-size: cover;
				}
			";
	
		}
		
		if($container !=''){
			$custom_css .="
			
			body .container,.elementor-section.elementor-section-boxed>.elementor-container{
				max-width:$container !important;
			}
		   "; 
		   
		} 
		 
        if($page_container != ''):
			$custom_css .="
				.elementor-section.elementor-section-boxed>.elementor-container{
					max-width:$page_container !important;
				}
			";
		endif;
		
		

		if($topbar_show =='yes'){
			$topbar_img_url = '';
			if(isset($topbar_bg_img['data']['css']['background-image'])){
				$topbar_img_url = $topbar_bg_img['data']['css']['background-image'];
				if($topbar_img_url !=''){
				
					$custom_css .="
					.binduz-er-top-header-area .binduz-er-bg-cover{
						background-image: $topbar_img_url;
						}
					";
				}
				
			} 
			
		}

        wp_add_inline_style( 'binduz-style', $custom_css );
    }

}