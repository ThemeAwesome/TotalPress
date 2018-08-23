<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_colors_section', array(
    'title'       => esc_html__('Colors','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 3,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_font_colors',
	'label'       => esc_html__('Theme Text','totalpress'),
	'tooltip'     => esc_html__('Change default font color. Options to change the colors of other areas is available in TP Primo.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#3f3f3f',
	'priority'    => 2,
	'transport'   => 'auto',
	'output'      => array(
		array(
			 'element' => 'body',
			'function' => 'css',
			'property' => 'color',
		),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_link_colors',
	'label'       => esc_html__('Theme Links','totalpress'),
	'tooltip'     => esc_html__('Change default link color. Does not change link color of other areas, i.e. .entry-meta a, etc. These are available in TP Primo.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#b02329',
	'priority'    => 3,
	'transport'   => 'auto',
	'output'      => array(
		array(
			 'element' => 'a, a:visited',
			'function' => 'css',
			'property' => 'color',
		),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_link_hover_colors',
	'label'       => esc_html__('Theme Link Hover','totalpress'),
	'tooltip'     => esc_html__('Change default link hover color. Does not change link hover color of other areas, i.e. .entry-meta a:hover, etc. This is available in TP Primo.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#3f3f3f',
	'priority'    => 4,
	'transport'   => 'auto',
	'output'      => array(
		array(
			 'element' => 'a:hover,a:focus',
			'function' => 'css',
			'property' => 'color',
		),
	),
));