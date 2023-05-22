<?php
   $db_Name = "Viaggi";
   $tb_name_admin = "Amministratore";
   $tb_name_User = "Utente";
   $tb_name_Soggiorno = "Soggiorno";
   $tb_name_Evento = "Attivita";

    $conn = mysqli_connect("localhost","root","root",$db_Name);
    if(!$conn){
        echo'errore nella connessione';
    }

    if(isset($_POST['registra'])){
        $nome = $_POST['nome'] ?? '';
        $cognome = $_POST['cognome'] ?? '';
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $data_nasc = $_POST['born'] ?? '';
        $cellulare = $_POST['cell'] ?? '';
        $email = $_POST['email'] ?? '';

        if(empty($nome) || empty($cognome) || empty($username) || empty($password) || empty($data_nasc) || empty($cellulare) || empty($email)){
            $msg = 'compila tutti i campi';
        }

        //controllosegià esistente
        $query = "SELECT userID
                  FROM $tb_name_User
                  WHERE userName = '$username'";
        $res = $conn->query($query);

        if(mysqli_num_rows($res)>0){
            $msg = "Username già in uso";
        }
        else{
            $insert = "INSERT INTO $tb_name_User (nome, cognome, userName, userPsw,data_nascita, cellulare, email, spesa_tot) VALUES
                        ('$nome','$cognome','$username','$password','$data_nasc','$cellulare', '$email', 0)";
            
            if($conn->query($insert)===TRUE){
                header( "Location: http://localhost/Linguaggi per il Web/Homework/2/PHP_MYSQL/Home.php");
                exit();
            }
            else{
                $msg = 'Si è verificato un problema nella registrazione';
            }

        }
        printf($msg, '<a href="SW.Registrazione.php">torna indietro</a>');
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head><title>Registrazione</title></head>

    <body>
        <div><!--Container-->
            <form action="#" method="POST">

            <div> <!--Parte centrale con i vari campi-->
                <div>
                    <span>Nome</span>
                    <input type="text" name="nome" placeholder="Inserisci il tuo nome" required>
                </div>
                <div>
                    <span>Cognome</span>
                    <input type="text" name="cognome" placeholder="Inserisci il tuo cognome" required>
                </div>
                <div>
                    <span>Username</span>
                    <input type="text" name="username" placeholder="Inserisci il tuo username" required>
                </div>
                <div>
                <?php
                    $n=strtotime("-18 years");
                    $newDate=date("Y-m-d", $n);
                    echo '<span>Data di Nascit&aacute;</span>
                    <input type="date" id="born" name="born" min="1940-01-01" max='.$newDate.'>';
                ?>  
                </div>
                <div>
                    <span>Telefono</span>
                    <input type="text" name="cell" placeholder="Inserisci il tuo telefono" required>
                </div>
                <div>
                    <span>Password</span>
                    <input type="password" name="password" placeholder="Inserisci la tua password" required>
                </div>
                <div>
                    <span>Email</span>
                    <input type="email" name="email" placeholder="Inserisci la tua email" required>
                </div>
        
            </div>

            <div><!--Parte finale con bottone per la registrazione-->
                <input type="submit" name="registra" value="Registrati">
            </div>

            </form>
        </div>
    </body>
</html>
    