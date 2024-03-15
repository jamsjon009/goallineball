<?php 

/** 
* post view count 
* function to display number of posts.
*/
function binduz_get_postview($postID){

   $count_key = 'binduz_post_views_count';
   $count = get_post_meta($postID, $count_key, true);

   if( $count=='' ){
       return "0";
   }

   return $count;
}

function binduz_google_fonts_url($font_families	 = []) {
	$fonts_url		 = '';
	/*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
	if ( $font_families && 'off' !== _x( 'on', 'Google font: on or off', 'binduz' ) ) { 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

// function to count views.
function binduz_set_postview($postID=null) {

   if( is_null($postID) ){
      $postID = get_the_ID();
   }   

   $count_key = 'binduz_post_views_count';
   $count     = get_post_meta($postID, $count_key, true);

   if( $count=='' ){

       $count = 0;
       delete_post_meta( $postID, $count_key );
       add_post_meta( $postID, $count_key, '0' );
  
      }else{
  
         $count++;
         update_post_meta($postID, $count_key, $count);
         
   }

}

// return the specific value from theme options/ customizer/ etc
// ----------------------------------------------------------------------------------------
function binduz_option( $key, $default_value = '', $method = 'customizer' ) {
	if ( defined( 'FW' ) ) {
		switch ( $method ) {
			case 'theme-settings':
				$value = fw_get_db_settings_option( $key );
				break;
			case 'customizer':
				$value = fw_get_db_customizer_option( $key );
				break;
			default:
				$value = '';
				break;
		}
		return (!isset($value) || $value == '') ? $default_value :  $value;
	}
	return $default_value;
}

// return the specific value from metabox
// ----------------------------------------------------------------------------------------
if(!function_exists('binduz_meta_option')){

   function binduz_meta_option( $postid, $key, $default_value = '' ) {
   
      if ( defined( 'FW' ) ) {
         $value = fw_get_db_post_option($postid, $key, $default_value);
      }
      
      return (!isset($value) || $value == '') ? $default_value :  $value;
   }
}


// return the specific value from term/ taxomony metabox
// ----------------------------------------------------------------------------------------
if( !function_exists('binduz_term_option')):
function binduz_term_option( $termid, $key, $default_value = '', $taxomony = 'category') {
   
   if ( defined( 'FW' ) ) {

		$value = fw_get_db_term_option($termid, $taxomony, $key);
	}
   
   return (!isset($value) || $value == '') ? $default_value :  $value;
}
endif;

// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function binduz_kses( $raw ) {

	$allowed_tags = array(
		'a'								 => array(
			'class'	 => array(),
			'href'	 => array(),
			'rel'	 => array(),
			'title'	 => array(),
			'target'	 => array(),
      ),
      'option' => array(
         'value'	 => array(),
		
      ),
		'abbr'							 => array(
			'title' => array(),
		),
		'b'								 => array(),
		'blockquote'					 => array(
			'cite' => array(),
		),
		'cite'							 => array(
			'title' => array(),
		),
		'code'							 => array(),
		'del'							 => array(
			'datetime'	 => array(),
			'title'		 => array(),
		),
		'dd'							 => array(),
		'div'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'dl'							 => array(),
		'dt'							 => array(),
		'em'							 => array(),
		'h1'							 => array(),
		'h2'							 => array(),
		'h3'							 => array(),
		'h4'							 => array(),
		'h5'							 => array(),
		'h6'							 => array(),
		'i'								 => array(
			'class' => array(),
		),
		'img'							 => array(
			'alt'	 => array(),
			'class'	 => array(),
			'height' => array(),
			'src'	 => array(),
			'width'	 => array(),
		),
		'li'							 => array(
			'class' => array(),
		),
		'ol'							 => array(
			'class' => array(),
		),
		'p'								 => array(
			'class' => array(),
		),
		'q'								 => array(
			'cite'	 => array(),
			'title'	 => array(),
		),
		'span'							 => array(
			'class'	 => array(),
			'title'	 => array(),
			'style'	 => array(),
		),
		'iframe'						 => array(
			'width'			 => array(),
			'height'		 => array(),
			'scrolling'		 => array(),
			'frameborder'	 => array(),
			'allow'			 => array(),
			'src'			 => array(),
		),
		'strike'						 => array(),
		'br'							 => array(),
		'strong'						 => array(),
		'data-wow-duration'				 => array(),
		'data-wow-delay'				 => array(),
		'data-wallpaper-options'		 => array(),
		'data-stellar-background-ratio'	 => array(),
		'ul'							 => array(
			'class' => array(),
		),
	);

	if ( function_exists( 'wp_kses' ) ) { // WP is here
		$allowed = wp_kses( $raw, $allowed_tags );
	} else {
		$allowed = $raw;
	}

	return $allowed;
}


function binduz_get_excerpt($count = 100 ) {
 
   $count = binduz_desc_limit($count);
  
   $binduz_blog_read_more_text = esc_html__('Readmore','binduz');
  
   $excerpt = get_the_excerpt();
   $excerpt = esc_html($excerpt);
   $words   = str_word_count($excerpt, 2);
   $pos     = array_keys($words);

   if(count($words)>$count){
      $excerpt = substr($excerpt, 0, $pos[$count]); 
   }
 
   $excerpt = wp_kses_post($excerpt);
 
   return $excerpt;

}

 function binduz_desc_limit($default){

      if(!is_single() && !is_page()) {
        
         if(binduz_option('binduz_categry_post_desc_lenght') ){
            return binduz_option('binduz_categry_post_desc_lenght');
         }else{
            return $default;
         }
      }else{
         return $default;
	  }
	  
   }

// related post by tags
   
function binduz_related_posts_by_tags( $post_id = '', $feature_image = false ) {
    
   try{
         $query_type = 'wp_query'; 
         if($post_id==''){
            $post_id = get_the_ID();
         }
        
         $related_count = binduz_option('blog_related_post_number',3);
    
         $tags      = wp_get_post_tags($post_id);
         $term_tags = wp_list_pluck($tags,'term_id');
         $args = array(
   
            'tag__in'             => $term_tags,
            'post__not_in'        => array($post_id),
            'posts_per_page'      => $related_count,
            'ignore_sticky_posts' => 1,

         );

        
         
         if($feature_image){
            $args["meta_query"] = array(
               array(
                  'key'     => '_thumbnail_id',
                  'compare' => 'EXISTS'
               ),
            );
         }
      if($query_type == 'get_posts'){
            $args['numberposts'] = $related_count;
            return get_posts($args);
      }else{
         return new WP_Query($args);
      }   
     
 
    } catch(Exception $e) {
     
    return new WP_Query( [] ); 
 
   }
 
 }

function binduz_related_posts_by_sticky(  ) {
	
    if(!is_category()){
      return new WP_Query( [] ); 
    }

   try{
      
       $term = get_queried_object();
       $args = [
      
            'post_type'           => 'post',
            'post__in'            => get_option( 'sticky_posts' ),
            'posts_per_page'      => 10,
            'ignore_sticky_posts' => 1,
            'tax_query' => array(
               array (
                  'taxonomy' => 'category',
                  'field' => 'slug',
                  'terms' => $term->slug,
               )
         ),

       ];
   
 
       return new WP_Query($args);
 
    } catch(Exception $e) {
 
    return new WP_Query( [] ); 
 
   }
 
 }

 function binduz_src( $key, $default_value = '', $input_as_attachment = false ) { // for src
   
   if ( $input_as_attachment == true ) {
		$attachment = $key;
	} else {
		$attachment = binduz_option( $key );
	}

	if ( isset( $attachment[ 'url' ] ) && !empty( $attachment ) ) {
		return $attachment[ 'url' ];
	}

	return $default_value;
}

if ( ! function_exists( 'binduz_ad' ) ) :
function binduz_ad($key, $default=''){
	
   $ad = binduz_option($key, ['ad_link' => '', 'ad_html' => '']);
   
	if($ad['ad_link'] != '' || $ad['ad_link'] != '' || isset($ad['ad_image']) || $ad['ad_html'] != ''){
		if($ad['ad_html'] != ''){
			echo binduz_return($ad['ad_html']);
		}else{
			if(isset($ad['ad_image'])){
				
				$img_url = $ad['ad_image'];
				if(!isset($img_url['url'])){
				  return;
				}
			}
			?>
			<a href="<?php echo esc_url($ad['ad_link']); ?>" target="_blank">
				<img src="<?php echo esc_url($ad['ad_image']['url']); ?>" alt="<?php echo esc_attr('Binduz ads', 'binduz'); ?>">
			</a>
			<?php
		}
	}
}
endif;

// build google font url
// ----------------------------------------------------------------------------------------
if(!function_exists('binduz_GoogleFonts_Url')):
   function binduz_GoogleFonts_Url($gfont_families	 = []) {
      $fonts_url		 = '';
      
      if ( $gfont_families && 'off' !== _x( 'on', 'Google font: on or off', 'binduz' ) ) { 
         $query_args = array(
            'family' => urlencode( implode( '|', $gfont_families ) )
         );

         $gfonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
      }

      return esc_url_raw( $gfonts_url );
   }
endif;

if(!function_exists('binduz_social_share_list')):
function binduz_social_share_list(){

   $data = array(
      ''              => '---',
      'facebook'      => esc_html__('Facebook', 'binduz'),
      'twitter'       => esc_html__('twitter', 'binduz'),
      'linkedin'      => esc_html__('linkedin', 'binduz'),
      'pinterest'     => esc_html__('pinterest ', 'binduz'),
      'digg'          => esc_html__('digg', 'binduz'),
      'tumblr'        => esc_html__('tumblr', 'binduz'),
      'blogger'       => esc_html__('blogger', 'binduz'),
      'reddit'        => esc_html__('reddit', 'binduz'),
      'delicious'     => esc_html__('delicious', 'binduz'),
      'flipboard'     => esc_html__('flipboard', 'binduz'),
      'vkontakte'     => esc_html__('vkontakte', 'binduz'),
      'odnoklassniki' => esc_html__('odnoklassniki', 'binduz'),
      'moimir'        => esc_html__('moimir', 'binduz'),
      'livejournal'   => esc_html__('livejournal', 'binduz'),
      'blogger'       => esc_html__('blogger', 'binduz'),
      'evernote'      => esc_html__('evernote', 'binduz'),
      'flipboard'     => esc_html__('flipboard', 'binduz'),
      'mix'           => esc_html__('mix', 'binduz'),
      'meneame'       => esc_html__('meneame ', 'binduz'),
      'pocket'        => esc_html__('pocket ', 'binduz'),
      'surfingbird'   => esc_html__('surfingbird ', 'binduz'),
      'liveinternet'  => esc_html__('liveinternet ', 'binduz'),
      'buffer'        => esc_html__('buffer ', 'binduz'),
      'instapaper'    => esc_html__('instapaper ', 'binduz'),
      'xing'          => esc_html__('xing ', 'binduz'),
      'wordpres'      => esc_html__('wordpres ', 'binduz'),
      'baidu'         => esc_html__('baidu ', 'binduz'),
      'renren'        => esc_html__('renren ', 'binduz'),
      'weibo'         => esc_html__('weibo ', 'binduz'),
    
     
   );

   return $data;
}
endif;

if( !function_exists( 'binduz_text_logo' ) ) :

	function binduz_text_logo(){

		$general_text_logo = binduz_option('general_text_logo','yes');
       
		if( $general_text_logo == 'yes' ){
        
         return get_bloginfo( 'name' );

      }
      
		return false;

	 }
endif;


if( !function_exists('binduz_get_fb_share_count') ):

   function binduz_get_fb_share_count( $post_id = null ){
      
      $cache_key    = 'binduz_fb_share_' . $post_id;
      $url          = get_permalink( $post_id );
      $access_token = binduz_get_fb_secret_key();
     
      $api_url      = 'https://graph.facebook.com/v3.0/?id=' . urlencode( $url ) . '&fields=engagement&access_token=' . $access_token;
      $json_return  = wp_remote_get( $api_url );
      $responseBody = wp_remote_retrieve_body( $json_return );
      $result       = json_decode( $responseBody );
     
      if ( is_object( $result ) && ! is_wp_error( $result ) ) {
         
         if(isset($result->engagement)){
            
            $fb_share = $result->engagement;
            
            if(isset($fb_share->share_count)){
               return $fb_share->share_count;
            }
         }   
       
      }

      return 0;
      
   }

endif;

// get facebook api key
function binduz_get_fb_secret_key(){

   $facebook_api  = binduz_option('facebook_api');
  
   if( isset($facebook_api['app_id']) && isset($facebook_api['secret_code']) ){
     if($facebook_api['app_id'] !='' && $facebook_api['secret_code'] !=''){
        return $facebook_api['app_id'].'|'.$facebook_api['secret_code'];
     } 
   }
   // default key
   return '3190052791219248|8604c5a80339a8db79877944e852227b';
}


function binduz_lessThanfewMonth($date,$valid = 30) {
   $earlier = new DateTime($date);
   $later   = new DateTime();
   return $later->diff($earlier)->format("%a") > 30?esc_html__('Old Writter','binduz'):esc_html__('New Writter','binduz');
  
}


function binduz_is_footer_widget_active(){
   $footer_widget = false;
    if( 
        is_active_sidebar('footer-1') 
       || is_active_sidebar('footer-2') 
       || is_active_sidebar('footer-3') 
       || is_active_sidebar('footer-4') 
       || is_active_sidebar('footer-5') 
       || is_active_sidebar('footer-6') 
      ){
         $footer_widget = true;  
       }else{
         $footer_widget = false;
       }
     
   return $footer_widget;    
}

// unyson based image resizer
// ----------------------------------------------------------------------------------------
if(!function_exists('binduz_resize')){
   function binduz_resize( $url, $width = false, $height = false, $crop = false ) {
      if ( function_exists( 'fw_resize' ) ) {
         $fw_resize	 = FW_Resize::getInstance();
         $response	 = $fw_resize->process( $url, $width, $height, $crop );
         return (!is_wp_error( $response ) && !empty( $response[ 'src' ] ) ) ? $response[ 'src' ] : $url;
      } else {
         $response = wp_get_attachment_image_src( $url, array( $width, $height ) );
         if ( !empty( $response ) ) {
            return $response[ 0 ];
         }
      }
   }
}

// ad allowed pages
if(!function_exists('binduz_footer_allowed_pages')){
   function binduz_footer_allowed_pages($option=null){
      // show in all over blog
      if(is_null($option)){
         return true;
      }
      //filter
      $current_option = []; 
      if(is_category()){
         $current_option[]= 'category'; 
      }

     if(is_tag()){
      $current_option[]= 'tags'; 
     }

     if(is_archive()){
      $current_option[]= 'archive'; 
     }

     if(is_singular('post')){
      $current_option[]= 'post'; 
     }

     if(is_author()){
      $current_option[]= 'author'; 
     }
     
     if(is_search()){
      $current_option[]= 'search'; 
     }
     
     if(is_404()){
      $current_option[]= '404'; 
     }
    
     
     if(is_singular('page')){
      
       $current_option[]= 'page';  
     }

     if(is_main_query()){
         $page_for_posts = get_option( 'page_for_posts' );
         if(get_queried_object_id() == $page_for_posts){
            $current_option[]= 'blog'; 
         }
     }
    
     $found = array_intersect($option, $current_option);
    
     if(is_array($found) && count($found)){
        return true; 
     }   
     return false;

   } 
}
