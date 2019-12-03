<!DOCTYPE html>
<html>
<head>
	<title> Geburtstag berechnen - Eingabeseite </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="formStyles.css">	
</head>

<body>
<?php	
	function showDateGerman() {
		$deutscheWochentage = array("Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag");
		$timestamp = time();
		$date = date("d.m.Y", $timestamp);
		$numberOfWeekday = date("w", $timestamp);
		$wochentag = $deutscheWochentage[$numberOfWeekday];
		echo "$wochentag, der $date";	
	}
?>

<div class='menu-container'>
	<div class='menu'>
		<div class='date'> <?php echo showDateGerman(); ?> </div>
		<div class="signupandlogin">
			<div class='signup'> <a href="#RegistrationHeader">Sign Up</a></div>
			<div class='login'> <a href="#LoginHeader">Login</a> </div>
	  </div>
	</div>
</div>



<div class="registration-container">
	<div class="register">

		<h2> Wochentag der Geburt berechnen </h2>
		<p> Bitte geben Sie Tag, Monat und Jahr als Zahlenwerte an! </p>

		<br> <br>

		<form action="calculateBirthday.php" method="post" enctype="multipart/form-data" name="birthdayForm" id="birthdayForm">
		
		<div class="form-row">
			<label for="birthdayDay"> Tag </label>
			<input id="birthdayDay" type="text" name="birthdayDay" size="2">
		</div>

		<div class="form-row">
			<label for="birthdayMonth"> Monat </label>
			<input type="text" name="birthdayMonth" id="birthdayMonth">
		</div>

		<div class="form-row">
			<label for="birthdayYear"> Jahr </label>
			<input type="text" name="birthdayYear" id="birthdayYear">
		</div>

		
			<div class='form-row'>
        <button>Tag berechnen</button>
      </div>

	</form>

	</div>
	</div>