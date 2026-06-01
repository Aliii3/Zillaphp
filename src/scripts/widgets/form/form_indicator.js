(function ($) {
	$(document).ready(function () {

		/**
		 * scroll to specific section
		 * 100px are reserved for 'navbar' height
		 * @param {string} element_id target section id
		 */
		function scroll_to_section(element_id) {
			let elem = document.getElementById(element_id);

			// elem.scrollIntoView();
			let offsetTopValue = elem.getBoundingClientRect().top + window.scrollY - 100;

			$('html, body').animate({
				scrollTop: offsetTopValue,
			}, 'slow');
		}

		let navigation_list = document.querySelectorAll('aside.form_indicator ul li');

		if (navigation_list) {
			let navigation_list_array = Array.from(navigation_list);

			navigation_list_array.map(element => {
				element.addEventListener('click', function () {
					// find current active link and remove active class from it
					navigation_list_array.find(function (active_link) {
						active_link.classList.remove('active')
					})

					// add active class to target link
					element.classList.add('active');

					let target_section = element.getAttribute('data-section');

					// scroll to the target section
					scroll_to_section(target_section);
				})
			});


			// scroll handler

			let delay = null;
			let sections = $('.card')

			$(document).on("scroll", function () {

				if (!isNaN(delay)) {
					clearTimeout(delay);
				}

				delay = setTimeout(checkVisibleSection, 100);
			});

			//---Check the visible section
			function checkVisibleSection() {

				var minor = window.innerHeight,
					section = null;

				//---Select the section closest to the top
				[].forEach.call(sections, function (item) {
					var offset = item.getBoundingClientRect();

					// if ((Math.abs(offset.top) - 100) < minor) {
					if (Math.abs(offset.top) < minor) {

						minor = Math.abs(offset.top);
						section = item;
					}
				});

				//---If the section exists
				if (section) {
					var index = section.id,
						link = $("li[data-section='" + index + "']");

					//---If the link is not already active
					if (!link.hasClass("active")) {
						//---Remove the active class
						$("li.active").removeClass("active");

						//---Add the active class
						link.addClass("active");
					}
				}
			}
		}


		// let card_headers = $('.card-header');

		// $.each(card_headers, function(index, element){
		// 	$(element).on('click', function(){
		// 		// Wait 1 second after open/collapse the card
		// 		setTimeout(()=>{
		// 			let element_id = $(element).parent().attr('id');

		// 			let elem = document.getElementById(element_id);
		// 			let offsetTopValue = elem.getBoundingClientRect().top + window.scrollY - 150;

		// 			$('html, body').animate({
		// 				scrollTop: offsetTopValue,
		// 			}, 'slow');
		// 		}, 350)
		// 	})
		// })

		document.addEventListener( 'wpcf7invalid', function( event ) {
			$('.wpcf7-response-output').removeClass('alert-success');
			$('.wpcf7-response-output').addClass('alert-danger');
			$('#submit').attr('disabled', false)
		}, false );
		document.addEventListener( 'wpcf7spam', function( event ) {
			$('.wpcf7-response-output').removeClass('alert-danger alert-success');
			$('.wpcf7-response-output').addClass('alert-warning');
			$('#submit').attr('disabled', false)
		}, false );
		document.addEventListener( 'wpcf7mailfailed', function( event ) {
			$('.wpcf7-response-output').removeClass('alert-danger alert-success');
			$('.wpcf7-response-output').addClass('alert-warning');
			$('#submit').attr('disabled', false)
		}, false );
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			$('.wpcf7-response-output').removeClass('alert-danger');
			$('.wpcf7-response-output').addClass('alert-success');
			$('.file_input').removeClass('has_file').find('.file_input_name').html(`<span>No File Chosen</span>`).css({
				justifyContent: 'center',
				zIndex: 0
			});
			$('#submit').attr('disabled', false)
		}, false );

		$('.wpcf7-form').on('submit', function(){
			$('#submit').attr('disabled', true)
		})
	})
})(jQuery);