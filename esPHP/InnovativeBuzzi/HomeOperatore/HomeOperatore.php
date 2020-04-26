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
     <a href="CreaAcquisto/CreaAcquisto.php" class="nav-item" active-color="purple">Registra Acquisto</a>
     <a href="VisualizzaPrenotazioni.php" class="nav-item"  active-color="red">Prenotazioni</a>
     <a href="ritiriFotocopie.php" class="nav-item" active-color="#ee6c4d">Ritiri</a>
     <a href="CronologiaAcquisti.php" class="nav-item" active-color="green">Storico Acquisti</a>
     <a href="logout.php" class="nav-item" active-color="blue">Logout</a>

     <span class="nav-indicator"></span>
     <?php
      $usr=$_SESSION["usernameBZ"];
      echo "<p style=\"border-style:ridge; margin-top: 18px; margin-left: 24%; margin-right: auto;\"> Username: $usr </p>";

     ?>
   </nav>
  </header>

  <div class="cont">

    <div class="registraAcquisto">
      <div class="registraAcquisto-text">
        <b style="color: purple; ">REGISTRA ACQUISTO</b>
        <p style="text-shadow: 2px 2px 5px black">Qui accanto troverai il modulo da compilare per registrare un acquisto! Clicca sull'immagine alla destra o il pulsante sottostante per andare alla pagina interessata</p><br />
        <a href="CreaAcquisto/CreaAcquisto.php" class="btn btn-primary">Registra acquisto</a>
      </div>
      <img src="img/Cattura.png" alt="registraAcquisto" style=" width: 500px; max-width: 60%;  max-height: 310px; margin-left: 50%;"/>
   </div>

   <div class="prenotazioni">
     <div class="prenotazioni-text">
       <b style="color: red">PRENOTAZIONI</b><br>
       Alla sinistra troverai la tabella con la lista delle prenotazioni<br />
       <a href="VisualizzaPrenotazioni.php" class="btn btn-primary">Prenotazioni</a>
     </div>
   </div>

   <div class="ritiri">
     <div class="ritiri-text">
       <b style="color: brown">RITIRI</b><br>
       Alla destra troverai la tabella dei ritiri<br />
       <a href="ritiriFotocopie.php" class="btn btn-primary" style="width: 130px">Ritiri</a>
     </div>
   </div>

   <div class="acquisti">
     <div class="acquisti-text">
       <b style="color: green">STORICO ACQUISTI</b><br>
       Alla sinistra troverai la tabella dei ritiri<br />
       <a href="CronologiaAcquisti.php" class="btn btn-primary">Acquisti</a>
     </div>
   </div>

  </div>



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
