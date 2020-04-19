<?php
  //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::_ERR Dove va gestito l'errore ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
  include 'connessione.php';
  $co = connect();

//Metodo che prepara il layout della coda stampa
  function caricaCodaStampa() {
    //Inizio tag table + intestazione
    $out = "<div class=\"table100-head\">
              <table>
                <thead>
                  <tr class=\"row100 head\">
                    <th class=\"cell100 column1\">Numero Copie</th>
                    <th class=\"cell100 column2\">Nome Cliente</th>
                    <th class=\"cell100 column3\">Scarica</th>
                  </tr>
                </thead>
              </table>
            </div>";

      $data = selectFormDB();

      if($data == "ERRORE NO DATA") {
        die("Errore");//da gestire successivamente _ERR
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
  function selectFormDB() {
    global $co;
    $sql = "select p.* ,f.* , pers.* FROM prenotazione p JOIN contiene c ON(p.idPrenotazione = c.idPrenotazione)
      JOIN File f ON(c.idFile = f.idFile) JOIN persona pers ON(pers.codiceFiscale = p.codiceFiscaleCliente)
      WHERE p.stampata = \"no\" ";

    $result = $co->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $arrayRisultati = "";

        while($row = $result->fetch_assoc()) {
            $arrayRisultati .= "<tr class=\"row100 body\"><td class=\"cell100 column1\"> " . $row["quantità"] . "</td>";
            $arrayRisultati .= "<td class=\"cell100 column2\">" . $row["nome"] . "</td>";
            $arrayRisultati .= "<td class=\"cell100 column3\">" . $row["nomeFile"] . "</td></tr>";
        }

    }else {
      $arrayRisultati = "ERRORE NO DATA";
    }

    $co->close();

    return $arrayRisultati;
  }
?>
