<?php

final class Binduz_Essential_Elementor_Extension
{
	use \Binduz_Essential\Base\Traits\Helper;
	const   VERSION                   = '1.0.0';
	const   MINIMUM_ELEMENTOR_VERSION = '3.0.15';
	const   MINIMUM_PHP_VERSION       = '7.0';
	public  $service                  = null;
	private static $_instance         = null;

	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function __construct()
	{


		add_action('plugins_loaded', [$this, 'init']);
	}
	public function init()
	{


		load_plugin_textdomain('binduz-essential');
		/*---------------------------------
			Check if Elementor installed and activated
		-----------------------------------*/
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return;
		}

		$this->service = apply_filters('element_ready_pro_service', true);

		/*---------------------------------
			Check for required Elementor version
		----------------------------------*/
		if (!did_action('element_ready_loaded')) {

			add_action('admin_notices', [$this, 'element_ready_load_notice']);
			return;
		}



		/*----------------------------------
			Check for required PHP version
		-----------------------------------*/
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return;
		}

		if (file_exists(dirname(__FILE__) . '/inc/helper_functions.php')) {
			require_once(dirname(__FILE__) . '/inc/helper_functions.php');
		}
		$this->includes();
		/*----------------------------------
			ADD NEW ELEMENTOR CATEGORIES
		------------------------------------*/
		add_action('elementor/init', [$this, 'add_elementor_category']);

		/*----------------------------------
			ADD PLUGIN WIDGETS ACTIONS
		-----------------------------------*/
		add_action('elementor/widgets/register', [$this, 'init_widgets']);

		/*----------------------------------
			ELEMENTOR REGISTER CONTROL
		-----------------------------------*/
		/*add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );*/

		/*----------------------------------
			EDITOR STYLE
		----------------------------------*/
		add_action('elementor/editor/after_enqueue_styles', [$this, 'element_ready_editor_styles']);
		add_action('elementor/editor/after_enqueue_scripts', [$this, 'element_ready_editor_script']);

		/*----------------------------------
			ENQUEUE DEFAULT SCRIPT
		-----------------------------------*/
		add_action('wp_enqueue_scripts', array($this, 'element_ready_default_scripts'));


		/*---------------------------------
			REGISTER FRONTEND SCRIPTS
		----------------------------------*/
		add_action('elementor/frontend/after_register_scripts', [$this, 'element_ready_register_frontend_scripts'], 12);
		add_action('elementor/frontend/after_register_styles', [$this, 'element_ready_register_frontend_styles']);

		/*--------------------------------
			ENQUEUE FRONTEND SCRIPTS
		---------------------------------*/
		add_action('elementor/frontend/after_enqueue_scripts', [$this, 'element_ready_enqueue_frontend_scripts']);
		add_action('elementor/frontend/after_enqueue_styles', [$this, 'element_ready_enqueue_frontend_style']);
	}


	/*******************************
	 * 	ADD ASSETS
	 *******************************/

	public function element_ready_editor_styles()
	{
	}

	/**
	 * Enqueue Default Style and Scripts
	 *
	 * Enqueue custom Scripts required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function element_ready_default_scripts()
	{
	}

	public function element_ready_editor_script()
	{
	}

	/**
	 * Enqueue Widget Scripts
	 *
	 * Enqueue custom Scripts required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function element_ready_enqueue_frontend_scripts()
	{
	}


	/**
	 * Register Widget Scripts
	 *
	 * Register custom scripts required to run Skima Core.
	 *
	 * @since 1.6.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function element_ready_register_frontend_scripts()
	{
		wp_register_script('binduz-er-core', BINDUZ_ESSENTIAL_ROOT_JS . 'elementor.js', array('jquery', 'elementor-frontend'), BINDUZ_ESSENTIAL_VERSION, true);
	}

	/**
	 * Enqueue Widget Styles
	 *
	 * Enqueue custom styles required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */
	public function element_ready_enqueue_frontend_style()
	{
	}

	/**
	 * Register Widget Styles
	 *
	 * Register custom styles required to run Skima Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */

	public function element_ready_register_frontend_styles()
	{
		wp_register_style('er-binduz-news-grid', BINDUZ_ESSENTIAL_ROOT_CSS . 'binduz-news-grid.css');
	}

	/***************************
	 * 	VERSION CHECK
	 * *************************/
	public function element_ready_load_notice()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s"', 'element-ready'),
			'<strong>' . esc_html__('Binduz Essential ', 'element-ready') . '</strong>',
			'<strong>' . esc_html__('Element Ready Lite', 'element-ready') . '</strong>'

		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**************************
	 * 	MISSING NOTICE
	 ***************************/
	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'element-ready'),
			'<strong>' . esc_html__('Element Ready Lite', 'element-ready') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'element-ready') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}



	/****************************
	 * 	PHP VERSION NOTICE
	 ****************************/
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'element-ready'),
			'<strong>' . esc_html__('Binduz Essential', 'element-ready') . '</strong>',
			'<strong>' . esc_html__('PHP', 'element-ready') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/****************************
	 * 	INIT WIDGETS
	 ****************************/
	public function init_widgets()
	{
		$this->element_ready_widgets();
		$this->element_ready_widgets_register();
	}

	public function element_ready_widgets()
	{

		/*
		** Autoload Widget class
		** 
		*/

		$widget_path = BINDUZ_ESSENTIAL_DIR_PATH . "/inc/Widgets";
		$widgets     = element_ready_widgets_class_list($widget_path);

		if (is_array($widgets)) {

			// Register Widgets
			foreach ($widgets as $widget_cls) {

				$cls = '\Binduz_Essential\Widgets' . '\\' . $widget_cls;
				if (class_exists($cls)) :
					\Elementor\Plugin::instance()->widgets_manager->register(new $cls());
				endif;
			}
		}

		$this->widget_modules();
	}

	public function element_ready_get_dir_list($path = 'Widgets')
	{

		$widgets_modules = [];
		$dir_path        = BINDUZ_ESSENTIAL_DIR_PATH . "inc/" . $path;
		$dir             = new \DirectoryIterator($dir_path);

		foreach ($dir as $fileinfo) {

			if ($fileinfo->isDir() && !$fileinfo->isDot()) {
				$widgets_modules[$fileinfo->getFilename()] = $fileinfo->getFilename();
			}
		}

		return apply_filters('er_binduz_widgets_modules', $widgets_modules);
	}

	public function widget_modules()
	{

		$widgets_modules = $this->element_ready_get_dir_list();

		foreach ($widgets_modules as $path => $value) {

			$widget_path = BINDUZ_ESSENTIAL_DIR_PATH . "/inc/Widgets/" . $path;
			$widgets     = element_ready_widgets_class_list($widget_path);

			if (is_array($widgets)) {

				// Register Widgets
				foreach ($widgets as $widget_cls) {

					$cls = '\Binduz_Essential\Widgets' . '\\' . $path . '\\' . $widget_cls;
					\Elementor\Plugin::instance()->widgets_manager->register(new $cls());
				}
			}
		}
	}

	public function element_ready_widgets_register()
	{

		/**
		 * NOTE: If you use ( use \Elementor\Plugin as Plugin; ) you need to set namespace before instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register_widget_type( new Widget_Class() );
		 * and If you use ( namespace Elementor ) No need instansiate in widget register.
		 * Like Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Class() );
		 */
	}

	/******************************
	 * 	INIT CONTROLS
	 ******************************/
	public function init_controls()
	{
		/*---------------------------
			Include Control files
		---------------------------*/
		//require_once( __DIR__ . '/controls/control.php' );

		/*---------------------------
			Register control
		---------------------------*/
		//Plugin::$instance->controls_manager->register_control( 'control-type-', new \Element_Ready_Control() );
	}

	/*******************************
	 * 	ADD CUSTOM CATEGORY
	 *******************************/
	public function add_elementor_category()
	{

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		\Elementor\Plugin::instance()->elements_manager->add_category('binduz-elements', array(
			'title' => esc_html__('Binduz Elements', 'element-ready'),
			'icon'  => 'fa fa-plug',
		), 1);
	}


	/******************************
	 * 	ALL INCLUDES
	 ******************************/
	public function includes()
	{


		if (class_exists('\Binduz_Essential\\Init')) {

			\Binduz_Essential\Init::register_services();
			\Binduz_Essential\Init::register_modules();
		}
	}
}

Binduz_Essential_Elementor_Extension::instance();
