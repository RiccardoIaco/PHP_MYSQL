<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head><title>Creazione e popolamento Database viaggi</title></head>

<body>
<h3>Creazione e popolazione Viaggi</h3>

 <?php
error_reporting(E_ALL &~E_NOTICE);

$db_name = "Viaggi";
$tb_name_admin = "Amministratore";
$tb_name_user = "Utente";
$tb_name_soggiorno = "Soggiorno";
$tb_name_attivita = "Attivita";

$mysqliConnection = new mysqli("localhost", "root", "root");

if (mysqli_connect_errno()) {
    printf("Problema di connessione al database: %s\n", mysqli_connect_error());
//    exit();
}
 
// creazione del database
$queryCreazioneDatabase = "CREATE DATABASE $db_name";
// il risultato della query va in $resultQ
if ($resultQ = mysqli_query($mysqliConnection, $queryCreazioneDatabase)) {
    printf("Creazione effettuata\n");
}
else {
    printf("Errore creazione\n");
//  exit();
}

$mysqliConnection->close();


$mysqliConnection = new mysqli("localhost", "root", "root", $db_name);

if (mysqli_errno($mysqliConnection)) {
    printf("Problema di connessione: %s\n", mysqli_error($mysqliConnection));
    exit();
}

$sqlQuery = "CREATE TABLE if not exists $tb_name_admin (";
$sqlQuery.= "adminID int NOT NULL, primary key (adminID), ";
$sqlQuery.= "adminName varchar (30) NOT NULL, ";
$sqlQuery.= "adminPsw varchar (30) NOT NULL ";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Amministratore creata\n");
else {
    printf("Creazione tabella Amministratore non avvenuta\n");
  exit();
}

$sqlQuery = "CREATE TABLE if not exists $tb_name_user (";
$sqlQuery.= "UserID int NOT NULL auto_increment, ";
$sqlQuery.= "nome varchar (30), ";
$sqlQuery.= "cognome varchar(30), ";
$sqlQuery.= "username varchar(30), primary key (userID, username),";
$sqlQuery.= "userPsw varchar(10),";
$sqlQuery.= "data_nascita date, ";
$sqlQuery.= "cellulare char(30), ";
$sqlQuery.= "email char(30), ";
$sqlQuery.= "spesa_tot float ";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Utente creata\n");
else {
    printf("Creazione tabella Utente non avvenuta\n");
  exit();
}

$sqlQuery = "CREATE TABLE if not exists $tb_name_soggiorno (";
$sqlQuery.= "soggiornoID int NOT NULL auto_increment,  ";
$sqlQuery.= "destinazione varchar (50) NOT NULL, ";
$sqlQuery.= "paese varchar(20) NOT NULL,  primary key (soggiornoID, paese),";
$sqlQuery.= "offerta varchar(200), ";
$sqlQuery.= "prezzo float,";
$sqlQuery.= "persone int, ";
$sqlQuery.= "sconto int";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Soggiorno creata\n");
else {
    printf("Creazione tabella Soggiorno non avvenuta\n");
  exit();
}


$sqlQuery = "CREATE TABLE if not exists $tb_name_attivita (";
$sqlQuery.= "attivitaID int NOT NULL auto_increment, primary key (attivitaID), ";
$sqlQuery.= "descrizione varchar(200) NOT NULL, ";
$sqlQuery.= "costo float,";
$sqlQuery.= "localita varchar(50) NOT NULL,  ";
$sqlQuery.= "country varchar(50) NOT NULL";
$sqlQuery.= ");";

echo "<P>$sqlQuery</P>";

if ($resultQ = mysqli_query($mysqliConnection, $sqlQuery))
    printf("Tabella Attivita creata\n");
else {
    printf("Creazione tabella Attivita non avvenuta\n");
  exit();
}

echo mysqli_errno($mysqliConnection);
?>

<?php
//Popolamento delle tabelle
$insert = "INSERT INTO $tb_name_admin (adminID, adminName, adminPsw) VALUES
        (01, \"Serena\", \"Serena\"),
        (02, \"Riccardo\", \"Riccardo\")";

    if($resultQ = mysqli_query($mysqliConnection, $insert))
    {
        printf("Popolamento avvenuto \n");
    }
    else
    {
        printf("Errore nella popolazione della tabella : %s\n", $tb_name_admin );
        exit();
    }

//Controllare cosa si vuole mettere, pensavo a 2/3 eventi per localita, oppre li mettiamo uguali su ogni soggiotno
$insert = "INSERT INTO $tb_name_soggiorno (destinazione, paese, offerta, prezzo, persone, sconto ) VALUES
        (\"Stintino\", \"Italia\", \" Ogni 6 persone, il totale è scontato del 25% \", 250, 6, 25),
        (\"Bali\", \"Thailandia\", \" Ogni 4 persone, il totale è scontato del 10% \", 137, 4, 10),
        (\"Tenerife\", \"Spagna\", \" Ogni 6 persone, il totale è scontato del 15% \", 170, 6, 15),
        (\"Amsterdam\", \"Paesi Bassi\", \" Previsto uno sconto del 20% per gruppi da 10 persone \", 100, 10, 20),
        (\"Los Angeles\", \"Stati Uniti\", \" Per due persone, è previsto uno sconto del 5% \",154, 2, 5),
        (\"Barcellona\", \"Spagna\", \" Nessuno sconto applicabile \", 89, null, null)"
        ;

    if($resultQ = mysqli_query($mysqliConnection, $insert))
    {
        printf("Popolamento avvenuto \n");
    }
    else
    {
        printf("Errore nella popolazione della tabella : %s\n", $tb_name_Soggiorno);
        exit();
    }

$insert = "INSERT INTO $tb_name_attivita (descrizione, costo, localita, country ) VALUES
        (\"Festa green sulla spiaggia\", 0, \"Sardegna\", \"Italia\"),
        (\"Visita ad Alghero\", 30, \"Sardegna\", \"Italia\"),

        (\"Visita a Ubud\", 49, \"Bali\", \"Thailandia\"),
        (\"Camminata all'alba sul Monte Batur con sorgenti termali\", 39, \"Bali\", \"Thailandia\"),

        (\"Crociera su yatch ecologico a Los Cristianos\", 20, \"Tenerife\", \"Spagna\"),
        (\"Safari con kayak con tartarughe marine e snorkeling\", 22, \"Tenerife\", \"Spagna\"),

        (\"Visita al Museo Upside Down\", 19 , \"Amsterdam\",  \"Paesi Bassi\"),
        (\"Escursione ai villaggi Zaanse Schans Volendam e Marken con partenza da Amsterdam\", 41 , \"Amsterdam\", \"Paesi Bassi\"),
        (\"Visita al Museo di Van Gogh\",22, \"Amsterdam\", \"Paesi Bassi\"),

        (\"Ingresso agli Universal Studios\", 80, \"Los Angeles\", \"CA Stati Uniti \"),
        (\"Tour panoramico notturno con guida a Las Vegas  \", 52, \"Las Vegas\", \"NE Stati Uniti\"),

        (\"Visita all'interno della Sagrada Familia \", 20, \"Barcellona\", \"Spagna\"),
        (\"Ingresso a Parc Güell\", 17, \"Barcellona\", \"Spagna\")";
    
        

    if($resultQ = mysqli_query($mysqliConnection, $insert))
    {
        printf("Popolamento avvenuto \n");
    }
    else
    {
        printf("Errore nella popolazione della tabella : %s\n", $tb_name_attivita );
        exit();
    }


//Chiusura connessione
mysqli_close($mysqliConnection);

?>

</body>
</html>
