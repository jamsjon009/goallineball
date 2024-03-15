<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_single_settings' => [
        'title'   => esc_html__( 'Blog details settings', 'binduz' ),
        'options' => [
            'post_header_layout' => [
                'label'   => esc_html__( 'Post header layout', 'binduz' ),
                'desc'    => esc_html__( 'Single post\'s header style.', 'binduz' ),
                'type'    => 'image-picker',
                'choices' => [

                    'style1'    => [
						'small' => BINDUZ_IMG . '/admin/posts/style1.png',
						'large' => BINDUZ_IMG . '/admin/posts/style1.png',
					 ],
					 'style2'    => [
						  'small' => BINDUZ_IMG . '/admin/posts/style2.png',
						  'large' => BINDUZ_IMG . '/admin/posts/style2.png',
					 ],
                 
                  
                ],
                'value' => 'style1',
            ],
 
            'post_sidebar_layout' =>[
                'type' => 'select',
                'label'   => esc_html__('Sidebar widget', 'binduz'),
                'desc'    => esc_html__('Blog post sidebar layout', 'binduz'),
                'choices' => array(
					
                    '1' => esc_html__('No sidebar', 'binduz'),
                    '3' => esc_html__('Right Sidebar', 'binduz'),
                 
                 ),
              
                'no-validate' => false,
            ],

          

            'post_social_share_show' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Social share', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show social share buttons?', 'binduz' ),
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

            'blog_single_mailchimp' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Mailchimp', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show single blog mailchimp?', 'binduz' ),
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

           'blog_mailchimp_top_title' => [
                'label' => esc_html__( 'Mailchimp Top Title', 'binduz' ),
                'type'  => 'text',
                'value' => esc_html__('Newsletter','binduz'),
            ],

            'blog_mailchimp_title' => [
                'label' => esc_html__( 'Mailchimp Title', 'binduz' ),
                'type'  => 'text',
                'value' => esc_html__('Get every weekly update & insights','binduz'),
            ],
            
           'blog_mailchimp_img' => [
                'label'      => esc_html__( 'Mailchimp Image', 'binduz' ),
                'desc'       => esc_html__( 'It will be shown on any "single post bottom" area.', 'binduz' ),
                'type'       => 'upload',
                'image_only' => true,
            ],
 
            'blog_related_post' => [
                 'type'        => 'switch',
                 'label'       => esc_html__( 'Blog related post', 'binduz' ),
                 'desc'        => esc_html__( 'Do you want to show single blog related post?', 'binduz' ),
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

            'blog_related_post_title' => [
                'label' => esc_html__( 'Related post title', 'binduz' ),
                'type'  => 'text',
                'value' => esc_html__( 'Related post', 'binduz' ),
            ],
    
            'blog_related_post_number' => [
                'label' => esc_html__( 'Related post count', 'binduz' ),
                'type'  => 'text',
                'value' => 3,
            ],
            'blog_related_post_title_limit' => [
                'label' => esc_html__( 'Related post title limit', 'binduz' ),
                'type'  => 'text',
                'value' => 16,
            ],
         
         
            'post_show_view_count' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Post view counter', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show the view counter in posts?', 'binduz' ),
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
            
            'post_show_total_share' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Post share count', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show the view counter in posts?', 'binduz' ),
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

            'blog_single_comment' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Comment', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog Comment?', 'binduz' ),
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
            'blog_single_author' => [
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

            'blog_single_author_image' => [
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

            'blog_single_date' => [
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

            'blog_single_category' => [
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

            'post_navigation_show' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog navigation', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show single blog navigation post?', 'binduz' ),
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
            'post_navigation_title_limit' => [
                'label' => esc_html__( 'Blog navigation title limit', 'binduz' ),
                'type'  => 'text',
                'value' => 50,
            ],
            'blog_single_author_box' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog author about', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog author details box in footer?', 'binduz' ),
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
            'blog_single_comment_box' => [
                'type'        => 'switch',
                'label'       => esc_html__( 'Blog Comment box', 'binduz' ),
                'desc'        => esc_html__( 'Do you want to show blog comment box in footer?', 'binduz' ),
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
          
        ],
            
    ]
];