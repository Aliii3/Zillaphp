(function ($) {
	$(document).ready(function () {
	  	$('.cat-list_item').on('click', function(e) {
			e.preventDefault();

			$('.cat-list_item').removeClass('active');
			$(this).addClass('active');

			let category =  $(this).data('slug');
			let year =  $('#year_filter').val();
			let month =  $('#month_filter').val();

			console.log(year);
			
			$.ajax({
				url: data.ajax_url1,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_reports',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination)
				}
			})
		});


		$('#year_filter, #month_filter').on('change', function(e){
			e.preventDefault();
			let category =  $('.cat-list_item.active').data('slug');
			let year =  $('#year_filter').val();
			let month =  $('#month_filter').val();

			console.log(year);

			$.ajax({
				url: data.ajax_url2,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_reports',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					console.log(response);
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination);
				}
			})
		});

		// insights

		$('.cat-list_item_insight').on('click', function(e) {
			e.preventDefault();

			$('.cat-list_item_insight').removeClass('active');

			$(this).addClass('active');

			let category =  $(this).data('slug');
			let year =  $('#year_filter_insights').val();
			let month =  $('#month_filter_insights').val();
			
			console.log(year);
			$.ajax({
				url: data.ajax_url3,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_insights',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination)
				}
			})
		});


		$('#year_filter_insights, #month_filter_insights').on('change', function(e){
			e.preventDefault();
			let category =  $('.cat-list_item_insight.active').data('slug');
			let year =  $('#year_filter_insights').val();
			let month =  $('#month_filter_insights').val();
			console.log(year);
			$.ajax({
				url: data.ajax_url4,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_insights',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination);
				}
			})
		});

		// blogs

		$('.cat-list_item_blog').on('click', function(e) {
			e.preventDefault();

			$('.cat-list_item_blog').removeClass('active');

			$(this).addClass('active');

			let category =  $(this).data('slug');
			let year =  $('#year_filter_blogs').val();
			let month =  $('#month_filter_blogs').val();

			$.ajax({
				url: data.ajax_url5,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_blogs',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination)
				}
			})
		});


		$('#year_filter_blogs, #month_filter_blogs').on('change', function(e){
			e.preventDefault();
			let category =  $('.cat-list_item_blog.active').data('slug');
			let year =  $('#year_filter_blogs').val();
			let month =  $('#month_filter_blogs').val();

			$.ajax({
				url: data.ajax_url,
				type: 'POST',
				dataType: 'html',
				data: {
					action: 'filter_blogs',
					category: category,
					year: year,
					month: month
				},
				success: function(response) {
					let data_parsed = JSON.parse(response);
					$('.reports_data').html(data_parsed.data);
					$('.custom_pagination .container').html(data_parsed.pagination);
				}
			})
		});


		/**
		 * DOMSUbtreeModifieed is Deprecated
		 * Potential Error need to be Modifeied and replaced with MutationObserve
		 */

		/* insights pagination ajax */
		$('.custom_pagination').on('DOMSubtreeModified', function(){
			$('.ajax_pagination li a').on('click',function(e) {
				console.log($(this));
				e.preventDefault(); // don't trigger page reload
				if($(this).hasClass('current')) {
					e.preventDefault();
					return; // don't do anything if click on current page
				}

				// get current page data
				let current_page_data = $('.ajax_pagination li .current').html();

				// replace default first page with link default is li>span
				$('.ajax_pagination li .current').parent().html(`<a href="${data.ajax_url}/page/${current_page_data}">${current_page_data}</a>`)
				// add current class to the current pagination link
				$(this).addClass('current')
				let requested_page_arr = $(this).attr('href').split('/');
				let requested_page_num = requested_page_arr[requested_page_arr.length - 2]

				let category =  $('.cat-list_item_insight.active').data('slug');
				let year =  $('#year_filter_insights').val();
				let month =  $('#month_filter_insights').val();
				console.log(year);
				$.ajax({
					url: data.ajax_url,
					type: 'POST',
					dataType: 'html',
					data: {
						action: 'ajax_pagination',
						category: category,
						year: year,
						month: month,
						page: requested_page_num,
						posts_per_page: 6
					},
					success: function(response) {
						let data_parsed = JSON.parse(response);
						$('.reports_data').html(data_parsed.data);
						$('.custom_pagination .container').html(data_parsed.pagination);
					}
				})
			});
		});

		/* Reports */

		$('.custom_pagination').on('DOMSubtreeModified', function(){
			$('.ajax_pagination_reports li a').on('click',function(e) {
				e.preventDefault(); // don't trigger page reload
				if($(this).hasClass('current')) {
					return; // don't do anything if click on current page
				}
				// get current page data
				let current_page_data = $('.ajax_pagination_reports li .current').html();

				// replace default first page with link default is li>span
				$('.ajax_pagination_reports li .current').parent().html(`<a href="${data.ajax_url}/page/${current_page_data}">${current_page_data}</a>`)
				// add current class to the current pagination link
				$(this).addClass('current');

				let requested_page_arr = $(this).attr('href').split('/');
				let requested_page_num = requested_page_arr[requested_page_arr.length - 2]

				// get filter data
				let category =  $('.cat-list_item.active').data('slug');
				let year =  $('#year_filter').val();
				let month =  $('#month_filter').val();

				// make ajax request
				$.ajax({
					url: data.ajax_url,
					type: 'POST',
					dataType: 'html',
					data: {
						action: 'ajax_pagination_reports',
						category: category,
						year: year,
						month: month,
						page: requested_page_num,
						posts_per_page: 6
					},
					success: function(response) {
						let data_parsed = JSON.parse(response);
						$('.reports_data').html(data_parsed.data);
						$('.custom_pagination .container').html(data_parsed.pagination);
					}
				})
			});
		});
	});
})(jQuery);