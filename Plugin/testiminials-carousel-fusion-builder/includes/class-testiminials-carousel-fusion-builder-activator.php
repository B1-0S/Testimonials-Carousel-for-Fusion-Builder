<?php

/**
 * Fired during plugin activation
 *
 * @link       dimitar.online
 * @since      1.0.0
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/includes
 * @author     Dimitar Radev <biosyntheticdesigns@gmail.com>
 */
class Testiminials_Carousel_Fusion_Builder_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( ! class_exists( 'FusionCore_Plugin' ) ) {
				$message = '<style>#error-page > p{display:-webkit-flex;display:flex;}#error-page img {height: 120px;margin-right:25px;}.fb-heading{font-size: 1.17em; font-weight: bold; display: block; margin-bottom: 15px;}.fb-link{display: inline-block;margin-top:15px;}.fb-link:focus{outline:none;box-shadow:none;}</style>';
				$message .= '<span><span class="fb-heading">Testimonials Carousel for Fusion Builder could not be activated</span>';
				$message .= '<span>Testimonials Carousel for Fusion Builder can only be activated if Fusion Builder 1.0 or higher is activated. Click the link below to install/activate Fusion Builder, then you can activate this plugin.</span>';
				$message .= '<a class="fb-link" href="' . admin_url( 'admin.php?page=avada-plugins' ) . '">' . esc_attr__( 'Go to the Avada plugin installation page', 'Avada' ) . '</a></span>';
				wp_die( wp_kses_post( $message ) );
		}
	}

}
