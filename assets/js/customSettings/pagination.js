/*
# Author : Mohammed Hayder
# Email	 : Mr.hamood277@gmail.com
# Last Modification: Feb, 2017
# Pagination JS
# This Pagination Works only on Published Articles Tab for Now.
*/
$(function () {
	'use strict';
	// The Elements that will be paginated
	var pageParts = $('.paginatedElements'),
			// Numbers (Quantity) of Elements to Paginate
			numPages = pageParts.length,
			// Elements PerPage
			perPage = 20;
	// Hide the data that shouldn't be shown
	pageParts.slice(perPage).hide();
	// If the number of elements if greater than pages number, then run the code 
	if(numPages >= perPage) {
		$('.paginate').pagination({
		  items: numPages,
		  itemsOnPage: perPage,
		  listStyle: 'pagination',
		  onPageClick: function(pageNum) {
	      var start = perPage * (pageNum - 1);
	      var end = start + perPage;
	      pageParts.hide().slice(start, end).show();
		  }
		});
	} else {
		// Else then remove the navigator from the DOM
		$('.paginate').remove();
	}
});