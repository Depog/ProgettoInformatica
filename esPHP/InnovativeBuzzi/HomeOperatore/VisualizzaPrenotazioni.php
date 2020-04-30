<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  /*Controlli per vedere se si e' eseguito il login*/
  if(isset($_SESSION["usernameBZ"])){
    //rimango qua
  }else{
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");  //reinderizzo alla home
  }
?>

<html>
<head>
  <title>HOME OPERATORE</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../HomeUtente/images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../HomeUtente/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="../HomeUtente/css/util.css">
  <link href="../HomeUtente/css/main.css" rel="stylesheet" type="text/css" >
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
     height: auto;
     width: 100%;
     background: #FFFF;
   }
   body {
     background: url(img/wallpaper.jpg) no-repeat;
     background-size: cover;
     height: auto;
     width: auto;
     overflow: scroll;
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
     background-color: red;
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
     color: red;
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
   .container-table1003 {
     margin-top: 10%;
     width: 100%;
     min-height: 100vh;
     display: -webkit-box;
     display: -webkit-flex;
     display: -moz-box;
     display: -ms-flexbox;
     display: flex;
     flex-wrap: wrap;
   }
   .infoPr{
     margin-top: 80px;
     width: 85%;
     height: 25%;
   }
   .infoPr-text{
     height: 100%;
     width: 100%;
     color: white;
     font-size: 30px;
     text-align: center;
   }
   .all{
     width: 100%;
     height: 50px;
   }
   .usr{
     padding-top: 20px;
     width: 80px;
     height: 100%;
     margin-left: 24%;
     margin-top: ;
     text-align: center;
   }
   .usr-text{
     font-family: 'DM Sans', sans-serif;
   }
   </style>
 </head>

 <body>
   <header>
     <nav class="nav">
       <a href="HomeOperatore.php" class="nav-item" active-color="orange">Home</a>
       <a href="CreaAcquisto/CreaAcquisto.php"  class="nav-item" active-color="purple">Registra Acquisto</a>
       <a href="" class="nav-item is-active "  active-color="red">Prenotazioni</a>
       <a href="ritiriFotocopie.php" class="nav-item" active-color="#ee6c4d">Ritiri</a>
       <a href="CronologiaAcquisti.php" class="nav-item" active-color="green">Storico Acquisti</a>
       <a href="logout.php" class="nav-item" active-color="blue">Logout</a>
       <?php
        $usr=$_SESSION["usernameBZ"];
        echo "<div class=\"usr\">
          <div class=\"usr-text\"> Ciao: $usr! </p>
        </div>";
       ?>
       <span class="nav-indicator"></span>
     </nav>
   </header>


	<div class="container-table1003" style="margin-left: 6%">
    <div class="infoPr">
      <div class="infoPr-text">
        <b style="color: red">PRENOTAZIONI</b>
        <p>Questa è la tabella contenente tutte le prenotazioni attive che ancora devono essere elaborate. Se devi consultare la lista completa, clicca il pulsante blu posto sotto la tabella</p>
      </div>
    </div>
		<div class="wrap-table100Operatore" style="margin-top: 0">
			<div class="table100 ver3 m-b-110">
         <?php
         //Creazione Coda Delle Stampe in modo dinamico
           include 'LogicaCodaStampa/codaStampa.php';
           $app = caricaCodaStampa($ip,$porta);
           echo $app;
         ?>
			</div>
		</div>
	</div>


<div class="all">
  <a href="CronologiaPrenotazioni.php" class="btn btn-primary" style="margin-left: 40%"> Visualizza storico completo </a>
</div>

<script src="../HomeUtente/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../HomeUtente/js/navbar.js"></script>
<script src="../HomeUtente/vendor/bootstrap/js/popper.js"></script>
<script src="../HomeUtente/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../HomeUtente/vendor/select2/select2.min.js"></script>
<script src="../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
		$('.js-pscroll').each(function(){
  		var ps = new PerfectScrollbar(this);
  	  $(window).on('resize', function(){
  			ps.update();
      })
    });
</script>
<script src="../HomeUtente/js/main.js"></script>

</body>
</html>
