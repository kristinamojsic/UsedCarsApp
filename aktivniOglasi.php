<?php
session_start();
if(isset($_SESSION['autorizovan']))
{

    $rola = $_SESSION['rola'];
    
}else
{
    $rola = 0;
}
include_once("db2.php");
?>
  <html>
    <head>
    <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
       
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      


      <style>
body,html
{
    height: 100%;
    width:100%;
    font-family: 'Titillium Web', sans-serif;
    
}

body{
    background-image: url('assets/img/bg-neon.jpg');
    height: 100%;
    width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment:fixed;
}
#header a
{
    font-size: 22.5px;
    

}
#loginbut,#loginbut:hover,#loginbut:focus,#loginbut:visited
{
  
    line-height:30px;
    height: 38px;
    
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
#prof
{
    
  position: absolute;
    height: 38px;
    line-height: 30px;
    right: 110px;
    top: 15px;
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
#logoutbut
{
  position: absolute;
    height: 38px;
    line-height: 30px;
    right: 0px;
    top: 15px;
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
.a{
  color:purple;
}
.card .card-action a:not(.btn):not(.btn-large):not(.btn-large):not(.btn-floating) {
  margin-right: 0px !important;
}


</style>
    </head>

    <body>
        <nav style="background-color:#f8f9fa;">
          <div class="nav-wrapper container" style="margin-left:100px;width:auto;margin-right:100px">
          <div class="container" id="header"><a class="navbar-brand" href="index.php" style="color: rgba(114,22,77,0.9);position:absolute;left:0px;">Polovni automobili </a>
          
       
         <?php 
        if($rola == 0 ){
            echo "<div><a class='ml-auto' id='loginbut' href='prijava.php' style='position: absolute;left:1030px;top:15px;'>Prijavi se</a></div>  ";
        }
        else
        {
			
            echo "<div  id='navcol-2'><a class='ml-auto' id='prof' href='user/profil.php'>Moj profil</a></div>";
            echo " <div class='collapse navbar-collapse' id='navcol-2'><a class='ml-auto' id='logoutbut' href='odjava.php'>Odjavi se</a></div>";
            
        }?>
          
        </div>
        </nav>    
     <div class="container">
      <div class="row"></div>

      
      <div class="row">       
        <div class="col s3">
            <label><b>MARKA</b></label>
            <select class="browser-default" id="marka" onchange="filter()">
              <option value="" >Izaberi marku</option>
              <option value="Volvo">Volvo</option>
              <option value="Nissan">Nissan</option>
              <option value="Mercedes">Mercedes</option>
              <option value="Toyota">Toyota</option>
              <option value="Opel">Opel</option>
              <option value="BMW">BMW</option>
              <option value="Peugeot">Peugeot</option>
              <option value="Audi">Audi</option>
              
            </select>          
        </div>

        <div class="col s3">
            <label><b>POGON</b></label>
            <select class="browser-default" id="pogon" onchange="filter()">
              <option value="" >Izaberi pogon</option>
              <option value="zadnji">Zadnji</option>
              <option value="4x4">4x4</option>
              <option value="prednji">Prednji</option>
           
            </select>          
        </div>

        <div class="col s3"> 
            <label><b>MENJAC</b></label>
            <select class="browser-default" id="vrstaMenjaca" onchange="filter()">
              <option value="" >Izaberi menjac</option>
              <option value="automatski">Automatski</option>
              <option value="manuelni">Manuelni</option>
              
            </select>
        </div>

              
        <div class="col s3">
            <label><b>CENA</b></label>
            <select class="browser-default" id="cena" onchange="filter()">
              <option value="" >Izaberi cenu vozila</option>
              <option value="10000">Do 10.000</option>
              <option value="20000">Do 20.000</option>
              <option value="30000">Do 30.000</option>
              <option value="40000">Do 40.000</option>
              
            </select>          
        </div>

        <div class="col s3">
              <label><b>GODINA</b></label>
              <select class="browser-default" id="godina" onchange="filter()">
                <option value="" >Izaberite godiste automobila:</option>
                <option value="2005">Od 2005</option>
                <option value="2010">Od 2010</option>
                <option value="2015">Od 2015</option>
                <option value="2020">Od 2020</option>
              </select>          
        </div>

        <div class="col s3">
            <label><b>PREDJENI KILOMETRI</b></label>
            <select class="browser-default" id="predjeniKilometri" onchange="filter()">
              <option value="" >Izaberi kilometrazu</option>
              <option value="50000">Do 50.000</option>
              <option value="100000">Do 100.000</option>
              <option value="150000">Do 150.000</option>
              
            </select>
        </div>

      </div>


    <div class="row">
      <div id="displayHere">
      <?php
      $query = "SELECT * FROM `oglas` WHERE aktivan=1";
  if ($result = mysqli_query($conn, $query)) {
      while ($oglas = mysqli_fetch_array($result)) {
        $Marka = $oglas['marka'];
        $Pogon = $oglas['vrstaPogona'];
        $Menjac = $oglas['vrstaMenjaca'];
        $Godina = $oglas['godinaProizvodnje'];
        $Cena = $oglas['cena'];
        $Kilometri = $oglas['predjeniKilometri'];
                
             ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="assets/img/<?php echo $oglas['img']?>" height="200">
                      
                    </div>
                    <div class="card-content">
                      <p>
                      <li>Marka:<?php echo $Marka; ?></li>
                      <li>Pogon:<?php echo $Pogon; ?></li>
                      <li>Vrsta menjaca:<?php echo $Menjac; ?></li>
                      <li>Godiste:<?php echo $Godina; ?></li>
                      <li>Cena:<?php echo $Cena; ?></li>
		                  <li>Kilometraza:<?php echo $Kilometri; ?></li>
        
                      </p>
                    </div>
                    <div class="card-action">
                      <span><a href="prikaz.php?idOglasa=<?php echo $oglas['idOglasa']?>">Pogledaj</a></span>
                      <?php if($rola == 1){
                        $oglastmp = $oglas['idOglasa'];
                        echo "<span><a href='user/sacuvajOglas.php?idOglasa=$oglastmp'>Sačuvaj</a></span>";}?>
                        
                      
                    </div>
                  </div>
                </div>

             <?php
      }
    }  ?>      
      </div>
    </div>  
     </div>

      <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript">
  function filter(){
        var marka = document.getElementById('marka').value;
        var pogon = document.getElementById('pogon').value;
        var menjac = document.getElementById('vrstaMenjaca').value;
        var god = document.getElementById('godina').value;
        var cen = document.getElementById('cena').value;
        var kil = document.getElementById('predjeniKilometri').value;

       $.post('filter.php', {marka1:marka,pogon1:pogon,menjac1:menjac,god1:god,cen1:cen,kil1:kil}, function(data){
           $('#displayHere').html(data);
          
        }); 
        
  }


</script>
    </body>
  </html>