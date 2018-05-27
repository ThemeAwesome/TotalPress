<?php
if ( ! defined('ABSPATH')) exit;
class TotalPress_Kirki {
	protected static $config = array();
	protected static $fields = array();
	public function __construct() {
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_fonts' ) );
	}
	public static function get_option( $config_id = '', $field_id = '' ) {
		if ( class_exists( 'Kirki' ) ) {
			return Kirki::get_option( $config_id, $field_id );
		}
		$default = '';
		if ( isset( self::$fields[ $field_id ] ) && isset( self::$fields[ $field_id ]['default'] ) ) {
			$default = self::$fields[ $field_id ]['default'];
		}
		if ( isset( self::$config[ $config_id ] ) ) {
			if ( 'option' == self::$config[ $config_id ]['option_type'] ) {
				if ( isset( self::$config[ $config_id ]['option_name'] ) && ! empty( self::$config[ $config_id ]['option_name'] ) ) {
					$all_options = get_option( self::$config[ $config_id ]['option_name'], array() );
					if ( ! isset( $all_options[ $field_id ] ) ) {
						return $default;
					}
					return maybe_unserialize( $all_options[ $field_id ] );
				}
				$dummy = md5( $config_id . '_UNDEFINED_VALUE' );
				$value = get_option( $field_id, $dummy );
				// setting has not been set, return default.
				if ( $dummy == $value ) {
					return $default;
				}
				return $value;
			}
			return get_theme_mod( $field_id, $default );
		}
	}
	public static function add_panel( $id = '', $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_panel( $id, $args );
		}
	}
	public static function add_section( $id, $args ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_section( $id, $args );
		}
	}
	public static function add_config( $config_id, $args = array() ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_config( $config_id, $args );
			return;
		}
		$config[ $config_id ] = $args;
		if ( ! isset( self::$config[ $config_id ]['option_type'] ) ) {
			self::$config[ $config_id ]['option_type'] = 'theme_mod';
		}
	}
	public static function add_field( $config_id, $args ) {
		if ( class_exists( 'Kirki' ) ) {
			Kirki::add_field( $config_id, $args );
			return;
		}
		if ( isset( $args['settings'] ) && isset( $args['type'] ) ) {
			if ( ! isset( $args['kirki_config'] ) ) {
				$args['kirki_config'] = $config_id;
			}
			if ( 'background' == $args['type'] && isset( $args['output'] ) ) {
				if ( isset( $args['default'] ) && is_array( $args['default'] ) ) {
					foreach ( $args['default'] as $default_property => $default_value ) {
						$subfield = $args;
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
	public function enqueue_styles() {
		if ( class_exists( 'Kirki' ) ) {
			return;
		}
		$styles = $this->get_styles();
		if ( ! empty( $styles ) ) {
			$current_theme = ( wp_get_theme() );
			wp_enqueue_style( $current_theme->stylesheet . '_no-kirki', get_stylesheet_uri(), null, null );
			wp_add_inline_style( $current_theme->stylesheet . '_no-kirki', $styles );
		}
	}
	public function get_styles() {
		$fields = self::$fields;
		if ( empty( self::$fields ) || ! is_array( $fields ) ) {
			return;
		}
		$css = array();
		foreach ( $fields as $field ) {
			if ( ! isset( $field['output'] ) || empty( $field['output'] ) || ! is_array( $field['output'] ) ) {
				continue;
			}
			$value = self::get_option( $field['kirki_config'], $field['settings'] );
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
				if ( is_array( $output['element'] ) ) {
					$output['element'] = array_unique( $output['element'] );
					sort( $output['element'] );
					$output['element'] = implode( ',', $output['element'] );
				}
				if ( ! is_array( $value ) ) {
					$value = str_replace( '$', $value, $output['value_pattern'] );
					if ( ! empty( $output['element'] ) && ! empty( $output['property'] ) ) {
						$css[ $output['media_query'] ][ $output['element'] ][ $output['property'] ] = $output['prefix'] . $value . $output['units'] . $output['suffix'];
					}
				} else {
					if ( 'typography' == $field['type'] ) {
						foreach ( $value as $key => $subvalue ) {
							if ( 'subsets' == $key ) {
								continue;
							}
							if ( 'font-family' == $key && false !== strpos( $subvalue, ' ' ) && false === strpos( $subvalue, '"' ) ) {
								$css[ $output['media_query'] ][ $output['element'] ]['font-family'] = '"' . $subvalue . '"';
							}
							if ( 'variant' == $key ) {
								$font_weight = str_replace( 'italic', '', $subvalue );
								$font_weight = ( in_array( $font_weight, array( '', 'regular' ) ) ) ? '400' : $font_weight;
								$css[ $output['media_query'] ][ $output['element'] ]['font-weight'] = $font_weight;
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
		$final_css = '';
		if ( ! is_array( $css ) || empty( $css ) ) {
			return '';
		}
		foreach ( $css as $media_query => $styles ) {
			$final_css .= ( 'global' != $media_query ) ? $media_query . '{' : '';
			foreach ( $styles as $style => $style_array ) {
				$final_css .= $style . '{';
					foreach ( $style_array as $property => $value ) {
						$value = ( is_string( $value ) ) ? $value : '';
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
		if ( empty( self::$fields ) || ! is_array( self::$fields ) ) {
			return;
		}
		foreach ( self::$fields as $field ) {
			if ( isset( $field['type'] ) && 'typography' == $field['type'] ) {
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
					$url_is_valid = get_transient( $key );
					if ( false === $url_is_valid ) {
						$response = wp_remote_get( 'https:' . $url );
						if ( ! is_array( $response ) ) {
							set_transient( $key, null, 12 * HOUR_IN_SECONDS );
							continue;
						}
						if ( isset( $response['response'] ) && isset( $response['response']['code'] ) ) {
							if ( 200 == $response['response']['code'] ) {
								set_transient( $key, true, 7 * 24 * HOUR_IN_SECONDS );
								$url_is_valid = true;
							}
						}
					}
					if ( $url_is_valid ) {
						wp_enqueue_style( $key, $url, null, null );
					}
				}
			}
		}
	}
}
new TotalPress_Kirki();