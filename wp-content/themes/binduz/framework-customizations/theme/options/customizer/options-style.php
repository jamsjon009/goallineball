<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */
$options =[
    'style_settings' => [
            'title'		 => esc_html__( 'Style settings', 'binduz' ),
            'options'	 => [
                'style_container_width' => array(
                    'type'  => 'text',
                    'label' => esc_html__('Container width', 'binduz'),
                    'desc'  => esc_html__( 'Site\'s Main Container Width in Pixel.', 'binduz' ),
                 
                 ),
                'style_body_bg' => [
                    'label' => esc_html__( 'Body background', 'binduz' ),
                    'desc'  => esc_html__( 'Site\'s main background color.', 'binduz' ),
                    'type'  => 'color-picker',
                    'value' => '#f8f8f8'
                 ],

                 'blog_main_section' => [
                    'label' => esc_html__( 'Blog background', 'binduz' ),
                    'desc'  => esc_html__( 'Site\'s main blog,catyegory background color.', 'binduz' ),
                    'type'  => 'color-picker',
                   
                 ],

                'style_primary' => [
                    'label' => esc_html__( 'Primary color', 'binduz' ),
                    'desc'  => esc_html__( 'Site\'s main color.', 'binduz' ),
                    'type'  => 'color-picker',
                ],

                'blog_meta_color' => [
                    'label' => esc_html__( 'Meta color', 'binduz' ),
                    'desc'  => esc_html__( 'Site\'s blog meta color.', 'binduz' ),
                    'type'  => 'color-picker',
                ],

                'blog_meta_icon_color' => [
                    'label' => esc_html__( 'Meta icon color', 'binduz' ),
                    'desc'  => esc_html__( 'Site\'s blog meta icon color.', 'binduz' ),
                    'type'  => 'color-picker',
                ],
                
                'title_color' => [
                    'label'	        => esc_html__( 'Title color', 'binduz' ),
                    'desc'	        => esc_html__( 'Blog title color.', 'binduz' ),
                    'type'	        => 'color-picker',
                ],

                'body_font'    => array(
                    'type' => 'typography-v2',
                    'label' => esc_html__('Body Font', 'binduz'),
                    'desc'  => esc_html__('Choose the typography for the title', 'binduz'),
                    'value' => array(
                        'family'      => '',
                        'size'        => '16',
                        'font-weight' => '400',
                    ),
                    'components' => array(
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ),
                ),
                
                'heading_font_one'	 => [
                    'type'		 => 'typography-v2',
                    'value'		 => [
                        'family'  => '',
                        'size'    => '',
                        
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H1 and H2 Fonts', 'binduz' ),
                    'desc'		 => esc_html__( 'This is for heading google fonts', 'binduz' ),
                ],

                'heading_font_two'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'	  => '',
                        'size'        => '',
                        
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H3 Fonts', 'binduz' ),
                    'desc'		 => esc_html__( 'This is for heading google fonts', 'binduz' ),
                ],

                'heading_font_three'	 => [
                    'type'		    => 'typography-v2',
                    'value'		 => [
                        'family'	  => '',
                        'size'        => '',
                        
                    ],
                    'components' => [
                        'family'         => true,
                        'size'           => true,
                        'line-height'    => false,
                        'letter-spacing' => false,
                        'color'          => false,
                        'font-weight'    => true,
                    ],
                    'label'		 => esc_html__( 'Heading H4 Fonts', 'binduz' ),
                    'desc'		 => esc_html__( 'This is for heading google fonts', 'binduz' ),
                ],

            
            
            ],
        ],
    ];