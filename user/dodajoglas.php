<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");

if(isset($_POST)) {
	

	//za greske prilikom uploada
	$uploadOk = 1;
	$uploadOk1 = 1;
	$uploadOk2 = 1;


//folder za cuvanje slika
		$folder_dir = "../assets/img/";

		//za lokaciju cv-a
		//$base = basename($_FILES['slika']['name']); 
		$target_file = $folder_dir . basename($_FILES["slika"]["name"]);
			$target_file1 = $folder_dir . basename($_FILES["slika1"]["name"]);
			$target_file2 = $folder_dir . basename($_FILES["slika2"]["name"]);

		//provera ekstenzije fajla
		//$imageFileType = pathinfo($base, PATHINFO_EXTENSION); 
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
		$imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));


		$file = uniqid() . "." . $imageFileType; 
		$file1 = uniqid() . "." . $imageFileType1; 
		$file2 = uniqid() . "." . $imageFileType2; 
		
	  
		//gde se cuvaju fajlovi
		//$filename = $folder_dir .$file;  

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			
		  $check = getimagesize($_FILES["slika"]["tmp_name"]);
		  if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		  } else {
			echo "File is not an image.";
			$uploadOk = 0;
		  }
		}

		if(isset($_POST["submit"])) {
			if(!empty($_FILES["slika1"]["tmp_name"])){
				$check1 = getimagesize($_FILES["slika1"]["tmp_name"]);
				if($check1 !== false) {
				  echo "File1 is an image - " . $check1["mime"] . ".";
				  $uploadOk1 = 1;
				} else {
				  echo "File1 is not an image.";
				  $uploadOk1 = 0;
				}
				if ($_FILES["slika1"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk1 = 0;
				  }
				if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
				&& $imageFileType1 != "gif" ) {
					//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk1 = 0;
				}
				if ($uploadOk1 == 0) {
					echo "Sorry, your file was not uploaded.";
				  // if everything is ok, try to upload file
				  } else {
					if (move_uploaded_file($_FILES["slika1"]["tmp_name"], $target_file1)) {
					  echo "The file ". htmlspecialchars( basename( $_FILES["slika1"]["name"])). " has been uploaded.";
					} else {
					  echo "Sorry, there was an error uploading your file.";
					}
				  }}
		  
		}
		if(isset($_POST["submit"])) {
			if(!empty($_FILES["slika2"]["tmp_name"])){
				$check2 = getimagesize($_FILES["slika2"]["tmp_name"]);
				if($check2 !== false) {
				  echo "File2 is an image - " . $check2["mime"] . ".";
				  $uploadOk2 = 1;
				} else {
				  echo "File2 is not an image.";
				  $uploadOk2 = 0;
				}
				if ($_FILES["slika2"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk2 = 0;
				  }
				  if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
		&& $imageFileType2 != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk2 = 0;
		}
		if ($uploadOk2 == 0) {
			echo "Sorry, your file was not uploaded.";
		  // if everything is ok, try to upload file
		  } else {
			if (move_uploaded_file($_FILES["slika2"]["tmp_name"], $target_file2)) {
			  echo "The file ". htmlspecialchars( basename( $_FILES["slika2"]["name"])). " has been uploaded.";
			} else {
			  echo "Sorry, there was an error uploading your file.";
			}
		  }
		  if($uploadOk2 == 0) {
			echo "Neuspesno 2";
			//header("Location: profil.php");
			exit();
		}
			}
		  
		}
		// Check if file already exists
		/*if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}
		if (file_exists($target_file1)) {
		  echo "Sorry, file 1 already exists.";
		  $uploadOk1 = 0;
		}
		if (file_exists($target_file2)) {
		  echo "Sorry, file 2 already exists.";
		  $uploadOk2 = 0;
		}*/

		// Check file size
		if ($_FILES["slika"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}
		/*
		if ($_FILES["slika1"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk1 = 0;
		}*/
		/*if ($_FILES["slika2"]["size"] > 500000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk2 = 0;
		}*/

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}
		/*
		if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
		&& $imageFileType1 != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk1 = 0;
		}*/
		/*
		if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
		&& $imageFileType2 != "gif" ) {
		  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk2 = 0;
		}*/

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
			echo "The file ". htmlspecialchars( basename( $_FILES["slika"]["name"])). " has been uploaded.";
		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }
		}
		/*
		if ($uploadOk1 == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["slika1"]["tmp_name"], $target_file1)) {
			echo "The file ". htmlspecialchars( basename( $_FILES["slika1"]["name"])). " has been uploaded.";
		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }
		}*/
		/*
		if ($uploadOk2 == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["slika2"]["tmp_name"], $target_file2)) {
			echo "The file ". htmlspecialchars( basename( $_FILES["slika2"]["name"])). " has been uploaded.";
		  } else {
			echo "Sorry, there was an error uploading your file.";
		  }
		}*/
		
		

		//ako ima greske vrati nazad.
		if($uploadOk == 0) {
			echo "Neuspesno";
			//header("Location: profil.php");
			exit();
		}/*
		if($uploadOk2 == 0) {
			echo "Neuspesno 2";
			//header("Location: profil.php");
			exit();
		}*/
		if($uploadOk1 == 0) {
			echo "Neuspesno 1";
			//header("Location: profil.php");
			exit();
		}


		//sql  insert query
		$stmt = $conn->prepare("INSERT INTO oglas (idKorisnika,nazivOglasa,img,img1, img2,opis, godinaProizvodnje, marka, predjeniKilometri, cena, vrstaPogona, tip, vrstaMenjaca, datumPostavljanja) VALUES (?,?,?, ?,?, ?, ?, ?,?, ?, ?, ?,?,?)");
		$stmt->bind_param("isssssisiissss", $_SESSION['autorizovan'], $nazivOglasa, $file,$file1,$file2,$opis, $godinaProizvodnje, $marka, $predjeniKilometri, $cena, $vrstaPogona, $tip, $vrstaMenjaca,$datumPostavljanja);
	$nazivOglasa = mysqli_real_escape_string($conn, $_POST['nazivOglasa']);
		//$file = mysqli_real_escape_string($conn, $_POST['slika']);
		$file = $_FILES["slika"]["name"];
		$file1 = $_FILES["slika1"]["name"];
		$file2 = $_FILES["slika2"]["name"];
	$opis = mysqli_real_escape_string($conn, $_POST['opis']);
	$godinaProizvodnje = mysqli_real_escape_string($conn, $_POST['godinaProizvodnje']);
	$marka = mysqli_real_escape_string($conn, $_POST['marka']);
	$predjeniKilometri = mysqli_real_escape_string($conn, $_POST['predjeniKilometri']);
	$cena = mysqli_real_escape_string($conn, $_POST['cena']);
	$vrstaPogona = mysqli_real_escape_string($conn, $_POST['vrstaPogona']);
	$tip = mysqli_real_escape_string($conn, $_POST['tip']);
	$vrstaMenjaca = mysqli_real_escape_string($conn, $_POST['vrstaMenjaca']);
	$datumPostavljanja = date("Y-m-d");
	
	if($stmt->execute()) {
		//ako su podaci uspesno dodati, vrati na pocetnu
		$_SESSION['jobPostSuccess'] = true;
			header("Location: postavi-oglas.php");
			exit();

		} else {
			//prikaz greske
			echo "Error " ;
			//. $sql . "<br>" . $conn->error;
		}

	//zatvaranje baze
	$stmt->close();
	$conn->close();

} else {
	//vracanje na stranicu za registraciju 
	header("Location: profil.php");
	exit();
}





