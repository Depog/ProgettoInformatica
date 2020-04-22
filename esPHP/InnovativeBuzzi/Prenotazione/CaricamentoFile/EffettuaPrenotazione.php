<?php
  session_start();
  header("Expires: on, 01 Jan 1970 00:00:00 GMT");
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  $tipo=$_SESSION["tipoBZ"];    //ora lo facico manualmente ma devo prenderlo dalla variabile di sessione che viene settata al login
  if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET["logout"])) {
      $_SESSION["usernameBZ"]=null;
      header("location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");
      die("");
    }
  }

  if(!isset($_SESSION["usernameBZ"])){
    header("location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/login/index.php");
  }
?>
<html>
<head>

      <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js">
    jQuery(function($) {
      $(window).on('scroll', function() {
  		if ($(this).scrollTop() >= 5) {
  			$('.navbar').addClass('fixed-top');
  		} else if ($(this).scrollTop() == 0) {
  			$('.navbar').removeClass('fixed-top');
  		}
  	});

  	function adjustNav() {
  		var winWidth = $(window).width(),
  			dropdown = $('.dropdown'),
  			dropdownMenu = $('.dropdown-menu');

  		if (winWidth >= 768) {
  			dropdown.on('mouseenter', function() {
  				$(this).addClass('show')
  					.children(dropdownMenu).addClass('show');
  			});

  			dropdown.on('mouseleave', function() {
  				$(this).removeClass('show')
  					.children(dropdownMenu).removeClass('show');
  			});
  		} else {
  			dropdown.off('mouseenter mouseleave');
  		}
  	}

  	$(window).on('resize', adjustNav);

  	adjustNav();
  });

</script>
<style>
  body{
      background-color: #2f3640;
  }
  .mainTitle{
    font-size: 100px;
    color: green;
    text-align: center;
    width: 100%;
  }
  text{
    font-family: 'Open Sans', sans-serif;
    color: white;
  }
  text.title{
    font-weight: bold;
    font-size: 40px;
    text-transform: uppercase;
    color: green;
    padding: 0 0;
  }
  select{
    height: 50px;
    width: 250px;
  }

