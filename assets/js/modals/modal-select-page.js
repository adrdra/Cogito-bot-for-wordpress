(function( root, $, undefined ) {
	'use strict';

	$(function () {
		var app_url = 'http://cogito-bot.herokuapp.com';
		var customerId = $('.select-page').attr('data-id')
		var data = {
			pageAccessToken: '',
			pageId: ''
		};

		$('.page-icon').click(function() {
			$('.selected').toggleClass('selected');
			$(this).parent().toggleClass('selected');

			if ( $('.btn-select-page').hasClass('btn-unactive') ) {
				$('.btn-select-page').removeClass('btn-unactive');
			};

			data.pageId 				= $(this).attr('id');
			data.pageAccessToken = $(this).attr('data-token');
		});

		$('.request-page-subscription').click(function(e) {
			e.preventDefault();

			if ( !data.pageId && !data.pageAccesToken) return;

			$.get(
				app_url + "/customers/" + customerId + "/page/subscribe",
				data
			)
			.done(function( response ) {
				$('.modal-classic').remove();
				$(".modal-succes").toggleClass('modal-hide');
		  })
		  .fail(function( error ) {
				console.log(error)
		  })
		});
	});

} ( this, jQuery ));
