<?php
namespace Binduz_Essential\Widgets\Mix;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php' );

if ( ! defined( 'ABSPATH' ) ) exit;

class Binduz_ER_Category extends Widget_Base {

   use \Elementor\Element_Ready_Common_Style;
   use \Elementor\Element_ready_common_content;
   use \Elementor\Element_Ready_Box_Style;
   public $base;

   public function get_name() {
        return 'binduz-er-news-category-list';
   }

   public function get_title() {
        return esc_html__( 'Er Binduz Category List', 'binduz-essential' );
   }

   public function get_icon() { 
        return 'eicon-post-list';
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
					
				],
			]
		);
   
 

      $this->end_controls_section();
      
      $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Category', 'binduz-essential'),
            ]
      );

      $this->add_group_control(
         \Elementor\Group_Control_Image_Size::get_type(),
         [
             'name' => 'thumbnail', 
             'exclude' => [ 'custom' ],
             'include' => [],
             'default' => 'thumbnail',
             'condition' => [
               'block_style' => ['style3'],
             ],
         ]
     );
 
   
      $repeater = new \Elementor\Repeater();
      $repeater->add_control(
         'custom_title',
            [
               'label'     => esc_html__('Custom Title', 'element-ready'),
               'type'      => Controls_Manager::SWITCHER,
               'label_on'  => esc_html__('Yes', 'element-ready'),
               'label_off' => esc_html__('No', 'element-ready'),
               'default'   => 'no',
               
            ]
      );

      $repeater->add_control(
         'list_title', [
             'label' => __( 'Title', 'element-ready-pro' ),
             'type' => \Elementor\Controls_Manager::TEXT,
             'default' => __( 'Title' , 'element-ready-pro' ),
             'label_block' => true,
         ]
      );

      $repeater->add_control(
         'custom_background',
            [
               'label'     => esc_html__('Custom Background', 'element-ready'),
               'type'      => Controls_Manager::SWITCHER,
               'label_on'  => esc_html__('Yes', 'element-ready'),
               'label_off' => esc_html__('No', 'element-ready'),
               'default'   => 'no',
               
            ]
      );

      $repeater->add_group_control(
      \Elementor\Group_Control_Background::get_type(),
         [
            'name' => 'list_background',
            'label' => __( 'Background', 'element-ready-pro' ),
            'types' => [ 'classic', 'gradient', 'video' ],
            'selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list {{CURRENT_ITEM}}.binduz-er-item',
         ]
      );


     if(function_exists('element_ready_get_post_category')){
      $repeater->add_control( 
            'cats',
            [
               'label'       => esc_html__('Select Categories', 'binduz-essential'),
               'type' => \Elementor\Controls_Manager::SELECT2,
               'options'     => element_ready_get_post_category(),
               'label_block' => true,
               'multiple'    => false,
              
            ]
      );
     }

  

      $this->add_control(
          'list',
          [
              'label' => __( 'Category List', 'element-ready-pro' ),
              'type' => \Elementor\Controls_Manager::REPEATER,
              'fields' => $repeater->get_controls(),
              'default' => [
                  [
                     'list_title' => __( 'Category', 'element-ready-pro' ),
                  ],
              ],
              'title_field' => '{{{ list_title }}}',
          ]
      );

      $this->end_controls_section();

      $this->text_wrapper_css(
         array(
 
             'title' => esc_html__('Title','element-ready'),
             'slug' => '_box_texte_item_box_style',
             'element_name' => '_box_textse_item_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-title ,{{WRAPPER}} .binduz-er-favorites-categories-list .binduz-er-item a span',
             'hover_selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list .binduz-er-item a:hover span, {{WRAPPER}} .binduz-er-favorites-categories-list .binduz-er-item a:hover span',
             'condition' => [
               'block_style' => ['style1','style2','style3'],
            ],
            
         )
      );
      
      $this->text_wrapper_css(
         array(
 
             'title' => esc_html__('Count','element-ready'),
             'slug' => '_box_count___box_style',
             'element_name' => '_box_count__wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list .binduz-er-item a span.binduz-er-number',
             'hover_selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list .binduz-er-item a:hover span.binduz-er-number',
             'condition' => [
               'block_style' => ['style1','style2'],
            ],
            
         )
      );  

      $this->box_css(
         array(
 
             'title' => esc_html__('Item','element-ready'),
             'slug' => '_box_single_item_box_style',
             'element_name' => '_box__single_item_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list .binduz-er-item',
             'hover_selector' => false,
             'condition' => [
               'block_style' => ['style1','style2'],
            ],
            
         )
      );
      
      $this->box_css(
         array(
 
             'title' => esc_html__('Box','element-ready'),
             'slug' => '_box__item_box_style',
             'element_name' => '_box__item_wrapper_element_ready_',
             'selector' => '{{WRAPPER}} .binduz-er-sidebar-categories .binduz-er-categories-list,{{WRAPPER}} .binduz-er-favorites-categories-box',
             'hover_selector' => false,
             'condition' => [
               'block_style' => ['style1','style2','style3'],
            ],
            
         )
      ); 
     
    }

    protected function render( ) { 

         $settings = $this->get_settings();
         $categories = $settings['list'];
         $thumbnail_size = $settings['thumbnail_size'];
         

        ?>
        <?php if($settings['block_style'] =='style1'): ?>
         
               <div class="binduz-er-sidebar-categories">
                  <div class="binduz-er-categories-list">
                        <?php foreach($categories as $item): ?>
                                 <?php
                                    if($item['cats'] == ''){
                                       continue;
                                    }
                                    $category = get_category($item['cats']); 
                                  
                                    $bg_image = '';
                                   
                                    if( function_exists('binduz_term_option') && $item['custom_background'] != 'yes'){
                                       $image    = binduz_term_option($category->term_id,'featured_upload_img');
                                    
                                       if(isset($image['url'])){
                                          $bg_image = 'style="background-image:url('.esc_url( $image['url'] ).');"'; 
                                       }

                                    }
                                   
                                 ?>
                              <div <?php echo $bg_image; ?> class="elementor-repeater-item-<?php echo $item['_id']; ?> binduz-er-item">
                                 <a  href="<?php echo esc_url(get_category_link($category)); ?>">
                                    <span><?php echo esc_html( $item['custom_title']=='yes'? $item['list_title']:$category->name); ?></span>
                                    <span class="binduz-er-number"> <?php echo str_pad($category->count, 2, "0", STR_PAD_LEFT); ?> </span>
                                 </a>
                              </div>
                        <?php endforeach; ?>
                  </div>
               </div>
           <?php endif; ?> 
           <?php if($settings['block_style'] == 'style3'): ?>

               <div class="binduz-er-favorites-categories-box">
                  <div class="binduz-er-favorites-categories-list">
                           <?php foreach($categories as $item): ?>
                              <?php

                                 if($item['cats'] == ''){
                                    continue;
                                 }
                                 $image = ['url'=>''];
                                 $category = get_category($item['cats']); 
                                 if(function_exists('binduz_term_option')){
                                    $image    = binduz_term_option($category->term_id,'featured_upload_img');
                                 }
                                 
                           ?>
                        <div class="binduz-er-item elementor-repeater-item-<?php echo $item['_id']; ?>">
                           <a href="#">
                               <?php if( function_exists('binduz_term_option') && $item['custom_background'] != 'yes'): ?>

                                 <?php if(isset($image['url']) && $image['url'] !=''): ?> 
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="cat image">
                                 <?php endif; ?>
                                 
                                 <?php else: ?>

                                    <?php if(isset($item['list_background_image']['id']) && $item['list_background_image']['id'] !=''): 
                                          
                                          $image_url = wp_get_attachment_image_src($item['list_background_image']['id'],$thumbnail_size);
                                          
                                         ?> 
                                       <img src="<?php echo esc_url( isset($image_url[0])?$image_url[0]:'' ); ?>" alt="cat image">
                                    <?php endif; ?>
                                    
                              <?php endif; ?>
                              <span><?php echo esc_html( $item['custom_title']=='yes'? $item['list_title']:$category->name); ?></span>
                           </a>
                        </div>

                        <?php endforeach; ?>
                  </div>
               </div>

           <?php endif; ?> 
     
        <?php

       
     }
    protected function content_template() { }

   
}