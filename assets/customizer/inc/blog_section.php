<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'content_section', array(
    'title'      => esc_attr__('Blog Layout','totalpress'),
    'panel'      => 'totalpress_blog_options',
    'priority'   => 2,
    'capability' => 'edit_theme_options',
));

TotalPress_Kirki::add_field('theme_customizer',array(
	'type'        => 'radio-buttonset',
	'settings'    => 'show_excerpt',
	'label'       => esc_attr__('Blog Post Display','totalpress'),
	'tooltip'     => esc_attr__('Display the full content or an excerpt of the content of each post.','totalpress'),
	'section'     => 'content_section',
	'default'     => 'full_post',
	'priority'    => 1,
	'choices'     => array(
		'full_post' => esc_attr__('Full','totalpress'),
		'excerpt' 	=> esc_attr__('Excerpt','totalpress'),
	),
));