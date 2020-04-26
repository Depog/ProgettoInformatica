<?php
    session_start();
    $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
    $porta=$_SERVER['SERVER_PORT'];
    if(!isset($_SESSION["usernameBZ"])){
      header("location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/login/index.php");
    }


 ?>
<html>
<head>

  <head>
  	<title>Contattaci</title>
  	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--==============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="css/util.css">
    <link href="css/main.css" rel="stylesheet" type="text/css"  >
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>

  @font-face {
    font-family: Lato-Regular;
    src: url('../fonts/Lato/Lato-Regular.ttf');
  }

  @font-face {
    font-family: Lato-Bold;
    src: url('../fonts/Lato/Lato-Bold.ttf');
  }
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
      margin: 0;
    }
    body {

      display: -webkit-box;
      display: flex;
      height: 100vh;
      width: 100%;
      -webkit-box-pack: center;
              justify-content: center;
      padding: 0 20px;
      background-color: #2f3640;
    }
    .container-table100 {
      width: 100%;
      min-height: 100vh;
      display: -webkit-box;
      display: -webkit-flex;
      display: -moz-box;
      display: -ms-flexbox;
      display: flex;
      margin-top: 200px;
      flex-wrap: wrap;
      margin-right: 10%;
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
      background-color: green;
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
      color: green;
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

    .container .box {
        width:100%;
        height: 80%;
    }
    .container .box .box-row {
        display:table-row;
        height: 80%;
    }
    .container .box .box-cell {
        display:table-cell;
        max-width: 50%;
        width:50%;
        padding:10px;
    }
    .container .box .box-cell.box1 {
        margin-left: auto;
        margin-right: 50%;
        color:black;
        text-align:justify;
        background: white;
     }
    .container .box .box-cell.box2 {
      margin-left: 50%;
      margin-right: auto;
      background: blue;
        text-align:right;
    }

    .text-title{
      margin-top: 100px;
      width: 100%;
      font-size: 80px;
      color: green;
      text-align: center;
    }
  </style>
  </head>

  <body>
    <header>
      <nav class="nav">
        <a href="HomeUtente.php" class="nav-item" active-color="orange">Home</a>
        <a href="" class="nav-item is-active" active-color="green">Contattaci</a>
        <a href="../Prenotazione/CaricamentoFile/EffettuaPrenotazione.php" class="nav-item" active-color="red">Effettua Prenotazione</a>
        <a href="HomeUtente.php?logout=true" class="nav-item" active-color="blue">Logout</a>
        <span class="nav-indicator"></span>
      </nav>
    </header>


    <div class="container">
      <div class="text-title">
        <b>SALA STAMPA</b>
      </div>
        <div class="box">
            <div class="box-row">
                <div class="box-cell box1">
              Bella raga siamo la sala stampaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </div>
                <div class="box-cell box2">
            9:00 - 10:00
            <p>
              34423423 - 23423423
            </p>
                </div>
            </div>
        </div>
    </div>
<script src="js/navbar.js"></script>
</body>

</html>
