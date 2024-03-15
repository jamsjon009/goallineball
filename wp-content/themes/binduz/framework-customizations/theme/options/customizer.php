<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: binduz_section_{section name}
 */
use Binduz\Plugins\Option_Include as binduz_option_Include;

$options = [
	'binduz_section_theme_settings' => [
		'title'				 => esc_html__( 'Binduz settings', 'binduz' ),
		'options'			 => binduz_option_Include::theme_options(),
		'wp-customizer-args' => [
			'priority' => 1,
		],
	],
];
