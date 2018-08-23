<?php
if ( ! defined('ABSPATH')) exit;
define('TOTALPRESS_VERSION','1.0.27');
if ( ! function_exists('setup_totalpress') ) :
	function setup_totalpress() {
		// Set the content width
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 865; /* pixels */
		}
		load_theme_textdomain('totalpress',get_template_directory() . '/language' );
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(785,9999);
		add_image_size('totalpress-full-width',1200,9999);
		add_theme_support('post-formats', array('aside','audio','chat','gallery','image','link','quote','status','video'));
		add_theme_support('woocommerce');
		add_theme_support('title-tag');
		add_theme_support('html5', array('comment-form','comment-list','gallery','caption',));
		add_theme_support('customize-selective-refresh-widgets');
		add_theme_support('align-wide');
		add_editor_style('assets/css/totalpress-editor.css');
		add_theme_support('header-footer-elementor');
		register_nav_menus( array('primary' => __('Main Menu','totalpress'),));
		add_theme_support('custom-logo', array('width' => 350,'height' => 70,'flex-width' => true,'flex-height' => true,));
		add_theme_support('custom-background',apply_filters('totalpress_custom_background_args', array(
			'default-color' => 'efefef',)));
	}
	add_action('after_setup_theme','setup_totalpress');
endif; 
// Load files we need
require get_template_directory() . '/assets/inc/totalpress-welcome.php';
require get_template_directory() . '/assets/inc/totalpress-functions.php';
require get_template_directory() . '/assets/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/assets/inc/tgm-config.php';
require get_template_directory() . '/assets/inc/totalpress-include-kirki.php';
require get_template_directory() . '/assets/customizer/totalpress-customizer.php';
require get_template_directory() . '/assets/inc/totalpress-metaboxes.php';
require get_template_directory() . '/assets/inc/totalpress-extras.php';
require get_template_directory() . '/assets/inc/totalpress-plugin-support.php';

// enqueue scripts and styles.
if ( ! function_exists('totalpress_scripts')) :
	function totalpress_scripts() {
		wp_enqueue_style('totalpress',get_stylesheet_uri(),'',TOTALPRESS_VERSION );
		wp_enqueue_script('foundation',get_template_directory_uri().'/assets/js/foundation.min.js',array('jquery'),'6.5.0.rc-1',true);
		wp_enqueue_script ('totalpress-app',get_template_directory_uri().'/assets/js/totalpress-app.js',array('foundation'),TOTALPRESS_VERSION,true);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
		// Add the child theme CSS if child theme is active.
		if (is_child_theme()) {
			wp_dequeue_style('totalpress');
			wp_enqueue_style('parent',get_template_directory_uri() . '/style.css', '','ParentTheme');
			wp_enqueue_style('child',get_stylesheet_uri(), array('parent'),'ChildTheme');
		}
	}
	add_action('wp_enqueue_scripts','totalpress_scripts');
endif;
// Set up our sidebar areas
if ( ! function_exists('totalpress_widgets_init')) :
	function totalpress_widgets_init() {	
		$widgets = array(
			'top-sidebar' => __('Top Sidebar','totalpress'),
			'header-sidebar' => __('Header Sidebar','totalpress'),
			'right-sidebar' => __('Right Sidebar','totalpress'),
			'left-sidebar' => __('Left Sidebar','totalpress'),
			'footer-1' => __('Footer Widget Area One','totalpress'),
			'footer-2' => __('Footer Widget Area Two','totalpress'),
			'footer-3' => __('Footer Widget Area Three','totalpress'),
			'footer-4' => __('Footer Widget Area Four','totalpress'),
			'footer-5' => __('Footer Widget Area Five','totalpress'),
			'footer-sidebar' => __('Inside Footer Sidebar','totalpress'),
		);
		foreach ( $widgets as $id => $name ) {
			register_sidebar( array(
				'name'          => $name,
				'id'            => $id,
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => apply_filters('totalpress_start_widget_title','<h4 class="widget-title">'),
				'after_title'   => apply_filters('totalpress_end_widget_title','</h4>'),
			));
		}
	}
	add_action('widgets_init','totalpress_widgets_init');
endif;
// excerpt more
if ( ! function_exists('totalpress_excerpt_more') && ! is_admin() ) :
	function totalpress_excerpt_more( $more ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
				sprintf( __('Read more %s','totalpress' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>')
			);
		return ' &hellip; ' . $link;
	}
	add_filter('excerpt_more','totalpress_excerpt_more');
endif;
// style the visual editor to resemble the theme front end.
if ( ! function_exists('totalpress_add_editor_styles')) :
	function totalpress_add_editor_styles() {
	    $font_url = str_replace(',', '%2C','//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900');
	    add_editor_style( array(
	    	'style.css', $font_url,
	 	));
	}
	add_action('after_setup_theme','totalpress_add_editor_styles');
endif;
// remove .sticky from the post_class array
if (! function_exists('totalpress_filter_post_class')) :
	function totalpress_filter_post_class( $classes ) {
	    if (($key = array_search('sticky',$classes)) !== false) {
	        unset($classes[$key]);
	        $classes[]='sticky-post';
	    }
	    return $classes;
	}
	add_filter('post_class','totalpress_filter_post_class',20);
endif;
// threaded comments in footer
if ( ! function_exists('totalpress_enqueue_comments_reply')) {
	function totalpress_enqueue_comments_reply() {
		if( get_option('thread_comments')) {
		wp_enqueue_script('comment-reply'); }
	}
	add_action('comment_form_before','totalpress_enqueue_comments_reply');
}
// remove hentry from post_class
function totalpress_remove_hentry_class($classes) {
	$classes = array_diff( $classes, array('hentry'));
	return $classes;
}
add_filter('post_class','totalpress_remove_hentry_class');
// add body schema
if ( ! function_exists('totalpress_body_schema')) :
	function totalpress_body_schema() {
		$blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;
		$itemtype = 'WebPage';
		$itemtype = ( $blog ) ? 'Blog' : $itemtype;
		$itemtype = (is_search()) ? 'SearchResultsPage' : $itemtype;
		$result = apply_filters('totalpress_body_itemtype',$itemtype);
		echo "itemtype='http://schema.org/$result' itemscope='itemscope'";
	}
endif;
// add articl schema
if ( ! function_exists('totalpress_article_schema')) :
	function totalpress_article_schema( $type = 'CreativeWork' ) {
		$itemtype = apply_filters('totalpress_article_itemtype',$type);
		echo "itemtype='http://schema.org/$itemtype' itemscope='itemscope'";
	}
endif;
// Top-Bar Menu Walker
class TotalPress_Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu medium-horizontal nested\">\n";
    }
}
// Top-Bar Menu function
if ( ! function_exists( 'totalpress_build_topbar_nav' ) ) :
    function totalpress_build_topbar_nav() {
         wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'depth' => 0,
            'items_wrap' => '<ul class="menu vertical medium-horizontal" data-responsive-menu="accordion medium-dropdown" data-submenu-toggle="true" data-close-on-click-inside="false">%3$s</ul>',
            'fallback_cb' => '',
            'walker' => new TotalPress_Topbar_Menu_Walker()
        ));
    }
    add_action('totalpress_top_bar','totalpress_build_topbar_nav');
endif;