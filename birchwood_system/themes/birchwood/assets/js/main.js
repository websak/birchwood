jQuery(document).ready(function () {


	//service carousel
	jQuery(".logo_carousel").slick({
		dots: false,
		arrows: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		infinite: false,
		autoplay: true,
	  autoplaySpeed: 4000,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 1240,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});



});

window.addEventListener("load", function () {


	jQuery('.menu-item').mouseover(function () {
		if (jQuery(this).hasClass('services-sub-menu')) {
			jQuery(this).addClass('active');
			jQuery('.header-desktop').addClass('sticky');
			jQuery('.c-mega-menu.services-sub-menu').addClass('open');
		} else {
			if (jQuery(".services-sub-menu:hover").length == 0) {
				jQuery('.header-desktop').removeClass('sticky');
				jQuery('.c-mega-menu.services-sub-menu').removeClass('open');
			}
		}

	});

	jQuery("body").mouseover(function () {
		if (jQuery(".services-sub-menu:hover").length == 0 && jQuery(".header-desktop > .container:hover").length == 0 && jQuery('.c-mega-menu.services-sub-menu:hover').length == 0) {
			jQuery('.c-mega-menu.services-sub-menu').removeClass('open');
			jQuery('.header-desktop').removeClass('sticky');
		}
	});

		jQuery(".usp_box ul li").click(function () {
			jQuery(this).find('.info_box').slideToggle();
		});

		jQuery(".close").click(function () {
			jQuery(this).find('.info_box').hide();
		});

	// jQuery('.menu-item').on("mouseenter", function () {
	// 	if (jQuery(this).hasClass('services-sub-menu')) {
	// 		if (jQuery(this).hasClass('active')) {
	// 			jQuery(this).removeClass('active');
	// 			jQuery('.header-desktop').removeClass('sticky');
	// 			jQuery('.c-mega-menu.services-sub-menu').removeClass('open');
	// 		} else {
	// 			jQuery(this).addClass('active');
	// 			jQuery('.header-desktop').addClass('sticky');
	// 			jQuery('.c-mega-menu.services-sub-menu').addClass('open');
	// 		}
	// 		// } else {
	// 		// 	jQuery('.c-mega-menu.services-sub-menu').removeClass('open');
	// 	}

	// });


	jQuery('.close_menu').click(function (e) {
		e.preventDefault();
		jQuery('.header-desktop').removeClass('sticky');
		jQuery('.c-mega-menu').removeClass('open');
	});

	/* Mobile */
	jQuery('.navbar-toggler').click(function (e) {
		e.preventDefault();
		jQuery('.navbar').toggleClass('open');
		jQuery('.page-header').toggleClass('z-index-0');
	});

	jQuery('.menu-item-has-children a').click(function (e) {
		//e.preventDefault();
		jQuery('.sub-menu').slideToggle(200);
	});

	// jQuery('.service-drop-down a').click(function (e) {
	// 	e.preventDefault();
	// 	jQuery('.sub-menu').slideToggle(200);
	// });

	/*** -- Scroll animation -- ***/
	function scrollInit() {
		//Display animted on scroll elements if they are within the viewport on load
		let window_bottom = jQuery(window).scrollTop() + jQuery(window).height();
		jQuery('.scroll-animated').each(function () {
			if (jQuery(this).offset().top <= window_bottom) {
				jQuery(this).addClass('animate');
			}
		});
	}
	scrollInit();

	jQuery(window).scroll(function (e) {
		//Animate in elements with the "scroll-animated" class
		let window_bottom = jQuery(window).scrollTop() + jQuery(window).height();

		jQuery('.scroll-animated').each(function () {
			if (jQuery(this).offset().top < window_bottom) {
				jQuery(this).addClass('animate');
			} else if (jQuery(this).offset().top > window_bottom) {
				jQuery(this).removeClass('animate');
			}
		});
	});
	/*** -- END Scroll animation -- ***/

	/*** -- Mega menu -- ***/
	let desktop_header = document.querySelector(".header-desktop");
	let mega_menu = document.querySelector(".mega-menu");
	if (mega_menu) {
		let menu_button = desktop_header.querySelector(".navbar-toggler-icon");
		if (menu_button) {
			menu_button.addEventListener("click", function (e) {
				e.preventDefault();
				menu_button.classList.toggle("is-active");
				mega_menu.classList.toggle("active");
			});
		}
	}
	/*** -- END Mega menu -- ***/


	/*** -- Read more -- ***/
	jQuery(".hidden-content").hide();
	jQuery(".show_hide").on("click", function () {
		jQuery(".show_hide").toggleClass('active');
		jQuery(this).parents('.body').find('.hidden-content').slideToggle(200);
	});




	/*** -- END Read more -- ***/


	// Image Carousel 
	var numSlick = 0;
	jQuery('.gallery').each(function () {
		numSlick++;
		var slides = jQuery(this).parents('.card-image-slider').find(".slides-to-show").data("slides-to-show");
		var mobile_slides = jQuery(this).parents('.card-image-slider').find(".mobile_slides-to-show").data("mobile-slides-to-show");
		var tablet_slides = jQuery(this).parents('.card-image-slider').find(".tablet_slides-to-show").data("tablet-slides-to-show");
		var autoplay = jQuery(this).parents('.card-image-slider').find(".autoplay").data("autoplay");
		var speed = jQuery(this).parents('.card-image-slider').find(".speed").data("speed");
		var arrows = jQuery(this).parents('.card-image-slider').find(".arrows").data("arrows");
		var dots = jQuery(this).parents('.card-image-slider').find(".dots").data("dots");
		console.log(autoplay);
		jQuery(this).attr('id', 'slider-' + numSlick).slick({
			dots: dots,
			slidesToShow: slides,
			autoplay: autoplay,
			autoplaySpeed: speed,
			arrows: arrows,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: tablet_slides,
						dots: dots
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: mobile_slides
					}
				}
			]
		});
	});

	// services slider
var $carousel = jQuery('.services_slider');
var settings = {
	dots: false,
	arrows: true,
	slide: '.slick-slideshow__slide',
	slidesToShow: 3,
	centerMode: true,
	centerPadding: '120px',
	autoplay: true,
	autoplaySpeed: 4000,
};

function setSlideVisibility() {
	//Find the visible slides i.e. where aria-hidden="false"
	var visibleSlides = $carousel.find('.slick-slideshow__slide[aria-hidden="false"]');
	//Make sure all of the visible slides have an opacity of 1
	jQuery(visibleSlides).each(function () {
		jQuery(this).css('opacity', 1);
	});

	//Set the opacity of the first and last partial slides.
	jQuery(visibleSlides).first().prev().css('opacity', 0);
}

$carousel.slick(settings);
$carousel.slick('slickGoTo', 1);
setSlideVisibility();

$carousel.on('afterChange', function () {
	setSlideVisibility();
});

});