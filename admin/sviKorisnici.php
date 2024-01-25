<?php
session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
};
require_once("../db.php");
$db = new Db();
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script>
        function brisi(id_korisnika)
        {
            if(confirm("Da li ste sigurni da želite da obrišete korisnika, kao i njegove oglase?"))
            {
                window.location = "obrisiKorisnika.php?id=" + id_korisnika;
            }
        }
        </script>
<style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 2;
    color: #818181;
  }
  
 
 
  .navbar {
    margin-bottom: 0;
    background-color: rgba(120,22,77,0.9) !important;
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
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Statistika</a></li>
                  <li><a href="sviOglasi.php"><i class="fa fa-briefcase"></i> Oglasi</a></li>
                  <li class="active"><a href="sviKorisnici.php" style="background-color:rgba(120,22,77,0.9) !important;border-color:rgba(120,22,77,0.9);"><i class="fa fa-address-card-o"></i> Korisnici</a></li>
                 
                  <li><a href="odjava2.php"><i class="fa fa-arrow-circle-o-right"></i> Odjava</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-18 bg-gray padding-2">

            <h3>Baza korisnika</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-striped table-bordered">
                    <thead>
                      <th>Ime</th>
                      <th>Prezime</th>
                      <th>email</th>
                      <th>Broj</th>
                      <th>Izmena</th>
                      <th>Brisanje</th>
                    </thead>
                    <tbody>
                <?php
                    
                    if($korisnici = $db->sviKorisnici()) {
                        foreach($korisnici as $korisnik)
                        {
                        ?><tr><td><?php echo $korisnik['ime'];?></td>
                        <td><?php echo $korisnik['prezime'];?></td>
                        <td><?php echo $korisnik['email'];?></td>
                        <td><?php echo $korisnik['broj'];?></td>
                        
                        <td><a href="izmeniKorisnika.php?id_user=<?php echo $korisnik['idKorisnika']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a onclick="brisi(<?php echo $korisnik['idKorisnika']?>)" style="cursor:pointer;"><i class="fa fa-trash"></i></a></td>
                        
                      </tr>

                      <?php };

                        
                      }
                      else
                      {
                        echo "<h3>Nema korisnika!</h3>";
                      }
                      ?>
                      
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <div class="modal modal-success fade" id="modal-success">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Profil kandidata</h4>
          </div>
          <div class="modal-body">
              <h3><b>Prijavljen</b></h3>
              <p>10/02/2022</p>
              <br>
              <h3><b>Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Broj telefona</b></h3>
              <p>0600000000</p>
              <br>
              <h3><b>Veb sajt</b></h3>
              <p>google.com</p>
              <br>
              <h3><b>Poruka</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Zatvori</button>
          </div>
        </div>
      </div>
    </div>
    

  </div>

  <div class="control-sidebar-bg"></div>

</div>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
