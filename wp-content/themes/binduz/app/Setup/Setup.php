<?php

namespace Binduz\Setup;

class Setup
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {

        add_action( 'after_setup_theme', array( $this, 'setup' ) );
        add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
        add_filter( 'use_widgets_block_editor', '__return_false' );
       
      
    }


    

    public function setup()
    {
        /*
         * You can activate this if you're planning to build a multilingual theme
         */
        
        load_theme_textdomain( 'binduz', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
  
        add_theme_support( 'title-tag' );
  
        add_theme_support( 'post-thumbnails' );
        add_theme_support('post-formats', [
           'standard', 'image', 'video', 'audio','quote','facebook','twitter'
        ]);
        
        //1200 x 628
        set_post_thumbnail_size(1200, 780, ['center', 'center']);
        $images_size = binduz_theme_image_sizes();
        
        if(is_array($images_size)){

            foreach($images_size as $key => $image){
                add_image_size( $key , $image['w'], $image['h'],$image['pos'] );      
            }

        }
  
        add_theme_support( 'html5', array(
              'search-form',
              'comment-form',
              'comment-list',
              'gallery',
              'caption',
        ) );

       remove_theme_support( 'widgets-block-editor' );
    }
 
}
