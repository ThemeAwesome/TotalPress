<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit;

// top sidebar
if ( ! function_exists('totalpress_build_top_sidebar')) :
    function totalpress_build_top_sidebar() {
		if (is_active_sidebar('top-sidebar')) : ?>
	 			<div id="top-sidebar" class="widget-area grid-container" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
	 				<div class="inside-top-sidebar small-12 large-auto cell">
	 				<?php dynamic_sidebar('top-sidebar'); ?>
	 				</div><!-- inside-top-sidebar -->
	    		</div><!-- .top-sidebar -->
		<?php endif;
    }
    add_action('totalpress_top_sidebar','totalpress_build_top_sidebar');
endif;

// Build the header contents - allows us to switch the title and logo around if we need to
if ( ! function_exists('totalpress_header_items')) :
	function totalpress_header_items() {
		// Site logo
		totalpress_build_logo();
		// Site title and tagline
		totalpress_build_site_title();
	}
endif;

// Build the logo
if ( ! function_exists('totalpress_build_logo')) :
	function totalpress_build_logo() {
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id ,'full');
		if (has_custom_logo()) {
			// If we have a header image, get to buildin' the logo area
			echo apply_filters( 'totalpress_header_image', sprintf(
				'<div class="site-logo"><a href="%1$s" title="%2$s" rel="home"><img src="'. esc_url( $logo[0] ) .'" class="header-image" alt="%2$s" /></a></div>',
				esc_url(home_url( '/' )),
				esc_attr(get_bloginfo('name','display'))
			));
		}
	}
endif;

// Build site title and tagline
if ( ! function_exists('totalpress_build_site_title')) :
	function totalpress_build_site_title() {
		if (is_front_page() && is_home()) {
			echo apply_filters('totalpress_brand_text',sprintf(
				'<div class="brand-text"><h1 class="site-title"><a href="%1$s" rel="home">%2$s</a></h1>',
				esc_url(home_url( '/' )),
				esc_attr(get_bloginfo('name','display'))
			));
		} else {
			echo apply_filters('totalpress_alt_brand_text',sprintf(
				'<div class="brand-text"><p class="site-title"><a href="%1$s" rel="home">%2$s</a></p>',
				esc_url(home_url('/')),
				esc_attr(get_bloginfo('name','display'))
			));
		}
		$description = get_bloginfo('description','display');
		if ($description || is_customize_preview()) {
			echo apply_filters('totalpress_site_description',sprintf(
				'<p class="site-description">%1$s</p></div><!-- .brand_text -->',
				$description
			));
		}
	}
endif;

// header sidebar
if ( ! function_exists('totalpress_build_header_sidebar')) :
    function totalpress_build_header_sidebar() {
	if ( is_active_sidebar('header-sidebar')) : ?>
        <div class="header-sidebar small-12 large-auto cell">
        	<?php do_action('totalpress_before_header_sidebar'); ?>
            <?php dynamic_sidebar('header-sidebar'); ?>
            <?php do_action('totalpress_after_header_sidebar'); ?>
        </div><!-- .header-sidebar -->
	<?php endif;
    }
    add_action('totalpress_header_sidebar','totalpress_build_header_sidebar');
endif;

