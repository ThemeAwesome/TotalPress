<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_header_sidebar_layout_section', array(
    'title'       => esc_attr__('Header Sidebar Layout','totalpress'),
    'panel'       => 'totalpress_header_sidebar_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_head_sidebar_alignment',
	'section'     => 'totalpress_header_sidebar_layout_section',
	'label'       => esc_attr__('Header Sidebar Alignment','totalpress'),
	'tooltip'     => esc_attr__('Set the alignment of the Header sidebar. Default is Right.','totalpress'),
	'default'     => 'right',
	'priority'    => 4,
	'transport'   => 'auto',
	'choices'     => array(
		'left'   => esc_attr__('Left','totalpress'),
		'center' => esc_attr__('Center','totalpress'),
		'right'  => esc_attr__('Right','totalpress'),
	),
	'output'      => array(
		array(
			'element' => '.header-sidebar',
			'function' => 'css',
			'property' => 'text-align',
		),
	),
) );