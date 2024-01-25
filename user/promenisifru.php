<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}
require_once("../db.php");
$db = new Db();
//require_once("../db2.php");

if(isset($_POST)) {

	//$sifra = mysqli_real_escape_string($conn, $_POST['sifra']);
	$sifra = $_POST['sifra'];
	$idKorisnika = $_SESSION['autorizovan'];

	//enkripcija lozinke
	//$sifra = base64_encode(strrev(md5($sifra)));

	//sql query za proveru logovanja
	//$sql = "UPDATE korisnik SET sifra='$sifra' WHERE idKorisnika='$_SESSION[autorizovan]'";
	
	if($db->izmeniSifruKorisnika($idKorisnika,$sifra)) {
		header("Location: profil.php");
		exit();
	} else {
		echo "<p style='color:red'>Nije moguće promeniti lozinku.</p>";
	}

 	

} else {
	header("Location: podesavanja.php");
	exit();
}