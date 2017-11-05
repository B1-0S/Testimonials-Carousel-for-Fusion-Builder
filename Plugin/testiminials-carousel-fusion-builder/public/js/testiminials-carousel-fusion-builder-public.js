(function( $ ) {
	'use strict';

	jQuery(document).ready(function( $ ) {
		
		//Store the slider in a local variable
		var $window = $(window),
		flexslider = { vars:{} };
		
		$window.load(function() {
			//Find each slider and..
			$('.b10s-testimonials').each(function(){
				
				//... set speed variable
				var b10sSliderSpeed = parseInt($(this).attr('data-b10ssliderspeed'));
				
				//... set testimonials window width variable
				var b10sTestimonials = $(this).width();
				
				//... set single testimonial width based on screen width
				if(b10sTestimonials < 600){
					// If the testimonials window is under 600px use testimonials window width as single testimonial width. This basically means that only one testimonial per slide will be displayed.
					var responsiveFlex = b10sTestimonials;
				}else{
					// If the testimonials window is over 600px use testimonials window width divided  by 3 (for 3 slides) as single testimonial width.
					var responsiveFlex =  Math.floor((b10sTestimonials)/3);
				}
				
				//Initialize $(this) slider 
				$(this).flexslider({
					animation: "slide",
					animationLoop: true,
					slideshowSpeed: b10sSliderSpeed, 
					controlNav: true,
					useCSS: false,
					itemWidth: responsiveFlex,
					itemMargin: 0
				});
			});
		});
	});

})( jQuery );
