<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_navigation_section', array(
    'title'       => esc_attr__('Navigation Layout','totalpress'),
    'panel'       => 'totalpress_navigation_options',
    'priority'    => 4,
    'capability'  => 'edit_theme_options',
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_nav_container',
	'label'       => __('Main Navigation Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the main navigation container within the grid container. Select &quot;Full Width&quot; have the main navigation container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_navigation_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_nav_container',
	'label'       => __('Top-Bar Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the Top Bar contained within the grid container. Select &quot;Full Width&quot; to have the Top-Bar expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_navigation_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'select',
	'settings'    => 'totalpress_nav_position',
	'label'       => esc_attr__('Top-Bar Position','totalpress'),
	'tooltip'     => esc_attr__('Select where you want to display the Top-Bar.','totalpress'),
	'section'     => 'totalpress_navigation_section',
	'default'     => 'bottom_of_header',
	'priority'    => 3,
	'transport'   => 'auto',
	'choices'     => array(
		'bottom_of_header' => esc_attr__('Bottom of Header','totalpress'),
		'top_of_header'    => esc_attr__('Top of Header','totalpress'),
	),
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array( //control
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_theme_nav_alignment',
	'label'       => esc_attr__('Top-Bar Alignment','totalpress'),
	'tooltip'     => esc_attr__('Set the alignment of the Top-Bar.','totalpress'),
	'section'     => 'totalpress_navigation_section',
	'default'     => 'top-bar-left',
	'priority'    => 4,
	'transport'   => 'auto',
	'choices'     => array(
		'top-bar-left'   => esc_attr__('Left','totalpress'),
		'top-bar-center' => esc_attr__('Center','totalpress'),
		'top-bar-right'  => esc_attr__('Right','totalpress'),
	),
) );