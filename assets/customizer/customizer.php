<?php /* @version 1.0.7 */
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
    wp_enqueue_script('pe-customize-controls',get_theme_file_uri( '/assets/customizer/js/customize-controls.js'),array(),TOTALPRESS_VERSION, true);
    wp_enqueue_style('customizer',get_theme_file_uri('/assets/customizer/css/customizer.css'),array(),TOTALPRESS_VERSION);
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

    $wp_customize->add_setting( 'totalpress_hide_sitetitle',
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

        $totalpress_general_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_general_options',array(
          'title' => __('General','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 1,
        ));
        $wp_customize->add_panel($totalpress_general_options);

        $totalpress_top_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_top_sidebar_options',array(
          'title' => __('Top Sidebar','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 2,
        ));
        $wp_customize->add_panel($totalpress_top_sidebar_options);

        $totalpress_header_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_header_options',array(
          'title' => __('Header','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 3,
        ));
        $wp_customize->add_panel($totalpress_header_options);

        $totalpress_header_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_header_sidebar_options',array(
          'title' => __('Header Sidebar','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 4,
        ));
        $wp_customize->add_panel($totalpress_header_sidebar_options);

        $totalpress_navigation_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_navigation_options',array(
          'title' => __('Navigation','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 5,
        ));
        $wp_customize->add_panel($totalpress_navigation_options);

        $totalpress_content_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_content_options',array(
          'title' => __('Content','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 6,
        ));
        $wp_customize->add_panel($totalpress_content_options);

              $totalpress_blog_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_blog_options',array(
                'title' => __('Posts','totalpress'),
                'panel' => 'totalpress_content_options',
                'priority' => 1,
              ));
              $wp_customize->add_panel($totalpress_blog_options);

        // Load these panels if TP-Primo is active
        if ( is_plugin_active( 'tp-primo/tp-primo.php' ) ) {
          $totalpress_page_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_page_options',array(
            'title' => __('Pages','totalpress'),
            'panel' => 'totalpress_content_options',
            'priority' => 2,
          ));
          $wp_customize->add_panel($totalpress_page_options);

          $totalpress_main_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_main_sidebar_options',array(
            'title' => __('Conten Sidebar One','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 7,
          ));
          $wp_customize->add_panel($totalpress_main_sidebar_options);

          $totalpress_left_sidebar_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_left_sidebar_options',array(
            'title' => __('Content Sidebar Two','totalpress'),
            'panel' => 'totalpress_theme_options',
            'priority' => 8,
          ));
          $wp_customize->add_panel($totalpress_left_sidebar_options);
        }

        $totalpress_footer_widget_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_footer_widget_options',array(
          'title' => __('Footer Widgets','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 9,
        ));
        $wp_customize->add_panel($totalpress_footer_widget_options);

        $totalpress_footer_options = new TotalPress_WP_Customize_Panel($wp_customize,'totalpress_footer_options',array(
          'title' => __('Footer','totalpress'),
          'panel' => 'totalpress_theme_options',
          'priority' => 10,
        ));
        $wp_customize->add_panel($totalpress_footer_options);

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

// theme customize-preview
if ( ! function_exists('totalpress_customizer_live_preview')) :
    function totalpress_customizer_live_preview() {
      wp_enqueue_script('totalpress_customizer_js',trailingslashit(get_template_directory_uri()) .'/assets/customizer/js/customizer.js',array('customize-preview'),TOTALPRESS_VERSION,true);
    }
    add_action('customize_preview_init','totalpress_customizer_live_preview');
endif;

TotalPress_Kirki::add_config('totalpress_theme_customizer',array(
  'capability'  => 'edit_theme_options',
  'option_type' => 'theme_mod',
));

require TOTALPRESS_DIR . '/assets/customizer/inc/layout_section.php'; //loads layout options
require TOTALPRESS_DIR . '/assets/customizer/inc/blog_section.php'; //loads content options
require TOTALPRESS_DIR . '/assets/customizer/inc/colors_section.php'; //loads color options
require TOTALPRESS_DIR . '/assets/customizer/inc/footer_section.php'; //loads footer options
require TOTALPRESS_DIR . '/assets/customizer/inc/footer_widgets_section.php'; //loads footer widgets options
require TOTALPRESS_DIR . '/assets/customizer/inc/header_section.php'; //loads header options
require TOTALPRESS_DIR . '/assets/customizer/inc/header_sidebar_section.php'; //loads header options
require TOTALPRESS_DIR . '/assets/customizer/inc/navigation_section.php'; //loads header options
require TOTALPRESS_DIR . '/assets/customizer/inc/top_sidebar_section.php'; //loads top sidebar options
require TOTALPRESS_DIR . '/assets/customizer/inc/typography_section.php'; //loads typography options