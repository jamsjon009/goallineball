<?php
namespace Binduz\Core\Hook;

/**
 * demo import.
 */
class Demo
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
	
       add_filter( 'fw:ext:backups-demo:demos', [$this,'backups_demos'] );

	}
	
    function backups_demos( $demos ) {
        
        $demo_content_installer	 = 'http://wp.quomodosoft.com/binduz/demo-content';
        $demos_array			 = array(

            'home_1'			 => array(
                    'title'			 => esc_html__( 'Home V1', 'binduz' ),
                    'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_1.png',
                    'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz' ),
            ),
            'home_2'			 => array(
                'title'			 => esc_html__( 'Home v2', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_2.png',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v2' ),
            ),
            'home_3'			 => array(
                'title'			 => esc_html__( 'Home v3', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_3.png',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v3' ),
            ),
            'home_4'			 => array(
                'title'			 => esc_html__( 'Home v4', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_4.png',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v4' ),
            ),
            'home_5'			 => array(
                'title'			 => esc_html__( 'Home v5', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_5.jpg',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v5' ),
            ),
            'home_6'			 => array(
                'title'			 => esc_html__( 'Home v6', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_6.jpg',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v6' ),
            ),

            'home_7'			 => array(
                'title'			 => esc_html__( 'Home v7', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_7.png',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v7' ),
            ),
            'home_8'			 => array(
                'title'			 => esc_html__( 'Home v8', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_8.jpg',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v8' ),
            ),
            'home_9'			 => array(
                'title'			 => esc_html__( 'Home v9', 'binduz' ),
                'screenshot'	 => esc_url( $demo_content_installer ) . '/default/home_9.jpg',
                 'preview_link'	 => esc_url( 'https://wp.quomodosoft.com/binduz/home-v9' ),
            ),
            
        );

        $download_url = esc_url( $demo_content_installer ) . '/download.php';
        
        foreach ( $demos_array as $id => $data ) {
            $demo		 = new \FW_Ext_Backups_Demo( $id, 'piecemeal', array(
                'url'		 => $download_url,
                'file_id'	 => $id,
            ) );
            $demo->set_title( $data[ 'title' ] );
            $demo->set_screenshot( $data[ 'screenshot' ] );
            $demo->set_preview_link( $data[ 'preview_link' ] );
            $demos[ $demo->get_id() ]	 = $demo;
            unset( $demo );
        }

        return $demos;
    }


}




