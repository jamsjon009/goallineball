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

class ER_Binduz_Post_grid extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'element-ready-binduz-grid-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Vartical Grid', 'element-ready-pro' );
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
					'style2'  => esc_html__( 'Style 2', 'element-ready' ),
					'style3'  => esc_html__( 'Style 3', 'element-ready' ),
					'style4'  => esc_html__( 'Style 4', 'element-ready' ),
				],
			]
		);
      $this->add_control(
			'enable_container',
			[
				'label' => __( 'Container Enable', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
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
       do_action( 'binduz_general_grid_vertical_tab', $this, $this->get_name() );
     
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
            'selector' => '{{WRAPPER}} .binduz-er-meta-categories a,{{WRAPPER}} .binduz-er-trending-today-item .binduz-er-trending-news-list-box .binduz-er-content .binduz-er-meta-item .binduz-er-meta-categories a',
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
      
      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Author text','binduz_essential'),
            'slug' => 'posts_author_style',
            'element_name' => 'posts_author_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-author span',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-author span:hover',
            'condition' => [
               'show_author' => 'yes',
               'block_style' => ['style3'],
            ],
         )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Author name','binduz_essential'),
            'slug' => 'post_author_style',
            'element_name' => 'post_author_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-author span span a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-author span span:hover a',
            'condition' => [
               'show_author' => 'yes',
               'block_style' => ['style3'],
            ],
         )
     );

     $this->text_wrapper_css(
      array(
         'title' => esc_html__('Content Box','binduz_essential'),
         'slug' => 'post_content_box_style',
         'element_name' => 'post_contentbox_element_ready_',
         'selector' => '{{WRAPPER}} .binduz-er-content',
         'hover_selector' => false,
         
      )
  );

     $this->box_css(
      array(

          'title' => esc_html__('Item','element-ready'),
          'slug' => '_contnt_item_box_style',
          'element_name' => '_content_ver_item_wrapper_element_ready_',
          'selector' => '{{WRAPPER}} .binduz-er-trending-news-list-box,{{WRAPPER}} .binduz-er-latest-news-item,{{WRAPPER}} .binduz-er-trending-news-list-box',
         
      )
   ); 
      $this->box_css(
        array(

            'title' => esc_html__('Box','element-ready'),
            'slug' => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-trending-today-item,{{WRAPPER}} .binduz-er-main-posts-item,{{WRAPPER}} .binduz-er-editors-pack-item',
           
        )
     ); 
      
      $this->box_css(
         array(

             'title' => esc_html__('Box Inner','element-ready'),
             'slug' => '_contnt_verwr_box_style',
             'element_name' => '_content_ver_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-trending-news-list-box,{{WRAPPER}} .binduz-er-trending-news-list-box,{{WRAPPER}} .binduz-er-recently-viewed-item',
            
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
            <div class="<?php echo $settings['enable_container'] =='yes'?'container':''; ?> ">
                     <div class="row">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                           <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                           <div class="col-lg-3 col-md-6">
                              <div class="binduz-er-trending-today-item">
                                    <div class="binduz-er-trending-news-list-box">
                                       <div class="binduz-er-thumb">
                                          <?php if(has_post_thumbnail()): ?>
                                             <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                          <?php endif; ?>
                                       </div>
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
                              </div>
                           </div>
                        <?php
                     
                           if($post_count==$query->current_post+1){
                                break;
                           } 
                        endwhile; wp_reset_postdata(); ?>
                     </div>
               </div>      
            <?php endif; ?>

            <?php if($settings['block_style'] =='style2'): ?>
               <div class="<?php echo $settings['enable_container'] =='yes'?'container':''; ?> ">
                     <div class="row">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                           <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                           <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="binduz-er-main-posts-item">
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
                                            <?php if($settings['show_content'] =='yes'): ?>
                                              <p class="er-binduz-news-content"><?php echo wp_trim_words( get_the_excerpt(), $settings['post_content_crop'],'' ); ?></p>
                                            <?php endif; ?>
                                            <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                             <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                          <?php endif; ?>
                                        </div>
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
                  </div>
             
            <?php endif; ?>
            <?php if( $settings['block_style'] =='style3' ): ?>
                  <div class="binduz-er-editors-pack-item">
                     <div class="row g-0">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                           <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                              <div class=" col-lg-3 col-md-6">
                                    <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                       <div class="binduz-er-latest-news-item">
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
                                                <?php include('parts/title.php');  ?>
                                                <?php include('parts/author2.php');  ?>
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
                  </div>
            <?php endif; ?>

            <?php if( $settings['block_style'] =='style4' ): ?>
                  <div class="binduz-er-editors-pack-item">
                   <div class="<?php echo $settings['enable_container'] =='yes'?'container':''; ?>">
                     <div class="row g-0">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                           <?php  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size) ?>
                              <div class=" col-lg-4 col-md-6">
                                    <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                       <div class="binduz-er-latest-news-item">
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
                                                <?php include('parts/title.php');  ?>
                                                <?php include('parts/author2.php');  ?>

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
                     </div>
                  </div>
            <?php endif; ?>
          
           
      <?php  
    }

  

    
}