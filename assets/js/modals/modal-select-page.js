(function( root, $, undefined ) {
	"use strict";

	$(function () {
		var data = {
			pageId: '',
			pageAccesToken: ''
		};

		$('.page-icon').click(function() {
			$(".selected").toggleClass("selected");
			$(this).parent().toggleClass("selected");

			if ( $('.btn-select-page').hasClass('btn-unactive') ) {
				$('.btn-select-page').removeClass('btn-unactive');
			};

			data.pageId 				 = $(this).attr("id");
			data.pageAccesToken = $(this).attr("data-token");
		});

		$('.request-page-subscription').click(function(e) {
			e.preventDefault();

			if ( !data.pageId && !data.pageAccesToken) return;

			console.log("ok");
		});
	});

} ( this, jQuery ));
