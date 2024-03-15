<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: ads
 */
$options =[
    'blog_ads_settings' => [
            'title'   => esc_html__( 'Advertisement ', 'binduz' ),
            'options' => [
                
                'header_banner' => [
                    'type'          => 'popup',
                    'label'         => 'Header banner',
                    'button'        => esc_html__( 'Header banner', 'binduz' ),
                    'popup-title'   => esc_html__( 'Header banner', 'binduz' ),
                    'size'          => 'medium',
                    'popup-options' => [
                          'ad_enable' => [
                            'type'        => 'switch',
                            'label'       => esc_html__( 'Enable Ad', 'binduz' ),
                            'desc'        => esc_html__( 'Do you want to enable Ad?', 'binduz' ),
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
                         'page_only' => [
                            'type'        => 'switch',
                            'label'       => esc_html__( 'Page Only', 'binduz' ),
                            'desc'        => esc_html__( 'Do you want to page specific?', 'binduz' ),
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
                        'ad_link'	 => [
                            'type'  => 'text',
                            'label' => esc_html__( 'Ads link', 'binduz' ),
                        ],
                        'ad_image' => [
                            'label'      => esc_html__( 'Ads Image', 'binduz' ),
                            'type'       => 'upload',
                            'image_only' => true,
                         ],
                        'ad_html'	 => [
                            'type'  => 'textarea',
                            'label' => esc_html__( 'Ad html', 'binduz' ),
                            'desc'  => esc_html__( 'You can use Adsense code here.', 'binduz' ),
                        ],
                    ]
                ],

                'single_blog_banner' => [
                  'type'          => 'popup',
                  'label'         => 'Single blog Ad one',
                  'button'        => esc_html__( 'Single blog Ad', 'binduz' ),
                  'popup-title'   => esc_html__( 'Single blog Ad', 'binduz' ),
                  'size'          => 'medium',
                  'popup-options' => [
                     'single_ad_enable' => [
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Enable Ad', 'binduz' ),
                        'desc'        => esc_html__( 'Do you want to enable Ad?', 'binduz' ),
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

                    'single_ad_link'	 => [
                     'type'  => 'text',
                     'label' => esc_html__( 'Ad link', 'binduz' ),
                     ],

                    'single_ad_image' => [
                        'label'      => esc_html__( 'Ad Image', 'binduz' ),
                        'type'       => 'upload',
                        'image_only' => true,
                     ], 
                     'single_ad_html'	 => [
                          'type'  => 'textarea',
                          'label' => esc_html__( 'Ad html', 'binduz' ),
                          'desc'  => esc_html__( 'You can use Adsense code here.', 'binduz' ),
                     ],

                     'single_ad_position' => [
                        'type'    => 'select',
                        'value'   => 'after_content',
                        'label'   => esc_html__('Ad position', 'binduz'),
                        'choices' => array(
                           ''               => '---',
                           'before_title'   => esc_html__('Before post title', 'binduz'),
                           'before_content' => esc_html__('Before post content', 'binduz'),
                           'after_content'  => esc_html__('After post content', 'binduz'),
                           'after_tag'      => esc_html__('After post tag', 'binduz'),
                          
                         
                        ),
                      
                     ]


                  ]
              ],

              'single_blog_banner_two' => [
               'type'          => 'popup',
               'label'         => 'Single blog Ad two',
               'button'        => esc_html__( 'Single blog Ad', 'binduz' ),
               'popup-title'   => esc_html__( 'Single blog Ad', 'binduz' ),
               'size'          => 'medium',
               'popup-options' => [
                  'single_ad_enable' => [
                     'type'        => 'switch',
                     'label'       => esc_html__( 'Enable Ad', 'binduz' ),
                     'desc'        => esc_html__( 'Do you want to enable Ad?', 'binduz' ),
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

                 'single_ad_link'	 => [
                  'type'  => 'text',
                  'label' => esc_html__( 'Ad link', 'binduz' ),
                  ],

                 'single_ad_image' => [
                     'label'      => esc_html__( 'Ad Image', 'binduz' ),
                     'type'       => 'upload',
                     'image_only' => true,
                  ], 
                  'single_ad_html'	 => [
                       'type'  => 'textarea',
                       'label' => esc_html__( 'Ad html', 'binduz' ),
                       'desc'  => esc_html__( 'You can use Adsense code here.', 'binduz' ),
                  ],

                  'single_ad_position' => [
                     'type'    => 'select',
                     'value'   => 'after_content',
                     'label'   => esc_html__('Ad position', 'binduz'),
                     'choices' => array(
                        ''               => '---',
                        'before_title'   => esc_html__('Before post title', 'binduz'),
                        'before_content' => esc_html__('Before post content', 'binduz'),
                        'after_content'  => esc_html__('After post content', 'binduz'),
                        'after_tag'      => esc_html__('After post tag', 'binduz'),
                       
                      
                     ),
                   
                  ]


               ]
           ],



            ],
        ],
    ];