<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Tab_Recent_Post extends WP_Widget {

	function __construct() {

		$widget_opt = array(
			'classname'		 => 'widget binduz-er-blog-tab-post',
			'description'	 => esc_html__('Tab Post With Thumbnail','binduz-essential')
		);

		parent::__construct( 'binduz-er-recent-tab-post', esc_html__( 'Binduz Tab post', 'binduz-essential' ), $widget_opt );
	}

	function widget( $args, $instance ) {

		global $wp_query;

		echo $args[ 'before_widget' ];

		if ( !empty( $instance[ 'number_of_posts' ] ) ) {
			$no_of_post = $instance[ 'number_of_posts' ];
		} else {
			$no_of_post = 3;
		}

		if ( !empty( $instance[ 'image_show' ] ) ) {
			$image_show = $instance[ 'image_show' ];
		} else {
			$image_show = '';
		}

		if ( !empty( $instance[ 'posts_title_limit' ] ) ) {
			$posts_title_limit = $instance[ 'posts_title_limit' ];
		} else {
			$posts_title_limit = 8;
		}
		
		if ( !empty( $instance[ 'table_one_title' ] ) ) {
			$table_one_title = $instance[ 'table_one_title' ];
		} else {
			$table_one_title = '';
		}
		
		if ( !empty( $instance[ 'table_one_title2' ] ) ) {
			$table_one_title2 = $instance[ 'table_one_title2' ];
		} else {
			$table_one_title2 = '';
		}
		
		if ( !empty( $instance[ 'posts_excerp_limit' ] ) ) {
			$posts_excerp_limit = $instance[ 'posts_excerp_limit' ];
		} else {
			$posts_excerp_limit = 18;
        }
      
        if ( !empty( $instance[ '_post_type' ] ) ) {
			$_post_type = $instance[ '_post_type' ];
		} else {
			$_post_type = 'recent';
		}
		
		if ( !empty( $instance[ '_post_type2' ] ) ) {
			$_post_type2 = $instance[ '_post_type2' ];
		} else {
			$_post_type2 = 'recent';
		}

		$query = array(
			'post_type'		 => array( 'post' ),
			'post_status'	 => array( 'publish' ),
			'orderby'		 => 'date',
			'order'			 => 'DESC',
			'posts_per_page' => $no_of_post
		);
		
		$query2 = $query; 

		if($_post_type=="populer"){
			$query['orderby'] = "comment_count"; 
		}
		
		if($_post_type2=="populer"){
			$query2['orderby'] = "comment_count"; 
		}
 
        $loop = new WP_Query( $query );
        $loop2 = new WP_Query( $query2 );
    
		?>
		  <?php
            if ( !empty( $instance[ 'title' ] ) ) {

                echo binduz_return($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . binduz_return($args[ 'after_title' ]);
            }
          ?>
		  <div class="binduz-er-populer-news-sidebar-post pt-40">
                            <div class="binduz-er-popular-news-title">
                                <ul class="nav nav-pills mb-3" id="pills-tab-2" role="tablist">
									<?php if($table_one_title !=''): ?>
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> <?php echo esc_html($table_one_title); ?> </a>
										</li>
									<?php endif; ?>
									<?php if($table_one_title2 !=''): ?>
										<li class="nav-item" role="presentation">
											<a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo esc_html($table_one_title2); ?></a>
										</li>
									<?php endif; ?>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent-2">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="binduz-er-sidebar-latest-post-box">
											<?php

											if( $loop->have_posts() ):

												while( $loop->have_posts() ):
												$loop->the_post();
												$image_html  = '';
														if($image_show !=''): 
															
															$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '' );
															$img       = $thumbnail[ 0 ];
															
															if(function_exists('fw_resize')){
																$img  = fw_resize( $thumbnail[ 0 ], 100, 100,true );  
															}

															$image_html =  '<img src="' . esc_url( $img ) . '" alt="' . esc_attr__('thumb','binduz-essential') . '">';

														endif;

													?>
									
													<div class="binduz-er-sidebar-latest-post-item">
														<div class="binduz-er-thumb">
															<?php echo $image_html ; ?>
														</div>
														<div class="binduz-er-content">
															<span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?></span>
															<h4 class="binduz-er-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),$posts_title_limit,' ');?></a></h4>
														</div>
													</div>
												<?php endwhile; wp_reset_postdata();
											endif; ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="binduz-er-sidebar-latest-post-box">
										<?php

											if( $loop2->have_posts() ):

												while( $loop2->have_posts() ):
												$loop2->the_post();
												$image_html  = '';
														if($image_show !=''): 
															
															$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '' );
															$img       = $thumbnail[ 0 ];
															
															if(function_exists('fw_resize')){
																$img  = fw_resize( $thumbnail[ 0 ], 100, 100,true );  
															}

															$image_html =  '<img src="' . esc_url( $img ) . '" alt="' . esc_attr__('thumb','binduz-essential') . '">';

														endif;

													?>

													<div class="binduz-er-sidebar-latest-post-item">
														<div class="binduz-er-thumb">
															<?php echo $image_html ; ?>
														</div>
														<div class="binduz-er-content">
															<span><i class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date( get_option('date_format') )); ?></span>
															<h4 class="binduz-er-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),$posts_title_limit,' ');?></a></h4>
														</div>
													</div>
												<?php endwhile; wp_reset_postdata();
											endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
		    
		 <?php
					
			echo $args[ 'after_widget' ];
	}

	function update( $new_instance, $old_instance ) {

		$old_instance[ 'title' ]              = strip_tags( $new_instance[ 'title' ] );
		$old_instance[ 'number_of_posts' ]    = $new_instance[ 'number_of_posts' ];
		$old_instance[ '_post_type' ]         = $new_instance[ '_post_type' ];
		$old_instance[ '_post_type2' ]         = $new_instance[ '_post_type2' ];
		$old_instance[ 'table_one_title' ]         = $new_instance[ 'table_one_title' ];
		$old_instance[ 'table_one_title2' ]         = $new_instance[ 'table_one_title2' ];
		$old_instance[ 'posts_title_limit' ]  = $new_instance[ 'posts_title_limit' ];
		$old_instance[ 'posts_excerp_limit' ] = $new_instance[ 'posts_excerp_limit' ];
		$old_instance[ 'image_show' ]         = $new_instance[ 'image_show' ];

		return $old_instance;
	}

	function form( $instance ) {

     
      if ( isset( $instance[ '_post_type' ] ) ) {
         $_post_type = $instance['_post_type'];  
      }else{
         $_post_type = 'recent';  
      } 
	  if ( isset( $instance[ '_post_type2' ] ) ) {
		$_post_type2 = $instance['_post_type2'];  
	 }else{
		$_post_type2 = 'recent';  
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
		
		if ( isset( $instance[ 'table_one_title' ] ) ) {
			$table_one_title = $instance[ 'table_one_title' ];
		} else {
			$table_one_title = 'Recent';
		}
		
		if ( isset( $instance[ 'table_one_title2' ] ) ) {
			$table_one_title2 = $instance[ 'table_one_title2' ];
		} else {
			$table_one_title2 = 'Recent';
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

		if ( isset( $instance[ 'image_show' ] ) ) {
			$image_show = $instance[ 'image_show' ];
		} else {
			$image_show = '';
		}
         
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'table_one_title' ) ); ?>"><?php esc_html_e( 'Tab One:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'table_one_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'table_one_title' ) ); ?>" type="text" value="<?php echo esc_attr( $table_one_title ); ?>" />
		</p>
        <p>
		    
		    <select class='widefat' id="<?php echo $this->get_field_id('_post_type'); ?>"
					name="<?php echo $this->get_field_name('_post_type'); ?>" type="text">
					<option
						value='recent' 
						<?php echo ($_post_type=='recent')?'selected':''; ?>>
						<?php echo esc_html__('Recent post','binduz-essential'); ?>
					</option>
					<option 
						value='populer'
						<?php echo ($_post_type=='populer')?'selected':''; ?>>
						<?php echo esc_html__('Populer post','binduz-essential'); ?>
					</option> 
			</select>                
        </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'table_one_title2' ) ); ?>"><?php esc_html_e( 'Tab One:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'table_one_title2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'table_one_title2' ) ); ?>" type="text" value="<?php echo esc_attr( $table_one_title2 ); ?>" />
		</p>
		<p>
		    <select class='widefat' id="<?php echo $this->get_field_id('_post_type2'); ?>"
					name="<?php echo $this->get_field_name('_post_type2'); ?>" type="text">
					<option
						value='recent' 
						<?php echo ($_post_type2=='recent')?'selected':''; ?>>
						<?php echo esc_html__('Recent post','binduz-essential'); ?>
					</option>
					<option 
						value='populer'
						<?php echo ($_post_type2=='populer')?'selected':''; ?>>
						<?php echo esc_html__('Populer post','binduz-essential'); ?>
					</option> 
			</select>                
        </p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'binduz-essential' ); ?></label>
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
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image_show' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image_show' ) ); ?>" type="checkbox" value="1" <?php checked( $image_show, 1 ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'image_show' ) ); ?>"><?php _e( esc_attr( 'Image show' ) ); ?> </label> 
		</p>
		<?php
	}

}

add_action( 'widgets_init', function(){
	register_widget( 'Tab_Recent_Post' );
});
