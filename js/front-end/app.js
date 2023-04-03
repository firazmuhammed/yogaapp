$(document).ready(function() {
	$('.mob-breadcrumb').click(function(){
		$(this).toggleClass("breadcrumb-open");
		$('.menu-items').toggleClass("menu-open");
		$('body').toggleClass("overlay-without-header");
	});
	// home banner starts
	$('.banner_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 6000,
		fade: true,
		nextArrow: '.banner-next',
  		prevArrow: '.banner-prev'
	});
	// home banner ends
	// essential slider starts
	$('.essential-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		nextArrow: '.essential-next',
  		prevArrow: '.essential-prev',
		  responsive: [
			{
				breakpoint: 769,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 500,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1
				}
			}
	
			]
	});
	// essential slider ends
	// Product left filter starts
	$('.main-cat').click(function(){
		if ($(this).hasClass("aciveItem")) {
			// $(this).parent().removeClass('active-cat');
			$(this).removeClass('aciveItem');
			$(this).parent().removeClass('active-cat');
			// alert(123);
		}
		else{
			$('.single-cat').removeClass('active-cat');
			$('.main-cat').removeClass('aciveItem');
			$(this).parent().addClass('active-cat');
			$(this).addClass('aciveItem');
		}

	});
	// Product left filter Ends

	// Product Details start
	$('.product-d-single img').click(function(){
		var currentImage = $(this).attr('src');
		$('#target-image').attr('src', currentImage);
	});

	$('.related-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		nextArrow: '.related-next',
  		prevArrow: '.related-prev',
		  responsive: [
			{
				breakpoint: 1101,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 601,
				settings: {
				slidesToShow: 2,
				slidesToScroll: 1
				}
			},
			{
				breakpoint: 440,
				settings: {
				slidesToShow: 1,
				slidesToScroll: 1
				}
			}
	
			]
	});
	$('.weight-type').click(function(){
		$('.weight-type').removeClass('active-btn');
		$(this).addClass('active-btn');
	});
	// Product Detail Ends

	// Collection page starts
	

	// Collection page ends
	

});


// Cart page starts
	var incrementPlus;
	var incrementMinus;

	var buttonPlus  = $(".cart_plus_product");
	var buttonMinus = $(".cart_minus_product");

	var incrementPlus = buttonPlus.click(function() {
		var $n = $(this).parent(".quantity-details").find(".quantity_value");
		$n.val(Number($n.val())+1 );
	});

	var incrementMinus = buttonMinus.click(function() {
		var $n = $(this).parent(".quantity-details").find(".quantity_value");
		var amount = Number($n.val());
		if (amount > 0) {
			$n.val(amount-1);
		}
	});

	$(".cart-close-icon").click(function() {
		$(this).parent(".single").fadeOut();
	});

// Cart page ends

// Checkout page starts
$(".delivary-info-parent").click(function() {
	$(".delivary-information-inner-block").fadeToggle();
});
$(".order-review-block").click(function() {
	$(".order-review-parent").fadeToggle();
});
$(".payment-opt-main-block").click(function() {
	$(".payment-option-parent").fadeToggle();
});

// if($('.payment-select-box').is(':checked')) { 
// 	$(this).addClass('active-payment');
// }

$('.payment-select-box').click(function() {
	if($(this).is(':checked')) { 
		$('.single_payment_opt').removeClass('active_payment');
		$(this).parent(".select-item").parent(".single_payment_opt").addClass('active_payment');
	}
 });
// Checkout page ends

// Location Filter Starts
	// $("#filterOptions li:first-child a").click();
	$('#filterOptions li a').click(function() {
		// fetch the class of the clicked item
		var ourClass = $(this).attr('class');
		console.log(ourClass);

		// reset the active class on all the buttons
		$('#filterOptions li').removeClass('active');
		// update the active state on our clicked button
		$(this).parent().addClass('active');

		if(ourClass == 'all') {
			// show all our items
			$('#ourHolder').children('div.item').show();
		}
		else {
			// hide all elements that don't share ourClass
			$('#ourHolder').children('div:not(.' + ourClass + ')').hide();
			// show all elements that do share ourClass
			$('#ourHolder').children('div.' + ourClass).show();
		}
		return false;
	});
// Location Filter Ends











	
	

	
	