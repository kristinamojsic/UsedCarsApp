<?php

//konfiguracija
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "si2";

//kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

//provera konekcije
if($conn->connect_error) {
	die("Connection Failed: ". $conn->connect_error);
}