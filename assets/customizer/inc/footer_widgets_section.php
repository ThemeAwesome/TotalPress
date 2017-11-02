<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'footer_widgets_section', array(
    'title'       => esc_attr__('Footer Widget Layout','totalpress'),
    'panel'       => 'totalpress_footer_widget_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
) );

TotalPress_Kirki::add_field('theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'footer_widgets_main_container',
	'label'       => __('Main Footer Widgets Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the main footer widgets container within the grid container. Select &quot;Full Width&quot; have the main header expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'footer_widgets_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field('theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'inner_footer_widgets_container',
	'label'       => __('Inside Footer Widgets Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the inner footer widgets container within the grid container. Select &quot;Full Width&quot; to have the inside header expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'footer_widgets_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );