(function ($, window, document, undefined) {

    $(document).on('click', '.people-tab', function (e) {
        e.preventDefault();
        $('.container .nav-tabs li').removeClass('active');
     		$('.container .nav-tabs li').removeClass('shadowTabsItem');          
			$(this).addClass('active');  
			$(this).addClass('shadowTabsItem');
		
			$(this.parentElement).toggleClass('active'); 
			
			var id = $(this).attr('id');
			$('.tab-pane').hide();
			$('.'+id+'.tab-pane').show();
    });
}(jQuery, window, document, undefined));
