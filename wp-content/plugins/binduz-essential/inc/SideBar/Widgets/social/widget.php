<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * social widget
 */
class Binduz_Social_Count extends WP_Widget {

	function __construct() {
		$widget_opt = array(
			'classname'		 => 'binduz-er-populer-news-social binduz-er-author-page-social',
			'description'	 => esc_html__('Binduz Social Count','binduz-essential')
		);

		parent::__construct( 'binduz-er-qomodo-social', esc_html__( 'Binduz social Counter', 'binduz-essential' ), $widget_opt );
	}

	function widget( $args, $instance ) {
		

		echo  $args[ 'before_widget' ] ;
		
        
		$list  = binduz_option('general_social_links');


	
		?>
		
			<div class="binduz-er-popular-news-title">
				<?php
					if ( !empty( $instance[ 'title' ] ) ) {

						echo  $args[ 'before_title' ]  . apply_filters( 'widget_title', $instance[ 'title' ] ) .  $args[ 'after_title' ] ;
					}
				?>
			</div>
			<div class="binduz-er-social-list">
				<div class="binduz-er-list">
						<?php foreach( $list as $item ): ?>
							<a href="<?php echo $item['url']; ?>">
								<span><i class="<?php echo $item['icon_class'] ?>"></i> <span><?php echo $item['count'] ?></span> <?php echo $item['title'] ?></span>
								<span><?php echo $item['tag'] ?></span>
							</a>
						<?php endforeach; ?>
				</div>
			</div>
		
		<?php
		echo  $args[ 'after_widget' ] ;
	}

	function update( $old_instance, $new_instance ) {
		$new_instance[ 'title' ]			 = strip_tags( $old_instance[ 'title' ] );
	
		return $new_instance;
	}

	function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'Social', 'binduz-essential' );
		}

	
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'binduz-essential' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		

		<?php
	}

}

add_action( 'widgets_init', function(){
	register_widget( 'Binduz_Social_Count' );
});
