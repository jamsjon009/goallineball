<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog comment
 */

$options =[
         'blog_comment_settings' => [
            'title'   => esc_html__( 'Blog Comment settings', 'binduz' ),
            'options' => [
              
               'comment_cookie' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Cookie', 'binduz' ),
                    'desc'        => esc_html__( 'Would you like to enable cookie in comment form?', 'binduz' ),
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
                 
                'comment_url' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Website Url', 'binduz' ),
                    'desc'        => esc_html__( 'Would you like to enable website url field in comment form?', 'binduz' ),
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

               
                'comment_before_note' => [

                     'type'  => 'textarea',
                     'label' => esc_html__( 'Comment Before Note', 'binduz' ),
                     'desc'  => esc_html__( ' Comment field before text ', 'binduz' ),
                     'value' => '',

                ],
                 
                'comment_after_note' => [

                     'type'  => 'textarea',
                     'label' => esc_html__( 'Comment After Note', 'binduz' ),
                     'desc'  => esc_html__( ' Comment after before text ', 'binduz' ),
                     'value' => '',

                ],
   
            ],
        ],
    ];

   
