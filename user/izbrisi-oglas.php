<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");

if(isset($_GET)) {

	$sql = "DELETE FROM oglas WHERE idOglasa='$_GET[id]'";
	if($conn->query($sql)) {
		
		header("Location: moji-oglasi.php");
		exit();
	} else {
		echo "Error";
	}
}