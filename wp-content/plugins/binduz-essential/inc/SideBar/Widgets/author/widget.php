<?php

class Binduz_Author extends WP_Widget
{
    /**
     * Constructor
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'binduz-er-blog-author',
            'description' => esc_html__('Binduz Author','binduz-essential'),
        );
        parent::__construct( 'pu_media_upload', 'binduz Author', $widget_ops );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
    }
    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('upload_media_widget', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));
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

		// Our variables from the widget settings
		$image       = $instance['image'];
		
		$description = $instance['about'];
		$user        = $instance['user'];
		$center      = isset($instance['binduz_text_center'])?$instance['binduz_text_center']:'left';
		$author_url  = get_author_posts_url( $user, the_author_meta('nick_name',$user) );
     
        $designation = $instance['designation'];

        if($description==''){
          $description = get_the_author_meta( 'description', $user );
        }

      print $before_widget;
      ?>
        <?php
            if ( !empty( $instance[ 'title' ] ) ) {

                echo binduz_return($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . binduz_return($args[ 'after_title' ]);
            }
        ?>
        <div class="binduz-er-archived-sidebar-about">
            <div class="binduz-er-user">
                 <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(the_author_meta('display_name',$user)); ?>">
                <div class="binduz-er-icon">
                    <i class="fal fa-newspaper"></i>
                </div>

            </div>
            <span><?php echo esc_html($designation); ?></span>
            <h4 class="binduz-er-title"><?php echo esc_attr(the_author_meta('display_name',$user)); ?></h4>
            <?php if(is_array(binduz_option('general_editor_social_links'))): ?>
                <ul>

                    <?php foreach( binduz_option('general_editor_social_links') as $item ): ?>
                        <li><a href="<?php echo esc_url($item['url']); ?>"><i class="<?php echo esc_attr($item['icon_class']); ?>"></i></a></li>
                    <?php endforeach; ?>
                
                </ul>
            <?php endif; ?>
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
      
        $title = __('About Editor ');
      
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
       
        $defaults = array(
          'user'                 => '',
          'image'                => '',
          'designation'                => '',
          'about'                => '',
          'binduz_text_center' => '',
         

		);
		  $instance = wp_parse_args( (array) $instance, $defaults );
        extract($instance);
    
    ?>
         
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
              <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'binduz_text_center' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'binduz_text_center' ) ); ?>" type="checkbox" value="1" <?php checked( $binduz_text_center, 1 ); ?>>
              <label for="<?php echo esc_attr( $this->get_field_id( 'binduz_text_center' ) ); ?>"><?php _e( esc_attr( 'Content center' ) ); ?> </label> 
       </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
          
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <br/>  
            <br/>      
            <input class="upload_image_button button" type="button" value="Upload Image" />
        </p>
        <p>
        <input name="<?php echo $this->get_field_name( 'designation' ); ?>" id="<?php echo $this->get_field_id( 'designation' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_html( $designation ); ?>" />
        </p>
       
        <p>
           <textarea id="<?php print $this->get_field_id( 'about' ); ?>" name="<?php print $this->get_field_name( 'about' ); ?>" style="width:95%;" rows="6"><?php echo esc_textarea( $instance['about'] ); ?></textarea>
        </p>
        <p>
          <label for="<?php echo $this->get_field_name( 'user' ); ?>"><?php _e( 'Author:' ); ?></label>
          <br/>
          <br/>
            <select name="<?php echo $this->get_field_name( 'user' ); ?>" id="<?php echo $this->get_field_id( 'user' ); ?>" class="widefat">
            <?php foreach ($users as $userlist ):  ?>
              <option <?php selected( $instance['user'], $userlist->ID ); ?> value="<?php echo esc_attr($userlist->ID); ?>"> <?php echo esc_html($userlist->display_name); ?> </option>
           <?php endforeach; ?>
             
            </select>
        </p>
        <p> 
       
    <?php
    }
}

add_action( 'widgets_init', function(){
	register_widget( 'Binduz_Author' );
});
?>