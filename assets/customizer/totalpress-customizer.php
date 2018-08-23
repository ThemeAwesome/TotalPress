<?php
if ( ! defined('ABSPATH')) exit;

if ( class_exists('WP_Customize_Panel')) {
  class TotalPress_WP_Customize_Panel extends WP_Customize_Panel {
    public $panel;
    public $type = 'totalpress_panel';
    public function json() {
      $array = wp_array_slice_assoc( (array) $this, array('id','description','priority','type','panel',));
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo('charset'));
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      return $array;
    }}}
if ( class_exists( 'WP_Customize_Section' ) ) {
  class TotalPress_WP_Customize_Section extends WP_Customize_Section {
    public $section;
    public $type = 'totalpress_section';
    public function json() {
      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo('charset'));
      $array['content'] = $this->get_content();
      $array['active'] = $this->active();
      $array['instanceNumber'] = $this->instance_number;
      if ( $this->panel ) {
        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
      } else {
        $array['customizeAction'] = 'Customizing';
      }
      return $array;
    }}}
// Enqueue our scripts and styles
if ( ! function_exists('totalpress_customizer_live_preview')) :
  function totalpress_customize_controls_scripts() {
    wp_enqueue_script('pe-customize-controls',get_theme_file_uri( '/assets/customizer/js/pe-customize-controls.js'),array(),TOTALPRESS_VERSION, true);
    wp_enqueue_style('totalpress-customizer',get_theme_file_uri('/assets/customizer/css/totalpress-customizer.css'),array(),TOTALPRESS_VERSION);
  }
  add_action('customize_controls_enqueue_scripts','totalpress_customize_controls_scripts');
endif;

if ( ! function_exists('totalpress_customize_register')) :
  function totalpress_customize_register( $wp_customize ) {
    // Has to be at the top
    $wp_customize->register_panel_type('TotalPress_WP_Customize_Panel');
    $wp_customize->register_section_type('TotalPress_WP_Customize_Section');
    $wp_customize->get_control('blogname')->priority = 10;
    $wp_customize->get_setting('blogname' )->transport = 'postMessage';
    $wp_customize->get_control('blogdescription')->priority = 30;
    $wp_customize->get_setting('blogdescription' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
      $wp_customize->selective_refresh->add_partial( 'blogname', array(
          'selector' => 'h1.site-title a',
          'render_callback' => 'totalpress_customize_partial_blogname',));
      
      $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
          'selector' => 'p.site-description',
          'render_callback' => 'totalpress_customize_partial_blogdescription',));
    }

    // Render the site title for the selective refresh partial.
    if ( ! function_exists('totalpress_customize_partial_blogname')) :
      function totalpress_customize_partial_blogname() {
        bloginfo('name');
      }
    endif;

    // Render the site tagline for the selective refresh partial.
    if ( ! function_exists( 'totalpress_customize_partial_blogdescription' ) ) :
      function totalpress_customize_partial_blogdescription() {
        bloginfo('description');
      }
    endif;

    $wp_customize->add_setting('totalpress_hide_sitetitle',
        array(
            'sanitize_callback' => 'totalpress_sanitize_checkbox',
            'default'           => 0,
            'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('totalpress_hide_sitetitle',
        array(
            'label'     => esc_html__('Hide Site Title','totalpress'),
            'section'   => 'title_tagline',
            'type'      => 'checkbox',
            'priority' => 20
    ));
    $wp_customize->add_setting('totalpress_hide_tagline',
        array(
            'sanitize_callback' => 'totalpress_sanitize_checkbox',
            'default'           => '',
            'transport'         => 'postMessage'
    ));
    $wp_customize->add_control('totalpress_hide_tagline',
        array(
            'label'     => esc_html__('Hide Site Tagline','totalpress'),
            'section'   => 'title_tagline',
            'type'      => 'checkbox',
            'priority' => 40
    ));

    // main theme options panel
    $totalpress_theme_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_theme_options',array(
      'title' => 'TotalPress Options',
      'priority' => 999,
    ));
    $wp_customize->add_panel( $totalpress_theme_options );

        $totalpress_more_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_more_options',array(
          'title' => esc_html__('Get More Options','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 1,
        ));
        $wp_customize->add_panel($totalpress_more_options);


        $totalpress_general_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_general_options',array(
          'title' => esc_html__('General','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 2,
        ));
        $wp_customize->add_panel($totalpress_general_options);

        $totalpress_top_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_top_sidebar_options',array(
          'title' => esc_html__('Top Sidebar','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 2,
        ));
        $wp_customize->add_panel($totalpress_top_sidebar_options);

        $totalpress_header_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_header_options',array(
          'title' => esc_html__('Header','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 3,
        ));
        $wp_customize->add_panel($totalpress_header_options);

        $totalpress_header_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_header_sidebar_options',array(
          'title' => esc_html__('Header Sidebar','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 4,
        ));
        $wp_customize->add_panel($totalpress_header_sidebar_options);

        $totalpress_navigation_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_navigation_options',array(
          'title' => esc_html__('Navigation','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 5,
        ));
        $wp_customize->add_panel($totalpress_navigation_options);

        $totalpress_content_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_content_options',array(
          'title' => esc_html__('Content','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 6,
        ));
        $wp_customize->add_panel($totalpress_content_options);

              $totalpress_blog_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_blog_options',array(
                'title' => esc_html__('Posts','totalpress'),
                'panel' => 'totalpress_content_options',
                'priority' => 1,
              ));
              $wp_customize->add_panel($totalpress_blog_options);

        $totalpress_footer_widget_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_footer_widget_options',array(
          'title' => esc_html__('Footer Widgets','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 9,
        ));
        $wp_customize->add_panel($totalpress_footer_widget_options);

        $totalpress_footer_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_footer_options',array(
          'title' => esc_html__('Footer','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 11,
        ));
        $wp_customize->add_panel($totalpress_footer_options);

        $wp_customize->add_section('totalpress_docs_section', array(
          'title' => esc_html__('TotalPress Documentation','totalpress'),
          'priority' =>9998,
        ));

        $wp_customize->add_section('upsell_section', array(
          'title' => esc_html__('Extend TotalPress', 'totalpress'),
          'priority' =>9999,
        ));


    // Check if TP Primo is active, if so remove a panel and load some additional panels
        if (is_plugin_active('tp-primo/tp-primo.php')) {
          
          $wp_customize->remove_section('upsell_section');

          $tp_primo_page_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_page_options',array(
            'title' => esc_html__('Pages','totalpress'),
            'panel' => 'totalpress_content_options',
            'priority' => 2,
          ));
          $wp_customize->add_panel($tp_primo_page_options);

          $tp_primo_right_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_right_sidebar_options',array(
            'title' => esc_html__('Right Sidebar','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 7,
          ));
          $wp_customize->add_panel($tp_primo_right_sidebar_options);

          $tp_primo_left_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_left_sidebar_options',array(
            'title' => esc_html__('Left Sidebar','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 8,
          ));
          $wp_customize->add_panel($tp_primo_left_sidebar_options);

          $tp_primo_footer_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_footer_sidebar_options',array(
            'title' => esc_html__('Footer Sidebar','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 10,
          ));
          $wp_customize->add_panel($tp_primo_footer_sidebar_options);

          $tp_primo_misc_theme_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_misc_theme_options',array(
            'title' => esc_html__('Misc. Options','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 12,
          ));
          $wp_customize->add_panel($tp_primo_misc_theme_options);
        }
 
    // sanitize site title and site description check boxes
    if ( ! function_exists('totalpress_sanitize_checkbox')) :
        function totalpress_sanitize_checkbox($input) {
            if ( $input == 1 ) {
                return 1;
            } else {
                return 0;
            }
        }
    endif;
  }
  add_action('customize_register','totalpress_customize_register');
