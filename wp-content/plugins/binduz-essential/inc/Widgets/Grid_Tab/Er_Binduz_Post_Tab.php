<?php
namespace Binduz_Essential\Widgets\Grid_Tab;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;

require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php' );

if ( ! defined( 'ABSPATH' ) ) exit;

class Er_Binduz_Post_Tab extends Widget_Base {

   use \Elementor\Element_Ready_Common_Style;
   use \Elementor\Element_ready_common_content;
   use \Elementor\Element_Ready_Box_Style;
	public function get_name() {
		return 'erp-binduz-grid-post-tabs';
	}

	public function get_title() {
		return esc_html__( 'ER Binduz Post tab', 'element-ready' );
	}

	public function get_icon() {
		return "eicon-tabs";
	}

	public function get_categories() {
		return [ 'element-ready-addons' ];
    }
   
    public function get_style_depends(){
            
        return [
            'element-ready-news-grid',
        ];
    }
    
    public function get_script_depends() {
        return [
            'element-ready-core',
        ];
    }

	protected function register_controls() {
        
        $this->start_controls_section(
            'section_layouts_tab',
            [
                'label' => esc_html__('Layout', 'element-ready'),
            ]
        );

            $this->add_control(
                'block_style',
                [
                    'label'   => esc_html__( 'Style', 'element-ready' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'style1',
                    'options' => [
                        'style1' => esc_html__( 'Style 1', 'element-ready' ),
                        'style2' => esc_html__( 'Style 2', 'element-ready' ),
                        'style3' => esc_html__( 'Style 3', 'element-ready' ),
                        'style4' => esc_html__( 'Style 4', 'element-ready' ),
                        'style5' => esc_html__( 'Style 5', 'element-ready' ),
                        'style6' => esc_html__( 'Style 6', 'element-ready' ),
                    ],
                ]
            );
                
            $this->add_control(
                    'ex_show_readmore',
                    [
                    'label'     => esc_html__('Show ReadMore', 'binduz-essential'),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'binduz-essential'),
                    'label_off' => esc_html__('No', 'binduz-essential'),
                    'default'   => '',
                    
                    ]
            );

            $this->add_control(
            'ex_text_readmore',
                    [
                    'label'         => esc_html__( 'ReadMore Text', 'binduz-essential' ),
                    'type'          => Controls_Manager::TEXT,
                    'default'       => 'readmore',
                    ]
            );

       $this->end_controls_section();
       
       $this->start_controls_section(
                'section_heading_tab',
                [
                'label' => esc_html__('Heading', 'element-ready-pro'),
                'condition' => [
                    'block_style' => ['style1','style4','style6']
                ]
                ]
        );

                $this->add_control(
                'news_heading',
                [
                    'label'        => esc_html__( 'Show Heading', 'element-ready' ),
                    'type'         => \Elementor\Controls_Manager::SWITCHER,
                    'label_on'     => esc_html__( 'Show', 'element-ready' ),
                    'label_off'    => esc_html__( 'Hide', 'element-ready' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                ]
                );

                $this->add_control(
                'news_heading_title',
                [
                    'label'   => esc_html__( 'Heading Title', 'element-ready' ),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Default title', 'element-ready' ),
                ]
            );

        
        $this->end_controls_section();

        $this->element_before_psudocode([
            'title' => esc_html__('Heading Shape','element-ready'),
            'slug' => 'post_heading_separetor_box_style',
            'element_name' => 'post_heading_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style1','style6'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-video-post-topbar .binduz-er-video-post-title .binduz-er-title::before,{{WRAPPER}} .binduz-er-trending-news-box .binduz-er-trending-news-topbar .binduz-er-title::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-video-post-topbar .binduz-er-video-post-title .binduz-er-title,{{WRAPPER}} .binduz-er-trending-news-box .binduz-er-trending-news-topbar .binduz-er-title',
         ]);

         $this->text_wrapper_css([
            'title' => esc_html__('Heading','element-ready'),
            'slug' => 'post_heading__box_style',
            'element_name' => 'post_heading_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1','style4','style6'],
             ],
            'selector' => '{{WRAPPER}} .binduz-er-post-heading',
            'hover_selector' => false
         ]);

      $this->start_controls_section(
         'section_tab',
         [
             'label' => esc_html__('Post', 'element-ready'),
         ]
     );
   
            $this->add_control(
                'post_count',
                [
                'label'   => esc_html__( 'Post count', 'element-ready' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => '8',
                ]
            );
            
            $this->add_control(
                'post_title_crop',
                [
                    'label'   => esc_html__( 'Post title crop', 'element-ready' ),
                    'type'    => Controls_Manager::NUMBER,
                    'default' => '50',
                ]
            );    

            $this->add_control(
               'show_post_meta',
               [
                   'label'     => esc_html__('Show Meta', 'element-ready'),
                   'type'      => Controls_Manager::SWITCHER,
                   'label_on'  => esc_html__('Yes', 'element-ready'),
                   'label_off' => esc_html__('No', 'element-ready'),
                   'default'   => 'yes',
               ]
             );
          

            $this->add_control(
                    'show_date',
                    [
                        'label'     => esc_html__('Show Date', 'element-ready'),
                        'type'      => Controls_Manager::SWITCHER,
                        'label_on'  => esc_html__('Yes', 'element-ready'),
                        'label_off' => esc_html__('No', 'element-ready'),
                        'default'   => 'yes',
                    ]
            );

            $this->add_control(
                'show_cat',
                [
                    'label'     => esc_html__('Show Category', 'element-ready'),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'element-ready'),
                    'label_off' => esc_html__('No', 'element-ready'),
                    'default'   => 'no',
                    
                ]
            );

