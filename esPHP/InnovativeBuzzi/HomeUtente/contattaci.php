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
      margin: 0;
    }
    body {
      background: url(images/wallpaper.jpg) no-repeat;
      background-size: cover;
      position: relative;
      overflow: scroll;
      height: auto;
      width: 100%;
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

    .text-title{
      margin-top: 100px;
      width: 100%;
      font-size: 80px;
      color: green;
      text-align: center;
    }

    .parallax{
      background-image: url("images/pa.jpg");
      width: 100%;
      height: 265px;
      max-height: 500px;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    b{
      color: green;
      font-size: 35px;
      border-bottom: 1px solid #249d8b;
      text-align: center;
    }
    p{
      text-align: center;
      color: white;
    }
    .info{
      width: 100%;
      height: 100%;
      min-height: 200px;
      color: white;
      padding: 0;
    }
    .info-desc{
      text-align: center;
      padding: 20% 20px;
      float: left;
      font-size: 15px;
      width: 50%;
      max-width: 50%;
      height: 100%;
      border-right: 1px solid white;
    }
    .info-ora{
      padding: 10% 20px;
      text-align: center;

      float: right;
      font-size: 15px;
      width: 50%;
      max-width: 50%;
      height: 50%;
      max-height: 50%;
    }
    .info-cont{
      padding: 10% 20px;
      text-align: center;

      float: right;
      font-size: 15px;
      width: 50%;
      max-width: 50%;
      height: 50%;
      max-height: 50%;
    }
  </style>
</head>

<header>

  <nav class="nav">
    <a href="HomeUtente.php" class="nav-item" active-color="orange">Home</a>
    <a href="../Prenotazione/CaricamentoFile/EffettuaPrenotazione.php" class="nav-item" active-color="red">Effettua Prenotazione</a>
    <a href="" class="nav-item is-active" active-color="green">Contatti</a>
    <a href="HomeUtente.php?logout=true" class="nav-item" active-color="blue">Logout</a>
    <span class="nav-indicator"></span>
  </nav>

</header>

<body>

    <div class="parallax"></div>
    <div class="info">
      <div class="info-desc">
        <b>SALA STAMPA</b>
        <br />
        <br />
        <p>Siamo la sala stampa, in attivo dagli albori di questo fantastico istituto a voi conosciuto come ITIS Buzzi</p>
      </div>

      <div class="info-ora">
        <b>ORARIO</b>
        <p>Lunedì - Sabato </p>
        <p>8:00 - 13:00</p>
      </div>
      <div class="info-cont">
        <b>CONTATTI</b>
        <p>Numero di telefono: 320302309</p>
      </div>
    </div>



<script src="js/navbar.js"></script>
</body>

</html>
