<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_header_section', array(
    'title'       => esc_html__('Layout','totalpress'),
    'panel'       => 'totalpress_header_options',
    'priority'    => 2,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_header_container',
	'label'       => esc_html__('Main Header Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the main header container within the grid container. Select &quot;Full Width&quot; have the main header container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_header_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_head_container',
	'label'       => esc_html__('Inner Header Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the inner header container within the grid container. Select &quot;Full Width&quot; to have the inside header container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_header_section',
	'default'     => 'contain',
	'priority'    => 3,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_head_alignment',
	'section'     => 'totalpress_header_section',
	'label'       => esc_html__('Header Alignment','totalpress'),
	'tooltip'     => esc_html__('Set the alignment of the Header area.','totalpress'),
	'default'     => 'left',
	'priority'    => 999,
	'transport'   => 'auto',
	'choices'     => array(
		'left'   => esc_html__('Left','totalpress'),
		'center' => esc_html__('Center','totalpress'),
		'right'  => esc_html__('Right','totalpress'),
	),
	'output'      => array(
		array(
			'element' => '.site-branding',
			'function' => 'css',
			'property' => 'text-align',
		),
	),
));