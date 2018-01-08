<?php /* @version 1.0.8 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_typography_section', array(
    'title'       => esc_attr__('Typography','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 2,
    'capability'  => 'edit_theme_options',
));
		TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
			'type'        => 'typography',
			'settings'    => 'totalpress_theme_body_font',
			'label'       => esc_attr__('Body Font','totalpress' ),
			'tooltip'     => esc_attr__('Change the font family of your theme. Default is Source Sans Pro.','totalpress'),
			'section'     => 'totalpress_typography_section',
			'priority'    => 1,
			'transport'   => 'auto',
			'default'     => array(
				'font-family'    => 'Source Sans Pro',
				'variant'        => 'regular',
				'font-size'      => '17px',
				'line-height'    => '1.5',
				'letter-spacing' => '0',
				'subsets'        => array('latin-ext'),
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
					'property' => 'font-family,font-size,font-weight,line-height,letter-spacing,text-transform',
				),
			),
		));