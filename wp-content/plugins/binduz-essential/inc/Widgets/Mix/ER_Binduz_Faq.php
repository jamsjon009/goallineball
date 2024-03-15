<?php

namespace Binduz_Essential\Widgets\Mix;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Custom_Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Element_Ready\Base\Repository\Base_Modal;

require_once(ELEMENT_READY_DIR_PATH . '/inc/style_controls/common/common.php');
require_once(ELEMENT_READY_DIR_PATH . '/inc/style_controls/position/position.php');
require_once(ELEMENT_READY_DIR_PATH . '/inc/style_controls/box/box_style.php');
require_once(ELEMENT_READY_DIR_PATH . '/inc/content_controls/common.php');

if (!defined('ABSPATH')) exit;

class ER_Binduz_Faq extends Widget_Base
{

    use \Elementor\Element_Ready_Common_Style;
    use \Elementor\Element_ready_common_content;
    use \Elementor\Element_Ready_Box_Style;

    public $base;

    public function get_name()
    {
        return 'erp-binduz-gmix-faq';
    }

    public function get_title()
    {
        return esc_html__('ER Binduz author', 'element-ready-pro');
    }
    public function get_style_depends()
    {


        return [
            'element-ready-er-grid'
        ];
    }

    public function get_icon()
    {
        return "fas fa-sticky-note";
    }

