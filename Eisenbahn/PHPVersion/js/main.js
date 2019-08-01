mySubHeading = document.querySelector('h2');
myButton = document.querySelector('button');

function setUserName()
{
    var userName3 = prompt("Enter please your Name");
    localStorage.setItem('userName3', userName3);
    mySubHeading.textContent = "Herzlich Willkommen, " + userName3;

}

if(!localStorage.getItem('userName3'))
    setUserName();
else{
    userName3 = localStorage.getItem('userName3');
    mySubHeading.textContent = "Herzlich Willkommen, " + userName3;
}

var myImage = document.querySelector("img");
myImage.onclick = function()
{
    var imageSource = myImage.getAttribute("src");
    console.log(imageSource);
    if(imageSource == "img/blueGreenTrain.jpg")
        myImage.setAttribute('src', "img/Dnepr.jpg");
    else
        myImage.setAttribute('src', "img/blueGreenTrain.jpg");
}


myButton.onclick = function()
{
    setUserName();
}



