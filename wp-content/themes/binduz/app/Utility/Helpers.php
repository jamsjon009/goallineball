<?php
use Binduz\Core\Hook\binduz_Unyson_Google_Fonts;
/**
 * Helpers methods
 * List all your static functions you wish to use globally on your theme
 */

if ( ! function_exists( 'binduz_header_style' ) ) :

	function binduz_header_style() {
		$header_text_color = get_header_textcolor();
	
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
   }

endif;

if ( ! function_exists( 'binduz_starts_with' ) ) {
	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param  string  $haystack
	 * @param  string|array  $needles
	 * @return bool
	 */
	function binduz_starts_with($haystack, $needles)
	{
		foreach ((array) $needles as $needle) {
			if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
				return true;
			}
		}
		return false;
	}
}

/*-------------------------------
    DAY LINK TO ARCHIVE PAGE
---------------------------------*/
if ( !function_exists('binduz_day_link') ) {
   /**
    * binduz_day_link() archive link
    * @return string return sting url for post.
    */
    function binduz_day_link() {
        $archive_year   = get_the_time('Y');
        $archive_month  = get_the_time('m');
        $archive_day    = get_the_time('d');
        echo get_day_link( $archive_year, $archive_month, $archive_day);
    }
}

if(!function_exists('binduz_get_post_category')){
   function binduz_get_post_category($tax = 'category') {
   
      static $list = [];
      if( !count( $list ) ) {
         $categories = get_terms( $tax, array(
            'orderby'    => 'name', 
            'order'      => 'DESC',
            'hide_empty' => false,
            'number'     => 400
         ));
   
        foreach( $categories as $category ) {
           $list[$category->term_id] = $category->name;
        }
      }
    
      return $list;
   }
}
if(!function_exists('binduz_get_post_tags')){

   function binduz_get_post_tags($tax = 'post_tag') {
      
      static $list = [];

      if( !count( $list ) ) {
         
         $categories = get_terms( $tax, array(
            'orderby'       => 'name', 
            'order'         => 'DESC',
            'hide_empty'    => false,
            'number'        => 600
         
      ) );

      foreach( $categories as $category ) {
         $list[$category->term_id] = $category->name;
      }
      }
   
      return $list;
   }
}


function binduz_child_category_meta(){ 

   $post_child_cat = binduz_option('blog_child_cat_show','yes');

   if($post_child_cat!='yes'){
      return;
   }

   $binduz_cat_term     = get_queried_object();
   $binduz_cat_children = get_terms( $binduz_cat_term->taxonomy, array(
       'parent'    => $binduz_cat_term->term_id,
       'hide_empty' => false
   ) );

   if(!$binduz_cat_children){
     return;
   }

   if ( $binduz_cat_children ) { 

         echo '<div class="sub-category-list">';
            foreach( $binduz_cat_children as $binduz_subcat )
            {
               echo '<a class="post-cat" href="'. esc_url(get_term_link($binduz_subcat, esc_html($binduz_subcat->taxonomy))) .'" >'.
               esc_html($binduz_subcat->name). 
                  '</a>';
            }
         echo '</div>';

   }

}

function binduz_category_meta(){
       
   $blog_cat_show   = binduz_option('blog_category','yes');
   $blog_cat_single = binduz_option('blog_category_single','yes');
  
    
    if( $blog_cat_show != 'yes' ){
     return;
   }
  
      echo '<span class="category">';  

         $cat = get_the_category();
         if( $blog_cat_single == 'yes' ) {
            
            shuffle($cat);

            if ( isset($cat[0]) ) {

               echo  '<a 
                        class="post-cat" 
                        href="'. esc_url(get_category_link($cat[0]->term_id) ).'"
                        
                        >'.'<span class="before"></span>'.
                        
                        esc_html(get_cat_name($cat[0]->term_id)).
                        '<span class="after"></span> '. 
                     '</a>';

            }

            return; 
         }

         if( $cat ) {
            
                  foreach( $cat as $value ):

                     echo  '<a 
                              class="post-cat" 
                              href="'. esc_url (get_category_link($value->term_id) ) .'"
                              >'. 
                                esc_html(get_cat_name($value->term_id)).
                              '</a>';
              
                  endforeach;   
            
         }
      echo '</span>';
   
}

function binduz_single_category_meta(){
       
   $blog_cat_show   = binduz_option('blog_single_category','yes');
   $blog_cat_single = binduz_option('blog_category_single','yes');
  
    
    if( $blog_cat_show != 'yes' ){
     return;
    }
  
      echo '<div class="page_category">';  

         $cat = get_the_category();
         if( $blog_cat_single == 'yes' ) {
            
            shuffle($cat);

            if ( isset($cat[0]) ) {

               echo  '<a 
                        class="post-cat" 
                        href="'. esc_url(get_category_link($cat[0]->term_id) ).'"
                        
                        >'.'<span class="before"></span>'.
                        
                        esc_html(get_cat_name($cat[0]->term_id)).
                        '<span class="after"></span> '. 
                     '</a>';

            }

            return; 
         }

         if( $cat ) {
            
                  foreach( $cat as $value ):

                     echo  '<a 
                              class="post-cat" 
                              href="'. esc_url (get_category_link($value->term_id) ) .'"
                              >'. 
                                esc_html(get_cat_name($value->term_id)).
                              '</a>';
              
                  endforeach;   
            
         }
      echo '</div>';
   
}

