

function calculateHousing(inputPrice, inputCapital, inputZins, inputTilgung)
{	
	let restSchuld = inputPrice - inputCapital;
	console.log(restSchuld);

	let counter = 0;
	let interestTotal = 0;	
	let details = {};
	details.zinsen = [];
	details.restSchuld = [];
	details.reineJahresTilgung = [];

	while(restSchuld > 0)
	{
		zinsen = restSchuld / 100 * inputZins;
		details.zinsen.push(zinsen);
		interestTotal += zinsen;
		reineJahresTilgung = inputTilgung * 12 - zinsen;
		details.reineJahresTilgung.push(reineJahresTilgung);
		restSchuld = restSchuld - reineJahresTilgung;	
		details.restSchuld.push(restSchuld);	
		counter++;		
  }

  details.totalYears = counter;
  details.restSchuldEnd = restSchuld;
  details.interestTotal = interestTotal;  
  return details;		
}

let details = calculateHousing(121000, 1000, 1, 1000);

console.log(details);





