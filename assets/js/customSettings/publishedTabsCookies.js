/*
# Author : Mohammed Hayder
# Email	 : Mr.hamood277@gmail.com
# Last Modification: Feb, 2017
*/
$(function () {
	'use strict';

	// Check if Tab has been clicked Before
	var pub = $('.issueAndPublish > .publish'),
			iss = $('.issueAndPublish > .issue');
	if($.cookie('pubTab') == 'publish') {
    $('.pub').addClass('selected').siblings().removeClass('selected');
    pub.show();
    iss.hide();
	} else {
		$('.iss').addClass('selected').siblings().removeClass('selected');
		iss.show();
		pub.hide();
	}
	// Publish Article Tabs
	$('.tabs .publishTab').click(function () {
		// Hide and show div accoring to the selected class
		$(this).addClass('selected').siblings().removeClass('selected');
		$('.issueAndPublish > div').hide();
		$('.' + $(this).data('class')).fadeIn(70);

		var selectedTab = $(this).data('class');
		// Check which tab has been selected
		if(selectedTab == 'publish') {
			selectedTab = 'publish';
		} else if(selectedTab == 'issue') {
			selectedTab = 'issue';
		}
		// Remember Last Clicked Publish Tab
		if($(this).hasClass('selected')) {
      $.cookie('pubTab', selectedTab);
    } else {
      $.cookie('pubTab', selectedTab);
    }
	});
});