if ( ! function_exists( 'binduz_post_footer_meta' ) ) :

   function binduz_post_footer_meta() {
       
      ?>
         <div class="binduz-er-meta-author">

               <?php 
                  // single details page only 
                  if( is_single() ):
                        if( binduz_option('blog_single_author','yes') =='yes' ):
                           echo '<div class="binduz-er-author">';
                              if( binduz_option('blog_single_author_image','no') == 'no' ) :

                                 printf(
                                    '<span>%1$s <span> <a class="binduz-er-post-author" href="%2$s">%3$s</a> </span></span>',
                                    esc_html__('By','binduz'),
                                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                                    get_the_author()
                                 );

                              else:
                                 
                                 printf(
                                    '%1$s
                                    <span>%2$s <span> <a class="binduz-er-post-author" href="%3$s">%4$s</a> </span></span>',
                                    get_avatar( get_the_author_meta( 'ID' ), 55 ), 
                                    esc_html__('By','binduz'),
                                    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                                    get_the_author()
                                 );

                              endif;

                           echo "</div>";
                      
                        if(binduz_option('post_show_view_count') == 'yes' || binduz_option( 'post_show_total_share' ) =='yes' || binduz_option( 'blog_single_comment' ) =='yes'):
                              echo '<div class="binduz-er-meta-list">';
                                    echo '<ul>';  
                                       if( binduz_option('post_show_view_count') =='yes' ):
                                             echo '<li><i class="fal fa-eye"></i> '. binduz_get_postview(get_the_id()) .'</li>';
                                       endif;
                                       if( binduz_option( 'post_show_total_share' ) =='yes' ):
                                          echo '<li><i class="fal fa-heart"></i> '. binduz_get_fb_share_count(get_the_ID()) .'</li>';
                                       endif;
                                       if( binduz_option( 'blog_single_comment' ) =='yes' ):
                                          echo '<li><i class="fal fa-comments"></i> '. esc_html(get_comments_number(get_the_ID())) .'</li>';
                                       endif;
                                    echo '</ul>';
                              echo '</div>';
                        endif;
                     endif;
                  endif;
      
                  // for other blog ,category ,tags, arcgive page
                  if( !is_single() ) {

                     if( binduz_option('blog_single_author','yes') =='yes' ):

                        echo '<div class="binduz-er-author">';

                           if(binduz_option('blog_single_author_image','no') == 'no') :

                              printf(
                                 '<span>%1$s <span> <a class="binduz-er-post-author" href="%2$s">%3$s</a> </span></span>',
                                 esc_html__('By','binduz'),
                                 esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                                 get_the_author()
                              );

                           else:

                              printf(
                                 '%1$s
                                 <span>%2$s <span> <a class="binduz-er-post-author" href="%3$s">%4$s</a> </span></span>',
                                 get_avatar( get_the_author_meta( 'ID' ), 55 ), 
                                 esc_html__('By','binduz'),
                                 esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                                 get_the_author()
                              );

                           endif;
                           echo "</div>";
                     endif;
                     if(binduz_option('post_show_view_count') == 'yes' || binduz_option( 'post_show_total_share' ) =='yes' || binduz_option( 'blog_single_comment' ) =='yes'):
                           echo '<div class="meta-list binduz-er-meta-list">';
                                 echo '<ul>';  
                                    if( binduz_option('post_show_view_count') ):
                                          echo '<li><i class="fal fa-eye"></i> '. binduz_get_postview(get_the_id()) .'</li>';
                                    endif;
                                    if( binduz_option( 'post_show_total_share' ) ):
                                       echo '<li><i class="fal fa-heart"></i> '. binduz_get_fb_share_count(get_the_ID()) .'</li>';
                                    endif;
                                    if( binduz_option( 'blog_single_comment' ) ):
                                       echo '<li><i class="fal fa-comments"></i> '. esc_html(get_comments_number(get_the_ID())) .'</li>';
                                    endif;
                                 echo '</ul>';
                           echo '</div>';
                     endif;
                  
                  } // blog post
                  
               ?>
         </div>
         <?php
   }

endif;   

