<?php
namespace Binduz_Essential\Widgets\Slider;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Custom_Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Element_Ready\Base\Repository\Base_Modal;

require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php' );

if ( ! defined( 'ABSPATH' ) ) exit;

class ER_Binduz_Post_Slider extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'element-ready-binduz-er-slider-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Slider', 'binduz' );
    }
    public function get_script_depends(){
       return [
          'binduz-er-core'
       ];
    }
    public function get_style_depends(){
        
        return [
           'element-ready-er-grid'
        ];
    }

    public function get_icon() { 
        return "fas fa-sticky-note";
    }

    public function get_categories() {
       return [ 'element-ready-addons' ];
    }

    protected function register_controls() {
          
        $this->start_controls_section(
            'section_layouts_tab',
            [
                'label' => esc_html__('Layout', 'binduz'),
            ]
        );

        $this->add_control(
			'block_style',
			[
				'label' => esc_html__( 'Style', 'binduz' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'binduz' ),
					'style2'  => esc_html__( 'Style 2', 'binduz' ),
					'style3'  => esc_html__( 'Style 3', 'binduz' ),
					'style4'  => esc_html__( 'Style 4', 'binduz' ),
					'style5'  => esc_html__( 'Style 5', 'binduz' ),
					'style6'  => esc_html__( 'Style 6', 'binduz' ),
					'style7'  => esc_html__( 'Style 7', 'binduz' ),
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
         'label' => esc_html__('Heading', 'binduz'),
         'condition' => [
             'block_style' => ['style3','style5','style7']
         ]
         ]
      );

         $this->add_control(
         'news_heading',
            [
               'label'        => esc_html__( 'Show Heading', 'binduz' ),
               'type'         => \Elementor\Controls_Manager::SWITCHER,
               'label_on'     => esc_html__( 'Show', 'binduz' ),
               'label_off'    => esc_html__( 'Hide', 'binduz' ),
               'return_value' => 'yes',
               'default'      => 'yes',
            ]
         );

         $this->add_control(
               'news_heading_title',
               [
                  'label'   => esc_html__( 'Heading Title', 'binduz' ),
                  'type'    => \Elementor\Controls_Manager::TEXT,
                  'default' => esc_html__( 'Default title', 'binduz' ),
               ]
         );

 
      $this->end_controls_section();

      $this->element_before_psudocode([
         'title' => esc_html__('Heading Shape','binduz'),
         'slug' => 'post_heading_separetor_box_style',
         'element_name' => 'post_heading_separetor_element_ready_',
         'condition' => [
             'block_style' => ['style3','style7'],
         ],
         'selector' => '{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title::before,{{WRAPPER}} .binduz-er-social-news-box .binduz-er-title::before',
         'selector_parent' => '{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title,{{WRAPPER}} .binduz-er-social-news-box .binduz-er-title',
      ]);

      $this->text_wrapper_css([
         'title' => esc_html__('Heading','binduz'),
         'slug' => 'post_heading__box_style',
         'element_name' => 'post_heading_retor_element_ready_',
         'condition' => [
             'block_style' => ['style3','style5','style7'],
          ],
         'selector' => '{{WRAPPER}} .binduz-er-social-news-box .binduz-er-title,{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title,{{WRAPPER}} .binduz-er-featured-title .binduz-er-title',
         'hover_selector' => false
      ]);
      
       do_action( 'element_ready_binduz_section_general_slider_tab', $this, $this->get_name() );
       do_action( 'binduz_general_grid_slider', $this, $this->get_name() );
     
       do_action( 'element_ready_section_data_exclude_tab', $this , $this->get_name() );  
       do_action( 'element_ready_section_date_filter_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_taxonomy_filter_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_sort_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_sticky_tab', $this , $this->get_name());  
      
       $this->content_text([
         'title' => esc_html__('Meta Icon','binduz-essential'),
         'slug' => '_meta_icons_content',
         'condition' => '',
         'controls' => [
            'meta_icon'=> [
               'label'         => esc_html__( 'Meta Icon', 'binduz_essential' ),
               'type' => \Elementor\Controls_Manager::ICONS,
             ],
           'meta_cat_icon'=> [
             'label'         => esc_html__( 'Meta Category Icon', 'binduz_essential' ),
             'type' => \Elementor\Controls_Manager::ICONS,
           ],

           'meta_author_icon'=> [
             'label'         => esc_html__( 'Meta Author Icon', 'binduz_essential' ),
             'type' => \Elementor\Controls_Manager::ICONS,
           ],

           'meta_date_icon'=> [
             'label'         => esc_html__( 'Meta Date Icon', 'binduz_essential' ),
             'type' => \Elementor\Controls_Manager::ICONS,
           ],

           'meta_comment_icon'=> [
             'label'         => esc_html__( 'Meta Comment Icon', 'binduz_essential' ),
             'type' => \Elementor\Controls_Manager::ICONS,
           ],
           
           'meta_video_icon'=> [
             'label'         => esc_html__( 'Meta Video Icon', 'binduz_essential' ),
             'type' => \Elementor\Controls_Manager::ICONS,
           ],
       
         ]
      ]);

       $this->text_css(
            array(
                'title' => esc_html__('Title wrapper','binduz'),
                'slug' => '_title_wrapper_style',
                'element_name' => '_title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-title',
                'hover_selector' => false,
            
            )
        );

      $this->text_wrapper_css(
         array(
             'title' => esc_html__('Title','binduz'),
             'slug' => '_title__style',
             'element_name' => '_title_apper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-title a',
             'hover_selector' => '{{WRAPPER}} .binduz-er-title:hover a',
         )
      );

      $this->text_wrapper_css(
         array(
             'title' => esc_html__('List Title','binduz'),
             'slug' => '_titless_list__style',
             'element_name' => '_title_appe_listr_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-content ul li a',
             'condition' => [
                'block_style' => ['style5']
             ]
         )
      );

      $this->box_css(
         array(
             'title' => esc_html__('List','binduz'),
             'slug' => '_titlebox_list__style',
             'element_name' => '_title_appse_listr_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-content ul li',
             'condition' => [
                'block_style' => ['style5']
             ]
         )
      );


      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Content','binduz_essential'),
            'slug' => 'post_content_style',
            'element_name' => 'post_content_element_ready_',
            'selector' => '{{WRAPPER}} .er-binduz-news-content',
            'hover_selector' => false,
            'condition' => [
               'show_content' => 'yes',
            ],
         )
     );

      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date','binduz_essential'),
            'slug' => 'post_date_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-date span',
            'hover_selector' => '{{WRAPPER}}  .binduz-er-meta-date span:hover',
            'condition' => [
               'show_date' => 'yes',
            ],
         )
     ); 
    

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date icon','binduz_essential'),
            'slug' => 'post_date_icon_style',
            'element_name' => 'post_date_icon_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-date span i',
            'hover_selector' => false,
            'condition' => [
               'show_date' => 'yes',
            ],
         )
   );

      $this->text_wrapper_css(
        array(
            'title' => esc_html__('Category Wrapper','binduz'),
            'slug' => '_cat_wbox_style',
            'element_name' => '_cat_wwer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-categories,{{WRAPPER}} .binduz-er-news-slider-2-item .binduz-er-news-viewed-most .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories',
            'hover_selector' => false,
        )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Category','binduz'),
            'slug' => '_cat_box_style',
            'element_name' => '_cat_wer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-video-post.binduz-er-top-news-2-slider .binduz-er-latest-news-item .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,{{WRAPPER}} .binduz-er-news-slider-2-item .binduz-er-news-viewed-most .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a,{{WRAPPER}} .binduz-er-meta-categories a,{{WRAPPER}} .binduz-er-trending-today-item .binduz-er-trending-news-list-box .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a',
         )
      );

      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Meta List','binduz_essential'),
            'slug' => 'post_cmeta_list_style',
            'element_name' => 'post_cmeta_list_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-list li',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-list li:hover',
            'condition' => [
               'block_style' => ['style2']
            ]
            
         )
     );

     
     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Meta List icon','binduz_essential'),
            'slug' => 'post_meta_list__style',
            'element_name' => 'post_meta_list_icon_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-list li i',
            'hover_selector' => false,
            'condition' => [
               'block_style' => ['style2']
            ]
            
         )
     );

     $this->text_wrapper_css(
      array(
         'title' => esc_html__('Author text','binduz_essential'),
         'slug' => 'posts_author_style',
         'element_name' => 'posts_author_element_ready_',
         'selector' => '{{WRAPPER}} .binduz-er-author span',
         'hover_selector' => '{{WRAPPER}} .binduz-er-author span:hover',
         'condition' => [
            'show_author' => 'yes',
            'block_style' => ['style2','style3']
         ],
      )
  );

  $this->box_css(
   array(

       'title' => esc_html__('Author Image','binduz'),
       'slug' => '_box_author_image_style',
       'element_name' => '_box_ver_author_image_element_ready_',
       'selector' => '{{WRAPPER}} .binduz-er-author img,{{WRAPPER}} .binduz-er-meta-author img',
       'condition' => [
         'show_author' => 'yes',
         'block_style' => ['style2','style3']
      ],
      
   )
); 

  $this->text_wrapper_css(
      array(
         'title'          => esc_html__('Author name','binduz_essential'),
         'slug'           => 'post_author_style',
         'element_name'   => 'post_author_element_ready_',
         'selector'       => '{{WRAPPER}} .binduz-er-author span a, {{WRAPPER}} .binduz-er-meta-author span a',
         'hover_selector' => '{{WRAPPER}} .binduz-er-author span:hover a, {{WRAPPER}} .binduz-er-meta-author span:hover a',
         'condition'      => [
            'show_author' => 'yes',
            'block_style' => ['style2','style3']
         ],
      )
  );
      
      $this->text_wrapper_css(
         array(
            'title'        => esc_html__('Next Arrow','binduz'),
            'slug'         => '_nav_arrow-right_style',
            'condition' => [
               'block_style!' => ['style4']
             ],
            'element_name' => '_nav_arrow_element_ready_',
            'selector'     => '{{WRAPPER}} .binduz-er-social-news-box .binduz-er-social-news-slide .slick-arrow.next, {{WRAPPER}} .binduz-er-video-post.binduz-er-top-news-2-slider .slick-arrow.next ,{{WRAPPER}} .binduz-er-featured-slider-item .slick-arrow.next,{{WRAPPER}} .binduz-er-news-slider-box .binduz-er-news-slider-item .slick-arrow.next,{{WRAPPER}} .binduz-er-news-viewed-most-slide .slick-arrow.next ',
         )
      );
      
      $this->text_wrapper_css(
         array(
            'title'        => esc_html__('Left Arrow','binduz'),
            'slug'         => '_nav_arrow-left_style',
            'element_name' => '_nav_arrow_left_element_ready_',
            'condition' => [
              'block_style!' => ['style4']
            ],
            'selector'     => '{{WRAPPER}} .binduz-er-social-news-box .binduz-er-social-news-slide .slick-arrow.prev , {{WRAPPER}} .binduz-er-video-post.binduz-er-top-news-2-slider .slick-arrow.prev, {{WRAPPER}} .binduz-er-featured-slider-item .slick-arrow.prev,{{WRAPPER}} .binduz-er-news-slider-box .binduz-er-news-slider-item .slick-arrow.prev,{{WRAPPER}} .binduz-er-news-viewed-most-slide .slick-arrow.prev',
         )
      );

      $this->text_wrapper_css(
         array(
            'title'        => esc_html__('Next Arrow','binduz'),
            'slug'         => '_nav_row-rightstyle',
            'condition' => [
               'block_style' => ['style4']
             ],
            'element_name' => '_nav_arrowelement_ready_',
            'selector'     => '{{WRAPPER}} .binduz-er-news-slider-2-item .slick-arrow.next i',
         )
      );
      
      $this->text_wrapper_css(
         array(
            'title'        => esc_html__('Left Arrow','binduz'),
            'slug'         => '_nav_row-left_style',
            'element_name' => '_nav_arrowleft_element_ready_',
            'condition' => [
              'block_style' => ['style4']
            ],
            'selector'     => '{{WRAPPER}} .binduz-er-news-slider-2-item .prev.slick-arrow i',
         )
      );

      $this->box_css(
         array(
 
             'title'        => esc_html__('Navigation','binduz'),
             'slug'         => '_box_navigation_style',
             'element_name' => '_box_ver_navigation_element_ready_',
             'selector'     => '{{WRAPPER}} .binduz-er-video-post.binduz-er-top-news-2-slider .slick-arrow,{{WRAPPER}} .slick-arrow,{{WRAPPER}} .binduz-er-featured-slider-item .slick-arrow,{{WRAPPER}} .binduz-er-news-slider-box .binduz-er-news-slider-item .slick-arrow,{{WRAPPER}} .binduz-er-news-viewed-most-slide .slick-arrow',
            
         )
      ); 
      
      $this->box_css(
         array(
 
             'title' => esc_html__('Image Wrapper','binduz'),
             'slug' => '_box_image_box_style',
             'element_name' => '_box_ver_image_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-thumb',
            
         )
      );

      $this->start_controls_section('er_binduz_image_section',
            [
               'label' => esc_html__( 'Image ', 'binduz' ),
               'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
      );

         $this->add_responsive_control(
            'image_margin',
            [
               'label'      => esc_html__( 'Margin', 'binduz' ),
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
               'label'      => esc_html__( 'Image height', 'binduz' ),
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
               'label'      => esc_html__( 'Image width', 'binduz' ),
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
               'label'      => esc_html__( 'Max width', 'binduz' ),
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
               'label'      => esc_html__( 'Image Border radius', 'binduz' ),
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

            'title' => esc_html__('Box','binduz'),
            'slug' => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-social-news-box , {{WRAPPER}} .binduz-er-latest-news-item,{{WRAPPER}} .binduz-er-featured-item,{{WRAPPER}} .binduz-er-news-viewed-most,{{WRAPPER}} .binduz-er-featured-slider-item .binduz-er-trending-news-list-box,{{WRAPPER}} .binduz-er-news-slider-box',
           
        )
     ); 
      
      $this->box_css(
         array(

             'title' => esc_html__('Box Inner','binduz'),
             'slug' => '_contnt_verwr_box_style',
             'element_name' => '_content_ver_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-item,{{WRAPPER}} .binduz-er-content,{{WRAPPER}} .binduz-er-social-news-item',
            
         )
      ); 

      $this->text_wrapper_css(
         array(
            'title'          => esc_html__('Radmore','binduz'),
            'slug'           => 'post_readpre_video_style',
            'element_name'   => 'post_readmore_element_ready_',
            'selector'       => '{{WRAPPER}} .b-readmore',
            'hover_selector' => '{{WRAPPER}} .b-readmore:hover',
         )
      );
      

    }

    public function get_slider_controls($settings){

       $return_settings = [
          'slidesToShow'  => 1,
          'show_nav'      => true,
          'autoplay'      => true,
          'autoplaySpeed' => 5000,
          'slide_speed'   => 1500,
          'slide_padding'   => 50,
          'left_icon'   => 'fa fa-angle-left',
          'right_icon'   => 'fa fa-angle-right',
       ]; 

      if(isset($settings['slidesToShow'])){
         $return_settings['slidesToShow'] = $settings['slidesToShow'];  
      }
      if(isset($settings['show_nav'])){
         $return_settings['show_nav'] = $settings['show_nav'] =='yes'?true:false;  
      } 
      
      if(isset($settings['autoplay'])){
         $return_settings['autoplay'] = $settings['autoplay']=='yes'?true:false;  
      }
      
      if(isset($settings['autoplaySpeed'])){
         $return_settings['autoplaySpeed'] = $settings['autoplaySpeed'];  
      }
      
      if(isset($settings['slide_speed'])){
         $return_settings['slide_speed'] = $settings['slide_speed'];  
      }
      
      if(isset($settings['slide_padding'])){
         $return_settings['slide_padding'] = $settings['slide_padding'];  
      }
      
      if(isset($settings['left_icon'])){
         $return_settings['left_icon'] = $settings['left_icon']['value'];  
      }
      
      if(isset($settings['right_icon'])){
         $return_settings['right_icon'] = $settings['right_icon']['value'];  
      }

      return $return_settings;
    }

    protected function render( ) { 

        $settings        = $this->get_settings();
        $post_title_crop = $settings['post_title_crop'];
        $post_count      = $settings['post_count'];
        $data            = new Base_Modal($settings);
        $thumbnail_size = $settings['thumbnail_size'];
        $query = $data->get();
        
      
        if(!$query){
          return;  
        }

        ?>

            <?php if($settings['block_style'] =='style1'): ?>
               <div data-layout="<?php echo $settings['block_style']; ?>" class="binduz-er-featured-slider-item" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                              <div class="binduz-er-trending-news-list-box">
                                 <?php if(has_post_thumbnail()): ?>
                                    <div class="binduz-er-thumb">
                                       <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
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
                                       <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                    <?php endif; ?>
                                 </div>
                              </div>
                        <?php
                     
                           if($post_count==$query->current_post+1){
                                break;
                           } 
                            endwhile; 
                            wp_reset_postdata();
                        ?>
               </div>     
            <?php endif; ?>
            <?php if( $settings['block_style'] == 'style2'): ?>
             
               <div class="container">
                     <div class="binduz-er-news-slider-box" data-layout="<?php echo $settings['block_style']; ?>" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
                        <div class="row g-0 align-items-center">
                           <div class=" col-lg-6">
                              <div class="binduz-er-news-slider-item">
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                       <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                                          <?php if(has_post_thumbnail()): ?> 
                                             <div class="binduz-er-item">
                                                <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                             </div>
                                          <?php endif; ?>
                                    <?php
                                 
                                       endwhile; 
                                       wp_reset_postdata();
                                    ?>
                              </div>
                           </div>
                           <div class=" col-lg-6">
                         
                                 <div class="binduz-er-news-slider-content-slider">
                                 <?php while ($query->have_posts()) : $query->the_post(); ?>
                                      
                                          <div class="binduz-er-item">
                                             <div class="binduz-er-meta-item">
                                                   <?php include('parts/category2.php');  ?>
                                                   <?php include('parts/date.php');  ?>
                                             </div>
                                             <div class="binduz-er-news-slider-content">
                                                   <?php include('parts/title.php');  ?>
                                                   <?php include('parts/content.php');  ?>
                                             </div>
                                             <div class="binduz-er-meta-author">
                                                    <?php include('parts/author.php');  ?>
                                                   <?php include('parts/meta-list.php');  ?>
                                             </div>
                                             <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                             <?php endif; ?>
                                          </div>
                                       <?php
                                             
                                             endwhile; 
                                             wp_reset_postdata();
                                       ?>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
         
            <?php endif; ?>

            <?php if($settings['block_style'] =='style3'): ?>
                     <?php if( $settings['news_heading'] == 'yes' ): ?>
                        <div class="binduz-er-top-news-title">
                           <h3 class="binduz-er-title"> <?php echo $settings['news_heading_title']; ?> </h3>
                        </div>
                     <?php endif; ?>
                    <div class="binduz-er-news-viewed-most-slide" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                                          <div class="binduz-er-news-viewed-most">
                                             <?php if(has_post_thumbnail()): ?>
                                                <div class="binduz-er-thumb">
                                                   <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                                </div>
                                             <?php endif; ?>
                                             <div class="binduz-er-content">
                                                <div class="binduz-er-meta-item">
                                                <?php include('parts/category2.php'); ?>
                                                <?php include('parts/date.php'); ?>
                                                </div>
                                                <?php include('parts/title.php'); ?>
                                                <?php include('parts/author2.php'); ?>
                                                <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                   <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                                <?php endif; ?>
                                             </div>
                                          </div>
                              <?php
                                    endwhile; 
                                    wp_reset_postdata();
                              ?>
                    </div>    
            <?php endif; ?>
            <?php if( $settings['block_style'] == 'style4' ): ?>
             
                  <div class="container-fluid p-0">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="binduz-er-news-slider-2-item" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
                                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                                       <div class="binduz-er-news-viewed-most">
                                          <?php if(has_post_thumbnail( )): ?>
                                             <div class="binduz-er-thumb">
                                                <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                             </div>
                                          <?php endif; ?>
                                          <div class="binduz-er-content">
                                             <div class="binduz-er-meta-item">
                                                   <?php include('parts/category2.php'); ?>
                                                   <?php include('parts/date.php');  ?>
                                             </div>
                                             <?php include('parts/title.php');  ?>
                                             <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                             <?php endif; ?>
                                          </div>
                                       </div>
                                    <?php
                                       endwhile; 
                                       wp_reset_postdata();
                                    ?>
                              </div>
                           </div>
                        </div>
                  </div>
              
            <?php endif; ?>
            <?php if($settings['block_style'] == 'style5'): ?>
                     <?php if( $settings['news_heading'] == 'yes' ): ?>
                        <div class="binduz-er-featured-title">
                              <h4 class="binduz-er-title"><?php echo $settings['news_heading_title']; ?></h4>
                        </div>
                     <?php endif; ?>   
                    <div class="binduz-er-featured-slider-2" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
                       <?php
                          $data_posts = $data->get_posts();
                          $data_chunk = array_chunk($data_posts, $settings['post_per_slide']); 
                          
                       ?>
                       
                       <?php foreach($data_chunk as $item_data): $counter = 0;  ?>
                              <div class="binduz-er-featured-item" >
                                 <?php foreach($item_data as $post): ?>

                                    <?php

                                       $total = count($item_data);
                                       $counter++; 
                                       $_blog_image = get_the_post_thumbnail_url($post->ID,$thumbnail_size);
                                     
                                     ?>
                                     <?php if($counter == 1): ?> 
     
                                       <div class="binduz-er-thumb">
                                          <?php if(has_post_thumbnail( $post )): ?>
                                             <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                          <?php endif; ?>
                                         <?php
                                             $featured_video = binduz_meta_option($post->ID,'featured_video');
                                             $featured_audio = binduz_meta_option($post->ID,'featured_audio');
                                             $embed_code = '';
                                             $link = '#binduz-er-audio-popup-'.$post->ID;
                                             if(get_post_format($post) == 'video'){

                                                if($featured_video !=''){
                                                   $embed_code = wp_oembed_get( $featured_video );
                                                }
                                               
                                             }elseif(get_post_format($post) == 'audio'){

                                                if( $featured_audio !='' ){
                                                   $embed_code = wp_oembed_get( $featured_audio );
                                                }
                                                
                                             }
                                             
                                           
                                          ?>
                                         
                                           <div class="binduz-er-icon">

                                               <?php echo in_array(get_post_format($post),['audio','video'])?'<a   class="binduz-er-newsr-popup-audio" href="'.esc_url($link).'">':''; ?>
                                                   
                                                      <?php if( get_post_format($post) == 'video' ): ?>
                                                         <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                                            <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                         <?php else: ?>
                                                            <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                         <?php endif; ?>
                                                      <?php elseif( get_post_format($post) == 'audio'): ?>
                                                          <i class="fas fa-microphone"></i>
                                                      <?php elseif( get_post_format($post) == 'image'): ?>
                                                         <i class="fas fa-film"></i>
                                                      <?php elseif( get_post_format($post) == 'quote'): ?>
                                                         <i class="fas fa-quote-left"></i>
                                                      <?php else: ?> 
                                                         <i class="fas fa-image"></i>
                                                      <?php endif; ?>

                                               <?php echo in_array(get_post_format($post),[ 'audio' , 'video' ])?'</a>':''; ?>

                                           </div>
                                         
                                       </div>
                                       <div id="binduz-er-audio-popup-<?php echo $post->ID; ?>" class="binduz-er-newsr-white-popup mfp-hide">
                                            <?php echo $embed_code; ?>
                                       </div>
                                    <div class="binduz-er-content">
                                       <h4 class="binduz-er-title"><a href="<?php the_permalink($post) ?>"> <?php echo esc_html(wp_trim_words( get_the_title($post),$settings['post_title_crop'],'' )); ?> </a></h4>
                                        <ul>
                                       <?php endif; ?> 

                                          <li>
                                             <?php if(get_post_format($post) == 'video'): ?>
                                             <i class="fas fa-play"></i>
                                             <?php elseif(get_post_format($post) == 'audio'): ?>
                                             <i class="fas fa-microphone"></i>
                                             <?php elseif(get_post_format($post) == 'image'): ?>
                                               <i class="fas fa-film"></i>
                                             <?php elseif(get_post_format($post) == 'quote'): ?>
                                                <i class="fas fa-quote-left"></i>
                                             <?php else: ?> 
                                                <i class="fas fa-image"></i>
                                             <?php endif; ?>
                                             <a href="<?php the_permalink($post) ?>">
                                                <?php echo esc_html(wp_trim_words( get_the_title($post),$settings['post_title_crop'],'' )); ?>
                                             </a>
                                          </li>
      
                                     <?php if($total == $counter): ?>
                                       </ul>
                                    </div>
                                    <?php endif; ?>
                                 <?php endforeach; ?>
                              </div>
                       <?php endforeach; ?>
                    </div>

            <?php endif; ?>
            <?php if($settings['block_style'] == 'style6'): ?>
               <div class="binduz-er-video-post binduz-er-top-news-2-slider" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>'>
               <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                              <div class="binduz-er-latest-news-item">
                                 <div class="binduz-er-thumb">
                                    <?php if(has_post_thumbnail( )): ?>
                                       <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                    <?php endif; ?>
                                 </div>
                                 <div class="binduz-er-content">
                                    <div class="binduz-er-meta-item">
                                          <?php include('parts/category2.php'); ?>
                                          <?php include('parts/date.php'); ?>
                                    </div>
                                    <?php include('parts/title.php'); ?>
                                    <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                                <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                             <?php endif; ?>
                                 </div>
                              </div>
                        <?php
                           endwhile; 
                           wp_reset_postdata();
                        ?>
                    </div>
            <?php endif; ?>
            <?php if( $settings['block_style'] == 'style7' ): ?>
                    <div class="binduz-er-social-news-box">
                        <?php if($settings['news_heading'] == 'yes'): ?>
                           <div class="binduz-er-social-news-title">
                              <h3 class="binduz-er-title"><?php echo $settings['news_heading_title']; ?> </h3>
                           </div>
                        <?php endif; ?>
                        <div class="container">
                           <div class="row binduz-er-social-news-slide" data-slide-controls='<?php echo json_encode($this->get_slider_controls($settings)); ?>' >
                              <?php while ($query->have_posts()) : $query->the_post(); ?>
                              <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                                 <div class="col-lg-4">
                                    <div class="binduz-er-social-news-item">
                                          <?php if(has_post_thumbnail( )): ?>
                                             <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                          <?php endif; ?>
                                          <div class="binduz-er-social-btn">
                                             <a href="<?php the_permalink() ?>">
                                             
                                                <?php if(get_post_format() == 'video'): ?>
                                                <i class="fas fa-play"></i>
                                                <?php elseif(get_post_format() == 'audio'): ?>
                                                <i class="fas fa-microphone"></i>
                                                <?php elseif(get_post_format() == 'twitter'): ?>
                                                <i class="fab fa-twitter"></i>
                                                <?php elseif(get_post_format() == 'facebook'): ?>
                                                   <i class="fab fa-facebook-f"></i>
                                                <?php else: ?> 
                                                   <i class="fas fa-image"></i>
                                                <?php endif; ?>
                                             </a>
                                          </div>
                                    </div>
                                 </div>
                              <?php
                                 endwhile; 
                                 wp_reset_postdata();
                              ?>
                           </div>
                        </div>
                    </div>

                     
            <?php endif; ?>
          
           
      <?php  
    }

  

    
}