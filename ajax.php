<?php
	session_start();
	require_once("class/database.php");
	require_once("class/user.php");

	$db = new Database();
	$user = new User();
	if ($user->isAdmin()){
		$output = array();
		if (file_exists("ajax/".$_REQUEST['a'].".php")){
			require("ajax/".$_REQUEST['a'].".php");
		} else {
			$output['err'][] = "Invalid or no action specified.";
		}
		echo json_encode($output);
	}