            $this->add_control(
                'show_video',
                [
                    'label'     => esc_html__('Show Video', 'element-ready'),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'element-ready'),
                    'label_off' => esc_html__('No', 'element-ready'),
                    'default'   => 'no',
                    'condition' => [
                        'block_style' => ['style1']
                    ]
                    
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'thumbnail', 
                    'exclude' => [ 'custom' ],
                    'include' => [],
                    'default' => 'thumbnail',
                ]
            );

            $this->add_control(
                'more_options',
                [
                    'label' => esc_html__( 'Middle Post image', 'binduz-essential' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'block_style' => ['style1']
                    ]
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Image_Size::get_type(),
                [
                    'name' => 'full_image_size', 
                    'exclude' => [ 'custom' ],
                    'include' => [],
                    'default' => 'full',
                    'condition' => [
                        'block_style' => ['style1']
                    ]
                ]
            );
       


         $this->end_controls_section();

        
        $this->start_controls_section(
            'section_tab_settings',
            [
                'label' => esc_html__('Tabs Settings', 'element-ready'),
            ]
        );

            $this->add_control(
                'news_tab_menu',
                [
                'label'        => esc_html__( 'Tab Menu', 'element-ready' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Show', 'element-ready' ),
                'label_off'    => esc_html__( 'Hide', 'element-ready' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                ]
            );

           $repeater = new \Elementor\Repeater();

           $repeater->add_control(
                'title', [
                           
                            'label'   => esc_html__( 'Tab title', 'element-ready' ),
                            'type'    => Controls_Manager::TEXT,
                            'default' => 'Latest post',
                ]
            );

            $repeater->add_control(
                'post_format', [
                   
                    'label'   => esc_html__('Select Post Format', 'element-ready'),
                    'type'    => Controls_Manager::SELECT2,
                    'options' => [
                        
                        'post-format-video' => esc_html__( 'Video', 'element-ready' ),
                        'post-format-image' => esc_html__( 'Image', 'element-ready' ),
                        'post-format-audio' => esc_html__( 'Audio', 'element-ready' ),
                    ],
                    'default'     => [],
                    'label_block' => true,
                    'multiple'    => true,
                ]
            );

            $repeater->add_control(
                'post_cats', [
                   
                    'label'     => esc_html__('Select Categories', 'element-ready'),
                    'type'        => Controls_Manager::SELECT2,
                    'options'     => element_ready_get_post_category(),
                    'label_block' => true,
                    'multiple'    => true,
                ]
            );

            $repeater->add_control(
                'post_tags', [
                            'label'       => esc_html__('Select tags', 'element-ready'),
                            'type'        => Controls_Manager::SELECT2,
                            'options'     => element_ready_get_post_tags(),
                            'label_block' => true,
                            'multiple'    => true,
                ]
            );

            $repeater->add_control(
                'post_sortby', [
                    'name'    => 'post_sortby',
                    'label'   => esc_html__( 'Post sort by', 'element-ready' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'latestpost',
                    'options' => 
                        [
                            'latestpost'    => esc_html__( 'Latest posts', 'element-ready' ),
                            'popularposts'  => esc_html__( 'Popular posts', 'element-ready' ),
                            'mostdiscussed' => esc_html__( 'Most discussed', 'element-ready' ),
                            'tranding'      => esc_html__( 'Tranding', 'element-ready' ),
                            
                        ],
                ]
            );
            
            $repeater->add_control(
                'post_order', [
                    'name'    => 'post_order',
                    'label'   => esc_html__( 'Post order', 'element-ready' ),
                    'type'    => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                            'DESC' => esc_html__( 'Descending', 'element-ready' ),
                            'ASC'  => esc_html__( 'Ascending', 'element-ready' ),
                        ],
                ]
            );
            $repeater->add_control(
                'offset_enable', [
                    'label'     => esc_html__( 'Post Skip', 'element-ready' ),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'element-ready'),
                    'label_off' => esc_html__('No', 'element-ready'),
                ]
            );

            $repeater->add_control(
                'offset_item_num', [
                    'label'     => esc_html__( 'Skip post count', 'element-ready' ),
                    'type'      => Controls_Manager::NUMBER,
                    'default'   => '1',
                    'condition' => [ 'offset_enable' => 'yes' ]
                ]
            );


            $this->add_control(
                'element_ready_post_tabs',
                [
                    'label'   => esc_html__('Tabs', 'element-ready'),
                    'type'    => Controls_Manager::REPEATER,
                    'default' => [
                        [
                            'tab_title' => esc_html__('Add Tab', 'element-ready'),
                            'post_cats' => 1,
                        ],
                    ],
                    'fields' => $repeater->get_controls(),
                   
                ]
            );

     $this->end_controls_section();

     $this->content_text([
      'title' => esc_html__('Meta Icon','element-ready'),
      'slug' => '_meta_icons_content',
      'condition' => '',
      'controls' => [
      
          'meta_icon'=> [
            'label'         => esc_html__( 'Meta Icon', 'element-ready' ),
            'type' => \Elementor\Controls_Manager::ICONS,
          ],

  
          'meta_video_icon'=> [
            'label'         => esc_html__( 'Meta Video Icon', 'element-ready' ),
            'type' => \Elementor\Controls_Manager::ICONS,
             'condition' => [
                 'block_style!' => ['style6']
             ]
            
          ],

          'meta_date_icon'=> [
            'label'         => esc_html__( 'Meta Date Icon', 'element-ready' ),
            'type' => \Elementor\Controls_Manager::ICONS,
          ],

         
      ]
   ]);

   $this->box_css(
        array(
        'title' => esc_html__('Tab Menu Wrapper','element-ready'),
        'slug' => 'post_tabwer_menu_wer_style',
        'element_name' => 'post_tabwe_wre_element_ready_',
        'selector' => '{{WRAPPER}} .er-binduz-news-post-nav,{{WRAPPER}} .binduz-er-news-tab-btn,{{WRAPPER}} .binduz-er-video-post-tab,{{WRAPPER}} .binduz-er-news-categories-tab',
        'hover_selector' => false,

        )
    );

    $this->text_wrapper_css(
        array(
        'title' => esc_html__('Tab Menu item','element-ready'),
        'slug' => 'post_tab_menu_r_style',
        'element_name' => 'post_tab__element_ready_',
        'selector' => '{{WRAPPER}} .er-binduz-news-post-nav .nav-link,{{WRAPPER}} .binduz-er-news-tab-btn .nav-link, {{WRAPPER}} .binduz-er-video-post-tab .nav-link,{{WRAPPER}} .binduz-er-news-categories-tab .nav-link',
        'hover_selector' => '{{WRAPPER}} .er-binduz-news-post-nav .nav-link:hover ,{{WRAPPER}} .binduz-er-news-tab-btn .nav-link:hover, {{WRAPPER}} .binduz-er-video-post-tab .nav-link:hover,{{WRAPPER}} .binduz-er-news-categories-tab .nav-link:hover',
        'condition' => [
            'block_style!' => ['style5']
        ]
        )
    );
    
    
    
    $this->text_wrapper_css(
        array(
        'title' => esc_html__('Active Menu item','element-ready'),
        'slug' => 'post_tab_menuactive_r_style',
        'element_name' => 'post_tab_active_element_ready_',
        'selector' => '{{WRAPPER}} .er-binduz-news-post-nav .nav-link.active,{{WRAPPER}} .binduz-er-news-tab-btn .nav-link.active, {{WRAPPER}} .binduz-er-video-post-tab .nav-link.active,{{WRAPPER}} .binduz-er-news-categories-tab .nav-link.active',
        'hover_selector' => false,
        'condition' => [
            'block_style!' => ['style5']
        ]
        )
    );

    $this->text_wrapper_css(
        array(
        'title' => esc_html__('Tab Menu text','element-ready'),
        'slug' => 'post_tabs_menu_sr_style',
        'element_name' => 'post_tab_ss_element_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-trending-news-box .binduz-er-trending-news-topbar ul li a',
        'hover_selector' => false,
        'condition' => [
            'block_style' => ['style6']
        ]
        )
    );

    $this->text_wrapper_css(
        array(
        'title' => esc_html__('Tab Menu item','element-ready'),
        'slug' => 'post_tab_menu_sr_style',
        'element_name' => 'post_tab_s_element_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-post .binduz-er-popular-news-title ul li.nav-item',
        'hover_selector' => false,
        'condition' => [
            'block_style' => ['style5']
        ]
        )
    );
    
     $this->text_wrapper_css(
        array(
        'title' => esc_html__('Active Menu item','element-ready'),
        'slug' => 'post_asatab_menu_sr_style',
        'element_name' => 'post_tab_s_aaelement_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-post .binduz-er-popular-news-title ul .nav-link.active',
        'hover_selector' => false,
        'condition' => [
            'block_style' => ['style5']
        ]
        )
    );

    $this->text_wrapper_css(
        array(
        'title' => esc_html__('Tab Menu link','element-ready'),
        'slug' => 'post_tab_menu_link_sr_style',
        'element_name' => 'post_tab_link_element_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-post .binduz-er-popular-news-title ul li.nav-item a',
        'hover_selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-post .binduz-er-popular-news-title ul li.nav-item:hover',
        'condition' => [
            'block_style' => ['style5']
        ]
        )
    );
    
    $this->box_css(
        array(
        'title' => esc_html__('Tab Content','element-ready'),
        'slug' => 'post_tab_content_r_style',
        'element_name' => 'post_tab_content_element_ready_',
        'selector' => '{{WRAPPER}} .er-binduz-news-tab-content',
        'hover_selector' => false,

        )
    );

   $this->box_css(
        array(
        'title' => esc_html__('Title Wrapper','element-ready'),
        'slug' => 'post_title_wer_style',
        'element_name' => 'post_title_wre_element_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-title.er-news-title-gl',
        'hover_selector' => false,
    
        )
    );

    $this->text_css(
        array(
        'title' => esc_html__('Title','element-ready'),
        'slug' => 'post_title__style',
        'element_name' => 'post_title__element_ready_',
        'selector' => '{{WRAPPER}} .binduz-er-title a',
        'hover_selector' => '{{WRAPPER}} .binduz-er-title a:hover',
    
        )
    );

    $this->box_css(
            array(
            'title' => esc_html__('Category Wrapper','element-ready'),
            'slug' => 'post_cat_wer_style',
            'element_name' => 'post_cat_wre_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-categories',
            'hover_selector' => false,
           
            )
        );
   
     $this->text_wrapper_css(
            array(
               'title' => esc_html__('Category','element-ready'),
               'slug' => 'post_cat_style',
               'element_name' => 'post_cat_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-meta-categories a',
               'hover_selector' => '{{WRAPPER}} .binduz-er-meta-categories a:hover',
               // 'condition' => [
               //    'title_hide' => '',
               // ],
            )
      );

      $this->box_css(
        array(
           'title' => esc_html__('Video Wrapper','element-ready'),
           'slug' => 'postwer_video_style',
           'element_name' => 'postwer_video_element_ready_',
           'selector' => '{{WRAPPER}} .binduz-er-play',
           'hover_selector' => false,
            'condition' => [
                  'block_style' => ['style1'],
               ],
          
        )
     ); 
     
     $this->text_wrapper_css(
        array(
           'title' => esc_html__('Video','element-ready'),
           'slug' => 'post_video_style',
           'element_name' => 'post_video_element_ready_',
           'selector' => '{{WRAPPER}} .binduz-er-video-post-item .binduz-er-trending-news-list-box .binduz-er-thumb .binduz-er-play a',
           'hover_selector' => '{{WRAPPER}} .binduz-er-video-post-item .binduz-er-trending-news-list-box .binduz-er-thumb .binduz-er-play:hover a',
           'condition' => [
            'block_style' => ['style1'],
            ],
    
        )
     ); 
     
     $this->text_wrapper_css(
        array(
           'title' => esc_html__('Video Icon','element-ready'),
           'slug' => 'post_icon_video_style',
           'element_name' => 'post_icon_video_element_ready_',
           'selector' => '{{WRAPPER}} .binduz-er-video-post-item .binduz-er-trending-news-list-box .binduz-er-thumb .binduz-er-play a i',
           'hover_selector' => '{{WRAPPER}} .binduz-er-video-post-item .binduz-er-trending-news-list-box .binduz-er-thumb .binduz-er-play:hover a i',
           'condition' => [
            'block_style' => ['style1'],
         ],
    
        )
     );

     $this->box_css(
        array(

            'title' => esc_html__('Image Wrapper','element-ready'),
            'slug' => '_box_image_box_style',
            'element_name' => '_box_ver_image_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-thumb',
           
        )
     );

     $this->start_controls_section('er_binduz_image_section',
            [
               'label' => esc_html__( 'Image ', 'element-ready-pro' ),
               'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
      );

         $this->add_responsive_control(
            'image_margin',
            [
               'label'      => esc_html__( 'Margin', 'element-ready-pro' ),
               'type'       => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px','%'],
               'selectors'  => [
                  '{{WRAPPER}} .binduz-er-thumb img'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
               ],
            ]
         );

         $this->add_responsive_control(
            'box_image_height',
            [
               'label'      => esc_html__( 'Image height', 'element-ready-pro' ),
               'type'       => Controls_Manager::SLIDER,
               'size_units' => [ 'px','%' ],
               'range'      => [
                  'px' => [
                     'min'  => 0,
                     'max'  => 800,
                     'step' => 1,
                  ],
               
               ],
               
               'selectors' => [
                  '{{WRAPPER}} .binduz-er-thumb img'     => 'height: {{SIZE}}{{UNIT}};',
               
               ],
               
            ]
         );
    
         $this->add_responsive_control(
            'box_image_width',
            [
               'label'      => esc_html__( 'Image width', 'element-ready-pro' ),
               'type'       => Controls_Manager::SLIDER,
               'size_units' => [ 'px','%' ],
               'range'      => [
                  'px' => [
                     'min'  => 0,
                     'max'  => 800,
                     'step' => 1,
                  ],
               
               ],
               'selectors' => [
                  '{{WRAPPER}} .binduz-er-thumb img'     => 'width: {{SIZE}}{{UNIT}};',
                  
               ],
               
            ]
         ); 

         $this->add_responsive_control(
            'box_image_amax_width',
            [
               'label'      => esc_html__( 'Max width', 'element-ready-pro' ),
               'type'       => Controls_Manager::SLIDER,
               'size_units' => [ 'px','%' ],
               'range'      => [
                  'px' => [
                     'min'  => 0,
                     'max'  => 800,
                     'step' => 1,
                  ],
               
               ],
               'selectors' => [
                  '{{WRAPPER}} .binduz-er-thumb img'     => 'max-width: {{SIZE}}{{UNIT}};',
               
               ],
            
            ]
         ); 

         $this->add_responsive_control(
            'img_borders__radius',
            [
               'label'      => esc_html__( 'Image Border radius', 'element-ready-pro' ),
               'type'       => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px'],
               'selectors'  => [
                  
                  '{{WRAPPER}} .binduz-er-thumb img'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
                  
               ],
            ]
         );

      $this->end_controls_section();
      

      $this->box_css(
         array(
            'title' => esc_html__('Date Wrapper','element-ready'),
            'slug' => 'post_datress_style',
            'element_name' => 'post_date_sselement_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-date',
            'hover_selector' => false,
            'condition' => [
                'block_style!'=> ['style5']
            ]
         )
      ); 

      $this->box_css(
        array(
           'title' => esc_html__('Content Box','element-ready'),
           'slug' => 'post_datresss_style',
           'element_name' => 'post_date_sssselement_ready_',
           'selector' => '{{WRAPPER}} .binduz-er-content',
           'hover_selector' => false,
           'condition' => [
               'block_style'=> ['style5']
           ]
        )
     );
      
      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date','element-ready'),
            'slug' => 'post_datre_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-date span,{{WRAPPER}} .binduz-er-content span',
            'hover_selector' => false,
           
         )
      );

      $this->text_wrapper_css(
                array(
                'title' => esc_html__('Date Icon','element-ready'),
                'slug' => 'meta_date_icon_style',
                'element_name' => 'meta_date_icon_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-meta-date i',
                'hover_selector' => false,
                
                )
        );

  
    $this->box_css(
            array(
                'title' => esc_html__('Item','element-ready'),
                'slug' => 'post_item_wer_box_style',
                'element_name' => 'post_item_per_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-latest-news-item , {{WRAPPER}} .binduz-er-trending-news-list-box,{{WRAPPER}} .binduz-er-news-categories-item',
            )
    );

    $this->box_css(
            array(
                'title' => esc_html__('Item Container','element-ready'),
                'slug' => 'post_item_wrapper_box_style',
                'element_name' => 'post_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-video-post.recently-viewed-item, {{WRAPPER}} .binduz-er-trending-news-box',
                'condition' => [
                    'block_style' => ['style4','style6']
                ]
            )
    );

    $this->text_wrapper_css(
        array(
           'title'          => esc_html__('Radmore','element-ready'),
           'slug'           => 'post_readpre_video_style',
           'element_name'   => 'post_readmore_element_ready_',
           'selector'       => '{{WRAPPER}} .b-readmore',
           'hover_selector' => '{{WRAPPER}} .b-readmore:hover',
        )
     );
 
	}

	protected function render( ) {

        $settings   = $this->get_settings();

        $show_cat   = $settings['show_cat'];
        $show_date  = $settings['show_date'];
        $thumbnail_size = $settings['thumbnail_size'];
        $full_image_size = isset($settings['full_image_size_size'])?$settings['full_image_size_size']:'full';
        $post_title_crop = $settings['post_title_crop'];
    
        $post_count         = $settings['post_count'];
        $id                 = $this->get_id();
     
        $element_ready_post_tabs  = $settings['element_ready_post_tabs'];
        $post_tab_count     = count($element_ready_post_tabs);
         
      

    ?>
	<!--TAB WIDGET START-->
  
        <?php if($settings[ 'block_style' ] == 'style1'): ?>
        
            <div class="container">
                <div class="row">
                    <?php if( $settings['news_heading'] =='yes' ): ?>
                        <div class="col-lg-8">
                            <div class="binduz-er-video-post-topbar">
                                <div class="binduz-er-video-post-title">
                                    <h3 class="binduz-er-title binduz-er-post-heading"> <?php echo esc_html( $settings['news_heading_title']); ?> </h3>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                        <?php if( $settings['news_tab_menu'] =='yes' ): ?>
                            <div class="col-lg-<?php echo esc_attr( $settings['news_heading'] =='yes'?'4':'12' ); ?>">
                                <div class="binduz-er-video-post-tab">
                                    <ul class="nav nav-pills justify-content-lg-end justify-content-start" role="tablist">
                                    
                                        <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                            <li  role="presentation" class="nav-item">
                                                <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" id="#<?php echo esc_attr('post-'.$key.'-tab'.$id); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>" role="tab"><?php echo esc_html($tab['title']); ?></a>
                                            </li>
                                        <?php endforeach; ?> 
                                    
                                    </ul>
                                </div>
                            </div>
                    <?php endif; ?>
                </div>
                <div class="tab-content er-binduz-news-tab-content">
                    <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                        <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>">
                            <div class=" row">
                               <?php
                                    $query = array(
                                        'post_type'   => array( 'post' ),
                                        'post_status' => array( 'publish' ),
                                        'orderby'     => 'date',
                                        'order'       => 'DESC',
                                        'numberposts' => $post_count,
                                    ); 


                                    if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                        $query['order']  = $tab_content['post_order'];
                                    }

                                    if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                        
                                        if($tab_content['post_sortby'] == 'mostdiscussed') {
                                                $query['orderby'] = 'comment_count';
                                        }
                                        

                                        if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                                $query['category__in'] = $tab_content['post_cats'];  
                                        }

                                        if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                                $query['tag__in'] = $tab_content['post_tags'];  
                                        }

                                        if($tab_content['post_sortby'] == 'popularposts') {
                                                $query['meta_key'] = 'element_ready_post_views_count';
                                                $query['orderby']  = 'meta_value_num';
                                        } 
                                        
                                        if($tab_content['post_sortby'] == 'share') {
                                                $query['meta_key'] = 'element_ready_most_share_post';
                                                $query['orderby']  = 'meta_value_num';
                                        }

                                        if($tab_content['post_sortby'] == 'tranding') {
                                                $query['meta_query'][] = [
                                                'key'     => '_element_ready_trending',
                                                'value'   => 'yes',
                                                'compare' => '=',
                                                ];
                                        }
                                            
                                    }
                                    if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                        $query['tax_query'] = array(
                                                array(
                                                    'taxonomy' => 'post_format',
                                                    'field'    => 'slug',
                                                    'terms'    => $tab_content['post_format'],
                                                    'operator' => 'IN'
                                                ) 
                                            );

                                    } 

                                    if($tab_content['offset_enable']=='yes') {
                                        $query['offset'] = $tab_content['offset_item_num'];
                                    }

                                    $data = get_posts($query);
                                    $last = count($data)-1;

                                ?> 
                                <?php foreach( $data as $sl => $post ): ?>
                                    <?php if( $sl < 2 ): ?>
                                            <?php if( $sl  == 0 ): ?>
                                            <div class="col-lg-3 col-md-6 order-lg-1 order-1">
                                                <div class="binduz-er-video-post-item">
                                                    <?php endif; ?>
                                                    <div class="binduz-er-trending-news-list-box">
                                                        <?php if(has_post_thumbnail( $post->ID )): ?>
                                                            <div class="binduz-er-thumb">
                                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                                                <?php include('parts/video.php');  ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="binduz-er-content">
                                                            <div class="binduz-er-meta-item">
                                                                <?php include('parts/category2.php');  ?>
                                                                <?php include('parts/date.php');  ?>
                                                            </div>
                                                            <div class="binduz-er-trending-news-list-title">
                                                                <?php include('parts/title.php');  ?>
                                                            </div>
                                                            <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                                <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                            <?php if( $sl == 1 || $last == $sl ): ?>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                    <?php elseif( $sl == 2  ): ?>
                                        <div class="col-lg-6 order-lg-2 order-3">
                                            <div class="binduz-er-video-post-item">
                                                <div class="binduz-er-trending-news-list-box main-item">
                                                    <?php if(has_post_thumbnail( $post->ID )): ?>
                                                        <div class="binduz-er-thumb">
                                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID,$full_image_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                                            <?php include('parts/video.php');  ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="binduz-er-content">
                                                        <div class="binduz-er-meta-item">
                                                            <?php include('parts/category2.php');  ?>
                                                            <?php include('parts/date.php');  ?>
                                                        </div>
                                                        <div class="binduz-er-trending-news-list-title">
                                                        <?php include('parts/title.php');  ?>
                                                        </div>
                                                        <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                            <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php elseif( $sl > 2): ?>
                                        <?php if($sl == 3): ?>
                                            <div class="col-lg-3 col-md-6 order-lg-3 order-2">
                                                <div class="binduz-er-video-post-item">
                                                    <?php endif; ?>
                                                    <div class="binduz-er-trending-news-list-box">
                                                        <?php if(has_post_thumbnail( $post->ID )): ?>
                                                            <div class="binduz-er-thumb">
                                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                                                <?php include('parts/video.php');  ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="binduz-er-content">
                                                            <div class="binduz-er-meta-item">
                                                                <?php include('parts/category2.php');  ?>
                                                                <?php include('parts/date.php');  ?>
                                                            </div>
                                                            <div class="binduz-er-trending-news-list-title">
                                                                <?php include('parts/title.php');  ?>
                                                            </div>
                                                            <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                                <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php if( $sl == 4 || $last == $sl ): ?>
                                                </div>
                                            </div>
                                            <?php break; endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>   
                </div>
            </div>
    
        <?php endif; ?>

    
        <?php if($settings[ 'block_style' ] == 'style2'): ?>
                 
            <div class="binduz-er-trending-news-list">
                <?php if( $settings['news_tab_menu'] =='yes' ): ?>
                    <div class="binduz-er-news-tab-btn d-flex justify-content-md-end justify-content-start">
                        <ul class="nav nav-pills " id="pills-tab" role="tablist">
                            <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                <li  role="presentation" class="nav-item <?php echo esc_attr($key==0?'active':''); ?>">
                                    <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" id="#<?php echo esc_attr('post-'.$key.'-tab'.$id); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>" role="tab" ><?php echo esc_html($tab['title']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="tab-content mt-50 er-binduz-news-tab-content">
                    <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                        <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>">
                            <div class="binduz-er-trending-news-list-item">
                                    <?php
                                        $query = array(
                                            'post_type'   => array( 'post' ),
                                            'post_status' => array( 'publish' ),
                                            'orderby'     => 'date',
                                            'order'       => 'DESC',
                                            'numberposts' => $post_count,
                                        ); 


                                        if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                            $query['order']  = $tab_content['post_order'];
                                        }

                                        if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                            
                                            if($tab_content['post_sortby'] == 'mostdiscussed') {
                                                    $query['orderby'] = 'comment_count';
                                            }
                                            

                                            if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                                    $query['category__in'] = $tab_content['post_cats'];  
                                            }

                                            if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                                    $query['tag__in'] = $tab_content['post_tags'];  
                                            }

                                            if($tab_content['post_sortby'] == 'popularposts') {
                                                    $query['meta_key'] = 'element_ready_post_views_count';
                                                    $query['orderby']  = 'meta_value_num';
                                            } 
                                            
                                            if($tab_content['post_sortby'] == 'share') {
                                                    $query['meta_key'] = 'element_ready_most_share_post';
                                                    $query['orderby']  = 'meta_value_num';
                                            }

                                            if($tab_content['post_sortby'] == 'tranding') {
                                                    $query['meta_query'][] = [
                                                    'key'     => '_element_ready_trending',
                                                    'value'   => 'yes',
                                                    'compare' => '=',
                                                    ];
                                            }
                                                
                                        }
                                        if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                            $query['tax_query'] = array(
                                                    array(
                                                        'taxonomy' => 'post_format',
                                                        'field'    => 'slug',
                                                        'terms'    => $tab_content['post_format'],
                                                        'operator' => 'IN'
                                                    ) 
                                                );

                                        } 

                                        if($tab_content['offset_enable']=='yes') {
                                            $query['offset'] = $tab_content['offset_item_num'];
                                        }

                                        $data = get_posts($query);
                                        $last = count($data)-1;

                                    ?> 
                                    <?php foreach( $data as $sl => $post ): ?>
                                        <div class="binduz-er-trending-news-list-box">
                                            <?php if(has_post_thumbnail( $post->ID  )): ?>
                                            <div class="binduz-er-thumb">
                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                            </div>
                                            <?php endif; ?>
                                            <div class="binduz-er-content">
                                                <div class="binduz-er-meta-item">
                                                <?php include('parts/category2.php');  ?>
                                                <?php include('parts/date.php');  ?>
                                                </div>
                                                <div class="binduz-er-trending-news-list-title">
                                                    <?php include('parts/title.php');  ?>
                                                </div>
                                                <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                    <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>   
                            </div>
                        </div>
                    <?php endforeach; ?>   
                </div> <!-- </div> end tab-content -->
            </div>
        <?php endif; ?>

        <?php if( $settings['block_style'] == 'style3' ): ?>
      
                <div class=" container">
                    <div class="row">
                        <div class=" col-lg-12">

                            <?php if( $settings['news_tab_menu'] =='yes' ): ?>

                                <div class="binduz-er-news-categories-tab">
                                    <ul class="nav nav-pills justify-content-center" role="tablist">
                                        <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                            <li  role="presentation" class="nav-item ">
                                                <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>" role="tab" ><?php echo esc_html($tab['title']); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                            <?php endif; ?>
                            <div class="tab-content er-binduz-news-tab-content">
                                <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                                    <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>" role="tabpanel" >
                                        <div class="binduz-er-news-categories-box">
                                            <div class="row">
                                                <?php
                                                    $query = array(
                                                        'post_type'   => array( 'post' ),
                                                        'post_status' => array( 'publish' ),
                                                        'orderby'     => 'date',
                                                        'order'       => 'DESC',
                                                        'numberposts' => $post_count,
                                                    ); 


                                                    if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                                        $query['order']  = $tab_content['post_order'];
                                                    }

                                                    if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                                        
                                                        if($tab_content['post_sortby'] == 'mostdiscussed') {
                                                                $query['orderby'] = 'comment_count';
                                                        }
                                                        

                                                        if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                                                $query['category__in'] = $tab_content['post_cats'];  
                                                        }

                                                        if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                                                $query['tag__in'] = $tab_content['post_tags'];  
                                                        }

                                                        if($tab_content['post_sortby'] == 'popularposts') {
                                                                $query['meta_key'] = 'element_ready_post_views_count';
                                                                $query['orderby']  = 'meta_value_num';
                                                        } 
                                                        
                                                        if($tab_content['post_sortby'] == 'share') {
                                                                $query['meta_key'] = 'element_ready_most_share_post';
                                                                $query['orderby']  = 'meta_value_num';
                                                        }

                                                        if($tab_content['post_sortby'] == 'tranding') {
                                                                $query['meta_query'][] = [
                                                                'key'     => '_element_ready_trending',
                                                                'value'   => 'yes',
                                                                'compare' => '=',
                                                                ];
                                                        }
                                                            
                                                    }
                                                    if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                                        $query['tax_query'] = array(
                                                                array(
                                                                    'taxonomy' => 'post_format',
                                                                    'field'    => 'slug',
                                                                    'terms'    => $tab_content['post_format'],
                                                                    'operator' => 'IN'
                                                                ) 
                                                            );

                                                    } 

                                                    if($tab_content['offset_enable']=='yes') {
                                                        $query['offset'] = $tab_content['offset_item_num'];
                                                    }

                                                    $data = get_posts($query);
                                                    $last = count($data)-1;

                                                ?> 
                                                <?php foreach( $data as $sl => $post ): ?>

                                                    <div class="col-lg-4">
                                                        <div class="binduz-er-news-categories-item">
                                                            <div class="binduz-er-thumb">
                                                                <a href="<?php the_permalink($post->ID) ?>">
                                                                    <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>" />
                                                                </a>
                                                            </div>
                                                            <div class="binduz-er-content">
                                                            <?php include('parts/date.php'); ?>
                                                                <div class="binduz-er-news-categories-title">
                                                                    <?php include('parts/title.php');  ?>
                                                                </div>
                                                                <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                                    <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
     
        <?php endif; ?>
        <?php if( $settings['block_style'] == 'style4' ): ?>
           
                <div class=" container">
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="binduz-er-popular-news-title">
                                <?php if( $settings['news_heading'] =='yes' ): ?>
                                    <h4 class="binduz-er-title binduz-er-post-heading "> <?php echo esc_html( $settings['news_heading_title']); ?> </h4>
                                <?php endif; ?>
                                <ul class="nav nav-pills mb-3 er-binduz-news-post-nav" role="tablist">

                                    <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                        <li  role="presentation" class="nav-item ">
                                            <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" id="#<?php echo esc_attr('post-'.$key.'-tab'.$id); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>"><?php echo esc_html($tab['title']); ?></a>
                                        </li>
                                    <?php endforeach; ?> 
                                  
                                </ul>
                            </div>
                            <div class="tab-content er-binduz-news-tab-content" id="pills-tabContent">
                                <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                                    <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>">
                                        <div class="binduz-er-popular-news-items">
                                                  <?php

                                                        $query = array(
                                                            'post_type'   => array( 'post' ),
                                                            'post_status' => array( 'publish' ),
                                                            'orderby'     => 'date',
                                                            'order'       => 'DESC',
                                                            'numberposts' => $post_count,
                                                        ); 


                                                        if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                                            $query['order']  = $tab_content['post_order'];
                                                        }

                                                        if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                                            
                                                            if($tab_content['post_sortby'] == 'mostdiscussed') {
                                                                    $query['orderby'] = 'comment_count';
                                                            }
                                                            

                                                            if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                                                    $query['category__in'] = $tab_content['post_cats'];  
                                                            }

                                                            if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                                                    $query['tag__in'] = $tab_content['post_tags'];  
                                                            }

                                                            if($tab_content['post_sortby'] == 'popularposts') {
                                                                    $query['meta_key'] = 'element_ready_post_views_count';
                                                                    $query['orderby']  = 'meta_value_num';
                                                            } 
                                                            
                                                            if($tab_content['post_sortby'] == 'share') {
                                                                    $query['meta_key'] = 'element_ready_most_share_post';
                                                                    $query['orderby']  = 'meta_value_num';
                                                            }

                                                            if($tab_content['post_sortby'] == 'tranding') {
                                                                    $query['meta_query'][] = [
                                                                    'key'     => '_element_ready_trending',
                                                                    'value'   => 'yes',
                                                                    'compare' => '=',
                                                                    ];
                                                            }
                                                                
                                                        }
                                                        if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                                            $query['tax_query'] = array(
                                                                    array(
                                                                        'taxonomy' => 'post_format',
                                                                        'field'    => 'slug',
                                                                        'terms'    => $tab_content['post_format'],
                                                                        'operator' => 'IN'
                                                                    ) 
                                                                );

                                                        } 

                                                        if($tab_content['offset_enable']=='yes') {
                                                            $query['offset'] = $tab_content['offset_item_num'];
                                                        }

                                                        $data = get_posts($query);
                                                        $last = count($data)-1;

                                                       $data = array_chunk($data,2);

                                            ?> 
                                            <?php foreach( $data as $sl => $chunk ): ?>
                                                <div class="row g-0">
                                                     <?php foreach($chunk as $post): ?>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="binduz-er-video-post recently-viewed-item">
                                                                <div class="binduz-er-latest-news-item">
                                                                    <?php if(has_post_thumbnail( $post->ID )): ?>
                                                                        <div class="binduz-er-thumb">
                                                                            <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                    <div class="binduz-er-content">
                                                                        <div class="binduz-er-meta-item">
                                                                            <?php include('parts/category2.php');  ?>
                                                                            <?php include('parts/date.php');  ?>
                                                                        </div>
                                                                        <?php include('parts/title.php');  ?>
                                                                        <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                                            <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endforeach; ?>      
                                         
                                        </div>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                    </div>
                </div>
          
        <?php endif; ?>
        <?php if( $settings['block_style'] == 'style5' ): ?>
            <div class="binduz-er-populer-news-sidebar-post">

                <?php if($settings['news_tab_menu'] == 'yes'): ?>
                    <div class="binduz-er-popular-news-title">
                        <ul class="nav nav-pills mb-3 er-binduz-news-post-nav">
                            <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                <li  role="presentation" class="nav-item ">
                                    <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" id="#<?php echo esc_attr('post-'.$key.'-tab'.$id); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>"><?php echo esc_html($tab['title']); ?></a>
                                </li>
                            <?php endforeach; ?> 
                        </ul>
                    </div>
                <?php endif; ?>
                
                <div class="tab-content er-binduz-news-tab-content">
                    <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                        <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>">
                            <?php

                                $query = array(
                                    'post_type'   => array( 'post' ),
                                    'post_status' => array( 'publish' ),
                                    'orderby'     => 'date',
                                    'order'       => 'DESC',
                                    'numberposts' => $post_count,
                                ); 


                                if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                    $query['order']  = $tab_content['post_order'];
                                }

                                if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                    
                                    if($tab_content['post_sortby'] == 'mostdiscussed') {
                                            $query['orderby'] = 'comment_count';
                                    }
                                    

                                    if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                            $query['category__in'] = $tab_content['post_cats'];  
                                    }

                                    if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                            $query['tag__in'] = $tab_content['post_tags'];  
                                    }

                                    if($tab_content['post_sortby'] == 'popularposts') {
                                            $query['meta_key'] = 'element_ready_post_views_count';
                                            $query['orderby']  = 'meta_value_num';
                                    } 
                                    
                                    if($tab_content['post_sortby'] == 'share') {
                                            $query['meta_key'] = 'element_ready_most_share_post';
                                            $query['orderby']  = 'meta_value_num';
                                    }

                                    if($tab_content['post_sortby'] == 'tranding') {
                                            $query['meta_query'][] = [
                                            'key'     => '_element_ready_trending',
                                            'value'   => 'yes',
                                            'compare' => '=',
                                            ];
                                    }
                                        
                                }
                                if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                    $query['tax_query'] = array(
                                            array(
                                                'taxonomy' => 'post_format',
                                                'field'    => 'slug',
                                                'terms'    => $tab_content['post_format'],
                                                'operator' => 'IN'
                                            ) 
                                        );

                                } 

                                if($tab_content['offset_enable']=='yes') {
                                    $query['offset'] = $tab_content['offset_item_num'];
                                }

                                $data = get_posts($query);
                                $last = count($data)-1;

                             

                                ?> 
                                
                            <div class="binduz-er-sidebar-latest-post-box">
                                 <?php foreach( $data as $sl => $post ): ?>
                                    <div class="binduz-er-sidebar-latest-post-item">
                                        <?php if(has_post_thumbnail( $post->ID )): ?>
                                            <div class="binduz-er-thumb">
                                                <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <div class="binduz-er-content">
                                            <span>
                                                <?php if($settings['meta_date_icon']['library'] !=''): ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_date_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php else: ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php endif; ?>
                                                <?php echo esc_html(get_the_date( get_option('date_format'),$post->ID )); ?>
                                            </span>
                                            <?php include('parts/title.php');  ?>
                                            <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        <?php endif; ?>
        <?php if( $settings['block_style'] == 'style6' ): ?>
            <section class="binduz-er-trending-news-box-area">
                <div class=" container">
                    <div class="row">
                        <div class=" col-lg-12">
                            <div class="binduz-er-trending-news-box">
                                <div class="binduz-er-trending-news-topbar d-block d-md-flex justify-content-between align-items-center">
                                    <?php if( $settings['news_heading'] =='yes' ): ?>
                                         <h3 class="binduz-er-title binduz-er-post-heading"><?php echo esc_html( $settings['news_heading_title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if($settings['news_tab_menu'] == 'yes'): ?>
                                        <ul class="nav nav-pills mb-3 er-binduz-news-post-nav" role="tablist">
                                            <?php foreach($element_ready_post_tabs as $key => $tab): ?>
                                                <li  role="presentation" class="nav-item ">
                                                    <a class="nav-link <?php echo esc_attr($key==0?'active':''); ?>" id="#<?php echo esc_attr('post-'.$key.'-tab'.$id); ?>" data-bs-toggle="pill" href="#<?php echo esc_attr('post-'.$key.'-'.$id); ?>"><?php echo esc_html($tab['title']); ?></a>
                                                </li>
                                            <?php endforeach; ?> 
                                        </ul>
                                   <?php endif; ?> 
                                </div>
                                <div class="tab-content er-binduz-news-tab-content">
                                    <?php foreach($element_ready_post_tabs as $sl => $tab_content): ?>
                                        <div class="tab-pane fade <?php echo esc_attr($sl==0?'show active ':''); ?>" id="<?php echo esc_attr('post-'.$sl.'-'.$id); ?>" >
                                            <div class="row">
                                                <?php

                                                    $query = array(
                                                        'post_type'   => array( 'post' ),
                                                        'post_status' => array( 'publish' ),
                                                        'orderby'     => 'date',
                                                        'order'       => 'DESC',
                                                        'numberposts' => $post_count,
                                                    ); 


                                                    if( isset( $tab_content['post_order'] ) && $tab_content['post_order'] !=''){
                                                        $query['order']  = $tab_content['post_order'];
                                                    }

                                                    if( isset( $tab_content['post_sortby'] ) && $tab_content['post_sortby'] !=''){
                                                        
                                                        if($tab_content['post_sortby'] == 'mostdiscussed') {
                                                                $query['orderby'] = 'comment_count';
                                                        }
                                                        

                                                        if(isset($tab_content['post_cats']) && is_array($tab_content['post_cats'])){ 
                                                                $query['category__in'] = $tab_content['post_cats'];  
                                                        }

                                                        if(isset($tab_content['post_tags']) && is_array($tab_content['post_tags'])){ 
                                                                $query['tag__in'] = $tab_content['post_tags'];  
                                                        }

                                                        if($tab_content['post_sortby'] == 'popularposts') {
                                                                $query['meta_key'] = 'element_ready_post_views_count';
                                                                $query['orderby']  = 'meta_value_num';
                                                        } 
                                                        
                                                        if($tab_content['post_sortby'] == 'share') {
                                                                $query['meta_key'] = 'element_ready_most_share_post';
                                                                $query['orderby']  = 'meta_value_num';
                                                        }

                                                        if($tab_content['post_sortby'] == 'tranding') {
                                                                $query['meta_query'][] = [
                                                                'key'     => '_element_ready_trending',
                                                                'value'   => 'yes',
                                                                'compare' => '=',
                                                                ];
                                                        }
                                                            
                                                    }
                                                    if( isset($tab_content['post_format']) && is_array($tab_content['post_format']) && count($tab_content['post_format']) > 0 ) {

                                                        $query['tax_query'] = array(
                                                                array(
                                                                    'taxonomy' => 'post_format',
                                                                    'field'    => 'slug',
                                                                    'terms'    => $tab_content['post_format'],
                                                                    'operator' => 'IN'
                                                                ) 
                                                            );

                                                    } 

                                                    if($tab_content['offset_enable']=='yes') {
                                                        $query['offset'] = $tab_content['offset_item_num'];
                                                    }

                                                    $data = get_posts($query);
                                                    $last = count($data)-1;

                                                ?> 
                                                <?php foreach( $data as $sl => $post ): ?>
                                                    <div class=" col-lg-3 col-md-6">
                                                        <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                                            <div class="binduz-er-latest-news-item">
                                                                <?php if(has_post_thumbnail( $post->ID )): ?>
                                                                    <div class="binduz-er-thumb">
                                                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url($post->ID , $thumbnail_size) ); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                                                    </div>
                                                                <?php endif; ?>
                                                                <div class="binduz-er-content">
                                                                    <div class="binduz-er-meta-item">
                                                                        <?php include('parts/category2.php');  ?>
                                                                        <?php include('parts/date.php');  ?>
                                                                    </div>
                                                                    <?php include('parts/title.php'); ?>
                                                                    <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                                        <a class="b-readmore" href="<?php the_permalink($post->ID) ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                               
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

	<?php
     }

}

