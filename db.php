<?php


class Db 
{
    const host = "localhost";
    const dbname = "si2";
    const user = "root";
    const pass = "";

    private $dbh;

    function __construct() 
    {
        try
        {
            $string = "mysql:host=".self::host.";dbname=".self::dbname;
            $this->dbh = new PDO($string, self::user, self::pass);
        } catch (Exception $e) 
        {
            echo "greska prilikom konekcije sa bazom!";
            die();
        }
    }
    function __destruct() 
    {
        $this->dbh = null;
    }

    public function proveriKorisnika($email,$sifra)
    {
        $sifra = sha1($sifra);
        $sql = "SELECT * FROM korisnik WHERE email = '$email' AND sifra = '$sifra'";

        $pdo_izraz = $this->dbh->query($sql);
        if($pdo_izraz)
        {
            return $pdo_izraz->fetch(PDO::FETCH_ASSOC);
        }
        
    }

    public function dodajKorisnika($ime,$prezime,$email,$sifra,$broj,$image){
        
        try 
        {
            
            $sifraa=sha1($sifra);
            $sql = "INSERT INTO korisnik(ime, prezime, email, sifra, broj,slika) VALUES ('$ime','$prezime','$email', '$sifraa', '$broj','$image')";
            $pdo_izraz = $this->dbh->exec($sql);
            $sql2 = "SELECT idKorisnika  from korisnik where email='$email'";
            $pdo_izraz2 = $this->dbh->query($sql2);
            $id = $pdo_izraz2->fetch(PDO::FETCH_ASSOC)['idKorisnika'];
            return $id;
        }
        catch(PDOException $e)
        {
            echo "Greska: ";
            echo $e->getMessage();
        }

    }

    public function uzmiPodatkeOKorisniku($id_korisnika)
    {
        try
        {
            $sql = "SELECT * FROM korisnik WHERE idKorisnika='$id_korisnika'";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                //var_dump($pdo_izraz->fetchALL(PDO::FETCH_ASSOC));
                return $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
            }
        }
        catch(PDOException $e)
        {
            echo "Greska: ";
            echo $e->getMessage();
           
        }
        

    }

    public function azurirajPodatke($id_korisnika,$ime, $prezime,$email,$sifra,$broj)
    {
        
        try
        {
            $sifra = sha1($sifra);
            $sql = "UPDATE korisnik SET ime = :ime, prezime = :prezime, email = :email, sifra = :sifra, broj = :broj WHERE idKorisnika = :id_korisnika";
            $pdo_izraz = $this->dbh->prepare($sql);
            $pdo_izraz->bindParam(':ime', $ime);
            $pdo_izraz->bindParam(':prezime', $prezime);
            $pdo_izraz->bindParam(':email', $email);
            $pdo_izraz->bindParam(':sifra', $sifra);
            $pdo_izraz->bindParam(':broj', $broj);
            $pdo_izraz->bindParam(':id_korisnika', $id_korisnika);
            $pdo_izraz->execute();
            return true;
        }
        catch(PDOException $e)
        {
            echo "Greska: ";
            echo $e->getMessage();
            return false;
        }
    }
	


public function stampajOglas($id_oglasa)
    {
        try
        {
           
            $sql = "SELECT * from oglas WHERE idOglasa = '$id_oglasa'";
            $pdo_izraz = $this->dbh->query($sql);
            return $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
        }
        
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
    }

    public function stampajMojeOglase($idKorisnika)
    {
        try
        {
            
            $sql = "SELECT * from oglas WHERE idKorisnika = '$idKorisnika' ORDER BY datumPostavljanja DESC";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                return $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
               
            }
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
        
    }

    
public function obrisiOglas($id_oglasa)
    {
        try{
            $sql = "DELETE FROM oglas WHERE idOglasa = $id_oglasa";
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }
        catch(PDOException $e){
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }    
        
    }