    public function get_categories()
    {
        return ['element-ready-addons'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'section_layouts_tab',
            [
                'label' => esc_html__('Layout', 'element-ready-pro'),
            ]
        );

        $this->add_control(
            'block_style',
            [
                'label' => esc_html__('Style', 'element-ready'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [
                    'style1'  => esc_html__('Style 1', 'element-ready'),
                    'style2'  => esc_html__('Style 2', 'element-ready'),
                    'style3'  => esc_html__('Style 3', 'element-ready'),
                    'style4'  => esc_html__('Style 4', 'element-ready'),
                    'style5'  => esc_html__('Style 5', 'element-ready'),

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_heading_tab',
            [
                'label' => esc_html__('Cotent', 'element-ready-pro'),

            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => esc_html__('Title', 'element-ready'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('House Is Democrats Wrangle Over Madigan’s Future.', 'element-ready'),
            ]
        );



        $this->add_control(
            'author_name_by',
            [
                'label'   => esc_html__('Label', 'element-ready'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('By', 'element-ready'),
            ]
        );

        $this->add_control(
            'binduz_er_image',
            [
                'label' => __('Choose Image', 'binduz-essenatial'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'block_style' => ['style2', 'style3', 'style4']
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'author_name',
            [
                'label'   => esc_html__('Author', 'element-ready'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Miranda H. Halim', 'element-ready'),
            ]
        );

        $this->add_control(
            'author_url',
            [
                'label'   => esc_html__('Author Url', 'element-ready'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'condition' => [
                    'block_style' => ['style4']
                ]
            ]
        );

        $this->add_control(
            'content',
            [
                'label'   => esc_html__('Content', 'element-ready'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('House Is Democrats Wrangle Over Madigan’s Future.
                     By R A Milon
                     Get Ask Amy delivered to your inbox every morning', 'element-ready'),
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label' => __('Button', 'element-ready-pro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'element-ready-pro'),
                'label_block' => true,
                'condition' => [
                    'block_style' => ['style3', 'style4']
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __('Url', 'element-ready-pro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
                'label_block' => true,
                'condition' => [
                    'block_style' => ['style3', 'style4']
                ]
            ]
        );

        $this->add_control(
            'social',
            [
                'label'     => esc_html__('Social', 'element-ready'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Yes', 'element-ready'),
                'label_off' => esc_html__('No', 'element-ready'),
                'default'   => 'no',
                'condition' => [
                    'block_style' => ['style3']
                ]

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
            'list_title',
            [
                'label' => __('Title', 'element-ready-pro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Title', 'element-ready-pro'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'list_url',
            [
                'label' => __('Url', 'element-ready-pro'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
                'label_block' => true,
            ]
        );


        $repeater->add_control(
            'list_icon',
            [
                'label' => __('Icon', 'text-domain'),
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
                'label' => __('Icon Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-sidebar-about-user .binduz-er-content ul {{CURRENT_ITEM}} a i' => 'color: {{VALUE}}'
                ],
            ]
        );

        $repeater->add_control(
            'list_hover_color',
            [
                'label' => __('Hover Icon Color', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-sidebar-about-user .binduz-er-content ul {{CURRENT_ITEM}}:hover a i' => 'color: {{VALUE}}'
                ],
            ]
        );

        $repeater->add_control(
            'list_h_bgcolor',
            [
                'label' => __('Icon BgColor', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-sidebar-about-user .binduz-er-content ul {{CURRENT_ITEM}} a' => 'background-color: {{VALUE}}'
                ],
            ]
        );




        $this->add_control(
            'social_list',
            [
                'label' => __('Social List', 'element-ready-pro'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Facebook', 'element-ready-pro'),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
                'condition' => [
                    'block_style' => ['style3'],
                    'social' => ['yes']
                ]
            ]
        );



        $this->end_controls_section();


        $this->text_wrapper_css([
            'title' => esc_html__('Title', 'element-ready'),
            'slug' => 'post_heading__box_style',
            'element_name' => 'post_heading_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style2'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq .binduz-er-title,{{WRAPPER}} .binduz-er-top-news-faq .binduz-er-title',
            'hover_selector' => false
        ]);


        $this->text_wrapper_css([
            'title' => esc_html__('Author', 'element-ready'),
            'slug' => 'post_headingayuthor__box_style',
            'element_name' => 'post_author_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style2', 'style3', 'style5'],
            ],
            'selector' => '
            {{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq .binduz-er-meta-author span span,
            {{WRAPPER}} .binduz-er-top-news-faq .binduz-er-meta-author span span,
            {{WRAPPER}} .binduz-er-quote-text span span,
            {{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-sidebar-about-user .binduz-er-content .binduz-er-title

            ',
            'hover_selector' => false
        ]);


        $this->text_wrapper_css([
            'title' => esc_html__('Author By', 'element-ready'),
            'slug' => 'post_heading_by_box_style',
            'element_name' => 'post_headingby_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style2', 'style3', 'style5'],
            ],
            'selector' => '
            {{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq .binduz-er-meta-author span,
            {{WRAPPER}} .binduz-er-top-news-faq .binduz-er-meta-author span,
            {{WRAPPER}} .binduz-er-quote-text span,
            {{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-sidebar-about-user .binduz-er-content span
            ',
            'hover_selector' => false
        ]);


        $this->box_css([
            'title' => esc_html__('Content Area', 'element-ready'),
            'slug' => 'post_contet__box_style',
            'element_name' => 'post_content_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style2', 'style3', 'style5'],
            ],
            'selector' => '
            {{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq .binduz-er-answare,
            {{WRAPPER}} .binduz-er-top-news-faq .binduz-er-answare,
            {{WRAPPER}} .binduz-er-quote-text,
            {{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-text
            ',
            'hover_selector' => false
        ]);

        $this->text_wrapper_css([
            'title' => esc_html__('Content', 'element-ready'),
            'slug' => 'post_contentc__box_style',
            'element_name' => 'post_contentg_retor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style2', 'style3', 'style4', 'style5'],
            ],
            'selector' => '
            {{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq .binduz-er-answare p,
            {{WRAPPER}} .binduz-er-top-news-faq .binduz-er-answare p,
            {{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-text p,
            {{WRAPPER}} .binduz-er-quote-text p,
            {{WRAPPER}} .binduz-er-sidebar-add-box p
            ',
            'hover_selector' => false
        ]);

        $this->text_wrapper_css([
            'title' => esc_html__('Button', 'element-ready'),
            'slug' => 'post_button__box_style',
            'element_name' => 'post_button_retor_element_ready_',
            'condition' => [
                'block_style' => ['style3'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-text a',
            'hover_selector' => '{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item .binduz-er-text a:hover'
        ]);

        $this->text_wrapper_css([
            'title' => esc_html__('Button style4', 'element-ready'),
            'slug' => 'post_button_dd_box_style',
            'element_name' => 'post_button_retsor_element_ready_',
            'condition' => [
                'block_style' => ['style4'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-sidebar-add-box .binduz-er-main-btn',
            'hover_selector' => '{{WRAPPER}} .binduz-er-sidebar-add-box > .binduz-er-main-btn:hover'
        ]);

        $this->start_controls_section(
            'er_binduz_image_section',
            [
                'label' => esc_html__('Image ', 'binduz-essential'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );



        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'binduz_er_background',
                'label' => __('Background', 'binduz-essenatial'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq::before,{{WRAPPER}} .binduz-er-blog-details-box .binduz-er-quote-text::before,{{WRAPPER}} .binduz-er-blog-details-box .binduz-er-quote-text::before',
                'condition' => [
                    'block_style' => ['style1', 'style5']
                ]
            ]
        );


        $this->end_controls_section();

        $this->element_before_psudocode([
            'title' => esc_html__('Box Image Style', 'element-ready'),
            'slug' => 'post_headig_separetor_box_style',
            'element_name' => 'post_headig_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style1', 'style4'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq::before, {{WRAPPER}} .binduz-er-sidebar-add-box::before, {{WRAPPER}} .binduz-er-blog-details-box .binduz-er-quote-text::before',
            'selector_parent' => '{{WRAPPER}} .binduz-er-populer-news-sidebar-faq .binduz-er-top-news-faq, {{WRAPPER}} .binduz-er-sidebar-add-box, {{WRAPPER}} .binduz-er-blog-details-box .binduz-er-quote-text',
        ]);

        $this->box_css([
            'title' => esc_html__('Box Inner', 'element-ready'),
            'slug' => 'post_headig_sdseparetor_box_style',
            'element_name' => 'post_hesdadig_separetor_element_ready_',
            'condition' => [
                'block_style' => ['style4'],
            ],
            'selector' => '{{WRAPPER}} .binduz-er-sidebar-add-box::before',

        ]);


        $this->box_css(
            array(

                'title' => esc_html__('Box', 'element-ready'),
                'slug' => '_box_verwr_b5ox_style',
                'element_name' => '_box_ver_wer_wrapper_element_ready_',
                'selector' => '{{WRAPPER}} .binduz-er-top-news-faq,{{WRAPPER}} .binduz-er-sidebar-about .binduz-er-sidebar-about-item',
                'condition' => [
                    'block_style' => ['style2', 'style3'],
                ],

            )
        );
    }

    protected function render()
    {

        $settings        = $this->get_settings();


?>

        <?php if ($settings['block_style'] == 'style1') : ?>

            <div class="binduz-er-populer-news-sidebar-faq">
                <div class="binduz-er-top-news-faq">
                    <h4 class="binduz-er-title"><?php echo $settings['title']; ?></h4>
                    <div class="binduz-er-meta-author">
                        <span><?php echo esc_html($settings['author_name_by']) ?> <span><?php echo $settings['author_name']; ?></span></span>
                    </div>
                    <?php if ($settings['content'] != '') : ?>
                        <div class="binduz-er-answare">
                            <p><?php echo $settings['content']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endif; ?>
        <?php if ($settings['block_style'] == 'style2') : ?>
            <div class="binduz-er-top-news-faq">
                <h4 class="binduz-er-title"><?php echo $settings['title']; ?></h4>
                <div class="binduz-er-meta-author">
                    <span><?php echo esc_html($settings['author_name_by']) ?> <span><?php echo $settings['author_name']; ?></span></span>
                </div>
                <?php if ($settings['content'] != '') : ?>
                    <div class="binduz-er-answare">
                        <p><?php echo $settings['content']; ?></p>
                    </div>
                <?php endif; ?>
                <?php if ($settings['binduz_er_image']['url'] != '') : ?>
                    <div class="binduz-er-client-thumb">
                        <img src="<?php echo esc_url($settings['binduz_er_image']['url']); ?>" alt="image">
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($settings['block_style'] == 'style3') : ?>

            <div class="binduz-er-sidebar-about">
                <div class="binduz-er-sidebar-about-item">
                    <div class="binduz-er-sidebar-about-user d-flex">
                        <?php if ($settings['binduz_er_image']['url'] != '') : ?>
                            <div class="binduz-er-thumb">
                                <img src="<?php echo esc_url($settings['binduz_er_image']['url']); ?>" alt="image">
                            </div>
                        <?php endif; ?>
                        <div class="binduz-er-content">
                            <h4 class="binduz-er-title"><?php echo $settings['author_name']; ?></h4>
                            <span><?php echo esc_html($settings['author_name_by']) ?></span>
                            <?php if ($settings['social'] == 'yes') : ?>
                                <ul>
                                    <?php foreach ($settings['social_list'] as $item) : ?>
                                        <li class="elementor-repeater-item-<?php echo $item['_id']; ?>">
                                            <a href="<?php echo esc_url($item['list_url']); ?>">
                                                <?php \Elementor\Icons_Manager::render_icon($item['list_icon'], ['aria-hidden' => 'true']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="binduz-er-text">
                        <p><?php echo $settings['content']; ?></p>
                        <?php if ($settings['button_title'] != '') : ?>
                            <a class="binduz-er-main-btn" href="<?php echo esc_url($settings['button_url']); ?>"><?php echo esc_html($settings['button_title']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($settings['block_style'] == 'style4') : ?>
            <div class="binduz-er-sidebar-add-box">
                <div class="binduz-er-logo">
                    <a href="<?php echo esc_url($settings['author_url']); ?>">
                        <?php if ($settings['binduz_er_image']['url'] != '') : ?>
                            <img src="<?php echo esc_url($settings['binduz_er_image']['url']); ?>" alt="image">
                        <?php endif; ?>
                    </a>
                </div>
                <?php if ($settings['content'] != '') : ?>
                    <p><?php echo $settings['content']; ?></p>
                <?php endif; ?>
                <?php if ($settings['button_title'] != '') : ?>
                    <a class="binduz-er-main-btn" href=" <?php echo esc_url($settings['button_url']); ?>"><?php echo $settings['button_title']; ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ($settings['block_style'] == 'style5') : ?>
            <div class="<?php echo !is_singular('post') ? 'binduz-er-blog-details-box' : 'er-not-post-page'; ?>">
                <div class="binduz-er-quote-text">
                    <?php if ($settings['content'] != '') : ?>
                        <p><?php echo $settings['content']; ?></p>
                    <?php endif; ?>
                    <span><?php echo esc_html($settings['author_name_by']) ?> <span><?php echo $settings['author_name']; ?></span></span>

                </div>
            </div>
        <?php endif; ?>




<?php
    }
}
