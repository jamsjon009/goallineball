<?php
namespace Binduz\Setup;

/**
 * Menus
 */
class Menus
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action( 'after_setup_theme', array( $this, 'menus' ) );
    }

    public function menus()
    {
        /** 
        * Register all your menus here
        */
        $register_menus = array(
            'primary' => esc_html__( 'Primary', 'binduz' ),
        );

        if( '1' == binduz_option( 'enable_footer_menu', 1 ) ){
            $register_menus['footer_menu'] = esc_html__( 'Footer nav', 'binduz' );
        }
        
        register_nav_menus( $register_menus );
    }
}
