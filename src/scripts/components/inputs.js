(function ($) {
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
