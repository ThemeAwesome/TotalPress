<?php /* @version 1.0.5 */
if ( ! defined('ABSPATH')) exit;

/**************************************
 * WARNING: This is the code that loads Kirki - DO NOT edit or remove any of this under any circumstances.
 *************************************/
if ( ! class_exists( 'Kirki' ) ) {

	if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Kirki_Installer_Section' ) ) {
		/**
		 * Recommend the installation of Kirki using a custom section.
		 *
		 * @see WP_Customize_Section
		 */
		class Kirki_Installer_Section extends WP_Customize_Section {

			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'kirki_installer';

			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				foreach ( $plugins as $plugin ) {
					if ( 'Kirki' === $plugin['Name'] || 'Kirki Toolkit' === $plugin['Name'] ) {
						$installed = true;
					}
				}
				// Get the plugin-installation URL.
				$plugin_install_url = add_query_arg(
					array(
						'action' => 'install-plugin',
						'plugin' => 'kirki',
					),
					self_admin_url('update.php')
				);
				$plugin_install_url = wp_nonce_url( $plugin_install_url, 'install-plugin_kirki' );
				$classes = 'cannot-expand accordion-section control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="border-top:none;border-bottom:1px solid #ddd;padding:7px 14px 16px 14px;text-align:right;">
					<?php if ( ! $installed ) : ?>
						<p style="text-align:left;margin-top:0;"><?php esc_attr_e( 'It is recommended that the Kirki Plugin be installed and activated to take advantage of all the features built into TotalPress.','totalpress'); ?></p>
						<a class="install-now button-primary button" data-slug="kirki" href="<?php echo esc_url_raw( $plugin_install_url ); ?>" aria-label="<?php esc_attr_e('Install Kirki','totalpress'); ?>" data-name="Kirki Toolkit"><?php esc_html_e('Install Kirki','totalpress'); ?></a>
					<?php else : ?>
						<p style="text-align:left;margin-top:0;"><?php esc_attr_e('Please activate Kirki to take advantage of the TotalPress features in the customizer.','totalpress'); ?></p>
						<a class="install-now button-primary button change-theme" data-slug="kirki" href="<?php echo esc_url_raw( self_admin_url('plugins.php')); ?>" aria-label="<?php esc_attr_e('Activate Kirki','totalpress'); ?>" data-name="Kirki Toolkit"><?php esc_html_e('Activate Kirki','totalpress'); ?></a>
					<?php endif; ?>
				</li>
				<?php
			}
		}
	}

	if ( ! function_exists( 'kirki_installer_register' ) ) {
		/**
		 * Registers the section, setting & control for the kirki installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function kirki_installer_register( $wp_customize ) {
			$wp_customize->add_section( new Kirki_Installer_Section( $wp_customize, 'kirki_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			) ) );
			$wp_customize->add_setting( 'kirki_installer_setting', array(
				'sanitize_callback' => '__return_true',
			) );
			$wp_customize->add_control( 'kirki_installer_control', array(
				'section'    => 'kirki_installer',
				'settings'   => 'kirki_installer_setting',
			) );

		}
		add_action( 'customize_register', 'kirki_installer_register' );
	}
}

/**
 * This is a wrapper class for Kirki. If the Kirki plugin is installed, then all CSS & Google fonts will be handled by the plugin.
 * In case the plugin is not installed, this acts as a fallback ensuring that all CSS & fonts still work.
 * It does not handle the customizer options, simply the frontend CSS.
 */
class TotalPress_Kirki {

	/**
	 * @static
	 * @access protected
	 * @var array
	 */
	protected static $config = array();
	
	/**
	 * @static
	 * @access protected
	 * @var array
	 */
	protected static $fields = array();
	
	/**
	 * The class constructor
	 */
	public function __construct() {
		// If Kirki exists then there's no reason to procedd
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Add our CSS
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
		// Add google fonts
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fonts' ) );
	}

	/**
	 * Get the value of an option from the db.
	 *
	 * @param    string    $config_id    The ID of the configuration corresponding to this field
	 * @param    string    $field_id     The field_id (defined as 'settings' in the field arguments)
	 *
	 * @return 	mixed 	the saved value of the field.
	 */
	public static function get_option( $config_id = '', $field_id = '' ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			return Kirki::get_option( $config_id, $field_id );
		}
		// Kirki does not exist, continue with our custom implementation.
		// Get the default value of the field
		$default = '';
		if ( isset( self::$fields[ $field_id ] ) && isset( self::$fields[ $field_id ]['default'] ) ) {
			$default = self::$fields[ $field_id ]['default'];
		}
		// Make sure the config is defined
		if ( isset( self::$config[ $config_id ] ) ) {
			if ( 'option' == self::$config[ $config_id ]['option_type'] ) {
				// check if we're using serialized options
				if ( isset( self::$config[ $config_id ]['option_name'] ) && ! empty( self::$config[ $config_id ]['option_name'] ) ) {
					// Get all our options
					$all_options = get_option( self::$config[ $config_id ]['option_name'], array() );
					// If our option is not saved, return the default value.
					if ( ! isset( $all_options[ $field_id ] ) ) {
						return $default;
					}
					// Option was set, return its value unserialized.
					return maybe_unserialize( $all_options[ $field_id ] );
				}
				// If we're not using serialized options, get the value and return it.
				// We'll be using a dummy default here to check if the option has been set or not.
				// We'll be using md5 to make sure it's randomish and impossible to be actually set by a user.
				$dummy = md5( $config_id . '_UNDEFINED_VALUE' );
				$value = get_option( $field_id, $dummy );
				// setting has not been set, return default.
				if ( $dummy == $value ) {
					return $default;
				}
				return $value;
			}
			// We're not using options so fallback to theme_mod
			return get_theme_mod( $field_id, $default );
		}
	}

	/**
	 * Create a new panel
	 *
	 * @param   string      the ID for this panel
	 * @param   array       the panel arguments
	 */
	public static function add_panel( $id = '', $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_panel( $id, $args );
		}
		// If Kirki does not exist then there's no reason to add any panels.
	}

	/**
	 * Create a new section
	 *
	 * @param   string      the ID for this section
	 * @param   array       the section arguments
	 */
	public static function add_section( $id, $args ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_section( $id, $args );
		}
		// If Kirki does not exist then there's no reason to add any sections.
	}


	/**
	 * Sets the configuration options.
	 *
	 * @param    string    $config_id    The configuration ID
	 * @param    array     $args         The configuration arguments
	 */
	public static function add_config( $config_id, $args = array() ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_config( $config_id, $args );
			return;
		}
		// Kirki does not exist, set the config arguments
		$config[ $config_id ] = $args;
		// Make sure an option_type is defined
		if ( ! isset( self::$config[ $config_id ]['option_type'] ) ) {
			self::$config[ $config_id ]['option_type'] = 'theme_mod';
		}
	}

	/**
	 * Create a new field
	 *
	 * @param    string    $config_id    The configuration ID
	 * @param    array     $args         The field's arguments
	 */
	public static function add_field( $config_id, $args ) {
		// if Kirki exists, use it.
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_field( $config_id, $args );
			return;
		}
		// Kirki was not located, so we'll need to add our fields here.
		// check that the "settings" & "type" arguments have been defined
		if ( isset( $args['settings'] ) && isset( $args['type'] ) ) {
			// Make sure we add the config_id to the field itself.
			// This will make it easier to get the value when generating the CSS later.
			if ( ! isset( $args['kirki_config'] ) ) {
				$args['kirki_config'] = $config_id;
			}
			// Background fields need to be built separately
			if ( 'background' == $args['type'] && isset( $args['output'] ) ) {
				if ( isset( $args['default'] ) && is_array( $args['default'] ) ) {
					foreach ( $args['default'] as $default_property => $default_value ) {
						$subfield = $args;
						// No need to process the opacity, it is factored in the color control.
						if ( 'opacity' == $key ) {
							continue;
						}
						$key             = esc_attr( $key );
						$setting         = $key;
						$output_property = 'background-' . $key;
						if ( 'attach' == $key ) {
							$output_property = 'background-attachment';
						}
						if ( is_string( $subfield['output'] ) ) {
							$subfield['output'] = array( array(
								'element'  => $args['output'],
								'property' => $output_property,
							) );
						} else {
							foreach ( $subfield['output'] as $key => $output ) {
								$subfield['output'][ $key ]['property'] = $output_property;
							}
						}
						$type = 'select';
						if ( in_array( $key, array( 'color', 'image' ) ) ) {
							$type = $key;
						}
						$property_setting = esc_attr( $args['settings'] ) . '_' . $setting;
						self::$fields[ $property_setting ] = $subfield;
					}
				}
			}
			self::$fields[ $args['settings'] ] = $args;
		}
	}

	/**
	 * Enqueues the stylesheet
	 */
	public function enqueue_styles() {
		// If Kirki exists there's no need to proceed any further
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		// Get our inline styles
		$styles = $this->get_styles();
		// If we have some styles to add, add them now.
		if ( ! empty( $styles ) ) {
			// enqueue the theme's style.css file
			$current_theme = ( wp_get_theme() );
			wp_enqueue_style( $current_theme->stylesheet . '_no-kirki', get_stylesheet_uri(), null, null );
			wp_add_inline_style( $current_theme->stylesheet . '_no-kirki', $styles );
		}
	}

	/**
	 * Gets all our styles and returns them as a string.
	 */
	public function get_styles() {
		// Get an array of all our fields
		$fields = self::$fields;
		// Check if we need to exit early
		if ( empty( self::$fields ) || ! is_array( $fields ) ) {
			return;
		}
		// initially we're going to format our styles as an array.
		// This is going to make processing them a lot easier
		// and make sure there are no duplicate styles etc.
		$css = array();
		// start parsing our fields
		foreach ( $fields as $field ) {
			// No need to process fields without an output, or an improperly-formatted output
			if ( ! isset( $field['output'] ) || empty( $field['output'] ) || ! is_array( $field['output'] ) ) {
				continue;
			}
			// Get the value of this field
			$value = self::get_option( $field['kirki_config'], $field['settings'] );
			// start parsing the output arguments of the field
			foreach ( $field['output'] as $output ) {
				$defaults = array(
					'element'       => '',
					'property'      => '',
					'media_query'   => 'global',
					'prefix'        => '',
					'units'         => '',
					'suffix'        => '',
					'value_pattern' => '$',
					'choice'        => '',
				);
				$output = wp_parse_args( $output, $defaults );
				// If element is an array, convert it to a string
				if ( is_array( $output['element'] ) ) {
					$output['element'] = array_unique( $output['element'] );
					sort( $output['element'] );
					$output['element'] = implode( ',', $output['element'] );
				}
				// Simple fields
				if ( ! is_array( $value ) ) {
					$value = str_replace( '$', $value, $output['value_pattern'] );
					if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) ) {
						$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value . $output['units'] . $output['suffix'];
					}
				} else {
					if ( 'typography' == $field['type'] ) {
						foreach ( $value as $key => $subvalue ) {
							// exclude subsets as a property
							if ( 'subsets' == $key ) {
								continue;
							}
							// add double quotes if needed to font-families
							if ( 'font-family' == $key && false !== strpos( $subvalue, ' ' ) && false === strpos( $subvalue, '"' ) ) {
								$css[ $output['media_query'] ][ $output['element'] ]['font-family'] = '"' . $subvalue . '"';
							}
							// variants contain both font-weight & italics
							if ( 'variant' == $key ) {
								$font_weight = str_replace( 'italic', '', $subvalue );
								$font_weight = ( in_array( $font_weight, array( '', 'regular' ) ) ) ? '400' : $font_weight;
								$css[ $output['media_query'] ][ $output['element'] ]['font-weight'] = $font_weight;
								// Is this italic?
								$is_italic = ( false !== strpos( $subvalue, 'italic' ) );
								if ( $is_italic ) {
									$css[ $output['media_query'] ][ $output['element'] ]['font-style'] = 'italic';
								}
							} else {
								$css[ $output['media_query'] ][ $output['element'] ][ $key ] = $subvalue;
							}
						}
					} elseif ( 'spacing' == $field['type'] ) {
						foreach ( $value as $key => $subvalue ) {
							if ( empty( $output['property'] ) ) {
								$output['property'] = $key;
							} elseif ( false !== strpos( $output['property'], '%%' ) ) {
								$output['property'] = str_replace( '%%', $key, $output['property'] );
							} else {
								$output['property'] = $output['property'] . '-' . $key;
							}
							$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $subvalue;
						}
					} elseif ( 'multicolor' == $field['type'] ) {
						if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) && ! empty( $output['choice'] ) ) {
							$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value[ $output['choice'] ] . $output['units'] . $output['suffix'];
						}
					}
				}
			}
		}
		// Process the array of CSS properties and produce the final CSS
		$final_css = '';
		if ( ! is_array( $css ) || empty( $css ) ) {
			return '';
		}
		// Parse the generated CSS array and create the CSS string for the output.
		foreach ( $css as $media_query => $styles ) {
			// Handle the media queries
			$final_css .= ( 'global' != $media_query ) ? $media_query . '{' : '';
			foreach ( $styles as $style => $style_array ) {
				$final_css .= $style . '{';
					foreach ( $style_array as $property => $value ) {
						$value = ( is_string( $value ) ) ? $value : '';
						// Make sure background-images are properly formatted
						if ( 'background-image' == $property ) {
							if ( false === strrpos( $value, 'url(' ) ) {
								$value = 'url("' . esc_url_raw( $value ) . '")';
							}
						} else {
							$value = esc_textarea( $value );
						}
						$final_css .= $property . ':' . $value . ';';
					}
				$final_css .= '}';
			}
			$final_css .= ( 'global' != $media_query ) ? '}' : '';
		}
		return $final_css;
	}

	public function enqueue_fonts() {
		// Check if we need to exit early
		if ( empty( self::$fields ) || ! is_array( self::$fields ) ) {
			return;
		}
		foreach ( self::$fields as $field ) {
			// Process typography fields
			if ( isset( $field['type'] ) && 'typography' == $field['type'] ) {
				// Check if we've got everything we need
				if ( ! isset( $field['kirki_config'] ) || ! isset( $field['settings'] ) ) {
					continue;
				}
				$value = self::get_option( $field['kirki_config'], $field['settings'] );
				if ( isset( $value['font-family'] ) ) {
					$url = '//fonts.googleapis.com/css?family=' . str_replace( ' ', '+', $value['font-family'] );
					if ( ! isset( $value['variant'] ) ) {
						$value['variant'] = '';
					}
					if ( ! empty( $value['variant'] ) ) {
						$url .= ':' . $value['variant'];
					}
					if ( ! isset( $value['subset'] ) ) {
						$value['subset'] = '';
					}
					if ( ! empty( $value['subset'] ) ) {
						if ( is_array( $value['subset'] ) ) {
							$value['subset'] = implode( ',', $value['subsets'] );
						}
						$url .= '&subset=' . $value['subset'];
					}
					$key = md5( $value['font-family'] . $value['variant'] . $value['subset'] );
					// check that the URL is valid. we're going to use transients to make this faster.
					$url_is_valid = get_transient( $key );
					if ( false === $url_is_valid ) { // transient does not exist
						$response = wp_remote_get( 'https:' . $url );
						if ( ! is_array( $response ) ) {
							// the url was not properly formatted,
							// cache for 12 hours and continue to the next field
							set_transient( $key, null, 12 * HOUR_IN_SECONDS );
							continue;
						}
						// check the response headers.
						if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
							if ( 200 == $response['response']['code'] ) {
								// URL was ok
								// set transient to true and cache for a week
								set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
								$url_is_valid = true;
							}
						}
					}
					// If the font-link is valid, enqueue it.
					if ( $url_is_valid ) {
						wp_enqueue_style( $key, $url, null, null );
					}
				}
			}
		}
	}
}
new TotalPress_Kirki();