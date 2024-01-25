<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");

if(isset($_POST)) {

	$email = mysqli_real_escape_string($conn, $_POST['email']);

	//sql query za proveru logovanja
	$sql = "UPDATE korisnik SET email='$email' WHERE idKorisnika='$_SESSION[autorizovan]'";
	if($conn->query($sql) === true) {
		header("Location: profil.php");
		exit();
	} else {
		echo $conn->error;
	}

 	$conn->close();

} else {
	header("Location: podesavanja.php");
	exit();
}