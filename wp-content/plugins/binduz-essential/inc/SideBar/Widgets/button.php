<?php

class Binduz_Button extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'binduz-er-sidebar-social binduz-er-populer-news-sidebar-add d-none d-lg-block',
            'description' => esc_html__('Binduz Button','mediguss-essential'),
        );
        parent::__construct( 'binduz-er-button', 'binduz Button', $widget_ops );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }
     /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'author/upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }
    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        
      extract( $args );

		$button_url  = $instance['button_url'];
		$button_text = $instance['button_text'];
		$text_line_two = $instance['text_line_two'];
		$text_line_one = $instance['text_line_one'];
		$image = $instance['image'];

        $banner_image  = '';
        if( isset($image) && $image != ''){
            $banner_image = 'style="background-image:url('.esc_url( $image ).');"';
        } 
		

      print $before_widget;
      ?>
        <?php
            if ( !empty( $instance[ 'title' ] ) ) {

                echo binduz_return($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . binduz_return($args[ 'after_title' ]);
            }
        ?>
        <div <?php echo $banner_image; ?> class="binduz-er-sidebar-add mt-40">
            <h3 class="binduz-er-title"> <?php echo $text_line_one; ?> <span> <?php echo $text_line_two; ?> </span></h3>
            <a class="binduz-er-main-btn" href="<?php echo esc_url($button_url); ?>"> <?php echo $button_text; ?> </a>
        </div>
      

    <?php  
      print $after_widget;

    }
    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {
        // update logic goes here
        $updated_instance = $new_instance;
        return $updated_instance;
    }
    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
        
      
        $title = __('Cta');
      
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
       
        $defaults = array(
          'button_url'                 => '',
          'button_text'                => '',
          'text_line_one'                => '',
          'text_line_two'                => '',
          'image'                => '',
   

		);
		  $instance = wp_parse_args( (array) $instance, $defaults );
        extract($instance);
    
    ?>
         
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
          
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <br/>  
            <br/>      
            <input class="upload_image_button button" type="button" value="Upload Image" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_name( 'text' ); ?>"><?php _e( 'Button text:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'button_text' ); ?>" id="<?php echo $this->get_field_id( 'button_text' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_html( $button_text ); ?>" />
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_name( 'url' ); ?>"><?php _e( 'Url:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'button_url' ); ?>" id="<?php echo $this->get_field_id( 'button_url' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $button_url ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_name( 'Text_line_one' ); ?>"><?php _e( 'Line one:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'text_line_one' ); ?>" id="<?php echo $this->get_field_id( 'text_line_one' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_html( $text_line_one ); ?>" />
        </p> 
        
         <p>
        <label for="<?php echo $this->get_field_name( 'Text_line_two' ); ?>"><?php _e( 'Line two:' ); ?></label>
        <input name="<?php echo $this->get_field_name( 'text_line_two' ); ?>" id="<?php echo $this->get_field_id( 'text_line_two' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_html( $text_line_two ); ?>" />
        </p>
       
      
        <p> 
       
    <?php
    }
}

add_action( 'widgets_init', function(){
	register_widget( 'Binduz_Button' );
});
?>