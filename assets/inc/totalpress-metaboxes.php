<?php
if ( ! defined('ABSPATH')) exit;
//Hide Post/Page Elelments Metabox
function totalpress_hide_post_page_elements_metabox( $meta_boxes ) {
  $prefix = 'totalpress_';
  $meta_boxes[] = array(
    'id' => 'hide-post-page-elements',
    'title' => esc_html__('Hide Post/Page Elements','totalpress'),
    'post_types' => array('post','page'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'id' => $prefix . 'page_options_hide_title',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Post/Page Title','totalpress'),
      ),
    ),
  );
  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'totalpress_hide_post_page_elements_metabox' );
//Hide Footer Widgets Metabox
function totalpress_hide_footer_widgets_metabox( $meta_boxes ) {
  $prefix = 'totalpress_';
  $meta_boxes[] = array(
    'id' => 'hide-footer-widgets',
    'title' => esc_html__('Hide Footer Widgets','totalpress'),
    'post_types' => array('post','page'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'id' => $prefix . 'hide_widget_one',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Footer Widget One','totalpress'),
      ),
      array(
        'id' => $prefix . 'hide_widget_two',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Footer Widget Two','totalpress'),
      ),
      array(
        'id' => $prefix . 'hide_widget_three',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Footer Widget Three','totalpress'),
      ),
      array(
        'id' => $prefix . 'hide_widget_four',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Footer Widget Four','totalpress'),
      ),
      array(
        'id' => $prefix . 'hide_widget_five',
        'type' => 'checkbox',
        'desc' => esc_html__('Hide Footer Widget Five','totalpress'),
      ),
    ),
  );
  return $meta_boxes;
}
add_filter('rwmb_meta_boxes','totalpress_hide_footer_widgets_metabox');
//Page Builder Options Metabox
function totalpress_page_builder_options_meta_box($meta_boxes) {
  $prefix = 'totalpress_';
  $meta_boxes[] = array(
    'id' => 'page-builder-options',
    'title' => esc_html__('Page Builder Options','totalpress'),
    'post_types' => array('post','page'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
      array(
        'id' => $prefix . 'remove_content_area_padding',
        'type' => 'checkbox',
        'desc' => esc_html__('Remove Content Area Padding','totalpress'),
      ),
    ),
  );
  return $meta_boxes;
}
add_filter('rwmb_meta_boxes','totalpress_page_builder_options_meta_box');