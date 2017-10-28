<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              dimitar.online
 * @since             1.0.0
 * @package           Testiminials_Carousel_Fusion_Builder
 *
 * @wordpress-plugin
 * Plugin Name:       Testimonials Carousel for Fusion Builder
 * Plugin URI:        dimitar.online/avada-testimonials
 * Description:       Testimonials Carousel Addon for Fusion Builder is a rotating carousel slider for testimonials. It is created to work with WordPress and Fusion Builder only. The slider itself is powered by FlexSlider already initialised by Fusion Builder.
 * Version:           1.0.0
 * Author:            Dimitar Radev
 * Author URI:        dimitar.online
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       testiminials-carousel-fusion-builder
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-testiminials-carousel-fusion-builder-activator.php
 */
function activate_testiminials_carousel_fusion_builder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-testiminials-carousel-fusion-builder-activator.php';
	Testiminials_Carousel_Fusion_Builder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-testiminials-carousel-fusion-builder-deactivator.php
 */
function deactivate_testiminials_carousel_fusion_builder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-testiminials-carousel-fusion-builder-deactivator.php';
	Testiminials_Carousel_Fusion_Builder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_testiminials_carousel_fusion_builder' );
register_deactivation_hook( __FILE__, 'deactivate_testiminials_carousel_fusion_builder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-testiminials-carousel-fusion-builder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_testiminials_carousel_fusion_builder() {

	$plugin = new Testiminials_Carousel_Fusion_Builder();
	$plugin->run();

}
run_testiminials_carousel_fusion_builder();
