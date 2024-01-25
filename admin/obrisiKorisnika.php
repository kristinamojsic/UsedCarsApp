<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}
;

require_once("../db.php");

if(isset($_GET)) {

    $db = new Db();

	//brisanje korisnika
    $idKorisnika = $_GET['id'];
	if($db->izbrisiKorisnika($idKorisnika)) {
		header("Location: sviKorisnici.php");
		exit();
		//echo "Obrisan";
	} else {
		echo "Error";
	}
}