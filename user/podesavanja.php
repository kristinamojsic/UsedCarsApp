<?php

session_start();

if(empty($_SESSION['autorizovan'])) {
  header("Location: ../index.php");
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
                      <li><a href="profil.php"><i class="fa fa-dashboard"></i> Statistika</a></li>
                     <li><a href="izmeni.php"><i class="fa fa-tv"></i> Izmena podataka</a></li>
                  <li><a href="postavi-oglas.php"><i class="fa fa-plus"></i> Postavite oglas</a></li>
                  <li><a href="moji-oglasi.php"><i class="fa fa-file-o"></i> Moji oglasi</a></li>
                  <li><a href="sacuvaniOglasi.php"><i class="fa fa-file-o"></i> Sačuvani oglasi</a></li>
                  <li class="active"><a href="podesavanja.php" style="background-color:rgba(120,22,77,0.9); border-top-color:rgba(120,22,77,0.9);"><i class="fa fa-gear"></i> Podešavanja</a></li>
                  <li><a href="../odjava.php"><i class="fa fa-arrow-circle-o-right"></i> Odjavite se</a></li>				          
                </ul>
              </div>
            </div>
          </div>
   
             
          <div class="col-md-12 bg-gray padding-3">
            <h2><i>Podešavanja profila</i></h2>
            <br>
            <div class="row">
              <div class="col-md-6">
                <br>
				
                <form id="promenisifru" action="promenisifru.php" method="post">
                  <div class="form-group">
                    <input id="sifra" class="form-control input-lg" type="password" name="sifra" autocomplete="off" placeholder="Nova lozinka" required>
                  </div>
                  <div class="form-group">
                    <input id="sifrac" class="form-control input-lg" type="password" name="sifrac" autocomplete="off" placeholder="Potvrditi lozinku" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success btn-lg" style="background-color:rgba(120,22,77,0.9);border-color:rgba(120,22,77,0.9);">Promena lozinke</button>
                  </div>
                  <div id="passwordError" class="color-red text-left hide-me">
                    LOZINKE SE NE POKLAPAJU!
                  </div>
                </form>
              </div>
              <div class="col-md-6">  
              <!--  <form action="promenikime.php" method="post">
                  <div class="form-group">
                   
                    <label>Korisnicko ime</label>
                    <input class="form-control input-lg" name="email" type="text">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-primary btn-lg">Promena imena</button>
                  </div>
                </form
              </div>  >-->            
            </div>
            <br>
            <br>
            
            
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
<script>
  $("#promenisifru").on("submit", function(e) {
    e.preventDefault();
    if( $('#sifra').val() != $('#sifrac').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
