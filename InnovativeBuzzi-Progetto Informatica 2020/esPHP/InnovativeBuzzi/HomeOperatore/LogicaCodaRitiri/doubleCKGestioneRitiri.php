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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Controllo</title>
    <style>

      body{
        width:100%;
        height: 100%;
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
        border: 0px 0px 0px 0px;
        background: url(../../Login/images/wallpaper.jpg) no-repeat fixed;
        background-size: cover;
        position: fixed;
        font-family: Poppins-Regular, sans-serif;
        color: #FFF;
      }

      .btn {
        color: white;
        font-family: Helvetica, Arial, Sans-Serif;
        font-size: 20px;
        text-decoration: none;
        text-shadow: -1px -1px 1px #616161;
        position: relative;
        padding: 15px 30px;
        box-shadow: 5px 5px 0 #666;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
         transition: all 0.3s ease;
        margin: 10px;
          background: #93a1a7;
          display: inline-block;
          border-radius: 8px;
      }

      .btn:hover {
        box-shadow: 0px 0px 0 #666;
        top: 5px;
        left: 5px;
          background: #36454f;
      }

      .center {
        position: fixed;
        top: 40%;
        left: 40%;
        text-align: center;
        min-width: inherit;
        min-height: inherit;
      }

      .center1 {
        position: fixed;
        top: 25%;
        left: 30%;
        text-align: center;
        min-width: inherit;
        min-height: inherit;
      }
      .viewMoreInfo {
        color: #36bf0b;
      }

    </style>
  </head>
  <body>
    <div class="center1">
      <h1>Si stanno per verificare eventi non ripristinabili</h1>
    </div>
    <div class="center">
      <h3>Si vuole procedere comunque?</h3>
      <a href="<?php echo "http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaRitiri/gestioneRitiri.php?idPren=" . $_GET['idPren'] . ""; ?>" class="btn">SI</a>
      <a href="<?php echo "http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/ritiriFotocopie.php"; ?>" class="btn">NO</a>
    </div>
  </body>
</html>
