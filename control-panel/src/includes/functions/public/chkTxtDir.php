<?php
/*
	Check Text Language Then Decide the Direction of it based on the Language [Arabic or English]
*/
function chkTxtDir($theText) {
	// Checking
	// Reference: https://www.daniweb.com/programming/web-development/threads/475975/php-pattern-to-validate-url-in-english-and-arabic
	if (preg_match_all('/[\p{Arabic}]/u', $theText)) {
		echo '<div class="rtl">'.$theText.'</div>';
	} else {
		echo $theText;
	}
}