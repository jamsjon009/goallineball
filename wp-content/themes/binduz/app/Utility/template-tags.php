<?php

if ( ! function_exists( 'binduz_post_thumbnail' ) ) :
	
	function binduz_post_thumbnail() {

		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) : ?>

			<div class="post-thumbnail post_img">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

		<a class="post-thumbnail post_img" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
				the_post_thumbnail( 'post-thumbnail', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
			?>
		</a>

		<?php
		endif; 
	}
endif;

if ( ! function_exists( 'binduz_return' ) ) :

  function binduz_return($arg){
 
   return $arg;
  }

endif;


// display meta information for a specific post
// ----------------------------------------------------------------------------------------
if ( !function_exists('binduz_get_breadcrumbs') ) {
   
	function binduz_get_breadcrumbs( $seperator = '', $word = '' ) {
	
		echo '<ol class="breadcrumb" >';
		if ( !is_home() ) {

			echo '<li class="breadcrumb-item"> <a href="';
			   echo esc_url( get_home_url( '/' ) );
			echo '">';
		
			echo esc_html__( 'Home', 'binduz' );
			echo "</a>".'&nbsp;'.wp_kses_post( $seperator ).'&nbsp;'."</li> ";

			if ( is_category() || is_single() ) {

				if ( !has_category() ) {
					return;
				}
			
				if(is_single()){
					$category = get_the_category();
					if(empty($category) || is_array($category)){
						$category = get_the_category(get_queried_object_id());
					}
		            
				}else{

					$category = get_category( get_query_var( 'cat' ) );

				} 
				if(is_array($category)){
					echo '<li class="breadcrumb-item"> <a href='.get_category_link($category[0]->term_id). '>';
				}else{
					echo '<li class="breadcrumb-item"> <a href='.get_category_link($category->term_id). '>';	
				}
				
				
				$post		 = get_queried_object();
				
				$postType	 = get_post_type_object( get_post_type( $post ) );

				if( !empty( $category ) ) {
					if(is_array($category)){

						echo esc_html( $category[0]->cat_name ) . '</a> </li>';

					}else{
						
						echo esc_html( $category->cat_name ) . '</a> </li>';
					}
					

				} elseif( $postType ) {

					echo esc_html( $postType->labels->singular_name ) . '</a></li>';

				}
				
				if( is_single() ) {

					echo '<li class="breadcrumb-item">'.'&nbsp;'.wp_kses_post( $seperator ).'&nbsp;';
				    	echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
					echo '</li>';
					
				}
				
			} elseif( is_page() ) {

				echo '<li class="breadcrumb-item">';
				  echo esc_html( $word ) != '' ? wp_trim_words( get_the_title(), $word ) : get_the_title();
				echo '</li>';

			}
		}
		if ( is_tag() ) {

			echo '<li class="breadcrumb-item">';
			  single_tag_title();
			echo '</li>';

		} elseif ( is_day() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( 'Blogs for', 'binduz' ) . " ";
		    	the_time( 'F jS, Y' );
			echo'</li>';

		} elseif ( is_month() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( 'Blogs for', 'binduz' ) . " ";
			   the_time( 'F, Y' );
			echo'</li>';

		} elseif ( is_year() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( 'Blogs for', 'binduz' ) . " ";
			   the_time( 'Y' );
			echo'</li>';

		} elseif ( is_author() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( 'Author Blogs', 'binduz' );
			echo'</li>';

		} elseif ( isset( $_GET[ 'paged' ] ) && !empty( $_GET[ 'paged' ] ) ) {

			echo "<li>" . esc_html__( 'Blogs', 'binduz' );
			echo'</li>';

		} elseif ( is_search() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( 'Search Result', 'binduz' );
			echo'</li>';

		} elseif ( is_404() ) {

			echo"<li class='breadcrumb-item'>" . esc_html__( '404 Not Found', 'binduz' );
			echo'</li>';

		}
		
		echo '</ol>';
	}

}

// wp_body_open() backword compatibility
if ( ! function_exists( 'wp_body_open' ) ) :
	
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}

endif;

/*-----------------------------
	RANDOM SINGLE TAG
------------------------------*/
if ( !function_exists( 'binduz_random_tag_retrip' ) ): 
	function binduz_random_tag_retrip(){

		if ( 'post' === get_post_type() ) {

			if ( has_tag() ) {
				$tags       = get_the_tags();
				$tag_count  = count($tags);
				$single_tag = $tags[random_int( 0, $tag_count-1 )];

				if ( get_the_tags() ) {
					echo '<a href="'.esc_url( get_category_link( $single_tag->term_id ) ).'">'.esc_html( $single_tag->name ).'</a>';
				}
			}
		}
	}
endif;



/*-------------------------------
    DAY LINK TO ARCHIVE PAGE
---------------------------------*/
if ( !function_exists('binduz_day_link') ) {
    function binduz_day_link() {

        $archive_year   = get_the_time('Y');
        $archive_month  = get_the_time('m');
        $archive_day    = get_the_time('d');
		
        echo get_day_link( $archive_year, $archive_month, $archive_day);

    }
}
