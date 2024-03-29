(function( root, $, undefined ) {
	"use strict";

	$(function () {

		$('.modal-mask').animate({
			opacity: ".3"
		}, function() {
			$('.modal').animate({
				top: "50%"
			}, 50);
			setTimeout(function() {
				$('.modal').animate({
					opacity: 1
				}, 200);
			}, 100);
		});

		$('.modal-mask, .close-modal, .finish').click(function() {
			$('.modal').animate({ opacity: 0 }, 300, function() {
				$('.modal-mask').animate({
					opacity: "0"
				}, 300, function() {
					$('.modal, .modal-mask').remove();
				});
			});
		});

		$('.a-unsubscribe').click(function(e) {
			e.preventDefault();
			$.get('../wp-json/cogito-plugin/unsubscribe-app')
				.done(function(e) {
					window.location.replace('admin.php?page=cogito-admin-page.php');
				})
				.fail(function(err) {
					console.log(err)
				})
		})
	});

} ( this, jQuery ));
