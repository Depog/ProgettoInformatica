<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  /*Controlli per vedere se si e' eseguito il login*/
  if(isset($_SESSION["usernameBZ"])){
    //rimango qua
  }else{
    header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");  //reinderizzo alla home
  }
  //  echo "operatore";
  function minData() {
    $dataOggi=date("Y-m-d");
    echo $dataOggi;
  }
?>

 <html>
 <head>
 	<title>HOME OPERATORE</title>
 	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma-tooltip@3.0.2/dist/css/bulma-tooltip.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/datepicker-bulma.css">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" type="text/css" href="../../HomeUtente/css/util.css">
  <link href="../../HomeUtente/css/main.css" rel="stylesheet" type="text/css"  >
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
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
  });</script>
  <link href="creaAcquisto.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>

     @import url("https://fonts.googleapis.com/css?family=DM+Sans:500,700&display=swap");
     *{
       margin: 0;
       padding: 0;
       text-decoration: none;
     }

     header{
       z-index: 9999;
       position: fixed;
       height: auto;
       width: 100%;
       background: #FFFF;
     }


     body {
       background: url(../img/wallpaper.jpg) no-repeat fixed;
       background-size: cover;
       position: relative;
       display: -webkit-box;
       display: flex;
       height: 100vh;
       width: 100%;
       -webkit-box-pack: center;
               justify-content: center;
       padding: 0 0;
       background-color: #2f3640;
     }

     .container-table100 {
       width: 100%;
       min-height: 100vh;
       display: -webkit-box;
       display: -webkit-flex;
       display: -moz-box;
       display: -ms-flexbox;
       display: flex;
       margin-top: 0px;
       flex-wrap: wrap;
       padding: 0px 0px;
       margin-right: 10%;
       position: fixed;
       top: 25%;
       left: 5%;
     }
     .nav {
       display: -webkit-inline-box;
       display: inline-flex;
       position: relative;
       overflow: hidden;
       width: 100%;
       background-color: #fff;
       margin-left: 500px;
       box-shadow: 0 10px 40px rgba(159, 162, 177, 0.8);
       float: right;

     }


     .nav-item {
       color: #83818c;
       padding: 20px;
       text-decoration: none;
       -webkit-transition: .3s;
       transition: .3s;
       margin: 0 6px;
       z-index: 1;
       font-family: 'DM Sans', sans-serif;
       font-weight: 500;
       position: relative;
       font-size: 16px;
     }
     .nav-item:before {
       content: "";
       position: absolute;
       bottom: -6px;
       right: 0;
       width: 100%;
       height: 5px;
       background-color: orange;
       border-radius: 8px 8px 0 0;
       opacity: 0;
       -webkit-transition: .3s;
       transition: .3s;
     }

     .nav-item:not(.is-active):hover:before {
       opacity: 1;
       bottom: 0;
     }

     .nav-item:not(.is-active):hover {
       color: purple;
     }

     .nav-indicator {
       position: absolute;
       right: 0;
       bottom: 0;
       height: 4px;
       -webkit-transition: .4s;
       transition: .4s;
       height: 5px;
       z-index: 1;
       border-radius: 8px 8px 0 0;
     }

     @media (max-width: 580px) {
       .nav {
         overflow: auto;
       }
     }

     .formInserimentoAcq {
       position: relative;
       top: 30%;
       right: 85px;
       color: #fff;
     }

     #quantita{
        width: 90px;
     }

     .error{
       color : #fff;
       position: relative;
     }

     text{
       font-family: 'Open Sans', sans-serif;
       color: white;
     }
     text.title{
       font-weight: bold;
       font-size: 15px;
       text-transform: uppercase;
       color: #249d8b;
       padding: 0 0;

     }

     .info-titolo{
       width: 50%;
       max-width: 50%;
       float: left;
       text-transform: uppercase;
       font-weight: bold;
       font-size: 30px;
       color: #FFFFFF;
        text-shadow: 2px 2px 5px black;
        text-align: justify;
     }
     .usr{
       padding-top: 20px;
       width: 80px;
       height: 100%;
       margin-left: 24%;
       margin-top: ;
       text-align: center;
     }
     .usr-text{
       font-family: 'DM Sans', sans-serif;
       font-size: 16px;
     }
   </style>
 </head>

 <body>
   <header>
     <nav class="nav">
       <a href="../HomeOperatore.php" class="nav-item" active-color="orange">Home</a>
       <a href="" class="nav-item is-active" active-color="purple">Registra Acquisto</a>
       <a href="../VisualizzaPrenotazioni.php" class="nav-item"  active-color="red">Prenotazioni</a>
       <a href="../ritiriFotocopie.php" class="nav-item " active-color="brown">Ritiri</a>
       <a href="../CronologiaAcquisti.php" class="nav-item" active-color="green">Storico Acquisti</a>
       <a href="../logout.php" class="nav-item" active-color="blue">Logout</a>
       <?php
        $usr=$_SESSION["usernameBZ"];
        echo "<div class=\"usr\">
          <div class=\"usr-text\"> Ciao: $usr! </p>
        </div>";
       ?>
       <span class="nav-indicator"></span>
     </nav>
   </header>

   <section id="content" class="content" style="width: 100%; height: auto;">
     <div class="container" style="width: 100%; margin-top: 150px;padding: 0;">
        <div class="info-titolo">
          <p style="color: #249d8b;  text-shadow: 2px 2px 5px black; text-align: center; font-size: 40px;">Registra Acquisto</p>
          <p style="color: white; font-size: 25px; text-transform: none; ">
          Questo alla destra è il documento che dovrai compilare per aggiungere un acquisto fatto fisicamente da un cliente. Una volta compilato, ti basterà cliccare sul pulsante "Registra Acquisto" in basso e automaticamente verrà registrato
          </p>
        </div>

        <form  method="POST" action="controllaDatiInput.php"  style="float: right;">
          <?php
              stampaUsername();
              echo "<br />";
              stampaFormato();
              echo "<br />";
              stampaNCopie();
              stampaFronteRetro();
              echo "<br />";
              stampaDescrizione();
              echo "<br />";
              statoAcquisto();
          ?>
          <button type="submit" name="save" style="border-radius: 6px; margin-left: 75px; text-align: center">Registra acquisto</button>
