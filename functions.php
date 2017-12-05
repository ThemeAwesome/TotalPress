<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit;
define('TOTALPRESS_VERSION','1.0.2');
define('TOTALPRESS_URI',get_template_directory_uri());
define('TOTALPRESS_DIR',get_template_directory());
//Sets up theme defaults and registers support for various WordPress features.
if ( ! function_exists('setup_totalpress') ) :
	function setup_totalpress() {
		// Set the content width
		global $content_width;
		if ( ! isset($content_width))
			$content_width = 866; /* pixels */
		//Adjusts content_width value for full-width and single image attachment templates
		if ( ! function_exists('totalpress_adjust_content_width')) {
			function totalpress_adjust_content_width() {
			    global $content_width;
			    if ( is_page_template('full-width.php' ) || is_attachment() )
			        $content_width = 1270;
			}
			add_action('template_redirect','totalpress_adjust_content_width');
		}
		// Make theme available for translation
		load_theme_textdomain('totalpress', get_template_directory() . '/assets/language');
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(840, 9999); // Unlimited height, soft crop
		// Register any menus
		register_nav_menus( array(
			'primary' => esc_html__('Main Menu','totalpress'), ));
		// Full width image size added for featured image support in pages
		add_image_size('full-width-thumb',1200,9999 ); // Fixed width, Unlimited height, soft crop
		// Enable support for Post Formats
		add_theme_support('post-formats', array('aside','audio','chat','gallery','image','link','quote','status','video'));
		// Enable support for WooCommerce
		add_theme_support('woocommerce');
		// Enable support for <title> tag
		add_theme_support('title-tag');
		// Switch default core markup for search form, comment form, and comments
		add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption',));
		// add support for custom logo
		add_theme_support('custom-logo', array('height' => 70,'width' => 350,'flex-width' => true,'flex-height' => true, ));
		// Add support for custom background
		add_theme_support('custom-background',apply_filters('totalpress_custom_background_args', array(
			'default-color' => 'efefef',)));
		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		add_post_type_support('page','excerpt');
		// Adds support for Jetpacks Social Menu
		add_theme_support('jetpack-social-menu');
		// Add support for Jetpack's Infinite Scroll
		add_theme_support('infinite-scroll', array(
			'container' => 'content',
			'footer' => 'page',	));
		// This theme styles the visual editor to resemble the theme style
		add_editor_style('assets/css/editor.css');
	}
	add_action('after_setup_theme','setup_totalpress');
endif; //setup_totalpress

// Load files we need
require_once TOTALPRESS_DIR . '/assets/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
require TOTALPRESS_DIR . '/assets/inc/tgm-config.php';
require TOTALPRESS_DIR . '/assets/inc/include_kirki.php';
require TOTALPRESS_DIR . '/assets/customizer/customizer.php';
require TOTALPRESS_DIR . '/assets/inc/metaboxes.php';
require TOTALPRESS_DIR . '/assets/inc/extras.php';
require TOTALPRESS_DIR . '/assets/inc/template-tags.php';
require TOTALPRESS_DIR . '/assets/inc/plugin-support.php';
//require TOTALPRESS_DIR . '/assets/inc/hook-tests.php';

// enqueue scripts and styles.
if ( ! function_exists('totalpress_scripts')) :
	function totalpress_scripts() {
		wp_enqueue_style('font-awesome',TOTALPRESS_URI . '/assets/css/font-awesome.css','',TOTALPRESS_VERSION );
		wp_enqueue_style('foundation',TOTALPRESS_URI . '/assets/css/foundation.css','',TOTALPRESS_VERSION );
		wp_enqueue_style('motion-ui',TOTALPRESS_URI . '/assets/css/motion-ui.css','',TOTALPRESS_VERSION );
		wp_enqueue_style('totalpress',get_stylesheet_uri(),'',TOTALPRESS_VERSION );
		wp_enqueue_style('media-query',TOTALPRESS_URI . '/assets/css/media-query.css','',TOTALPRESS_VERSION );
		wp_enqueue_script('what-input',TOTALPRESS_URI.'/assets/js/what-input.js',array('jquery'),TOTALPRESS_VERSION,true);
		wp_enqueue_script('foundation',TOTALPRESS_URI.'/assets/js/foundation.js',array('jquery'),TOTALPRESS_VERSION,true);
		wp_enqueue_script ('app',TOTALPRESS_URI.'/assets/js/app.js',array('foundation'),TOTALPRESS_VERSION,true);
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
			'cs1-sidebar' => __('Content Sidebar One','totalpress'),
			'cs2-sidebar' => __('Content Sidebar Two','totalpress'),
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

// Custom Excerpt Length
if ( ! function_exists('totalpress_custom_excerpt')) :
	function totalpress_custom_excerpt( $number ) {
		return 65;
	}
	add_filter('excerpt_length','totalpress_custom_excerpt');
endif;

// excerpt more
if ( ! function_exists('totalpress_excerpt_more') && ! is_admin() ) :
	function totalpress_excerpt_more( $more ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
			esc_url( get_permalink( get_the_ID() ) ),
				sprintf( __('Continue reading %s <span class="meta-nav">&raquo;</span>','totalpress' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>')
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

// removes recent comments styling
if ( ! function_exists('totalpress_remove_recent_comments_style')) {
	function totalpress_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action('wp_head',array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],'recent_comments_style')); }
	add_action('widgets_init','totalpress_remove_recent_comments_style');
}

// threaded comments in footer
if ( ! function_exists('totalpress_enqueue_comments_reply')) {
	function totalpress_enqueue_comments_reply() {
		if( get_option('thread_comments')) {
		wp_enqueue_script('comment-reply'); }
	}
	add_action('comment_form_before','totalpress_enqueue_comments_reply');
}

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