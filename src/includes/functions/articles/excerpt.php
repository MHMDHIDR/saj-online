<?php
	function excerpt($text, $url, $more, $length) {
		global $short;
		$short = mb_substr($text, 0, $length);
		if($short != $text) {
	    $lastspace = strrpos($short, ' ');
	    $short = substr($short, 0, $lastspace);
	    if(!$more) {
        $more = "Read Full Article";
	    }
	    $short .= "... <a href='$url'>$more</a>";
		}
		chkTxtDir($short);
	} 