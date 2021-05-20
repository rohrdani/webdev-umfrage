<!doctype html>
<html lang="de" dir="ltr">
 <head>
  <meta charset="utf-8">
  <meta name="author" content="Peter Leonov, Daniel Rohrwild">
  <title>Haustier-Umfrage</title>
  <link rel="shortcut icon" type="image/x-icon" href="Bilder/tabbild.png"/>
  <link rel="stylesheet" href="style.css">
  <noscript>
      window.alert("Sie haben JavaScript deaktiviert. Bitte aktivieren Sie JavaScript!")
    </noscript>
 </head>

 <body> 
  <header>
   <img src="bilder/katze.png" width="250px" height="200px">
   <h1>Umfrage zur Haustierhaltung <br> in Deutschland!</h1>
   <img src="bilder/hase.png" width="200px" height="200px">
  </header>
  

  <main>
  
  <p>Vielen Dank, dass sie den Weg zu unserer Haustier-Umfrage gefunden haben! <br>
	 Wir ermitteln im Rahmen einer Studie der Hochschule Hof die Haustierhaltung in Deutschland. <br>
  </p>
  </main>
  
  <h2> Wir möchten Sie bitten, die nachfolgenden Fragen zu beantworten: </h2>
  
  <form method="post">

   <section name="frage1">
    <label title="frage1">Wählen Sie ihr Geschlecht:</label> <br>
	<input type="radio" name="geschlecht" class="radio" value="männlich" required="required">männlich</input>
	<input type="radio" name="geschlecht" value="weiblich">weiblich</input>
	<input type="radio" name="geschlecht" value="divers">divers</input>
   </section>
  
	<section name="frage2">
	 <label title="frage2">Wie alt sind Sie?</label> <br>
	 <input type="number" required="required" min="1" max="130" name="alter" style="background-color: #f5f5f5"></input>
	 </section>
	 
	 <section name="frage3" id="frage3">
     <label title="frage3">Haben Sie Haustiere?</label> <br>
     <input type="radio" name="hat_haustier" value="ja" onchange="pet()">ja</input> 
     <input type="radio" name="hat_haustier" value="nein" onchange="no_pet()">nein</input> <!--Wenn keine Haustiere, dann JS "Warum haben Sie kein Haustier? alle weiteren Fragen ausblenden, Absendebuttun anzeigen --> 
     </section>
	 
	<script>
	//Fragen für "hat Haustiere-Frage" ausblenden, wenn User keine haustiere hat
	 function no_pet()
	 {	let frage4 = document.getElementById("frage4")
		let frage5 = document.getElementById("frage5")
		
		let frage6 = document.getElementById("frage6")
		let frage7 = document.getElementById("frage7")
		
		frage4.style.display = "block";
		frage5.style.display = "block";
		frage6.style.display = "none";
		frage7.style.display = "none";
		
		document.getElementById("4").setAttribute("required", "required");
		document.getElementById("5").setAttribute("required", "required");
		
		document.getElementById("submit_button").disabled=""
		
		document.getElementById("6").removeAttribute("required");
		
	 }
	 
	 //Fragen für "hat keine Haustiere-Fragen" ausblenden, wenn User haustiere hat
	 function pet()
	 {
		let frage4 = document.getElementById("frage4")
		let frage5 = document.getElementById("frage5")
		let frage6 = document.getElementById("frage6")
		let frage7 = document.getElementById("frage7")
		
		frage4.style.display = "none";
		frage5.style.display = "none";
		frage6.style.display = "block";
		frage7.style.display = "block";
		
		document.getElementById("6").setAttribute("required", "required");
		
		document.getElementById("submit_button").disabled="true"
		
		document.getElementById("4").removeAttribute("required");
		document.getElementById("5").removeAttribute("required");
		
	//	frage6.style.opacity = "0.2";
	//	frage7.style.opacity = "0.2";
	}
	
	//Prüfen, ob mind. eine Checkbox ausgewählt wurde:
	function changed()
	{
		let hund = document.getElementById("hund").checked
		let katze = document.getElementById("katze").checked
		let kaninchen = document.getElementById("kaninchen").checked
		let pferd = document.getElementById("pferd").checked
		let vogel = document.getElementById("vogel").checked
		let hamster = document.getElementById("hamster").checked
		let fisch = document.getElementById("fisch").checked
		let schlange = document.getElementById("schlange").checked
		let andere = document.getElementById("andere").checked
			

		if (hund || katze || kaninchen || pferd || vogel || hamster || fisch || schlange || andere )
		{
			document.getElementById("submit_button").disabled=""
		}
		else 
		{
			document.getElementById("submit_button").disabled="true"
		}
		
	}
	</script>
  
  <section name="frage4" id="frage4">
    <label title="frage4">Warum haben Sie kein Haustier?</label> <br>
    <input type="radio" id="4" name="grund" value="zu teuer">zu teuer</input>
    <input type="radio" name="grund" value="keine Zeit">keine Zeit</input>
	</section>
  
   <section name="frage5" id="frage5">
    <label title="frage5">Hätten Sie gerne ein Haustier?</label> <br>
    <input type="radio" name="wunsch" value="ja" id="5">ja</input> 
    <input type="radio" name="wunsch" value="nein">nein</input>
    </section>
	
	 <section name="frage6" id="frage6">
     <label title="frage6">Wie viele Haustiere haben Sie?</label> <br>
     <input type="number" id="6" min="1" max="9999" name="anzahl" style="background-color: #f5f5f5"></input>
     </section>

 <section name="frage7" class="frage7" id="frage7">
    <label title="frage7">Welche(s) Haustier(e) haben Sie?</label>
	</br>
	<div id="input_frage7">
    <input type="checkbox" name="hund" value="Hund" id="hund" onChange="changed()">Hund</input></br>
    <input type="checkbox" name="katze" value="Katze" id="katze" onChange="changed()">Katze</input></br>
    <input type="checkbox" name="kaninchen" value="Kaninchen" id="kaninchen" onChange="changed()">Kaninchen</input></br>
    <input type="checkbox" name="pferd" value="Pferd" id="pferd" onChange="changed()">Pferd</input></br>
    <input type="checkbox" name="vogel" value="Vogel" id="vogel" onChange="changed()">Vogel</input></br>
    <input type="checkbox" name="hamster" value="Hamster" id="hamster" onChange="changed()">Hamster</input></br>
    <input type="checkbox" name="fisch" value="Fisch" id="fisch" onChange="changed()" >Fisch</input></br>
    <input type="checkbox" name="schlange" value="Schlange" id="schlange" onChange="changed()">Schlange</input></br>
    <input type="checkbox" name="andere" value="Andere" id="andere" onChange="changed()">Andere</input></br>
	</div>
	</section>
	
	<div id="button">
	<button type="submit" value="submit" id="submit_button" disabled="true">Senden</button>
	<button type="reset" value="reset" id="reset_button">Abbrechen</button>
	</div>
  
  </form>
  
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
 
 <?php
	
	if ((isset($_POST["geschlecht"])) == 1)
		$geschlecht = $_POST["geschlecht"];
	
	if ((isset($_POST["alter"])) == 1)
		$alter = $_POST["alter"];
	
	if ((isset($_POST["anzahl"])) == 1)
		$anzahl = $_POST["anzahl"];
	
	 
	if ((isset($_POST["wunsch"])) == 1)
		$wunsch = $_POST["wunsch"];
	 
	if ((isset($_POST["grund"])) == 1)
		$grund = $_POST["grund"];
	
	if ((isset($_POST["hat_haustier"])) == 1)
		$hat_haustier = $_POST["hat_haustier"];
	
	//echo var_dump($_POST);

