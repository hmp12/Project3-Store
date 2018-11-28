<?php
	session_start();
	
	$id = $_POST['id'];
	
	if ($id < 1) {
		$_SESSION['products'][0] = $_SESSION['products'][1];
	}
	if ($id < 2) {
		$_SESSION['products'][1] = $_SESSION['products'][2];
	}

	$_SESSION['products'][2] = null;
?>