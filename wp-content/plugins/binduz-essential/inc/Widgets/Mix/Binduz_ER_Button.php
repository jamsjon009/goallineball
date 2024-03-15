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

class Binduz_ER_Button extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-gmix-info-button';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Button', 'element-ready-pro' );
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
         'label' => esc_html__('Content', 'element-ready-pro'),
         'condition' => [
             'block_style' => ['style1']
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
        
        $this->add_control(
            'button_text', [
                'label' => __( 'Button TExt', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Button' , 'element-ready-pro' ),
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'button_text_url', [
                'label' => __( 'Button url', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
                'label_block' => true,
            ]
        );
 
         $this->end_controls_section();

         $this->box_css(
            array(
    
                'title' => esc_html__('Title Wrapper','element-ready'),
                'slug' => '_box_text_wr_single_item_box_style',
                'element_name' => '_box_textsre_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-sidebar-add',
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
                'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-add .binduz-er-title',
                'hover_selector' => '{{WRAPPER}} .binduz-er-title:hover',
                'condition' => [
                  'block_style' => ['style1','style2','style3'],
               ],
               
            )
         ); 

         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Button','element-ready'),
                'slug' => '_box_text_btn_item_box_style',
                'element_name' => '_box_texts_btn_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-add .binduz-er-main-btn',
                'hover_selector' => '{{WRAPPER}} .binduz-er-main-btn:hover',
                'condition' => [
                  'block_style' => ['style1','style2','style3'],
               ],
               
            )
         ); 

  
       

         $this->box_css(
            array(
    
                'title' => esc_html__('Box','element-ready'),
                'slug' => '_box_inne_box_style',
                'element_name' => '_box_inn_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-add',
                'condition' => [
                  'block_style' => ['style1'],
               ],
               
            )
         );
         
         $this->box_css(
            array(
    
                'title' => esc_html__('Inner Box','element-ready'),
                'slug' => '_box_innerr_box_style',
                'element_name' => '_box_inner_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-add .binduz-er-sidebar-add',
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

                
                <div class="binduz-er-sidebar-social binduz-er-populer-news-sidebar-add d-none d-lg-block">
                    <div class="binduz-er-sidebar-add mt-40">
                        <h3 class="binduz-er-title">  <?php echo str_replace(['{','}'],['<span>','</span>'],$settings['title']); ?> </h3>
                        <a class="binduz-er-main-btn" href="<?php echo esc_url($settings['button_text_url']); ?>"><?php echo $settings['button_text'] ?></a>
                    </div>
                </div>

            <?php endif; ?>

        

           
          
           
      <?php  
    }

  

    
}