/*------------------------------------------------------
   DISPLAY META INFORMATION FOR A SPECIFIC POST
-------------------------------------------------------*/
if ( ! function_exists( 'binduz_post_meta' ) ) :
   // post and post meta
  function binduz_post_meta() {

   ?>
    <div class="binduz-er-meta-item">
         <?php 
            // single details page only 
            if( is_single() ):

                  binduz_random_category_retrip();
                  if ( get_post_type() === 'post' && binduz_option('blog_single_date','yes') =='yes' ) {

                    ?>
                        <div class="binduz-er-meta-date">
                           <span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?> </span>
                        </div>
                    <?php
                  }
               
            endif;
  
            // for other blog ,category ,tags, arcgive page
            if( !is_single() ) {

               binduz_random_category_retrip();
               if ( get_post_type() === 'post' && binduz_option('blog_date','yes') =='yes' ) {
                 
                     ?>
                     <div class="binduz-er-meta-date">
                        <span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?> </span>
                     </div>
               <?php
               }
            } // blog post
         ?>
     </div>
   <?php }
 endif; 

 /*-----------------------------
	RANDOM SINGLE CATEGORY
------------------------------*/
if ( !function_exists( 'binduz_random_category_retrip' ) ): 

	function binduz_random_category_retrip(){

		$blog_cat_show   = binduz_option( 'blog_category','yes' );
		$blog_style      = binduz_option( 'blog_style','style1' );
		$single          = binduz_option( 'blog_category_single','yes');
		// layout style category term meta
		$override = binduz_term_option( get_queried_object_id() , 'override_default' ,'no' );
	
		if($override == 'yes'){
		   $blog_style = binduz_term_option( get_queried_object_id() , 'blog_style' , 'style1' );
		}
		
		if( $blog_cat_show != 'yes' ){
          return;
		}

		if ( 'post' === get_post_type() ) {
        
			if( !get_the_category() ){
               return;
			}

			$category        = get_the_category();
			$cat_count       = count($category);
			$single_cat      = $cat_count > 0 ? $category[random_int( 0, $cat_count - 1 )] : 0;
        
         
         ?>
               <div class="binduz-er-meta-categories">
         
                     <?php
                        if ($single == 'yes' ) {

                           echo '<a class="binduz-er-news-random-cat" href="'.esc_url( get_category_link( $single_cat->term_id ) ).'">'.esc_html( $single_cat->cat_name ).'</a>';
                        
                        }else{
                           
                           foreach( $category as $value ):
                              
                              echo   '<a 
                                       class="binduz-er-random-cat" 
                                       href="'. esc_url (get_category_link($value->term_id) ) .'"
                                       >'. 
                                       esc_html(get_cat_name($value->term_id)).
                                    '</a>';
                                    
                           endforeach; 

                        }
                     ?>

               </div>
         <?php 
         
		}
	}

endif;
 /*------------------------------------------------------
   DISPLAY META INFORMATION FOR A SPECIFIC POST
-------------------------------------------------------*/
if ( ! function_exists( 'binduz_related_post_meta' ) ) :
   // post and post meta
  function binduz_related_post_meta() {

   ?>
      <div class="meta3">

         <?php 
            // single details page only 
            if(is_single()):

                  $blog_cat_show   = binduz_option( 'blog_category','yes' );

                  $category        = get_the_category();
                  $cat_count       = count($category);
                  $single_cat      = $cat_count > 0 ? $category[random_int( 0, $cat_count-1 )] : 0;
                
                  if( get_the_category() ){

                     if( $blog_cat_show = 'yes' ){
                        echo '<a class="random__cat" href="'.esc_url( get_category_link( $single_cat->term_id ) ).'">'.esc_html( $single_cat->cat_name ).'</a>';
                      }  

                  }
       
                  if ( get_post_type() === 'post' && binduz_option('blog_single_date','yes') =='yes' ) {
                     echo '<a class="post__date" href="'.get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ).'">
                        '. get_the_date( 'F j, Y' ). 
                     '</a>';
                  }
                
            endif;
           
         ?>
      </div>
   <?php }

 endif;   

if ( !function_exists('binduz_content_estimated_reading_time') ) {
  
   function binduz_content_estimated_reading_time( $content = '', $wpm = 200 ) {

      $clean_content = esc_html( $content );
      $word_count    = str_word_count( $clean_content );
      $time          = ceil( $word_count / $wpm );

      if($time<=1){
         $time .= esc_html__(' minute read','binduz');
      }else{
         $time .= esc_html__(' minutes read','binduz'); 
      }

      $output  = '<li class="post-read-time">';
      $output .= '<i class="fal fa-book-open"></i>';  
      $output .= '<span class="read-time">' . $time . '</span>' . ' ';
      $output .= '</li>';

      return $output;

     }

}

/*--------------------------
    POSTS PAGINATION
---------------------------*/
if ( !function_exists('binduz_pagination') ) {
   function binduz_pagination(){
       the_posts_pagination(array(
           'screen_reader_text' => ' ',
           'prev_text'          => '<i class="fas fa-chevron-left"></i>',
           'next_text'          => '<i class="fas fa-chevron-right"></i>',
           'type'               => 'list',
           'mid_size'           => 1,
       ));
   }
}

/*------------------------
    COMMENTS PAGINATION
-------------------------*/
if ( !function_exists('binduz_comments_pagination') ) {
   function binduz_comments_pagination(){
       the_comments_pagination(array(
           'screen_reader_text' => ' ',
           'prev_text'          => '<i class="fas fa-chevron-left"></i>',
           'next_text'          => '<i class="fas fa-chevron-right"></i>',
           'type'               => 'list',
           'mid_size'           => 1,
           'class' => 'qs__blog__comments__pagination',
       ));
   }
}

if ( !function_exists('binduz_link_pages') ):

   function binduz_link_pages() {

      $args = array(
         'before'			    => '<div class="page-links binduz__links__pages"><span class="page-link-text">' . esc_html__( 'More pages: ', 'binduz' ) . '</span>',
         'after'				 => '</div>',
         'next_or_number'	 => 'number',
         'separator'			 => '  ',
         'nextpagelink'		 => esc_html__( 'Next ', 'binduz' ) . '<i class="fas fa-angle-right"></i>',
         'previouspagelink' => '<i class="fas fa-angle-left"></i>' . esc_html__( 'Previous', 'binduz' ),
      );
      
      wp_link_pages( $args );
   }

