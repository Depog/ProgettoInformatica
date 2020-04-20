<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--==============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
  <link href="css/main.css" rel="stylesheet" type="text/css"  >
<!--===============================================================================================-->
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
  .inner-width{
    background: black;
    max-width: 100%;
    padding: 0 10px;
    margin: auto;
  }
  body {

    display: -webkit-box;
    display: flex;
    height: 100vh;
    width: 100%;
    -webkit-box-pack: center;
            justify-content: center;
    padding: 0 20px;
    background-color: #2f3640;
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
  }
  .nav-item:before {
    content: "";
    position: absolute;
    bottom: -6px;
    right: 0;
    width: 100%;
    height: 5px;
    background-color: #dfe2ea;
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
    color: #333;
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
</style>
</head>

<body>
  <header>
    <nav class="nav">
      <a href="" class="nav-item is-active" active-color="orange">Home</a>
      <a href="contattaci.php" class="nav-item" active-color="green">Contattaci</a>
      <a href="#" class="nav-item" active-color="blue">Logout</a>
      <span class="nav-indicator"></span>
    </nav>
  </header>




  <?php
    if(isset($_SESSION["usernameBZ"])){
      //rimango qua
    }else{
      header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/index.php");
    }


  $homeUtente="<div class=\"container-table100\">
                  <div class=\"info\">
                    <b class=\"info-title\">
                    ACQUISTI
                    </b>
                    <div class=\"info-text\">
                    Qui a fianco troverai la cronologia dei tuoi ultimi acquisti
                    </div>
                  </div>

            			<div class=\"wrap-table100\">
                				<div class=\"table100 ver3 m-b-110\">
                					<div class=\"table100-head\">
                						<table>
                							<thead>
                								<tr class=\"row100 head\">
                									<th class=\"cell100 column1\">Nome</th>
                									<th class=\"cell100 column2\">Data</th>
                									<th class=\"cell100 column3\">Ora</th>
                									<th class=\"cell100 column4\">Quantità</th>
                								</tr>
                							</thead>
                						</table>
                					</div>
                					<div class=\"table100-body js-pscroll\">
                						<table>
                							<tbody>";

                              include "connessione.php";
                              $username=$_SESSION["usernameBZ"];
                              $nome=array();
                              $data=array();
                              $ora=array();
                              $quantità=array();

                              $sql = "SELECT prodotto.nomeProdotto as nome, acquisto.dataAcquisto as data, acquisto.orarioAcquisto as ora, acquisto.quantità as quantità from persona
                                      join acquisto on persona.codiceFiscale=acquisto.codiceFiscale
                                      join include on acquisto.idAcquisto=include.idAcquisto
                                       join prodotto on include.idProdotto=prodotto.idProdotto
                                      where persona.username=\"$username\"";

                                       $records=$conn->query($sql);
                                       if ( $records == TRUE) {
                                           //echo "<br>Query eseguita!";
                                       } else {
                                         die("Errore nella query: " . $conn->error);
                                       }
                                       if($records->num_rows ==0){ //se l'utente non ha ancora effettuato acquisti
                                             $dimArray=1;
                                             $nome[]="Nessun dato presente";
                                             $data[]="";
                                             $ora[]="";
                                             $quantità[]="";
                                       }else{

                                         while($tupla=$records->fetch_assoc()){
                                           $nome[]=$tupla["nome"];
                                           $data[]=$tupla["data"];
                                           $ora[]=$tupla["ora"];
                                           $quantità[]=$tupla["quantità"];
                                         }

                                         $dimArray=sizeof($nome);

                                         if($dimArray<7){
                                           $dim=7-$dimArray;
                                           for($i=0; $i<$dim; $i++){
                                             array_push($nome, "");
                                             array_push($data, "");
                                             array_push($ora, "");
                                             array_push($quantità, "");
                                           }
                                         }
                                       }

                              /*STAMPA*/
                              for($i=0; $i<$dimArray; $i++){
                                $homeUtente.="
                  								<tr class=\"row100 body\">
                  									<td class=\"cell100 column1\">$nome[$i]</td>
                  									<td class=\"cell100 column2\">$data[$i]</td>
                  									<td class=\"cell100 column3\">$ora[$i]</td>
                  									<td class=\"cell100 column4\">$quantità[$i]</td>
                  								</tr>
                                  ";
                              }
                						$homeUtente.="
                							</tbody>
                						</table>
                					</div>
              				</div>
                    </div>
          <!----------------------PRENOTAZIONE----------------------------------->



            <div class=\"pren\">
              <div class=\"pren-img\">

              </div>
              <div class=\"pren-text\">
                <b>PRENOTAZIONE</b><br />
                Qui accanto troverai il modulo da compilare per inviare il tuo file da stampare! Clicca sull'immagine alla sinistra oppure il bottone in fondo per andare nella pagina<br /><br />
                <a href=\"http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/Prenotazione/CaricamentoFile/EffettuaPrenotazione.php\" class=\"btn btn-primary\">Prenota ora</a>
              </div>

           </div>


  			</div>
       ";

       echo $homeUtente;
?>






</body>

<!--===============================================================================================-->
	<script src="vendorjquery/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/navbar.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>
<!--===============================================================================================-->
	<script src="js/navbar.js"></script>


</html>
