<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
  include "connessione.php";   //includo il file per effettuare la connesisone con il db
  
  if(isset($_POST["username"]) && isset($_POST["pass"])){
    $username=$_POST["username"];
    $password=$_POST["pass"];
    echo "<br>email -> " . $username;
    echo "<br> password -> " .$password;
  }
  $md5Pass=md5($password);
  //effettuo la connessione al db per vedere se i dati sono presenti
    $sql = "SELECT persona.codiceFiscale,persona.tipo from persona where persona.username=\"$username\" and persona.password=\"$md5Pass\"";
                 $records=$conn->query($sql);
                 if ( $records == TRUE) {
                     //echo "<br>Query eseguita!";
                 } else {
                   die("Errore nella query: " . $conn->error);
                 }
                 if($records->num_rows ==0){
                       //	echo "la query non ha prodotto risultato";
                       //utente non presente o dati errati
                 }else{
                    //utente presente
                         while($tupla=$records->fetch_assoc()){
                            $codFis=$tupla["codiceFiscale"];
                            $tipo=$tupla["tipo"];

                         }
                         echo "presente";
                         //se l'utente ha cliccato su "ricordami" salvo i suoi dati in due setcookie
                         if(isset($_POST["ricordami"])){
                            $nomeCookie1="username";
                             $nomeCookie2="password";
                             setcookie($nomeCookie1,$username,time() + (86400 * 30), "/");
                             setcookie($nomeCookie2,$password,time() + (86400 * 30), "/");
                         }else{ //elimino eventuali cookie presenti
                           $nomeCookie1="username";
                            $nomeCookie2="password";
                            setcookie($nomeCookie1,null,time() + (86400 * 30), "/");
                            setcookie($nomeCookie2,null,time() + (86400 * 30), "/");
                         }
                         //dato che i dati sono corretti mi salvo l'username in una variabile di sessione
                         $_SESSION["usernameBZ"]=$username;
                          //reindirizzo l'utente alla home
                         if($tipo=="Operatore"){    //se è un operatore lo reindirizzo alla home operatori
                           header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeOperatore/HomeOperatore.php");  //reinderizzo alla home
                         }else{  //altrimenti lo reindirizzo alla home dell'utente(professore o studente)
                           header("Location: http://" .$ip .":" .$porta ."/esPHP/InnovativeBuzzi/HomeUtente/HomeUtente.php");  //reinderizzo alla home

                         }
                }
                $conn->Close();
 ?>
