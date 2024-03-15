<?php

namespace Binduz\Core;

/**
 * Sidebar.
 */
class Sidebar
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'widgets_init', array( $this, 'widgets_init' ) );
    }

    /*
        Define the sidebar
    */
    public function widgets_init()
    {
       
        register_sidebar( array(
            'name'          => esc_html__('Blog widget area', 'binduz'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Appears on posts.', 'binduz'),
            'before_widget' => '<div id="%1$s" class="qs__blog__widget qs__blog__single__widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="binduz-er-sidebar-title"><h3 class="qs__blog__widget__title binduz-er-title">',
            'after_title'   => '</h3></div>',
        ) );
    }
}
