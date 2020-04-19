<?php
  session_start();
  header("Expires: on, 01 Jan 1970 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  $tipo=$_SESSION["tipoDB"];    //ora lo facico manualmente ma devo prenderlo dalla variabile di sessione che viene settata al login

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
              if(isset($_SESSION["tipoDB"])){

                if($_SESSION["tipoDB"]=="Professore"){   //non devo estrarre il costo dal db in quanto i professori non pagano
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
              /////////////////////////////////////////////////////////////////////////////////////////////
              //////////tipologia
              $msg.="<br><label for=\"tipologia\" >Scegli la tipologia </label>";
                  //faccio un query dal database  per prendere i formati di stampa disponibili
                  if(isset($_SESSION["tipoDB"])){

                    if($_SESSION["tipoDB"]=="Professore"){   //non devo estrarre il costo dal db in quanto i professori non pagano
                        $sql="SELECT tipologia from tipologia";
                          $records=$conn->query($sql);
                          if ( $records == TRUE) {
                              //echo "<br>Query eseguita!";
                          } else {
                            die("Errore nella query: " . $conn->error);
                          }
                          if($records->num_rows ==0){
                                //	echo "la query non ha prodotto risultato";

                          }else{
                              $msg.="<select id=\"tipologia\" name=\"tipologia\">";
                                  while($tupla=$records->fetch_assoc()){
                                    $tipo=$tupla["tipologia"];
                                    $msg.="<option value=\"$tipo\">$tipo</option>*";
                                  }
                                  $msg.="</select>";
                         }
                    }else{    //prendo anche il costo dal database
                        $sql="SELECT tipologia,costo from tipologia";
                          $records=$conn->query($sql);
                          if ( $records == TRUE) {
                              //echo "<br>Query eseguita!";
                          } else {
                            die("Errore nella query: " . $conn->error);
                          }
                          if($records->num_rows ==0){
                                //	echo "la query non ha prodotto risultato";

                          }else{
                                $msg.="<select id=\"tipologia\" name=\"tipologia\">";
                                  while($tupla=$records->fetch_assoc()){
                                    $tipo=$tupla["tipologia"];
                                      $costoStampa=$tupla["costo"];
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
        <p>Carica il file</p> <input type="file" name="myfile"> <br>
          Inserisci una nota<input class="input2" type="text" name="nota" placeholder="nota" ></input><br>
           <button type="submit" name="save">Invia Prenotazione</button>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
