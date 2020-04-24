
<?php
    function caricaPrenotazioniEffettuate($ip,$porta) {
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

        $data = coselectFormDB($ip,$porta);

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
    function coselectFormDB($ip, $porta) {
      //global $co;
      include 'connessione.php';
      $co = connect();
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

      $co->close();

      return $arrayRisultati;
    }



?>