<!--enctype="multipart/form-data"
 onclick="myFunction()"
-->
        </form>
        <br />
        <br />
     </div>
   </section>

    <script>
      var count = 0;
      function changeStateCK() {
        if((count % 2) == 0)
          document.getElementById("relazCK").innerHTML = "SI";
        else {
           document.getElementById("relazCK").innerHTML = "NO";
        }
        count = count + 1;
      }
    </script>
    <script src="../../HomeUtente/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../HomeUtente/js/navbar.js"></script>
    <script src="../../HomeUtente/vendor/bootstrap/js/popper.js"></script>
    <script src="../../HomeUtente/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../HomeUtente/vendor/select2/select2.min.js"></script>
    <script src="../../HomeUtente/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
    		$('.js-pscroll').each(function(){
      		var ps = new PerfectScrollbar(this);
      	  $(window).on('resize', function(){
      			ps.update();
          })
        });
    </script>
    <script src="../../HomeUtente/js/main.js"></script>
    <script src="../bootstrap-input-spinner.js"></script>
    <script>
      $("input[type='number']").inputSpinner()
    </script>
    <script src="vendorjquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/navbar.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function(){
          var ps = new PerfectScrollbar(this);
          $(window).on('resize', function(){
            ps.update();
          })
        });
    </script>
    <script src="../HomeUtente/js/navbar.js"></script>

  </body>
</html>

<?php

function stampaFormato(){
  include "../connessione.php";
  $stampaFormato="";

  $stampaFormato.="<label for=\"formato\"><text class=\"title\">formato</text></label>";
      //faccio un query dal database  per prendere i formati di stampa disponibili
  if(isset($_SESSION["tipoBZ"])){
    if($_SESSION["tipoBZ"]=="Professore"){   //non devo estrarre il costo dal db in quanto i professori non pagano
      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        $sql="SELECT tipo from formato";
        $records=$co->query($sql);
        if ( $records == TRUE) {
            //echo "<br>Query eseguita!";
        } else {
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
        }
        if($records->num_rows ==0){
              //	echo "la query non ha prodotto risultato";
        }else{
            $stampaFormato.="
              <select id=\"formato\" name=\"tipoF\" style=\"width: 250px; height: 38px;\">
              ";
              while($tupla=$records->fetch_assoc()){
                $tipo=$tupla["tipo"];
                $stampaFormato.="
                  <br /><option value=\"$tipo\">$tipo</option>
                  ";
              }
              $stampaFormato.="</select>";
        }

        $co->commit();
        $co->close();
      } catch (Exception $e) {
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
      }

    }else{    //prendo anche il costo dal database
      try {
        $co = connect();
        $co->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);

        $sql="SELECT tipo,costoStampa from formato";
        $records=$co->query($sql);
        if ($records == TRUE) {
            //echo "<br>Query eseguita!";
        }else{
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
        }
        if($records->num_rows ==0){
              //	echo "la query non ha prodotto risultato";
        }else{
          $stampaFormato.="
            <br />
            <div class=\"select\">
              <select id=\"formato\" name=\"tipoF\" style=\"width: 250px; height: 38px;\">
              ";
          while($tupla=$records->fetch_assoc()){
            $tipo=$tupla["tipo"];
            $costoStampa=$tupla["costoStampa"];
            $stampaFormato.="<br /><option value=\"$tipo\">$tipo $costoStampa €</option>*";
          }
          $stampaFormato.="</select>
          </div>";
        }

        $co->commit();
        $co->close();
      } catch (Exception $e) {
          $co->rollBack();
          $co->close();
          header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Errore/Errore.php?msg=Siamo spiacente si è verificato un imprevisto");
      }

    }

  }

   echo $stampaFormato;
}

