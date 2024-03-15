<?php

class Binduz_MailChimp extends WP_Widget
{
    /**
     * Constructor
     **/
    public $css = '.binduz-er-top-header-area-4 {
        height: auto;
    }';
    public $src = '';
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'binduz-er-blog-mailchimp',
            'description' => esc_html__('Binduz MailChimp','binduz-essential'),
        );
        parent::__construct( 'mailchimp_binduz_upload', 'binduz Mailchimp', $widget_ops );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('wp_enqueue_scripts', [$this,'theme_inline_css']);
    }
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));
        wp_enqueue_style('thickbox');
    }

    function theme_inline_css(){

        $settings = $this->get_settings();
        
        if(!isset($settings[2])){
            return;
        }
        $bgimage  = isset($settings[2]['bgimage'])?$settings[2]['bgimage']:'';
        if($bgimage !=''){
            return;
        }
        
       
    
        $custom_css = "
        .binduz-custom-widget-bg::before{
            background-image: url($settings[2]['bgimage']);
            } ";
            $custom_css = $custom_css. $this->src;
        wp_add_inline_style( 'binduz-style', $custom_css );
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

		// Our variables from the widget settings
		$image       = $instance['image'];
		
		$description = $instance['about'];
	    $newslatter_heading = $instance['newslatter_heading'];
      
        if(shortcode_exists('mc4wp_form')){
            $mailchimp_shortcode = get_option('mc4wp_default_form_id','');
          }
     
      print $before_widget;
      ?>
        <?php
            if ( !empty( $instance[ 'title' ] ) ) {

                echo binduz_return($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . binduz_return($args[ 'after_title' ]);
            }
        ?>
       <div class="binduz-er-populer-news-sidebar-newsletter binduz-er-author-page-newsletter mt-40">
            <div class="binduz-er-newsletter-box binduz-custom-widget-bg text-center">
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_html__('img','binduz'); ?>">
                <h3 class="binduz-er-title"> <?php echo esc_html($newslatter_heading); ?> </h3>
                <p> <?php echo esc_html($description); ?> </p>
                <div class="binduz-er-input-box">
                    <?php echo do_shortcode( "[mc4wp_form id=$mailchimp_shortcode]" ); ?>  
                </div>
            </div>
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
        $users = get_users();
      
        $title = __('Newslatter ');
      
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
       
        $defaults = array(
         
          'image'                => '',
          'bgimage'                => '',
          'newslatter_heading'                => '',
          'about'                => '',
         
         

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
            <label for="<?php echo $this->get_field_name( 'bgimage' ); ?>"><?php _e( 'Background Image:' ); ?></label>
          
            <input name="<?php echo $this->get_field_name( 'bgimage' ); ?>" id="<?php echo $this->get_field_id( 'bgimage' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $bgimage ); ?>" />
            <br/>  
            <br/>      
            <input class="upload_image_button button" type="button" value="Upload Image" />
        </p>
        <p>
        <input name="<?php echo $this->get_field_name( 'newslatter_heading' ); ?>" id="<?php echo $this->get_field_id( 'newslatter_heading' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_html( $newslatter_heading ); ?>" />
        </p>
       
        <p>
           <textarea id="<?php print $this->get_field_id( 'about' ); ?>" name="<?php print $this->get_field_name( 'about' ); ?>" style="width:95%;" rows="6"><?php echo esc_textarea( $instance['about'] ); ?></textarea>
        </p>
       
        <p> 
       
    <?php
    }
}

add_action( 'widgets_init', function(){
	register_widget( 'Binduz_MailChimp' );
});
?>