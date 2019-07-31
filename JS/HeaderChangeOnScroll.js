// JavaScript Document

let header = document.getElementById("header");
let logo = document.getElementById("logo");
let menuButtonLine1 = document.getElementById("MenuButtonLine1");
let menuButtonLine2 = document.getElementById("MenuButtonLine2");
let menuButtonLine3 = document.getElementById("MenuButtonLine3");
let myBody = document.getElementById("myBody");
var yPos;

var menuButton = document.getElementById("MenuButton");
var menu = document.getElementById("MenuOpen");
var menuCloseButton = document.getElementById("MenuCloseButton");
var menuArea = document.getElementById("MenuArea");

let phoneButton = document.getElementById("phoneButton");
let phoneNumberArea = document.getElementById("phoneNumberArea");
let phoneNumberAreaCloseButton = document.getElementById("phoneNumberAreaCloseButton");

function changeHeader()
{
	yPos = window.pageYOffset;
	if(yPos > 150)
	{
		document.getElementById("header").className = "header_later";
		document.getElementById("logo").classList.add("logo_later");
		document.getElementById("MenuButtonLine1").classList.add("MenuButtonLine_later");
		document.getElementById("MenuButtonLine2").classList.add("MenuButtonLine_later");
		document.getElementById("MenuButtonLine3").classList.add("MenuButtonLine_later");		
	}
	else
	{
		document.getElementById("header").className = "header_start";
		document.getElementById("logo").classList.remove("logo_later");
		document.getElementById("MenuButtonLine1").classList.remove("MenuButtonLine_later");
		document.getElementById("MenuButtonLine2").classList.remove("MenuButtonLine_later");
		document.getElementById("MenuButtonLine3").classList.remove("MenuButtonLine_later");		
	}	
}

function openMenu()
{
	menu.style.display = "block";
	menuCloseButton.style.display = "block";
	menuArea.style.display = "block";
}

function closeMenu()
{
	menu.style.display = "none";
	menuCloseButton.style.display = "none";
	menuArea.style.display = "none";	
}

function showPhoneNumber() {
	phoneNumberArea.style.display = "block";
	//phoneNumberAreaCloseButton.style.display = "block";
}

function closePhoneNumber() {
	phoneNumberArea.style.display = "none";
	//phoneNumberAreaCloseButton.style.display = "block";
}

function showEmailForm() {
	emailFormArea.style.display = "block";
}

function closeEmailForm() {
	emailFormArea.style.display = "none";
}

function sayHello() {
	console.log("Hallo");
}





