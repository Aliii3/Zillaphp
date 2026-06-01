var prevScroll = window.scrollY || document.documentElement.scrollTop;
var curScroll;
var direction = 0;
var prevDirection = 0;

var header = document.getElementById('site-header');

var checkScroll = function () {

	/*
	** Find the direction of scroll
	** 0 - initial, 1 - up, 2 - down
	*/

	curScroll = window.scrollY || document.documentElement.scrollTop;
	if (curScroll > prevScroll) {
		//scrolled up
		direction = 2;
	} else if (curScroll < prevScroll) {
		//scrolled down
		direction = 1;
	}

	if (direction !== prevDirection) {
		toggleHeader(direction, curScroll);
	}

	if (window.scrollY == 0) {
		header.classList.remove('show');
	}

	prevScroll = curScroll;
};

var toggleHeader = function (direction, curScroll) {

	let form_card_header = document.querySelectorAll('.form_wrapper .card .card-header');
	if (direction === 2 && curScroll > 52) {

		//replace 52 with the height of your header in px

		header.classList.add('hide');
		header.classList.remove('show');
		prevDirection = direction;

		if(form_card_header){
			let form_card_header_arr = Array.from(form_card_header);
			form_card_header_arr.map(function(card_header){

				card_header.classList.remove('with_nav')
			})
		}

	} else if (direction === 1) {
		header.classList.remove('hide');
		header.classList.add('show');
		prevDirection = direction;
		if(form_card_header){
			let form_card_header_arr = Array.from(form_card_header);
			form_card_header_arr.map(function(card_header){

				card_header.classList.add('with_nav')
			})
		}
	}
};

window.addEventListener('scroll', checkScroll);

jQuery(window).load(function () {
    curScroll = window.scrollY || document.documentElement.scrollTop;

	if (curScroll>0) {
		header.classList.add('hide');
		header.classList.remove('show');
	}
});

// Passive event listeners
jQuery.event.special.touchstart = {
	setup: function( _, ns, handle ) {
			this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
	}
};
jQuery.event.special.touchmove = {
	setup: function( _, ns, handle ) {
			this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
	}
};