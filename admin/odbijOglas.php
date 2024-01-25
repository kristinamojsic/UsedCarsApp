<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../db.php");

if(isset($_GET)) {

	$db = new Db();
	
	if($db->odbijOglas($_GET['id'])) {
		header("Location:sviOglasi.php");
		exit();
	} else {
		echo "Error";
	}
}