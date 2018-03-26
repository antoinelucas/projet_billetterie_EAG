<?php
	if(session_status() == PHP_SESSION_NONE){

		session_start();
	}

	include_once ('presentation/header.php');
	include_once('presentation/selection_match.php');
	include_once ('presentation/footer.php');
?>
