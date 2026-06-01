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