endif;

function binduz_title_limit($title, $limit=20){

   $title = wp_trim_words( $title , $limit , '' );
   echo esc_html($title);

}

/*----------------------------------------
   CUSTOM COMMENNS WALKER
-------------------------------------------*/
if ( !function_exists('binduz_comment_style') ):

function binduz_comment_style( $comment, $args, $depth ) {

	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li';
		$add_below	 = 'div-comment';
   }
   
	?>

	<<?php

	echo wp_kses_post( $tag );
   comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
   
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>

		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
	?>	
   
      <div class="comment_author_thumb">
         <?php
            if ( $args[ 'avatar_size' ] != 0 ) {
               echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
            }
         ?>
      </div>
		<div class="meta-data">

			<div class="pull-right reply">
            <?php
                  comment_reply_link(array_merge($args, array(
                     'add_below'	 => $add_below,
                     'depth'		 => $depth,
                     'max_depth'	 => $args[ 'max_depth' ]
                  )));
				?>
			</div>

			<span class="comment-author vcard">
            <?php
               printf( wp_kses_post( '<cite class="fn">%s</cite> <span class="says">%s</span>', 'binduz' ), get_comment_author_link(), esc_html__( 'says:', 'binduz' ) );
				?>
			</span>

         <div class="comment-meta commentmetadata comment-date">
            <?php
               printf(esc_html__( '%1$s at %2$s', 'binduz' ), esc_html(get_comment_date()), esc_html(get_comment_time()));
            ?>
            <?php edit_comment_link( esc_html__( '(Edit)', 'binduz' ), '  ', '' ); ?>
         </div>

		</div>
      <?php if ( $comment->comment_approved == '0' ) { ?>
         <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'binduz' ); ?></em><br/><?php }
      ?>
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>
		</div><?php
	endif;
}
endif;

/*---------------------------------------
   EXCERPT CUSTOM WORD COUNT
-----------------------------------------*/
function binduz_excerpt( $words = 40, $more = '' ) {

   if($more == 'button'){
      $more = '<a class="btn btn-primary">'.esc_html__('read more', 'binduz').'</a>';
   }
   
   $words = apply_filters( 'binduz_blog_crop_desc', $words ); 
   
   $excerpt         = get_the_excerpt();
   $trimmed_content = wp_trim_words( $excerpt, $words, $more );

   echo wp_kses_post( $trimmed_content );
}

/*--------------------------------------
   SINGLE POST NAVIGATION
---------------------------------------*/
if ( !function_exists('binduz_post_nav') ):
function binduz_post_nav($box=false) {
   // option-details.php
   $post_navigation_show        = binduz_option('post_navigation_show','yes');
   $post_navigation_title_limit = binduz_option('post_navigation_title_limit','5');
   
   if($post_navigation_show == 'no'){
      return;
   }

   $next_post	 = get_next_post();
   $pre_post	 = get_previous_post();

   if ( !$next_post && !$pre_post ) {
      return;
   }

 ?>
   
         <div class="binduz-er-blog-post-prev-next d-flex justify-content-between align-items-center">
              
               <?php if ( !empty( $pre_post ) ): ?>

                     <div class="binduz-er-post-prev-next">
                        <a href="<?php echo esc_url(get_the_permalink( $pre_post->ID )); ?>">
                           <span><?php echo esc_html__('Prev Post','binduz'); ?></span>
                           <h4 class="binduz-er-title"><?php echo binduz_kses( wp_trim_words( get_the_title( $pre_post->ID ), $post_navigation_title_limit ) ) ?></h4>
                        </a>
                     </div>

               <?php endif; ?>
           
               <?php if ( !empty( $next_post ) ): ?>

                     <div class="binduz-er-post-prev-next text-end">
                           <a href="<?php echo esc_url(get_the_permalink( $next_post->ID )); ?>">
                              <span><?php echo esc_html__('Next Post','binduz'); ?></span>
                              <h4 class="binduz-er-title"> <?php echo binduz_kses( wp_trim_words( get_the_title( $next_post->ID ),$post_navigation_title_limit ) ) ?></h4>
                           </a>
                     </div>

               <?php endif; ?>

               <div class="binduz-er-post-bars">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(BINDUZ_IMG.'/icon/post-bars.svg') ?> " alt="<?php echo esc_attr__('post-bars','binduz'); ?>"></a>
               </div>

         </div>
 <?php
  }
endif; 

function binduz_get_top_post(){

   $blog_top_post = binduz_option('blog_top_post');

   if($blog_top_post == 'no'){
       return new \WP_Query(); 
   }

   $blog_top_post_settings = binduz_option('blog_top_post_settings');

   if(!isset($blog_top_post_settings['yes'])){
      return new \WP_Query(); 
   } 
  
   $settings = $blog_top_post_settings['yes'];
      $arg = [
         'post_type'        => 'post',
         'post_status'      => 'publish',
         'order'            => $settings['order'],
         'posts_per_page'   => $settings['count'],
         'category__in'     => $settings['category'],
         'tag__in'          => $settings['tags'],
         'suppress_filters' => false,
   ];
  
   if( $settings[ 'skip_post' ] > 0 ){

      $arg[ 'offset' ] = $settings[ 'skip_post' ];
   }
 
   return  new \WP_Query( $arg ); 
}

