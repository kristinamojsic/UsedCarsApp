<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
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
    background-color:rgba(120,22,77,0.9) !important;
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
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <header class="main-header">
	 <a class="navbar-brand" href="../aktivniOglasi.php">Polovni automobili</a>
	 
   
    </div>
      </div>
    </nav>
  </header>

  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
		<div class="col-lg-12" style="text-align: center;">
            <div class="well">     
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-justified">
                  <li class="active"><a href="dashboard.php"style="background-color:rgba(120,22,77,0.9) !important; border-color:rgba(120,22,77,0.9);"><i class="fa fa-dashboard"></i> Statistika</a></li>
                  <li><a href="sviOglasi.php"><i class="fa fa-briefcase"></i> Oglasi</a></li>
                  <li><a href="sviKorisnici.php"><i class="fa fa-address-card-o"></i> Korisnici</a></li>
                  <li><a href="odjava2.php"><i class="fa fa-arrow-circle-o-right"></i> Odjava</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-18 bg-gray padding-2">

            
          <div class="row">
              <div class="col-md-6">
                <div class="info-box" style="background-color:#98adbb !important;">
                  <span class="info-box-icon bg-black"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Registrovani korisnici</span>
                    <?php
                    $db = new Db();
                    if($db->sviKorisnici())
                    {
                        $brKorisnika = count($db->sviKorisnici());
                    }
                    else
                    {
                        $brKorisnika = 0;
                    }
                    ?>
                    <span class="info-box-number"><?php echo $brKorisnika; ?></span>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg"style="background-color:#98adbb !important;" >
                  <span class="info-box-icon bg-black"><i class="ion-ios-clock"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Čeka odobravanje</span>
                    <?php
                    if($db->neprihvaceniOglasi()>0)
                    {
                        $brNeprihvacenih = $db->neprihvaceniOglasi();
                    }
                    else
                    {
                        $brNeprihvacenih = 0;
                    }
                     
                    ?>
                    <span class="info-box-number"><?php echo $brNeprihvacenih; ?></span>
                    
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box"style="background-color:#98adbb !important;">
                  <span class="info-box-icon bg-black"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Aktivni oglasi</span>
                    <?php
                    if($db->aktivniOglasi()>0)
                    {
                        $brAktivnih = $db->aktivniOglasi();
                    }
                    else
                    {
                        $brAktivnih = 0;
                    }
                   
                    ?>
                    <span class="info-box-number"><?php echo $brAktivnih; ?></span>
                  </div>
                </div>
              </div>
              
           

          </div>
        </div>
      </div>
    </section>

    

  </div>
  
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App
<script src="../js/adminlte.min.js"></script> -->
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
</body>
</html>
