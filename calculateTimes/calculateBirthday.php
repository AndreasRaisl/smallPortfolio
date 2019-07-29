<?php
  setlocale(LC_ALL,"deu_deu");
  date_default_timezone_set("Europe/Berlin");
  $dayToday=strftime("%A");
  $timestamp_in_one_year=strtotime('+1year');
  $dayNextYear = strftime("%A",$timestamp_in_one_year);

  $birthdayDay = $_POST['birthdayDay'];
  $birthdayMonth = $_POST['birthdayMonth'];
  $birthdayYear = $_POST['birthdayYear'];
  $birthdayString = "$birthdayDay.$birthdayMonth.$birthdayYear";
  $birthdayTimestamp = strtotime($birthdayString)."<br />";
  $birthdayWeekday = strftime("%A", $birthdayTimestamp);    
  
  $handle=fopen("besucherzaehler.txt", "r");
  $visitorsBefore=fread($handle, filesize("besucherzaehler.txt"));
  fclose($handle);  
  $visitorsNow = $visitorsBefore+1;    
  $handle=fopen("besucherzaehler.txt","w");
  fwrite($handle, $visitorsNow);
  fclose($handle);  
?>


<html>
  <head>
    <title> Calculate Birthday </title>
    <link rel="stylesheet" href="stylesForResult.css">
  </head>

  <body> 

    <div class="mainInfoBox">
      <h1> Geburtstag </h1>      
      <h3> Ihr Geburtstag war an einem <?php echo $birthdayWeekday; ?> </h3> 
    </div> 
    
    <div class="extraInfoBox">
      <h1> Auch interessant </h1>
      <p> Heute ist <?php echo $dayToday; ?> </p>     
      <p> In einem Jahr ist <?php echo $dayNextYear; ?> </p>
      <p> Übrigens, vor Ihnen haben bereits  <?php echo $visitorsBefore; ?> Personen diesen Service genutzt. <br>
          Sie sind der <?php echo $visitorsNow; ?>. Nutzer. Die neue Zahl <?php echo $visitorsNow; ?> wurde gespeichert. </p>
      <p> Die aktuelle Uhrzeit ist jetzt: <?php echo date("H:i"); ?> </p>
    </div>

  </body>
</html>
