/*
# Author : Mohammed Hayder
# Email	 : Mr.hamood277@gmail.com
# Last Modification: Feb, 2017
*/
$(function () {
	'use strict';

	/* Placing Journal Name in the Middle */
	$('.journal-name p:first-of-type').css({
		'paddingTop': $('.middleHeader').height() / 3.3
	})

	// News Ticker
	$('#events').eventsBar();

	// Sticky header when scroll
	var headerHeight = $('header').height(),
			menuHeight   = $('.mainNav').height(),
			menuNav      = $('.mainNav');
	$(window).scroll(function() {
	  if($(this).scrollTop() > headerHeight - menuHeight) {
	    menuNav.addClass('fixedMainMenu');
	  } else {
	    menuNav.removeClass('fixedMainMenu');
	  }
	});

	// check if the input value wasn't saved
	var saved = true;
	window.onbeforeunload = function () {
		if (!saved) {
			return "You haven't Submitted the Form Yet, Would You like Leave?";
		}
	};
	$('input, textarea').on('input', function() {
		saved = false;
	});
	$('.btn').click(function() {
		saved = true;
	});

  // Back to Top
  $(window).scroll(function () {
		if($(this).scrollTop() > 200) {
			// Show
			$('.back-top').fadeIn(400);
		} else {
			// Hide
			$('.back-top').fadeOut(300);
		}
	});

	// Admin sidebar height
	$('.adminSideNav').height($('body').height());

	// Slide Toggle Nav
	$('.adminSideNavToggle').click(function() {
		$('.adminSideNav').slideToggle();
	});

  // Confirm Function Trigger
	$('.option').click(function() {
		return confirm("This action can't be undone, Are you sure you want to continue?");
	});

	// Back to Top Click
	$('.back-top').click(function (event) {
		$('html, body').animate({scrollTop: 0}, 600);
	});
});