<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");

if(isset($_POST)) {
	
	$nazivOglasa = mysqli_real_escape_string($conn, $_POST['nazivOglasa']);
	$opis = mysqli_real_escape_string($conn, $_POST['opis']);
	$godinaProizvodnje = mysqli_real_escape_string($conn, $_POST['godinaProizvodnje']);
	$marka = mysqli_real_escape_string($conn, $_POST['marka']);
	$predjeniKilometri = mysqli_real_escape_string($conn, $_POST['predjeniKilometri']);
	$cena = mysqli_real_escape_string($conn, $_POST['cena']);
	$vrstaPogona = mysqli_real_escape_string($conn, $_POST['vrstaPogona']);
	$tip = mysqli_real_escape_string($conn, $_POST['tip']);
	$vrstaMenjaca = mysqli_real_escape_string($conn, $_POST['vrstaMenjaca']);
	
	$tmp = $_FILES["slika"]["tmp_name"];
	$tmp2 = $_FILES["slika2"]["tmp_name"];
	$tmp1 = $_FILES["slika1"]["tmp_name"];
	
	$uploadOk = true;

	if(is_uploaded_file ( $tmp)) {

		$folder_dir = "../assets/img/";

		$base = basename($_FILES['slika']['name']); 

		$imageFileType = strtolower(pathinfo($base,PATHINFO_EXTENSION));
		

		$file = uniqid() . "." . $imageFileType; 
		
	  
		$filename = $folder_dir .$file;  

		if(file_exists($_FILES['slika']['tmp_name'])) { 

			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")  {

				if($_FILES['slika']['size'] < 5000000) { // falj manji od 5MB

					//kopiraj fajl sa temp lokacije
					move_uploaded_file($_FILES["slika"]["tmp_name"], $filename);

				} else {
					$_SESSION['uploadError'] = "Pogrešna veličina. Maksimalna dozvoljena veličina: 5MB.";
				//	header("Location: moji-oglasi.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Pogrešan format. Samo .jpg i .png formati dozvoljeni.";
				//header("Location: moji-oglasi.php");
				exit();
			}
		}
	} else {
		$uploadOk = false;
	}
	
	$uploadOk2 = true;

	if(is_uploaded_file ( $tmp2)) {

		$folder_dir2 = "../assets/img/";

		$base2=basename($_FILES['slika2']['name']); 

		$imageFileType2 = strtolower(pathinfo($base2,PATHINFO_EXTENSION));
		

		$file2 = uniqid() . "." . $imageFileType2; 
		
	  
		$filename2 = $folder_dir2 .$file2;  

		if(file_exists($_FILES['slika2']['tmp_name'])) { 

			if($imageFileType2 == "jpg" || $imageFileType2 == "png" || $imageFileType2 == "jpeg")  {

				if($_FILES['slika2']['size'] < 5000000) { // falj manji od 5MB

					//kopiraj fajl sa temp lokacije
					move_uploaded_file($_FILES["slika2"]["tmp_name"], $filename2);

				} else {
					$_SESSION['uploadError'] = "Pogrešna veličina. Maksimalna dozvoljena veličina: 5MB.";
				//	header("Location: moji-oglasi.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Pogrešan format. Samo .jpg i .png formati dozvoljeni.";
				//header("Location: moji-oglasi.php");
				exit();
			}
		}
	} else {
		$uploadOk2 = false;
	}


	$uploadOk1 = true;

	if(is_uploaded_file ( $tmp1)) {

		$folder_dir1 = "../assets/img/";

		$base1 = basename($_FILES['slika1']['name']); 

		$imageFileType1 = strtolower(pathinfo($base1,PATHINFO_EXTENSION));
		

		$file1 = uniqid() . "." . $imageFileType1; 
		
	  
		$filename1 = $folder_dir1 .$file1;  

		if(file_exists($_FILES['slika1']['tmp_name'])) { 

			if($imageFileType1 == "jpg" || $imageFileType1 == "png" || $imageFileType1 == "jpeg")  {

				if($_FILES['slika1']['size'] < 5000000) { // falj manji od 5MB

					//kopiraj fajl sa temp lokacije
					move_uploaded_file($_FILES["slika1"]["tmp_name"], $filename1);

				} else {
					$_SESSION['uploadError'] = "Pogrešna veličina. Maksimalna dozvoljena veličina: 5MB.";
				//	header("Location: moji-oglasi.php");
					exit();
				}
			} else {
				$_SESSION['uploadError'] = "Pogrešan format. Samo .jpg i .png formati dozvoljeni.";
				//header("Location: moji-oglasi.php");
				exit();
			}
		}
	} else {
		$uploadOk1 = false;
	}




	//$companyid=$_GET[id_company];
	
	$sql = "UPDATE oglas SET marka='$marka',nazivOglasa='$nazivOglasa', opis='$opis',godinaProizvodnje='$godinaProizvodnje',predjeniKilometri='$predjeniKilometri', cena='$cena', vrstaPogona='$vrstaPogona', tip='$tip', vrstaMenjaca='$vrstaMenjaca' ";
	
	if($uploadOk == true) {
	$sql = $sql . ", img='$file'"; }
	if($uploadOk1 == true) {
	$sql = $sql . ", img1='$file1'"; }
	if($uploadOk2 == true) {
	$sql = $sql . ", img2='$file2'"; }
	
	$sql = $sql . " WHERE idKorisnika=$_GET[idKorisnika] AND idOglasa=$_GET[id_oglasa]" ;
	
	if($conn->query($sql)===TRUE) {
		//ako je uspesno vrati na prethodnu stranicu
		$_SESSION['jobChangeSuccess'] = true;
		header("Location: moji-oglasi.php");
		exit();
	} else {
		//ako nije uspesno prikazi gresku
		echo "Error ". $sql . "<br>" . $conn->error;
	}

	$conn->close();

} else {
	header("Location: moji-oglasi.php");
	exit();
}