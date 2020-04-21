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
  //  echo "operatore";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   	<title>HOME OPERATORE</title>
   	<meta charset="UTF-8">
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

     b.c{
       position: fixed;
       left : 35%;
       top: 15%;
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

     .container-table100 {
       width: 100%;
       min-height: 100vh;
       display: -webkit-box;
       display: -webkit-flex;
       display: -moz-box;
       display: -ms-flexbox;
       display: flex;
       margin-top: 0px;
       flex-wrap: wrap;
       padding: 0px 0px;
       margin-right: 10%;
       position: fixed;
       top: 25%;
       left: 5%;
     }
   </style>
 </head>

 <body>
       <p class="page">
         <div class="limiter">
        		<div class="container-table100">
        			<div class="wrap-table100Operatore">
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
<script src="../HomeUtente/vendor/jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../HomeUtente/js/navbar.js"></script>
<!--===============================================================================================-->
<script src="../HomeUtente/vendor/bootstrap/js/popper.js"></script>
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
<script src="../HomeUtente/js/main.js"></script>


 </body>
 </html>
