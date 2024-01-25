<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db2.php");
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
  <script src="../js/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#description', height: 300 });</script>
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
    background-color:  rgba(120,22,77,0.9);
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
	 <a class="navbar-brand" href="../index.php">Polovni automobili</a>
	 
   
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
              
                <h3 class="box-title" style="color:rgba(120,22,77,0.9);"><b><br><?php echo $_SESSION['email']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-justified">
                  <li><a href="profil.php"><i class="fa fa-dashboard"></i> Početna</a></li>
                  <li><a href="izmeni.php"><i class="fa fa-tv"></i> Izmena podataka</a></li>
                  <li class="active"><a href="postavi-oglas.php" style="background-color:rgba(120,22,77,0.9); border-top-color:rgba(120,22,77,0.9);"><i class="fa fa-plus"></i> Postavite oglas</a></li>
                  <li><a href="moji-oglasi.php"><i class="fa fa-file-o"></i> Moji oglasi</a></li>
                  <li><a href="sacuvaniOglasi.php"><i class="fa fa-file-o"></i> Sačuvani oglasi</a></li>
                  <li><a href="podesavanja.php"><i class="fa fa-gear"></i> Podešavanja</a></li>
                  <li><a href="../odjava.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>				          
                </ul>
              </div>
            </div>
          </div>
        
                 
          <div class="col-lg-12 bg-gray padding-2">
           <br>
            <div class="row">
              <form method="post" action="dodajoglas.php" enctype="multipart/form-data">
			  
                <div class="col-md-12 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="nazivOglasa" name="nazivOglasa" placeholder="Naziv oglasa" required>
                  </div>
				  <div class="form-group">
                    <legend>Dodaj sliku:</legend>
                    <input type="file" name="slika" id="slika" class="form-control input-lg" required>
                    <input type="file" name="slika1" id="slika1" class="form-control input-lg" >
                    <input type="file" name="slika2" id="slika2" class="form-control input-lg" >
                    
                  </div>
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="opis" name="opis" placeholder="Opis oglasa">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="godinaProizvodnje" autocomplete="off" name="godinaProizvodnje" placeholder="Godina proizvodnje" required>
                  </div>
                  <div class="form-group">
                    <input type="text"class="form-control  input-lg" id="marka" name="marka" placeholder="Marka" required>
                  </div>
	
                  <div class="form-group">
                <input type="text" class="form-control  input-lg" id="predjeniKilometri" autocomplete="off" name="predjeniKilometri" placeholder="Predjeni kilometri" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="cena" name="cena" placeholder="Cena" required>
                  </div>
				    <div class="form-group"><legend>Vrsta pogona:</legend>
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="prednji"checked><label for="prednji"style="font-weight:100">prednji</label>
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="zadnji"><label for="zadnji"style="font-weight:100">zadnji</label>
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="4x4"><label for="4x4"style="font-weight:100">   4x4</label>
                  </div>
				   
            <div class="form-group"><legend>Vrsta menjača:</legend>
                <input type="radio"  id="vrstaMenjaca" name="vrstaMenjaca" value="automatski"checked><label for="automatski"style="font-weight:100">automatski</label>
                <input type="radio"  id="vrstaMenjaca" name="vrstaMenjaca" value="manuelni"><label for="manuelni"style="font-weight:100">manuelni</label>
              
            </div>
            <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="tip" autocomplete="off" name="tip" placeholder="Tip" >
                  </div>
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-flat btn-info" style="background-color:rgba(120,22,77,0.9);padding:6px 30px;border:0px">Postavi</button>
                  </div>
                </div>
              </form>
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
