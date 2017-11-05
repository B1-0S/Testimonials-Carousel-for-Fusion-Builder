<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       dimitar.online
 * @since      1.0.0
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Testiminials_Carousel_Fusion_Builder
 * @subpackage Testiminials_Carousel_Fusion_Builder/public
 * @author     Dimitar Radev <biosyntheticdesigns@gmail.com>
 */
class Testiminials_Carousel_Fusion_Builder_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/testiminials-carousel-fusion-builder-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/testiminials-carousel-fusion-builder-public.js', array( 'jquery' ), $this->version, false );

	}
	
	//Create the Single Testimonial Shortcode trough WordPress API
	public function testimonialCarousel_register_shortcodes(){
		$motherShortVars = array(); //Set Global variable to pass variables between parent and child shortcodes
		
      	//Create the Wrapper Shortcode through WordPress API
		function fusion_testimonialCarousels( $atts, $content ) {
			global $motherShortVars;
			$motherShortVars = $atts; // !IMPORTANT In case of edits do not remove or move this function it will cause the single testimonials to lose settings options
			$unique_class = 'b10s-' . rand();
			$html = '<style type="text/css">';
			$html .= '.' . $unique_class . ' .b10sBlockquote { border-color: ' . $atts['color_border'] . '; }';
			$html .= '.' . $unique_class . ' .b10sBlockquote { background: ' . $atts['color_testimonial_title'] . '; }';
			$html .= '.' . $unique_class . ' .b10sBlockquote p, .' . $unique_class . ' .b10sBlockquote footer { color: ' . $atts['color_testimonial_text'] . '; }';
			$html .= '.' . $unique_class . ' .b10sBlockquote p{ font-size: ' . $atts['size_testimonial_content'] . '; }';
			$html .= '.' . $unique_class . ' .b10sBlockquote footer { font-size: ' . $atts['size_testimonial_title'] . '; }';
			$html .= '.' . $unique_class . ' .flex-control-paging { display: ' . $atts['show_pagination'] . '; }';
			if($atts["carousel_corners"] != 'b10sCornersOff'){$html .= '.' . $unique_class . ' .b10sBlockquote { -webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px; }';}
			if(($atts["carousel_corners"] != 'b10sCornersOff')&&($atts["carousel_tyle"] != 'b10sBox')){$html .= '.' . $unique_class . ' .b10sBlockquote img { -webkit-border-radius: 6px;-moz-border-radius: 6px;border-radius: 6px; }';}
			$html .= '</style>';
			$html .= '<div class="b10s-testimonials ' . $unique_class . ' ' . $atts['carousel_tyle'] . '" data-b10ssliderspeed="'.$atts['slider_speed'].'"><ul class="slides">';
			$html .= do_shortcode( $content );
			$html .= '</ul></div>';
			return $html;
		}
		
		//Create the Single Testimonial Shortcode trough WordPress API
		function fusion_testimonialCarousel( $atts, $content ) {
			global $motherShortVars;
			$html = '<li>';
			$html .= '<div class="b10sBlockquote">';
			if($motherShortVars["show_image"] !== 'none'){$html .= '<img src="' . $atts['image'] . '" alt="' . $atts['title']  . '" width="100px" height="100px" />';}
			$html .= '<p>'.do_shortcode( $content ).'</p>';
			if($motherShortVars["show_title"] !== 'none'){$html .= '<footer>' . $atts['title']  . '</footer>';}
			$html .= '</div>';
			$html .= '</li>';
			return $html;
		}
		
		//Add Wrapper Shortcode to Wordpress API
		add_shortcode( 'fusion_testimonialCarousels',  'fusion_testimonialCarousels' );
		//Add Single Testimonial Shortcode to Wordpress API
		add_shortcode( 'fusion_testimonialCarousel', 'fusion_testimonialCarousel' );
    }
}
