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