// Build the header
if ( ! function_exists('totalpress_build_header')) :
	function totalpress_build_header() { ?>
		<?php do_action('totalpress_before_header'); ?>
		<?php if (get_theme_mod('nav_position','bottom_of_header') == 'top_of_header'): ?>
			<?php do_action('totalpress_topbar_menu'); ?>
		<?php endif; ?>
			<header id="masthead" class="site-header grid-container" itemtype="http://schema.org/WPHeader" itemscope="itemscope">
				<div class="inside-header grid-x grid-padding-x">
					<?php if (is_active_sidebar('header-sidebar')): ?>
						<div class="site-branding small-12 large-auto cell">
							<?php do_action('totalpress_before_header_content'); ?>
							<?php totalpress_header_items(); ?>
							<?php do_action('totalpress_after_header_content'); ?>
						</div><!-- .site-branding -->
					    <?php do_action('totalpress_header_sidebar'); ?>
					<?php else: ?>
						<div class="site-branding small-12 large-auto cell">
							<?php do_action('totalpress_before_header_content'); ?>
							<?php totalpress_header_items(); ?>
							<?php do_action('totalpress_after_header_content'); ?>
						</div>
					<?php endif; ?>
				</div><!-- .inside-header -->
			</header><!-- #masthead -->
		<?php do_action('totalpress_after_header'); ?>
		<?php if (get_theme_mod('nav_position','bottom_of_header') == 'bottom_of_header'): ?>
			<?php do_action('totalpress_topbar_menu'); ?>
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_header','totalpress_build_header');
endif;

// main menu
if ( ! function_exists('totalpress_topbar_navigation')) :
    function totalpress_topbar_navigation() { ?>
		<nav id="site-navigation" class="main-navigation grid-container" itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" role="navigation">
	        <div class="title-bar" data-responsive-toggle="main-menu">
	            <button class="icon-menu" type="button" data-toggle><i class="fa fa-bars" aria-hidden="true"></i> <?php _e('Menu','totalpress'); ?></button>
	        </div><!-- .title-bar -->
	        <div class="top-bar grid-x grid-padding-x" id="main-menu">
	        	<div class="<?php echo get_theme_mod('theme_nav_alignment','top-bar-left'); ?> hide-for-small-only"><?php do_action('totalpress_top_bar'); ?></div><!-- .top-bar -->
	        	<div class="top-bar-left show-for-small-only"><?php do_action('totalpress_top_bar'); ?></div><!-- .top-bar -->
			</div><!-- .top-bar .grid-x -->
		</nav><!-- .main-navigation -->
    <?php
    }
    add_action('totalpress_topbar_menu','totalpress_topbar_navigation');
endif;

// start the content container
if ( ! function_exists('totalpress_content_container')) :
	function totalpress_content_container() { ?>
		<?php do_action('totalpress_before_main_content'); ?>
			<div id="content" class="site-content grid-container">
				<div class="grid-x grid-padding-x">
	<?php
	}
	add_action('totalpress_open_content_container','totalpress_content_container');
endif;

// close the content container
if ( ! function_exists('totalpress_content_container_close')) :
	function totalpress_content_container_close() { ?>
				</div><!-- .grid-x .grid-padding-x -->
			</div><!-- #content grid-container -->
		<?php do_action('totalpress_after_main_content'); ?>
	<?php
	}
	add_action('totalpress_close_content_container','totalpress_content_container_close');
endif;

// hook before page template title
if ( ! function_exists('totalpress_build_before_template_titles')) :
	function totalpress_build_before_template_titles() { ?>
		<?php if (is_page_template('page-templates/content-sidebar.php')): ?>
			<?php do_action( 'totalpress_before_cs_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content.php')): ?>
			<?php do_action( 'totalpress_before_sc_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/content-sidebar-sidebar.php')): ?>
			<?php do_action( 'totalpress_before_css_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-sidebar-content.php')): ?>
			<?php do_action( 'totalpress_before_ssc_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content-sidebar.php')): ?>
			<?php do_action( 'totalpress_before_scs_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/full-width.php')): ?>
			<?php do_action( 'totalpress_before_fw_title'); ?>
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_before_template_titles','totalpress_build_before_template_titles');
endif;

