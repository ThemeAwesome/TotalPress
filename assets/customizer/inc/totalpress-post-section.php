<?php
if ( ! defined('ABSPATH')) exit;
/* ======================= Content Layout Section ============================ */
TotalPress_Kirki::add_section( 'totalpress_content_layout_section', array(
    'title'      => esc_html__('Post Layout','totalpress'),
    'panel'      => 'totalpress_blog_options',
    'priority'   => 1,
    'capability' => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_post_content_container',
	'label'       => esc_html__('Post Main Content Container Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the main post container within the grid container. Select &quot;Full Width&quot; have the main post container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_content_layout_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_post_inner_content_container',
	'label'       => esc_html__('Post Inner Content Container Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the inner post container within the grid container. Select &quot;Full Width&quot; to have the inside post container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_content_layout_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_section( 'totalpress_post_section', array(
    'title'      => esc_html__('Blog Section','totalpress'),
    'panel'      => 'totalpress_blog_options',
    'priority'   => 2,
    'capability' => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_show_excerpt',
	'label'       => esc_html__('Post Display','totalpress'),
	'tooltip'     => esc_html__('Display the full content of each post or an excerpt of each post.','totalpress'),
	'section'     => 'totalpress_post_section',
	'default'     => 'full_post',
	'priority'    => 1,
	'choices'     => array(
		'full_post' => esc_html__('Full','totalpress'),
		'excerpt' 	=> esc_html__('Excerpt','totalpress'),
	),
));