endif;

// customizer logo
function totalpress_customizer_styling( $config ) {
  return wp_parse_args(array(
    'logo_image' => 'https://bit.ly/2J5dy84',
  ), $config );
}
add_filter('kirki_config','totalpress_customizer_styling');

// theme customize-preview
if ( ! function_exists('totalpress_customizer_live_preview')) :
    function totalpress_customizer_live_preview() {
      wp_enqueue_script('totalpress_customizer_js',trailingslashit(get_template_directory_uri()) .'/assets/customizer/js/totalpress-customizer.js',array('customize-preview'),TOTALPRESS_VERSION,true);
    }
    add_action('customize_preview_init','totalpress_customizer_live_preview');
endif;

TotalPress_Kirki::add_config('totalpress_theme_customizer',array(
  'capability'  => 'edit_theme_options',
  'option_type' => 'theme_mod',
));
require get_template_directory() . '/assets/customizer/inc/totalpress-layout-section.php'; //layout options
require get_template_directory() . '/assets/customizer/inc/totalpress-post-section.php'; //content options
require get_template_directory() . '/assets/customizer/inc/totalpress-colors-section.php'; //color options
require get_template_directory() . '/assets/customizer/inc/totalpress-footer-section.php'; //footer options
require get_template_directory() . '/assets/customizer/inc/totalpress-footer-widgets-section.php'; //footer widgets options
require get_template_directory() . '/assets/customizer/inc/totalpress-header-section.php'; //header options
require get_template_directory() . '/assets/customizer/inc/totalpress-header-sidebar-section.php'; //header options
require get_template_directory() . '/assets/customizer/inc/totalpress-navigation-section.php'; //header options
require get_template_directory() . '/assets/customizer/inc/totalpress-top-sidebar-section.php'; //top sidebar options
require get_template_directory() . '/assets/customizer/inc/totalpress-typography-section.php'; //typography options
require get_template_directory() . '/assets/customizer/inc/totalpress-documentation.php'; //doc section
require get_template_directory() . '/assets/customizer/inc/totalpress-more-options.php'; //option upsell