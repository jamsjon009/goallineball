<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */
 $header_footer_url = admin_url( 'edit.php?post_type=qheader-footer' );

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Page settings', 'binduz' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			
			 'style_container_width' => [
				'type'  => 'text',
				'label' => esc_html__('Container width', 'binduz'),
				'desc'  => esc_html__( 'Site\'s Page Container Width in Pixel.', 'binduz' ),
			 
			 ],
			 
			 'style_body_bg' => [
				'label' => esc_html__( 'Body background', 'binduz' ),
				'desc'  => esc_html__( 'Site\'s main background color.', 'binduz' ),
				'type'  => 'color-picker',
			 ], 

			'page_header_override' => [
				'type'			 => 'switch',
				'label'			 => esc_html__( 'Override default header layout?', 'binduz' ),
				'desc'          => esc_html__('Override customizer header layout', 'binduz'),
				'value'         => 'no',
				'left-choice'	 => [
					'value'	 => 'yes',
					'label'	 => esc_html__( 'Yes', 'binduz' ),
				],
				'right-choice'	 => [
					'value'	 => 'no',
					'label'	 => esc_html__( 'No', 'binduz' ),
				],
			 ],
			
			 'page_header_layout_style' => [
				'label'	        => esc_html__( 'Header style', 'binduz' ),
				'desc'	        => esc_html__( 'This is the site\'s single page header style.', 'binduz' ),
				'type'	        => 'image-picker',
				'choices'       => [
				 
					'style1'    => [
						'small' => BINDUZ_IMG . '/admin/headers/style1.png',
						'large' => BINDUZ_IMG . '/admin/headers/style1.png',
					],
				   
					'style2'    => [
						'small' => BINDUZ_IMG . '/admin/headers/style2.png',
						'large' => BINDUZ_IMG . '/admin/headers/style2.png',
					],

					'style3'    => [
						'small' => BINDUZ_IMG . '/admin/headers/style3.png',
						'large' => BINDUZ_IMG . '/admin/headers/style3.png',
					],

					'style4'    => [
						'small' => BINDUZ_IMG . '/admin/headers/style4.png',
						'large' => BINDUZ_IMG . '/admin/headers/style4.png',
					],

				],
				'value'         => 'style1',
			 ], //Header style*/

			 
			'header_ad' => [

				'type'        => 'switch',
				'label'       => esc_html__( 'Header Ad', 'binduz' ),
				'desc'        => esc_html__( 'Would you like to enable header Ad', 'binduz' ),
				'value'       => 'yes',
				'left-choice' => [
				   'value' => 'yes',
				   'label' => esc_html__('Yes', 'binduz'),
				],
				'right-choice'	 => [
				   'value' => 'no',
				   'label' => esc_html__('No', 'binduz'),
				],

			],

			 'newsticker_nav_enable' => [

				'type'        => 'switch',
				'label'       => esc_html__( 'Newsticker Navigation', 'binduz' ),
				'desc'        => esc_html__( 'Would you like to enable newsticker navigation?', 'binduz' ),
				'value'       => 'yes',
				'left-choice' => [
				   'value' => 'yes',
				   'label' => esc_html__('Yes', 'binduz'),
				],
				'right-choice'	 => [
				   'value' => 'no',
				   'label' => esc_html__('No', 'binduz'),
				],

			],

             
		
     
         
		),
	),
);
