<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link href="style.css" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="Immagini/logo.png" style="width:100%">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
        <title>Travel Express</title>
</head>

<body style="margin:0px; overflow:visible">

 <div class="container">
   <!--Header1 contiene lo slider delle immagini-->        
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

    <!--Fine Header1-->

 <!--Header2 contiene la barra del menu-->

    <div class="header2"> 
        <a href="Home.php" style="font-weight: bolder; color:darkslateblue"><i class="fa fa-fw fa-home"></i> Home</a>
        <a href="Soggiorni.php"><i class="fa fa-bed"></i> Soggiorni</a>
        <a href="Attivita.php"><i class="fa fa-users"></i> Attivit&agrave;</a>
        <a href="User.php" style="float:right"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
 <!--Fine Header2-->

 <!--Inizio della presentazione dell'agenzia-->
    <div class="corpo">
        <p>
            Travel Express &egrave; l'agenzia di viaggio che tutti dovrebbero consultare per godersi una bella vacanza! </br>
            Sul nostro sito si possono trovare diverse mete in giro per il mondo, basta selezionare quella che fa pi&ugrave; al caso vostro,
            inserendo date e persone e noi automaticamente calcoleremo il prezzo.
            Soggiornerete in uno dei nostri spettacolari alberghi, situati nei punti più strategici delle destinazioni. </br>
            Cosa aspettate? Affrettatevi a consultare il sito!
        </p>
    </div>

    <div class="corpo">
        <p>
            La lista di mete da raggiungere è in continuo aggiornamento, i titolari lavorano senza sosta per proporre le migliori offerte e soddisfare tutti i clienti.
            Per ora le destinazioni sono principalmente sei, ma se non ce ne &egrave; una che vi ispira, non preoccupatevi, troveremo quella che accontenter&agrave; le vostre richieste.
            Rimanete aggiornati iscrivendovi al nostro sito, facendolo potrete accedere ai tutti i soggiorni disponibili e godere di offerte imperdibili.
            Viaggiare &egrave; sempre bello, sia in solitaria che in gruppo per questo noi di Travel Express abbiamo scelto accuratamente le migliori attivit&agrave; 
            per soddisfare qualsiasi esigenza, in questo modo nessuno si sentir&agrave; escluso.
        </p>
    </div>

    <div class="corpo">
        <p>
            Venite a trovarci in Via Andrea Doria 5, organizzaremo insieme la vacanza dei vostri sogni e realizzeremo ogni vostro desiderio.
        </p>
    </div>
  


    <div class="corpo">
        <h3>
            Per il login clicca <a href="User.php">qui</a>, se non sei ancora iscritto/a, vai a questa <a href="Registrazione.php">pagina</a>
            che ti porter&agrave; alla schermata di registrazione.
        </h3>
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
    </body>
</html>


