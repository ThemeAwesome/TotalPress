<?php /* @version 1.0.4 */
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
        <div class="header-sidebar small-12 large-6 cell">
            <?php dynamic_sidebar('header-sidebar'); ?>
        </div><!-- .header-sidebar -->
	<?php endif;
    }
    add_action('totalpress_header_sidebar','totalpress_build_header_sidebar');
endif;

// Build the header
if ( ! function_exists('totalpress_build_header')) :
	function totalpress_build_header() { ?>
		<?php if (get_theme_mod('totalpress_nav_position','bottom_of_header') == 'top_of_header'): ?>
			<?php do_action('totalpress_topbar_menu'); ?>
		<?php endif; ?>
			<header id="masthead" class="site-header grid-container" itemtype="http://schema.org/WPHeader" itemscope="itemscope">
				<div class="inside-header grid-container">
					<?php do_action('totalpress_before_header_content'); ?>
					<div class="grid-x grid-padding-x">
						<?php if (is_active_sidebar('header-sidebar')): ?>
							<div class="site-branding small-12 large-6 cell">
								<?php totalpress_header_items(); ?>
							</div><!-- .site-branding -->
						    <?php do_action('totalpress_header_sidebar'); ?>
						<?php else: ?>
							<div class="site-branding small-12 large-auto cell">
								<?php totalpress_header_items(); ?>
							</div>
						<?php endif; ?>
					</div><!-- .grid-x .grid-padding-x -->
					<?php do_action('totalpress_after_header_content'); ?>
				</div><!-- .inside-header -->
			</header><!-- #masthead -->
		<?php if (get_theme_mod('totalpress_nav_position','bottom_of_header') == 'bottom_of_header'): ?>
			<?php do_action('totalpress_topbar_menu'); ?>
		<?php endif; ?>
		<?php do_action('totalpress_after_header'); ?>
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
	        	<div class="<?php echo get_theme_mod('totalpress_theme_nav_alignment','top-bar-left'); ?> hide-for-small-only"><?php do_action('totalpress_top_bar'); ?></div><!-- .top-bar -->
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

// open the post container
if ( ! function_exists('totalpress_post_open_container')) :
	function totalpress_post_open_container() { ?>
		<div id="primary" class="content-area small-12 large-8 cell">
			<main id="main" class="site-main" role="main">
	<?php
	}
	add_action('totalpress_open_post_container','totalpress_post_open_container');
endif;

// open article container
if ( ! function_exists('totalpress_article_open_container')) :
	function totalpress_article_open_container() { ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php totalpress_article_schema('CreativeWork'); ?>>
			<div class="inside-article">
	<?php
	}
	add_action('totalpress_open_article_container','totalpress_article_open_container');
endif;

// page entry header
if ( ! function_exists('totalpress_build_content_page_entry_header')) :
	function totalpress_build_content_page_entry_header() { 
	global $post; ?>
		<header class="entry-header">	
			<?php if (get_post_meta($post->ID,'page_options_hide_title',true)) {
		   		the_title('<h1 class="entry-title hide" itemprop="headline">','</h1>');
			  } else {
		   		the_title('<h1 class="entry-title" itemprop="headline">','</h1>');
			  } ?>
		</header><!-- .entry-header -->
	<?php
	}
	add_action('totalpress_content_page_entry_header','totalpress_build_content_page_entry_header');
endif;

// page entry header single
if ( ! function_exists('totalpress_content_single_entry_header')) :
	function totalpress_content_single_entry_header() { 
	global $post; ?>
		<header class="entry-header">
			<?php if (get_post_meta($post->ID,'page_options_hide_title',true)) {
		   		the_title('<h1 class="entry-title hide" itemprop="headline">','</h1>');
			  } else {
		   		the_title('<h1 class="entry-title" itemprop="headline">','</h1>');
			  } ?>
		<?php totalpress_posted_on(); ?>
		</header><!-- .entry-header -->
	<?php
	}
	add_action('totalpress_content_single_entry_header','totalpress_content_single_entry_header');
endif;

// content entry header
if ( ! function_exists('totalpress_build_content_entry_header')) :
	function totalpress_build_content_entry_header() { ?>
	<header class="entry-header">
		<?php do_action( 'totalpress_before_entry_title'); ?>
		<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php totalpress_posted_on(); ?>
	</header><!-- .entry-header -->
	<?php
	}
	add_action('totalpress_content_entry_header','totalpress_build_content_entry_header');
endif;

// close article container
if ( ! function_exists('totalpress_article_close_container')) :
	function totalpress_article_close_container() { ?>
			</div><!-- .inside-article -->
		</article><!-- #post-## -->
	<?php
	}
	add_action('totalpress_close_article_container','totalpress_article_close_container');
endif;

// close the post container
if ( ! function_exists('totalpress_post_close_container')) :
	function totalpress_post_close_container() { ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	<?php
	}
	add_action('totalpress_close_post_container','totalpress_post_close_container');
endif;

// open the right sidebar container
if ( ! function_exists('totalpress_right_sidebar_open_container')) :
	function totalpress_right_sidebar_open_container() { ?>
		<div id="right-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="rts widget-area  small-12 large-4 cell">
	<?php
	}
	add_action('totalpress_open_right_sidebar_container','totalpress_right_sidebar_open_container');
endif;

// close the right sidebar container
if ( ! function_exists('totalpress_right_sidebar_close_container')) :
	function totalpress_right_sidebar_close_container() { ?>
		</div><!-- #right-sidebar -->
	<?php
	}
	add_action('totalpress_close_right_sidebar_container','totalpress_right_sidebar_close_container');
endif;

// open the left sidebar container
if ( ! function_exists('totalpress_left_sidebar_open_container')) :
	function totalpress_left_sidebar_open_container() { ?>
		<div id="left-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="lfts widget-area  small-12 large-4 cell">
	<?php
	}
	add_action('totalpress_open_left_sidebar_container','totalpress_left_sidebar_open_container');
endif;

// close the left sidebar container
if ( ! function_exists('totalpress_left_sidebar_close_container')) :
	function totalpress_left_sidebar_close_container() { ?>
		</div><!-- #left-sidebar -->
	<?php
	}
	add_action('totalpress_close_left_sidebar_container','totalpress_left_sidebar_close_container');
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

// page template opening containers
if ( ! function_exists('totalpress_build_page_template_container')) :
	function totalpress_build_page_template_container() { ?>
		<?php if (is_page_template('page-templates/content-sidebar.php') || is_page_template('page-templates/sidebar-content.php')): ?>
			<div id="primary" class="content-area small-12 large-8 cell">
				<main id="main" class="site-main" role="main">
		<?php endif; ?>
		<?php if (is_page_template('page-templates/content-sidebar-sidebar.php') || is_page_template('page-templates/sidebar-sidebar-content.php') || is_page_template('page-templates/sidebar-content-sidebar.php')): ?>
			<div id="primary" class="content-area small-12 large-6 cell">
				<main id="main" class="site-main" role="main">
		<?php endif; ?>
		<?php if (is_page_template('page-templates/full-width.php')): ?>
			<div id="primary" class="content-area small-12 cell">
				<main id="main" class="site-main" role="main">
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_page_template_container','totalpress_build_page_template_container');
endif;

// page template loop
if ( ! function_exists('totalpress_build_page_template_loop')) :
	function totalpress_build_page_template_loop() { ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if(is_single()) { ?>
				<?php get_template_part('template-parts/post/content','single'); ?>
			<?php } ?>
			<?php if(is_page()) { ?>
				<?php get_template_part('template-parts/page/content','page'); ?>
			<?php } ?>
			<?php if ( comments_open() || '0' != get_comments_number() ) : comments_template(); endif; ?>
		<?php endwhile; ?>
	<?php
	}
	add_action('totalpress_page_template_loop','totalpress_build_page_template_loop');
endif;

// featured image - linked
if ( ! function_exists('totalpress_build_featured_image')) :
	function totalpress_build_featured_image() { ?>
		<div class="post-image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('full',array('itemprop' => 'image')); ?></a>
		</div><!-- .post-image -->
	<?php
	}
	add_action('totalpress_featured_image','totalpress_build_featured_image');
endif;

// featured image: single post/pages
if ( ! function_exists('totalpress_build_featured_image_single')) :
	function totalpress_build_featured_image_single() {
	// get current post
	global $post; ?>
		<?php if (get_post_meta($post->ID,'page_options_hide_featured_image',true)): ?>
			<div class="post-image hide">
				<?php the_post_thumbnail('full',array('itemprop' => 'image')); ?>
			</div><!-- .post-image -->
		<?php else: ?>
			<div class="post-image">
				<?php the_post_thumbnail('full',array('itemprop' => 'image')); ?>
			</div><!-- .post-image -->
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_featured_image_single','totalpress_build_featured_image_single');
endif;

// show sidebars based on blog layout
if ( ! function_exists('totalpress_build_sidebars')) :
	function totalpress_build_sidebars() { ?>
		<?php if (get_theme_mod('totalpress_blog_layout','right_sidebar') == 'right_sidebar'): ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('totalpress_blog_layout') == 'left_sidebar'): ?>
			<?php get_sidebar('left'); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('totalpress_blog_layout') == 'sidebars_left'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('totalpress_blog_layout') == 'sidebars_right'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('totalpress_blog_layout') == 'both_sidebars'): ?>
			<?php get_sidebar('left'); get_sidebar(); ?>
		<?php endif; ?>
		<?php if (get_theme_mod('totalpress_blog_layout') == 'no_sidebars'): ?>
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
		<div id="footer-secondary" class="footer-widgets grid-container widget-area" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary">
			<?php do_action('totalpress_before_footer_widgets_content'); ?>
	 		<div class="inside-footer-widgets grid-x grid-padding-x">
				<?php if (is_active_sidebar('footer-1')) : ?>
					<div class="fw_one large-auto cell">
			            <?php dynamic_sidebar('footer-1'); ?>
			        </div><!-- .fw_one -->
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-2')) : ?>
					<div class="fw_two large-auto cell">
			            <?php dynamic_sidebar('footer-2'); ?>
			        </div><!-- .fw_two -->
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-3')) : ?>
					<div class="fw_three large-auto cell">
			            <?php dynamic_sidebar('footer-3'); ?>
			        </div><!-- .fw_three -->
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-4')) : ?>
					<div class="fw_four large-auto cell">
			            <?php dynamic_sidebar('footer-4'); ?>
			        </div><!-- .fw_four -->
		        <?php endif; ?>
		        <?php if (is_active_sidebar('footer-5')) : ?>
					<div class="fw_five large-auto cell">
			            <?php dynamic_sidebar('footer-5'); ?>
			        </div><!-- .fw_five -->
		        <?php endif; ?>
	    	</div><!-- .inside-footer .grid-x -->
	    	<?php do_action('totalpress_after_footer_widgets_content'); ?>
    	</div><!-- .footer-widgets -->
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
	<?php do_action('totalpress_before_footer');?>
		<footer id="colophon" class="site-footer grid-container" itemtype="http://schema.org/WPFooter" itemscope="itemscope" role="contentinfo">
			<?php do_action('totalpress_before_footer_content'); ?>
			<div class="inside-footer grid-x grid-padding-x">
				<?php if (is_active_sidebar( 'footer-sidebar')): ?>
					<div class="site-info large-auto cell"><?php totalpress_footer_credits(); ?></div><!-- .site-info -->
			    	<?php do_action('totalpress_footer_sidebar'); ?>
				<?php else: ?>
					<div class="site-info large-auto cell text-center"><?php totalpress_footer_credits(); ?></div><!-- .site-info -->
				<?php endif; ?>
			</div><!-- .inside-footer -->
			<?php do_action('totalpress_after_footer_content'); ?>
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
		if (true == get_theme_mod('totalpress_btp_switch',true)) {
			$backtotop = sprintf( '<div class="back-to-top"><i class="fa fa-angle-up fa-lg" aria-hidden="true"></i></div>');
			echo apply_filters('totalpress_back_to_top',$backtotop);
		}
	}
	add_action('wp_footer','totalpress_back_to_top');
endif;
