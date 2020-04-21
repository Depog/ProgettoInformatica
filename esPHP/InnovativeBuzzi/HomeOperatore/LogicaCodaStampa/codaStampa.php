<?php
  //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::_ERR Dove va gestito l'errore ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

//Metodo che prepara il layout della coda stampa
  function caricaCodaStampa($ip, $porta) {
    //Inizio tag table + intestazione
    $out = "<div class=\"table100-head\">
              <table>
                <thead>
                  <tr class=\"row100 head\">
                    <th class=\"cell100 column1O\">Data Prenotazione</th>
                    <th class=\"cell100 column2O\">Orario Prenotazione</th>
                    <th class=\"cell100 column3O\">Username Cliente</th>
                    <th class=\"cell100 column4O\">Descrizione</th>
                    <th class=\"cell100 column5O\">Numero Copie</th>
                    <th class=\"cell100 column6O\">Scarica</th>
                    <th class=\"cell100 column7O\">Stampata</th>
                    <th class=\"cell100 column8O\">Note</th>
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
    $sql = "select p.* ,f.* , pers.*,s.Descrizione FROM prenotazione p JOIN file f on (p.codiceFIle=f.codiceFile) JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscale) join stampa s ON(p.idStampa=s.idStampa)
      WHERE p.stampata = \"no\" ";

    $result = $co->query($sql);

    if($result->num_rows== 0) {
      $arrayRisultati = "ERRORE NO DATA";

    }else {

      // output data of each row
      $arrayRisultati = "";

      while($row = $result->fetch_assoc()) {
          $arrayRisultati .= "<tr class=\"row100 body\">
                            <td class=\"cell100 column1O\">" . $row["dataPrenotazione"] . "</td>
                            <td class=\"cell100 column2O\">" . $row["oraPrenotazione"] . "</td>
                            ";
          $arrayRisultati .="<td class=\"cell100 column3O\">" . $row["username"] . "</td>";
          $arrayRisultati .="<td class=\"cell100 column4O\"> " . $row["Descrizione"] . "</td>
                        <td class=\"cell100 column5O\">" . $row["quantità"] . "</td>
                              <td class=\"cell100 column6O\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/DownloadFile/downloadFile.php?file_id=" . $row['codiceFile'] . "\">" . $row["nomeFile"] . "</a>
                              </td>";//link per scaricare il file
          $arrayRisultati .= "<td class=\"cell100 column7O\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaStampa/doubleCKGestioneStampa.php?idPren=" . $row['idPrenotazione'] . "\">MANCANTE</a>
                              </td>
                              <td class=\"cell100 column8O\"> " . $row["note"] . "</td>
                            </tr>";//link per modificare lo stato della prenotazione
      }
    }

    $co->close();

    return $arrayRisultati;
  }


  function checkStampa($ip, $porta, $idPren) {
    include '.././connessione.php';
    $co = connect();
    $sql = "UPDATE prenotazione SET stampata=\"si\" WHERE idPrenotazione=$idPren";

    if ($co->query($sql) === TRUE) {
      $co->close();

      $co = connect();
      $user = $_SESSION['usernameBZ'];
      $sql = "SELECT pers.* FROM persona WHERE username=\"$user\"";//Per prendere il codiceFiscaleDelOperatore

      $result = $co->query($sql);
      $row = $result->fetch_assoc();
      die("Eccomi");
      if($co->error() == NULL) {
        //_ERR
        $co->close();
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
      }

      $codFiscOper = $row['codiceFiscale'];
      $co->close();

      $co = connect();
      $sql = "UPDATE stampa SET codiceFiscaleOperatore=\"$codFiscOper\" WHERE idPrenotazione=$idPren";
      if ($co->query($sql) === TRUE) {
        //Fatto
      }else {
        //_ERR
        $co->close();
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
      }

    } else {
      //_ERR
      $co->close();
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
    }

    $co->close();
  }

?>
