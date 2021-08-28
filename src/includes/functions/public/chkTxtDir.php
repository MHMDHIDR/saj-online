<?php
/*
	Check Text Language Then Decide the Direction of it based on the Language [Arabic or English]
*/
function chkTxtDir($theText) {
	// Checking
	if (preg_match('/^[ا-ي]/', $theText)) { /* old : if (ereg('^[ا-ي]', $theText)) */
		echo '<div class="rtl">'.$theText.'</div>';
	} else {
		echo $theText;
	}
}