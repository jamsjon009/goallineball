<?php 
namespace Binduz_Essential\Base\Controls\Grid;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Custom_Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Element_Ready\Base\BaseController;

class Generel_Controls extends BaseController
{
	public function register() 
	{
	
		add_action('element_ready_binduz_section_general_grid_tab' , array( $this, 'settings_section' ), 10, 2 );
        add_action('binduz_general_overlay_grid_tab' , array( $this, 'settings_overlay_section' ), 10, 2 );
        add_action('binduz_general_grid_vertical_tab' , array( $this, 'settings_vertical_section' ), 10, 2 );
        add_action('binduz_general_grid_tab_tab' , array( $this, 'settings_tab_section' ), 10, 2 );
        add_action('binduz_general_image_grid_tab' , array( $this, 'settings_image_tab_section' ), 10, 2 );
        add_action('binduz_general_grid_slider' , array( $this, 'settings_slider_section' ), 10, 2 );
        add_action('binduz_general_grid_video_tab' , array( $this, 'settings_video_section' ), 10, 2 );
        add_action('binduz_general_grid_top_post_tab' , array( $this, 'settings_top_post_section' ), 10, 2 );
        add_action('binduz_general_grid_editor_tab' , array( $this, 'settings_editor_section' ), 10, 2 );
	}

    public function settings_slider_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_slider_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                        'post_per_slide',
                            [
                                'label'         => esc_html__( 'Post per slide', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '4',
                                'condition' => [ 'block_style' => ['style5'] ]
                            ]
                        );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                           'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
    
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                 
                    $ele->add_control(
                        'image_sizee_options',
                        [
                            'label' => __( 'Tab Image', 'element-ready' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );
                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'include' => [],
                            'exclude' => [ 'custom' ],
                            'default' => 'thumbnail',
                        ]
                    );

                  
              
                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                
              
