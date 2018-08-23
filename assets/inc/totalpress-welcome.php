<?php
if ( ! defined('ABSPATH')) exit;
// Load CSS
if ( ! function_exists('totalpress_load_admin_scripts')) {
    function totalpress_load_admin_scripts() {
        wp_enqueue_style('welcome', get_template_directory_uri() . '/assets/css/admin.css');
    }
    add_action('admin_enqueue_scripts','totalpress_load_admin_scripts');
}
// Add theme page
if ( ! function_exists('totalpress_theme_info')) {
    function totalpress_theme_info() {
        $menu_title = esc_html__('About TotalPress','totalpress');
        add_theme_page( esc_html__('About TotalPress','totalpress'),$menu_title,'edit_theme_options','totalpress','totalpress_theme_info_page');
    }
    add_action('admin_menu','totalpress_theme_info');
}
// Admin notice - Shows just one time
if ( ! function_exists( 'totalpress_admin_notice' ) ) {
    function totalpress_admin_notice() { 
        $theme_data = wp_get_theme();?>
        <div class="update notice notice-success notice-alt is-dismissible">
            <p><?php printf( __('Thanks for choosing <strong>%1$s</strong>! %2$s','totalpress'),  $theme_data->Name, '<a class="button button-primary" style="text-decoration: none;" href="'.esc_url( add_query_arg( array( 'page' => 'totalpress' ), admin_url('themes.php'))).'">'.esc_html__('Get Started with TotalPress','totalpress').'</a>'); ?></p>
        </div>
        <?php
    }
}
// Activation notice
if ( ! function_exists( 'totalpress_admin_notice_activation' ) ) {
    function totalpress_admin_notice_activation(){
        global $pagenow;
        if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'])) {
            add_action('admin_notices','totalpress_admin_notice');
        }
    }
    add_action('load-themes.php','totalpress_admin_notice_activation');
}
function totalpress_theme_info_page() {
    $theme_data = wp_get_theme('totalpress');
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
}
?>
    <div class="wrap about-wrap theme_info_wrapper">
        <h1><?php printf( esc_html__('Welcome to %s %1s', 'totalpress'), $theme_data->Name, $theme_data->Version ); ?></h1>
        <div class="about-text">
            <?php esc_html_e('I&#39;m TotalPress. I have lots of hooks and filters, 10 widget areas and 6 different sidebar page templates. I use the Kirki plugin for the theme customizer and the Meta Box plugin for metaboxes. Did I mention that I work really well with page builders like Elementor and Header Footer Elementor. What are you waiting for? Let&#39;s get started.','totalpress'); ?>
        </div><!-- end about-text -->
        <a target="_blank" href="<?php echo esc_url('https://themeawesome.com/'); ?>" class="theme-badge wp-badge"><span>ThemeAWESOME</span></a>
        <h2 class="nav-tab-wrapper">
            <a href="?page=totalpress" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php esc_html_e('Get Started','totalpress') ?></a>
            <a href="?page=totalpress&tab=support" class="nav-tab<?php echo $tab == 'support' ? ' nav-tab-active' : null; ?>"><?php esc_html_e('Support', 'totalpress'); ?></a>
            <a href="?page=totalpress&tab=primo" class="nav-tab<?php echo $tab == 'primo' ? ' nav-tab-active' : null; ?>"><?php esc_html_e('Go AWESOME with TP Primo','totalpress' ); ?></span></a>
        </h2><!-- end nav-tab-wrapper - tabs end -->

        <?php if ( is_null( $tab ) ) { ?>

        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="small-12 large-4 cell">
                    <div class="theme_link">
                        <h3><?php esc_html_e('Theme Customizer','totalpress'); ?></h3>
                        <p class="about"><?php printf(esc_html__('%s uses the Theme Customizer for all theme settings. Click "Customize TotalPress" to start personalizing your site.','totalpress'),$theme_data->Name);?></p>
                        <p><a href="<?php echo esc_url(admin_url('customize.php'));?>" class="button button-primary"><?php esc_html_e('Customize TotalPress','totalpress'); ?></a></p>
                    </div><!-- end theme_link -->
                    <div class="theme_link">
                        <h3><?php esc_html_e('Theme Documentation','totalpress'); ?></h3>
                        <p class="about"><?php printf(esc_html__('Need more details? Please check our full documentation for detailed information on how to use TotalPress.','totalpress'), $theme_data->Name); ?></p>
                        <p><a href="<?php echo esc_url( 'https://themeawesome.com/docs/totalpress/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e('TotalPress Documentation','totalpress'); ?></a></p>
                    </div><!-- end theme_link -->
                    <div class="theme_link">
                        <h3><?php esc_html_e('Having Trouble, Need some help?','totalpress' ); ?></h3>
                        <p class="about"><?php printf(esc_html__('Support for %s is provided through the WordPress Support Forums.', 'totalpress'), $theme_data->Name); ?></p>
                        <p><a href="<?php echo esc_url('https://wordpress.org/support/theme/totalpress' ); ?>" target="_blank" class="button button-primary"><?php echo sprintf( esc_html__('TotalPress Support Forums','totalpress'), $theme_data->Name); ?></a></p>
                    </div><!-- end theme_link -->
                </div><!-- end cell -->
                <div class="theme-image small-12 large-auto cell">
                    <img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="Theme Screenshot" />
                    <p class="cntr"><strong><?php esc_html_e( 'What do you think of TotalPress?', 'totalpress' ); ?></strong><br />
                    <?php _e('Please <a target="_blank" href="https://wordpress.org/support/theme/totalpress/reviews/">rate and review TotalPress</a> on WordPress.org.', 'totalpress'); ?><br />
                    <span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span><span class="dashicons dashicons-star-filled"></span></p>
                </div><!-- end theme_info_right -->
            </div>
        </div><!-- end theme_info_wrapper -->
        <?php } ?>
        <?php if ( $tab == 'support' ) { ?>
<div class="theme-support grid-container"><div class="grid-x grid-padding-x"><div class="mall-12 large-auto cell"><h3><span class="dashicons dashicons-edit"></span> Contact Support</h3><p>I hope you will enjoy using TotalPress, as much as I've enjoyed creating it. <br/><br/>If you have any questions, concerns, please feel free to contact me anytime.</p><p><a class="button button-primary" href="https://themeawesome.com/contact/" target="_blank">Contact Support</a></p></div><div class="small-12 large-auto cell"><h3><span class="dashicons dashicons-book"></span> Documentation</h3><p>Read the full documentation to learn how to set up and use TotalPress right out of the box.</p><p> You will also find documentation on how to use some of the hidden benefits of TotalPress.</p><p><a class="button button-primary" href="https://themeawesome.com/docs/totalpress/" target="_blank">TotalPress Documentation</a></p></div><div class="small-12 large-auto cell"><h3><span class="dashicons dashicons-chart-line"></span> Changelog</h3><p>Want to get brought up to speed and stay updated on the latest theme changes? <br/><br/>View the latest changes, fixes and features implemented in the latest verion of TotalPress.</p><p><a class="button button-primary" href="https://github.com/ThemeAwesome/TotalPress/blob/master/CHANGELOG.md" target="_blank">View the Changelog</a></p></div></div></div>
        <?php } ?>
        <?php if ( $tab == 'primo' ) { ?>
<div class="grid-container"> <div class="grid-x grid-padding-x"> <div class="small-12 large-auto cell"> <table class="tp-primo-table"> <thead> <tr> <th></th> <th>TotalPress</th> <th class="aligncenter">TotalPress <br/>with TP Primo</th> </tr></thead> <tbody> <tr> <td> <h3>Foundation for Sites</h3> <p>Built with and supports the latest version of Foundation for Sites.</p></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Mobile friendly</h3> <p>Responsive layout. Works on every device.</p></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>WooCommerce Compatible</h3> <p>Ready for e-commerce. You can build an online store here.</p></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Additional Layout Options</h3> <p>Gain additional layout options for each section of TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Additional Menus</h3> <p>TP Primo adds three more menu options to choose from. You'll get a Sticky menu, a Scroll Hide Menu and a Sticky Shrink menu. You'll also have the option of using the Off Canvas menu for mobile devices.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Additional Color Options</h3> <p>You can change the colors of pretty much anything and everything related to TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Additional Font Options</h3> <p>You can change the font family for any and all sections of TotalPress, from the Top Sidebar all the way down to the Footer. It's up to you.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Right Sidebar Options</h3> <p>Control the layout, look and feel of the Right Sidebar in TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Left Sidebar Options</h3> <p>Control the layout, look and feel of the Left Sidebar in TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Footer Widget Options</h3> <p>Control the layout, look and feel of the Footer Widget area located above the main Footer in TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Footer Sidebar Options</h3> <p>Control the layout, look and feel of the Footer Sidebar in TotalPress.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Additional Post/Page Metabox Options</h3> <p>TotalPress gives you only a few metabox options for posts and pages. TP Primo adds additional metabox options giving you total control over the look and feel of each and every post or page.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>TotalPress Hooks Panel</h3> <p>TP Primo adds a hooks panel that will give you control of the 22 built in hooks that ship with TotalPress. You'll be able to add additional functionality or content at that location where the hook was added. No need to modify files, just copy, paste and click Save Hooks.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Modify Footer Text</h3> <p>Easily change the <strong>&#34;Built with TotalPress &#45; Powered by WordPress&#34;</strong> copyright footer message. No need to modify any files or add aditional code.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr> <td> <h3>Full Support</h3> <p>Gain access to the Support Forums where you will get full support for any issues you have with TotalPress and TP Primo.</p></td><td class="only-primo"><span class="dashicons-before dashicons-no-alt"></span></td><td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td></tr><tr class="ti-about-page-text-center"> <td><img class="moneyback" src="https://i.imgur.com/HjBrIgH.png"></img></td><td colspan="2"><a href="https://themeawesome.com/tp-primo/#primo-pricing" target="_blank" class="button button-primary button-hero">Only <span><strong>$39.95</strong> - Get TP Primo now!</a></td></tr></tbody> </table> </div></div></div>
        <?php } ?>
        <?php do_action( 'totalpress_more_tabs_details', $tab ); ?>
    </div> <!-- END .theme_info -->
    <script type="text/javascript">
        jQuery(  document).ready( function( $ ){
            $( 'body').addClass( 'about-php' );
        } );
    </script>
    <?php
}