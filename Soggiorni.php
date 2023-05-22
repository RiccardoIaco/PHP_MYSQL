<?php
    session_start();

    if(!isset($_SESSION['permesso'])){
        header('Location:http://localhost/Linguaggi%20per%20il%20Web/Homework/2/PHP_MYSQL/User.php');
    }

    $db_Name = "Viaggi";
    $tb_name_admin = "Amministratore";
    $tb_name_User = "Utente";
    $tb_name_soggiorno = "Soggiorno";
    $tb_name_Evento = "Attivita";

    $conn = mysqli_connect("localhost","root","root",$db_Name);
    if(!$conn){
        echo'Errore nella connessione';
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title> Soggiorni </title>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Immagini/logo.png" style="width:100%">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    </head>

    <body style="margin:0px; flex-direction:row">
 <div class="container">
         
    <!--Header 1-->
        <div class="header1"> 
        <div class="mySlides fade">
    <div class="numbertext">1 / 6</div>
    <img src="Immagini/amsterdam.jpg" style="width:100%; height:17vh; object-fit:cover">
    <div class="text">Amsterdam</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">2 / 6</div>
    <img src="Immagini/bali.jpeg" style="width:100%; height:17vh; object-fit: cover" >
    <div class="text">Bali</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">3 / 6</div>
    <img src="Immagini/barcellona.jpg" style="width:100%; height:17vh; object-fit: cover; object-position:bottom " >
    <div class="text">Barcellona</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">4 / 6</div>
    <img src="Immagini/losangeles.jpg" style="width:100vw; height:17vh; object-fit: cover" >
    <div class="text">Los Angeles</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">5 / 6</div>
    <img src="Immagini/stintino.jpg" style="width:100%; height:17vh; object-fit: cover; object-position:center" >
    <div class="text">Sardegna</div>
    </div>

    <div class="mySlides fade">
    <div class="numbertext">6 / 6</div>
    <img src="Immagini/tenerife.jpeg" style="width:100%; height:17vh; object-fit: cover" >
    <div class="text">Tenerife</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
    <script type="text/javascript" src="script.js"></script>

<!--Header 2-->
    <div class="header2"> 
        <a href="Home.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="Soggiorni.php" style="font-weight: bolder; color:darkslateblue"><i class="fa fa-bed"></i> Soggiorni</a>
        <a href="Attivita.php"><i class="fa fa-users"></i> Attivit&agrave;</a>
        <a href="User.php" style="float:right"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>

<!--Carrello-->
<div class="sidebar" >
    <h2> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Carrello
    </h2>
</div>
    <div style="margin-left:0; margin-top:1% " ><!--Parte centrale con tabella che mostra i prodotti a destra e carrello(sidebar) a sinistra-->
            <?php

                include 'descrizione.php';

            $query = "SELECT  soggiornoID, destinazione, paese, offerta, prezzo
                        FROM $tb_name_soggiorno";

            if($res = $conn->query($query)){

                while($row = $res->fetch_assoc()){
                    $id = $row['soggiornoID'];
                    $fieldname1 = $row['destinazione'];
                    $fieldname2 = $row['paese'];
                    $fieldname3 = $row['offerta'];
                    $fieldname4 = $row['prezzo'];

                    echo'
                        <table>
                        <form action="#" name="carrello" method="POST">
                        <tr>
                            <td rowspan="2" width="30%"><img src="Hotel/'.$fieldname1.'.jpg" style="height:25vh; width:100%"></td>
                            <td>'.$fieldname3.'</td>
                            <td rowspan="2" width="15%">'.$fieldname1.'</td>
                            <td style="width:15%"><span>Partenza</span><input type="date" id="calend" name="part" required></td>    
                        </tr>
                        <tr>
                            <td rowspan="2"><p>'.$description[$fieldname1].'</p></td>
                            <td><input class="bottoni"type="number" name="people" min="1" max="30" placeholder="persone" required>
                                <input class="bottoni" type="number" name="days" min="1" max="30" placeholder="giorni" required></td>                                    </tr>
                        <tr>
                            <td>'.$fieldname2.'</td>
                            <td>'.$fieldname4.'</td>
                            <td><input class="bottoni2" type="submit" name="carrello" value="Procedi"></td>

                            <input type="hidden" name="dest" value='.$fieldname1.'>
                            <input type="hidden" name="IdSog" value='.$id.'>
                            <input type="hidden" name="prez" value='.$fieldname4.'>    
                        </tr>
                        </form>
                        </table>
                    ';

                }
            }
            ?>
        </div>                              
    </div>

    <div class="foot">
        <div style="width:100%; text-align:center">
            <h3>Contatti</h3>
        </div>
        <div style="width:50%">
            <ul>
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> Serena</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> Tel.: +39 321 4567800</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> Mail: serena@travelexpress.com</p>
            </ul>
        </div>

        <div style="width:50%">
            <ul>
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> Riccardo</p>
                <p><i class="fa fa-phone" aria-hidden="true"></i> Tel.: +39 321 4567800</p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i> Mail: riccardo@travelexpress.com</p>
            </ul>
        </div>
    </div>
    
        
    </div>



</div>



    </body>
</html>

<?php
    $tb_carrello_sog = "Carrello_SOG";

    $sqlQuery = "CREATE TABLE if not exists $tb_carrello_sog (";
    $sqlQuery.= "ID int NOT NULL auto_increment, primary key(ID), ";
    $sqlQuery.= "destinazione varchar(50), ";
    $sqlQuery.= "id_soggiorno int, ";
    $sqlQuery.= "importo_sog float,";
    $sqlQuery.= "data_inizio date,";
    $sqlQuery.= "data_fine date,"; //data_inizio + giorni
    $sqlQuery.= "persone int,";
    $sqlQuery.= "giorni int";
    $sqlQuery.= ");";

    if(!$conn->query($sqlQuery)){
        echo'errore nella creazione';
    }

    if(isset($_POST['carrello'])){
        $id_sog = $_POST['IdSog'];
        $dest = $_POST['dest'];
        $pers_iss = $_POST['people'];
        $giorni_iss = $_POST['days'];
        $data = $_POST['part'];
        $prex = $_POST['prez'];

        $query = "SELECT persone, giorni
                  FROM $tb_carrello_sog
                  WHERE id_soggiorno = '$id_sog' and data_inizio = '$data'";

        if($result=$conn->query($query)){
            $row = $result->fetch_assoc();
            if($row != NULL){
                $current_P = $row['persone'];
                $current_G = $row['giorni'];

                $new_P = $current_P + $pers_iss;
                $new_G = $current_G + $giorni_iss;

                $sel = "SELECT persone, sconto
                        FROM $tb_name_soggiorno
                        WHERE soggiornoID = '$id_sog'";
    //Controllo se sono previste delle offerte per i soggiorno desiderato
                if($result=$conn->query($sel)){
                    $row = $result->fetch_assoc();
                    if($row['persone'] != NULL){//sono previsti degli sconti
                        if($pers_iss == $row['persone']){
                            //funzione per togliere la percentuale dello sconto dal totale se rispettata l'offerta
                            $sconto = (($prex*$new_G*$new_P)/100)*$row['sconto'];
                            $importo = ($prex*$new_G*$new_P) - $sconto;
                        }
                        else{
                            $importo = ($prex*$new_G*$new_P);
                        }
                    }
                    else//non sono previsti sconti
                        $importo = ($prex*$new_G*$new_P);
                }  

                $d = strtotime("$data+ $new_G day");
                $fine = date("Y-m-d",$d);
    //L'update permeette di aggiungere giorni e persone al viaggio ma non di sovrascrivere i dati già presenti nel carrello,
    //per fare una cosa del genere esiste il tasto per svuotare il carrello ed eliminare il suo contenuto
                $mod = "UPDATE $tb_carrello_sog
                        SET persone = '$new_P', giorni = '$new_G', importo_sog = '$importo', data_fine = '$fine'
                        WHERE id_soggiorno = '$id_sog' and data_inizio = '$data'";
                if(!$res = $conn->query($mod))
                    echo 'Errore nella modifica della tabella Carerello';
              }  }

            else{//prenotazione vuota, carrello non ha quei dati
                $sel = "SELECT persone, sconto
                        FROM $tb_name_soggiorno
                        WHERE soggiornoID = '$id_sog'";

                if($result=$conn->query($sel)){
                    $row = $result->fetch_assoc();
                    if($row['persone'] != NULL){
                        if($pers_iss == $row['persone']){
                            //funzione per togliere la percentuale dello sconto dal totale se rispettata l'offerta
                            $sconto = (($prex*$giorni_iss*$pers_iss)/100)*$row['sconto'];;
                            $importo = ($prex*$giorni_iss*$pers_iss) - $sconto;
                        }
                        else{
                            $importo = ($prex*$giorni_iss*$pers_iss);
                        }
                    }
                    else//non ci sono sconti
                        $importo = ($prex*$giorni_iss*$pers_iss);  
                }
                $d = strtotime("$data+ $giorni_iss day");
                $fine = date("Y-m-d",$d);

                $insert = "INSERT INTO $tb_carrello_sog (destinazione, id_soggiorno, importo_sog, data_inizio, data_fine,  persone, giorni) 
                           VALUES ('$dest','$id_sog','$importo','$data','$fine','$pers_iss','$giorni_iss')";

                if(!$res = $conn->query($insert))
                    echo 'Errore nella modifica della tabella Carerello';
            }
        
        }
            // Aggiunta della spesa al cliente, utilizzo la sessione per farlo. ma è necessario se faccio la tabella resoconto?
    //isset
?>