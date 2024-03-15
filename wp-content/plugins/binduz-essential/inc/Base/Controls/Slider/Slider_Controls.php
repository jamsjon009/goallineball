<?php 
namespace Binduz_Essential\Base\Controls\Slider;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Custom_Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Element_Ready\Base\BaseController;

class Slider_Controls extends BaseController
{
	public function register() 
	{
	
		add_action('element_ready_binduz_section_general_slider_tab' , array( $this, 'settings_section' ), 10, 2 );
 
	}
  
	public function settings_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_slick_tab',
                [
                    'label' => esc_html__('Slider', 'element-ready'),
                ]
            );
            
        
            $ele->add_control(
                'slidesToShow',
                [
                    'label'         => esc_html__( 'Slide To show', 'element-ready' ),
                    'type'          => Controls_Manager::NUMBER,
                    'default'       => '1',
                    'condition' => [
                        'block_style!' => [
                            'style'
                        ]
                    ]
                
                ]
            );

            $ele->add_control(
                'slide_padding',
                    [
                        'label'         => esc_html__( 'Slide Padding', 'element-ready' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '0',
                        'condition' => [
                            'block_style' => [
                                'style4'
                            ]
                        ]
                    ]
                );
            
            $ele->add_control(
                'show_nav',
                [
                    'label'     => esc_html__('Show Nav', 'element-ready'),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'element-ready'),
                    'label_off' => esc_html__('No', 'element-ready'),
                    'default'   => 'yes',
                
                ]
            );

            $ele->add_control(
                'autoplay',
                [
                    'label'     => esc_html__('Autoplay', 'element-ready'),
                    'type'      => Controls_Manager::SWITCHER,
                    'label_on'  => esc_html__('Yes', 'element-ready'),
                    'label_off' => esc_html__('No', 'element-ready'),
                    'default'   => 'yes',
                
                ]
            ); 
               
            $ele->add_control(
                'autoplaySpeed',
                    [
                        'label'         => esc_html__( 'Auto play Speed', 'element-ready' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '200',
                    ]
                );

            $ele->add_control(
                'slide_speed',
                    [
                        'label'         => esc_html__( 'Speed', 'element-ready' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '1500',
                    ]
                ); 

                $ele->add_control(
                    'left_icon',
                    [
                        'label' => __( 'Left Indicator', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fa fa-angle-left',
                            'library' => 'solid',
                        ],
                    ]
                );

                $ele->add_control(
                    'right_icon',
                    [
                        'label' => __( 'Right Indicator', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fa fa-angle-right',
                            'library' => 'solid',
                        ],
                    ]
                );

            $ele->end_controls_section();	
           	
    }

 
    
    
}