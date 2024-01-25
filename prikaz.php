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
$id=$_GET['idOglasa'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Oglas</title>
<link rel="stylesheet" href="css/prikazz.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<script
              src="https://code.jquery.com/jquery-3.1.1.js"
             integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
              crossorigin="anonymous"></script>
<style>
    body{
    background-image:url('assets/img/bg-neon.jpg');
    font-family: 'Titillium Web', sans-serif;
    height: 100%;
    width:100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment:fixed;
}
#loginbut,#loginbut:hover,#loginbut:focus,#loginbut:visited
{

    font-size:22.5px;
    line-height:30px;
    height: 40px;
    position: absolute;
    right: 100px;
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
#prof
{
    font-size:22.5px;
  position: absolute;
    height: 38px;
    line-height: 30px;
    right: 210px;
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
    font-size:22.5px;
  position: absolute;
    height: 38px;
    line-height: 30px;
    right: 100px;
    top: 15px;
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
li
{
    font-size:30px;
}

</style>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean" >
        <div class="container" id="header"><a class="navbar-brand" href="aktivniOglasi.php" style="color: rgba(114,22,77,0.9);margin-left: 85px;font-size:22.5px">Polovni automobili </a>
       
                
        </div>
        <?php 
        if($rola == 0 ){
            echo "<div><a class='ml-auto' id='loginbut' href='prijava.php' style='top:10px;'>Prijavi se</a></div>  ";
        }
        else
        {
			
            echo "<div  id='navcol-2'><a class='ml-auto' id='prof' href='user/profil.php'>Moj profil</a></div>";
            echo " <div class='collapse navbar-collapse' id='navcol-2'><a class='ml-auto' id='logoutbut' href='odjava.php'>Odjavi se</a></div>";
            
        }?>
    </nav>

<div class="prikaz" style="margin-bottom:40px;margin-top:40px">
    <?php
    
     $query = "SELECT * FROM `oglas` where idOglasa = '$id'";
    if ($result = mysqli_query($conn, $query)) {
            $oglas = mysqli_fetch_array($result);
            $Marka = $oglas['marka'];
				$Pogon = $oglas['vrstaPogona'];
				$Menjac = $oglas['vrstaMenjaca'];
				$Godina = $oglas['godinaProizvodnje'];
                $Cena = $oglas['cena'];
				$Kilometri = $oglas['predjeniKilometri'];
                $Tip = $oglas['tip'];
                $Opis = $oglas['opis'];
                $Korisnik = $oglas['idKorisnika']
           
    ?>
            
    <div class="slika" style="margin-left:40px;margin-right:0px;margin-bottom:0px;margin-top:0px;width:700px;overflow:unset;">
        <?php 
            $img = $oglas['img'];
            $img1 = $oglas['img1'];
            $img2 = $oglas['img2'];
        if ($img1!="" || $img2!="" ){
            
            echo "<div class='slider-outer'>
            <img  src='assets/img/arrow.png' class='prev'>
            <div class ='slider-inner'>
                <img src='assets/img/$img' class='active'>";
                if($img1!="")
                {
                    echo "<img src='assets/img/$img1' class='active'>";
                }
                if($img2!="")
                {
                   echo "<img src='assets/img/$img2' class='active'>" ;
                }
                echo "</div><img  src='assets/img/right-arrow.png' class='next'></div>";
            }
            else 
            {
                echo "<img src='assets/img/$img'style='width:700px'>";
            }?>
            
        
    </div>
    <div class="spec" style="margin-left:150px">
    <label>KARAKTERISTIKE</label>
    <p>
	    <li>Marka:<?php echo $Marka; ?></li>
        <li>Model:<?php echo $Tip; ?></li>
        <li>Pogon:<?php echo $Pogon; ?></li>
        <li>Vrsta menjaca:<?php echo $Menjac; ?></li>
        <li>Godiste:<?php echo $Godina; ?></li>
        <li>Cena:<?php echo $Cena; ?></li>
		<li>Kilometraza:<?php echo $Kilometri; ?></li>
        <li>Opis:<?php echo $Opis; ?></li>  

	</p>
    <?php
 			
 		}

?>
	
    </div>
    </div>
    <div class="korisnik">
        <?php
            $query1 = "SELECT * FROM `korisnik` where idKorisnika = '$Korisnik'";
            if ($result1 = mysqli_query($conn, $query1)) {
                while ($row = mysqli_fetch_array($result1)) {
                    $Ime = $row['ime'];
                        $Prezime = $row['prezime'];
                        $Email = $row['email'];
                        $Broj = $row['broj'];
                       // $Slika = $row['slika'];
        ?>
        <label>KONTAKT</label>
        <p>
	    <li>Ime:<?php echo $Ime; ?></li>
        <li>Prezime:<?php echo $Prezime; ?></li>
        <li>Email:<?php echo $Email; ?></li>
        <li>Broj telefona:<?php echo $Broj; ?></li>
        </p>
        <?php
 			
 		}
}
?>

    </div>
    <script>
        $(document).ready(function(){
    $('.next').on('click',function(){
        var currentImg = $('.active');
        var nextImg = currentImg.next();


        if(nextImg.length){
            currentImg.removeClass('active').css('z-index',-10);
            nextImg.addClass('active').css('z-index',10); 
        }
    });
});

$(document).ready(function(){
    $('.prev').on('click',function(){
        var currentImg = $('.active');
        var prevImg = currentImg.prev();


        if(prevImg.length){
            currentImg.removeClass('active').css('z-index',-10);
            prevImg.addClass('active').css('z-index',10); 
        }
    });
});

    </script>

</body>

</html>