</style>
</head>
<body>

    <div class="mainTitle">
      <b>PRENOTAZIONE</b>
    </div>


  <main>
  	<section id="content" class="content">
  		<div class="container">


        <div class="inputFile">

          <div class="row">
            <form action="CreaPrenotazione.php" method="POST" enctype="multipart/form-data" >
              <?php
              include "connessioneBuzzi.php";
              $msg="";
              //////////formato//////////////////////////////////////////////////////////////////////
              $msg.="<label for=\"formato\" ><text class=\"title\">formato</text></label>";
                  //faccio un query dal database  per prendere i formati di stampa disponibili
                  if(isset($_SESSION["tipoBZ"])){

                    if($_SESSION["tipoBZ"]=="Professore"){   //non devo estrarre il costo dal db in quanto i professori non pagano
                        $sql="SELECT tipo from formato";
                          $records=$conn->query($sql);
                          if ( $records == TRUE) {
                              //echo "<br>Query eseguita!";
                          } else {
                            die("Errore nella query: " . $conn->error);
                          }
                          if($records->num_rows ==0){
                                //	echo "la query non ha prodotto risultato";

                          }else{
                              $msg.="<select id=\"formato\" name=\"formato\">";
                                  while($tupla=$records->fetch_assoc()){
                                    $tipo=$tupla["tipo"];
                                    $msg.="<br /><option value=\"$tipo\">$tipo</option>*";
                                  }
                                  $msg.="</select>";
                         }
                    }else{    //prendo anche il costo dal database
                        $sql="SELECT tipo,costoStampa from formato";
                          $records=$conn->query($sql);
                          if ( $records == TRUE) {
                              //echo "<br>Query eseguita!";
                          } else {
                            die("Errore nella query: " . $conn->error);
                          }
                          if($records->num_rows ==0){
                                //	echo "la query non ha prodotto risultato";

                          }else{
                                $msg.="<br /><select id=\"formato\" name=\"formato\"><br />";
                                  while($tupla=$records->fetch_assoc()){
                                    $tipo=$tupla["tipo"];
                                      $costoStampa=$tupla["costoStampa"];
                                        $msg.="<br /><option value=\"$tipo?$costoStampa\">$tipo $costoStampa euro</option>*";
                                  }
                                    $msg.="</select>";
                         }
                   }
                  }

                 echo $msg;

               ?>

            <br> <br /><text class="title">Fronte retro</text><label class="container-checkbox" style="background-color: black;">
                <input type="checkbox" checked="checked" name="fronteRetro" value=si/>
                <span class="checkmark"></span>
            </label>

            <text class="title"><br>N copie</text>
            <div style="width:100px;">
              <input type="number" name="quantità" value="1" placeholder="" min="1" max="100">
            </div>




            <?php
             $dataOggi=date("Y-m-d");
             $giornoDopo= date( 'Y-m-d', strtotime( $dataOggi . ' +1 day' ) );
              $sceltaData="<text class=\"title\">data ritiro</text><br /><input type=\"date\" name=\"dataRitiro\" value=\"$giornoDopo\" min=\"$giornoDopo\"></input>";
              echo $sceltaData;
              if(isset($_SESSION["OraMancante"])){
                $_SESSION["OraMancante"]=null;
                $sceltaOrario="<br><text class=\"title\">ora ritirio</text><select id=\"oraRitiro\" name=\"oraRitiro\"> <p style=\"color:red\"><p>Orario obbligatorio</p>
                                                 <option value=\"-\">-------</option>
                                                 <option value=\"7:45\">7:45 am</option>
                                                 <option value=\"9:00\">9:00 am</option>
                                                 <option value=\"10:00\">10:00 am</option>
                                                 <option value=\"11:00\">11:00 am</option>
                                                 <option value=\"12:00\">12:00 am</option>
                                                 <option value=\"1\">1 pm</option>
                                                  </select>";

              }else{
                $sceltaOrario="<br><text class=\"title\">ora ritirio</text><br><select id=\"oraRitiro\" name=\"oraRitiro\">
                                                 <option value=\"-\">-------</option>
                                                 <option value=\"7:45\">7:45 am</option>
                                                 <option value=\"9:00\">9:00 am</option>
                                                 <option value=\"10:00\">10:00 am</option>
                                                 <option value=\"11:00\">11:00 am</option>
                                                 <option value=\"12:00\">12:00 am</option>
                                                 <option value=\"1\">1 pm</option>
                                                  </select>";
              }


              echo $sceltaOrario;
              if (!isset($_SESSION["FileNonInserito"]) && !isset($_SESSION["FormatoErrato"]) && !isset($_SESSION["FileTroppoGrande"]) ){
                //caricamento normale
                $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"> <br>";
              }
               else if(isset($_SESSION["FileNonInserito"])){
                //file non inserito
                $caricaFile="<p>Carica il file eccomi2</p> <input classtype=\"file\" name=\"myfile\"> </input> <p style=\"color:red\">File Obbligatorio</p>";
                $_SESSION["FileNonInserito"]=null;
              }else if(isset($_SESSION["FormatoErrato"])){
                //formato errato
                $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"> </input><p style=\"color:red\">Formato non disponibile. File concessi zip, .pdf, .docx, .jpg, .jpeg, .png , .txt</p>";
                $_SESSION["FormatoErrato"]=null;
              }else if(isset($_SESSION["FileTroppoGrande"])){
                //file troppo grande
                $caricaFile="<p>Carica il file</p> <input type=\"file\" name=\"myfile\"></input><p style=\"color:red\">Dimensione del file troppo grande</p>";
                $_SESSION["FileTroppoGrande"]=null;
              }

              echo $caricaFile;
              if(!isset($_SESSION["DescrizioneAssente"])){
                  $descrizione="Inserisci la descrizione<input class=\"input2\" type=\"text\" name=\"descrizione\" placeholder=\"descrizione\" maxlength=\"64\" ></input><br>";
              }else{
                //descrizione non presente
                $descrizione="Inserisci la descrizione<input class=\"input2\" type=\"text\" name=\"descrizione\" placeholder=\"descrizione\"   maxlength=\"64\"></input><p style=\"color:red\">Descrizione obbligatoria</p>";
                $_SESSION["DescrizioneAssente"]=null;
              }
            echo $descrizione;
              ?>
              <text class="title">NOTA</text><input class="input2" type="text" name="nota" placeholder="Inserisci nota" ></input><br>
               <button type="submit" name="save" onclick="myFunction()">Invia Prenotazione</button>


            </form>
          </div>

      </div>





  		</div>
  	</section>
  </main>
  <script src="./bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>

</body>
</html>
