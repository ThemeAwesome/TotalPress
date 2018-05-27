<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_header_sidebar_layout_section', array(
    'title'       => esc_html__('Layout','totalpress'),
    'panel'       => 'totalpress_header_sidebar_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_head_sidebar_alignment',
	'section'     => 'totalpress_header_sidebar_layout_section',
	'label'       => esc_html__('Alignment','totalpress'),
	'tooltip'     => esc_html__('Set the alignment of the Header sidebar. Default is Right.','totalpress'),
	'default'     => 'right',
	'priority'    => 4,
	'transport'   => 'auto',
	'choices'     => array(
		'left'   => esc_html__('Left','totalpress'),
		'center' => esc_html__('Center','totalpress'),
		'right'  => esc_html__('Right','totalpress'),
	),
	'output'      => array(
		array(
			'element' => '.header-sidebar.cell',
			'function' => 'css',
			'property' => 'text-align',
		),
	),
));