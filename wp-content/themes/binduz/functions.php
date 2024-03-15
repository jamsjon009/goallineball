<?php
/*----------------------------------------------------
LOAD COMPOSER PSR - 4
-----------------------------------------------------*/
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) :
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

/*----------------------------------------------------
SHORTHAND CONTANTS FOR THEME VERSION
-----------------------------------------------------*/
define('BINDUZ_VERSION', '1.1.0');

/*----------------------------------------------------
SHORTHAND CONTANTS FOR THEME ASSETS URL
-----------------------------------------------------*/
define('BINDUZ_THEME_URI', get_template_directory_uri());

if (!defined('BINDUZ_IMG')) {
    define('BINDUZ_IMG', BINDUZ_THEME_URI . '/assets/img');
}

define('BINDUZ_CSS', BINDUZ_THEME_URI . '/assets/css');
define('BINDUZ_JS', BINDUZ_THEME_URI . '/assets/js');

/*----------------------------------------------------
SHORTHAND CONTANTS FOR THEME ASSETS DIRECTORY PATH
-----------------------------------------------------*/
define('BINDUZ_THEME_DIR', get_template_directory());
define('BINDUZ_IMG_DIR', BINDUZ_THEME_DIR . '/assets/images');
define('BINDUZ_CSS_DIR', BINDUZ_THEME_DIR . '/assets/css');
define('BINDUZ_JS_DIR', BINDUZ_THEME_DIR . '/assets/js');

/*----------------------------------------------------
SET UP THE CONTENT WIDTH VALUE BASED ON THE THEME'S DESIGN
-----------------------------------------------------*/
if (!isset($content_width)) {
    $content_width = 800;
}
if (class_exists('Binduz\\Init')) :
    Binduz\Init::register_services();
endif;

/*----------------------------------------------------
UTILITY
-----------------------------------------------------*/
require_once BINDUZ_THEME_DIR . '/app/Utility/global.php';
require_once BINDUZ_THEME_DIR . '/app/Utility/Helpers.php';
require_once BINDUZ_THEME_DIR . '/app/Utility/template-tags.php';

/*----------------------------------------------------
AJAX LOAD MORE OPTIONS
-----------------------------------------------------*/
require_once BINDUZ_THEME_DIR . '/app/Core/Hook/Ajax.php';

if (file_exists(BINDUZ_THEME_DIR . '/woocommerce/woo-setup.php')) {
    require_once(BINDUZ_THEME_DIR . '/woocommerce/woo-setup.php');
}
