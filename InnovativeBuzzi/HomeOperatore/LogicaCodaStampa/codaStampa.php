<?php
  //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::_ERR Dove va gestito l'errore ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//Metodo che prepara il layout della coda stampa
  function caricaCodaStampa($ip, $porta) {
    //Inizio tag table + intestazione
    $out = "<div class=\"table100-head\">
              <table>
                <thead>
                  <tr class=\"row100 head\">
                    <th class=\"cell100 column1\">Numero Copie</th>
                    <th class=\"cell100 column3\">Nome Cliente</th>
                    <th class=\"cell100 column3\">Scarica</th>
                    <th class=\"cell100 column4\">Stampata</th>
                  </tr>
                </thead>
              </table>
            </div>";

      $data = selectFormDB($ip,$porta);

      if($data == "ERRORE NO DATA") {
        die("<h3>Nessuna Prenotazione effettuata fino ad ora</h3>");
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
    $sql = "select p.* ,f.* , pers.* FROM prenotazione p JOIN file f on (p.codiceFIle=f.codiceFile) JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscale)
      WHERE p.stampata = \"no\" ";

    $result = $co->query($sql);

    if($result->num_rows== 0) {
      $arrayRisultati = "ERRORE NO DATA";

    }else {

      // output data of each row
      $arrayRisultati = "";

      while($row = $result->fetch_assoc()) {
          $arrayRisultati .= "<tr class=\"row100 body\"><td class=\"cell100 column1\"> " . $row["quantità"] . "</td>";
          $arrayRisultati .= "<td class=\"cell100 column3\">" . $row["nome"] . "</td>";
          $arrayRisultati .= "<td class=\"cell100 column3\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/DownloadFile/downloadFile.php?file_id=" . $row['codiceFile'] . "\">" . $row["nomeFile"] . "</a>
                              </td>";//link per scaricare il file
          $arrayRisultati .= "<td class=\"cell100 column4\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaStampa/doubleCKGestioneStampa.php?idPren=" . $row['idPrenotazione'] . "\">MANCANTE</a>
                              </td>
                            </tr>";//link per modificare lo stato della prenotazione
      }
    }

    $co->close();

    return $arrayRisultati;
  }


  function checkStampa($ip, $porta) {
    include '.././connessione.php';
    $co = connect();



    $co->close();
  }
?>
