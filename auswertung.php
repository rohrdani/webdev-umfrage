<!-- Auswertung-Umfrage-->
<!doctype html>
<html lang="de" dir="ltr">
 <head>
  <meta charset="utf-8">
  <meta name="author" content="Peter Leonov, Daniel Rohrwild">
  <title>Haustier-Umfrage Auswertung</title>
  <link rel="shortcut icon" type="image/x-icon" href="Bilder/tabbild.png"/>
  <link rel="stylesheet" href="style_auswertung.css">
  
 </head>

 <body> 

<header>
<img src="bilder/support.png" width="60px" height="60px">
<img src="bilder/mail.png" width="70px" height="60px">
<h1>Auswertung der Umfrage</h1>
<img src="bilder/support.png" width="60px" height="60px">
<img src="bilder/mail.png" width="70px" height="60px">

</header> 

<?php

 $server = "localhost";
 $user = "root";
 $pw = "";
 $db = "umfrage";
 
 $dbconnection = mysqli_connect($server, $user, $pw, $db);
 if (mysqli_connect_errno())
 {
	 echo ("Probleme mit der Verbindung: " . mysqli_connect_error());
 }
 else
 {	 

$result = mysqli_query($dbconnection, "select count(*) from pets");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $pets = $row["count(*)"];
 }
}

//Mit Haustier:
//Männlich + Haustier:
$result = mysqli_query($dbconnection, "select count(*) from pets where geschlecht='männlich'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $male_and_pet = $row["count(*)"];
 }
}

//Weiblich + Haustier:
$result = mysqli_query($dbconnection, "select count(*) from pets where geschlecht='weiblich'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $female_and_pet = $row["count(*)"];
 }
}

//Divers + Haustier:
$result = mysqli_query($dbconnection, "select count(*) from pets where geschlecht='divers'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $div_and_pet = $row["count(*)"];
 }
}

//Durschnittliche Anzahl an Haustieren:
$result = mysqli_query($dbconnection, "select sum(anzahl_pets) from pets");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $anzahl_pets = $row["sum(anzahl_pets)"];
 }
}
$durchscnitt = round($anzahl_pets/$pets);



//Ohne Haustier
//gesamt:
$result = mysqli_query($dbconnection, "select count(*) from no_pets");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $no_pets = $row["count(*)"];
 }
}

//Männlich + kein Haustier:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='männlich'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $male_and_no_pet = $row["count(*)"];
 }
}

//Männlich + kein Haustier + zu teuer:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='männlich' and grund='zu teuer'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $male_zu_teuer = $row["count(*)"];
 }
}

//Männlich + kein Haustier + keine Zeit:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='männlich' and grund='keine Zeit'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $male_keine_zeit = $row["count(*)"];
 }
}

//Weiblich + kein Haustier:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='weiblich'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $female_and_no_pet = $row["count(*)"];
 }
}

//Weiblich + kein Haustier + zu teuer:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='weiblich' and grund='zu teuer'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $female_zu_teuer = $row["count(*)"];
 }
}

//Weiblich + kein Haustier + keine Zeit:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='weiblich' and grund='keine Zeit'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $female_keine_zeit = $row["count(*)"];
 }
}

//Divers + kein Haustier:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='divers'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $div_and_no_pet = $row["count(*)"];
 }
}

//Divers + kein Haustier + zu teuer:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='divers' and grund='zu teuer'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $div_zu_teuer = $row["count(*)"];
 }
}

//Divers + kein Haustier + keine Zeit:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where geschlecht='divers' and grund='keine Zeit'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $div_keine_zeit = $row["count(*)"];
 }
}
 
//Prozent der nicht Haustierbesitzer die gerne ein Haustier hätten:
$result = mysqli_query($dbconnection, "select count(*) from no_pets where wunsch='ja'");

if (mysqli_num_rows($result) > 0) {
  
  while($row = mysqli_fetch_assoc($result)) 
  {
   $wunsch = $row["count(*)"];
 }
}
$result_wunsch = round($wunsch / $no_pets * 100);


//Gesamtzahl Teilnehmer:
$pers_gesamt = $pets + $no_pets;

 mysqli_close($dbconnection);	
 }
?>



  <main>
   <p>
	<p id="dank">Vielen Dank dass Sie an unserer Umfrage teilgenommen haben!</p> 
	Nachfolgend finden Sie die aktuelle Auswertung.
	Bitte beachten Sie, dass sich die Ergebnisse der Auswertung noch ändern können, solange die Umfrage läuft.
   </p>
   
   <h2>Insgesamt haben: <?= $pers_gesamt ?> Personen an der Umfrage teilgenommen, davon sind:</h2>
  <section name="test" id="test">
   <section id="s1">
   <h3>Teilnehmer mit Haustier: <strong><?= $pets ?></strong></h5>
   <div><img src="bilder/mann.png" height="30" width="30"> <p>männlich: <strong><?= $male_and_pet ?> </strong></p> </div>
   <div><img src="bilder/frau.png" height="30" width="30"><p>weiblich: <strong><?= $female_and_pet ?></strong></p></div>
   <div><img src="bilder/divers.png" height="30" width="30"><p>divers: <strong><?= $div_and_pet ?></strong></p></div> 
   <p>Im Schnitt haben Haustierbesitzer: <br>
   <strong><?= $durchscnitt ?> Haustiere</strong></p>
  </section>
   
   <section>
   <h3>Teilnehmer ohne Haustier: <?= $no_pets ?></h5>
   <div><img src="bilder/mann.png" height="30" width="30"><p>männlich: <strong><?= $male_and_no_pet ?></strong></p></div>
   <ul>
   <li>"zu teuer": <strong><?= $male_zu_teuer ?></strong> </li>
   <li>"keine Zeit": <strong><?= $male_keine_zeit ?> </strong></li>
   </ul>
   
   <div><img src="bilder/frau.png" height="30" width="30"><p>weiblich: <strong><?= $female_and_no_pet ?></strong></p></div>
   <ul>
   <li>"zu teuer": <strong><?= $female_zu_teuer ?></strong></li>
   <li>"keine Zeit": <strong><?= $female_keine_zeit ?></strong></li>
   </ul>
   
   <div><img src="bilder/divers.png" height="30" width="30"><p>divers: <strong><?= $div_and_no_pet ?></strong></p></div> 
   <ul id="list">
   <li>"zu teuer": <strong><?= $div_zu_teuer?></strong></li>
   <li>"keine Zeit": <strong><?= $div_keine_zeit?></strong></li>
   </ul>
   <p id="last"><strong><?= $result_wunsch ?> Prozent</strong><br>
	hätten aber gerne ein Haustier.</p> 
    </section>
  
  </section>
   
 

  </main>
  
   <div>
  <a href="index.php" class="back">Zurück zur Umfrage</a>
  </div>

  <footer>
  <img src="bilder/faultier.png" width="150" height="100">
  <img src="bilder/well_done_affe.png" width="100" height="100">
   <nav> 
    <a href="kontakt.html">Kontakt</a> |
	<a href="datenschutz.html">Datenschutzerklärung</a> |
	<a href="https://www.hof-university.de">Hochschule_Hof</a>
   </nav>
   <img src="bilder/turtle.png" width="150" height="75">
   <img src="bilder/hippo.png" width="100" height="75">
  </footer>
  
  
 </body>


</html>