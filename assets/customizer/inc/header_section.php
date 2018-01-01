<?php /* @version 1.0.7 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_header_section', array(
    'title'       => esc_attr__('Header Layout','totalpress'),
    'panel'       => 'totalpress_header_options',
    'priority'    => 2,
    'capability'  => 'edit_theme_options',
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_header_container',
	'label'       => __('Main Header Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the main header container within the grid container. Select &quot;Full Width&quot; have the main header container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_header_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_head_container',
	'label'       => __('Inside Header Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the inner header container within the grid container. Select &quot;Full Width&quot; to have the inside header container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_header_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_head_alignment',
	'section'     => 'totalpress_header_section',
	'label'       => esc_attr__('Header Alignment','totalpress'),
	'tooltip'     => esc_attr__('Set the alignment of the Header area.','totalpress'),
	'default'     => 'left',
	'priority'    => 6,
	'transport'   => 'auto',
	'choices'     => array(
		'left'   => esc_attr__('Left','totalpress'),
		'center' => esc_attr__('Center','totalpress'),
		'right'  => esc_attr__('Right','totalpress'),
	),
	'output'      => array(
		array(
			'element' => '.site-branding',
			'function' => 'css',
			'property' => 'text-align',
		),
	),
) );