(function($){
	$(document).ready(function(){

		$.fn.extend({
			toggleHTML: function(a, b){
				return this.html(this.html() == b ? a : b);
			}
		});

		let view_more_btns = $('.view-more-btn');
		// let view_more_btns_arr = Array.from(view_more_btns);

		let view_more_btns_ids = [];


		$.each(view_more_btns,(key, element) => {
			console.log(element);
			let element_id = $(element).attr('id');
			view_more_btns_ids.push(element_id);
		});

		if(view_more_btns_ids){
			$.each(view_more_btns_ids, function(key, value){
				if (value){

					$(`.view-more-btn#${value}`).html(`View More <img src="${data.theme_url}/dist/images/right-arrow-colored.svg" alt="view more icon">`);
					$(`.view-more-btn#${value}`).on('click', function(){
						$(`div#${value}`).toggleClass('content-hidden');
						$(`.view-more-btn#${value}`).toggleHTML(`View More <img src="${data.theme_url}/dist/images/right-arrow-colored.svg" alt="view more icon">`,`View Less <img src="${data.theme_url}/dist/images/right-arrow-colored.svg" alt="view more icon">`);
						$(this).parent().toggleClass('view-less')
					})
				}
			})
		}
	})
})(jQuery);
