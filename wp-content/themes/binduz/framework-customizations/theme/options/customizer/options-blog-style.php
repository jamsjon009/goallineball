<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_style_settings' => [
        'title'   => esc_html__( 'Blog Style settings', 'binduz' ),
        'options' => [

            'blog_cat_color' => [
                'label' => esc_html__( 'Blog Category color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the Blog Category background color with rgba color or solid color', 'binduz'),
            ],
            'blog_cat_background_color' => [
                'label' => esc_html__( 'Blog Category bgcolor', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the Blog Category background color with rgba color or solid color', 'binduz'),
            ],

            'blog_cat_background_hover_color' => [
                'label' => esc_html__( 'Blog Category Hover bgcolor', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the Blog Category background color with rgba color or solid color', 'binduz'),
            ],
         
            'sidebar_background_color' => [
                'label' => esc_html__( 'Sidebar Background color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the sidebar background color with rgba color or solid color', 'binduz'),
            ],
            'sidebar_padding_top' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'label' => esc_html__('Sidebar Padding Top', 'binduz'),
            ],
            'sidebar_padding_bottom' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'label' => esc_html__('Sidebar Padding bottom', 'binduz'),
            ],
            'sidebar_padding_lf' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 1,
                ),
                'label' => esc_html__('Sidebar Padding left right', 'binduz'),
            ],
            'sidebar_widget_bottom_margin' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 300,
                    'step' => 1,
                ),
                'label' => esc_html__('Sidebar widget bottom margin', 'binduz'),
            ],
            'sidebar_widget_title_color' => [
                'label' => esc_html__( 'Widget title color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the sidebar widget title color with rgba color or solid color', 'binduz'),
            ],
            'sidebar_widget_content_color' => [
                'label' => esc_html__( 'Widget content color', 'binduz'),
                'type'  => 'color-picker',
                'desc'  => esc_html__( 'You can change the sidebar widget content color with rgba color or solid color', 'binduz'),
            ],
           
            'sidebar_widget_title_margin_bottom' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 200,
                    'step' => 1,
                ),
                'label' => esc_html__('Widget title bottom', 'binduz'),
                
            ],

            'sidebar_widget_title_margin_top' => [
                'type'       => 'slider',
                'properties' => array(
                    'min'  => 0,
                    'max'  => 200,
                    'step' => 1,
                ),
                'label' => esc_html__('Widget title top', 'binduz'),
                
            ],
        ],
    ]
];