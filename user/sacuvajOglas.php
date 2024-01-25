<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");

$idKorisnika = $_SESSION['autorizovan'];
$idOglasa = $_GET['idOglasa'];

$db = new Db();
if($db->proveriSacuvane($idKorisnika,$idOglasa))
{
  if($db->dodajSacuvani($idKorisnika,$idOglasa))
  {
      header("Location: sacuvaniOglasi.php");
  }
  else
  {
      header("Location: sacuvaniOglasi.php");
  }
}
else
{
  header("Location: sacuvaniOglasi.php");
}

?>