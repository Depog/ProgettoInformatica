<?php
  ////ricevo i dati
  session_start();
  include 'filesLogic.php';
    //prendo il tipo di utente collegato
    if(isset($_SESSION["tipoDB"])){
      $tipo= $_SESSION["tipoDB"];
      echo $tipo;
      if($tipo=="Professore"){   //ricevo i dati senza il costo dato che non paga
        echo "prof";
        if(isset($_POST["formato"])){
          $formato=$_POST["formato"];
          echo "<br>formato ". $formato;
        }
        if(isset($_POST["tipologia"])){
          $tipologia=$_POST["tipologia"];
          echo "<br>Tipologia ".$tipologia;
        }
        $tot=0;
      }else{ //altrimenti è uno studente e deve pagare
        echo "studente";
        if(isset($_POST["formato"])){
          $formato=$_POST["formato"];
          $arrFormato=explode("?",$formato);
          echo "<br>formato " . $arrFormato[0] . ", costo ". $arrFormato[1];
        }
        if(isset($_POST["tipologia"])){
          $tipologia=$_POST["tipologia"];
            $arrTipologia=explode("?",$tipologia);
            echo "<br>tipologia " .$arrTipologia[0] . ", costo ". $arrTipologia[1];
        }
        $tot=$arrFormato[1]+$arrTipologia[1];
      }
      if(isset($_POST["note"])){
        $note=$_POST["note"];
      }else{
        $note="";
      }
      if(isset($_POST["fronteRetro"])){
        $fronteRetro="si";
      }
      if(isset($_POST["quantità"])){
        $quantità=$_POST["quantità"];
        echo "<br>quantità " .$quantità;
      }
      $costTot=$tot*$quantità;
      echo "<br> Totale = $costTot euro";
        //creo la prenotazione
        //////////////////////////prendo il codice fiscale////////////////////////////////////////
        $username=$_SESSION["usernameBZ"];    //ora uso questo, ma poi uso le session
        $codiceFile=$_SESSION["codiceFile"];

        $sql="SELECT persona.codiceFiscale from persona where persona.username=\"$username\" ";
          $records=$conn->query($sql);
          if ( $records == TRUE) {
              //echo "<br>Query eseguita!";
          } else {
            die("Errore nella query: " . $conn->error);
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
         $sql="INSERT INTO Prenotazione(dataPrenotazione,oraPrenotazione,quantità,note,codiceFiscale) VALUES(\"$dataOggi\",\"$oraAttuale\",\"$quantità\",\"$note\",\"$codiceFiscale\") ";
           $records=$conn->query($sql);
           if ( $records == TRUE) {
               //echo "<br>Query eseguita!";
               echo "inserito correttamente";
           } else {
             die("Errore nella query: " . $conn->error);
           }

           //prendo l'id della Prenotazione

            $sql="SELECT prenotazione.idPrenotazione from prenotazione where prenotazione.dataPrenotazione=\"$dataOggi\" and prenotazione.oraPrenotazione=\"$oraAttuale\" and prenotazione.codiceFiscale=\"$codiceFiscale\"";
             $records=$conn->query($sql);
             if ( $records == TRUE) {
                 //echo "<br>Query eseguita!";
                 echo "inserito correttamente";
             } else {
               die("Errore nella query: " . $conn->error);
             }
             if($records->num_rows ==0){
                   //	echo "la query non ha prodotto risultato";

             }else{
                     while($tupla=$records->fetch_assoc()){
                         $idPrenotazione=$tupla["idPrenotazione"];
                     }
            }

            //creo query per contiene
            $sql="INSERT INTO contiene(idPrenotazione,codiceFile) VALUES(\"$idPrenotazione\",\"$codiceFile\")";
             $records=$conn->query($sql);
             if ( $records == TRUE) {
                 //echo "<br>Query eseguita!";
                 echo "inserito correttamente";
             } else {
               die("Errore nella query: " . $conn->error);
             }











    }




 ?>
