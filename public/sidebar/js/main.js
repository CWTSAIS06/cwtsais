(function($) {

	// "use strict";
	//
	// var fullHeight = function() {
	//
	// 	$('.js-fullheight').css('height', $(window).height());
	// 	$(window).resize(function(){
	// 		$('.js-fullheight').css('height', $(window).height());
	// 	});
	//
	// };
	// fullHeight();
	//
	// $('#sidebarCollapse').on('click', function () {
  //     $('#sidebar').toggleClass('active');
  // });
var trigger = $('.hamburger'),
			overlay = $('.overlay'),
		 isClosed = false;

		trigger.click(function () {
			hamburger_cross();
		});

		function hamburger_cross() {

			if (isClosed == true) {
				overlay.hide();
				trigger.removeClass('is-open');
				trigger.addClass('is-closed');
				isClosed = false;
			} else {
				overlay.show();
				trigger.removeClass('is-closed');
				trigger.addClass('is-open');
				isClosed = true;
			}
	}

	$('[data-toggle="offcanvas"]').click(function () {
				$('#wrapper').toggleClass('toggled');
	});
});
