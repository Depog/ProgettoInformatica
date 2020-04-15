<?php
		session_start();
		$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...

 ?>
<html >
<head>
	<title>Innovative Buzzi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
<body style="background-color: #666666;">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="EffettuaLogin.php" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>

						<?php
							$msg="";
						//controllo che i cookie siano settati, se fosse cosi allora riempo i campi con i valori salvato
						if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
							$username=$_COOKIE["username"];
								$password=$_COOKIE["password"];
								$msg.="	<div class=\"wrap-input100 validate-input\" data-validate = \"Username necessario\">
										<input class=\"input100\" type=\"text\" name=\"username\" value=\"$username\">
										<span class=\"focus-input100\"></span>
										<span class=\"label-input100\">Username</span>
									</div>


									<div class=\"wrap-input100 validate-input\" data-validate=\"Password necessaria\">
										<input class=\"input100\" type=\"password\" name=\"pass\" value=\"$password\">
										<span class=\"focus-input100\"></span>
										<span class=\"label-input100\">Password</span>
									</div>";
									//seleziono "ricordami"
								$msg.="	<div class=\"flex-sb-m w-full p-t-3 p-b-32\">
										<div class=\"contact100-form-checkbox\">
											<input class=\"input-checkbox100\" id=\"ckb1\" type=\"checkbox\" name=\"ricordami\" checked>
											<label class=\"label-checkbox100\" for=\"ckb1\">
												Resta connesso
											</label>
										</div>";

				}else{
					$msg.="	<div class=\"wrap-input100 validate-input\" data-validate = \"Username necessario\">
							<input class=\"input100\" type=\"text\" name=\"username\">
							<span class=\"focus-input100\"></span>
							<span class=\"label-input100\">Username</span>
						</div>
						<div class=\"wrap-input100 validate-input\" data-validate=\"Password necessaria\">
							<input class=\"input100\" type=\"password\" name=\"pass\" >
							<span class=\"focus-input100\"></span>
							<span class=\"label-input100\">Password</span>
						</div>
						<div class=\"flex-sb-m w-full p-t-3 p-b-32\">
								<div class=\"contact100-form-checkbox\">
									<input class=\"input-checkbox100\" id=\"ckb1\" type=\"checkbox\" name=\"ricordami\" >
									<label class=\"label-checkbox100\" for=\"ckb1\">
										Resta connesso
									</label>
								</div>";

					}
					echo $msg;
						?>
						<div>
							<a href="#" class="txt1">
								Password dimenticata? contatta l'ufficio tecnico
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>




				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	<?php
		if(isset($_SESSION["usernameBZ"])){
			header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/homeBZ.php");  //reinderizzo alla home

		}

	 ?>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