if ( !function_exists( 'binduz_advanced_font_styles' ) ) :

	/**
	 * Get shortcode advanced Font styles
	 *
	 */
	function binduz_advanced_font_styles( $style ) {

		$font_styles = $font_weight = '';
      
		$font_weight = (isset( $style[ 'font-weight' ] ) && $style[ 'font-weight' ]) ? 'font-weight:' . esc_attr( $style[ 'font-weight' ] ) . ';' : '';
      $font_weight = (isset( $style[ 'weight' ] ) && $style[ 'weight' ]) ? 'font-weight:' . esc_attr( $style[ 'weight' ] ) . ';' : '';
      $font_weight = (isset( $style[ 'variation' ] ) && $style[ 'variation' ]) ? 'font-weight:' . esc_attr( $style[ 'variation' ] ) . ';' : $font_weight;
    
		$font_styles .= isset( $style[ 'family' ] ) ? 'font-family:"' . $style[ 'family' ] . '";' : '';
		$font_styles .= isset($style[ 'style' ] ) && $style[ 'style' ] ? 'font-style:' . esc_attr( $style[ 'style' ] ) . ';' : '';
		
		$font_styles .= isset( $style[ 'color' ] ) && !empty( $style[ 'color' ] ) ? 'color:' . esc_attr( $style[ 'color' ] ) . ';' : '';
		$font_styles .= isset( $style[ 'line-height' ] ) && !empty( $style[ 'line-height' ] ) ? 'line-height:' . esc_attr( $style[ 'line-height' ] ) . 'px;' : '';
		$font_styles .= isset( $style[ 'letter-spacing' ] ) && !empty( $style[ 'letter-spacing' ] ) ? 'letter-spacing:' . esc_attr( $style[ 'letter-spacing' ] ) . 'px;' : '';
		$font_styles .= isset( $style[ 'size' ] ) && !empty( $style[ 'size' ] ) ? 'font-size:' . esc_attr( $style[ 'size' ] ) . 'px;' : '';
		
		$font_styles .= !empty( $font_weight ) ? $font_weight : '';
    
		return !empty( $font_styles ) ? $font_styles : '';
	}

endif;
//date 
function binduz_post_time_ago_function() {
   return sprintf( esc_html__( '%s ago', 'binduz' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
}

function binduz_rendom_number(){

   global $step;
   // return first col-12 and 2nd and 3rd col-6
   $column     = 'col-lg-12';
   $blog_style = binduz_option('blog_style','col-one');

  
   if( $blog_style == 'col-one' ){

      return 'col-lg-12 one-col';
   }

   if( $blog_style == 'col-two' ){

      return 'col-lg-6 two-col';
   }
      
   if($step == 'first'){
      
      $column = 'col-lg-12';
      $step   = 'second';
      
   }elseif($step == 'second'){
     
      $column = 'col-lg-6';  
      $step   = 'third';
       
   }elseif($step == 'third'){
      
      $column = 'col-lg-6';  
      $step   = 'first';
      
   }

   return $column;

}

function binduz_get_current_date(){
   
    return date_i18n(get_option( 'date_format' ));
}

/*
* get default header footer id
* @return bool
*/
function binduz_header_footer_templates( $type= 'header' ){

   $list = [];
   $args = array(
       'post_type'           => 'element-ready-hf-tpl',
       'orderby'             => 'id',
       'order'               => 'DESC',
       'posts_per_page'      => -1,
       'ignore_sticky_posts' => 1,
       'meta_query'          => array(
           array(
               'key'     => '_qhf_template_type',
               'compare' => 'LIKE',
               'value'   => $type,
           ),
          
       ),
   );

   $data = get_posts($args);
   $list['--'] = esc_html__( 'None', 'binduz' );
   foreach($data as $item){
      $list[$item->ID] = $item->post_title;
   }
   
   return $list;

}

function binduz_get_all_image_sizes_option(){
   $return_sizes = [
      'full'=> esc_html__('Full','binduz')
   ];
   foreach(binduz_get_all_image_sizes() as $key => $value){
      $return_sizes[$key] = $key;
   }
   return $return_sizes;
}

function binduz_get_all_image_sizes() {
	global $_wp_additional_image_sizes;

	$default_image_sizes = array( 'thumbnail', 'medium', 'large' );
	 
	foreach ( $default_image_sizes as $size ) {
		$image_sizes[$size]['width']	= intval( get_option( "{$size}_size_w") );
		$image_sizes[$size]['height'] = intval( get_option( "{$size}_size_h") );
		$image_sizes[$size]['crop']	= get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
	}
	
	if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) )
		$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		
	return $image_sizes;
}

 function binduz_str_snake_case($str, array $noStrip = [])
{
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = str_replace(" ", "_", $str);
        $str = strtolower($str);

        return $str;
}

