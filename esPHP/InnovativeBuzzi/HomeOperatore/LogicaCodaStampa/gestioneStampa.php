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

  include 'codaStampa.php';
 ?>
 <?php
   if(isset($_GET['idPren'])) {
      //tutto ok
      checkStampa($ip,$porta);//per "modificare lo stato della prenotazione" ovevro segnare che sono state stampate tutte le copie richieste nella prenotazione
      //fine modifiche allo stato della prenotzaione
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/HomeOperatore.php");
   }else {
     //_ERR
     header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
   }

 ?>
