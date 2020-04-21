<?php

  function printMoreInfo($ip, $porta, $idPren) {
    include '.././connessione.php';
    $co = connect();

    $sql = "select s.* FROM prenotazione p JOIN stampa s ON(p.idStampa = s.idStampa) JOIN formato f ON(s.tipoFormato = f.tipo)
      WHERE p.stampata = \"no\" AND p.idPrenotazione = $idPren";

    $result = $co->query($sql);

    if($result->num_rows== 0) {
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Si è verificato un imprevisto<br>La invitiamo a riprovare");
    }else {
      // output data of each row
      $out = "";
      while($row = $result->fetch_assoc()) {
          $out .= "Tipo formato : " . $row['tipoFormato'] ." || Fronte&Retro : " . $row['fronteRetro'];
      }
    }

    return $out;
  }
?>
