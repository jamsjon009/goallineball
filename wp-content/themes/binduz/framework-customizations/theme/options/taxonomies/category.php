<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

$options = [
    
   
    'override_default'	 => [
        'type'	 => 'switch',
        'value'	 => 'no',
        'label'	 => esc_html__( 'Override default layouts?', 'binduz' ),
        'desc'	 => esc_html__( 'You can change the default options from customizer\'s "Blog settings".', 'binduz' ),
        'left-choice' => [
            'value' => 'yes',
            'label' => esc_html__( 'Yes', 'binduz' ),
        ],
        'right-choice' => [
            'value' => 'no',
            'label' => esc_html__( 'No', 'binduz' ),
        ],
    ],

    'blog_style' =>[
        'label'   => esc_html__( 'Blog style', 'binduz' ),
        'desc'    => esc_html__( 'This is the site\'s main Category style.', 'binduz' ),
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
 
    
];