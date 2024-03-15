<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */
$header_footer_url = admin_url( 'edit.php?post_type=qheader-footer' );
$options =[
    'header_settings' => [
        'title' => esc_html__( 'Header settings', 'binduz' ),

        'options'	 => [
         
            'header_layout_style' => [
                'label'   => esc_html__( 'Header style', 'binduz' ),
                'desc'    => esc_html__( 'This is the site\'s main header style.', 'binduz' ),
                'type'    => 'image-picker',
                'value'   => 'style1',
                'choices' => [
                  
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
               
             ], //Header style
             'mailchimp_shortcode_active' => [

                'type'        => 'switch',
                'label'       => esc_html__( 'Mailchimp active', 'binduz' ),
                'value'       => 'no',
                'left-choice' => [
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'binduz'),
                ],

                'right-choice'	 => [
                   'value' => 'no',
                   'label' => esc_html__('No', 'binduz'),
                ],
             
            ],

            'topbar_show' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show topbar', 'binduz' ),
                'value'       => 'no',
                'left-choice' => [
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'binduz'),
                ],

                'right-choice'	 => [
                   'value' => 'no',
                   'label' => esc_html__('No', 'binduz'),
                  ],
            ],

            'topbar_bg_image'=>array(
                'type'  => 'background-image',
                'value' => 'bg-1',
                'label' => esc_html__('Topbar Background', 'binduz'),
            
                'choices' => array(
                    'none' => array(
                        'icon' => BINDUZ_IMG . '/none-icon-0.jpg',
                        'css'  => array(
                            'background-image' => 'none'
                        ),
                    ),
                    'bg-1' => array(
                        'icon'  => BINDUZ_IMG . '/top-bar-bg.jpg',
                        'css'  => array(
                            'background-image'  => 'url("' . BINDUZ_IMG . '/top-bar-bg.jpg' . '")',
                            'background-repeat' => 'repeat',
                        ),
                    ),
                   
                )

                ),


            'topbar_show_button' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show button', 'binduz' ),
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

            'topbar_subs_button' => array(
                'type'    => 'multi-picker',
                'picker'  => 'topbar_show_button',
                'choices' => array(
                   'yes' => array(

                    'text' => array(
                        'type'  => 'text',
                        'label' => esc_html__('Button Label', 'binduz'),
                     
                     ),
                       
                    'link' => array(
                        'type'  => 'text',
                        'label' => esc_html__('Button Link', 'binduz'),
                     
                     ),
      
                   ),
                )
            ),
           
            'header_show_search' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show Search', 'binduz' ),
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
            'header_show_login' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show user account', 'binduz' ),
                'value'       => 'no',
                'left-choice' => [
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'binduz'),
                ],

                'right-choice'	 => [
                   'value' => 'no',
                   'label' => esc_html__('No', 'binduz'),
                  ],
            ],
            'user_account' => array(
                'type'    => 'multi-picker',
                'picker'  => 'header_show_login',
                'choices' => array(
                   'yes' => array(
                       
                    'login_link' => array(
                        'type'  => 'text',
                        'label' => esc_html__('Login link', 'binduz'),
                     
                     ),
                     
                   ),
                )
            ),

            'header_show_lang' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show multi language', 'binduz' ),
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

            'header_multi_lng_list' =>  array(
                    'type' => 'addable-popup',
                    'label' => __('Language list', 'binduz'),
                    'template' => '{{- title }}',
                    'popup-title' => null,
                    'size' => 'small', // small, medium, large
                    'limit' => 20, // limit the number of popup`s that can be added
                    'add-button-text' => esc_html__('Add', 'binduz'),
                    'sortable' => true,
                    'popup-options' => array(
                        'title' => array(
                            'label' => esc_html__('Lang', 'binduz'),
                            'type' => 'text',
                            'value' => '',
                           
                        ),
                        'url' => array(
                            'label' => esc_html__('Url', 'binduz'),
                            'type' => 'text',
                            'value' => '',
                           
                        ),
                      
                    ),
                ),

            

            'header_show_weather' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Show Weather', 'binduz' ),
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

        
             
            'weather_forcast'=>array(
                'type' => 'popup',
              
                'label' => esc_html__('Weather Forcast Settings', 'binduz'),
                
                'popup-title'   => esc_html__('Weather Forcast Settings', 'binduz'),
                'button'        => esc_html__('Weather', 'binduz'),
                'popup-title'   => null,
                'size'          => 'small',                                             // small, medium, large
                'popup-options' => array(

                    'data_source' => [
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Data Source', 'binduz' ),
                        'value'       => 'yes',
                        'left-choice' => [
                            'value' => 'city_id',
                            'label' => esc_html__('City name', 'binduz'),
                            
                        ],
        
                        'right-choice'	 => [
                           'value' => 'coordinate',
                           'label' => esc_html__('Cordinates', 'binduz'),
                          ],
                    ],
                    'city_name' => array(
                        'label' => esc_html__('City name', 'binduz'),
                        'type'  => 'text',
                        'value' => esc_html__('london','binduz'),
                        'desc'  => binduz_kses('To get city name <a target="_blank" href="https://openweathermap.org/find?q">Find city</a> .'),
                         
                    ),
                  
                    'coordinates_lat'=>array(
                        'type'  => 'text',
                        'label' => esc_html__('Map Latitude ', 'binduz'),
                      
                    ),
                    'coordinates_lon'=>array(
                        'type'  => 'text',
                        'label' => esc_html__('Map Longitude ', 'binduz'),
                      
                    ), 
                    'weather_cache_enable' => [
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Cache enable', 'binduz' ),
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
            ) 
           
             
        
        ], //Options end
    ]
];