<?php
	// Sign out and destroy all sessions
	session_start();
	unset($_SESSION['uname']);
	header('Location: '.$_SERVER['HTTP_REFERER']);
	exit();