<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       dimitar.online
 * @since      1.0.0
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/admin
 * @author     Dimitar Radev <biosyntheticdesigns@gmail.com>
 */
class Testiminials_Carousel_Fusion_Builder_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/testiminials-carousel-fusion-builder-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/testiminials-carousel-fusion-builder-admin.js', array( 'jquery' ), $this->version, false );

	}
	function map_testimonials_carousel_addon() {
	if ( ! defined( 'TESTIMONIALS_CAROUSEL_PLUGIN_DIR' ) ) {
	define( 'TESTIMONIALS_CAROUSEL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
	//Adding wrapper shortcode to Theme Fusion UI
	fusion_builder_map(
		array(
			'name'          => esc_attr__( 'Testimonials Carousel', 'testimonials-carousel-fb' ),
			'shortcode'     => 'fusion_testimonialCarousels',
			'multi'         => 'multi_element_parent',
			'element_child' => 'fusion_testimonialCarousel',
			'icon'          => 'fa fa-quote-left',
			'preview'       => TESTIMONIALS_CAROUSEL_PLUGIN_DIR . 'js/preview/testimonials-addon-preview.php',
			'preview_id'    => 'testimonials-carousel-fusion-builder-preview-template',
			'params'        => array(
				array(
					'type'        => 'tinymce',
					'heading'     => esc_attr__( 'Content', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Please enter the testimonial content here.', 'testimonials-carousel-fb' ),
					'param_name'  => 'element_content',
					'value'       => '[fusion_testimonialCarousel title="Your First Testimonial"]Your Content Goes Here[/fusion_testimonialCarousel]',
				),
				array(
					'type'          => 'colorpickeralpha',
					'heading'    	=> __( 'Border Color', 'testimonials-carousel-fb' ),
					'param_name'    => 'color_border',
					'value'         => '#a0ce4e',
					'description'   => __( 'Please set the testimonial border color.', 'testimonials-carousel-fb' ),
				),
				array(
					'type'          => 'colorpickeralpha',
					'heading'    	=> __( 'Background Color', 'testimonials-carousel-fb' ),
					'param_name'    => 'color_testimonial_title',
					'value'         => '#ffffff',
					'description'   => __( 'Please set the testimonial background color.', 'testimonials-carousel-fb' ),
				),
				array(
					'type'          => 'colorpicker',
					'heading'    	=> __( 'Text Color', 'testimonials-carousel-fb' ),
					'param_name'    	=> 'color_testimonial_text',
					'value'         => '#666666',
					'description'   => __( 'Please set the testimonial text color.', 'testimonials-carousel-fb' ),
				),
				array(
					'type'          => 'textfield',
					'heading'    	=> __( 'Title Font Size', 'testimonials-carousel-fb' ),
					'param_name'    => 'size_testimonial_title',
					'value'         => '15px',
					'description'   => __( 'Please set the title font size. ', 'testimonials-carousel-fb' ),
				),
				array(
					'type'          => 'textfield',
					'heading'    	=> __( 'Content Font Size', 'testimonials-carousel-fb' ),
					'param_name'    => 'size_testimonial_content',
					'value'         => '14px',
					'description'   => __( 'Please set the content font size.', 'testimonials-carousel-fb' ),
				),
				array(
					'type'        => 'radio_button_set',
					'heading'     => esc_attr__( 'Select Style', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Please select style in which the testimonials will be displayed.', 'testimonials-carousel-fb' ),
					'param_name'  => 'carousel_tyle',
					'value'       => array(
						'b10sBox' => esc_attr__( 'Box', 'testimonials-carousel-fb' ),
						'b10sPicLeft' => esc_attr__( 'Align Left', 'testimonials-carousel-fb' ),
						'b10sPicRight' => esc_attr__( 'Align Right', 'testimonials-carousel-fb' ),
					),
					'default'     => 'b10sBox',
				),
				array(
					'type'        => 'radio_button_set',
					'heading'     => esc_attr__( 'Rounded Corners', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Please select style in which the testimonials corners will be displayed.', 'testimonials-carousel-fb' ),
					'param_name'  => 'carousel_corners',
					'value'       => array(
						'b10sCornersOn' => esc_attr__( 'On', 'testimonials-carousel-fb' ),
						'b10sCornersOff' => esc_attr__( 'Off', 'testimonials-carousel-fb' ),
					),
					'default'     => 'b10sCornersOn',
				),
				array(
					'type'        => 'radio_button_set',
					'heading'     => __( 'Show Title', 'testimonials-carousel-fb' ),
					'description' => __( 'Show or Hide the testimonials titles.', 'testimonials-carousel-fb' ),
					'param_name'  => 'show_title',
					'value'       => array(
						'show' => esc_attr__( 'Show', 'testimonials-carousel-fb' ),
						'none' => esc_attr__( 'Hide', 'testimonials-carousel-fb' ),
					),
					'default'     => 'show',
				),
				array(
					'type'        => 'radio_button_set',
					'heading'     => __( 'Show Image', 'testimonials-carousel-fb' ),
					'description' => __( 'Show or Hide the testimonials pictures.', 'testimonials-carousel-fb' ),
					'param_name'  => 'show_image',
					'value'       => array(
						'show' => esc_attr__( 'Show', 'testimonials-carousel-fb' ),
						'none' => esc_attr__( 'Hide', 'testimonials-carousel-fb' ),
					),
					'default'     => 'show',
				),
				array(
					'type'        => 'radio_button_set',
					'heading'     => esc_attr__( 'Show Pagination', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Show or Hide the testimonials pagination.', 'testimonials-carousel-fb' ),
					'param_name'  => 'show_pagination',
					'value'       => array(
						'block' => esc_attr__( 'Show', 'testimonials-carousel-fb' ),
						'none' => esc_attr__( 'Hide', 'testimonials-carousel-fb' ),
					),
					'default'     => 'block',
					),
				array(
					'type'        => 'radio_button_set',
					'heading'     => esc_attr__( 'Speed', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Please select speed of the carousel.', 'testimonials-carousel-fb' ),
					'param_name'  => 'slider_speed',
					'value'       => array(
						'15000' => esc_attr__( 'Slow', 'testimonials-carousel-fb' ),
						'7000' => esc_attr__( 'Medium', 'testimonials-carousel-fb' ),
						'3000' => esc_attr__( 'Fast', 'testimonials-carousel-fb' ),
					),
					'default'     => '7000',
				)
			),
		)
	);
	
	//Adding single testimonial shortcode to Theme Fusion UI
	fusion_builder_map(
		array(
			'name'              => esc_attr__( 'Testimonial', 'testimonials-carousel-fb' ),
			'shortcode'         => 'fusion_testimonialCarousel',
			'hide_from_builder' => true,
			'allow_generator'   => true,
			'params'            => array(
				array(
					'heading'     => __( 'Image', 'testimonials-carousel-fb' ),
					'description' => __( 'Select or Upload a image this testimonial. The best size is be 100 x 100px or any square image, if your image looks distorted you can edit it from the Media Library', 'testimonials-carousel-fb' ),
					'value'       => '',
					'type'        => 'upload',
					'param_name'  => 'image',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_attr__( 'Title', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Please enter Name or Title for this testimonial.', 'testimonials-carousel-fb' ),
					'param_name'  => 'title',
					'value'       => 'Your Title Goes Here',
					'placeholder' => true,
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_attr__( 'Content', 'testimonials-carousel-fb' ),
					'description' => esc_attr__( 'Add content for this testimonial. There is no character limitations for this field but for best results you may need to shorten very long testimonials.', 'testimonials-carousel-fb' ),
					'param_name'  => 'element_content',
					'value'       => 'Your Content Goes Here',
					'placeholder' => true,
				),
			),
		)
	);

}


}
