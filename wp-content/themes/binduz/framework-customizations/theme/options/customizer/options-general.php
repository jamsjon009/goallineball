<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'general_settings' => [
            'title'   => esc_html__( 'General settings', 'binduz' ),
            'options' => [
                
                'shop_product_columns' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Shop Product Columns', 'binduz' ),
                    'desc'  => esc_html__( 'Shop Product Columns', 'binduz' ),
                    'value' => 3,
                ],

                'general_text_logo' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Logo text', 'binduz' ),
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

                'general_main_logo' => [
                    'label'      => esc_html__( 'Main logo', 'binduz' ),
                    'desc'       => esc_html__( 'It\'s the main logo, mostly it will be shown on "dark or coloreful" type area.', 'binduz' ),
                    'type'       => 'upload',
                    'image_only' => true,
                 ],

                'general_dark_logo' => [
                    'label'      => esc_html__( 'Color logo', 'binduz' ),
                    'desc'       => esc_html__( 'It will be shown on any "color background" type area.', 'binduz' ),
                    'type'       => 'upload',
                    'image_only' => true,
                 ],

                 'general_footer_logo' => [
                    'label'      => esc_html__( 'Footer logo', 'binduz' ),
                    'desc'       => esc_html__( 'It will be shown on any "Footer secction" type area.', 'binduz' ),
                    'type'       => 'upload',
                    'image_only' => true,
                 ],

                 'general_search_logo' => [
                    'label'      => esc_html__( 'Search logo', 'binduz' ),
                    'desc'       => esc_html__( 'It will be shown on any "Search popup section" type area.', 'binduz' ),
                    'type'       => 'upload',
                    'image_only' => true,
                 ],

                 'general_offcanvas_logo' => [
                    'label'      => esc_html__( 'Offcanvas logo', 'binduz' ),
                    'desc'       => esc_html__( 'It will be shown on Mobile menu Area.', 'binduz' ),
                    'type'       => 'upload',
                    'image_only' => true,
                 ],
             
                 'general_about_site' => array(
                    'type'  => 'textarea',
                    'value' => esc_html__('About Site','binduz'),
                    'label' => esc_html__('About', 'binduz'),
                 ),

                 'general_offcanvas_contact_info' => [
                    'type'            => 'addable-popup',
                    'template'        => '{{- title }}',
                    'popup-title'     => null,
                    'label'           => esc_html__( 'Offcanvas Contact info', 'binduz' ),
                    'desc'            => esc_html__( 'Add Contact info and it\'s icon class bellow. These are all fontaweseome-5 icons.', 'binduz' ),
                    'add-button-text' => esc_html__( 'Add new', 'binduz' ),
                    'popup-options'   => [
                      

                        'title' => [
                            'type'  => 'text',
                            'label' => esc_html__( 'Title', 'binduz' ),
                            'value' => esc_html__('+212 34 45 45 98','binduz'),
                        ],
                        'type' => [
                            'type'  => 'select',
                            'value' => '',
                            'label' => esc_html__('Type', 'binduz'),
                            'choices' => array(
                                '' => '---',
                                'email' => esc_html__('Email', 'binduz'),
                                'phone' => esc_html__('Phone', 'binduz'),
                              
                            )
                          
                        
                        ],

                        'icon_class' => [ 
                            'type'  => 'new-icon',
                            'label' => esc_html__( 'Icon', 'binduz' ),
                        ],
                      
                    ],
                   
                ],
                 

                'blog_breadcrumb_length' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Breadcrumb word length', 'binduz' ),
                    'desc'  => esc_html__( 'The length of the breadcumb text.', 'binduz' ),
                    'value' => '3',
                ],
                
                'blog_author_about' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Author about', 'binduz' ),
                    'desc'        => esc_html__( 'Show author about in author page?', 'binduz' ),
                    'value'       => 'yes',
                    'left-choice' => [
                        'value' => 'yes',
                        'label' => esc_html__( 'Yes', 'binduz' ),
                    ],
                    'right-choice' => [
                        'value' => 'no',
                        'label' => esc_html__( 'No', 'binduz' ),
                    ],
                ],

                'general_image_sizes' => [
                    'type'            => 'addable-popup',
                    'template'        => '{{- title }}',
                    'popup-title'     => null,
                    'label'           => esc_html__( 'Image Size', 'binduz' ),
                    'desc'            => esc_html__( 'Add new image size if you need extra image size for theme', 'binduz' ),
                    'add-button-text' => esc_html__( 'Add new', 'binduz' ),
                    'popup-options'   => [
                        'title' => [ 
                            'type'  => 'text',
                            'label' => esc_html__( 'Slug / title', 'binduz' ),
                            'desc'  => esc_html__( 'Do not give space with word', 'binduz' ),
                        ],
                        'width' => [ 
                            'type'       => 'slider',
                            'properties' => array(
                                
                                'min'  => 0,
                                'max'  => 2000,
                                'step' => 1,      // Set slider step. Always > 0. Could be fractional.
                                
                            ),
                            'label' => esc_html__( 'Width', 'binduz' ),
                        ],
                        'height' => [ 
                            'type'       => 'slider',
                            'properties' => array(
                                
                                'min'  => 0,
                                'max'  => 2000,
                                'step' => 1,      // Set slider step. Always > 0. Could be fractional.
                                
                            ),
                            'label' => esc_html__( 'Height', 'binduz' ),
                        ],
                       
                       
                    ],
                   
                ],
                'general_pre_loader' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Preloader', 'binduz' ),
                    'desc'        => esc_html__( 'Use preloader?', 'binduz' ),
                    'value'       => 'yes',
                    'left-choice' => [
                        'value' => 'yes',
                        'label' => esc_html__( 'Yes', 'binduz' ),
                    ],
                    'right-choice' => [
                        'value' => 'no',
                        'label' => esc_html__( 'No', 'binduz' ),
                    ],
               ],

                 
               'general_enable_debug' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Debug', 'binduz' ),
                    'desc'        => esc_html__( 'Use demo Debug?', 'binduz' ),
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

                'general_debug_post_id' => [
                    'type'  => 'text',
                    'label' => esc_html__( 'Debug Post ID', 'binduz' ),
                    'desc'  => esc_html__( 'Post id for developemnt purpose.', 'binduz' ),
                    'value' => '',
                ],

               'general_social_links' => [
                    'type'            => 'addable-popup',
                    'template'        => '{{- title }}',
                    'popup-title'     => null,
                    'label'           => esc_html__( 'Social links', 'binduz' ),
                    'desc'            => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-5 icons.', 'binduz' ),
                    'add-button-text' => esc_html__( 'Add new', 'binduz' ),
                    'popup-options'   => [
                        'title' => [ 
                            'type'  => 'text',
                            'label' => esc_html__( 'Title', 'binduz' ),
                        ],
                        'count' => [ 
                            'type'  => 'text',
                            'label' => esc_html__( 'Count', 'binduz' ),
                        ],
                        'tag' => [ 
                            'type'  => 'text',
                            'label' => esc_html__( 'Tag', 'binduz' ),
                        ],
                        'icon_class' => [ 
                            'type'  => 'new-icon',
                            'label' => esc_html__( 'Social icon', 'binduz' ),
                        ],
                        'url' => [ 
                            'type'  => 'text',
                            'label' => esc_html__( 'Social link', 'binduz' ),
                        ],
                    ],
                   
                ],


                'offcanvas_social_icon_type' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Offcanvas social Icon Type ?', 'binduz' ),
                    'desc'        => esc_html__( 'Use in Offcanvas Menu?', 'binduz' ),
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

                
               'general_editor_social_links' => [
                'type'            => 'addable-popup',
                'template'        => '{{- title }}',
                'popup-title'     => null,
                'label'           => esc_html__( 'Editor Social links', 'binduz' ),
                'desc'            => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-5 icons.', 'binduz' ),
                'add-button-text' => esc_html__( 'Add new', 'binduz' ),
                'popup-options'   => [

                    'title' => [ 
                        'type'  => 'text',
                        'label' => esc_html__( 'Title', 'binduz' ),
                    ],
                   
                    'icon_class' => [ 
                        'type'  => 'new-icon',
                        'label' => esc_html__( 'Social icon', 'binduz' ),
                    ],
                    'url' => [ 
                        'type'  => 'text',
                        'label' => esc_html__( 'Social link', 'binduz' ),
                    ],
                ],
               
              ],


                'general_social_share' => [
                    'type'            => 'addable-popup',
                    'template'        => '{{- social }}',
                    'popup-title'     => null,
                    'label'           => esc_html__( 'Social share', 'binduz' ),
                    'desc'            => esc_html__( 'Add social share and it\'s icon class bellow. These are all fontaweseome-5 icons.', 'binduz' ),
                    'add-button-text' => esc_html__( 'Add new', 'binduz' ),
                    'popup-options'   => [
                      

                        'social' => [
                            'type'  => 'select',
                            'value' => 'facebook',
                           
                            'label'   => esc_html__('Social share', 'binduz'),
                            'choices' => binduz_social_share_list(),
                             
                          
                        ],
                        'icon_class' => [ 
                            'type'  => 'new-icon',
                            'label' => esc_html__( 'Social icon', 'binduz' ),
                        ],
                      
                    ],
                   
                ],

                'facebook_api'=>array(
                    'type'          => 'popup',
                    'label'         => esc_html__('Facebook Api settings', 'binduz'),
                    'popup-title'   => esc_html__('Facebook Api Settings', 'binduz'),
                    'button'        => esc_html__('Facebook', 'binduz'),
                    'popup-title'   => null,
                    'size'          => 'small',                                          // small, medium, large
                    'popup-options' => array(
    
                        'app_id' => array(
                            'label' => esc_html__('App id', 'binduz'),
                            'type'  => 'text',
                            'desc'  => __('To get id open app account in <a href="https://developers.facebook.com/apps/">Facebook</a> .', 'binduz'),
                            'help'  => sprintf("%s \n\n'\"<br/><br/>\n\n",
                            __('To get app id key open app account in <a href="https://developers.facebook.com/apps/">Facebook</a> .', 'binduz')
                               
                            ),
                        ),
                        'secret_code' => array(
                            'label' => esc_html__('Secret code', 'binduz'),
                            'type'  => 'text',
                            'desc'  => __('To get id open app account in <a href="https://developers.facebook.com/apps/">Facebook</a> .', 'binduz'),
                            'help'  => sprintf("%s \n\n'\"<br/><br/>\n\n",
                            __('To get app id key open app account in <a href="https://developers.facebook.com/apps/">Facebook</a> .', 'binduz')
                               
                            ),
                        ),
                      
                    ),
                ) 
            ],
        ],
    ];
