<?php
 include('db2.php');



if ($_POST) {
	$marka = $_POST['marka1'];
	$pogon = $_POST['pogon1'];
	$menjac = $_POST['menjac1'];
	$god = $_POST['god1'];
    $cen = $_POST['cen1'];
	$kil = $_POST['kil1'];

 if ($marka=='' && $pogon=='' && $menjac=='' && $god=='' && $cen == '' && $kil == '') {
 		$query = "SELECT * FROM `oglas` WHERE aktivan=1";
 	}else{

 		if ($marka!='') {
 			$markaSearch="`marka` LIKE '$marka' ";
 		}else {
 			$markaSearch = "`marka` !='NULL'";
 		}

 		if ($pogon!='') {
 			$pogonSearch="`vrstaPogona` LIKE '$pogon' ";
 		}else {
 			$pogonSearch = "`vrstaPogona` !='NULL'";
 		}

 		if ($menjac!='') {
 			$menjacSearch="`vrstaMenjaca` LIKE '$menjac' ";
 		}else {
 			$menjacSearch = "`vrstaMenjaca` !='NULL'";
 		} 

 		if ($god!='') {
 			$godSearch="`godinaProizvodnje` >= '$god' ";
 		}else {
 			$godSearch = "`godinaProizvodnje` !='NULL'";
 		}
        
        if ($cen!='') {
            $cenSearch="`cena` < '$cen' ";
        }else {
            $cenSearch = "`cena` !='NULL'";
        }

		if ($kil!='') {
            $kilSearch="`predjeniKilometri` < '$kil' ";
        }else {
            $kilSearch = "`predjeniKilometri` !='NULL'";
        }

 		$query = "SELECT * FROM `oglas` WHERE $markaSearch AND $pogonSearch AND $menjacSearch AND $godSearch AND $cenSearch AND $kilSearch AND aktivan=1";
 	}

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
				              <a href="prikaz.php?idOglasa=<?php echo $oglas['idOglasa']?>">Pogledaj</a>
				            </div>
				          </div>
				        </div>

             <?php
 			}
 		}	
}
?>