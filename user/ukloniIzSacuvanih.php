<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}


require_once("../db.php");
$db = new Db();
if($db->obrisiSacuvani($_SESSION['autorizovan'],$_GET['idOglasa']))
{
    header("Location: sacuvaniOglasi.php");
    exit();
}
else
{
    header("Location: sacuvaniOglasi.php");
    exit();
}
?>

