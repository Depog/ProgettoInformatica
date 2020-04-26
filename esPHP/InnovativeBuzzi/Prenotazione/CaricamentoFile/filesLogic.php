<?php
  include "connessione.php";

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $_SESSION["nomeFile"]="uploads/".$filename;   //mi salvo il nome del file
    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    if(empty($file)){
      $_SESSION["FileNonInserito"]="vero";
      $errore="si";
      //header("location:EffettuaPrenotazione.php");
    }
    if (!in_array($extension, ['zip', 'pdf', 'docx','jpg','jpeg','PNG', 'txt', 'html'])) {
      if($errore=="si"){

      }else{
        echo "You file extension must be .zip, .pdf, .docx, .jpg, .jpeg, .png, .txt, .html";
        $_SESSION["FormatoErrato"]="true";
          $errore="si";
      }
    } else if ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
        $_SESSION["FileTroppoGrande"]="true";
        $errore="si";
       //header("Location: EffettuaPrenotazione.php");  //reinderizzo alla home
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
              //echo "dentro";
              $dimensioneStringa=15;
              function generateRandomString($length) {
                  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                  $charactersLength = strlen($characters);
                  $randomString = '';
                  for ($i = 0; $i < $length; $i++) {
                      $randomString .= $characters[rand(0, $charactersLength - 1)];
                  }
                  return $randomString;
                }
              //////////////genero un codice casuale e inserisco finchè non viene inserito nel caso ne generasse uno uguale////////////
                $inserito=false;
              while($inserito==false){
                $stringaRandom=generateRandomString($dimensioneStringa);
                try {
                  $co = connect1();
                  $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
                  $sql = "INSERT INTO file(codiceFile,nomeFile, dimensione) VALUES (\"$stringaRandom\",\"$filename\", $size)";
      								if($co->query($sql) == TRUE) {
      								//	echo "caricamento avvenuto con successo";
                        echo "<br> File caricato ->[$filename,$size] ";
                          //mi salvo il nome del file e la di
                          $inserito=true;     //esce dal while
                          //mi salvo il codice generato in una session
                            $_SESSION["codiceFile"]=$stringaRandom;
      								}else{
      								//	echo "Error: " . $sql . "<br>" . $co->error;
                        //die("");
                        //continuo a inserie generando un altro codice
      								}


                  $co->commit();
                  $co->close();
                }catch (Exception $e) {
                    $co->rollBack();
                    $co->close();
                    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
                }
              }
        } else {
            echo "Failed to upload file.";
        }
    }
}
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    try {
      $co = connect1();
      $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
      $sql = "SELECT * FROM file WHERE id=$id";
          if($co->query($sql) == TRUE) {

          }else{
            echo "Error: " . $sql . "<br>" . $co->error;
            die("");
          }


          while($tupla=$records->fetch_assoc()){
                              $id=$tupla["codiceFilm"];
                                $foto=$tupla["foto"];
                                $film+=Array($id=>$foto);
            }

      $co->commit();
      $co->close();
    } catch (Exception $e) {
      $co->rollBack();
      $co->close();
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
    }

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($co, $updateQuery);
        exit;
    }

}
