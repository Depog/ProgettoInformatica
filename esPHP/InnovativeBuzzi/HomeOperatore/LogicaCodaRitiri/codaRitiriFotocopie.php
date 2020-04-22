<?php

  function caricaCodaRitiri($ip,$porta) {
    //Inizio tag table + intestazione
    $out = "<div class=\"table100-head\">
              <table>
                <thead>
                  <tr class=\"row100 head\">
                    <th class=\"cell100 column1OR\">Identificatico</th>
                    <th class=\"cell100 column2OR\">Data Ritiro</th>
                    <th class=\"cell100 column3OR\">Orario Ritiro</th>
                    <th class=\"cell100 column4OR\">Nome Cliente</th>
                    <th class=\"cell100 column5OR\">Cognome Cliente</th>
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
                    <tbody>
                      <tr class=\"row100 body\">
                          <td class=\"cell100 column1OR\">-</td>
                          <td class=\"cell100 column2OR\">-</td>
                          <td class=\"cell100 column3OR\">-</td>
                          <td class=\"cell100 column4OR\">-</td>
                          <td class=\"cell100 column5OR\">-</td>
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
                    <tbody>$data</tbody>
                  </table>
                </div>";
      }

      return $out;
  }

//Metodo per estrapolare i dati dal db
  function selectFormDB($ip, $porta) {
    //global $co;
    include 'connessione.php';
    $co = connect();
    $sql = "SELECT pers.*, s.* , f.*, p.* FROM prenotazione p JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscale) join stampa s ON(p.idStampa=s.idStampa) JOIN formato f ON(s.tipoFormato=f.tipo)
      WHERE p.dataRitiroEffettuato is NULL
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
                               <td class=\"cell100 column4OR\"> " . $row["nome"] . "</td>
                               <td class=\"cell100 column5OR\">" . $row["cognome"] . "</td>";
          if($row['tipo'] == "Insegnante") {
            $arrayRisultati .= "<td class=\"cell100 column6OR\">FREE</td>";
          } else {
            $arrayRisultati .= "<td class=\"cell100 column6OR\">" . $row["costoStampa"] * $row["quantità"] . "</td>";
          }

          $arrayRisultati .= "<td class=\"cell100 column7OR\">" . $row['descrizione'] . "</td>";
          $arrayRisultati .= "<td class=\"cell100 column8OR\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaRitiri/doubleCKGestioneRitiri.php?idPren=" . $row['idPrenotazione'] . "\">NO</a>
                              </td>
                            </tr>";//link per modificare lo stato della prenotazione
      }
    }

    $co->close();

    return $arrayRisultati;
  }

  function checkRitirato($ip, $porta, $idPren) {
    include '.././connessione.php';
    $co = connect();
    $dataRitiro = date("Y/m/d");
    $oraRitiro = date("H:i:s");

    $sql = "UPDATE prenotazione SET dataRitiroEffettuato=\"$dataRitiro\", orarioRitiroEffettuato=\"$oraRitiro\" WHERE idPrenotazione=$idPren";

    if ($co->query($sql) === TRUE) {
        //fatto
    } else {
      //_ERR
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
    }
  }

?>
