<?php
	// Connecting variables
	$dsn			= 'mysql:host=localhost;dbname=u376874932_sudanacaj';
	$dbuser		= 'u376874932_sudanacajus';
	$password = '5JRStg@p~U';
	$options 	= array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
	
	try {
		$con = new PDO($dsn, $dbuser, $password, $options);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		require_once 'includes/layouts/public/alert.php';
		alert(
			'Sorry, Something went wrong while connecting to the database, Error Code:<br>
			<b>'.$e->getMessage().'</b>',
			'danger',
			'no-radius',
			true
		);
	}