                    $ele->add_control(
                        'show_social_share',
                        [
                            'label'     => esc_html__('Show social share', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
                   
                    $ele->add_control(
                        'show_comment',
                        [
                            'label'     => esc_html__('Show Comment', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
                    
                    $ele->add_control(
                        'show_author',
                        [
                            'label'     => esc_html__('Show author', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2','style3'] ]
                        ]
                    );
               
                 
                
                    $ele->add_control(
                        'show_view_count',
                        [
                            'label'     => esc_html__('Show view Count', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'no',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
                    
                    $ele->add_control(
                        'show_video',
                        [
                            'label'     => esc_html__('Show Video', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'no',
                            'condition' => [ 'block_style' => ['style5'] ]
                        ]
                    );
                    
                    do_action('binduz__widget__extra__option',$ele,$widget);
                               
            $ele->end_controls_section();	
           	
    }
  
	public function settings_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
    
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_image',
                        [
                            'label'     => esc_html__('Show Footer image ', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
              
                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                
              
                    $ele->add_control(
                        'show_author',
                        [
                            'label'     => esc_html__('Show Author', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               
                    $ele->add_control(
                        'show_comment',
                        [
                            'label'     => esc_html__('Show Comment', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               
                
                    $ele->add_control(
                        'show_view_count',
                        [
                            'label'     => esc_html__('Show view Count', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'no',
                            'condition' => [ 'block_style' => ['style1'] ]
                        ]
                    );

                    $ele->add_control(
                        'show_social_share',
                        [
                            'label'     => esc_html__('Show social share', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'no',
                            'condition' => [ 'block_style' => ['style1'] ]
                        ]
                    );   
                    
                    do_action('binduz__widget__extra__option',$ele,$widget);
            $ele->end_controls_section();	
           	
    }

    public function settings_overlay_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_overlay_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                
              
                

                    $ele->add_control(
                        'show_social_share',
                        [
                            'label'     => esc_html__('Show social share', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'no',
                            'condition' => [ 'block_style' => ['style1'] ]
                        ]
                    );               
            $ele->end_controls_section();	
           	
    }
    
    public function settings_vertical_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_overlay_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_author',
                        [
                            'label'     => esc_html__('Show author', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [
                                'block_style' => ['style3']
                            ]
                        ]
                    );
                
                               
            $ele->end_controls_section();	
           	
    }
    public function settings_video_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_overlay_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                    
                    $ele->add_control(
                        'show_video',
                        [
                            'label'     => esc_html__('Show Video', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style1','style3'] ]
                        ]
                    );

                    $ele->add_control(
                        'show_nav',
                        [
                            'label'     => esc_html__('Show nav', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_control(
                        'show_author',
                        [
                            'label'     => esc_html__('Show author', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style4'] ]
                        ]
                    );
                
                    do_action('binduz__widget__extra__option',$ele,$widget);         
            $ele->end_controls_section();	
           	
    }
    
    public function settings_top_post_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_overlay_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                
                    
                 
                 
                               
            $ele->end_controls_section();	
           	
    }
    public function settings_editor_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_overlay_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                    
                    $ele->add_control(
                        'show_author',
                        [
                            'label'     => esc_html__('Show Author', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
                    
                 
                               
            $ele->end_controls_section();	
           	
    }
    public function settings_tab_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_tab_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               

              
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               
                    $ele->add_control(
                        'show_video_share',
                        [
                            'label'     => esc_html__('Show video', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style1'] ]
                        ]
                    );   

            $ele->end_controls_section();	
           	
    }
    public function settings_image_tab_section( $ele,$widget ) 
	{
            
           $ele->start_controls_section(
            'section_tab_general_tab',
                [
                    'label' => esc_html__('General', 'element-ready'),
                ]
            );
                    $ele->add_control(
                    'post_count',
                        [
                            'label'         => esc_html__( 'Post count', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );

                    $ele->add_control(
                    'post_title_crop',
                        [
                            'label'         => esc_html__( 'Post title crop', 'element-ready' ),
                            'type'          => Controls_Manager::NUMBER,
                            'default'       => '8',
                        ]
                    );
                // uncommon  
               
                    $ele->add_control(
                        'show_content',
                        [
                            'label'     => esc_html__('Show content', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                            'condition' => [ 'block_style' => ['style2'] ]
                        ]
                    );
                    
                    $ele->add_control(
                        'image_thumn_size_options',
                        [
                            'label' => __( 'Thumb Image', 'element-ready' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'thumbnail', 
                            'exclude' => [ 'custom' ],
                            'include' => [],
                            'default' => 'thumbnail',
                        ]
                    );

                    $ele->add_control(
                        'image_thumn_size_optionsb',
                        [
                            'label' => __( 'Thumb Image', 'element-ready' ),
                            'type' => \Elementor\Controls_Manager::HEADING,
                            'separator' => 'before',
                        ]
                    );

                    $ele->add_group_control(
                        \Elementor\Group_Control_Image_Size::get_type(),
                        [
                            'name' => 'big_thumbnail', 
                            'include' => [],
                            'exclude' => [ 'custom' ],
                            'default' => 'full',
                        ]
                    );
               
               
                    $ele->add_control(
                        'post_content_crop',
                            [
                                'label'         => esc_html__( 'Post content crop', 'element-ready' ),
                                'type'          => Controls_Manager::NUMBER,
                                'default'       => '18',
                                'condition' => [ 'show_content' => ['yes'] ]
                            ]
                    );
                
                    $ele->add_control(
                        'show_post_meta',
                        [
                            'label'     => esc_html__('Post Meta', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

                    $ele->add_control(
                        'show_date',
                        [
                            'label'     => esc_html__('Show Date', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );
               
                    $ele->add_control(
                        'show_cat',
                        [
                            'label'     => esc_html__('Show Category', 'element-ready'),
                            'type'      => Controls_Manager::SWITCHER,
                            'label_on'  => esc_html__('Yes', 'element-ready'),
                            'label_off' => esc_html__('No', 'element-ready'),
                            'default'   => 'yes',
                        ]
                    );

            $ele->end_controls_section();	
           	
    }
    
    
}