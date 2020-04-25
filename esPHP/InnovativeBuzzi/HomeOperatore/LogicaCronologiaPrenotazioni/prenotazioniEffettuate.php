
<?php
    function caricaPrenotazioniEffettuate($ip,$porta) {
      //Inizio tag table + intestazione
      $out = " <div class=\"table100-head\">
                <table>
                  <thead>
                    <tr class=\"row100 head\">
                      <th class=\"cell100 column1PE\">Identificativo</th>
                      <th class=\"cell100 column2PE\">Data Stampa</th>
                      <th class=\"cell100 column3PE\">Ora Stampa </th>
                      <th class=\"cell100 column4PE\">Username Operatore</th>
                      <th class=\"cell100 column5PE\">Username Cliente</th>
                      <th class=\"cell100 column6PE\">Descrizione</th>
                      <th class=\"cell100 column7PE\">Quantità</th>
                      <th class=\"cell100 column8PE\">Formato</th>
                      <th class=\"cell100 column9PE\">Fronte&Retro</th>
                    </tr>
                  </thead>
                </table>
              </div>";

        $data = coselectFormDB($ip,$porta);

        if($data == "ERRORE NO DATA") {
          $out .= "<div class=\"table100-body js-pscroll\">
                    <table>
                      <tbody id=\"myTable\">
                        <tr class=\"row100 body\">
                            <td class=\"cell100 column1PE\">-</td>
                            <td class=\"cell100 column2PE\">-</td>
                            <td class=\"cell100 column3PE\">-</td>
                            <td class=\"cell100 column4PE\">-</td>
                            <td class=\"cell100 column5PE\">-</td>
                            <td class=\"cell100 column6PE\">-</td>
                            <td class=\"cell100 column7PE\">-</td>
                            <td class=\"cell100 column8PE\">-</td>
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
    function coselectFormDB($ip, $porta) {
      //global $co;
      include 'connessione.php';

      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

		    $sql = "SELECT operatore.username as usernameOperatore ,utente.username as usernameUtente,stampa.dataStampa,stampa.oraStampa,stampa.descrizione,stampa.quantità,stampa.fronteRetro,stampa.tipoFormato
            from persona operatore join stampa on (operatore.codiceFiscale=stampa.codiceFiscaleOperatore) join prenotazione on (stampa.idStampa=prenotazione.idStampa) join persona utente on (prenotazione.codiceFiscale=utente.codiceFiscale)
            where operatore.tipo=\"Operatore\"
            ORDER BY stampa.dataStampa,stampa.oraStampa";


        $result = $co->query($sql);

        if($result->num_rows== 0) {
          $arrayRisultati = "ERRORE NO DATA";

        }else {

          // output data of each row
          $arrayRisultati = "";
          $count = 0;
          while($row = $result->fetch_assoc()) {
              $arrayRisultati .= "<tr class=\"row100 body\">
                                   <td class=\"cell100 column1PE\">" . ++$count . "</td>
                                   <td class=\"cell100 column2PE\">" . $row['dataStampa'] . "</td>
                                   <td class=\"cell100 column3PE\">" . $row['oraStampa'] . "</td>
                                   <td class=\"cell100 column4PE\">" . $row["usernameOperatore"] . "</td>
                                   <td class=\"cell100 column5PE\">" . $row["usernameUtente"] . "</td>
                                   <td class=\"cell100 column6PE\">" . $row["descrizione"] . "</td>
                                   <td class=\"cell100 column7PE\"> " . $row["quantità"] . "</td>
                                   <td class=\"cell100 column8PE\"> " . $row["tipoFormato"] . "</td>
                                   <td class=\"cell100 column9PE\"> " . $row["fronteRetro"] . "</td>";

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



?>
