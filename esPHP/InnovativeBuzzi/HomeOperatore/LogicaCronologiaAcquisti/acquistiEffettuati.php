
<?php
    function caricaCodaRitiri($ip,$porta) {
      //Inizio tag table + intestazione
      $out = " <div class=\"table100-head\">
                <table>
                  <thead>
                    <tr class=\"row100 head\">
                      <th class=\"cell100 column1OR\">Identificativo</th>
                      <th class=\"cell100 column2OR\">Username</th>
                      <th class=\"cell100 column3OR\">Descrizione</th>
                      <th class=\"cell100 column4OR\">Quantità</th>
                      <th class=\"cell100 column6OR\">Costo</th>
                      <th class=\"cell100 column7OR\">Data</th>
                      <th class=\"cell100 column8OR\">Ora</th>
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
        $sql = "SELECT persona.*, stampa.*,formato.*,acquisto.* FROM persona join acquisto on (persona.codiceFiscale=acquisto.codiceFiscale) join include on (acquisto.idAcquisto=include.idAcquisto)
          join stampa on (include.idStampa=stampa.idStampa) join formato on(stampa.tipoFormato=formato.tipo)
          ORDER BY stampa.dataRitiro, stampa.oraRitiro";

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
                                   <td class=\"cell100 column2OR\">" . $row["username"] . "</td>
                                   <td class=\"cell100 column3OR\">" . $row["descrizione"] . "</td>
                                   <td class=\"cell100 column4OR\"> " . $row["quantità"] . "</td>";
              if($row['tipo'] == "Professore") {
                $arrayRisultati .= "<td class=\"cell100 column6OR\">FREE</td>";
              } else {
                $arrayRisultati .= "<td class=\"cell100 column6OR\">" . $row["costoStampa"] * $row["quantità"] . "</td>";
              }

              $arrayRisultati .= "<td class=\"cell100 column7OR\">" . $row['dataAcquisto'] . "</td>";
              $arrayRisultati .= "<td class=\"cell100 column8OR\">"  .$row['orarioAcquisto']  . "</td>
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
        $oraRitiro = date("H:i:s");

        $sql = "UPDATE prenotazione SET dataRitiroEffettuato=\"$dataRitiro\", orarioRitiroEffettuato=\"$oraRitiro\" WHERE idPrenotazione=$idPren";

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
