<?php
<<<<<<< HEAD
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  /*Controlli per vedere se si e' eseguito il login*/
  if(isset($_SESSION["usernameBZ"])){
    //rimango qua
  }else{
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");  //reinderizzo alla home
  }
  //  echo "operatore";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   	<title>HOME OPERATORE</title>
   	<meta charset="UTF-8">
   	<meta name="viewport" content="../HomeUtente/Table/width=device-width, initial-scale=1">
   <!--===============================================================================================-->
   	<link rel="icon" type="image/png" href="../HomeUtente/Table/images/icons/favicon.ico"/>
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/vendor/bootstrap/css/bootstrap.min.css">
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/vendor/animate/animate.css">
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/vendor/select2/select2.min.css">
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/vendor/perfect-scrollbar/perfect-scrollbar.css">
   <!--===============================================================================================-->
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/css/util.css">
   	<link rel="stylesheet" type="text/css" href="../HomeUtente/Table/css/main.css">
   <!--===============================================================================================-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   <style>
     b{
       position: absolute;
       left : 800px;
       top: 170px;
     }

     b.c{
       position: : fixed;
       left : 230px;
       top: 150px;
       font-size: 40px;
       color: #fff;
     }

     .page {
       width:100%;
       height: 100%;
       margin: 0px 0px 0px 0px;
       padding: 0px 0px 0px 0px;
       border: 0px 0px 0px 0px;
       background: url(../Login/images/wallpaper.jpg) no-repeat fixed;
       background-size: cover;
       position: fixed;
       font-family: Poppins-Regular, sans-serif;
     }


   </style>
 </head>

 <body>
       <?php
 		   /*$CreaPreno="<b><button onclick=\"window.location.href='http://$ip:$porta/esPHP/InnovativeBuzzi/Prenotazione/CreaPrenotazione.php'\" type=\"button\" class=\"btn btn-outline-success\">Crea Prenotazione</button></b>";
 			 echo $CreaPreno;*/
       ?>
       <p class="page">
         <div class="limiter">
        		<div class="container-table100">
        			<div class="wrap-table100">
        				<b class="c">Coda Stampa</b>
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
        	</div>
       </p>

 <!--===============================================================================================-->
 	<script src="../HomeUtente/Table/vendor/jquery/jquery-3.2.1.min.js"></script>
 <!--===============================================================================================-->
 	<script src="../HomeUtente/Table/vendor/bootstrap/js/popper.js"></script>
 	<script src="../HomeUtente/Table/vendor/bootstrap/js/bootstrap.min.js"></script>
 <!--===============================================================================================-->
 	<script src="../HomeUtente/Table/vendor/select2/select2.min.js"></script>
 <!--===============================================================================================-->
 	<script src="../HomeUtente/Table/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 	<script>
 		$('.js-pscroll').each(function(){
 			var ps = new PerfectScrollbar(this);

 			$(window).on('resize', function(){
 				ps.update();
 			})
 		});


 	</script>
 <!--===============================================================================================-->
 	<script src="../HomeUtente/Table/js/main.js"></script>

 </body>
 </html>