function stampaFronteRetro(){
  $stampaFronteRetro="";
  $stampaFronteRetro="
  <br> <br /><text class=\"title\">Fronte retro</text>
  <label class=\"container-checkbox\" style=\"background-color: black;\">
      <input type=\"checkbox\"  name=\"f&r\"  >
      <span class=\"checkmark\"></span>
  </label>
  <br />
  ";
  echo $stampaFronteRetro;
}

function stampaNCopie(){
  $stampaNCopie="";
  $stampaNCopie="<br /><text class=\"title\"><br>N copie</text>
  <div style=\"width:250px;\">
    <input type=\"number\" name=\"quantita\" value=\"1\" placeholder=\"\" min=\"1\" max=\"100\">
  </div>

  ";
  echo $stampaNCopie;

}

function stampaDescrizione(){
  if(isset($_SESSION["DescrizioneAssente"])){
      $stampaDescrizione="
      <text class=\"title\">descrizione</text>
      <div class=\"Input0\">
        <input type=\"text\" id=\"input\" class=\"Input-text0\" name=\"descrizione\" value=\"\" placeholder=\"Descrizione\">
        <label for=\"input\" class=\"Input-label0\">Descrizione</label>

      </div><br><br><br>
       <b style=\"color: red; position: relative;\">!DESCRIZIONE OBBLIGATORIA!</b>
      ";
      $_SESSION["DescrizioneAssente"]=null;
  }else{

    $stampaDescrizione="
    <text class=\"title\">DESCRIZIONE</text>
    <div class=\"Input0\">
      <input type=\"text\" id=\"input\" class=\"Input-text0\" name=\"descrizione\" value=\"\" placeholder=\"Descrizione\">
      <label for=\"input\" class=\"Input-label0\">Descrizione</label>
    </div><br><br>
    ";
  }
  echo $stampaDescrizione;
}

function stampaUsername(){
  if(isset($_SESSION["UsernameAssente"])){
      $stampaUsername="
      <text class=\"title\">username</text>
      <div class=\"Input0\">
        <input type=\"text\" id=\"input\" class=\"Input-text0\" name=\"username\" value=\"\" placeholder=\"Username\">
      </div><br><br><br>";
      if($_SESSION["UsernameAssente"] == "sbagliato") {
        $stampaUsername.="
         <b style=\"color: red; position: relative;\">!USERNAME INESISTENTE!</b>
         ";
      }else {
        $stampaUsername.="
         <b style=\"color: red; position: relative;\">!USERNAME OBBLIGATORIO!</b>
         ";
      }
      $_SESSION["UsernameAssente"]=null;
  }else{

    $stampaUsername="
    <text class=\"title\">Username</text>
    <div class=\"Input0\">
      <input type=\"text\" id=\"input\" class=\"Input-text0\" name=\"username\" value=\"\" placeholder=\"Username\">
      <label for=\"input\" class=\"Input-label0\">Username</label>
    </div><br><br>
    ";
  }
  echo $stampaUsername;
}

function statoAcquisto() {
  if(isset($_SESSION["stato_acquisto"])) {
    $_SESSION["stato_acquisto"] = null;
    echo "<b style=\"color: green; position: relative; text-align: center;\">ACQUISTO ANDATO A BUON FINE<br><br>";
  }else {
    echo "";
  }
}

 ?>
