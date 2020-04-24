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
                    <th class=\"cell100 column3O\">Descrizione</th>
                    <th class=\"cell100 column4O\">Formato</th>
                    <th class=\"cell100 column5O\">Numero Copie</th>
                    <th class=\"cell100 column6O\">Fronte&Retro</th>
                    <th class=\"cell100 column7O\">Scarica</th>
                    <th class=\"cell100 column8O\">Stampata</th>
                    <th class=\"cell100 column9O\">Note</th>
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
                          <td class=\"cell100 column1O\">-</td>
                          <td class=\"cell100 column2O\">-</td>
                          <td class=\"cell100 column3O\">-</td>
                          <td class=\"cell100 column4O\">-</td>
                          <td class=\"cell100 column5O\">-</td>
                          <td class=\"cell100 column6O\">-</td>
                          <td class=\"cell100 column7O\">-</td>
                          <td class=\"cell100 column8O\">-</td>
                          <td class=\"cell100 column9O\">-</td>
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
    $sql = "select p.* ,f.* , pers.*, s.* FROM prenotazione p JOIN file f on (p.codiceFIle=f.codiceFile) JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscale) join stampa s ON(p.idStampa=s.idStampa)
      JOIN formato form ON(s.tipoFormato = form.tipo)
      WHERE p.stampata = \"no\"
      ORDER BY p.dataPrenotazione, p.oraPrenotazione";

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
          $arrayRisultati .="<td class=\"cell100 column3O\">" . $row["descrizione"] . "</td>";
          $arrayRisultati .="<td class=\"cell100 column4O\"> " . $row["tipoFormato"] . "</td>
                        <td class=\"cell100 column5O\">" . $row["quantità"] . "</td>
                        <td class=\"cell100 column6O\">" . $row["fronteRetro"] . "</td>
                              <td class=\"cell100 column7O\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/DownloadFile/downloadFile.php?file_id=" . $row['codiceFile'] . "\">" . $row["nomeFile"] . "</a>
                              </td>";//link per scaricare il file
          $arrayRisultati .= "<td class=\"cell100 column8O\">
                                <a href=\"http://". $ip .":" . $porta . "/esPHP/InnovativeBuzzi/HomeOperatore/LogicaCodaStampa/doubleCKGestioneStampa.php?idPren=" . $row['idPrenotazione'] . "\">MANCANTE</a>
                              </td>
                              <td class=\"cell100 column9O\"> " . $row["note"] . "</td>
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
      $user = $_SESSION['usernameBZ'];
      $sql = "SELECT pers.* FROM persona pers WHERE pers.username=\"$user\"";//Per prendere il codiceFiscaleDelOperatore

      $result = $co->query($sql);
      $row = $result->fetch_assoc();

    /*  if($co->error() == "") {
        //_ERR
        $co->close();
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
      }
  */
      $codFiscOper = $row['codiceFiscale'];

      $sql = "SELECT p.* FROM prenotazione p JOIN stampa s ON(p.idStampa = s.idStampa) WHERE idPrenotazione=$idPren";//Per prendere il codiceFiscaleDelOperatore

      $result = $co->query($sql);
      $row = $result->fetch_assoc();

      /*if($co->error() == "") {
        //_ERR
        $co->close();
        header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
      }*/

      $idStampa = $row['idStampa'];

      $sql = "UPDATE stampa SET codiceFiscaleOperatore=\"$codFiscOper\" WHERE idStampa=$idStampa";

      if($co->query($sql) === TRUE) {
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
