/*
# Author : Mohammed Hayder
# Email	 : Mr.hamood277@gmail.com
# Last Modification: Feb, 2017
*/
$(function () {
	'use strict';

	var sections = document.querySelectorAll(".row-temp .categoryInfo") || [],
	rows = [
		document.getElementById("row-1"),
		document.getElementById("row-2")
	],
	i,
	temp;
	for (i = 0; i < sections.length; i += 1) {
		temp = [
			rows[0].clientHeight,
			rows[1].clientHeight
		];
		rows[
			temp.indexOf(Math.min.apply(Math, temp))
		].appendChild(sections[i]);
	}
});