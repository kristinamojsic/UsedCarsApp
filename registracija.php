<?php
session_start();
if(isset($_SESSION['email']))
{
    header("Location:index.php");
}
require_once 'db.php';
$db = new Db();
if(isset($_POST['submit']))
{   
    
    $ime = $_POST['name'];
    $prezime = $_POST['surname'];
    $email = $_POST['email'];
    $sifra = $_POST['password'];
    $broj = $_POST['phone'];
   
    
    
    
    

    if ($id = $db->dodajKorisnika($ime,$prezime,$email,$sifra,$broj,$image))
    {
        $_SESSION['autorizovan'] = $id;
        $_SESSION['email'] = $email;
        if($ime == "admin" && $sifra == "admin")
        {
            $_SESSION['rola'] = 2;
        }
        else 
        {
            $_SESSION['rola'] = 1;
        }
            echo '<script type="text/javascript"> window.open("user/profil.php","_self");</script>'; 
        
    }
    else
    {
        echo "<br><br><p style='color:red'>Registracija trenutno nije moguća!Pokušajte kasnije.</p>";
    }
    
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register - Rustom</title>
<link rel="icon" href="icon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
 <!--Google Fonts-->
 <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!--BOOTSTRAP CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
body,html
{
    height: 100%;
    width:100%;
    font-family: 'Titillium Web', sans-serif;
    font-size:1.1rem;
    overflow-y:auto;
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
.container
{
    border-radius:5px;
    height: fit-content;
    width: 35%;
    z-index:1;
    top: 50%;
    left:50%;
    position: absolute;
    transform: translate(-50%, -50%);
    background-color: rgba(0,0,0,0.8);
}
.main-logo
{
    width: 100%;
    text-align: center;
    padding-top:20px;
    color: white;
}
#logo
{
    background-color: transparent;
    width:115px;
    border-radius:50%;
}
.main-header
{
    color: #333;
    margin-top:30px;
    font-size: 30px;
    font-weight: 300;
    text-align: center;
    text-shadow: none;
    color: white;
    padding: 10px;

}
.main
{
    font-size: 16px;
    font-weight: 600;
    margin:20px auto;
    margin-top:10px;
    padding: 20px;
    background-color: #fff;
    
    border: 1px solid #d8dee2;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.19), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.btn-primary
{
    width: 100%;
}
@media only screen and (max-width: 800px) {
    .container
    {
        min-width: 90%;
    }
}

@media only screen and (max-width: 1200px) {
    .container
    {
        width: 50%;
    }
}
</style>
<body>
<div class = "bg"></div>
<div class="container" >


<div class="main-header"> Registracija </div>

<div class= "main">
<form id="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <div class="form-group">
        <label for="email">E-adresa</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">

        <label for="ime">Ime</label>
        <input type="text" class="form-control" name="name" required >
    </div>
    <div class="form-group">
        <label for="prezime">Prezime</label>
        <input type="text" class="form-control" name="surname" required >
    </div>
  
    <div class="form-group">
        <label for="password">Šifra</label>
        <input type="password" class="form-control" name="password" required >
    </div>

    <div class="form-group">
        <label for="broj">Broj telefona</label>
        <input type="text" class="form-control" name="phone" required >
    </div>

    <div style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary" style="background-color:rgba(120,22,77,0.9)">Potvrdi</button></div>
</form>
</div>
</div>
</div>
</body>
</html>