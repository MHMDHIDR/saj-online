$(function () {
	'use strict';

	// IntITelInput Trigger
	$("#telephone").intlTelInput({
		// Sudan is the default country
		initialCountry: "sd",
		separateDialCode: true
	});

	// Default value if (+249) Sudan
	if($('#selCountVal').val() == '') {
		$('#selCountVal').val('+249 ');
	}

	// on click change #selCountVal value into the selected number
	$(".country").click(function() {
		$('#selCountVal').val('+' + $(this).attr("data-dial-code") + ' ');
	});
	
});