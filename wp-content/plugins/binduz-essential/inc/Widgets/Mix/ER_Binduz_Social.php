<?php
namespace Binduz_Essential\Widgets\Mix;

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

class ER_Binduz_Social extends Widget_Base {

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name() {
        return 'erp-binduz-gmix-social';
    }

    public function get_title() {
        return esc_html__( 'ER Binduz Social', 'element-ready-pro' );
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
 
         $repeater = new \Elementor\Repeater();

         $repeater->add_control(
             'title', [
                 'label' => __( 'Social Title', 'element-ready-pro' ),
                 'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __( 'Facebook' , 'element-ready-pro' ),
                 'label_block' => true,
             ]
         );

         $repeater->add_control(
            'list_title', [
                'label' => __( 'Title', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'likes' , 'element-ready-pro' ),
                'label_block' => true,
            ]
        );

         $repeater->add_control(
            'list_url', [
                'label' => __( 'Url', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
                'label_block' => true,
            ]
        );

         $repeater->add_control(
            'list_count', [
                'label' => __( 'Count', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '1000' , 'element-ready-pro' ),
                'label_block' => true,
            ]
        );
 
         $repeater->add_control(
            'list_tag', [
                'label' => __( 'Tag', 'element-ready-pro' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'List Tag' , 'element-ready-pro' ),
                'show_label' => false,
            ]
        );

         $repeater->add_control(
			'list_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fab fa-facebook-f',
					'library' => 'solid',
				],
			]
		);

        $repeater->add_control(
			'list_color',
			[
				'label' => __( 'Icon Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} span i' => 'color: {{VALUE}}'
				],
			]
		);

        $repeater->add_control(
			'list_hover_color',
			[
				'label' => __( 'Hover Icon Color', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}:hover span i' => 'color: {{VALUE}}'
				],
			]
		);

        $repeater->add_control(
			'list_h_bgcolor',
			[
				'label' => __( 'Icon BgColor', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}:hover span i' => 'background-color: {{VALUE}}'
				],
			]
		);
 
      
 
         $this->add_control(
             'list',
             [
                 'label' => __( 'Social List', 'element-ready-pro' ),
                 'type' => \Elementor\Controls_Manager::REPEATER,
                 'fields' => $repeater->get_controls(),
                 'default' => [
                     [
                        'list_title' => __( 'Likes', 'element-ready-pro' ),
                     ],
                 ],
                 'title_field' => '{{{ title }}}',
             ]
         );
 
 
         $this->end_controls_section();
   
         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Title','element-ready'),
                'slug' => '_box_text_single_item_box_style',
                'element_name' => '_box_texts_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a span.binduz-text',
                'hover_selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a:hover span.binduz-text',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         ); 

         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Tag Text','element-ready'),
                'slug' => '_box_tag_text_single_item_box_style',
                'element_name' => '_box_tag_text_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a span.binduz-tag-text',
                'hover_selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a:hover span.binduz-tag-text',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         ); 

         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Count','element-ready'),
                'slug' => '_box_count_single_item_box_style',
                'element_name' => '_box_copunt_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a span span.binduz-er-social-count',
                'hover_selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a:hover span span.binduz-er-social-count',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         );
         
         $this->text_wrapper_css(
            array(
    
                'title' => esc_html__('Icon','element-ready'),
                'slug' => '_box_icon_single_item_box_style',
                'element_name' => '_box_cion_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a span i',
                'hover_selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a:hover span i',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         );
         
         $this->box_css(
            array(
    
                'title' => esc_html__('Single Item','element-ready'),
                'slug' => '_box_single_item_box_style',
                'element_name' => '_box_ver_single_item_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list a',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         );
         
         $this->box_css(
            array(
    
                'title' => esc_html__('Box','element-ready'),
                'slug' => '_box_verwr_box_style',
                'element_name' => '_box_ver_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         );
         
         $this->box_css(
            array(
    
                'title' => esc_html__('Inner Box','element-ready'),
                'slug' => '_box_innerr_box_style',
                'element_name' => '_box_inner_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-area .binduz-er-social-list .binduz-er-list',
                'condition' => [
                  'block_style' => ['style1','style2'],
               ],
               
            )
         ); 
     

    }

    protected function render( ) { 

        $settings        = $this->get_settings();
       

        ?>

           <?php if($settings['block_style'] =='style1'): ?>
             <div class="binduz-er-top-news-area">
                <div class="binduz-er-social-list">
                    <div class="binduz-er-list">
                        <?php foreach($settings['list'] as $item): ?>
                            <a class="elementor-repeater-item-<?php echo $item['_id']; ?>" href="<?php echo esc_url($item['list_url']); ?>">
                                <span class="binduz-text">
                                      <?php \Elementor\Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                      <span class="binduz-er-social-count"><?php echo $item['list_count'] ?></span> <?php echo $item['list_title'] ?>
                                 </span>
                                <span class="binduz-tag-text"><?php echo $item['list_tag'] ?></span>
                            </a>
                        <?php endforeach; ?>
                     </div>
                </div>
              </div>

            <?php endif; ?>
   

           
          
           
      <?php  
    }

  

    
}