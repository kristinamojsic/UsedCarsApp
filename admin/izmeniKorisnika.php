<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
};

require_once("../db.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Oglasi za posao</title>
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

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="../aktivniOglasi.php" class="logo logo-bg" style="background-color:rgba(120,22,77,0.9) !important">Polovni automobili
    </a>

    <nav class="navbar navbar-static-top" style="background-color:rgba(120,22,77,0.9) !important">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
              
        </ul>
      </div>
    </nav>
  </header>

  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Dobrodošli <b> Admin </b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Profil</a></li>
                  <li><a href="aktivniOglasi.php"><i class="fa fa-briefcase"></i> Aktivni oglasi</a></li>
                  <li class="active" ><a href="sviKorisnici.php" style="background-color:rgba(120,22,77,0.9) !important;color:white"><i class="fa fa-address-card-o"></i> Korisnici</a></li>
                  <li><a href="odjava2.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Izmeni profil</i></h2>
            <form action="izmeniKorisnika.php?id_user=<?php echo $_GET['id_user']; ?>" method="post" enctype="multipart/form-data">
            <?php
            

            $db = new Db();
            $idKorisnika = $_GET['id_user'];
            
            if($korisnik = $db->uzmiPodatkeOKorisniku($idKorisnika))
            
            {?><div class="row">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label for="ime">Ime</label>
                    <input type="text" class="form-control input-lg" id="ime" name="ime" placeholder="Ime" value="<?php echo $korisnik[0]['ime']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="">Prezime</label>
                    <input type="text" class="form-control input-lg" id="prezime" name="prezime" placeholder="Prezime" value="<?php echo $korisnik[0]['prezime']; ?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email adresa</label>
                    <input type="email" class="form-control input-lg" id="email" name = "email" placeholder="Email" value="<?php echo $korisnik[0]['email']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="broj">Broj telefona</label>
                    <textarea id="broj" name="broj" class="form-control input-lg" rows="5" placeholder="Broj telefona"><?php echo $korisnik[0]['broj']; ?></textarea>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-flat btn-primary" style="background-color:rgba(120,22,77,0.9) !important">Ažuriraj profil</button>
                  </div>
                </div>
                </div>

              <?php
            }?>  
            </form>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
 
  <div class="control-sidebar-bg"></div>


</div>
<?php


   if (isset ($_POST["submit"])) {

       
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $email = $_POST["email"];
        $broj = $_POST["broj"];
        
        if($db->izmeniKorisnika($idKorisnika,$ime,$prezime,$email,$broj))
        {
            ?><script> location.replace("izmeniKorisnika.php?id_user=<?php echo $idKorisnika?>"); </script><?php
            
        }
        else{
            ?><script> location.replace("izmeniKorisnika.php?id_user=<?php echo $idKorisnika?>"); </script><?php
            
        }
   }

?>
<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
