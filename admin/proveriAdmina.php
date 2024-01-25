<?php

session_start();
require_once("../db.php");

if(isset($_POST)) {

	$username = $_POST['username'];
	$password = $_POST['password'];

    if($username == "admin" && $password == "123456")
    {
        $_SESSION['id_admin'] = 1;
        header("Location: dashboard.php");
    }  
	else 
    {
 		$_SESSION['loginError'] = true;
 		header("Location: index.php");
		exit();
 	}

 	

} else {
	header("Location: index.php");
	exit();
}