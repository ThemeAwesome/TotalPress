<?php /* @version 1.0.2 */
if ( ! defined('ABSPATH')) exit;

/**************************************
 * Hide Footer Widgets
 *************************************/
if ( ! function_exists('totalpress_footer_widgets_meta_box')) :
	add_action('totalpress_hide_footer_widgets','totalpress_footer_widgets_meta_box');
		function totalpress_footer_widgets_meta_box() {
			class TotalPress_Hide_Footer_Widget_Meta_Box {
				public function __construct() {
					if ( is_admin() ) {
						add_action('load-post.php',array($this,'init_metabox'));
						add_action('load-post-new.php',array($this,'init_metabox'));
					}
				}
				public function init_metabox() {
					add_action('add_meta_boxes',array($this,'add_metabox'));
					add_action('save_post',array($this,'save_metabox'),10,2);
				}
				public function add_metabox() {
					add_meta_box(
						'footer_widgets',
						__('Hide Footer Widgets','totalpress'),
						array($this,'render_hide_footer_widget_metabox'),
						array('post','page'),
						'side',
						'default'
					);
				}

				public function render_hide_footer_widget_metabox( $post ) {

					// Add nonce for security and authentication.
					wp_nonce_field('totalpress_nonce_action','totalpress_nonce');

					// Retrieve an existing value from the database.
					$totalpress_hide_widget_one = get_post_meta( $post->ID,'totalpress_hide_widget_one',true);
					$totalpress_hide_widget_two = get_post_meta( $post->ID,'totalpress_hide_widget_two',true);
					$totalpress_hide_widget_three = get_post_meta( $post->ID,'totalpress_hide_widget_three',true);
					$totalpress_hide_widget_four = get_post_meta( $post->ID,'totalpress_hide_widget_four',true);
					$totalpress_hide_widget_five = get_post_meta( $post->ID,'totalpress_hide_widget_five',true);

					// Set default values.

					// Form fields.
					echo '<p><label><input type="checkbox" name="totalpress_hide_widget_one" class="totalpress_footer_widget_one_field" 
					value="' . $totalpress_hide_widget_one . '" ' . checked( $totalpress_hide_widget_one, 'checked', false ) . '> ' . '</label>';
					echo '<label for="totalpress_footer_widget_one" class="totalpress_footer_widget_one_label">' . __( 'Hide Footer Widget One', 'totalpress' ) . '</label></p>';
					echo '<p><label><input type="checkbox" name="totalpress_hide_widget_two" class="totalpress_footer_widget_two_field" value="' . $totalpress_hide_widget_two . '" ' . checked( $totalpress_hide_widget_two, 'checked', false ) . '> ' . '</label>';
					echo '<label for="totalpress_footer_widget_two" class="totalpress_footer_widget_two_label">' . __( 'Hide Footer Widget Two', 'totalpress') . '</label></p>';
					echo '<p><label><input type="checkbox" name="totalpress_hide_widget_three" class="totalpress_footer_widget_three_field" value="' . $totalpress_hide_widget_three . '" ' . checked( $totalpress_hide_widget_three, 'checked', false ) . '> ' . '</label>';
					echo '<label for="totalpress_footer_widget_three" class="totalpress_footer_widget_three_label">' . __( 'Hide Footer Widget Three','totalpress') . '</label></p>';
					echo '<p><label><input type="checkbox" name="totalpress_hide_widget_four" class="totalpress_footer_widget_four_field" value="' . $totalpress_hide_widget_four . '" ' . checked( $totalpress_hide_widget_four,'checked', false ) . '> ' . '</label>';
					echo '<label for="totalpress_footer_widget_four" class="totalpress_footer_widget_four_label">' . __('Hide Footer Widget Four','totalpress') . '</label></p>';
					echo '<p><label><input type="checkbox" name="totalpress_hide_widget_five" class="totalpress_footer_widget_five_field" value="' . $totalpress_hide_widget_five . '" ' . checked( $totalpress_hide_widget_five,'checked',false) . '> ' . '</label>';
					echo '<label for="totalpress_footer_widget_five" class="totalpress_footer_widget_five_label">' . __('Hide Footer Widget Five', 'totalpress' ) . '</label></p>';
				}

				public function save_metabox( $post_id, $post ) {
					// Add nonce for security and authentication.
					$nonce_name   = isset( $_POST['totalpress_nonce']) ? $_POST['totalpress_nonce'] : '';
					$nonce_action = 'totalpress_nonce_action';
					// Check if a nonce is set.
					if ( ! isset( $nonce_name ) )
						return;
					// Check if a nonce is valid.
					if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
						return;
					// Check if the user has permissions to save data.
					if ( ! current_user_can( 'edit_post', $post_id ) )
						return;
					// Check if it's not an autosave.
					if ( wp_is_post_autosave( $post_id ) )
						return;
					// Check if it's not a revision.
					if ( wp_is_post_revision( $post_id ) )
						return;
					// Sanitize user input.
					$totalpress_new_hide_widget_one = isset($_POST['totalpress_hide_widget_one']) ? 'checked' : '';
					$totalpress_new_hide_widget_two = isset($_POST['totalpress_hide_widget_two']) ? 'checked' : '';
					$totalpress_new_hide_widget_three = isset($_POST['totalpress_hide_widget_three']) ? 'checked' : '';
					$totalpress_new_hide_widget_four = isset($_POST['totalpress_hide_widget_four']) ? 'checked' : '';
					$totalpress_new_hide_widget_five = isset($_POST['totalpress_hide_widget_five']) ? 'checked' : '';
					// Update the meta field in the database.
					update_post_meta($post_id,'totalpress_hide_widget_one',$totalpress_new_hide_widget_one);
					update_post_meta($post_id,'totalpress_hide_widget_two',$totalpress_new_hide_widget_two);
					update_post_meta($post_id,'totalpress_hide_widget_three',$totalpress_new_hide_widget_three);
					update_post_meta($post_id,'totalpress_hide_widget_four',$totalpress_new_hide_widget_four);
					update_post_meta($post_id,'totalpress_hide_widget_five',$totalpress_new_hide_widget_five);
				}
			}
			new TotalPress_Hide_Footer_Widget_Meta_Box;
		}
	do_action('totalpress_hide_footer_widgets');
