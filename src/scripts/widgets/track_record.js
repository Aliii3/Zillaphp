(function($){
	$(document).ready(function(){

		let categories_tabs = $('.categories_tabs');

		if(categories_tabs){

			/**
			 * initialize_track_record
			 * @param {}
			 * add active class for the first list item
			 * add text of the active category to the active_category_heading class
			 * hide the rest of items
			 * show the active item
			 *
			 * @returns void
			 */
			function initialize_track_record(){

				if(categories_tabs.length > 0){
					$('.categories_tabs li:first-child').addClass('active');

					$('.active_category_heading').text($('.categories_tabs li:first-child')[0].innerText);

					$(`.track_record_wrapper`).css({
						display: 'none'
					})
					$(`.track_record_wrapper.${$('.categories_tabs li:first-child').attr('data-filter')}`).css({
						display: 'block'
					})
				}
			}

			/**
			 * call active first category
			 */
			initialize_track_record();

			$('.categories_tabs li').click(function(e){
				$(this).addClass('active').siblings().removeClass('active');

				$('.active_category_heading').text(e.target.innerText);

				var filtered_item = $(this).attr('data-filter');
				$(`.track_record_wrapper`).css({
					display: 'none'
				})
				$(`.track_record_wrapper.${filtered_item}`).css({
					display: 'block'
				})
			})
		}
	})
})(jQuery);
