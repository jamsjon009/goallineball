<?php
namespace Binduz_Essential;

final class Init 
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
        $a1 = [
		
		
		];
		
		$a2 = [
				
			//elementor
			
			Base\Preloader::class,
			Base\Sections\Widget_Wrapper::class,
			Base\Sections\Widget_Extends::class,
			Base\Controls\Grid\Generel_Controls::class,
			Base\Controls\Slider\Slider_Controls::class,
			// custom post type
			//Base\CPT\Feature_Request::class,
			
	
		];
		
		$all = apply_filters( 'binduz_essential_extend_modules', $a2);
		$w_class = array_merge($a1,$all);
		return $w_class;
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
		   
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	public static function register_modules(){
	
		include( dirname(__FILE__) . '/SideBar/Widgets/author/widget.php' );	
		include( dirname(__FILE__) . '/SideBar/Widgets/recent-post/tab.php' );	
		include( dirname(__FILE__) . '/SideBar/Widgets/recent-post/widget.php' );	
		include( dirname(__FILE__) . '/SideBar/Widgets/mailchimp/widget.php' );	
		include( dirname(__FILE__) . '/SideBar/Widgets/social/widget.php' );	
		include( dirname(__FILE__) . '/SideBar/Widgets/button.php' );	
		include( dirname(__FILE__) . '/Base/users.php' );	
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}



