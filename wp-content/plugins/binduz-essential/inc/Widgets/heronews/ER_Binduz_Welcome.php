<?php
namespace Binduz_Essential\Widgets\heronews;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Element_Ready\Base\Repository\Base_Modal;
use Element_Ready\Api\Open_Weather_Api as Weather_Api;
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php' );
require_once( ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php' );

if ( ! defined( 'ABSPATH' ) ) exit;

class ER_Binduz_Welcome extends Widget_Base {

   use \Elementor\Element_Ready_Common_Style;
   use \Elementor\Element_ready_common_content;
   use \Elementor\Element_Ready_Box_Style;

   public $base;

    public function get_name() {
        return 'element-ready-binduz-welcome-post';
    }

    public function get_title() {
        return esc_html__( 'Binduz Welcome Post', 'binduz_essential' );
    }

    public function get_icon() { 
        return "eicon-posts-grid";
    }

    public function get_categories() {
       return [ 'element-ready-addons' ];
    }

   
   public function get_script_depends(){
         
         return [
            'element-ready-core',
         ];
   }
   
   public function get_style_depends(){
         
         return [
            'er-binduz-news-grid',
         ];
   }


    protected function register_controls() {
          
        $this->start_controls_section(
            'section_layouts_tab',
            [
                'label' => esc_html__('Layout', 'binduz_essential'),
            ]
        );

        $this->add_control(
			'block_style',
			[
				'label' => esc_html__( 'Style', 'binduz_essential' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [

					'style1'  => esc_html__( 'Style 1', 'binduz_essential' ),
					'style2' => esc_html__( 'Style 2', 'binduz_essential' ),
					'style3' => esc_html__( 'Style 3', 'binduz_essential' ),
			
				],
			]
		);
       $this->end_controls_section();
  
       /**-----------------------------*/
        
            $this->content_text([
                'title' => esc_html__('Weather Location 1','element-ready'),
                'slug' => '_weather_loocation_one_content',
                'condition' => '',
                'controls' => [
                
                    'weather_coordinate'=> [
                        'label'        => esc_html__( ' Coordinate ? ', 'element-ready' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => esc_html__( 'Enable', 'element-ready' ),
                        'label_off'    => esc_html__( 'Diable', 'element-ready' ),
                        'return_value' => 'yes',
                        'default'      => '',
                    ],
                    
                    'coordinates_lat'=> [
                        'label'   => esc_html__( 'Coordinates latitude', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'condition' => [
                            'weather_coordinate' => ['yes']
                        ]
                    ], 
                    
                    'coordinates_lon'=> [
                        'label'   => esc_html__( 'coordinates Longitude', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'condition' => [
                            'weather_coordinate' => ['yes']
                        ]
                    ],

                    'city_name'=> [
                        'label'   => esc_html__( 'City Name', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => 'london',
                        'condition' => [
                            'weather_coordinate!' => ['yes']
                        ]
                    ],

                    
                    'units' =>   [
                        'label' => esc_html__( 'Unit', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'standard',
                        'options' => [
                            'standard'  => esc_html__( 'Standard', 'element-ready' ),
                            'metric' => esc_html__( 'Metric', 'element-ready' ),
                            'imperial' => esc_html__( 'Imperial', 'element-ready' ),
                        ],
                        
                    ],
                    
                    'weather_cache_enable'=> [
                        'label'        => esc_html__( 'Cach ?', 'element-ready' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => esc_html__( 'Show', 'element-ready' ),
                        'label_off'    => esc_html__( 'Hide', 'element-ready' ),
                        'return_value' => 'yes',
                        'default'      => '',
                    ],
                    'image' => [
                        'label' => esc_html__( 'Choose shape', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                    ]
                  
            
                ]
            ]);

            $this->content_text([
                'title' => esc_html__('Weather Location 2','element-ready'),
                'slug' => '_weather_loocation_two_content',
                'condition' => '',
                'controls' => [
                  
                    'weather_coordinate2'=> [
                        'label'        => esc_html__( ' Coordinate ? ', 'element-ready' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => esc_html__( 'Enable', 'element-ready' ),
                        'label_off'    => esc_html__( 'Diable', 'element-ready' ),
                        'return_value' => 'yes',
                        'default'      => '',
                     ],
                    
                    'coordinates_lat2'=> [
                        'label'   => esc_html__( 'Coordinates latitude', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'condition' => [
                            'weather_coordinate2' => ['yes']
                        ]
                    ], 
                    
                    'coordinates_lon2'=> [
                        'label'   => esc_html__( 'coordinates Longitude', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => '',
                        'condition' => [
                            'weather_coordinate2' => ['yes']
                        ]
                    ],
        
                     'city_name2'=> [
                        'label'   => esc_html__( 'City Name', 'element-ready' ),
                        'type'    => \Elementor\Controls_Manager::TEXT,
                        'default' => 'london',
                        'condition' => [
                            'weather_coordinate2!' => ['yes']
                        ]
                     ],
        
                     
                    'units2' =>   [
                        'label' => esc_html__( 'Unit', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'standard',
                        'options' => [
                            'standard'  => esc_html__( 'Standard', 'element-ready' ),
                            'metric' => esc_html__( 'Metric', 'element-ready' ),
                            'imperial' => esc_html__( 'Imperial', 'element-ready' ),
                        ],
                        
                    ],
                     
                     'weather_cache_enable2'=> [
                        'label'        => esc_html__( 'Cach ?', 'element-ready' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => esc_html__( 'Show', 'element-ready' ),
                        'label_off'    => esc_html__( 'Hide', 'element-ready' ),
                        'return_value' => 'yes',
                        'default'      => '',
                     ],

                     'image2' => [
                        'label' => esc_html__( 'Choose shape', 'element-ready' ),
                        'type' => \Elementor\Controls_Manager::MEDIA,
                    ]
        
             
                ]
             ]);
 
           

         do_action( 'element_ready_binduz_section_general_grid_tab', $this, $this->get_name() );
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
                'meta_cat_icon'=> [
                  'label'         => esc_html__( 'Meta Category Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                ],
  
                'meta_author_icon'=> [
                  'label'         => esc_html__( 'Meta Author Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                ],
  
                'meta_date_icon'=> [
                  'label'         => esc_html__( 'Meta Date Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                ],
  
                'meta_comment_icon'=> [
                  'label'         => esc_html__( 'Meta Comment Icon', 'binduz_essential' ),
                  'type' => \Elementor\Controls_Manager::ICONS,
                ],
  
                
            ]
         ]);
  
 
         /*--------------------------
            STYLE
        ----------------------------*/

         $this->text_css(
            array(
                'title' => esc_html__('Title Wrapper','binduz_essential'),
                'slug' => 'title_wrapper_box_style',
                'element_name' => 'title_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-hero-title',
                'hover_selector' => false,
            )
        );


        $this->text_wrapper_css(

            array(
               'title' => esc_html__('Post Title','binduz_essential'),
               'slug' => 'post_title_style',
               'element_name' => 'post_title_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-hero-title .binduz-er-title a',
               'hover_selector' => '{{WRAPPER}} .binduz-er-hero-title .binduz-er-title:hover a',
             
            )
        );
      
         $this->text_wrapper_css(
            array(
               'title' => esc_html__('Date','binduz_essential'),
               'slug' => 'post_date_style',
               'element_name' => 'post_date_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-hero-meta .binduz-er-meta-date span',
               'hover_selector' => '{{WRAPPER}} .binduz-er-hero-meta .binduz-er-meta-date span:hover',
               'condition' => [
                  'show_date' => 'yes',
               ],
            )
        );


        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Author text','binduz_essential'),
               'slug' => 'posts_author_style',
               'element_name' => 'posts_author_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-author span',
               'hover_selector' => '{{WRAPPER}} .binduz-er-author span:hover',
               'condition' => [
                  'show_author' => 'yes',
               ],
            )
        );

        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Author name','binduz_essential'),
               'slug' => 'post_author_style',
               'element_name' => 'post_author_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-author span a',
               'hover_selector' => '{{WRAPPER}} .binduz-er-author span:hover a',
               'condition' => [
                  'show_author' => 'yes',
               ],
            )
        );

        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Category Wrapper','binduz_essential'),
               'slug' => 'post_catw_style',
               'element_name' => 'post_catw_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-meta-category',
               'hover_selector' => false,
               'condition' => [
                  'show_cat' => 'yes',
               ],
            )
      );

        $this->text_wrapper_css(
               array(
                  'title' => esc_html__('Category','binduz_essential'),
                  'slug' => 'post_cat_style',
                  'element_name' => 'post_cat_element_ready_',
                  'selector' => '{{WRAPPER}} .binduz-er-meta-category .element-ready-cat',
                  'hover_selector' => '{{WRAPPER}} .binduz-er-meta-category .element-ready-cat:hover',
                  'condition' => [
                     'show_cat' => 'yes',
                  ],
               )
         );

         $this->text_wrapper_css(
            array(
               'title' => esc_html__('Meta List','binduz_essential'),
               'slug' => 'post_cmeta_list_style',
               'element_name' => 'post_cmeta_list_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-meta-list li',
               'hover_selector' => '{{WRAPPER}} .binduz-er-meta-list li:hover',
               
            )
        );

        
        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Meta List icon','binduz_essential'),
               'slug' => 'post_meta_list__style',
               'element_name' => 'post_meta_list_icon_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-meta-list li i',
               'hover_selector' => false,
               
            )
        );

        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Weather Location','binduz_essential'),
               'slug' => 'weather_meta_list__style',
               'element_name' => 'weather_meta_list_icon_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-weather-item .binduz-er-title',
               'hover_selector' => false,
               
            )
        );

        $this->text_wrapper_css(
            array(
               'title' => esc_html__('Weather temp','binduz_essential'),
               'slug' => 'weather_temp_meta_l__style',
               'element_name' => 'weather_tempo_meta_ln_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-weather-item span',
               'hover_selector' => false,
               
            )
        );
      
      
        $this->box_css(
            array(
               'title' => esc_html__('Footer Image Wrapper','binduz_essential'),
               'slug' => 'post_image_wrapper_box_style',
               'element_name' => 'post_image_wrapper_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-news-portal-item .binduz-er-thumb',
            )
      );

      $this->box_css(
         array(
            'title' => esc_html__('Footer Image','binduz_essential'),
            'slug' => 'post_image_box_style',
            'element_name' => 'post_image_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-news-portal-item .binduz-er-thumb img',
         )
      );

        $this->text_wrapper_css(
            array(
            'title' => esc_html__('Footer title Wrapper','binduz_essential'),
            'slug' => 'footerw_post_titlee_style',
            'element_name' => 'footrer_post_title_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-content .binduz-er-title',
            'hover_selector' => false,
            
            )
        );

        
        $this->text_wrapper_css(
            array(
            'title' => esc_html__('Footer title','binduz_essential'),
            'slug' => 'footer_post_titlee_style',
            'element_name' => 'footrerpost_title_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-content .binduz-er-title a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-content .binduz-er-title a:hover',
            
            )
        );

        $this->text_wrapper_css(
            array(
                'title' => esc_html__('Footer Date','binduz_essential'),
                'slug' => 'footer_post_date_style',
                'element_name' => 'footrerpost_date_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-news-portal-item .binduz-er-meta-date span',
                'hover_selector' => false,
                'condition' => [
                'show_date' => 'yes',
                ],
            )
        );

        $this->box_css(
            array(
               'title' => esc_html__('Footer Container','binduz_essential'),
               'slug' => 'icontainer_footer_box_style',
               'element_name' => 'icontainer_footer_wrapper_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-hero-news-portal',
            )
        );
        
        $this->box_css(
            array(
               'title' => esc_html__('Footer item','binduz_essential'),
               'slug' => 'item_footer_box_style',
               'element_name' => 'item_footer_wrapper_element_ready_',
               'selector' => '{{WRAPPER}} .binduz-er-hero-news-portal .binduz-er-news-portal-item',
            )
        );

        $this->element_before_psudocode([
            'title' => esc_html__('Item Separator','element-ready'),
            'slug' => 'post_mitema_separetor_box_style',
            'element_name' => 'post_meta_separetor_element_ready_',
            'selector' => '{{WRAPPER}} .binduz-er-hero-news-portal .binduz-er-news-portal-item:last-child::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-hero-news-portal .binduz-er-news-portal-item:last-child',
         ]);

         
         /*--------------------------
             STYLE END
         ----------------------------*/  
    }

    protected function render( ) { 

        $settings        = $this->get_settings();
        $post_title_crop = $settings['post_title_crop'];
        $thumbnail_size = $settings['thumbnail_size'];
        $data            = new Base_Modal($settings);
        $query           = $data->get();
        
        if(!$query){
          return;  
        }
        $api_key = element_ready_get_api_option( 'weather_api_key' );
        $location_one = [
           'api_key'              => $api_key,
           'coordinates_lat'      => $settings['coordinates_lat'],
           'coordinates_lon'      => $settings['coordinates_lon'],
           'city_name'            => $settings['city_name'],
           'weather_cache_enable' => $settings['weather_cache_enable'],
           'weather_coordinate'   => $settings['weather_coordinate'],
           'units'                => $settings['units'],
        ];
        $location_two = [
            'api_key'              => $api_key,
            'coordinates_lat'      => $settings['coordinates_lat2'],
            'coordinates_lon'      => $settings['coordinates_lon2'],
            'city_name'            => $settings['city_name2'],
            'weather_cache_enable' => $settings['weather_cache_enable2'],
            'weather_coordinate'   => $settings['weather_coordinate2'],
            'units'                => $settings['units2'],
         ];
 

        $icon = '';
        $data = Weather_Api::get($location_one);   
        $data2 = Weather_Api::get($location_two);   

        ?>
        
        <section class="binduz-er-hero-area d-flex align-items-center">
            <?php while ($query->have_posts()) : $query->the_post(); ?> 
                <?php
                
                    $_blog_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );
                    $banner_image  = '';
                    if( isset($_blog_image) && $_blog_image != ''){
                        $banner_image = 'style="background-image:url('.esc_url( $_blog_image ).');"';
                    }
                ?>
                <div class="binduz-er-bg-cover" <?php echo $banner_image; ?>></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-7">
                            <div class="binduz-er-hero-news-content">
                                <div class="binduz-er-hero-meta">

                                    <?php include('parts/category.php');  ?>
                                    <?php include('parts/date.php');  ?>
                                    
                                </div>
                                <div class="binduz-er-hero-title">
                                    <?php include('parts/title.php');  ?>
                                </div>
                                <div class="binduz-er-meta-author">
                                        <?php include('parts/author.php');  ?>
                                        <?php include('parts/meta-list.php');  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="binduz-er-hero-weather d-flex justify-content-end">
                                <div class="binduz-er-weather-item">
                                   <?php if(isset($settings['image']['url']) && $settings['image']['url'] !=''): ?>
                                        <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_html__('imge shape','binduz-essential') ?>">
                                    <?php endif; ?>
                                    <?php if(isset($data->name)): ?>
                                        <h5 class="binduz-er-title"><?php echo esc_html($data->name); ?></h5>
                                    <?php endif; ?>
                                        <?php if(isset($data->main->temp)): ?>
                                        <span> 
                                            <?php echo esc_html($data->main->temp); ?>
                                            <?php if($settings['units'] == 'metric'): ?>
                                                <?php echo esc_html__('°C','binduz-essential') ?>
                                                <?php elseif($settings['units'] == 'imperial'): ?>
                                                    <?php echo esc_html__('°F','binduz-essential') ?>
                                                <?php else: ?>
                                                <?php echo esc_html__('K','binduz-essential') ?>
                                                <?php endif; ?>
                                         </span>
                                         <?php endif; ?>
                                </div>
                                <div class="binduz-er-weather-item">
                                    <?php if(isset($settings['image2']['url']) && $settings['image2']['url'] !=''): ?>
                                        <img src="<?php echo esc_url($settings['image2']['url']); ?>" alt="<?php echo esc_html__('imge shape','binduz-essential') ?>">
                                    <?php endif; ?>
                                    <?php if( isset($data2->name) ): ?>
                                        <h5 class="binduz-er-title"> <?php echo esc_html($data2->name); ?> </h5>
                                    <?php endif; ?>
                                        <?php if( isset( $data2->main->temp ) ): ?>
                                            <span>    
                                                <?php echo esc_html($data2->main->temp); ?>
                                            
                                                <?php if($settings['units2'] == 'metric'): ?>
                                                    <?php echo esc_html__('°C','binduz-essential') ?>
                                                <?php elseif($settings['units2'] == 'imperial'): ?>
                                                    <?php echo esc_html__('°F','binduz-essential') ?>
                                                <?php else: ?>
                                                    <?php echo esc_html__('K','binduz-essential') ?>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php break; endwhile; wp_reset_postdata(); ?>
                <div class="binduz-er-hero-news-portal">
                    <?php while ($query->have_posts()) : $query->the_post(); ?> 
                        <div class="binduz-er-news-portal-item">
                            <?php if( has_post_thumbnail() && $settings['show_image'] =='yes'): ?>
                                <div class="binduz-er-thumb">
                                    <a href="<?php the_permalink() ?>">
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null,$thumbnail_size)); ?>" alt="<?php the_title_attribute(); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="binduz-er-content">
                                <?php include('parts/date.php');  ?>
                                <h4 class="binduz-er-title"><a href="<?php the_permalink() ?>"><?php echo esc_html(wp_trim_words( get_the_title(),$settings['post_title_crop'],'' )); ?></a></h4>
                            </div>
                        </div>
                    <?php 
                        if( $query->current_post == 2 ){
                            break;
                        }
                        endwhile; wp_reset_postdata(); ?>
                </div>
        </section>

      <?php  
    }

  

    
}