endif;

/**************************************
 * Hide Post/Page Elelments
 *************************************/
if ( ! function_exists( 'totalpress_page_options_meta_box' ) ) :
	add_action('totalpress_page_options','totalpress_page_options_meta_box');
		function totalpress_page_options_meta_box() {
			class TotalPress_Page_Options_Meta_Box {
				public function __construct() {
					if ( is_admin() ) {
						add_action('load-post.php',array($this,'init_metabox'));
						add_action('load-post-new.php',array($this,'init_metabox'));
					}
				}
				public function init_metabox() {
					add_action('add_meta_boxes',array($this,'add_metabox'));
					add_action('save_post',array($this,'save_metabox'),10,2);
				}
				public function add_metabox() {
					add_meta_box(
						'page-options',
						__('Hide Post/Page Elements','totalpress'),
						array($this,'render_page_options_metabox'),
						array('post','page'),
						'side',
						'default'
					);
				}
				public function render_page_options_metabox( $post ) {
					// Add nonce for security and authentication.
					wp_nonce_field('totalpress_nonce_action','totalpress_nonce');
					// Retrieve an existing value from the database.
					$page_options_hide_title = get_post_meta($post->ID,'page_options_hide_title',true);

					// Set default values.

					// Form fields.
					echo '<p><label><input type="checkbox" name="page_options_hide_title" class="page_options_post_title__field" value="' . $page_options_hide_title . '" ' . checked( $page_options_hide_title,'checked',false) . '> ' . '</label>';
					echo '<label for="page_options_post_title_" class="page_options_post_title__label">' . __('Hide Title','totalpress') . '</label></p>';
				}

				public function save_metabox( $post_id, $post ) {
					// Add nonce for security and authentication.
					$nonce_name   = isset( $_POST['totalpress_nonce'] ) ? $_POST['totalpress_nonce'] : '';
					$nonce_action = 'totalpress_nonce_action';
					// Check if a nonce is set.
					if ( ! isset( $nonce_name ) )
						return;
					// Check if a nonce is valid.
					if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
						return;
					// Check if the user has permissions to save data.
					if ( ! current_user_can( 'edit_post', $post_id ) )
						return;
					// Check if it's not an autosave.
					if ( wp_is_post_autosave( $post_id ) )
						return;
					// Check if it's not a revision.
					if ( wp_is_post_revision( $post_id ) )
						return;
					// Sanitize user input.
					$page_options_new_hide_title = isset( $_POST[ 'page_options_hide_title' ] ) ? 'checked' : '';
					// Update the meta field in the database.
					update_post_meta( $post_id, 'page_options_hide_title', $page_options_new_hide_title );
				}
			}
			new TotalPress_Page_Options_Meta_Box;
		}
	do_action('totalpress_page_options');
