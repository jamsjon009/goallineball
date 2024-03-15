<?php
namespace Binduz_Essential\Widgets\Mix;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Custom_Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;

require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php' );

if ( ! defined( 'ABSPATH' ) ) exit;

class Binduz_ER_Title extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-gmix-heading-title';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Heading', 'element-ready-pro' );
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
					'style3'  => esc_html__( 'Style 2', 'element-ready' ),
					
				],
			]
		);

       $this->end_controls_section();

       $this->start_controls_section(
         'section_heading_tab',
         [
         'label' => esc_html__('Content', 'element-ready-pro'),
         'condition' => [
             'block_style' => ['style1','style2','style3']
                 ]
             ]
         );
 
       
         $this->add_control(
            'title', [
                'label' => __( 'Title', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Heading' , 'element-ready-pro' ),
                'label_block' => true,
            ]
        );
 
         $this->end_controls_section();

         $this->box_css(
            array(
    
                'title' => esc_html__('Title Wrapper','element-ready'),
                'slug' => '_box_text_wr_single_item_box_style',
                'element_name' => '_box_textsre_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-title,{{WRAPPER}} .binduz-er-sidebar-social .binduz-er-sidebar-title,{{WRAPPER}} .binduz-er-trending-box .binduz-er-title-wrapper',
                'hover_selector' => false,
                'condition' => [
                  'block_style' => ['style1','style2','style3'],
               ],
               
            )
         ); 
   
         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Title','element-ready'),
                'slug' => '_box_text_single_item_box_style',
                'element_name' => '_box_texts_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-title',
                'hover_selector' => '{{WRAPPER}} .binduz-er-title:hover,{{WRAPPER}} .binduz-er-trending-box .binduz-er-title-wrapper .binduz-er-title',
                'condition' => [
                  'block_style' => ['style1','style2','style3'],
               ],
               
            )
         ); 

  
         $this->element_before_psudocode([
            'title' => esc_html__('Shape','element-ready'),
            'slug' => 'post_headig_separetor_box_style',
            'element_name' => 'post_headig_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style1','style2','style3'],
             ],
             'selector' => '{{WRAPPER}} .binduz-er-sidebar-social .binduz-er-sidebar-title::before,{{WRAPPER}} .binduz-er-trending-box .binduz-er-title-wrapper .binduz-er-title::before, {{WRAPPER}} .binduz-er-top-news-title .binduz-er-title::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-sidebar-social .binduz-er-sidebar-title,{{WRAPPER}} .binduz-er-trending-box .binduz-er-title-wrapper .binduz-er-title ,{{WRAPPER}} .binduz-er-top-news-title .binduz-er-title',
         ]);

         $this->box_css(
            array(
    
                'title' => esc_html__('Box','element-ready'),
                'slug' => '_box_innerr_box_style',
                'element_name' => '_box_inner_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-sidebar-social .binduz-er-sidebar-title',
                'condition' => [
                  'block_style' => ['style1'],
               ],
               
            )
         ); 

  
     

    }

    protected function render( ) { 

        $settings        = $this->get_settings();
       

        ?>

           <?php if($settings['block_style'] =='style1'): ?>

                <div class="binduz-er-sidebar-social">
                    <div class="binduz-er-sidebar-title">
                        <h4 class="binduz-er-title"> <?php echo esc_html($settings['title']); ?> </h4>
                    </div>
                </div>

            <?php endif; ?>

            <?php if($settings['block_style'] =='style2'): ?>
            <div class="binduz-er-trending-box">
                <div class="binduz-er-title binduz-er-title-wrapper">
                    <h3 class="binduz-er-title"><?php echo esc_html($settings['title']); ?> </h3>
                </div>
            </div>
            <?php endif; ?> 
            
            <?php if($settings['block_style'] =='style3'): ?>
                <div class="binduz-er-top-news-title">
                    <h3 class="binduz-er-title"><?php echo esc_html($settings['title']); ?></h3>
                </div>
            <?php endif; ?>
   

           
          
           
      <?php  
    }

  

    
}