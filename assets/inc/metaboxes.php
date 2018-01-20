<?php /* @version 1.0.11 */
if ( ! defined('ABSPATH')) exit;
// Add our tabbed metabox
function totalpress_register_tabbed_meta_boxes($meta_boxes) {
    $meta_boxes[] = array (
      'id' => 'totalpress-post-page-options',
      'title' => esc_html__('TotalPress Post/Page Options','totalpress'),
      'pages' =>   array (
         'post',
         'page',
      ),
      'context' => 'normal',
      'priority' => 'high',
      'autosave' => true,
      'fields' =>   array (
        array (
          'id' => 'totalpress_featured_image_layout_options',
          'type' => 'radio',
          'options' =>       array (
            'show_below_title' => esc_html__('Featured Image Below Title','totalpress'),
            'show_above_title' => esc_html__('Featured Image Above Title','totalpress'),
          ),
          'tab' => 'totalpress_featured_image_options',
          'inline' => false,
          'std' =>  array (
             'show_below_title',
          ),
        ),
        array (
          'id' => 'totalpress_page_options_hide_title',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Post/Page Title','totalpress'),
          'tab' => 'totalpress_hide_post_page_elements',
        ),
        array (
          'id' => 'totalpress_hide_widget_one',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Footer Widget One','totalpress'),
          'tab' => 'totalpress-hide-footer-widgets',
        ),
        array (
          'id' => 'totalpress_hide_widget_two',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Footer Widget Two','totalpress'),
          'tab' => 'totalpress-hide-footer-widgets',
        ),
        array (
          'id' => 'totalpress_hide_widget_three',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Footer Widget Three','totalpress'),
          'tab' => 'totalpress-hide-footer-widgets',
        ),
        array (
          'id' => 'totalpress_hide_widget_four',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Footer Widget Four','totalpress'),
          'tab' => 'totalpress-hide-footer-widgets',
        ),
        array (
          'id' => 'totalpress_hide_widget_five',
          'type' => 'checkbox',
          'desc' => esc_html__('Hide Footer Widget Five','totalpress'),
          'tab' => 'totalpress-hide-footer-widgets',
        ),
        array (
          'id' => 'totalpress_remove_content_area_padding',
          'type' => 'checkbox',
          'desc' => esc_html__('Remove Content Area Padding','totalpress'),
          'tab' => 'totalpress_page_builder_options',
        ),
      ),
      'tab_style' => 'left',
      'tab_wrapper' => true,
      'tabs' =>   array (
        'totalpress_hide_post_page_elements' => array (
          'label' => esc_html__('Hide Post/Page Elements','totalpress'),
          'icon' => 'dashicons-arrow-right',
        ),
        'totalpress_page_builder_options' =>  array (
          'label' => esc_html__('Page Builder Options','totalpress'),
          'icon' => 'dashicons-arrow-right',
        ),
        'totalpress-hide-footer-widgets' =>  array (
          'label' => esc_html__('Hide Footer Widgets','totalpress'),
          'icon' => 'dashicons-arrow-right',
        ),
        'totalpress_featured_image_options' => array (
          'label' => esc_html__('Featured Image Options','totalpress'),
          'icon' => 'dashicons-arrow-right',
        ),
      ),
    );
    return $meta_boxes;
}
add_filter('rwmb_meta_boxes','totalpress_register_tabbed_meta_boxes');