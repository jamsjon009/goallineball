<?php

namespace Binduz\Core\Hook;

/**
 * Options.
 * @author quomodosoft.com
 */
class Options
{
	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function register()
	{
		add_action( 'admin_menu', [$this,'remove_fw_settings'], 999 );
        add_action('fw_option_types_init', array( $this, 'custom_option_types') );
	}

	public function remove_fw_settings() {
		remove_submenu_page( 'themes.php', 'fw-settings' );
	}
    
    public function custom_option_types(){
        if (is_admin()) {
			$dir = '/option-types';
			self::include_required_files( $dir . '/new-icon/new-icon2.php', 'framework-customizations');
				// more option
		}  
    }
        // include method, using file prefix
    // ----------------------------------------------------------------------------------------
	public static function include_required_files( $file = null, $directory = 'framework-customizations' ) {
		if($file != null){
            $filename = $directory . $file;
        	require_once( trailingslashit( get_template_directory() ). $filename );
		}
	}
}




