<?php /* @version 1.0.11 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_layout_options', array(
    'title'       => esc_attr__('Layout','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'dimension',
	'settings'    => 'totalpress_main_grid_container_width',
	'label'       => esc_attr__('Grid Container Width','totalpress'),
	'tooltip'     => esc_attr__('Set the width of Foundations&#39; main grid container. Default is 1200px (75rem).','totalpress'),
	'section'     => 'totalpress_layout_options',
	'default'     => '1200px',
	'priority'    => 1,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.grid-container,.inside-top-sidebar,.inside-header,.top-bar,.inside-footer-widgets,.inside-footer',
			'function' => 'css',
			'property' => 'max-width',
		),
	),
));
TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'select',
	'settings'    => 'totalpress_blog_layout',
	'section'     => 'totalpress_layout_options',
	'label'       => esc_attr__('Theme Layout','totalpress'),
	'tooltip'     => esc_attr__('Set initial layout for the theme. Will also affect the layout of posts, pages, archives, categories etc.','totalpress'),
	'default'     => 'right_sidebar',
	'priority'    => 2,
	'transport'   => 'auto',
	'choices'     => array(
		'right_sidebar'   => esc_attr__('Content | Sidebar','totalpress'),
		'left_sidebar'    => esc_attr__('Sidebar | Content','totalpress'),
		'sidebars_right'  => esc_attr__('Content | Sidebar | Sidebar','totalpress'),
		'sidebars_left'   => esc_attr__('Sidebar | Sidebar | Content','totalpress'),
		'both_sidebars'   => esc_attr__('Sidebar | Content | Sidebar','totalpress'),
		'no_sidebars'     => esc_attr__('No Sidebars (Full Width)','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_theme_layout_container',
	'label'       => __('Grid Container Layout','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Separate Containers&quot; to keep a space between all elements in the content area such as, articles, widgets, footer and so on. Select &quot;One Container&quot; have the main footer container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_layout_options',
	'default'     => 'separate_containers',
	'priority'    => 3,
	'choices'     => array(
		'separate_containers' => esc_attr__('Separate Containers','totalpress'),
		'one_container' => esc_attr__('One Container','totalpress'),
	),
));