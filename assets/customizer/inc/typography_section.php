<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'typography_section', array(
    'title'       => esc_attr__('Typography Options','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 2,
    'capability'  => 'edit_theme_options',
));

TotalPress_Kirki::add_field('theme_customizer',array(
	'type'        => 'typography',
	'settings'    => 'theme_body_font',
	'label'       => esc_attr__('Body Font','totalpress' ),
	'tooltip'     => esc_attr__('Change the font family of your theme.','totalpress'),
	'section'     => 'typography_section',
	'priority'    => 1,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => 'regular',
		'font-size'      => '17px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array('latin-ext'),
		'color'          => '#3f3f3f',
		'text-transform' => 'none'
	),
    'choices' => array(
        'variant' => array(
            'regular',
            '700',
            '900',
        ),
    ),
	'output'      => array(
		array(
			'element'  => 'body',
			'function' => 'css',
			'property' => 'color,font-family,font-size,line-height,letter-spacing,text-transform',
		),
	),
));

TotalPress_Kirki::add_field('theme_customizer',array(
	'type'        => 'typography',
	'settings'    => 'theme_heading_font',
	'label'       => esc_attr__('Header Tags','totalpress'),
	'tooltip'     => esc_attr__('Change default font family of the header tags of your theme.','totalpress'),
	'section'     => 'typography_section',
	'priority'    => 1,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'variant'        => '900',
		'letter-spacing' => '0',
		'subsets'        => array('latin-ext'),
		'color'          => '#3f3f3f',
		'text-transform' => 'none'
	),
    'choices' => array(
        'variant' => array(
            '900',
            '700',
            'regular',
        ),
    ),
	'output'      => array(
		array(
			'element'  => 'h1,h2,h3,h4,h5,h6',
			'function' => 'css',
			'property' => 'color,font-family,line-height,letter-spacing,text-transform',
		),
	),
));