function binduz_theme_image_sizes(){
   $images_sizes = [
      
      'binduz_xl_small' => [
         'w'   => '340',
         'h'   => '243',
         'pos' => [ 'center', 'center' ]
      ],
      'binduz_673_563' => [
        'w'   => '673',
        'h'   => '563',
        'pos' => [ 'center', 'center' ]
      ],
      'binduz_thumnail' => [
        'w'   => '850',
        'h'   => '438',
        'pos' => [ 'center', 'center' ]
      ],
      'binduz_556_234' => [
        'w'   => '556',
        'h'   => '234',
        'pos' => [ 'center', 'center' ]
      ],
      'binduz_80_70' => [
        'w'   => '80',
        'h'   => '70',
        'pos' => true
      ],
      'binduz_120_120' => [
        'w'   => '120',
        'h'   => '120',
        'pos' => true
     ] ,
     'binduz_100_77' => [
        'w'   => '100',
        'h'   => '77',
        'pos' => [ 'center', 'center' ]
     ]

   ];

   $custom = binduz_option('general_image_sizes',[]);

   if(is_array($custom)){

       foreach($custom as $size){

          if(isset($size['title']) && isset($size['width']) && isset($size['height'])){
               $slug = binduz_str_snake_case($size['title']); 
               
               $images_sizes[$slug] = [
                   'w'   => $size['width'],
                   'h'   => $size['height'],
                   'pos' => [ 'center', 'center' ]
               ];
          }

       }

   }
  
   return $images_sizes;
}


function binduz_single_post_meta($category = false){

      $blog_cat_show   = binduz_option('blog_single_category','yes');
      $blog_cat_single = binduz_option('blog_category_single','no');
   
   ?>
   <div class="page_comments">
       <ul class="inline">
          <?php
            
             if($category==true && $blog_cat_show == 'yes') {
                  $cat = get_the_category();
                  echo "<li class='cat'>";
                     foreach( $cat as $value ):
                        
                        echo  '<a 
                                 class="post-cat" 
                                 href="'. esc_url (get_category_link($value->term_id) ) .'"
                                 >'. 
                                 esc_html(get_cat_name($value->term_id)).
                                 '</a>';
                        if( $blog_cat_single == 'yes' ){
                           break;
                        }
                     endforeach;  
                  echo "</li>";
             }  
            if ( binduz_option('blog_single_date','yes') =='yes' ) {
               echo '<li><i class="fal fa-clock"></i>
                     '. get_the_date( 'F j, Y' ) . 
                  '</li>';
            }
         
            if(binduz_option('blog_single_comment','yes') == 'yes'):  
               printf(' <li><i class="fal fa-comment"></i>%1$s</li>',
               esc_html(get_comments_number(get_the_ID())) 
               ); 
            endif;
            if(binduz_option('post_show_view_count','yes') == 'yes'):  
               
               printf(' <li><i class="fal fa-eye"></i>%1$s</li>',
               esc_html(binduz_get_postview(get_the_ID())) 
               ); 
            endif;

            if(binduz_option('post_read_time_show','no') == 'yes') {
               echo  wp_kses_post(binduz_content_estimated_reading_time(get_the_content()));
            }
         ?>
       </ul>
   </div>  
<?php
}

function binduz_social_share(){
   // option blog-details.php 
   $post_social_share_show = binduz_option('post_social_share_show','no');
   
   if($post_social_share_show == 'no'){
      return false;
   }

   $general_social_share = binduz_option('general_social_share','');

   if( !is_array($general_social_share) ){
      return false;  
   }
   ?>
            <div class="col-lg-2">
                  <div class="binduz-er-blog-social-share">
                    <?php

                     foreach($general_social_share as $share){
                           if(isset($share['social'])){
                     ?>


                              <div class="binduz-er-item mb-10">
                                       <a data-social="<?php echo esc_attr( $share['social'] ); ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                                       <i class="<?php echo esc_attr( $share['icon_class'] ); ?>"></i>
                                       <span data-counter="<?php echo esc_attr( $share['social'] ); ?>" ><?php echo esc_html__('0','binduz'); ?></span>
                                           
                                            <p>
                                              <?php if( $share['social'] == 'facebook' ): ?>
                                                 <?php echo esc_html__('Share','binduz'); ?>
                                              <?php elseif( $share['social'] == 'twitter'): ?>
                                                 <?php echo esc_html__('tweet','binduz'); ?>
                                              <?php else: ?>
                                                 <?php echo esc_html__('share','binduz'); ?>
                                              <?php endif; ?>
                                              
                                            </p>
                                        </a>
                                    </div>
                   
                     <?php
                            }
                        } 
                        
                     ?>
                  </div>
            </div>
         
   <?php
  
  return true;
}

function binduz_social_share_style2(){
   // option blog-details.php 
   $post_social_share_show = binduz_option('post_social_share_show','no');
   
   if($post_social_share_show == 'no'){
      return false;
   }

   $general_social_share = binduz_option('general_social_share','');

   if( !is_array($general_social_share) ){
      return false;  
   }
   ?>

         <div class="binduz-er-social">
            <ul>
                     <?php

                     foreach($general_social_share as $share){
                           if(isset($share['social'])){
                     ?>
                           <li>
                              <a data-social="<?php echo esc_attr( $share['social'] ); ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                                 <i class="<?php echo esc_attr( $share['icon_class'] ); ?>"></i>
                              </a>
                           </li>
                
                  <?php
                           }
                     } 
                     
                  ?>
            </ul>
         </div>
          
         
   <?php
  
  return true;
}

