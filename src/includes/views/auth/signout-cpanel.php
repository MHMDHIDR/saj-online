<?php
	// Sign out and destroy all sessions
	session_start();
	unset($_SESSION['uname']);
	header('Location: index');
	exit();