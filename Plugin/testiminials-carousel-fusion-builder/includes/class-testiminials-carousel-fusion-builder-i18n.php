<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       dimitar.online
 * @since      1.0.0
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/includes
 * @author     Dimitar Radev <biosyntheticdesigns@gmail.com>
 */
class Testiminials_Carousel_Fusion_Builder_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'testiminials-carousel-fusion-builder',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
