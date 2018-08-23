<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_typography_section', array(
    'title'       => esc_html__('Typography','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 2,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'typography',
	'settings'    => 'totalpress_theme_body_font',
	'label'       => esc_html__('Theme Text','totalpress' ),
	'tooltip'     => esc_html__('Change the font family of your theme.','totalpress'),
	'section'     => 'totalpress_typography_section',
	'priority'    => 1,
	'transport'   => 'auto',
	'default'     => array(
		'font-family' 		=> 'Source Sans Pro',
		'variant'        	=> 'regular',
		'font-size'      	=> '17px',
		'line-height'    	=> '1.5',
		'letter-spacing' 	=> '0',
		'text-transform' 	=> 'none'
	),
	'choices' => array(
		'fonts' => array(
			'standard' => array(
				'-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
			),
			'google' => array(),
		),
	),
    'choices' => array(
        'variant' => array(
            'regular','100','100italic','200','200italic','300','300italic','regular','italic','500','500italic','600','600italic','700','700italic','800','800italic','900','900italic',
        ),
    ),
	'output'      => array(
		array(
			'element'  => 'body',
			'function' => 'css',
			'property' => 'font-family,font-size,font-weight,line-height,letter-spacing,text-transform',
		),
	),
));