// hook after page template title
if ( ! function_exists('totalpress_build_after_template_titles')) :
	function totalpress_build_after_template_titles() { ?>
		<?php if (is_page_template('page-templates/content-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_cs_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content.php')): ?>
			<?php do_action( 'totalpress_after_sc_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/content-sidebar-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_css_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-sidebar-content.php')): ?>
			<?php do_action( 'totalpress_after_ssc_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_scs_title'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/full-width.php')): ?>
			<?php do_action( 'totalpress_after_fw_title'); ?>
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_after_template_titles','totalpress_build_after_template_titles');
endif;

// hook after page template content
if ( ! function_exists('totalpress_build_after_template_post')) :
	function totalpress_build_after_template_post() { ?>
		<?php if (is_page_template('page-templates/content-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_cs_post'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content.php')): ?>
			<?php do_action( 'totalpress_after_sc_post'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/content-sidebar-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_css_post'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-sidebar-content.php')): ?>
			<?php do_action( 'totalpress_after_ssc_post'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/sidebar-content-sidebar.php')): ?>
			<?php do_action( 'totalpress_after_scs_post'); ?>
		<?php endif; ?>
		<?php if (is_page_template('page-templates/full-width.php')): ?>
			<?php do_action( 'totalpress_after_fw_post'); ?>
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_after_template_post','totalpress_build_after_template_post');
endif;

// show sidebars based on blog layout
if ( ! function_exists('totalpress_build_sidebars')) :
	function totalpress_build_sidebars() { ?>
		<?php if (get_theme_mod('blog_layout','right_sidebar') == 'right_sidebar'): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_layout') == 'left_sidebar'): ?>
			<?php get_sidebar('left'); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_layout') == 'sidebars_left'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_layout') == 'sidebars_right'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_layout') == 'both_sidebars'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('blog_layout') == 'no_sidebars'): ?>
			<?php get_footer(); ?>
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_sidebars','totalpress_build_sidebars');
endif;

// Build footer widgets
if ( ! function_exists( 'totalpress_build_footer_widgets' ) ) :
	function totalpress_build_footer_widgets() { 
		if ( ! is_active_sidebar('footer-1') && ! is_active_sidebar('footer-2') && ! is_active_sidebar('footer-3') && ! is_active_sidebar('footer-4') && ! is_active_sidebar('footer-5'))
		return; ?>
		<div id="footer-secondary" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="footer-widgets widget-area grid-container">
	 		<div class="inside-footer-widgets grid-x grid-padding-x">
	 			<?php do_action('totalpress_before_footer_widgets'); ?>
				<?php if (is_active_sidebar('footer-1')) : ?>
					<div class="fw_one large-auto cell">
			            <?php dynamic_sidebar('footer-1'); ?>
			        </div>
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-2')) : ?>
					<div class="fw_two large-auto cell">
			            <?php dynamic_sidebar('footer-2'); ?>
			        </div>
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-3')) : ?>
					<div class="fw_three large-auto cell">
			            <?php dynamic_sidebar('footer-3'); ?>
			        </div>
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-4')) : ?>
					<div class="fw_four large-auto cell">
			            <?php dynamic_sidebar('footer-4'); ?>
			        </div>
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-5')) : ?>
					<div class="fw_five large-auto cell">
			            <?php dynamic_sidebar('footer-5'); ?>
			        </div>
		        <?php endif; ?>
		        <?php do_action('totalpress_after_footer_widgets'); ?>
	    	</div><!-- .inside-footer .grid-x -->
    	</div><!-- .footer-sidebar -->
	<?php
	}
	add_action('totalpress_footer_widgets','totalpress_build_footer_widgets');
endif;

// inside footer sidebar
if ( ! function_exists('totalpress_build_inside_footer_sidebar')) :
function totalpress_build_inside_footer_sidebar() {
	if (is_active_sidebar('footer-sidebar')) : ?>
        <div id="footer-sidebar" class="inside-footer-sidebar large-auto cell text-right">
            <?php dynamic_sidebar('footer-sidebar'); ?>
        </div><!-- .inside-footer-sidebar -->
	<?php endif;
	}
	add_action('totalpress_footer_sidebar','totalpress_build_inside_footer_sidebar');
endif;

// build footer
if ( ! function_exists('totalpress_build_footer')) :
	function totalpress_build_footer() { ?>
		<?php do_action('totalpress_before_footer'); ?>
		<footer id="colophon" class="site-footer grid-container" itemtype="http://schema.org/WPFooter" itemscope="itemscope" role="contentinfo">
			<div class="inside-footer grid-x grid-padding-x">
				<?php if ( is_active_sidebar( 'footer-sidebar' )): ?>
				<div class="site-info large-auto cell"><?php totalpress_footer_credits(); ?></div><!-- .site-info -->
			    	<?php do_action('totalpress_footer_sidebar'); ?>
				<?php else: ?>
				<div class="site-info large-auto cell text-center"><?php totalpress_footer_credits(); ?></div><!-- .site-info -->
				<?php endif; ?>
			</div><!-- .inside-footer -->
		</footer><!-- .site-footer .grid-container -->
		<?php do_action('totalpress_after_footer'); ?>
	<?php
	}
	add_action('totalpress_footer','totalpress_build_footer');
endif;

// filter: footer credits
if ( ! function_exists('totalpress_footer_credits')) :
	function totalpress_footer_credits() {
		$copyright = sprintf('Built with <a href="%1$s" rel="follow" target="_blank" itemprop="url"><strong>%2$s</strong></a> &#8211; Powered by <a href="%3$s" target="_blank" itemprop="url"><strong>%4$s</strong></a> ',
			esc_url('https://themeawesome.com/totalpress-wordpress-foundation-theme/'),
			__('TotalPress','totalpress'),
			esc_url( 'https://wordpress.org'),
			__('WordPress','totalpress')
		);
		echo apply_filters('totalpress_copyright',$copyright);
	}
endif;

// filter: build back to top
if ( ! function_exists('totalpress_back_to_top')) :
	function totalpress_back_to_top() {
		if (true == get_theme_mod('btp_switch',true)) {
			$backtotop = sprintf( '<div class="back-to-top"><i class="fa fa-angle-up fa-lg" aria-hidden="true"></i></div>');
			echo apply_filters('totalpress_back_to_top',$backtotop);
		}
	}
	add_action('wp_footer','totalpress_back_to_top');
endif;
