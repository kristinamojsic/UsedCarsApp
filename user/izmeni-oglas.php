<?php

session_start();
$id = $_GET['id'];

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
              
               <h3 class="box-title" style="color:rgba(120,22,77,0.9);"><b><br><?php echo $_SESSION['email']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-justified">
                      <li><a href="profil.php"><i class="fa fa-dashboard"></i> Početna</a></li>
                     <li><a href="izmeni.php"><i class="fa fa-tv"></i> Izmena podataka</a></li>
                  <li><a href="postavi-oglas.php"><i class="fa fa-plus"></i> Postavite oglas</a></li>
                  <li class="active"><a href="moji-oglasi.php" style="background-color:rgba(120,22,77,0.9); border-top-color:rgba(120,22,77,0.9);"><i class="fa fa-file-o"></i> Moji oglasi</a></li>
                  <li><a href="sacuvaniOglasi.php"><i class="fa fa-file-o"></i> Sačuvani oglasi</a></li>
                  <li><a href="podesavanja.php"><i class="fa fa-gear"></i> Podešavanja</a></li>
                  <li><a href="../odjava.php"><i class="fa fa-arrow-circle-o-right"></i> Odjavite se</a></li>				          
                </ul>
              </div>
            </div>
          </div>
   
             
          <div class="col-md-12 bg-gray padding-3">
            <br>
            <div class="row">
              <form method="post" action="izmenioglas.php?idKorisnika=<?php echo $_SESSION['autorizovan']; ?>&id_oglasa=<?php echo $id; ?>" enctype="multipart/form-data">
			  <?php
                
                $sql = "SELECT * FROM oglas WHERE idOglasa='$id'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-12 latest-job ">
                <label class="lab">Naziv</label>
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="nazivOglasa" name="nazivOglasa" value="<?php echo $row['nazivOglasa']; ?>">
                  </div>
				  <div class="form-group">
                    <label class="lab">Slika</label>
                    <input type="file" name="slika" id="slika" class="btn btn-default">
					<?php if($row['img'] != "") { ?>
                    <img src="../assets/img/<?php echo $row['img']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>
                    
                  </div>
				   <div class="form-group">
                    <label class="lab">Slika 2</label>
                    <input type="file" name="slika1" id="slika1" class="btn btn-default">
					<?php if($row['img1'] != "") { ?>
                    <img src="../assets/img/<?php echo $row['img1']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>
                    
                  </div>
				  <div class="form-group">
                    <label class="lab">Slika 3</label>
                    <input type="file" name="slika2" id="slika2" class="btn btn-default">
					<?php if($row['img2'] != "") { ?>
                    <img src="../assets/img/<?php echo $row['img2']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;">
                    <?php } ?>
                    
                  </div>
                  <label class="lab">Opis</label>
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="opis" name="opis" value="<?php echo $row['opis']; ?>">
                  </div>
                  <label class="lab">Godina proizvodnje</label>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="godinaProizvodnje" autocomplete="off" name="godinaProizvodnje" value="<?php echo $row['godinaProizvodnje']; ?>" >
                  </div>
                  <label class="lab">Marka</label>
                  <div class="form-group">
                    <input type="text"class="form-control  input-lg" id="marka" name="marka" value="<?php echo $row['marka']; ?>">
                  </div>
                  <label class="lab">Pređeni kilometri</label>
                  <div class="form-group">
                   
                <input type="text" class="form-control  input-lg" id="predjeniKilometri" autocomplete="off" name="predjeniKilometri" value="<?php echo $row['predjeniKilometri']; ?>">
                  </div>
                  <label class="lab">Cena</label>
                  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="cena" name="cena" value="<?php echo $row['cena']; ?>">
                  </div>
				<!--    <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="vrstaPogona" name="vrstaPogona" value="<?php echo $row['vrstaPogona']; ?>">
                  </div>-->
                  <label class="lab">Tip</label>
				   <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="tip" autocomplete="off" name="tip" value="<?php echo $row['tip']; ?>">
                  </div>
				 <!--  <div class="form-group">
                    <input type="text" class="form-control  input-lg" id="vrstaMenjaca" autocomplete="off" name="vrstaMenjaca" value="<?php echo $row['vrstaMenjaca']; ?>" >
                  </div>
                  <div class="form-group">
          --> <label class="lab">Vrsta pogona</label>
                  <div class="form-group">
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="prednji"<?php if($row['vrstaPogona']=="prednji"){ echo "checked";}?>><label for="prednji"style="font-weight:100">prednji</label>
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="zadnji"<?php if($row['vrstaPogona']=="zadnji"){ echo "checked";}?>><label for="zadnji"style="font-weight:100">zadnji</label>
                    <input type="radio"  id="vrstaPogona" name="vrstaPogona" value="4x4"<?php if($row['vrstaPogona']=="4x4"){ echo "checked";}?>><label for="4x4"style="font-weight:100">   4x4</label>
                  </div>
                  <label class="lab">Vrsta menjača </label>
            <div class="form-group">
                <input type="radio"  id="vrstaMenjaca" name="vrstaMenjaca" value="automatski"<?php if($row['vrstaMenjaca']=="automatski"){ echo "checked";}?>><label for="automatski"style="font-weight:100">automatski</label>
                <input type="radio"  id="vrstaMenjaca" name="vrstaMenjaca" value="manuelni"<?php if($row['vrstaMenjaca']=="manuelni"){ echo "checked";}?>><label for="manuelni"style="font-weight:100">manuelni</label>
              
            </div>
                    <button type="submit" name="submit" class="btn btn-flat btn-primary" style="background-color:rgba(120,22,77,0.9);">Sačuvajte izmene</button>
                  </div>
                </div>
				                 <?php
                    }
                  }
                ?>
              </form>
            </div>
			 <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            
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
