<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];
  if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["logout"])) {
      $_SESSION["usernameBZ"]=null;
      header("location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");
      die("");
    }
  }

  if(!isset($_SESSION["usernameBZ"])){
    header("location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/login/index.php");
  }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../HomeUtente/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/animate/animate.css">
<!--==============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../HomeUtente/css/util.css">
  <link href="../HomeUtente/css/main.css" rel="stylesheet" type="text/css"  >
<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
  @import url("https://fonts.googleapis.com/css?family=DM+Sans:500,700&display=swap");
  *{
    margin: 0;
    padding: 0;
    text-decoration: none;
  }

  header{
    z-index: 9999;
    position: fixed;
    height: auto;
    width: 100%;
    background: #FFFF;
  }
  .inner-width{
    background: black;
    max-width: 100%;
    padding: 0 10px;
    margin: auto;
  }
  body {

    display: -webkit-box;
    display: flex;
    height: 100vh;
    width: 100%;
    -webkit-box-pack: center;
            justify-content: center;
    padding: 0 0;
    background-color: #2f3640;
  }

  .nav {
    display: -webkit-inline-box;
    display: inline-flex;
    position: relative;
    overflow: hidden;
    width: 100%;
    background-color: #fff;
    margin-left: 500px;
    box-shadow: 0 10px 40px rgba(159, 162, 177, 0.8);
    float: right;
  }

  .nav-item {
    color: #83818c;
    padding: 20px;
    text-decoration: none;
    -webkit-transition: .3s;
    transition: .3s;
    margin: 0 6px;
    z-index: 1;
    font-family: 'DM Sans', sans-serif;
    font-weight: 500;
    position: relative;
  }
  .nav-item:before {
    content: "";
    position: absolute;
    bottom: -6px;
    right: 0;
    width: 100%;
    height: 5px;
    background-color: orange;
    border-radius: 8px 8px 0 0;
    opacity: 0;
    -webkit-transition: .3s;
    transition: .3s;
  }

  .nav-item:not(.is-active):hover:before {
    opacity: 1;
    bottom: 0;
  }

  .nav-item:not(.is-active):hover {
    color: orange;
  }

  .nav-indicator {
    position: absolute;
    right: 0;
    bottom: 0;
    height: 4px;
    -webkit-transition: .4s;
    transition: .4s;
    height: 5px;
    z-index: 1;
    border-radius: 8px 8px 0 0;
  }

  @media (max-width: 580px) {
    .nav {
      overflow: auto;
    }
  }
</style>
</head>

<body>
  <header>
           <nav class="nav">
             <a href="" class="nav-item is-active " active-color="orange">Home</a>
             <a href="VisualizzaPrenotazioni.php" class="nav-item"  active-color="red">Visualizza Prenotazioni</a>
             <a href="ritiriFotocopie.php" class="nav-item" active-color="#ee6c4d">Ritiri Fotocopie</a>
             <a href="CreaAcquisto/CreaAcquisto.php" class="nav-item" active-color="purple">Crea Acquisto</a>    
             <a href="CronologiaAcquisti.php" class="nav-item" active-color="green">Cronologia acquisti</a>
             <a href="logout.php" class="nav-item" active-color="blue">Logout</a>
             <span class="nav-indicator"></span>
           </nav>
         </header>

  <?php
  $homeUtente="
          <!----------------------PRENOTAZIONE----------------------------------->
            <div class=\"registraAcquisto\">

                <div class=\"registraAcquisto-text\">
                  <b>REGISTRA ACQUISTO</b><br>
                  Qui accanto troverai il modulo da compilare per registrare un acquisto! Clicca sull'immagine alla sinistra, il bottone per andare nella pagina oppure direttamente dalla barra di navigazione in alto<br /><br />
                  <a href=\"http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/.php\" class=\"btn btn-primary\">Registra acquisto</a>
                </div>
           </div>


            <!----------------------VISUALIZZA CODA RITIRO STAMPA----------------------------------->
              <div class=\"visualizzaCodaRitiri\">

                  <div class=\"visualizzaCodaRitiri-text\">
                    <b>VISUALIZZA CODA RITIRO STAMPA</b><br>
                    Qui accanto troverai il modulo da compilare per registrare un acquisto! Clicca sull'immagine alla sinistra, il bottone per andare nella pagina oppure direttamente dalla barra di navigazione in alto<br /><br />
                    <a href=\"http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/.php\" class=\"btn btn-primary\">Registra acquisto</a>
                  </div>
             </div>
             <!----------------------VISUALIZZA CODA STAMPA----------------------------------->
               <div class=\"visualizzaCodaPrenotazioni\">

                   <div class=\"visualizzaCodaPrenotazioni-text\">
                     <b>VISUALIZZA CODA PRENOTAZIONI</b><br>
                     Qui accanto troverai il modulo da compilare per registrare un acquisto! Clicca sull'immagine alla sinistra, il bottone per andare nella pagina oppure direttamente dalla barra di navigazione in alto<br /><br />
                     <a href=\"http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/.php\" class=\"btn btn-primary\">Registra acquisto</a>
                   </div>
              </div>
       ";

       echo $homeUtente;
?>








<!--===============================================================================================-->
	<script src="../HomeUtente/vendorjquery/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="../HomeUtente/js/navbar.js"></script>
<!--===============================================================================================-->
	<script src="../HomeUtente/endor/bootstrap/js/popper.js"></script>
	<script src="../HomeUtente/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../HomeUtente/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
      var ps = new PerfectScrollbar(this);
      $(window).on('resize', function(){
        ps.update();
      })
    });
</script>
<!--===============================================================================================-->
	<script src="../HomeUtente/js/navbar.js"></script>

</body>
</html>
