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
      // fetch file to download from database
      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        $sql = "SELECT file.* FROM file WHERE file.codiceFile=\"$id\" ";

        $result = $co->query($sql);
        if ($result->num_rows == 0) {
          //La query NON HA estrapolato righe ...
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Il file da lei selezionato non è stato trovato");
        } else{
          //La query ha estrapolato delle righe ...
          $file = mysqli_fetch_assoc($result);
          $filepath = "../../Prenotazione/CaricamentoFile/uploads/" . $file['nomeFile'];
          if (file_exists($filepath)) {
              header('Content-Description: File Transfer');
              header('Content-Type: application/octet-stream');
              header('Content-Disposition: attachment; filename=' . basename($filepath));
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize('../../Prenotazione/CaricamentoFile/uploads/' . $file['nomeFile']));
              readfile('../../Prenotazione/CaricamentoFile/uploads/' . $file['nomeFile']);
          }else {
            $co->rollBack();
            $co->close();
            header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Il file da lei selezionato non è stato individuato sul server la preghiamo di contattare l'uficio tecnico");
          }
        }

        $co->commit();
        $co->close();
      } catch (Exception $e) {
        $co->rollBack();
        $co->close();
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
      }

  }else {
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un errore<br>La invitiamo a riprovare");
  }
?>
