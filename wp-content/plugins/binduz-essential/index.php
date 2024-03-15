<?php

/**
 * Plugin Name: Binduz Essential
 * Description: Binduz Essential is Binduz theme required plugin .
 * Plugin URI: #
 * Author: QuomodoSoft
 * Author URI: http://quomodosoft.com
 * Version: 3.0.0
 * License: GPL2
 * Text Domain: binduz-essential
 * Domain Path: /languages/
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allow = ['binduz', 'binduz-child'];
if (!in_array(get_option('stylesheet'), $allow)) {
	return;
}
// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}



/**
 * PLUGINS MAIN PATH CONSTANT
 */
define('BINDUZ_ESSENTIAL_VERSION', '1.1.0');
define('BINDUZ_ESSENTIAL', TRUE);
define('BINDUZ_ESSENTIAL_ROOT', dirname(__FILE__));

define('BINDUZ_ESSENTIAL_URL', plugins_url('/', __FILE__));
define('BINDUZ_ESSENTIAL_ROOT_JS', plugins_url('/assets/js/', __FILE__));
define('BINDUZ_ESSENTIAL_ROOT_CSS', plugins_url('/assets/css/', __FILE__));
define('BINDUZ_ESSENTIAL_ROOT_ICON', plugins_url('/assets/icons/', __FILE__));
define('BINDUZ_ESSENTIAL_ROOT_IMG', plugins_url('/assets/img/', __FILE__));

define('BINDUZ_ESSENTIAL_DIR_URL', plugin_dir_url(__FILE__));
define('BINDUZ_ESSENTIAL_DIR_PATH', plugin_dir_path(__FILE__));
define('BINDUZ_ESSENTIAL_BASE', plugin_basename(BINDUZ_ESSENTIAL_ROOT));


require_once(BINDUZ_ESSENTIAL_DIR_PATH . '/boot.php');

register_activation_hook(__FILE__, 'binduz_essential_flush_rewrites');
function binduz_essential_flush_rewrites()
{
	flush_rewrite_rules();
}
