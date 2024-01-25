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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <link rel="stylesheet" href="../css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script>
function brisi(idOglasa)
{
    if(confirm("Da li ste sigurni da želite da obrišete oglas?"))
    {
        window.location = "izbrisi-oglas.php?id=" + idOglasa;
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
              
                <h3 class="box-title"style="color:rgba(120,22,77,0.9);"><b><br><?php echo $_SESSION['email']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-justified">
                      <li><a href="profil.php"><i class="fa fa-dashboard"></i> Početna</a></li>
                     <li><a href="izmeni.php"><i class="fa fa-tv"></i> Izmena podataka</a></li>
                  <li><a href="postavi-oglas.php"><i class="fa fa-plus"></i> Postavite oglas</a></li>
                  <li class="active"><a href="moji-oglasi.php"style="background-color:rgba(120,22,77,0.9); border-top-color:rgba(120,22,77,0.9);"><i class="fa fa-file-o"></i> Moji oglasi</a></li>
                  <li><a href="sacuvaniOglasi.php"><i class="fa fa-file-o"></i> Sačuvani oglasi</a></li>
                  <li><a href="podesavanja.php"><i class="fa fa-gear"></i> Podešavanja</a></li>
                  <li><a href="../odjava.php"><i class="fa fa-arrow-circle-o-right"></i> Odjavite se</a></li>				          
                </ul>
              </div>
            </div>
          </div>
   
             
          <div class="col-md-12 bg-gray padding-3">
          
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Naziv oglasa</th>
                      <th>Prikaz</th>
                      <th>Izmena</th>
                      <th>Brisanje</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM oglas WHERE idKorisnika='$_SESSION[autorizovan]'";
                      $result = $conn->query($sql);

                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                        {
                      ?> 
                      <tr>
                        <td><?php echo $row['nazivOglasa']; ?></td>
                        <td><a href="prikaz.php?id=<?php echo $row['idOglasa']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                        <td><a href="izmeni-oglas.php?id=<?php echo $row['idOglasa']; ?>"><i class="fa fa-edit"></i></a></td>
                        <td><a id="brisi" onclick="brisi(<?php echo $row['idOglasa']?>)" style="cursor:pointer"><i class="fa fa-trash"></i></a></td>
                        <td><?php if($row['aktivan'] == 2)
                        {
                           echo "<span style='color:#ffac15'>Oglas još uvek nije prihvaćen</span>";
                        }
                        else if($row['aktivan'] == 0)
                        {
                          echo "<span style='color:red'>Odbijen od strane administratora</span>";
                        }
                        else if($row['aktivan'] == 1)
                        {
                          echo "<span style='color:#13bb13'>Aktivan</span>";
                        }
                        else if($row['aktivan'] == 3)
                        {
                          echo "<span >Neaktivan</span>";
                        }

                        
                        
                        ;?></td>
                      </tr>
                      <?php
                       }
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
