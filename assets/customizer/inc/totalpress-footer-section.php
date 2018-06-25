<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_footer_section', array(
    'title'       => esc_html__('Layout','totalpress'),
    'panel'       => 'totalpress_footer_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_main_footer_container',
	'label'       => esc_html__('Main Container Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the main footer container within the grid container. Select &quot;Full Width&quot; have the main footer container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_footer_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_footer_container',
	'label'       => esc_html__('Inner Container Width','totalpress' ),
	'tooltip'     => esc_html__('Select &quot;Contain to Grid&quot; to keep the inner footer container within the grid container. Select &quot;Full Width&quot; to have the inside footer conatiner expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_footer_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_html__('Contain to Grid','totalpress'),
		'full' => esc_html__('Full Width','totalpress'),
	),
));