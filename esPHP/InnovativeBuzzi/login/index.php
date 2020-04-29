<?php
		session_start();
		$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<?php
	function showHome($username, $password){
		$msg=null;

		$msg.="
		<div class=\"wrap-input100 validate-input\" data-validate = \"Inserisci username\">
			<input class=\"input100\" type=\"text\" name=\"username\" placeholder=\"Username\" value=\"$username\">
			<span class=\"focus-input100\" data-placeholder=\"&#xf207;\"></span>
		</div>

		<div class=\"wrap-input100 validate-input\" data-validate=\"Inserisci password\">
			<input class=\"input100\" type=\"password\" name=\"pass\" placeholder=\"Password\" value=\"$password\">
			<span class=\"focus-input100\" data-placeholder=\"&#xf191;\"></span>
		</div>

		<div class=\"contact100-form-checkbox\">
			<input class=\"input-checkbox100\" id=\"ckb1\" type=\"checkbox\" name=\"ricordami\">
			<label class=\"label-checkbox100\" for=\"ckb1\">
				Ricordami
			</label>
		</div>";
		echo $msg;
	}
	?>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">


				<form class="login100-form validate-form" action="EffettuaLogin.php" method="post">
					<a href="http://www.itistulliobuzzi.it/buzziwebsite/home/index.asp" >	<img src="images/buzzi.gif" alt="logoBuzzi" class="imgCenter" /> </a>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in <br>
						<?php
								if(isset($_SESSION["DatiErrati"])){
									//errore, dati errati o account non presente
									$messaggioErrore="<a style=\"color: red;\"> Dati errati o account non presente!</a>";
									echo $messaggioErrore;
								}else{
									//continua
								}

						 ?>
					</span>
					<?php

					$msg="";
					if(isset($_SESSION["usernameBZ"])){
						if(isset($_SESSION["tipoBZ"])){
								if($_SESSION["tipoBZ"]=="Operatore"){
								header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/HomeOperatore.php");
								}else{
									header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeUtente/HomeUtente.php");
								}
			    	}
					}

					if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
						$username=$_COOKIE["username"];
						$password=$_COOKIE["password"];
						showHome($username, $password);
					}else{
						$username="";
						$password="";
						showHome($username, $password);
					}

					?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>

						<?php
							if(isset($_SESSION["DatiErrati"])){
								//cosi la stampa si adatta allo scorrimento verso il basso
								$stampaAiuto="<<p style=\"margin-top: 10px;\">
											Per eventuali problemi, contattare la sala stampa
								<a class=\"txt1\" href=\"#\">
								</a></p>";
									$_SESSION["DatiErrati"]=null;
							}else{
								//senza errori
								$stampaAiuto="<<p style=\"margin-top: 30px;\">
											Per eventuali problemi, contattare la sala stampa
								<a class=\"txt1\" href=\"#\">
								</a></p>";
							}
							echo $stampaAiuto;
					?>
					</div>
				</form>



			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/navbar.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
