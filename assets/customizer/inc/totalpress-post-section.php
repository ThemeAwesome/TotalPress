<?php /* @version 1.0.22 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_post_section', array(
    'title'      => esc_html__('Layout','totalpress'),
    'panel'      => 'totalpress_blog_options',
    'priority'   => 2,
    'capability' => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_show_excerpt',
	'label'       => esc_html__('Post Display','totalpress'),
	'tooltip'     => esc_html__('Display the full content or an excerpt of the content of each post.','totalpress'),
	'section'     => 'totalpress_post_section',
	'default'     => 'full_post',
	'priority'    => 1,
	'choices'     => array(
		'full_post' => esc_html__('Full','totalpress'),
		'excerpt' 	=> esc_html__('Excerpt','totalpress'),
	),
));