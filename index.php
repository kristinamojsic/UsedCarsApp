<?php
session_start();
if(isset($_SESSION['autorizovan']))
{

    $rola = $_SESSION['rola'];
    
}else
{
    $rola = 0;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Polovni automobili</title>
    <link rel="icon" href="icon.ico">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="assets/css/untitled.css">-->
</head>

<style>


#signupbut
{
    margin-left:195px;
    width:250px;
    
}

#header a
{
    font-size: 22.5px;
}

#loginbut,#loginbut:hover,#loginbut:focus,#loginbut:visited
{
    
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}
#profilbut
{
    
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    text-decoration:none;
    color:rgba(120,22,77,0.9);
    
}
#logoutbut
{
    position: absolute;
    right: 80px;
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
    right: 190px;
    padding:3.5px 7.5px;
    border-radius:2.5px;
    border:none;
    background-color: rgba(120,22,77,0.9);
    text-decoration:none;
    color:white;
    
}

@media screen and (max-width:769px)
{
    #signupbutholder
    {
        min-width:75%;
        max-width:75%;
        margin:auto;
        overflow:hidden;
    }

    #signupbut
    {
        margin-left:0px;

    }

    #header a
    {
        font-size:20px;
    }
}

@media screen and (max-width:400px)
{
    #header a
    {
        font-size:15px;
    }
}

</style>


<body style="overflow-y:hidden;background: url('assets/img/bg-neon.jpg')no-repeat center center;background-size: cover;">
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container" id="header"><a class="navbar-brand" href="#" style="color: rgba(114,22,77,0.9)">Polovni automobili </a>
        <?php
        
        if($rola == 0 ){
            echo "<div class='collapse navbar-collapse' id='navcol-1'><a class='ml-auto' id='loginbut' href='prijava.php' >Prijavi se</a></div>";
        }
        else
        {
			
            echo "<div class='collapse navbar-collapse' id='navcol-2'><a class='ml-auto' id='prof' href='user/profil.php'>Moj profil</a></div>";
            echo "<div class='collapse navbar-collapse' id='navcol-2'><a class='ml-auto' id='logoutbut' href='odjava.php'>Odjavi se</a></div>";
            
        }
        

    ?>
                
        </div>
        
    </nav>
    <header class="masthead text-white text-center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="text-capitalize text-center text-white mb-5">NAJVEĆI IZBOR POLOVNIH AUTOMOBILA</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form action="aktivniOglasi.php">
                        <div class="form-row">
                            <div class="col-12 col-md-3" id="signupbutholder">
                            <button class="btn btn-primary btn-block btn-lg" type="submit" id="signupbut" style="border:none;background-color: rgba(120,22,77,0.9);padding-left: 18px">Pogledaj ponudu     <i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
   

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