function binduz_social_share_style3(){
   // option blog-details.php 
   $post_social_share_show = binduz_option('post_social_share_show','no');
   
   if($post_social_share_show == 'no'){
      return false;
   }

   $general_social_share = binduz_option('general_social_share','');

   if( !is_array($general_social_share) ){
      return false;  
   }
   ?>

       
            <ul>
                     <?php

                     foreach($general_social_share as $share){
                           if(isset($share['social'])){
                     ?>
                           <li>
                              <a data-social="<?php echo esc_attr( $share['social'] ); ?>" href="<?php echo esc_url(get_the_permalink()); ?>">
                                 <i class="<?php echo esc_attr( $share['icon_class'] ); ?>"></i>
                              </a>
                           </li>
                
                  <?php
                           }
                     } 
                     
                  ?>
            </ul>
        
          
         
   <?php
  
  return true;
}

function binduz_typhography_option( $option = [] ){
   
   if( isset($option['family']) ){

      if( $option['family'] !='' ){
         binduz_Unyson_Google_Fonts::add_typography_v2( $option );
      }else{
         unset($option['family']);
      }
     
   }
   
  
  return binduz_advanced_font_styles($option); 
}

function binduz_comment_form(){
   // theme option panel 
 $comment_fld_cookie     = binduz_option('comment_cookie','no');
 $comment_fld_url        = binduz_option('comment_url','no');
 $comment_arg_be_note    = binduz_option('comment_before_note');
 $comment_arg_after_note = binduz_option('comment_after_note');
   
    //Declare Vars
 $comment_send      = esc_html__( 'Send','binduz' );
 $comment_reply     = esc_html__( 'Leave a Comment','binduz' );
 $comment_reply_to  = esc_html__( 'Reply','binduz' );
 $comment_author    = esc_html__( 'Name','binduz' );
 $comment_email     = esc_html__( 'E-Mail','binduz' );
 $comment_body      = esc_html__( 'Comment','binduz' );
 $comment_url       = esc_html__( 'Website','binduz' );
 $comment_cookies_1 = esc_html__( ' By commenting you accept the' , 'binduz' );
 $comment_cookies_2 = esc_html__( ' Privacy Policy','binduz' );
 $comment_before    = ''; // esc_html__('Registration isn\'t required.','binduz')
 $comment_after     = ''; // esc_html__('Do not spam.','binduz')
 $comment_cancel    = esc_html__('Cancel Reply','binduz');
 $name_submit       = esc_html__('Submit','binduz');
 
 //
 $override    = binduz_meta_option(get_the_id(),'override_default_layout','no');
 $post_layout = binduz_option('post_header_layout','style1');
 // override layout
 
 if($override == 'yes'){  
     $post_layout = binduz_meta_option(get_the_id(),'post_header_layout','style1');
 }

 //
 //Array
 if($post_layout == 'style2'){
   $comment_fld_url = 'yes';
   $text_area_col = '6';
   $text_area_cls = 'style2';
   if(is_user_logged_in()){
      $text_area_col = '12';
      $text_area_cls = '';
   }
   $comments_args = array(
      //Define Fields
      'fields' => array(
         //Author field
         'author' => '<div class="col-6"><div class="qs__blog__comment__comment__form__author binduz-er-input-box"><input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input></div>',
         //Email Field
         'email' => '<div class="qs__blog__comment__comment__form__email binduz-er-input-box"><input id="email" name="email" placeholder="' . $comment_email .'"></input></div>',
         
      ),
      // Change the title of send button
      'label_submit' => $comment_send,
      // Change the title of the reply section
      'title_reply'        => $comment_reply,
      'title_reply_before' => '<div class="binduz-er-blog-post-title"> <h3 id="qs__blog__comment__comment__reply__title " class="qs__blog__comment__comment__reply__title binduz-er-title">',
      'title_reply_after'  => '</h3></div>',
      // Change the title of the reply section
      'title_reply_to' => $comment_reply_to,
      //Cancel Reply Text
      'cancel_reply_link' => $comment_cancel,
      // Redefine your own textarea (the comment body).
      'comment_field' => '<div class="col-'.$text_area_col.'"><div class="qs__blog__comment__form__comment binduz-er-input-box"><textarea cols="30" class="'.$text_area_cls.'" rows="10" id="qs__blog__comment_textarea" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></div></div>',
      //Message Before Comment
      'comment_notes_before' => $comment_before,
      // Remove "Text or HTML to be displayed after the set of comment fields".
      'comment_notes_after' => $comment_after,
      //Submit Button ID
      'id_submit'       => 'qs__blog__comment__submit',
      'class_submit'    => 'qs__blog__comment__submit binduz-er-main-btn',
      'name_submit'     => $name_submit,
      'submit_button'   => '<button id="%2$s" class="%3$s" name="%1$s" type="submit">%4$s</button> ',
      'submit_field'    => '<div class="col-12"> <div class="qs__blog__comment__form__submit binduz-er-input-box text-end mt-15">%1$s %2$s</div></div>',
      'class_container' => 'qs__blog__comment_form_responds',
      'class_form'      => 'qs__blog__comment_form_action row',
      'format'          => 'html5',
      
      
   );

 }else{

 
 $comments_args = array(
    //Define Fields
    'fields' => array(
       //Author field
       'author' => '<div class="row"><div class="col-6"><div class="qs__blog__comment__comment__form__author binduz-er-input-box"><input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input></div></div>',
       //Email Field
       'email' => '<div class="col-6"><div class="qs__blog__comment__comment__form__email binduz-er-input-box"><input id="email" name="email" placeholder="' . $comment_email .'"></input></div></div></div>',
       
    ),
    // Change the title of send button
    'label_submit' => $comment_send,
    // Change the title of the reply section
    'title_reply'        => $comment_reply,
    'title_reply_before' => '<div class="binduz-er-blog-post-title"> <h3 id="qs__blog__comment__comment__reply__title" class="qs__blog__comment__comment__reply__title binduz-er-title">',
    'title_reply_after'  => '</h3></div>',
    // Change the title of the reply section
    'title_reply_to' => $comment_reply_to,
    //Cancel Reply Text
    'cancel_reply_link' => $comment_cancel,
    // Redefine your own textarea (the comment body).
    'comment_field' => '<div class="qs__blog__comment__form__comment binduz-er-input-box"><textarea id="qs__blog__comment_textarea" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></div>',
    //Message Before Comment
    'comment_notes_before' => $comment_before,
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => $comment_after,
    //Submit Button ID
    'id_submit'       => 'qs__blog__comment__submit',
    'class_submit'    => 'qs__blog__comment__submit binduz-er-main-btn',
    'name_submit'     => $name_submit,
    'submit_button'   => '<button id="%2$s" class="%3$s" name="%1$s" type="submit">%4$s</button> ',
    'submit_field'    => '<div class="qs__blog__comment__form__submit binduz-er-input-box text-end mt-15">%1$s %2$s</div>',
    'class_container' => 'qs__blog__comment_form_responds',
    'class_form'      => 'qs__blog__comment_form_action',
    'format'          => 'html5',
    
    
 );

}

 if( is_user_logged_in() ){
    $user              = wp_get_current_user();
    $user_identity     = $user->exists() ? $user->display_name : '';
    $comments_args['logged_in_as'] = sprintf(
       '<div class="qs__blog__comment__logged__in__as">%s</div>',
       sprintf(
          /* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
          __( '<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>','binduz' ),
          get_edit_user_link(),
          /* translators: %s: User name. */
          esc_attr( sprintf( __( 'Logged in as %s. Edit your profile.','binduz' ), $user_identity ) ),
          $user_identity,
          /** This filter is documented in wp-includes/link-template.php */
          wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ), get_the_ID() ) )
       )
       );
    
 }

 if( $comment_fld_cookie == 'yes' ){
     //Cookies
    $comments_args['fields']['cookies'] =  '<input class="qs__blog__comment_cookies" type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>';	
 }else{
    remove_action( 'set_comment_cookies', 'wp_set_comment_cookies' );
 }
 if($post_layout == 'style2'){
   $comments_args['fields']['url'] = '<div class="qs__blog__comment__comment__form__url binduz-er-input-box"><input id="url" name="url" placeholder="' . $comment_url .'"></input></div></div>';	
 }else{
   $comments_args['fields']['url'] = '<div class="qs__blog__comment__comment__form__url binduz-er-input-box"><input id="url" name="url" placeholder="' . $comment_url .'"></input></div>';	
 }
 
 
 if( $comment_fld_url !='yes' ){
    $comments_args['fields']['url'] = '';	
 }

 if( $comment_arg_be_note !='' ){
    $comments_args['comment_notes_before'] = '';
 }
 if( $comment_arg_after_note !='' ){
    $comments_args['comment_notes_after'] = '';
 }
 comment_form( $comments_args );
}


