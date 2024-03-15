<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: newsticker
 */

$options =[
         'newsticker_settings' => [
            'title'   => esc_html__( 'News Ticker settings', 'binduz' ),
            'options' => [
              
               'newsticker_enable' => [
                    'type'        => 'switch',
                    'label'       => esc_html__( 'Newsticker', 'binduz' ),
                    'desc'        => esc_html__( 'Would you like to enable newsticker on topbar?', 'binduz' ),
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

                'newsticker_bg_color' => [

                  'label' => esc_html__( 'Tranding box bg color', 'binduz' ),
                  'desc'  => esc_html__( 'Tranding box bg color.', 'binduz' ),
                  'type'  => 'hidden',

                ],

                'newsticker_title_bg_color' => [

                  'label' => esc_html__( 'Tranding Title bg color', 'binduz' ),
                  'desc'  => esc_html__( 'Tranding box bg color.', 'binduz' ),
                  'type'  => 'hidden',

                ],
              
                'newsticker_title' => [

                     'type'  => 'text',
                     'label' => esc_html__( 'News Ticker title', 'binduz' ),
                     'desc'  => esc_html__( 'News Ticker Title.', 'binduz' ),
                     'value' => esc_html__('Trending','binduz'),

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
            
                'newsticker_post_order_by' => [

                        'type'  => 'select',
                        'value' => 'latest',
                        'label' => esc_html__('Post select by', 'binduz'),
                        'desc'  => esc_html__('Newsticker post source ', 'binduz'),
                       
                        'choices' => [

                           'latest'        => esc_html__('Latest Post', 'binduz'),
                           'trending'      => esc_html__('Trending post', 'binduz'),
                           'mostcommented' => esc_html__('Most Commented', 'binduz'),
                           'mostviews'     => esc_html__('Most Views / Popular', 'binduz'),
                           'category'      => esc_html__('Category', 'binduz'),
                           'selected-post' => esc_html__('Selected post', 'binduz'),
                           
                        ],
                      
               ],

               'newsticker_post_by_choice' => [

                  'type'    => 'multi-picker',
                  'picker'  => 'newsticker_post_order_by',
                  'choices' => array(

                      'category' => array(
                           'newsticker_post_category' => [
                              'type'       => 'multi-select',
                              'label'      => esc_html__('Newsticker post category', 'binduz'),
                              'population' => 'taxonomy',
                              'source'     => 'category',
                              'limit'      => 300,
                           ],
                      ),

                      'selected-post' => array(
                        'newsticker_selected_post' => [
                           'type'       => 'multi-select',
                           'label'      => esc_html__('Selected post', 'binduz'),
                           'population' => 'posts',
                           'source'     => 'post',
                           'limit'      => 300,
                        ],
                   ),
                    
                  )
               ],
              
               'newsticker_post_number' => [
                  'type'       => 'slider',
                  'value'      => 10,
                  'properties' => array(
                     
                     'min'  => 0,
                     'max'  => 300,
                     'step' => 1,     // Set slider step. Always > 0. Could be fractional.
                     
                  ),
                  
                  'label' => esc_html__('Number of post', 'binduz'),
                  'desc'  => esc_html__('Number post to load ', 'binduz'),
                 
               ],

               'newsticker_post_skip' => [
                  'type'       => 'slider',
                  'value'      => 0,
                  'properties' => array(
                     
                     'min'  => 0,
                     'max'  => 300,
                     'step' => 1,     // Set slider step. Always > 0. Could be fractional.
                     
                  ),
                  
                  'label' => esc_html__('Post skip', 'binduz'),
                  'desc'  => esc_html__('Do not show few posts', 'binduz'),
                 
               ],

               'newsticker_post_order' => [

                  'type'    => 'select',
                  'value'   => 'DESC',
                  'label'   => esc_html__('Post order', 'binduz'),
                  'choices' => array(

                      'ASC'  => esc_html__('Ascending', 'binduz'),
                      'DESC' => esc_html__('Descending', 'binduz'),
                     
                  ),
               
               ],

               'newsticker_post_orderby' => [

                  'type'    => 'select',
                  'value'   => 'date',
                  'label'   => esc_html__('Post orderBy', 'binduz'),
                  'choices' => array(

                     'title'        => esc_html__('Title', 'binduz'),
                     'date'         => esc_html__('Date', 'binduz'),
                     'publish_date' => esc_html__('Publish Date', 'binduz'),
                     
                  ),
               
               ],

               'newsticker_post_title_limit' => [
                  'type'       => 'slider',
                  'value'      => 10,
                  'properties' => array(
                     
                     'min'  => 0,
                     'max'  => 300,
                     'step' => 1,     // Set slider step. Always > 0. Could be fractional.
                     
                  ),
                  
                  'label' => esc_html__('Title limit', 'binduz'),
               
                 
               ],

             
         
            ],
        ],
    ];

   
