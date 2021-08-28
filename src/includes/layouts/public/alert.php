<?php
	// The message that will display to the user
	$msg = '';
	// The type of the alert [success - info - warning - danger]
	$type = '';
	// Additional Classes that will add more customization the alert
	$addClass = '';
	// Dismissible alert class if (false) then don't echo the button
	$dismissible = true;
	function alert($msg, $type, $addClass, $dismissible) { echo '
		<br>
		<div class="alert alert-' . $type . '';
			// Classes
			echo ($dismissible == true) ? ' alert-dismissible':'';
			echo !empty($addClass)?' '.$addClass:$addClass;
			echo '" role="alert">';
			// Button
			echo ($dismissible == true) ? '
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			  </button>':$dismissible = false;
		  // Message
			echo $msg . '
	  </div><br>';
	}