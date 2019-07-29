// JavaScript Document

var i = 0;
var time = 3000;
var backgroundClasses = [];
backgroundClasses[0] = "background1";
backgroundClasses[1] = "background2";
backgroundClasses[2] = "background3";

var sliderElements = [];
sliderElements[0] = "sliderElement1";
sliderElements[1] = "sliderElement2";
sliderElements[2] = "sliderElement3"


console.log("I am inside the JS");


function changeBackground() 
{
	document.getElementById("content1").className = backgroundClasses[i];
	if(i > 0) {
	  document.getElementById(sliderElements[i-1]).classList.remove("activeSliderElement");
	}
	else {
	  document.getElementById(sliderElements[sliderElements.length-1]).classList.remove("activeSliderElement");  	
	}
	document.getElementById(sliderElements[i]).classList.add("activeSliderElement");
	
	
	if(i < backgroundClasses.length -1)
	{
		i++;	
	}
	else
    {
		i=0;
	}
	setTimeout("changeBackground()", time);
}

window.onload = changeBackground();
	
