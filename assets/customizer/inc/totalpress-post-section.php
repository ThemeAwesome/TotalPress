<?php /* @version 1.0.12 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_post_section', array(
    'title'      => esc_attr__('Post Layout','totalpress'),
    'panel'      => 'totalpress_blog_options',
    'priority'   => 2,
    'capability' => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'totalpress_show_excerpt',
	'label'       => esc_attr__('Post Display','totalpress'),
	'tooltip'     => esc_attr__('Display the full content or an excerpt of the content of each post.','totalpress'),
	'section'     => 'totalpress_post_section',
	'default'     => 'full_post',
	'priority'    => 1,
	'choices'     => array(
		'full_post' => esc_attr__('Full','totalpress'),
		'excerpt' 	=> esc_attr__('Excerpt','totalpress'),
	),
));