//$hat_haustier = $_POST["hat_haustier"];
//Hat Haustiere:
if($hat_haustier == "ja")
{	
echo "gesetzt!";

	//$katze = $_POST["katze"];
	//$kaninchen = $_POST["kaninchen"];
	//$pferd = $_POST["pferd"];
  //  $vogel = $_POST["vogel"];
   // $hamster = $_POST["hamster"];
  //  $fische = $_POST["fische"];
 //   $schlange = $_POST["schlange"];
  //  $andere = $_POST["andere"];
	
 $server = "localhost";
 $user = "root";
 $pw = "";
 $db = "umfrage";
 
 $dbconnection = mysqli_connect($server, $user, $pw, $db);
 
 $db_table =  "";
 $db_values = "";
 
 if (mysqli_connect_errno())
 {
	 echo ("Probleme mit der Verbindung: " . mysqli_connect_error());
 }
 else
 {
	 echo "Verbindung steht!";
	 /*mysqli_query($dbconnection, "insert into pets (geschlecht, age, anzahl_pets) 
	 values ('".$geschlecht."',
				'".$alter."',
				'".$anzahl."')");
				*/
				
	if ((isset($_POST["hund"])) == 1)
	{
		$db_table .= ",hund";
		$db_values .= ",'Hund'";
	}

	if((isset($_POST["katze"])) == 1)
	{
		$db_table .= ",katze";
		$db_values .= ",'Katze'";
	}
	if((isset($_POST["kaninchen"])) == 1)
	{
		$db_table .= ",kaninchen";
		$db_values .= ",'Kaninchen'";
	}
	if((isset($_POST["pferd"])) == 1)
	{
		$db_table .= ",pferd";
		$db_values .= ",'Pferd'";
	}
	if((isset($_POST["vogel"])) == 1)
	{
		$db_table .= ",vogel";
		$db_values .= ",'Vogel'";
	}
	if((isset($_POST["hamster"])) == 1)
	{
		$db_table .= ",hamster";
		$db_values .= ",'Hamster'";
	}
	if((isset($_POST["fisch"])) == 1)
	{
		$db_table .= ",fisch";
		$db_values .= ",'Fisch'";
	}
	if((isset($_POST["schlange"])) == 1)
	{
		$db_table .= ",schlange";
		$db_values .= ",'Schlange'";
	}
	if((isset($_POST["andere"])) == 1)
	{
		$db_table .= ",andere";
		$db_values .= ",'Andere'";
	}

mysqli_query($dbconnection, "insert into pets (geschlecht, age, anzahl_pets $db_table) 
		values ('".$geschlecht."',
				'".$alter."',
				'".$anzahl."'
				$db_values)");
				
$test = "insert into pets (geschlecht, age, anzahl_pets $db_table) 
		values ( '".$geschlecht."',
				'".$alter."',
				'".$anzahl."'
				$db_values)";
				echo $test;
 }
 mysqli_close($dbconnection);
}

//keine Haustiere:
else
{
	echo "nicht gesetzt!";
/*	echo "Hat Haustiere == nein!";
	echo "<br>";
	echo "Geschlecht: ".$geschlecht;
	echo "<br>";
	echo ("Alter: ".$alter);
	echo "<br>";
	echo ("Haben Sie Haustiere? ".$hat_haustiere);
	echo "<br>";
	echo ("Hätten Sie gerne Haustiere? ".$wunsch);
	echo "<br>";
	echo("Warum haben Sie keine Haustiere? ".$grund);
	echo "<br>";
	*/
				
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
	 //echo "Verbindung steht!";
	mysqli_query($dbconnection, "insert into no_pets (geschlecht, age, wunsch, grund) 
	 values ('".$geschlecht."',
				'".$alter."',
				'".$wunsch."',
				'".$grund."')");
				
$hallo = "insert into no_pets (geschlecht, age, wunsch, grund) 
	 values ('".$geschlecht."',
				'".$alter."',
				'".$wunsch."',
				'".$grund."')";
				echo $hallo;
 }
 mysqli_close($dbconnection);	
}
 ?>


</html>
