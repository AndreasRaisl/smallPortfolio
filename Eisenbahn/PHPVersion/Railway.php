<!DOCTYPE html>
<html>
  <head>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Felipa" rel="stylesheet"> 
    <meta charset="utf-8">
    <title>Trains in Ukraine</title>
  </head>
  <body>

    <?php 
      setlocale(LC_ALL,"deu_deu");
      $day_today=strftime("%A");      
    ?>
    
    <h1> Eisenbahn in der Ukraine </h1>
    <h2></h2>
    <p> Heute ist übrigens <?php echo $day_today; ?>, sagt uns hier PHP.  </p>
    <?php
      $handle=fopen("besucherzaehler.txt", "r");
      $inhalt=fread($handle, filesize("besucherzaehler.txt"));
      fclose($handle);      
      $inhalt++;      
      echo "<p>Bisher haben (mit Ihnen) $inhalt Besucher die Seite besucht. <br>";
      
      $handle=fopen("besucherzaehler.txt","w");
      fwrite($handle, $inhalt);
      fclose($handle);      
      echo "Wert $inhalt wurde in Datei besucherzaehler.txt geschrieben. </p> ";    
    ?>

    <img src="img/blueGreenTrain.jpg" alt="My test image" width="400px" height="200px">
    <p> Die ukrainische Bahn ist sehr interessant. Und fast immer pünktlich. </p>

    <p>Es gibt dort </p>    
      <ul> 
        <li>Fernverkehrszüge</li>
        <li>Nahverkehrszüge</li>
        <li>Güterzüge</li>
      </ul>
    <p>Es gibt ebenso modernes wie auch urig altes Wagenmaterial. Meist geht es relativ langsam voran, aber die Zeit 
       sollten wir uns nehmen und das Land in aller Ruhe bereisen. 
       Auf der Internetseite der <a href="https://www.uz.gov.ua/en/" target="_blank"> ukrainischen Eisenbahn(in Englisch)</a> gibt es alle Fahrpläne, 
       aktuelle Informationen und sogar die Möglichkeit online Fahrkarten inkl. Liegeplatzreservierung zu kaufen.  </p>
    
    <button> Change User </button>

    <script src="js/main.js"> </script>
  </body>
</html>