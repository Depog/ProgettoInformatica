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

  include '.././connessione.php';


  if(isset($_POST['username'])){
      $username = $_POST['username'];
      $co = connect();
      $sql = "SELECT p.* FROM persona p WHERE p.username=\"$username\" AND p.tipo !=\"Operatore\" ";
      $result = $co->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          $codFisc = $row['codiceFiscale'];
          $co->close();
      } else {
        $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
      }


  }else {
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
  }

  if(isset($_POST['tipoF'])) {
    //Ho inserito il tipo di formato ora controllo se c'è nel db
    $tipoF = $_POST['tipoF'];
    $co = connect();
    $sql = "SELECT f.* FROM formato f WHERE f.tipo=\"$tipoF\" ";
    $result = $co->query($sql);

    if ($result->num_rows > 0) {
        $co->close();//il formato inserito e' presente nel db , ok
    } else {
      $co->close();//il formato e' stato inventato, non ok
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
    }
  }else {//Non ho inserito il formato , non ok
  header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
  }

  if(isset($_POST['descrizione'])) {
    //Ho inserito la descrizione , ok

  } else {//Non ho inserito la descrizione , non ok
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
  }

  if(isset($_POST['quantita'])) {
    //Ho inserito la quantita , ok

  } else {//Non ho inserito la quantita , non ok
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/CreaAcquisto/CreaAcquisto.php");
  }
  //--------------------------------------------------------------CONTROLLI SUPERATI

  $co = connect();
  $dataAttuale = date("Y/m/d");
  $oraAttuale = date("h:i:s");



  $quant = $_POST['quantita'];


  try {
    $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

    $sql = "INSERT INTO acquisto(codiceFiscale,dataAcquisto,orarioAcquisto,quantità) value (\"$codFisc\",\"$dataAttuale\",\"$oraAttuale\", $quant)";

    $result = $co->query($sql);
    $userO = $_SESSION['usernameBZ'];
    $sql = "SELECT p.* FROM persona p WHERE p.username=\"$userO\" AND p.tipo=\"Operatore\"";
    $result = $co->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
              $codFiscOperatore = $row['codiceFiscale'];

        }

    } else {
      $co->close();
      die("NO BUONO");
    }

    if($_POST['f&r'])
      $f_r = "si";
    else
      $f_r = "no";

    $descrizione = $_POST["descrizione"];
    $sql = "INSERT INTO stampa(dataStampa,oraStampa,codiceFiscaleOperatore,dataRitiro,oraRitiro, tipoFormato,descrizione,fronteRetro)
    value (\"$dataAttuale\", \"$oraAttuale\", \"$codFiscOperatore\", \"$dataAttuale\", \"$oraAttuale\" ,\"$tipoF\",\"$descrizione\", \"$f_r\")";

    $result = $co->query($sql);

  //---------------------------------
    $sql = "SELECT a.*, s.* FROM stampa s, acquisto a
    WHERE a.dataAcquisto=\"$dataAttuale\" AND a.orarioAcquisto=\"$oraAttuale\" AND s.dataStampa=\"$dataAttuale\" AND s.oraStampa=\"$oraAttuale\"";
    $result = $co->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
              $idStampa = $row['idStampa'];
              $idAcquisto = $row['idAcquisto'];

        }

    } else {
      $co->close();
      die("NO BUONO");
    }

    $sql = "INSERT INTO include(idAcquisto,idStampa) value($idAcquisto, $idStampa)";
    $result = $co->query($sql);
    $co->commit();
    $co->close();
  } catch (Exception $e) {
      $co->rollBack();
      $co->close();
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
  }

  echo "OK";
?>