// comment author link
add_filter('get_comment_author_link', 'binduz_comment_author_link',10,3);

if( !function_exists('binduz_comment_author_link') ){
function binduz_comment_author_link($return, $author, $comment_ID){

   $comment = get_comment( $comment_ID );
   $url     = get_comment_author_url( $comment );
   $author  = get_comment_author( $comment );

   if ( empty( $url ) || 'http://' === $url ) {
      $return = $author;
   } else {
      $return = "<a href='$url' rel='external nofollow ugc' class='qs__post__comment__author__url'>$author</a>";
   }

   return $return;
   }

}

/*------------------------------
    POST PASSWORD FORM
-------------------------------*/
if ( !function_exists('binduz_password_form') ) {
   function binduz_password_form($form) {
       global $post;
       $label  =   'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
       $form   =   '<form class="qs__blog__post__pass__form" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
                       <span>'.esc_html__( "To view this protected post, enter the password below:", 'binduz' ).'</span>
                       <input name="post_password" id="' . $label . '" type="password"  placeholder="'.esc_attr__( "Enter Password", 'binduz' ).'">
                       <button type="submit" name="Submit">'.esc_attr__( "Submit",'binduz' ).'</button>
                   </form>';

       return $form;
   }
}

add_filter( 'the_password_form', 'binduz_password_form' );