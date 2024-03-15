<?php
namespace Binduz_Essential\Widgets\Grid_Tab;

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

class Er_Binduz_Image_Post_Tab extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'binduz-image-post-grid-tab';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Image Tab', 'element-ready-pro' );
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
					
				],
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


        $this->end_controls_section();

        $this->element_before_psudocode([
            'title' => esc_html__('Heading Shape','element-ready'),
            'slug' => 'post_heading_separetor_box_style',
            'element_name' => 'post_heading_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style1'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-trending-video-news-title .binduz-er-title::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-trending-video-news-title .binduz-er-title',
        ]);

        $this->text_wrapper_css([
            'title' => esc_html__('Heading','element-ready'),
            'slug' => 'post_heading__box_style',
            'element_name' => 'post_heading_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-trending-video-news-title .binduz-er-title',
            'hover_selector' => false
        ]);


       do_action( 'binduz_general_image_grid_tab', $this, $this->get_name() );
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
               'label'         => esc_html__( 'Meta video Icon', 'binduz_essential' ),
               'type' => \Elementor\Controls_Manager::ICONS,
             ],

             
         ]
      ]);
       $this->text_css(
            array(
                'title' => esc_html__('Title wrapper','element-ready'),
                'slug' => '_title_wrapper_style',
                'element_name' => '_title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-trending-news-title',
                'hover_selector' => false,
            
            )
        );
      $this->text_wrapper_css(
         array(
             'title' => esc_html__('Title','element-ready'),
             'slug' => '_title__style',
             'element_name' => '_title_apper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-title.er-news-title-gl a',
            
         )
      );

      $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date','binduz_essential'),
            'slug' => 'post_date_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-date span',
            'hover_selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-date span:hover',
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
            'selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-date span i',
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
            'selector' => '{{WRAPPER}} .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-categories',
            'hover_selector' => false,
        )
     );

     $this->text_wrapper_css(
         array(
            'title' => esc_html__('Category','element-ready'),
            'slug' => '_cat_box_style',
            'element_name' => '_cat_wer_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-news-meta .binduz-er-meta-categories a',
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
                  '{{WRAPPER}} .nav-item img'     => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .nav-item img'     => 'height: {{SIZE}}{{UNIT}};',
               
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
                  '{{WRAPPER}} .nav-item img'     => 'width: {{SIZE}}{{UNIT}};',
                  
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
                  '{{WRAPPER}} .nav-item img'     => 'max-width: {{SIZE}}{{UNIT}};',
               
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
                  
                  '{{WRAPPER}} .nav-item img'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
               
                  
               ],
            ]
         );

      $this->end_controls_section();
      
     
     
      $this->box_css(
         array(

             'title' => esc_html__('Video','element-ready'),
             'slug' => '_social_wr_box_style',
             'element_name' => '_social_wer_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-play a',
             'hover_selector' => false,
         )
      ); 
      
      

      $this->text_wrapper_css(
         array(

             'title' => esc_html__('Video icon','element-ready'),
             'slug' => '_social_icon_box_style',
             'element_name' => '_social_icon_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-play a i',
             'hover_selector' => '{{WRAPPER}} .binduz-er-trending-video-play-news .binduz-er-top-news-2-item .binduz-er-trending-news-item .binduz-er-trending-news-overlay .binduz-er-trending-play:hover a i',
         )
      );

      $this->box_css(
        array(

            'title' => esc_html__('Box','element-ready'),
            'slug' => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-video-post-box',
           
        )
     ); 
      

    }

    protected function render( ) { 

        $settings        = $this->get_settings();
        $post_title_crop = $settings['post_title_crop'];
        $post_count      = $settings['post_count'];
        $data            = new Base_Modal($settings);
        $thumbnail_size = $settings['thumbnail_size'];
        $main_size = $settings['big_thumbnail_size'];
        $query = $data->get();
        
        if(!$query){
          return;  
        }

        ?>

           <?php if($settings['block_style'] =='style1'): ?>
                <div class="binduz-er-video-post-box">
                    <?php if( $settings['news_heading'] =='yes' ): ?>
                        <div class="binduz-er-trending-video-news-title">
                            <h3 class="binduz-er-title"><?php echo esc_html( $settings['news_heading_title']); ?></h3>
                        </div>
                    <?php endif; ?>
                    <div class="tab-content">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php

                                        $featured_video = binduz_meta_option(get_the_id(),'featured_video');
                                      
                                   
                                    
                                    ?>
                                <?php
                                
                                 $_blog_image = get_the_post_thumbnail_url(null,$main_size);
                                 $banner_image  = '';
                                 if( isset($_blog_image) && $_blog_image != ''){
                                     $banner_image = 'style="background-image:url('.esc_url( $_blog_image ).');"';
                                 }

                                ?>
                                    <div class="tab-pane fade <?php echo $query->current_post==0?'show active':''; ?> " id="<?php echo esc_attr('post-'.$query->current_post.'-tab'.$this->get_id()); ?>" >
                                        <div class="binduz-er-trending-video-play-news">
                                            <div class="binduz-er-top-news-2-item">
                                                <div class="binduz-er-trending-news-item mb-30" <?php echo $banner_image; ?>>
                                                    <div class="binduz-er-trending-news-overlay">
                                                        <div class="binduz-er-trending-news-meta">
                                                             <?php include('parts/category.php');  ?>
                                                             <?php include('parts/date2.php');  ?>
                                                            <div class="binduz-er-trending-news-title">
                                                                <?php include('parts/title2.php');  ?>
                                                            </div>
                                                        </div>
                                                        <?php if(get_post_format() == 'video'): ?>
                                                        <div class="binduz-er-trending-play">
                                                         <a class="binduz-er-video-popup" href="<?php echo $featured_video; ?>" >
                                                            <i class="fas fa-play"></i>
                                                           </a>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                    </div>

                    <div class="binduz-er-trending-video-thumbs">
                        <ul class="nav nav-pills" id="pills-tab-trending" role="tablist">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <?php $_blog_image = get_the_post_thumbnail_url(null,$thumbnail_size); ?>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link <?php echo $query->current_post==0?'active':''; ?> " data-bs-toggle="pill" data-bs-target="#<?php echo esc_attr('post-'.$query->current_post.'-tab'.$this->get_id()); ?>" type="button">
                                    <img src="<?php echo esc_url($_blog_image); ?>" alt="<?php echo esc_attr__('image','binduz-essential'); ?>">
                                    </button>
                                </li>

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            ?>
                            
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        
           
      <?php  
    }

  

    
}