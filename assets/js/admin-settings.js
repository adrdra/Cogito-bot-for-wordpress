
(function( root, $, undefined ) {
	"use strict";

	$(function () {
    var heightLimit = $('.cogito-banner').height() - $('#wpfooter').height();
    var panelHeight = $(window).height() - heightLimit;

    $('.cogito-panel').css({
      minHeight: panelHeight
    });
    
	});

} ( this, jQuery ));
