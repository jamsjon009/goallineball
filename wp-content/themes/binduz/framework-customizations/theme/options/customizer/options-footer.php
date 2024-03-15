<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Footer
 */

$options =[
    'footer_settings' => [
        'title' => esc_html__( 'Footer settings', 'binduz' ),

        'options'	 => [

            'footer_style' =>[
                'label'   => esc_html__( 'Footer style', 'binduz' ),
                'desc'    => esc_html__( 'This is the site\'s main footer style.', 'binduz' ),
                'type'    => 'image-picker',
                'value'   => 'default',
                'choices' => [
                   
                    'default'    => [
                        'small'     => BINDUZ_IMG . '/admin/footers/default.png',
                        'large'     => BINDUZ_IMG . '/admin/footers/default.png',
                     ],

                   
                ],
            ], 

         
          
            'footer_widget_title_color' => [
                'label' => esc_html__( 'Widget title color', 'binduz'),
                'type'  => 'color-picker',
               
                'desc' => esc_html__( 'You can change the footer background color with rgba color or solid color', 'binduz'),
            ],
            'footer_text_color' => [
                'label' => esc_html__( 'Text color', 'binduz'),
                'type'  => 'color-picker',
               
                'desc' => esc_html__( 'You can change the footer background color with rgba color or solid color', 'binduz'),
            ],
            'footer_bg_img' => [
               'label'       => esc_html__( 'Background image', 'binduz'),
               'type'        => 'upload',
               'desc'        => esc_html__( 'You can change the footer background image ', 'binduz'),
               'images_only' => true,
               'files_ext'   => array( 'jpeg', 'png', 'jpg' ),
            ],
                       

            'footer_bg_color' => [
                'label' => esc_html__( 'Background color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the footer background color with rgba color or solid color', 'binduz'),
            ],
         

            'footer_padding_top' => [
                'type'       => 'slider',
                'properties' => array(
                    
                    'min'  => 0,
                    'max'  => 500,
                    'step' => 1,
                    
                ),
                'label' => esc_html__('Footer Padding top', 'binduz'),
            ],

             'footer_padding_bottom' => [
                'type' => 'slider',
               
                'properties' => array(
                    
                    'min'  => 0,
                    'max'  => 500,
                    'step' => 1,
                    
                ),

                'label' => esc_html__('Footer Padding bottom', 'binduz'),
                
            ],

            'footer_widget_title_label'=>array(
                'type'  => 'html',
                'label' => esc_html__('Widget Title', 'binduz'),
               'html'  => esc_html__('Change Widget Title position','binduz'),
              
            ),

            'footer_widget_title_margin_bottom' => [
                'type' => 'slider',
               
                'properties' => array(
                    
                    'min'  => 0,
                    'max'  => 300,
                    'step' => 1,
                    
                ),
                'label' => esc_html__('Widget title bottom', 'binduz'),
                
            ],

            'footer_widget_title_margin_top' => [
                'type' => 'slider',
                'properties' => array(
                    
                    'min'  => 0,
                    'max'  => 300,
                    'step' => 1,
                    
                ),
                'label' => esc_html__('Widget title top', 'binduz'),
                
            ],

           
            'footer_copyright_color' => [
                'label' => esc_html__( 'Copyright color', 'binduz'),
                'type'  => 'color-picker',
                'value' => '#999999',
                'desc'  => esc_html__( 'You can change the footer\'s copyright color with rgba color or solid color', 'binduz'),
            ],

            'footer_copyright_bg_color' => [
                'label' => esc_html__( 'Copyright bgcolor', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the footer\'s copyright color with rgba color or solid color', 'binduz'),
            ],
         
            'footer_copyright_link_color' => [
                'label' => esc_html__( 'Copyright link color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the copy right link color with rgba color or solid color', 'binduz'),
            ],
         
            'footer_copyright'	 => [
                'type'  => 'textarea',
                'value' => esc_html__('&copy; 2022, Binduz. All Rights Reserved.','binduz'),
                'label' => esc_html__( 'Copyright text', 'binduz' ),
                'desc'  => esc_html__( 'This text will be shown at the footer of all pages.', 'binduz' ),
            ],

            'footer_copyright_font_size' => [
                'type' => 'slider',
               
                'properties' => array(
                    
                    'min'  => 0,
                    'max'  => 30,
                    'step' => 1,
                    
                ),
                'label' => esc_html__('Copyright Font size', 'binduz'),
            ],

            'footer_en_back_button' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Back To Top', 'binduz' ),
                'value'       => 'no',
                'left-choice' => [
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'binduz' ),
                ],
                'right-choice' => [
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'binduz' ),
                ],
            ],

            'footer_back_to_top'	 => [
                'type'  => 'text',
                'value' => esc_html__('Back To Top','binduz'),
                'label' => esc_html__( 'Back Button', 'binduz' ),
            ],
   
            
        ],
            
        ]
    ];