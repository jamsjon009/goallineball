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

class ER_Binduz_Grid_Top_Post extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-grid-top-post';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Top post', 'element-ready-pro' );
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
               'label'         => esc_html__( 'ReadMore Text', 'element-ready' ),
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
 
 
         $this->end_controls_section();
 
          
         $this->text_wrapper_css([
             'title' => esc_html__('Heading','element-ready'),
             'slug' => 'post_heading__box_style',
             'element_name' => 'post_heading_retor_element_ready_',
             'condition' => [
                 'block_style' => ['style1','style2'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title',
             'hover_selector' => false
         ]);

         $this->element_before_psudocode([
            'title' => esc_html__('Heading Shape','element-ready'),
            'slug' => 'post_heading_separetor_box_style',
            'element_name' => 'post_heading_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style1','style6'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title',
         ]);

     
       do_action( 'binduz_general_grid_top_post_tab', $this, $this->get_name() );
     
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
          
         ]
      ]);

      $this->text_wrapper_css(
         array(
             'title' => esc_html__('Number','element-ready'),
             'slug' => '_title_number_style',
             'element_name' => '_title_number_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-top-news-item > span',
            
         )
      );

    $this->text_css(
            array(
                'title' => esc_html__('Title wrapper','element-ready'),
                'slug' => '_title_wrapper_style',
                'element_name' => '_title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-item .binduz-er-title',
                'hover_selector' => false,
            
            )
        );

    $this->text_wrapper_css(
         array(
             'title' => esc_html__('Title','element-ready'),
             'slug' => '_title__style',
             'element_name' => '_title_apper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-top-news-item .binduz-er-title a',
            
         )
      );
   
    $this->text_wrapper_css(
         array(
            'title' => esc_html__('Date','binduz_essential'),
            'slug' => 'post_date_style',
            'element_name' => 'post_date_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-top-news-item .binduz-er-meta-date span',
            'hover_selector' => '{{WRAPPER}} .binduz-er-top-news-item .binduz-er-meta-date span:hover',
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
               'selector' => '{{WRAPPER}} .binduz-er-top-news-item .binduz-er-meta-date span i',
               'hover_selector' => false,
               'condition' => [
                  'show_date' => 'yes',
               ],
            )
      );
     
    $this->box_css(
        array(

            'title' => esc_html__('Box','element-ready'),
            'slug' => '_box_verwr_box_style',
            'element_name' => '_box_ver_wer_wrapper_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-top-news-item',
           
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
                     <?php if($settings['news_heading'] =='yes'): ?>
                        <div class="binduz-er-top-news-title">
                           <h3 class="binduz-er-title"> <?php echo esc_html($settings['news_heading_title']); ?> </h3>
                        </div>
                     <?php endif; ?>
                     
                     <?php while ($query->have_posts()) : $query->the_post(); ?>
                           <div class="binduz-er-top-news-item">
                                 <span> <?php echo str_pad($query->current_post+1, 2, "0", STR_PAD_LEFT); ?> </span>
                                 <?php include('parts/title2.php');  ?>
                                 <?php include('parts/date2.php');  ?>
                                 <?php if(isset($settings['ex_show_readmore']) && $settings['ex_show_readmore'] =='yes' ): ?>
                                    <a class="b-readmore" href="<?php the_permalink() ?>" ><?php echo $settings['ex_text_readmore']; ?> </a> 
                                 <?php endif; ?>
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