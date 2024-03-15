<?php 
namespace Binduz_Essential\Base\Sections;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Element_Base;
use \Element_Ready\Controls\Custom_Controls_Manager;


class Image_Masking {

    use \Binduz_Essential\Base\Traits\Helper;
    public function register(){
        
        add_action( 'elementor/element/Element_Ready_Flip_Box_Widget/content_section/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/Element_Ready_Teams_Widget/content_section/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/image/section_image/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/image-box/section_image/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/Element_Ready_Testmonial_Widget/content_section/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/Element_Ready_Box_Widget/content_section/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/element-ready-grid-post/element-ready-grid-post_MetaIconsContent_content_section/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/Element_Ready_Portfolio/post_content_option/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/element-ready-lp-course-category/section_tab/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/element-ready-grid-course/tab-options/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
        add_action( 'elementor/element/Element_Ready_Give_Campains_Widget/post_carousel_content/after_section_end', [ $this, 'add_controls_section' ] ,12, 2);
          
    }

   

    public function add_controls_section( $element, $args ){
     
        if(!$this->get_sw()){return;}
        
      
        $element->start_controls_section(
            'element_ready_widget_image_masking_section',
            [
                
                'label' => esc_html__( 'Image Masking', 'element-ready' ),
            ]
          );

              $element->add_control(
                  'element_ready_pro_image_masking_active',
                  [
                      'label'        => esc_html__('Enable', 'element-ready'),
                      'type'         => Controls_Manager::SWITCHER,
                      'default'      => '',
                      'return_value' => 'yes',
                  
                  ]
              );

              $element->add_control(
                'mask_shape',
                [
                    'label' => esc_html__( 'Shapes', 'element-ready' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__( 'Default', 'element-ready' ),
                        'custom'  => esc_html__( 'custom', 'element-ready' ),
                    ],
                    'condition'    => [
                        'element_ready_pro_image_masking_active' => ['yes']
                    ]
                ]
            );
            
            $element->add_control(
                'mask_shape_default',
                [
                    'label' => esc_html__( 'Default Shapes', 'element-ready' ),
                    'type' => Custom_Controls_Manager::RADIOIMAGE,
                    'default' => '',
                    'options' => $this->masking_image_shapes(),
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .elementor-image' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .member__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .author__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .box__big__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE.}});',
                        '{{WRAPPER}} .flip__front__big__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .portfolio__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .front .fcf-thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => '-webkit-mask-image: url({{VALUE}}); mask-image: url({{VALUE}});',
                    ],
                    'condition'    => [
                        'element_ready_pro_image_masking_active' => ['yes'],
                        'mask_shape' => 'default',
                    ]
                ]
            );
        
    
            $element->add_control(
                'mask_shape_custom',
                [
                    'label' => esc_html__( 'Choose Shape', 'element-ready' ),
                    'type' => Controls_Manager::MEDIA,
                    'show_label' => false,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .elementor-image' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .member__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .author__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .box__big__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .flip__front__big__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .portfolio__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .front .fcf-thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => '-webkit-mask-image: url({{URL}}); mask-image: url({{URL}});',
                    ],
                    'condition' => [
                        'mask_shape' => 'custom',
                       
                    ],
                   
                    
                ]
            );
         
    
         
            $element->add_control(
                'mask_position',
                [
                    'label' => esc_html__( 'Position', 'element-ready' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'center'        => esc_html__( 'Center', 'element-ready' ),
				   		'center center' => esc_html__( 'Center Center', 'element-ready' ),
				   		'center left'   => esc_html__( 'Center Left', 'element-ready' ),
				   		'center right'  => esc_html__( 'Center Right', 'element-ready' ),
				   		'right'         => esc_html__( 'Right', 'element-ready' ),
				   		'top'           => esc_html__( 'Top', 'element-ready' ),
				   		'top center'    => esc_html__( 'Top Center', 'element-ready' ),
				   		'top left'      => esc_html__( 'Top Left', 'element-ready' ),
				   		'top right'     => esc_html__( 'Top Right', 'element-ready' ),
				   		'bottom'        => esc_html__( 'Bottom', 'element-ready' ),
				   		'bottom center' => esc_html__( 'Bottom Center', 'element-ready' ),
				   		'bottom left'   => esc_html__( 'Bottom Left', 'element-ready' ),
				   		'left'          => esc_html__( 'Left', 'element-ready' ),
				   		'bottom right'  => esc_html__( 'Bottom Right', 'element-ready' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .elementor-image' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .member__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .author__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .box__big__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .flip__front__big__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .portfolio__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .front .fcf-thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => ' -webkit-mask-position: {{VALUE}}; mask-position: {{VALUE}};',
                    ],
                    'condition'    => [
                        'element_ready_pro_image_masking_active' => ['yes']
                    ]
                ]
            );
    
            $element->add_control(
                'mask_size',
                [
                    'label' => esc_html__( 'Size', 'element-ready' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'auto'    => esc_html__( 'Auto',  'element-ready' ),
                        'cover'   => esc_html__( 'Cover',  'element-ready' ),
                        'contain' => esc_html__( 'Contain', 'element-ready' ),
                        'initial' => esc_html__( 'Custom',  'element-ready' ),
                    ],
                    
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .elementor-image' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .member__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .author__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .box__big__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .flip__front__big__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .portfolio__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .front .fcf-thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => '-webkit-mask-size: {{VALUE}}; mask-size: {{VALUE}};',
                    ],
                    'condition'    => [
                        'element_ready_pro_image_masking_active' => ['yes']
                    ]
                ]
            );
    
            $element->add_responsive_control(
                'mask_custom_size',
                [
                    'label' => esc_html__( 'Custom Size', 'element-ready' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', 'em', '%', 'vw' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                        ],
                        'em' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                        'vw' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'size' => 100,
                        'unit' => '%',
                    ],
                    'required' => true,
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .elementor-image' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .member__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .author__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .box__big__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .flip__front__big__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .portfolio__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .front .fcf-thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => '-webkit-mask-size: {{SIZE}}{{UNIT}}; mask-size: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'mask_size' => 'initial',
                    ],
                ]
            );
    
            $element->add_control(
                'mask_repeat',
                [
                    'label' => esc_html__( 'Repeat', 'element-ready' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'repeat'          => esc_html__( 'Repeat', 'element-ready' ),
                        'repeat-x'        => esc_html__( 'Repeat-x', 'element-ready' ),
                        'repeat-y'        => esc_html__( 'Repeat-y', 'element-ready' ),
                        'space'           => esc_html__( 'Space', 'element-ready' ),
                        'round'           => esc_html__( 'Round',  'element-ready' ),
                        'no-repeat'       => esc_html__( 'No-repeat', 'element-ready' ),
                        'repeat-space'    => esc_html__( 'Repeat Space',  'element-ready' ),
                        'round-space'     => esc_html__( 'Round Space',  'element-ready' ),
                        'no-repeat-round' => esc_html__( 'No-repeat Round', 'element-ready' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .elementor-image-box-img' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .elementor-image' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .member__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .author__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .box__big__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .flip__front__big__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-trending-news-thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .portfolio__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .element-ready-lp-course-thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .front .fcf-thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                        '{{WRAPPER}} .sldier-content-area .post__thumb' => '-webkit-mask-repeat: {{VALUE}}; mask-repeat: {{VALUE}};',
                    ],
                    'condition'    => [
                        'element_ready_pro_image_masking_active' => ['yes']
                    ]
                ]
            );
        

        
        $element->end_controls_section();
    }

 
   
}