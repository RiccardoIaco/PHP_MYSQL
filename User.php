<?php
    $db_Name = "Viaggi";
    $tb_name_admin = "Amministratore";
    $tb_name_User = "Utente";
    $tb_name_Soggiorno = "Soggiorno";
    $tb_name_Evento = "Attivita";

    $conn = mysqli_connect("localhost","root","root",$db_Name); // connessione al DB

	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username']; 
		$password = $_POST['password'];
		
    if($conn){ // se la connessione avviene correttamente
   
      if(isset($_POST['accedi'])){ // controllo che i campi siano settati
   	     if(empty($username) || empty($password)) // controllo campi vuoti
	        header("Location: http://localhost/Linguaggi per il Web/Homework/2/PHP_MYSQL/User.php");
	     else{
	  	    $query = "SELECT *  
                      FROM $tb_name_User
                      WHERE userName = '$username' AND
			          userPsw = '$password'";
	        $ris = $conn->query($query);
			  
			   if(mysqli_num_rows($ris)>0){ // c'è una corrispondenza nel DB
			      session_start();
				  $_SESSION['username'] = $_POST['username'];
				  $_SESSION['permesso'] = 1000;
				  header("Location: http://localhost/Linguaggi per il Web/Homework/2/PHP_MYSQL/Home.php");
			      exit();
			   }
			   else{
				echo '<p style="color:#fff;text-align:center;font-size:20px;">Email o password errati</p>';
			   }
	     }	  		
	  }  
    }else
      echo "Connessione fallita";
}

if(isset($_POST['registrati'])){
	header("Location: http://localhost/Linguaggi per il Web/Homework/2/PHP_MYSQL/Registrazione.php");
  }
?>

<!--?xml version="1.0" encoding="UTF-8"?-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head> 
    <title>Login</title>
</head>

<body>
    <div>
        <div>Login</div>
        <form action="#" method="POST">

            <div><!--spazio dei campi-->
                <div>
                    <span>Username</span>
                    <input type="text" name="username" placeholder="Inserisci in tuo username" >
                </div>
                <div>
                    <span>Password</span>
                    <input type="text" name="password" placeholder="Inserisci la tua password" >
                </div>
            </div>

            <div><!--spazio per i bottoni-->
                <div>
                    <input type="submit" name="accedi" value="Accedi">
                </div>
                <div>
                    <input type="submit" name="registrati" value="Registrati">
                </div>
            </div>
        </form>

    </div>
</body>

</html>