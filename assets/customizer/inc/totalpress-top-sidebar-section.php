<?php /* @version 1.0.17 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_top_sidebar_layout_section', array(
    'title'       => esc_html__('Top Sidebar Layout','totalpress'),
    'panel'       => 'totalpress_top_sidebar_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_top_sidebar_container',
	'label'       => __('Main Top Sidebar Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the main Top Sidebar contained within the grid container. Select &quot;Full Width&quot; have the main header expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_top_sidebar_layout_section',
	'default'     => 'contain',
	'priority'    => 1,
	'transport'   => 'auto',
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_top_sidebar_container',
	'label'       => __('Inside Top Sidebar Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the inner Top Sidebar contained within the grid container. Select &quot;Full Width&quot; to have the inside header expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_top_sidebar_layout_section',
	'default'     => 'contain',
	'priority'    => 2,
	'transport'   => 'auto',
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_top_sidebar_alignment',
	'label'       => esc_html__('Top SideBar Alignment','totalpress'),
	'tooltip'     => esc_html__('Set the alignment of the Top Sidebar area. Default is Right.','totalpress'),
	'section'     => 'totalpress_top_sidebar_layout_section',
	'default'     => 'right',
	'priority'    => 999,
	'transport'   => 'auto',
	'choices'     => array(
		'left'   => esc_html__('Left','totalpress'),
		'center' => esc_html__('Center','totalpress'),
		'right'  => esc_html__('Right','totalpress'),
	),
	'output'      => array(
		array(
			'element' => '.inside-top-sidebar',
			'function' => 'css',
			'property' => 'text-align',
		),
	),
));