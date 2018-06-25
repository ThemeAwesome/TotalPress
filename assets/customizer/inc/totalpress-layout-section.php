<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'select',
	'settings'    => 'totalpress_blog_layout',
	'section'     => 'totalpress_layout_options',
	'label'       => esc_html__('Theme Layout','totalpress'),
	'tooltip'     => esc_html__('Set initial layout for the theme. Will also affect the layout of posts, pages, archives, categories etc.','totalpress'),
	'default'     => 'right_sidebar',
	'priority'    => 1,
	'transport'   => 'auto',
	'choices'     => array(
		'right_sidebar'   => esc_html__('Content | Sidebar','totalpress'),
		'left_sidebar'    => esc_html__('Sidebar | Content','totalpress'),
		'sidebars_right'  => esc_html__('Content | Sidebar | Sidebar','totalpress'),
		'sidebars_left'   => esc_html__('Sidebar | Sidebar | Content','totalpress'),
		'both_sidebars'   => esc_html__('Sidebar | Content | Sidebar','totalpress'),
		'no_sidebars'     => esc_html__('No Sidebars (Full Width)','totalpress'),
	),
));
TotalPress_Kirki::add_section( 'totalpress_layout_options', array(
    'title'       => esc_html__('Layout','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'dimension',
	'settings'    => 'totalpress_main_grid_container_width',
	'label'       => esc_html__('Container Width','totalpress'),
	'tooltip'     => esc_html__('Set the width of Foundations&#39; main grid container. Default is 1200px.','totalpress'),
	'section'     => 'totalpress_layout_options',
	'default'     => '1200px',
	'priority'    => 2,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.grid-container,.inside-top-sidebar,.inside-header,.top-bar,.inside-content,.inside-footer-widgets,.inside-footer',
			'function' => 'css',
			'property' => 'max-width',
		),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_theme_layout_container',
	'label'       => esc_html__('Container Layout','totalpress' ),
	'tooltip'     => esc_html__('Select "Separate Containers" to keep a space between all elements in the content area such as, articles, widgets, footer and so on. Select "One Container" to have no spaces between any of the elements.','totalpress'),
	'section'     => 'totalpress_layout_options',
	'default'     => 'separate_containers',
	'priority'    => 3,
	'choices'     => array(
		'separate_containers' => esc_html__('Separate Containers','totalpress'),
		'one_container' => esc_html__('One Container','totalpress'),
	),
));