endif;

/**************************************
 * Remove Padding from Content Area
 *************************************/
if ( ! function_exists('totalpress_page_builder_meta_box')) :
	add_action('totalpress_page_builder_options','totalpress_page_builder_meta_box');
		function totalpress_page_builder_meta_box() {
			class TotalPress_Content_Padding_Custom_Meta_Box {

				public function __construct() {
					if ( is_admin() ) {
						add_action('load-post.php',array($this,'init_metabox'));
						add_action('load-post-new.php',array($this,'init_metabox'));
					}
				}
				public function init_metabox() {
					add_action('add_meta_boxes',array($this,'add_metabox'));
					add_action('save_post',array($this, 'save_metabox'),10,2);
				}
				public function add_metabox() {
					add_meta_box(
						'content-padding',
						__('Page Builder Options','totalpress'),
						array($this,'render_content_padding_metabox'),
						array('post','page'),
						'side',
						'default'
					);
				}
				public function render_content_padding_metabox( $post ) {
					// Add nonce for security and authentication.
					wp_nonce_field('totalpress_nonce_action','totalpress_nonce');
					// Retrieve an existing value from the database.
					$totalpress_remove_content_padding = get_post_meta($post->ID,'totalpress_remove_content_padding',true);

					// Set default values.

					// Form fields.
					echo '<p><label><input type="checkbox" name="totalpress_remove_content_padding" class="totalpress_remove_content_padding_field" value="' . $totalpress_remove_content_padding . '" ' . checked( $totalpress_remove_content_padding,'checked',false) . '> ' . '</label>';
					echo '<label for="totalpress_remove_content_padding" class="totalpress_remove_content_padding_label">' . __('Remove Content Padding','totalpress') . '</label></p>';
				}

				public function save_metabox( $post_id, $post ) {
					// Add nonce for security and authentication.
					$nonce_name   = isset( $_POST['totalpress_nonce'] ) ? $_POST['totalpress_nonce'] : '';
					$nonce_action = 'totalpress_nonce_action';
					// Check if a nonce is set.
					if ( ! isset( $nonce_name ) )
						return;
					// Check if a nonce is valid.
					if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
						return;
					// Check if the user has permissions to save data.
					if ( ! current_user_can( 'edit_post', $post_id ) )
						return;
					// Check if it's not an autosave.
					if ( wp_is_post_autosave( $post_id ) )
						return;
					// Check if it's not a revision.
					if ( wp_is_post_revision( $post_id ) )
						return;
					// Sanitize user input.
					$totalpress_new_remove_content_padding = isset( $_POST[ 'totalpress_remove_content_padding' ] ) ? 'checked' : '';
					// Update the meta field in the database.
					update_post_meta( $post_id, 'totalpress_remove_content_padding', $totalpress_new_remove_content_padding );
				}
			}
			new TotalPress_Content_Padding_Custom_Meta_Box;
		}
	do_action('totalpress_page_builder_options');
endif;