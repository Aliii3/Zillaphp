(function ($) {
	$(document).ready(function () {
		$('.partners .partners-slider').slick({
			infinite: true,
			accessibility: true,
			autoplay: true,
			autoplaySpeed: 3000,
			speed: 500,
			arrows: false,
			dots: false,
			slidesToShow: 5,
			slidesToScroll: 1,
			centerMode: true,

			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
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
						autoplay: true,
						centerMode: true,
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	});
})(jQuery);
