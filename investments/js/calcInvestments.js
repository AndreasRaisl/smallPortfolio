
document.getElementById("myForm").addEventListener('submit', calculateHousing);

function calculateHousing(e)
{

	var inputPrice = document.getElementById('price').value;
	var inputCapital = document.getElementById('capital').value;
	var inputZins = document.getElementById('zins').value;
	var inputTilgung = document.getElementById('tilgungpromonat').value;

	console.log(inputPrice);
	console.log(inputCapital);
	console.log(inputZins);
	console.log(inputTilgung);

	let restSchuld = inputPrice - inputCapital;

	console.log(restSchuld);

	let zinsen = restSchuld /100 * inputZins;

	console.log(zinsen);

	let reineJahresTilgung = inputTilgung * 12 - zinsen;
	var counter = 1;

	while(restSchuld > 0)
	{
		zinsen = restSchuld / 100 * inputZins;
		reineJahresTilgung = inputTilgung * 12 - zinsen;

		restSchuld = restSchuld - reineJahresTilgung;
		console.log(counter);
		console.log(restSchuld);
		counter++;

	}

	


	e.preventDefault();
	
}