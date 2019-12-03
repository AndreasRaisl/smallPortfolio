<?php
	$PHP_SELF = $_SERVER['PHP_SELF'];
  
	// Anzahl, Nachname und Email sind zwingend. Wenn einer der Werte nicht gesetzt wurde oder leer ist, dann das Formular nochmal aufrufen
	//Dieser Fall tritt auch ein wenn die Seite neu aufgerufen wird, also vor jeder Eingabe
	if (!isset($_GET['anzahl']) or !isset($_GET['nachname']) or !isset($_GET['email']) or $_GET['anzahl'] == "" or $_GET['nachname'] == "" or $_GET['email'] == "")
	{
			echo date ("H:i:s");			

			//Show the form again
			echo 
			'<p> Bitte bestellen Sie hier Karten für mein fantastisches Gitarrenkonzert mit Wandervogelliedern am 25.12.2019.
			 (Ist Fake, also bitte bedenkenlos bestellen :)) </p>';	

			echo '<form action="' . $PHP_SELF . '?step=formSubmitted" method="get">		
			<p> Ihr Vorname: 
			<input type="text" name="vorname" value="' . @$_GET['vorname'] . '">
			</p> ';

			if (empty($_GET['nachname']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie Ihren Nachnamen ein! Feld darf nicht leer sein. </p>";
			}
			echo 
			'<p> Ihr Nachname: 
			<input type="text" name="nachname" value="' . @$_GET['nachname'] . '">
			</p> ';
		
			if (empty($_GET['anzahl']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie die Anzahl ein. Das Feld Anzahl darf nicht leer sein, wenn Sie Karten bestellen wollen. </p>";
			}
			echo 
			'<p> Ihre Anzahl: 
			<input type="text" name="anzahl" value="' . @$_GET['anzahl'] . '">
			</p>';
		
			if (empty($_GET['email']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie die Email ein. Das Feld Email darf nicht leer sein. </p>";
			}
			echo 
			'<p> Ihre Email: 
			<input type="text" name="email" value="' . @$_GET['email'] . '">
			</p>
			<input type="hidden" name="kontrolle" value=1> 
			<input type="hidden" name="timestamp" value="' . date("d.m.Y H:i:s") . '">';

			echo'
			<input type="submit" name="sendButton" value="absenden">
			
			</form>';		

	}

	else // wenn Anzahl, Email und Nachname korrekt eingegeben, dann verarbeiten der Daten
	{
		echo "Sie haben soviele Karten bestellt: ".$_GET['anzahl']."<br>";
    echo "Sie haben als Nachnamen eingetragen: ".$_GET['nachname']. "<br>";
		echo "Sie haben als Email eingetragen: ".$_GET['email']."<br>";
		echo "Sie haben das Formular am " . $_GET['timestamp'] . " abgeschickt. <br>";
		
		//write data to file
		$handle = fopen('textdatei.txt',  'a');
		fwrite($handle, $_GET['nachname']);
		fwrite($handle, '|');
		fwrite($handle, $_GET['email']);
		fwrite($handle, '|');
		fwrite($handle, $_GET['anzahl']);
		fwrite($handle, '\n');
		fclose($handle);

		echo "Die Bestellung wurde ordnungsgemäß in einer Datei gespeichert.";
	}	



// else {
// 	showForm();
// 	echo "<br> Bin im else Zweig  für Step != formSubmitted <br>";
// }

function showForm() {

	echo date ("H:i:s");

			//Show the form again
			echo 
			'<p> Bitte bestellen Sie hier Karten für mein fantastisches Gitarrenkonzert mit Wandervogelliedern am 25.12.2019.
			 (Ist Fake, also bitte bedenkenlos bestellen :)) </p>';	

			echo '<form action="affenformularKartenbestellung.php?step=formSubmitted" method="get">		
			<p> Ihr Vorname: 
			<input type="text" name="vorname" value="' . @$_GET['vorname'] . '">
			</p> ';

			if (empty($_GET['nachname']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie Ihren Nachnamen ein! Feld darf nicht leer sein. </p>";
			}
			echo 
			'<p> Ihr Nachname: 
			<input type="text" name="nachname" value="' . @$_GET['nachname'] . '">
			</p> ';
		
			if (empty($_GET['anzahl']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie die Anzahl ein. Das Feld Anzahl darf nicht leer sein, wenn Sie Karten bestellen wollen. </p>";
			}
			echo 
			'<p> Ihre Anzahl: 
			<input type="text" name="anzahl" value="' . @$_GET['anzahl'] . '">
			</p>';
		
			if (empty($_GET['email']) AND !empty($_GET['kontrolle']))
			{
				echo "<p style='color: red;'>Bitte tragen Sie die Email ein. Das Feld Email darf nicht leer sein. </p>";
			}
			echo 
			'<p> Ihre Email: 
			<input type="text" name="email" value="' . @$_GET['email'] . '">
			</p>
			<input type="hidden" name="kontrolle" value=1> 
			<input type="hidden" name="timestamp" value="' . date("d.m.Y H:i:s") . '">';

			echo'
			<input type="submit" name="sendButton" value="absenden">
			
			</form>';		

}
?>