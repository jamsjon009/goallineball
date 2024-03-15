<?php
namespace Binduz_Essential\Widgets\Grid;

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

class ER_Binduz_Grid_Editor_Post extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-grid-editor-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Editor Post', 'element-ready-pro' );
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
                'label' => esc_html__('Layout', 'element-ready-pro'),
            ]
        );

        $this->add_control(
			'block_style',
			[
				'label' => esc_html__( 'Style', 'element-ready' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'element-ready' ),
					
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
             'block_style' => ['style1']
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

                 $this->add_control(
                  'news_view_all',
                  [
                      'label'        => esc_html__( 'View all', 'element-ready' ),
                      'type'         => \Elementor\Controls_Manager::SWITCHER,
                      'label_on'     => esc_html__( 'Show', 'element-ready' ),
                      'label_off'    => esc_html__( 'Hide', 'element-ready' ),
                      'return_value' => 'yes',
                      'default'      => 'yes',
                  ]
                  );

                  
 
                 $this->add_control(
                 'news_view_text',
                 [
                     'label'   => esc_html__( 'View all text', 'element-ready' ),
                     'type'    => \Elementor\Controls_Manager::TEXT,
                     'default' => esc_html__( 'View all', 'element-ready' ),
                     'condition' => [
                        'news_view_all' => ['yes']
                          ]
                 ]
                );
                
                $this->add_control(
                 'news_view_link',
                 [
                     'label'   => esc_html__( 'View all link', 'element-ready' ),
                     'type'    => \Elementor\Controls_Manager::TEXT,
                     'default' => '#',
                     'condition' => [
                        'news_view_all' => ['yes']
                          ]
                 ]
                );
 
 
         $this->end_controls_section();
 
          
         $this->text_wrapper_css([
             'title' => esc_html__('Heading Wrapper','element-ready'),
             'slug' => 'post_heading__box_style',
             'element_name' => 'post_heading_retor_element_ready_',
             'condition' => [
                 'block_style' => ['style1','style2'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-editors-pack-title',
             'hover_selector' => false
         ]);

              
         $this->text_wrapper_css([
            'title' => esc_html__('Heading','element-ready'),
            'slug' => 'post_heading_s_box_style',
            'element_name' => 'post_heading_retors_element_ready_',
            'condition' => [
                'block_style' => ['style1','style2'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-editors-pack-title .binduz-er-title',
            'hover_selector' => false
        ]);

       

       do_action( 'binduz_general_grid_editor_tab', $this, $this->get_name() );
     
       do_action( 'element_ready_section_data_exclude_tab', $this , $this->get_name() );  
       do_action( 'element_ready_section_date_filter_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_taxonomy_filter_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_sort_tab', $this , $this->get_name());  
       do_action( 'element_ready_section_sticky_tab', $this , $this->get_name());  
      
       $this->content_text([
         'title' => esc_html__('Meta Icon','binduz_essential'),
         'slug' => '_meta_icons_content',
         'condition' => '',
         'controls' => [
             'meta_icon'=> [
                 'label'         => esc_html__( 'Meta Icon', 'binduz_essential' ),
                 'type' => \Elementor\Controls_Manager::ICONS,
               ],
           
               'meta_date_icon'=> [
                  'label'         => esc_html__( 'Meta Date Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
               ],
               'meta_cat_icon'=> [
                  'label'         => esc_html__( 'Meta Cat Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
               ],

             
         ]
      ]);
       $this->text_css(
            array(
                'title' => esc_html__('Title wrapper','element-ready'),
                'slug' => '_title_wrapper_style',
                'element_name' => '_title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-title',
                'hover_selector' => false,
            
            )
        );

      $this->text_wrapper_css(
         array(
             'title' => esc_html__('Title','element-ready'),
             'slug' => '_title__style',
             'element_name' => '_title_apper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-title a',
            
         )
      );
   
      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date','binduz_essential'),
            'slug' => 'post_date_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-meta-item .binduz-er-meta-date span',
            'hover_selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-meta-item .binduz-er-meta-date span:hover',
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
            'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-meta-item .binduz-er-meta-date span i',
            'hover_selector' => false,
            'condition' => [
               'show_date' => 'yes',
            ],
         )
   );

   $this->text_wrapper_css(
      array(
          'title' => esc_html__('Content','element-ready'),
          'slug' => '_c_contentwbox_style',
          'element_name' => '_ct_content_element_ready_',
          'selector' => '{{WRAPPER}} .binduz-er-content p',
          'hover_selector' => false,
          'condition' => [
            'block_style' => ['style2'],
         ],
      )
   );

      $this->text_wrapper_css(
        array(
            'title' => esc_html__('Category Wrapper','element-ready'),
            'slug' => '_cat_wbox_style',
            'element_name' => '_cat_wwer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-meta-item .binduz-er-meta-categories',
            'hover_selector' => false,
        )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Category','element-ready'),
            'slug' => '_cat_box_style',
            'element_name' => '_cat_wer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content .binduz-er-meta-item .binduz-er-meta-categories a',
         )
      );

      $this->box_css(
         array(
 
             'title' => esc_html__('Image Wrapper','element-ready'),
             'slug' => '_box_image_box_style',
             'element_name' => '_box_ver_image_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-editors-pack-thumb',
            
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
                  '{{WRAPPER}} .binduz-er-editors-pack-thumb img'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .binduz-er-editors-pack-thumb img'     => 'height: {{SIZE}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .binduz-er-editors-pack-thumb img'     => 'width: {{SIZE}}{{UNIT}};',
                  
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
                  '{{WRAPPER}} .binduz-er-editors-pack-thumb img'     => 'max-width: {{SIZE}}{{UNIT}};',
               
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
                  
                  '{{WRAPPER}} .binduz-er-editors-pack-thumb img'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
                  
               ],
            ]
         );

      $this->end_controls_section();
      
      
      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Video','element-ready'),
            'slug' => 'post_video_style',
            'element_name' => 'post_video_element_ready_',
            'selector' => '{{WRAPPER}}  .binduz-er-thumb .binduz-er-play a',
            'hover_selector' => '{{WRAPPER}}  .binduz-er-thumb .binduz-er-play:hover a',
            'condition' => [
             'block_style' => ['style2'],
             ],
     
         )
      ); 
      
      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Video Icon','element-ready'),
            'slug' => 'post_icon_video_style',
            'element_name' => 'post_icon_video_element_ready_',
            'selector' => '{{WRAPPER}}  .binduz-er-thumb .binduz-er-play a i',
            'hover_selector' => '{{WRAPPER}}  .binduz-er-thumb .binduz-er-play:hover a i',
            'condition' => [
             'block_style' => ['style12'],
          ],
     
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
            ],
         )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Author name','binduz_essential'),
            'slug' => 'post_author_style',
            'element_name' => 'post_author_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-author span a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-author span:hover a',
            'condition' => [
               'show_author' => 'yes',
            ],
         )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('View all','binduz_essential'),
            'slug' => 'post_view_all_style',
            'element_name' => 'post_view_all_element_ready_',
            'selector' => '{{WRAPPER}} .er-binduz-view-all-link',
            'hover_selector' => false,
            'condition' => [
               'news_view_all' => 'yes',
            ],
         )
     );
      
      $this->box_css(
         array(

             'title' => esc_html__('Content Box','element-ready'),
             'slug' => '_contnt_verwr_box_style',
             'element_name' => '_content_ver_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-editors-pack-content',
            
         )
      ); 

      $this->box_css(
         array(

             'title' => esc_html__('Navigation','element-ready'),
             'slug' => '_contnt_nav_box_style',
             'element_name' => '_content_nav_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-recent-news-box nav',
             'condition' => [
               'block_style' => ['style2'],
              ],
            
         )
      ); 

      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Navigation Item','element-ready'),
            'slug' => 'post_nav_item_video_style',
            'element_name' => 'post_inav_item_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-recent-news-box nav .pagination .page-item a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-recent-news-box nav .pagination .page-item:hover a',
            'condition' => [
             'block_style' => ['style2'],
            ],
     
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
                
             
                  <div class="container">
                        <?php if($settings['news_heading'] =='yes'): ?>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="binduz-er-editors-pack-title">
                                       <h4 class="binduz-er-title"><?php echo $settings['news_heading_title']; ?> </h4>
                                       <?php if($settings['news_view_all'] == 'yes'): ?>
                                       <a class="er-binduz-view-all-link" href="<?php echo esc_url($settings['news_view_link']); ?>"> <?php echo esc_html($settings['news_view_text']); ?> </a>
                                       <?php endif; ?>
                                 </div>
                              </div>
                           </div>
                        <?php endif; ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 
                           $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                           
                         ?>
                        <div class="row g-0 align-items-center">
                           <?php if(has_post_thumbnail()): ?>
                              <div class=" col-lg-9">
                                 <div class="binduz-er-editors-pack-thumb">
                                    <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                 </div>
                              </div>
                           <?php endif; ?>
                           <div class=" col-lg-3">
                              <div class="binduz-er-editors-pack-content">
                                    <div class="binduz-er-meta-item">
                                    <?php include('parts/category.php'); ?>
                                    <?php include('parts/date2.php'); ?>
                                    </div>
                                    <?php include('parts/title2.php'); ?>
                                    <div class="binduz-er-meta-author">
                                        <?php include('parts/author.php'); ?>
                                        <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                             <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                         <?php endif; ?>
                                    </div>
                                   
                              </div>
                           </div>
                        </div>

                        <?php
                           if($post_count==$query->current_post+1){
                              break;
                           } 
                        endwhile; wp_reset_postdata(); ?>
                     
                  </div>
             

            <?php endif; ?>
           
           
          
           
      <?php  
    }

  

    
}