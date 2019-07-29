<!DOCTYPE html>
<html>
<head>
	<title> Formularseite </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styles/formStyles.css">
	<script>
		function checkPasswordQuality(password)
		{
			if (password == "")
			{
				document.getElementById("SafetyInfo").innerHTML = "Keine Passworteingabe";
				return;
			}	
			if (window.XMLHttpRequest)
			{
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("SafetyInfo").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET", "kennworttesten.php?q="+password, true);
			xmlhttp.send();
		}		
	</script>
</head>

<body>
<?php
	session_start();
	$_SESSION['season'] = "Sommer";
	
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

<header class='header-container' id='RegistrationHeader'>
	<div class='header'>
		<div class='subscribe'>Subscribe &#9662;</div> 
		<h1 class="pagetitle"> Registrierung </h1> 
		<div class='social'><img src='images/social-icons.svg'/></div>
	</div>
</header>

<div class="registration-container">
	<div class="register">

		<h2> Registration </h2>
		<form action="formularauswertung.php?action=register" method="post" enctype="multipart/form-data" name="regForm" id="regForm">
		<div class="form-row">
			<label for="username"> Ihr Username zum Einloggen </label>
			<input id="username" type="text" name="username" size="50" maxlength="150" value="<?php echo @$_GET['userName']; ?>">
		</div>

		<div class="form-row">
			<label for="vorname"> Ihr Vorname </label>
			<input type="text" name="vorname" id="vorname" value="<?php echo @$_GET['firstName']; ?>">
		</div>

		<div class="form-row">
			<label for="nachname"> Ihr Nachname </label>
			<input type="text" name="nachname" id="nachname" value="<?php echo @$_GET['lastName']; ?>">
		</div>

		<div class="form-row">
			<label for="email"> Ihre Email Adresse </label>
			<input name="email" id="email" type="email" value="<?php echo @$_GET['email']; ?>">
		</div>

		<div class="form-row">
			<label for="password"> Ihr Passwort </label>
			<input type="password"  id="password" name="password" onkeyup="checkPasswordQuality(this.value)">
			<span id="SafetyInfo"> Safety-Check for password </span>
		</div>

		<div class="form-row">
			<label for="password-repeat"> Passwort wiederholen bitte </label>
			<input type="password" name="password-repeat" id="password-repeat">
		</div>

		<fieldset class="legacy-form-row">
        <legend> Bevorzugte Reiseländer </legend>
        <input id="europe" name="traveldestination" type="radio" value="Europa" checked>
        <label for="europe" class="radio-label"> Europa </label>
        <input id="asia" name="traveldestination" type="radio" value="Asien" >
				<label for="asia" class="radio-label"> Asien </label>
				<input id="america" name="traveldestination" type="radio" value="Amerika" >
				<label for="america" class="radio-label"> Amerika </label>				
		</fieldset>
			
		<div class='form-row'>
			<label for='pet'> Ihr Haustier </label>
			<select id='pet' name='pet'>
				<option value='Hund'>Hund</option>
				<option value='Katze'>Katze</option>
				<option value='Vogel'>Vogel</option>
				<option value='Meerschweinchen'>Meerschweinchen</option>
				<option value='keins'>Keins</option>
			</select>
		</div>
			
		<div class='form-row'>
			<label class='checkbox-label' for='isStupid'>
			<input id='isStupid'
							name='isStupid'
							type='checkbox'
							value='isStupid'/>
			<span> Ich finde die Fragen hier doof </span>
			</label>
		</div>
			
		<div class='form-row'>
			<label for='comments'>Kommentare</label>
			<textarea id='comments' name='comments' cols="30" rows="5"></textarea>
			<div class='instructions'> Nehmen Sie kein Blatt vor den Mund </div>
		</div>

			<br>
			<label for="fileUpload">
				Und hier können Sie noch eine Datei an uns senden, etwa ein Bild das wir betrachten sollen, 
				oder ein Text den Sie uns zum lesen geben möchten. <br>
				Folgende Dateiformate werden unterstützt:
			</label>
			<br> <br>
			
			<input type="file"id="fileUpload" name="fileUpload" size="60" maxlength="255">
			<br> <br>

			<input type="hidden" name="control" id="control" value="sent">
		
			
		<div class='form-row'>
			<button>Absenden</button>
		</div>
		</form>
	</div>
	</div>





		 <!--Ihr Username zum Einloggen: <input type="text" name="username"> <br> <br>
		</div>
		Ihr Vorname: <input type="text" name="vorname"> <br> <br>
		Ihr Nachname: <input type="text" name="nachname"> <br> <br>
		Ihre Emailadresse: <input type="text" name="email"> <br> <br>
		Ihr Passwort: <input type="text" name="password" size="10"
									onkeyup="checkPasswordQuality(this.value)">
		<span id="SafetyInfo"> Hier kommt die Ausgabe hin  </span> <br> <br>
		Noch einmal wiederholen bitte: : <input type="text" name="password" size="10"> <br> <br>	 

		Welche Programmiersprache mögen Sie am liebsten? <input type="text" name="programmingLanguage" value=""> <br> <br>
		Welche Früchte sind Ihre Lieblingsfrüchte? <br>
		Sie können ein oder mehrere auswählen. <br>
		Apfel: <input type="checkbox" name="fruits[]" value="Apfel"> <br>
		Orange: <input type="checkbox" name="fruits[]" value="Orange"> <br>
		Banane: <input type="checkbox" name="fruits[]" value="Banane"> <br>
		Erdbeere: <input type="checkbox" name="fruits[]" value="Erdbeere"> <br>
		Birne: <input type="checkbox" name="fruits[]" value="Birne"> <br> <br>

			Teilen Sie uns mit was Sie gern noch sagen möchten zu dem Thema: <br> 
		<textarea name="text" rows="10" cols="50"></textarea> <br> <br>

		Und hier können Sie noch eine Datei an uns senden, etwa ein Bild das wir betrachten sollen, oder ein Text den Sie uns zum lesen geben möchten <br>
		Folgende Dateiformate werden unterstützt:    <br>

		<input type="file" name="fileUpload" size="60" maxlength="255"> <br> <br>
		<input type="submit" value="Registrieren"> 
	</form>

	</div>

</div>

<br>
<br> -->



<header class='header-container' id="LoginHeader">
	<div class='header'>
		<div class='subscribe'>Subscribe &#9662;</div> 
		<h1 class="pagetitle"> Login </h1> 
		<div class='social'><img src='images/social-icons.svg'/></div>
	</div>
</header>



<div class="registration-container">
	<div class="register">

		<h2> Login </h2>
		<form action="formularauswertung.php?action=login" method="post">	
			<div class="form-row">
				<label for="email"> Ihre Emailaddresse </label>
				<input id="email" type="email" name="email">
			</div>
			<div class="form-row">
				<label for="password"> Ihr Passwort </label>
				<input type="password" name="password" id="password"> 
			</div> 
			<div class='form-row'>
				<button>Login</button>
			</div>	 
		</form>

	</div>
</div>


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

</body>
</html>

