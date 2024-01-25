<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");

if(isset($_POST)) {

	$ime = mysqli_real_escape_string($conn, $_POST['ime']);
	$prezime = mysqli_real_escape_string($conn, $_POST['prezime']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$broj = mysqli_real_escape_string($conn, $_POST['broj']);
	//$sifra = mysqli_real_escape_string($conn, $_POST['sifra']);
	//$sifra = base64_encode(strrev(md5($sifra)));

	$uploadOk = true;

	if(is_uploaded_file ( $_FILES['image']['tmp_name'] )) {

		$folder_dir = "../uploads/logo/";

		$base = basename($_FILES['image']['name']); 

		$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 

		$file = uniqid() . "." . $imageFileType; 
	  
		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['image']['tmp_name'])) { 

			if($imageFileType == "jpg" || $imageFileType == "png")  {

				if($_FILES['image']['size'] < 5000000) { // falj manji od 5MB

					//kopiraj fajl sa temp lokacije
					move_uploaded_file($_FILES["image"]["tmp_name"], $filename);

				} else {
					$_SESSION['uploadError'] = "Pogrešna veličina. Maksimalna dozvoljena veličina: 5MB.";
					header("Location: izmeni.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Pogrešan format. Samo .jpg i .png formati dozvoljeni.";
				header("Location: izmeni.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}

	

	//azuriraj detalje
	$sql = "UPDATE korisnik SET ime='$ime', prezime='$prezime', email='$email', broj='$broj'";
/*
	if($uploadOk == true) {
		$sql = $sql . ", slika='$file'";
	}*/

	$sql = $sql . " WHERE idKorisnika='$_SESSION[autorizovan]'";

	if($conn->query($sql) === TRUE) {
		//ako je uspesno izvrseno vrati na pocetnu.
		header("Location: profil.php");
		exit();
	} else {
		echo "Error ". $sql . "<br>" . $conn->error;
	}
	$conn->close();

} else {
	header("Location: izmeni.php");
	exit();
}