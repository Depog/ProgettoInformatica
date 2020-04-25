

<?php
  ////ricevo i dati
  session_start();
  $errore="no";
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  if(!isset($_SESSION["usernameBZ"])){  //torno alla home
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");  //reinderizzo alla home
  }
  include 'filesLogic.php';
    //prendo il tipo di utente collegato

    if(isset($_SESSION["tipoBZ"])){
      $tipo= $_SESSION["tipoBZ"];
      echo $tipo;
      if($tipo=="Professore"){   //ricevo i dati senza il costo dato che non paga
            echo "prof";
            if(isset($_POST["formato"])){
              $formato=$_POST["formato"];
              echo "<br>formato ". $formato;
            }

        $tot=0;
      }else{ //altrimenti è uno studente e deve pagare
          echo "studente";
          if(isset($_POST["formato"])){
            $formato=$_POST["formato"];
            $arrFormato=explode("?",$formato);
            echo "<br>formato " . $arrFormato[0] . ", costo ". $arrFormato[1];
            $formato=$arrFormato[0];
          }
          $tot=$arrFormato[1];
      }

      if(!empty($_POST["descrizione"])){
        $descrizione=$_POST["descrizione"];
      }else{
        //obbligatoria
        $_SESSION["DescrizioneAssente"]="vero";                //ERRORE
        //header("location:EffettuaPrenotazione.php");
        $errore="si";
      }
      if(isset($_POST["nota"])){
        $note=$_POST["nota"];
      }else{
        $note="";
      }
      if(isset($_POST["fronteRetro"])){
        $fronteRetro="si";
      }else{
        $fronteRetro="no";
      }
      if(isset($_POST["quantità"])){
        $quantità=$_POST["quantità"];
        echo "<br>quantità " .$quantità;
      }
      if(isset($_POST["oraRitiro"])){
        $oraRitiro=$_POST["oraRitiro"];
        if($oraRitiro=="-"){
          $_SESSION["OraMancante"]="true";
          //header("location:EffettuaPrenotazione.php");   //ERRORE
          $errore="si";
        }
      }
      if(isset($_POST["dataRitiro"])){
        $dataRitiro=$_POST["dataRitiro"];
      }



      if($errore=="si"){//controllo che si sia verificato almeno uno degli errori e rrimando alla pagina precedente
        header("location:EffettuaPrenotazione.php");
      }
      $costTot=$tot*$quantità;
      echo "<br> Totale = $costTot euro";
        //creo la prenotazione
        //////////////////////////prendo il codice fiscale////////////////////////////////////////
        $username=$_SESSION["usernameBZ"];    //ora uso questo, ma poi uso le session
        $codiceFile=$_SESSION["codiceFile"];
        try {
          $co = connect1();
          $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
          $sql="SELECT persona.codiceFiscale from persona where persona.username=\"$username\" ";
            $records=$co->query($sql);
            if ( $records == TRUE) {
                //echo "<br>Query eseguita!";
            } else {
              die("Errore nella query: " . $co->error);
            }
            if($records->num_rows ==0){
                  //	echo "la query non ha prodotto risultato";
            }else{
                    while($tupla=$records->fetch_assoc()){
                        $codiceFiscale=$tupla["codiceFiscale"];
                        echo "<br> Codice fiscale $codiceFiscale";
                    }
           }

           //ora inserisco la Prenotazione

           $dataOggi=date("Y/m/d");
           $oraAttuale=date("h:i:sa");
           $sql="INSERT INTO Prenotazione(dataPrenotazione,oraPrenotazione,note,codiceFiscale,codiceFile) VALUES(\"$dataOggi\",\"$oraAttuale\",\"$note\",\"$codiceFiscale\",\"$codiceFile\") ";
             $records=$co->query($sql);
             if ( $records == TRUE) {
                 //echo "<br>Query eseguita!";
                 echo "inserito correttamente";
             } else {
               die("Errore nella query: " . $co->error);
             }

             ///creo la query per la stampa
             $sql="INSERT INTO STAMPA(dataRitiro,oraRitiro,tipoFormato,descrizione,fronteRetro,quantità) VALUES(\"$dataRitiro\",\"$oraRitiro\",\"$formato\",\"$descrizione\",\"$fronteRetro\",\"$quantità\")";
               $records=$co->query($sql);
               if ( $records == TRUE) {
                   //echo "<br>Query eseguita!";
                   echo "inserito correttamente";
               } else {
                 die("Errore nella query: " . $co->error);
               }


               ////metto l'id della stampa dentro la prenotazione
               $sql="SELECT stampa.idStampa from stampa where stampa.dataRitiro=\"$dataRitiro\" and stampa.oraRitiro=\"$oraRitiro\" and  stampa.tipoFormato=\"$formato\"  and stampa.descrizione=\"$descrizione\"  and stampa.fronteRetro=\"$fronteRetro\" and stampa.quantità=\"$quantità\"";
                 $records=$co->query($sql);
                 if ( $records == TRUE) {
                     //echo "<br>Query eseguita!";
                     echo "inserito correttamente";
                 } else {
                   die("Errore nella query: " . $co->error);
                 }
                 if($records->num_rows ==0){
                       //	echo "la query non ha prodotto risultato";

                 }else{
                         while($tupla=$records->fetch_assoc()){
                             $idStampa=$tupla["idStampa"];
                         }
                }

                //inserisco id stampa dentro prenotazione
                $sql="UPDATE Prenotazione set prenotazione.idStampa=\"$idStampa\" where prenotazione.dataPrenotazione=\"$dataOggi\" and prenotazione.oraPrenotazione=\"$oraAttuale\"  and prenotazione.note=\"$note\" and prenotazione.codiceFiscale=\"$codiceFiscale\" and prenotazione.codiceFile=\"$codiceFile\"";
                  $records=$co->query($sql);
                  if ( $records == TRUE) {
                      //echo "<br>Query eseguita!";
                      echo "inserito correttamente";
                  } else {
                    die("Errore nella query: " . $co->error);
                  }

                  ///////////////////////////////cambio il nome del file nel db e nel file/////////////////
                  if(isset($_SESSION["nomeFile"])){
                    $nomeFile=$_SESSION["nomeFile"];
                    $_SESSION["nomeFile"]=null;
                  }
                      $est=explode(".",$nomeFile);
                      $estensione=$est[1];
                        $nuovoNomeFile = $username."-".$codiceFile;
                        $nuovoNomeFile=$nuovoNomeFile.".$estensione";
                        if(file_exists($nuovoNomeFile))
                        {
                           die("Errore");   //_ERR
                        }
                        else
                        {
                           if(rename( $nomeFile, "uploads/".$nuovoNomeFile))
                           {
                           echo "Successfully Renamed $nomeFile to $nuovoNomeFile" ;
                           }
                          else
                          {
                           echo "A File With The Same Name Already Exists" ;
                          }
                        }

                        /////////////aggiorno il nome del nuovo file///////////////////////
                        $sql="UPDATE file set file.nomeFile=\"$nuovoNomeFile\" where file.codiceFile=\"$codiceFile\"";
                          $records=$co->query($sql);
                          if ( $records == TRUE) {
                              //echo "<br>Query eseguita!";
                              echo "inserito correttamente";
                          } else {
                            die("Errore nella query: " . $co->error);
                          }

            $co->commit();
            $co->close();
        } catch (Exception $e) {
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
        }


    }




 ?>
