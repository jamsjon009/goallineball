<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Binduz_Video_Recent_Post extends WP_Widget {

	function __construct() {

		$widget_opt = array(
			'classname'		 => 'binduz-er-populer-news-social binduz-er-author-page-social',
			'description'	 => esc_html__('Video post with thumbnail','binduz-essential')
		);

		parent::__construct( 'qomodo-recent-video-post', esc_html__( 'Recent Video post', 'binduz-essential' ), $widget_opt );
	}

	function widget( $args, $instance ) {

		global $wp_query;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'number_of_posts' ] ) ) {
			$no_of_post = $instance[ 'number_of_posts' ];
		} else {
			$no_of_post = 0;
		}

	

		if ( !empty( $instance[ 'posts_title_limit' ] ) ) {
			$posts_title_limit = $instance[ 'posts_title_limit' ];
		} else {
			$posts_title_limit = 8;
		}
		
		if ( !empty( $instance[ 'posts_excerp_limit' ] ) ) {
			$posts_excerp_limit = $instance[ 'posts_excerp_limit' ];
		} else {
			$posts_excerp_limit = 18;
        }
		
		if ( !empty( $instance[ 'posts_image_size' ] ) ) {
			$posts_image_size = $instance[ 'posts_image_size' ];
		} else {
			$posts_image_size = 'post-thumbnail';
        }
      
     
  
		$query = array(
			'post_type'		 => array( 'post' ),
			'post_status'	 => array( 'publish' ),
			'orderby'		 => 'date',
			'order'			 => 'DESC',
			'posts_per_page' => 1,
			'p' => $no_of_post
		); 

		$image_size_arr = binduz_theme_image_sizes();

		$image_size_arr = isset($image_size_arr[$posts_image_size])?$image_size_arr[$posts_image_size]:['w'=>400,'h'=>500];

 
        $loop = new WP_Query( $query );
      
		?>
				<div class="binduz-er-popular-news-title">
					<?php
						if ( !empty( $instance[ 'title' ] ) ) {

							echo  $args[ 'before_title' ]  . apply_filters( 'widget_title', $instance[ 'title' ] ) .  $args[ 'after_title' ] ;
						}
					?>
				</div>
				<?php
				
				if ( $loop->have_posts() ):
					while ( $loop->have_posts() ):
						$loop->the_post();
						$image_html  = '';
						
							
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $posts_image_size );
							$img       = $thumbnail[ 0 ];
						

							$image_html =  '<img src="' . esc_url( $img ) . '" alt="' . esc_attr__('thumb','binduz-essential') . '">';

					
						$categories = get_the_category();
				?>

				
				
				
				<div class="binduz-er-video-post binduz-er-recently-viewed-item">
					<div class="binduz-er-latest-news-item">
						<div class="binduz-er-thumb">
							<?php echo $image_html ; ?>
							<?php if(get_post_format() == 'video'): 
								  $featured_video = binduz_meta_option(get_the_id(),'featured_video');
								?>
								<div class="binduz-er-play">
									<a class="binduz-er-video-popup" href="<?php echo esc_url($featured_video); ?>"><i class="fas fa-play"></i></a>
								</div>
							<?php endif; ?>
						</div>
						<div class="binduz-er-content">
							<div class="binduz-er-meta-item">
								<div class="binduz-er-meta-categories">
									<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"> <?php echo esc_html( $categories[0]->name ); ?> </a>
								</div>
								<div class="binduz-er-meta-date">
									<span><i class="fal fa-calendar-alt"></i><?php echo esc_html(get_the_date( get_option('date_format') )); ?></span>
								</div>
							</div>
							<h5 class="binduz-er-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),$posts_title_limit,' ');?></a></h5>
							<div class="binduz-er-meta-author">
								<span><?php echo esc_html__('By','binduz-essential'); ?> <span><?php echo esc_html(get_the_author()); ?></span></span>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
				<?php endif; ?> 
		 <?php
			echo $args[ 'after_widget' ];
	}

	function update( $new_instance, $old_instance ) {

		$old_instance[ 'title' ]              = strip_tags( $new_instance[ 'title' ] );
		$old_instance[ 'number_of_posts' ]    = $new_instance[ 'number_of_posts' ];
		
		$old_instance[ 'posts_title_limit' ]  = $new_instance[ 'posts_title_limit' ];
		$old_instance[ 'posts_excerp_limit' ] = $new_instance[ 'posts_excerp_limit' ];
		$old_instance[ 'posts_image_size' ] = $new_instance[ 'posts_image_size' ];
		

		return $old_instance;
	}

	function form( $instance ) {

     
      if ( isset( $instance[ '_post_type' ] ) ) {
         $_post_type = $instance['_post_type'];  
      }else{
         $_post_type = 'recent';  
      } 
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'Recent posts', 'binduz-essential' );
		}
		if ( isset( $instance[ 'number_of_posts' ] ) ) {
			$no_of_post = $instance[ 'number_of_posts' ];
		} else {
			$no_of_post = 3;
		}
		if ( isset( $instance[ 'posts_title_limit' ] ) ) {
			$posts_title_limit = $instance[ 'posts_title_limit' ];
		} else {
			$posts_title_limit = 8;
		}
		if ( isset( $instance[ 'posts_excerp_limit' ] ) ) {
			$posts_excerp_limit = $instance[ 'posts_excerp_limit' ];
		} else {
			$posts_excerp_limit = 20;
		}
		if ( isset( $instance[ 'posts_image_size' ] ) ) {
			$posts_image_size = $instance[ 'posts_image_size' ];
		} else {
			$posts_image_size = 'post-thumbnail';
		}

	
         
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
      
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php esc_html_e( 'Post ID:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="text" value="<?php echo esc_attr( $no_of_post ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_title_limit' ) ); ?>"><?php esc_html_e( 'Title limit:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_title_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_title_limit' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_title_limit ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_excerp_limit' ) ); ?>"><?php esc_html_e( 'Content limit:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_excerp_limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_excerp_limit' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_excerp_limit ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_image_size' ) ); ?>"><?php esc_html_e( 'Image Size:', 'binduz-essential' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_image_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_image_size' ) ); ?>" >
			  <?php foreach(binduz_theme_image_sizes() as $key=> $_tiule): ?>
			  	<option <?php echo $posts_image_size == $key?'selected':''; ?> value="<?php echo $key; ?>"> <?php echo $key; ?> </option>
			  <?php endforeach; ?>]
		    </select>
			
		</p>
		
		<?php
	}

}

add_action( 'widgets_init', function(){
	register_widget( 'Binduz_Video_Recent_Post' );
});
