
<?php
    function caricaCodaRitiri($ip,$porta) {
      //Inizio tag table + intestazione
      $out = " <div class=\"table100-head\">
                <table>
                  <thead>
                    <tr class=\"row100 head\">
                      <th class=\"cell100 column1OR\">Identificativo</th>
                      <th class=\"cell100 column2OR\">Data Ritiro</th>
                      <th class=\"cell100 column3OR\">Orario Ritiro</th>
                      <th class=\"cell100 column4OR\">Username</th>
                      <th class=\"cell100 column6OR\">Costo</th>
                      <th class=\"cell100 column7OR\">Descrizione</th>
                      <th class=\"cell100 column8OR\">Ritirato</th>
                    </tr>
                  </thead>
                </table>
              </div>";

        $data = selectFormDB($ip,$porta);

        if($data == "ERRORE NO DATA") {
          $out .= "<div class=\"table100-body js-pscroll\">
                    <table>
                      <tbody id=\"myTable\">
                        <tr class=\"row100 body\">
                            <td class=\"cell100 column1OR\">-</td>
                            <td class=\"cell100 column2OR\">-</td>
                            <td class=\"cell100 column3OR\">-</td>
                            <td class=\"cell100 column4OR\">-</td>
                            <td class=\"cell100 column6OR\">-</td>
                            <td class=\"cell100 column7OR\">-</td>
                            <td class=\"cell100 column8OR\">-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>";
        }else {
          //procedo
          $out .= "<div class=\"table100-body js-pscroll\">
                    <table>
                      <tbody id=\"myTable\">$data</tbody>
                    </table>
                  </div>";
        }

        return $out;
    }

    //Metodo per estrapolare i dati dal db
    function selectFormDB($ip, $porta) {
      //global $co;
      include 'connessione.php';

      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        $sql = "SELECT pers.*, s.* , f.*, p.* FROM prenotazione p JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscale) join stampa s ON(p.idStampa=s.idStampa) JOIN formato f ON(s.tipoFormato=f.tipo)
          WHERE s.dataRitiroEffettuato is NULL AND p.stampata = \"si\"
          ORDER BY s.dataRitiro, s.oraRitiro";

        $result = $co->query($sql);

        if($result->num_rows== 0) {
          $arrayRisultati = "ERRORE NO DATA";
        }else {
          // output data of each row
          $arrayRisultati = "";
          $count = 0;
          while($row = $result->fetch_assoc()) {
              $arrayRisultati .= "<tr class=\"row100 body\">
                                   <td class=\"cell100 column1OR\">" . ++$count . "</td>
                                   <td class=\"cell100 column2OR\">" . $row["dataRitiro"] . "</td>
                                   <td class=\"cell100 column3OR\">" . $row["oraRitiro"] . "</td>
                                   <td class=\"cell100 column4OR\"> " . $row["username"] . "</td>";
              if($row['tipo'] == "Professore") {
                $arrayRisultati .= "<td class=\"cell100 column6OR\">FREE</td>";
              } else {
                $arrayRisultati .= "<td class=\"cell100 column6OR\">" . $row["costoStampa"] * $row["quantità"] . "€</td>";
              }

              $arrayRisultati .= "<td class=\"cell100 column7OR\">" . $row['descrizione'] . "</td>";
              $arrayRisultati .= "<td class=\"cell100 column8OR\">
                                    <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaRitiri/doubleCKGestioneRitiri.php?idPren=" . $row['idPrenotazione'] . "\">NO</a>
                                  </td>
                                </tr>";//link per modificare lo stato della prenotazione
          }

        }

        $co->commit();
        $co->close();
      } catch (Exception $e) {
            $co->rollBack();
            $co->close();
            header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
      }

      return $arrayRisultati;
    }

    function checkRitirato($ip, $porta, $idPren) {
      include '.././connessione.php';

      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        $dataRitiro = date("Y/m/d");
        $oA = date("h:i:sa");
        $oraRitiro  = DATE("H:i:s", STRTOTIME($oA));
        $sql = "SELECT stampa.idStampa from prenotazione join stampa on(prenotazione.idStampa=stampa.idStampa) WHERE prenotazione.idPrenotazione=$idPren";
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
                    $idStampa=$tupla["idStampa"];
                }
       }


        $sql = "UPDATE stampa SET dataRitiroEffettuato=\"$dataRitiro\", orarioRitiroEffettuato=\"$oraRitiro\" WHERE idStampa=$idStampa";

        if ($co->query($sql) === TRUE) {
            //fatto
        } else {
          //_ERR
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
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
