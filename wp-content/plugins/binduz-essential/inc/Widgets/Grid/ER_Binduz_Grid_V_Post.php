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

class ER_Binduz_Grid_V_Post extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-grid-v-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Video Grid', 'binduz-essential' );
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
                'label' => esc_html__('Layout', 'binduz-essential'),
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
					'style5'  => esc_html__( 'Style 5', 'element-ready' ),
					
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
               'label'         => esc_html__( 'ReadMore Text', 'element-ready' ),
               'type'          => Controls_Manager::TEXT,
               'default'       => 'readmore',
            ]
      );

       $this->end_controls_section();

       $this->start_controls_section(
         'section_heading_tab',
         [
         'label' => esc_html__('Heading', 'binduz-essential'),
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
 
 
         $this->end_controls_section();
 
          
         $this->text_wrapper_css([
             'title' => esc_html__('Heading','element-ready'),
             'slug' => 'post_heading__box_style',
             'element_name' => 'post_heading_retor_element_ready_',
             'condition' => [
                 'block_style' => ['style1','style2'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-video-post-box .binduz-er-video-post-title .binduz-er-title,{{WRAPPER}} .binduz-er-recent-news-title .binduz-er-title',
             'hover_selector' => false
         ]);

         $this->element_before_psudocode([
            'title' => esc_html__('Heading Shape','element-ready'),
            'slug' => 'post_heading_separetor_box_style',
            'element_name' => 'post_heading_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style2','style6'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-video-post-box .binduz-er-video-post-title .binduz-er-title::before, {{WRAPPER}} .binduz-er-recent-news-title .binduz-er-title::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-video-post-box .binduz-er-video-post-title .binduz-er-title,{{WRAPPER}} .binduz-er-recent-news-title .binduz-er-title',
         ]);

       do_action( 'binduz_general_grid_video_tab', $this, $this->get_name() );
     
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

               'meta_video_icon'=> [
                  'label'         => esc_html__( 'Meta Video Icon', 'binduz_essential' ),
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
             'hover_selector' => '{{WRAPPER}} .binduz-er-title:hover a',
            
         )
      );

      $this->box_css(
         array(
 
             'title' => esc_html__('Meta Container','element-ready'),
             'slug' => '_box_meta_box_style',
             'element_name' => '_box_ver_meta_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-meta-item',
             'condition' => [
               'block_style' => ['style3','style2','style4'],
            ],
            
         )
      );
   
      $this->box_css(
         array(
            'title' => esc_html__('Date','binduz_essential'),
            'slug' => 'post_date_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-date',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-date:hover',
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
               'label' => esc_html__( 'Image ', 'binduz-essential' ),
               'tab'   => Controls_Manager::TAB_STYLE,
               
            ]
      );

      $this->add_control(
			'image_top',
			[
				'label' => __( 'Image Top', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
            'condition' => [
               'block_style' => ['style3'],
            ],
            
			]
		);
      
      $this->add_control(
			'image_bottom',
			[
				'label' => __( 'Image Bottom', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => '',
            'condition' => [
               'block_style' => ['style5'],
            ],
            
			]
		);

         $this->add_responsive_control(
            'image_margin',
            [
               'label'      => esc_html__( 'Margin', 'binduz-essential' ),
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
               'label'      => esc_html__( 'Image height', 'binduz-essential' ),
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
               'label'      => esc_html__( 'Image width', 'binduz-essential' ),
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
               'label'      => esc_html__( 'Max width', 'binduz-essential' ),
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
               'label'      => esc_html__( 'Image Border radius', 'binduz-essential' ),
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
            'title' => esc_html__('Video','element-ready'),
            'slug' => 'post_video_style',
            'element_name' => 'post_video_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-thumb .binduz-er-play a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-thumb .binduz-er-play:hover a',
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
            'selector' => '{{WRAPPER}} .binduz-er-thumb .binduz-er-play a i',
            'hover_selector' => '{{WRAPPER}} .binduz-er-thumb .binduz-er-play:hover a i',
            'condition' => [
             'block_style' => ['style1'],
          ],
     
         )
      );

      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Author text','binduz_essential'),
            'slug' => 'posts_author_style',
            'element_name' => 'posts_author_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-meta-author span',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-author span:hover',
            'condition' => [
               'show_author' => 'yes',
               'block_style' => ['style4'],
            ],
         )
     );

     $this->text_wrapper_css(
         array(
            'title'          => esc_html__('Author name','binduz_essential'),
            'slug'           => 'post_author_style',
            'element_name'   => 'post_author_element_ready_',
            'selector'       => '{{WRAPPER}} .binduz-er-meta-author .binduz-er-author-name',
            'hover_selector' => '{{WRAPPER}} .binduz-er-meta-author span:hover .binduz-er-author-name',
            'condition'      => [
               'show_author' => 'yes',
               'block_style' => ['style4'],
            ],
         )
     );

      $this->box_css(
        array(

            'title'        => esc_html__('Box','element-ready'),
            'slug'         => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector'     => '{{WRAPPER}} .binduz-er-video-post-box,{{WRAPPER}} .binduz-er-recent-news-box,{{WRAPPER}} .binduz-er-video-post',
           
        )
     ); 
      
      $this->box_css(
         array(

             'title'        => esc_html__('Box Inner','element-ready'),
             'slug'         => '_contnt_verwr_box_style',
             'element_name' => '_content_ver_wer_wrapper_element_ready_',
             'selector'     => '{{WRAPPER}} .binduz-er-latest-news-item, {{WRAPPER}} .binduz-er-video-post-box .binduz-er-latest-news-item,{{WRAPPER}} .binduz-er-recent-news-box .binduz-er-recent-news-item',
            
         )
      ); 

      $this->box_css(
         array(

             'title'        => esc_html__('Navigation','element-ready'),
             'slug'         => '_contnt_nav_box_style',
             'element_name' => '_content_nav_wrapper_element_ready_',
             'selector'     => '{{WRAPPER}} .binduz-er-recent-news-box nav',
             'condition'    => [
               'block_style' => ['style2'],
              ],
            
         )
      ); 

      $this->text_wrapper_css(
         array(
            'title'          => esc_html__('Navigation Item','element-ready'),
            'slug'           => 'post_nav_item_video_style',
            'element_name'   => 'post_inav_item_element_ready_',
            'selector'       => '{{WRAPPER}} .binduz-er-recent-news-box nav .pagination .page-item a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-recent-news-box nav .pagination .page-item:hover a',
            'condition'      => [
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
       
        // is_front_page()
        $data            = new Base_Modal($settings);
        if(is_front_page()){
         $data->args['paged'] = get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1;
        }
   
        $thumbnail_size = $settings['thumbnail_size'];
        $query = $data->get();
        
        if(!$query){
          return;  
        }

        ?>

           <?php if($settings['block_style'] =='style1'): ?>
                
                  <div class="binduz-er-video-post-box">
                     <?php if($settings['news_heading'] =='yes'): ?>
                        <div class="binduz-er-video-post-title">
                              <h3 class="binduz-er-title"> <?php echo $settings['news_heading_title']; ?> </h3>
                        </div>
                     <?php endif; ?>
                     <div class="binduz-er-video-post">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 
                           $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                           $featured_video = binduz_meta_option(get_the_id(),'featured_video');
                         ?>
                           <div class="binduz-er-latest-news-item">
                                 <div class="binduz-er-thumb">
                                    <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                    <?php if( get_post_format() == 'video' && $featured_video !='' && $settings['show_video'] == 'yes' ): ?>
                                       <div class="binduz-er-play">
                                          <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>">
                                          <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php else: ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php endif; ?>
                                          </a>
                                       </div>
                                    <?php endif; ?>
                                 </div>
                                 <div class="binduz-er-content">
                                    <div class="binduz-er-meta-item">
                                       <?php include('parts/date2.php');  ?>
                                    </div>
                                    <?php include('parts/title2.php');  ?>
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
                           ?>
                       </div> 
                     </div>
                  
            <?php endif; ?>
            <?php if($settings['block_style'] == 'style2'): ?>
            
                  <div class="binduz-er-recent-news-box">

                     <?php if($settings['news_heading'] =='yes'): ?>
                        <div class="binduz-er-recent-news-title">
                              <h3 class="binduz-er-title"><?php echo $settings['news_heading_title']; ?></h3>
                        </div>
                     <?php endif; ?>
                  
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 

                           $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                           $featured_video = binduz_meta_option(get_the_id(),'featured_video');
                        
                        ?>
                              <div class="binduz-er-recent-news-item mb-20">
                                    <?php if(has_post_thumbnail()): ?> 
                                       <div class="binduz-er-thumb">
                                          <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                       </div>
                                    <?php endif; ?>
                                    <div class="binduz-er-content">
                                       <div class="binduz-er-meta-item">
                                       <?php include('parts/category.php'); ?>
                                       <?php include('parts/date2.php');  ?>
                                       </div>
                                       <?php include('parts/title2.php');  ?>
                                       <?php include('parts/content2.php');  ?>
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
                        
                        ?>
                        <?php if($settings['show_nav'] == 'yes'): ?>
                         <?php include('parts/pagination.php'); ?>
                        <?php endif; ?>
                     
                        <?php wp_reset_postdata(); ?>
                  </div>
            
            <?php endif; ?>
            <?php if($settings['block_style'] == 'style3'): ?>

                     <div class="binduz-er-video-post">
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 

                           $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                           $featured_video = binduz_meta_option(get_the_id(),'featured_video');
                        
                        ?>
                           <?php if(has_post_thumbnail() && $settings['image_top'] =='yes'): ?> 
                              <div class="binduz-er-thumb">
                                 <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                    <?php if( get_post_format() == 'video' && $featured_video !='' && $settings['show_video'] == 'yes' ): ?>
                                       <div class="binduz-er-play">
                                          <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>" >
                                          <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php else: ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php endif; ?>
                                          </a>
                                       </div>
                                    <?php endif; ?>
                              </div>
                            <?php endif; ?>
                        <div class="binduz-er-latest-news-item">
                           <?php if(has_post_thumbnail() && $settings['image_top'] !='yes'): ?> 
                              <div class="binduz-er-thumb">
                                 <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                    <?php if( get_post_format() == 'video' && $featured_video !='' && $settings['show_video'] == 'yes' ): ?>
                                       <div class="binduz-er-play">
                                          <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>" >
                                          <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php else: ?>
                                                <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                             <?php endif; ?>
                                          </a>
                                       </div>
                                    <?php endif; ?>
                              </div>
                            <?php endif; ?>
                            <div class="binduz-er-content">
                                <div class="binduz-er-meta-item">
                                    <?php include('parts/category.php'); ?>
                                    <?php include('parts/date2.php'); ?>
                                </div>
                                <?php include('parts/title2.php'); ?>
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
                        ?>
                    </div>
            <?php endif; ?>
            <?php if($settings['block_style'] == 'style5'): ?>

            <div class="binduz-er-video-post">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
               <?php 

                  $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                  $featured_video = binduz_meta_option(get_the_id(),'featured_video');
               
               ?>
                 
               <div class="binduz-er-latest-news-item">
                  <?php if(has_post_thumbnail() && $settings['image_bottom'] !='yes'): ?> 
                     <div class="binduz-er-thumb">
                        <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                           <?php if( get_post_format() == 'video' && $featured_video !='' && $settings['show_video'] == 'yes' ): ?>
                              <div class="binduz-er-play">
                                 <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>" >
                                 <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                       <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php else: ?>
                                       <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php endif; ?>
                                 </a>
                              </div>
                           <?php endif; ?>
                     </div>
                  <?php endif; ?>
                  <div class="binduz-er-content">
                     <div class="binduz-er-meta-item">
                           <?php include('parts/category.php'); ?>
                           <?php include('parts/date2.php'); ?>
                     </div>
                   
                     <?php include('parts/title2.php'); ?>
                     <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                        <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                     <?php endif; ?>
                  </div>
                  <?php if(has_post_thumbnail() && $settings['image_bottom'] =='yes'): ?> 
                     <div class="binduz-er-thumb">
                        <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                           <?php if( get_post_format() == 'video' && $featured_video !='' && $settings['show_video'] == 'yes' ): ?>
                              <div class="binduz-er-play">
                                 <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>" >
                                 <?php if($settings['meta_video_icon']['library'] !=''): ?>
                                       <?php \Elementor\Icons_Manager::render_icon( $settings['meta_video_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php else: ?>
                                       <?php \Elementor\Icons_Manager::render_icon( $settings['meta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php endif; ?>
                                 </a>
                              </div>
                           <?php endif; ?>
                     </div>
                  <?php endif; ?>
                 
               </div>
                  
               <?php

                  if($post_count==$query->current_post+1){
                        break;
                     }
                  endwhile; 
               ?>
            </div>

            <?php endif; ?>
            <?php if($settings['block_style'] == 'style4'): ?>
             
               <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php 

                           $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size);
                           $featured_video = binduz_meta_option(get_the_id(),'featured_video');
                        
                        ?>
                           <div class="binduz-er-latest-news-item">
                              <?php if(has_post_thumbnail()): ?>
                                 <div class="binduz-er-thumb">
                                    <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                 </div>
                              <?php endif; ?>
                              <div class="binduz-er-content">
                                    <?php include('parts/category.php'); ?>
                                    <?php include('parts/title2.php'); ?>
                                    <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                       <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                    <?php endif; ?>
                                 <div class="binduz-er-meta-item">
                                    <?php include('parts/author2.php'); ?>
                                    <?php include('parts/date2.php'); ?>
                                 </div>
                              </div>
                        </div>
                    <?php

                     if($post_count==$query->current_post+1){
                           break;
                        }
                     endwhile; 
                     ?>
            <?php endif; ?>
           
      <?php  
    }

  

    
}