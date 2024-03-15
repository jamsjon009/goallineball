<?php
namespace Binduz\Core;

/**
 * Sidebar.
 */
class Footer
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
    *    Define the sidebar
    */
    public function widgets_init()
    {
       
        register_sidebar(

            array(
                'name'          => esc_html__('Footer One', 'binduz'),
                'id'            => 'footer-1',
                'description'   => esc_html__('Footer one Widget.', 'binduz'),
                'before_widget' => '<div id="%1$s" class="qs__blog__widget qs__blog__single__footer__widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="qs__blog__widget__title binduz-er-title">',
                'after_title'   => '</h4>',
            )

        );

        register_sidebar(

            array(
                'name'          => esc_html__('Footer Two', 'binduz'),
                'id'            => 'footer-2',
                'description'   => esc_html__('Footer  widget.', 'binduz'),
                'before_widget' => '<div id="%1$s" class="qs__blog__widget qs__blog__single__footer__widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="qs__blog__widget__title binduz-er-title">',
                'after_title'   => '</h4>',
            )

        );

        register_sidebar(

            array(
                'name'          => esc_html__('Footer Three', 'binduz'),
                'id'            => 'footer-3',
                'description'   => esc_html__('Footer widget.', 'binduz'),
                'before_widget' => '<div id="%1$s" class="qs__blog__widget qs__blog__single__footer__widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="qs__blog__widget__title binduz-er-title">',
                'after_title'   => '</h4>',
            )

        );

        register_sidebar(

            array(
                'name'          => esc_html__('Footer Four', 'binduz'),
                'id'            => 'footer-4',
                'description'   => esc_html__('Footer widget.', 'binduz'),
                'before_widget' => '<div id="%1$s" class="qs__blog__widget qs__blog__single__footer__widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="qs__blog__widget__title binduz-er-title">',
                'after_title'   => '</h4>',
            )
            
        );
    }
}