public function dodajSacuvani($id_korisnika,$id_oglasa)
    {
        try 
        {
            $sql = "INSERT INTO sacuvanioglasi(idKorisnika, idOglasa) VALUES ('$id_korisnika', '$id_oglasa')";
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
    }

    public function obrisiSacuvani($id_korisnika,$id_oglasa){
        try 
        {
            $sql = "DELETE FROM sacuvanioglasi where idOglasa = $id_oglasa AND idKorisnika = $id_korisnika";
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }   
    }
    public function prikaziSacuvane($id_korisnika)
    {
        try 
        {
            $sql = "SELECT nazivOglasa,o.idOglasa, v.email as vlasnik FROM sacuvanioglasi s inner join oglas o on s.idOglasa = o.idOglasa inner join korisnik v on o.idKorisnika = v.idKorisnika where s.idKorisnika = $id_korisnika and o.aktivan = 1";
           # $sql = "SELECT * from oglas o join sacuvanioglasi s where o.idOglasa = s.idOglasa and s.idKorisnika = k.idKorisnika and s.idKorisnika = $id_korisnika AND o.aktivan = 1";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                $niz = $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
                return $niz;
            }    

        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        } 
    }

    public function proveriSacuvane($idKorisnika,$idOglasa)
    {
        try
        {
            $sql = "SELECT * FROM sacuvanioglasi WHERE idKorisnika = $idKorisnika AND idOglasa = $idOglasa";
            $pdo_izraz = $this->dbh->query($sql);
            $res = $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
            return ($res==null);
            
            
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
    }
    //proveri sacuvane?

    public function izmeniKorisnika($idKorisnika,$ime,$prezime,$email,$broj)
        {
        try 
        {   
            
            $sql="UPDATE korisnik SET ime = '$ime', prezime = '$prezime', email = '$email', broj = '$broj' WHERE idKorisnika = '$idKorisnika'";
            //$sql="UPDATE korisnik SET ime = :ime, prezime = :prezime, email = :email, broj = :broj WHERE idKorisnika = :idKorisnika";
            //$pdo_izraz=$this->dbh->prepare($sql);
            //$pdo_izraz->bindParam(':ime', $ime);
            //$pdo_izraz->bindParam(':prezime', $prezime);
            //$pdo_izraz->bindParam(':email', $email);
            //$pdo_izraz->bindParam(':broj',$broj);
            //$pdo_izraz->bindParam(':idKorisnika', $id_korisnika);
            //$pdo_izraz->execute();
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }        
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
        }
	public function izmeniSifruKorisnika($idKorisnika,$sifra)
        {
        try 
        {   
            $sifra = sha1($sifra);
            $sql="UPDATE korisnik SET sifra = '$sifra' WHERE idKorisnika = '$idKorisnika'";
            //$sql="UPDATE korisnik SET ime = :ime, prezime = :prezime, email = :email, broj = :broj WHERE idKorisnika = :idKorisnika";
            //$pdo_izraz=$this->dbh->prepare($sql);
            //$pdo_izraz->bindParam(':ime', $ime);
            //$pdo_izraz->bindParam(':prezime', $prezime);
            //$pdo_izraz->bindParam(':email', $email);
            //$pdo_izraz->bindParam(':broj',$broj);
            //$pdo_izraz->bindParam(':idKorisnika', $id_korisnika);
            //$pdo_izraz->execute();
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }        
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
        }
    public function izbrisiKorisnika($idKorisnika){
        try{
            $sql = "DELETE FROM korisnik WHERE idKorisnika = $idKorisnika";
            $pdo_izraz = $this->dbh->exec($sql);
            $sql2 ="DELETE FROM oglas WHERE idKorisnika = $idKorisnika";
            $pdo_izraz2 = $this->dbh->exec($sql2);
            return true;
        }
            catch(PDOException $e){
                echo "GRESKA: ";
                echo $e->getMessage();
                return false;
            }    
        }

    public function sviKorisnici()
        {
        try 
        {
            $sql = "SELECT * from korisnik";
            $pdo_izraz = $this->dbh->query($sql);
            if ($pdo_izraz){
                return $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
            };

            
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
    }


    public function prihvatiOglas($idOglasa)
    {
        try 
        {   
            $aktivan = 1;
            $sql="UPDATE oglas SET aktivan = :aktivan WHERE idOglasa = :idOglasa";
            $pdo_izraz=$this->dbh->prepare($sql);
            $pdo_izraz->bindParam(':aktivan', $aktivan);
            $pdo_izraz->bindParam(':idOglasa', $idOglasa);
            $pdo_izraz->execute();
            return true;
        }        
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
    }
    public function odbijOglas($idOglasa)
    {
        try 
        {   
            $aktivan = 0;
            $sql="UPDATE oglas SET aktivan = :aktivan WHERE idOglasa = :idOglasa";
            $pdo_izraz=$this->dbh->prepare($sql);
            $pdo_izraz->bindParam(':aktivan', $aktivan);
            $pdo_izraz->bindParam(':idOglasa', $idOglasa);
            $pdo_izraz->execute();
            return true;
        }        
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
    }

    public function neprihvaceniOglasi()
    {
        try
        {
            $sql = "SELECT * FROM oglas WHERE aktivan = 2";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                return count($pdo_izraz->fetchALL(PDO::FETCH_ASSOC));
            }
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
    }
    public function aktivniOglasi()
    {
        try
        {
            $sql = "SELECT * FROM oglas o INNER JOIN korisnik k ON o.idKorisnika = k.idKorisnika WHERE aktivan = 1 ORDER BY datumPostavljanja desc";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                return count($pdo_izraz->fetchALL(PDO::FETCH_ASSOC));
            }
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }
    }

    public function dodajOglas($idKorisnika, $nazivOglasa, $slika, $opis, $godinaProizvodnje, $marka, $predjeniKilometri, $cena, $vrstaPogona, $tip, $vrstaMenjaca, $datumPostavljanja)
    {
        try 
        {
            $sql = "INSERT INTO oglas(idKorisnika, nazivOglasa, slika, opis, godinaProizvodnje, marka, predjeniKilometri, cena, vrstaPogona, tip, vrstaMenjaca, datumPostavljanja) VALUES ('$id_korisnika', '$nazivOglasa','$slika', '$opis', '$godinaProizvodnje', '$marka', '$predjeniKilometri', '$cena', '$vrstaPogona', '$tip', '$vrstaMenjaca', '$datumPostavljanja')";
            $pdo_izraz = $this->dbh->exec($sql);
            return true;
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
            return false;
        }
    }
    public function sviOglasi()
    {
        try
        {
            $sql = "SELECT * FROM oglas o inner join korisnik k on o.idKorisnika = k.idKorisnika";
            $pdo_izraz = $this->dbh->query($sql);
            if($pdo_izraz)
            {
                return $pdo_izraz->fetchALL(PDO::FETCH_ASSOC);
            }
        }
        catch(PDOException $e)
        {
            echo "GRESKA: ";
            echo $e->getMessage();
        }

    }

}
?>