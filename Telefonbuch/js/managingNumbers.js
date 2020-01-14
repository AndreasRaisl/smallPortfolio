
document.getElementById("myForm").addEventListener('submit', saveNewPhoneNumber);
document.getElementById("mySearchForm").addEventListener('submit', showContact);
var outputArea = document.getElementById("outputArea");

function printAllContacts(contacts)
{
	if(contacts) {
		outputArea.innerHTML = "";
		contacts.sort(compareContacts);
		for(var i=0; i<contacts.length; i++)
		{
			actualContact = contacts[i];
			outputArea.innerHTML += `<div class='well'>   
															<h3> ${actualContact.contactName} <h3>
															<h3> ${actualContact.phoneNumber} <h3>
															<button onclick='showCallMessage("${actualContact.contactName}", "${actualContact.phoneNumber}")' class='btn btn-primary callButton'> Anrufen </button>
															<button onclick='deleteContact("${actualContact.contactName}")' class='btn btn-danger'> Löschen </button>
															</div>`;
		}
	}
	else outputArea.innerHTML = "<h3> No saved contacts </h3>";
	document.getElementById('outputArea').scrollIntoView();
}


function deleteContact(name)
{
	console.log("Delete function called");	
	var contacts = JSON.parse(localStorage.getItem('contacts'));	
	for(var i=0; i<contacts.length; i++)
	{
		if(contacts[i].contactName === name)
		{
			contacts.splice(i, 1);
		}
	}
	localStorage.setItem('contacts', JSON.stringify(contacts));
	//printAllContacts(contacts);	
	outputArea.innerHTML = "";
}

function getSavedNumbers()
{
	var contacts = JSON.parse(localStorage.getItem('contacts'));	
	printAllContacts(contacts);	
}

function validateInput(name, phoneNumber)
{
	// Quelle dieses Regex: https://stackoverflow.com/questions/14639973/javascript-regex-what-to-use-to-validate-a-phone-number
	 var regexString = /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i;
	 var regex = new RegExp(regexString);
	 if(!phoneNumber.match(regex))
	 {
		 console.log("Regex durchgefallen");
	 	alert("So eine Telefonnummer gibt es nicht");
	 	return false;
	 }

	if(!name || !phoneNumber)
	{
		alert('Die Angaben sind unvollständig');
		return false;
	}
	return true;
}

function saveNewPhoneNumber(e)
{
	console.log("in saveNewPhoneNumber");
	let name = document.getElementById('contactName').value;
	let phoneNumber = document.getElementById('phoneNumber').value;

	// if(!name || !phoneNumber) {
	// 	alert("Die Angaben sind unvollständig");
	// 	return false;
	// }

	if (!validateInput(name, phoneNumber)) return false;

	var contact = {
		contactName: name,
		phoneNumber: phoneNumber
	}

	if(localStorage.getItem('contacts') === null)
	{
		var contacts = [];
		contacts.push(contact);
		localStorage.setItem('contacts', JSON.stringify(contacts));		
		showNewContact(contact);
	}
	else
	{
		var contacts = JSON.parse(localStorage.getItem('contacts'));
		contacts.push(contact);
		localStorage.setItem('contacts', JSON.stringify(contacts));
		showNewContact(contact);
	}
  document.getElementById('outputArea').scrollIntoView();
	document.getElementById('myForm').reset();	
	e.preventDefault();
}

function compareContacts(a, b) {
	if(a.contactName < b.contactName) return -1;
	else if(a.contactName > b.contactName) return 1;
	else return 0;
}

function showContact(e) {
	console.log("showContact() is called");
	console.log(e);
	var found = false;
	let name = document.getElementById('contactForSearch').value;
	var contacts = JSON.parse(localStorage.getItem('contacts'));
	outputArea.innerHTML = "";
	for(var i=0; i<contacts.length; i++)
	{
		if(contacts[i].contactName === name) {
			actualContact = contacts[i];
			outputArea.innerHTML = `<div class='well'>   
															<h3> ${contacts[i].contactName} <h3>
															<h3> ${contacts[i].phoneNumber} <h3>
															<button onclick='showCallMessage("${actualContact.contactName}", "${actualContact.phoneNumber}")' class='btn btn-primary callButton'> Anrufen </button>
															<button onclick='deleteContact("${contacts[i].contactName}")' class='btn btn-danger'> Löschen </button>
															</div>`;
			found = true;
		}
	}
	if (found == false) outputArea.innerHTML = "<div class='well'> <h3> Kontakt nicht vorhanden </h3> </div>";
	document.getElementById('outputArea').scrollIntoView();
	e.preventDefault();
}

function showNewContact(contact) {
	console.log("showNewContact is called");
	outputArea.innerHTML = "";
	outputArea.innerHTML += `<div class='well'>   
													<h3> ${contact.contactName} <h3>
													<h3> ${contact.phoneNumber} <h3>
													<button onclick='showCallMessage("${contact.contactName}", "${contact.phoneNumber}")' class='btn btn-primary callButton'> Anrufen </button>
													<button onclick='deleteContact("${contact.contactName}")' class='btn btn-danger'> Löschen </button>
													</div>`;
}

function showCallMessage(name, number) {
	console.log("showCallMessage is called");
	console.log(name, number);
	let contact = {contactName: name, phoneNumber: number};
	console.log(contact);
	outputArea.innerHTML = "";
	outputArea.innerHTML += `<div class='well'>
											     <h3> Hier wird es irgendwann in der Zukunft möglich sein direkt einen Anruf, z.B über Skype oder WhatsApp, zu
											     initiieren </h3>
											     <button onclick='goBackToContact("${name}", "${number}")' class='btn btn-primary callButton'> Zurück zum Kontakt </button>
													 </div>`;
}

function goBackToContact (name, number) {
	let contact = {contactName: name, phoneNumber: number};
	showNewContact(contact);
}


	




