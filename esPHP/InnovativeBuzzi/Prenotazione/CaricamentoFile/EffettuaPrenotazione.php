<?php
  session_start();
  header("Expires: on, 01 Jan 1970 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  $tipo=$_SESSION["tipoBZ"];    //ora lo facico manualmente ma devo prenderlo dalla variabile di sessione che viene settata al login

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="inputFile">
    <div class="container">
      <div class="row">
        <form action="CreaPrenotazione.php" method="POST" enctype="multipart/form-data" >
          <?php
          include "connessioneBuzzi.php";
          $msg="";
          //////////formato//////////////////////////////////////////////////////////////////////
          $msg.="<label for=\"formato\" >Scegli il formato </label>";
              //faccio un query dal database  per prendere i formati di stampa disponibili
              if(isset($_SESSION["tipoBZ"])){

                if($_SESSION["tipoBZ"]=="Professore"){   //non devo estrarre il costo dal db in quanto i professori non pagano
                    $sql="SELECT tipo from formato";
                      $records=$conn->query($sql);
                      if ( $records == TRUE) {
                          //echo "<br>Query eseguita!";
                      } else {
                        die("Errore nella query: " . $conn->error);
                      }
                      if($records->num_rows ==0){
                            //	echo "la query non ha prodotto risultato";

                      }else{
                          $msg.="<select id=\"formato\" name=\"formato\">";
                              while($tupla=$records->fetch_assoc()){
                                $tipo=$tupla["tipo"];
                                $msg.="<option value=\"$tipo\">$tipo</option>*";
                              }
                              $msg.="</select>";
                     }
                }else{    //prendo anche il costo dal database
                    $sql="SELECT tipo,costoStampa from formato";
                      $records=$conn->query($sql);
                      if ( $records == TRUE) {
                          //echo "<br>Query eseguita!";
                      } else {
                        die("Errore nella query: " . $conn->error);
                      }
                      if($records->num_rows ==0){
                            //	echo "la query non ha prodotto risultato";

                      }else{
                            $msg.="<select id=\"formato\" name=\"formato\">";
                              while($tupla=$records->fetch_assoc()){
                                $tipo=$tupla["tipo"];
                                  $costoStampa=$tupla["costoStampa"];
                                    $msg.="<option value=\"$tipo?$costoStampa\">$tipo $costoStampa euro</option>*";
                              }
                                $msg.="</select>";
                     }
               }
              }

             echo $msg;

           ?>
        <br> Fronte retro ? <input type="checkbox" name="fronteRetro" valuee="si"></input>

        <br>Inserisci la quantità<input type="number" name="quantità" value="1" placeholder="quantità" min="1" max="100"></input>

        <?php
         $dataOggi=date("Y-m-d");
         $giornoDopo= date( 'Y-m-d', strtotime( $dataOggi . ' +1 day' ) );
          $sceltaData="<br>Inserisci la data in cui vuoi ritirarlo <input type=\"date\" name=\"dataRitiro\" value=\"$giornoDopo\" min=\"$giornoDopo\"></input>";
          echo $sceltaData;
          if(isset($_SESSION["OraMancante"])){
            $sceltaOrario="<br>Scegli la fascia oraria<br><select id=\"oraRitiro\" name=\"oraRitiro\"> <p style=\"color:red\"><p>Orario obbligatorio</p>
                                             <option value=\"-\">-------</option>
                                             <option value=\"7:45\">7:45 am</option>
                                             <option value=\"9:00\">9:00 am</option>
                                             <option value=\"10:00\">10:00 am</option>
                                             <option value=\"11:00\">11:00 am</option>
                                             <option value=\"12:00\">12:00 am</option>
                                             <option value=\"1\">1 pm</option>
                                              </select>";

          }else{
            $sceltaOrario="<br>Scegli la fascia oraria<br><select id=\"oraRitiro\" name=\"oraRitiro\">
                                             <option value=\"-\">-------</option>
                                             <option value=\"7:45\">7:45 am</option>
                                             <option value=\"9:00\">9:00 am</option>
                                             <option value=\"10:00\">10:00 am</option>
                                             <option value=\"11:00\">11:00 am</option>
                                             <option value=\"12:00\">12:00 am</option>
                                             <option value=\"1\">1 pm</option>
                                              </select>";
          }
          echo $sceltaOrario;
          if (!isset($_SESSION["FileNonInserito"]) && !isset($_SESSION["FormatoErrato"]) && !isset($_SESSION["FileTroppoGrande"]) ){
            //caricamento normale
            $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"> <br>";
          }
           else if(isset($_SESSION["FileNonInserito"])){
            //file non inserito
            $caricaFile="<p>Carica il file eccomi2</p> <input type=\"file\" name=\"myfile\"> </input> <p style=\"color:red\">File Obbligatorio</p>";
            $_SESSION["FileNonInserito"]=null;
          }else if(isset($_SESSION["FormatoErrato"])){
            //formato errato
            $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"> </input><p style=\"color:red\">Formato non disponibile. File concessi zip, .pdf, .docx, .jpg, .jpeg, .png , .txt</p>";
            $_SESSION["FormatoErrato"]=null;
          }else if(isset($_SESSION["FileTroppoGrande"])){
            //file troppo grande
            $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"></input><p style=\"color:red\">Dimensione del file troppo grande</p>";
            $_SESSION["FileTroppoGrande"]=null;
          }

          echo $caricaFile;
          if(!isset($_SESSION["DescrizioneAssente"])){
              $descrizione="Inserisci la descrizione<input class=\"input2\" type=\"text\" name=\"descrizione\" placeholder=\"descrizione\" ></input><br>";
            }else{
              //descrizione non presente
              $descrizione="Inserisci la descrizione<input class=\"input2\" type=\"text\" name=\"descrizione\" placeholder=\"descrizione\" ></input><p style=\"color:red\">Descrizione obbligatoria</p>";
              $_SESSION["DescrizioneAssente"]=null;
            }
            echo $descrizione;
          ?>
          Inserisci una nota<input class="input2" type="text" name="nota" placeholder="nota" ></input><br>
           <button type="submit" name="save" onclick="myFunction()"  >Invia Prenotazione</button>


        </form>
      </div>
    </div>
  </div>
  </body>
</html>
