<?php
  session_start();
  include '.././connessione.php';

  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  /*Controlli per vedere se si e' eseguito il login*/
  if(isset($_SESSION["usernameBZ"])){
    //rimango qua
  }else{
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");  //reinderizzo alla home
  }

  // Downloads files
  if (isset($_GET['file_id'])) {
      $id = $_GET['file_id'];
      $co = connect();
      // fetch file to download from database
      $sql = "SELECT * FROM file WHERE idFile=$id";
      $result = $co->query($sql);

      if ($result->num_rows > 0) {
        //La query ha estrapolato delle righe ...
        $file = mysqli_fetch_assoc($result);
        $filepath = '../.././uploads/' . $file['nomeFile'];

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize('uploads/' . $file['nomeFile']));
            readfile('uploads/' . $file['nomeFile']);
      }else {
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/Errore.php?msg=Il file da lei selezionato non è stato individuato sul server la preghiamo di contattare l'uficio tecnico");
      }
    }else{
      //La query NON HA estrapolato righe ...
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/Errore.php?msg=Il file da lei selezionato non è stato trovato");
    }
  }else {
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/Errore.php?msg=Si è verificato un errore<br>La invitiamo a riprovare");
  }
?>
