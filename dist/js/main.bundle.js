(function($){
	$(document).ready(function(){
		$('.burger-button').on('click', function(){
			$('.side_navigation').toggleClass('open');
			$(document.body).toggleClass('hidden_body')

		});

		$('.side_navigation .overlay').on('click', function(){
			$('.side_navigation').toggleClass('open');
			$(document.body).toggleClass('hidden_body')
		})

		$('.side_navigation  a[href]').each(function(index, element){
			$(element).on('click', function(){
				$('.side_navigation').toggleClass('open');
				$(document.body).toggleClass('hidden_body');
			})
		})


		$('.menu-item-has-children').on('click', function(){
			$('.menu-item-has-children').removeClass('open');
			$(this).toggleClass('open');
		})
	})
})(jQuery);
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
};(function ($) {
	$(document).ready(function () {

		if($('.form_wrapper')){
			let inputs = $('.form_wrapper input');

			let text_areas = $('.form_wrapper textarea');

			if(inputs){
				inputs.each(function() {
					$(this).hover(function(){
						$(this).parent().siblings('label').addClass('active');
					}, function(){
						if(!$(this).is(':focus')){
							$(this).parent().siblings('label').removeClass('active');
						}
					})

					$(this).on('focus', function(){
						$(this).parent().siblings('label').addClass('active');
					})

					$(this).on('blur', function(){
						$(this).parent().siblings('label').removeClass('active');
					})
				});
			}
			if(text_areas){
				text_areas.each(function() {
					$(this).hover(function(){
						$(this).parent().siblings('label').addClass('active');
					}, function(){
						if(!$(this).is(':focus')){
							$(this).parent().siblings('label').removeClass('active');
						}
					})

					$(this).on('focus', function(){
						$(this).parent().siblings('label').addClass('active');
					})

					$(this).on('blur', function(){
						$(this).parent().siblings('label').removeClass('active');
					})
				});
			}
		}

		let numeric_numbers = $('[type="number"]');

		$.each(numeric_numbers, function(index, field){
			$(field).on('keydown', function(event){
				var charCode = event.code;

				if (charCode == 'Backspace' || charCode == 'Tab') {
					return
				} else {
					var numbers = /^[0-9._\b]+$/;
					if(!event.key.match(numbers)){
						event.preventDefault();
						return false;
					}
					return true;
				}
			})
		})
	})
})(jQuery);
(function ($) {
	$(document).ready(function () {
		$('body').on('change', '.file_input input', function (e) {
			e.preventDefault()
			let file_name = e.currentTarget.files[0].name;

			let extension = file_name.substring(file_name.lastIndexOf('.') + 1);

			let cuted_name;
			let displayed_name;

			if(file_name.length > 18){
				cuted_name = file_name.substring(0, 18);
			}

			if (cuted_name){
				displayed_name = cuted_name+'...'+extension;
			} else {
				displayed_name = file_name;
			}

			if (e.currentTarget.files[0]) {
				$(e.currentTarget)
					.parents('.file_input')
					.addClass('has_file')
					.find('.file_input_name')
					.html(`
						<span>${displayed_name}</span>
						<img src="${data.theme_url}/dist/images/close-circle-icon.svg" alt="delete file icon" class="delete_file_icon"/>
					`)
					.css({
						justifyContent: 'space-between',
						zIndex: 1
					});
			} else {
				$(e.currentTarget).parents('.file_input').removeClass('has_file').find('.file_input_name').text("No File Chosen");
			}

			if($('.delete_file_icon')){
				$('.delete_file_icon').on('click', function(e){
					$(this).parents('.file_input').find('input[type=file]').val('');
					$(this).parents('.file_input').removeClass('has_file').find('.file_input_name').html(`<span>No File Chosen</span>`).css({
						justifyContent: 'center',
						zIndex: 0
					})
				})
			}
		})

		var input_files = [
			'a-file-1',
			'a-file-2',
			'a-file-3',
			'a-file-4'
		];

		if(input_files){
			$.each(input_files, function(index, element){
				$(`[name=${element}]`).on('change', function(){
					var note = $(`[name=${element}]`).parents('.file_input').siblings('p').children('.field_error_message');

					var validExtensions = ["pdf","jpg","gif","png","docx", 'pptx']
					var file = $(this).val().split('.').pop().toLowerCase();
					console.log(this.files[0].size);
					if (validExtensions.indexOf(file) == -1) {
						$(note).html("Only formats are allowed : "+validExtensions.join(', '))

					} else {
						$(note).html('')
						var file_size = ((this.files[0].size/1024)/1024).toFixed(4); // MB

						let size_in_numbers = parseFloat(file_size)

						if ( size_in_numbers > 2) {
							$(note).text("file size is too large max file size is 2 MB");
							// $('#submit').attr("disabled", true);
						} else {
							$(note).html('');
							// $('#submit').attr("disabled", false);
						}
					}
				})
			})
		}

		$('#upload_cv').on('change', function(){
			var note = $('.file_size_validation');

			var file_size = ((this.files[0].size/1024)/1024).toFixed(4); // MB

			let size_in_numbers = parseFloat(file_size)

			let submit_btn = $('#app_submit');
			if ( size_in_numbers > 2) {
				$(note).text("file size is too large max file size is 2 MB");

				setTimeout(()=>{

					$('#sjb-form-padding-button button').attr("disabled", true);
				}, 200)
			} else {
				$(note).html('');
				$('#sjb-form-padding-button button').removeAttr("disabled");
			}

		})
	})
})(jQuery);
(function () {
	function applyBackdrop() {
		var selectors = [
			'.section_subtitle',
			'.hero-with-text-left-image-right .title',
			'.content_with_image .section_title',
			'.internal_page_header h2'
		];

		selectors.forEach(function (selector) {
			document.querySelectorAll(selector).forEach(function (el) {
				if (!el.dataset.backdrop) {
					var text = el.textContent.trim().replace(/\s+/g, ' ');
					if (text) {
						el.setAttribute('data-backdrop', text);
					}
				}
			});
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', applyBackdrop);
	} else {
		applyBackdrop();
	}
})();
