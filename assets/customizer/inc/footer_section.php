<?php /* @version 1.0.6 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_footer_section', array(
    'title'       => esc_attr__('Footer Layout','totalpress'),
    'panel'       => 'totalpress_footer_options',
    'priority'    => 10,
    'capability'  => 'edit_theme_options',
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_main_footer_container',
	'label'       => __('Main Footer Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the main footer container within the grid container. Select &quot;Full Width&quot; have the main footer container expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_footer_section',
	'default'     => 'contain',
	'priority'    => 1,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'select',
	'settings'    => 'totalpress_inner_footer_container',
	'label'       => __('Inside Footer Width','totalpress' ),
	'tooltip'     => esc_attr__('Select &quot;Contain to Grid&quot; to keep the inner footer container within the grid container. Select &quot;Full Width&quot; to have the inside footer conatiner expand 100% to fill the screen. Default is &quot;Contain to Grid&quot;','totalpress'),
	'section'     => 'totalpress_footer_section',
	'default'     => 'contain',
	'priority'    => 2,
	'choices'     => array(
		'contain' => esc_attr__('Contain to Grid','totalpress'),
		'full' => esc_attr__('Full Width','totalpress'),
	),
) );

TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'switch',
	'settings'    => 'totalpress_btp_switch',
	'label'       => esc_attr__('Back To Top','totalpress'),
	'tooltip'     => esc_attr__('Switch the Back to Top button on or off.','totalpress'),
	'section'     => 'totalpress_footer_section',
	'default'     => '1',
	'priority'    => 999,
	'transport'   => 'auto',
	'choices'     => array(
		'on'  => esc_attr__('On','totalpress' ),
		'off' => esc_attr__('Off','totalpress' ),
	),
) );