<?php
    session_start();
    if(!isset($_SESSION['permesso'])){
        header('Location:http://localhost/Linguaggi per il Web/Homework/2/PHP_MYSQL/User.php');
    }

    $db_Name = "Viaggi";
    $tb_name_User = "Utente";
    $tb_name_attivita = "Attivita";
    $tb_carrello_sog = "Carrello_SOG";

    $conn = mysqli_connect("localhost","root","root",$db_Name);
    if(!$conn){
        echo'Errore nella connessione';
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Immagini/logo.png" style="width:100%">
        <title>Pagina iniziale -HOME-</title>
    </head>
    <body style="margin:0px; flex-direction:row">
    <div class="container">        
        <div id="header_1"> <!--HEADER_1 identifica il pezzo grande di header, dove ci terremo titolo, logo, e tastino accedei-->
            <div><img src="Immagini/logo.png" id="logo"></div>
        </div>
        <div id="header_2"> <!--HEADER_2 identifica il pezzo piccolo di header, dove comparirà il menù a tendina per la navigazione tra le pagine-->   
        </div>
        <div >
            <div class="sidebar"  >
                <div><h1>Carrello</h1></div>
                <div>
                </div>
            </div>
            <div style="margin-left:0 " ><!--Parte centrale con tabella che mostra i prodotti a destra e carello(sidbar) a sinistra-->
                <?php
                $tb_name_soggiorno = "Soggiorno";
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
                            <table style="width:80%;">
                            <form action="#" name="carrello" method="POST">
                            <tr>
                                <td rowspan="2">Immagine</td>
                                <td>'.$fieldname3.'</td>
                                <td rowspan="2">'.$fieldname1.'</td>
                                <td><span>partenza</span><input type="date" name="part" required></td>    
                            </tr>
                            <tr>
                                <td rowspan="2"><p>Prenota anche tu una vacanza di merda con la nostra agenzia di merda,
                                    te ne pentirai sicuramente ma almeno noi ci guadagnami. Inutile povero di medrda che sicuramente userai l\'offerta per 
                                    farmi fare una funzione in più, TACCI TUA </p></td>
                                <td><input type="number" name="people" min="1" max="30" placeholder="persone" required>
                                    <input type="number" name="days" min="1" max="30" placeholder="giorni" required></td>                                    </tr>
                            <tr>
                                <td>'.$fieldname2.'</td>
                                <td>'.$fieldname4.'</td>
                                <td><input type="submit" name="carrello" value="seleziona"></td>

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
    </div>

    <div id="footer">
    </div>

    </body>
</html>

<?php
    $tb_carrello_att = "Carrello_ATT";

    $sqlQuery = "CREATE TABLE if not exists $tb_carrello_att (";
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
    }//isset
?>