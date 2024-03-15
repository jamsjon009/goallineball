<?php
namespace Binduz_Essential\Widgets\heronews;

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

class ER_Binduz_Post_grid_Overlay extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'element-ready-binduz-overlay-grid-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Overlay Grid', 'element-ready-pro' );
    }
    public function get_style_depends(){

        
        return [
               
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
					'style2'  => esc_html__( 'Style 2', 'element-ready' ),
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
       do_action( 'binduz_general_overlay_grid_tab', $this, $this->get_name() );
     
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
             'meta_cat_icon'=> [
               'label'         => esc_html__( 'Meta Category Icon', 'binduz_essential' ),
               'type' => \Elementor\Controls_Manager::ICONS,
             ],

             'meta_date_icon'=> [
               'label'         => esc_html__( 'Meta Date Icon', 'binduz_essential' ),
               'type' => \Elementor\Controls_Manager::ICONS,
             ],

             'meta_share_icon'=> [
               'label'         => esc_html__( 'Meta share Icon', 'binduz_essential' ),
               'type' => \Elementor\Controls_Manager::ICONS,
             ],

             
         ]
      ]);
       $this->text_css(
            array(
                'title' => esc_html__('Title wrapper','element-ready'),
                'slug' => '_title_wrapper_style',
                'element_name' => '_title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-title',
                'hover_selector' => false,
            
            )
        );
      $this->text_wrapper_css(
         array(
             'title' => esc_html__('Title','element-ready'),
             'slug' => '_title__style',
             'element_name' => '_title_apper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-title a',
            
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
            'title' => esc_html__('Category Wrapper','element-ready'),
            'slug' => '_cat_wbox_style',
            'element_name' => '_cat_wwer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-categories',
            'hover_selector' => false,
        )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Category','element-ready'),
            'slug' => '_cat_box_style',
            'element_name' => '_cat_wer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-categories a',
         )
      );
      

      $this->start_controls_section('er_binduz_image_section',
            [
               'label' => esc_html__( 'Image ', 'element-ready-pro' ),
               'tab'   => Controls_Manager::TAB_STYLE,
               'condition' => [
                  'block_syle' => ['style1']
               ]
            ]
      );

         $this->add_responsive_control(
            'image_margin',
            [
               'label'      => esc_html__( ' Margin', 'element-ready-pro' ),
               'type'       => Controls_Manager::DIMENSIONS,
               'size_units' => [ 'px','%'],
               'selectors'  => [
                  '{{WRAPPER}} .binduz-er-trending-news-item img'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .binduz-er-trending-news-item img'     => 'height: {{SIZE}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .binduz-er-trending-news-item img'     => 'width: {{SIZE}}{{UNIT}};',
                  
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
                  '{{WRAPPER}} .binduz-er-trending-news-item img'     => 'max-width: {{SIZE}}{{UNIT}};',
               
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
                  
                  '{{WRAPPER}} .binduz-er-trending-news-item img'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
                  
               ],
            ]
         );

      $this->end_controls_section();
      
     
     
      $this->box_css(
         array(

             'title' => esc_html__('Social item','element-ready'),
             'slug' => '_social_wr_box_style',
             'element_name' => '_social_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-news-share',
             'hover_selector' => false,
         )
      ); 
      
      

      $this->text_wrapper_css(
         array(

             'title' => esc_html__('Social icon','element-ready'),
             'slug' => '_social_icon_box_style',
             'element_name' => '_social_icon_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-news-share a i',
             'hover_selector' => '{{WRAPPER}} .binduz-er-news-share:hover a i',
         )
      );

      $this->box_css(
        array(

            'title' => esc_html__('Box','element-ready'),
            'slug' => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-trending-news-item',
           
        )
     ); 
      
      $this->box_css(
         array(

             'title' => esc_html__('Content Overlay','element-ready'),
             'slug' => '_contnt_verwr_box_style',
             'element_name' => '_content_ver_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-trending-news-item .binduz-er-trending-news-overlay',
            
         )
      ); 

      $this->box_css(
         array(

             'title' => esc_html__('Hover Content overlay','element-ready'),
             'slug' => '_contnt_hoverwr_box_style',
             'element_name' => '_content_hover_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-trending-news-item:hover .binduz-er-trending-news-overlay',
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
                  <div class="binduz-er-trending-box">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                     <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                              <div class="binduz-er-trending-news-item">
                                 <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                 <div class="binduz-er-trending-news-overlay">
                                    <div class="binduz-er-trending-news-meta">
                                          <?php include('parts/category2.php');  ?>
                                          <?php include('parts/date.php');  ?>
                                          <div class="binduz-er-trending-news-title">
                                             <?php include('parts/title.php');  ?>
                                          </div>
                                          <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                             <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                          <?php endif; ?>
                                    </div>
                                    <?php include('parts/share.php');  ?>
                                 </div>
                              </div>
                     <?php
                     
                     if($post_count==$query->current_post+1){
                     break;
                     } 
                     endwhile; wp_reset_postdata(); ?>
                  </div>
            <?php endif; ?>
            <?php if($settings['block_style'] =='style2'): ?>

                  <div class="binduz-er-top-news-2-item binduz-er-top-news-2-1-item">
                  <?php while ($query->have_posts()) : $query->the_post(); ?>
                     <?php 
                      $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                      $banner_image  = '';
                      if( isset($_blog_image) && $_blog_image != ''){
                          $banner_image = 'style="background-image:url('.esc_url( $_blog_image ).');"';
                      } 
                     ?>
                        <div class="binduz-er-trending-news-item mb-30">
                              <div class="binduz-er-trending-news-overlay" <?php echo $banner_image; ?> >
                                 <div class="binduz-er-trending-news-meta">
                                     <?php include('parts/category2.php');  ?>
                                     <?php include('parts/date.php');  ?>
                                    <div class="binduz-er-trending-news-title">
                                       <?php include('parts/title.php');  ?>
                                    </div>
                                    <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                             <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                          <?php endif; ?>
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