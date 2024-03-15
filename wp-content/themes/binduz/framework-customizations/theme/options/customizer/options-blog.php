<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title' => esc_html__( 'Blog settings', 'binduz' ),

        'options'	 => [

            'blog_sidebar' =>[
                'type' => 'select',
                              
                'label'   => esc_html__('Sidebar', 'binduz'),
                'desc'    => esc_html__('Description', 'binduz'),
                'help'    => esc_html__('Blog and Page sidebar ', 'binduz'),
                'choices' => array(
                    '1' => esc_html__('No sidebar', 'binduz'),
                    '2' => esc_html__('Left Sidebar', 'binduz'),
                    '3' => esc_html__('Right Sidebar', 'binduz'),
                 
                 ),
              
                'no-validate' => false,
            ],

            'blog_style' =>[
                'label'   => esc_html__( 'Blog style', 'binduz' ),
                'desc'    => esc_html__( 'This is the site\'s main Blog style.', 'binduz' ),
                'type'    => 'image-picker',
                'value'   => 'style1',
                'choices' => [
                   
                    'style1'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style1.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style1.png',
                     ],
            
                    'style2'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style2.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style2.png',
                    ],
            
                    'style3'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style3.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style3.png',
                    ],
            
                   'style4'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style4.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style4.png',
                    ],
        
                    'style5'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style5.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style5.png',
                    ],
        
                    'style6'    => [
                        'small'     => BINDUZ_IMG . '/admin/blog-category/style6.png',
                        'large'     => BINDUZ_IMG . '/admin/blog-category/style6.png',
                    ],
            
                    
                  
                ],
            ], 

            'blog_column' => [
                'type'  => 'select',
                'value' => 'col-lg-12 col-md-6 col-sm-12',
               
                'label' => esc_html__('Column Width', 'binduz'),
             
                'choices' => array(
                    'col-lg-12 col-md-6 col-sm-12' => esc_html__('Full ', 'binduz'),
                    'col-lg-6 col-md-6 col-sm-12' => esc_html__('2 Columns', 'binduz'),
                    'col-lg-4 col-md-4 col-sm-12' => esc_html__('3 Columns', 'binduz'),
                ),
               
            
            ],
            
            
            'blog_image_size' => [
                'type'  => 'select',
                'value' => 'full',
                'label' => esc_html__('Image Size', 'binduz'),
                'choices' => binduz_get_all_image_sizes_option()
            ],
         
    
            'blog_breadcrumb' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Breadcrumb', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show breadcrumb?', 'binduz' ),
                'value'       => 'yes',
                'left-choice' => [
                    'value' => 'yes',
                    'label' => esc_html__( 'Yes', 'binduz' ),
                ],
                'right-choice'	 => [
                    'value' => 'no',
                    'label' => esc_html__( 'No', 'binduz' ),
                ],
            ],
            'blog_author' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog author', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog author?', 'binduz' ),
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
            'blog_author_image' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog author image', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog author image?', 'binduz' ),
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
            'blog_date' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog date', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog date?', 'binduz' ),
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
            'blog_category' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Category', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog category?', 'binduz' ),
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
           
            'blog_category_single' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog single category', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog single?', 'binduz' ),
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

            'blog_comment' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Comment', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog comment?', 'binduz' ),
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

            'blog_readmore' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Readmore', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog readmore button?', 'binduz' ),
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
            
            'blog_read_more_text' => [
                'label' => esc_html__( 'Readmore Button text', 'binduz' ),
                'desc'  => esc_html__( 'Readmore button text in blog, category', 'binduz' ),
                'type'  => 'text',
                'value' => esc_html__('Read More','binduz')
            ],
            
              'blog_child_cat_show' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Post child category', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show post child category?', 'binduz' ),
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
            
              'blog_author_avatar_show' => [
                  'type'        => 'switch',
                  'label'       => esc_html__( 'Author image show', 'binduz' ),
                  'desc'        => esc_html__( 'Do you want to show author avatar image?', 'binduz' ),
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
   
        
    
            'blog_crop_title'      => [
                'type'   => 'multi-picker',
                'picker' => [
                    'block_crop_title_switch'      => [
                        'type'        => 'switch',
                        'value'       => 'no',
                        'label'       => esc_html__('Post title length', 'binduz'),
                        'desc'        => esc_html__('Enable disable post title length.', 'binduz'),
                        'left-choice' => [
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'binduz' ),
                        ],
                        'right-choice' => [
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'binduz' ),
                        ],
                    ],
                ],
                'choices' => [
                    'yes' => [
                        'block_crop_title_limit'	 => [
                            'type'  => 'text',
                            'label' => esc_html__( 'Post title limit.', 'binduz' ),
                            'desc'  => esc_html__('Post title limit, example: 10', 'binduz'),
                            'value' => 10
                        ],
                    ]
                ]
            ], // 
              
            'blog_crop_desc'      => [
                  'type'   => 'multi-picker',
                  'picker' => [
                      'block_crop_desc_switch'      => [
                          'type'        => 'switch',
                          'value'       => 'no',
                          'label'       => esc_html__('Post word length', 'binduz'),
                          'desc'        => esc_html__('Enable disable  post word length.', 'binduz'),
                          'left-choice' => [
                              'value' => 'yes',
                              'label' => esc_html__( 'Yes', 'binduz' ),
                          ],
                          'right-choice' => [
                              'value' => 'no',
                              'label' => esc_html__( 'No', 'binduz' ),
                          ],
                      ],
                  ],
                  'choices' => [
                      'yes' => [
                          'block_crop_desc_limit'	 => [
                              'type'  => 'text',
                              'label' => esc_html__( 'Post word limit.', 'binduz' ),
                              'desc'  => esc_html__('Post word limit, example: 100', 'binduz'),
                              'value' => 35
                          ],
                      ]
                  ]
              ], //
              'blog_archive' =>[
                'type' => 'popup',
               
                'label'         => __('Blog Archive Settings', 'binduz'),
                'desc'          => __('Blog archive page settings', 'binduz'),
                'popup-title'   => __('Blog Archive', 'binduz'),
                'button'        => __('Edit', 'binduz'),
                'size'          => 'small',                                       // small, medium, large
                'popup-options' => array(
                    'show_archive_title' => array(
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Show title', 'binduz' ),
                        'desc'        => esc_html__( 'Do you want to show archive title?', 'binduz' ),
                        'value'       => 'yes',
                        'left-choice' => [
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'binduz' ),
                        ],
                        'right-choice' => [
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'binduz' ),
                        ],
                        
                    ),
                    'show_archive_month' => array(
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Show Month', 'binduz' ),
                        'desc'        => esc_html__( 'Do you want to show archive month filter option?', 'binduz' ),
                        'value'       => 'yes',
                        'left-choice' => [
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'binduz' ),
                        ],
                        'right-choice' => [
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'binduz' ),
                        ],
                        
                    ),
                    'show_archive_year' => array(
                        'type'        => 'switch',
                        'label'       => esc_html__( 'Show Year', 'binduz' ),
                        'desc'        => esc_html__( 'Do you want to show archive year filter option?', 'binduz' ),
                        'value'       => 'yes',
                        'left-choice' => [
                            'value' => 'yes',
                            'label' => esc_html__( 'Yes', 'binduz' ),
                        ],
                        'right-choice' => [
                            'value' => 'no',
                            'label' => esc_html__( 'No', 'binduz' ),
                        ],
                        
                    ),
                ),
            ] //
        ],
            
        ]
    ];