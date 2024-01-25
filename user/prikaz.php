<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");


  
  $sql1 = "SELECT * FROM oglas o INNER JOIN korisnik k ON o.idKorisnika=k.idKorisnika WHERE idOglasa='$_GET[id]'";
  $result1 = $conn->query($sql1);
  if($result1->num_rows > 0) 
  {
    $row = $result1->fetch_assoc();
  }


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Polovni automobili</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 2;
    color: #818181;
  }
  
 
 
  .navbar {
    margin-bottom: 0;
    background-color: rgba(120,22,77,0.9);
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }

  }
   well {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">


<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="index.php">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <header class="main-header">
	 <a class="navbar-brand" href="../index.php">Polovni automobili</a>
	  
   
    </div >
  
  </div>
</nav>
  
  </header>

  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">          
          <div class="col-md-12 bg-gray padding-2">
            <div class="pull-left" style="    margin-top: 20px;">
              <h2><b><i><?php echo $row['nazivOglasa']; ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="moji-oglasi.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Nazad</a>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div>
              <p style="margin-left:20px"> <i class="fa fa-calendar text-blue"></i> <?php echo date("d-M-Y", strtotime($row['datumPostavljanja'])); ?></p>              
            </div>
            
              
                <li>godina proizvodnje:<?php echo $row['godinaProizvodnje']?></li>
                <li>marka:<?php echo $row['marka']?></li>
                <li>predjeni kilometri:<?php echo $row['predjeniKilometri']?></li>
                <li>cena:<?php echo $row['cena']?></li>
                <li>vrsta pogona:<?php echo $row['vrstaPogona']?></li>
                <li>tip:<?php echo $row['tip']?></li>
                <li>vrsta menjaca:<?php echo $row['vrstaMenjaca']?></li>
                
            
            <div>
              <?php echo stripcslashes($row['opis']); ?>
            </div>
            
            
          </div>
          <div class="col-md-4">
            <div class="thumbnail" style="display:flex">
            
              <img src="../assets/img/<?php echo $row['img']; ?>" >
              
              <img src="../assets/img/<?php echo $row['img1']; ?>" >
              <img src="../assets/img/<?php echo $row['img2']; ?>" >
              
              </div>
              <div class="caption text-center">
              <h3>Kontakt:</h3>
                <h3><?php echo $row['email']; ?></h3>
                <h3><?php echo $row['broj']; ?></h3>
                
              
            </div>
          </div>
        </div>
      </div>
    </section>

    

  </div>

  <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
