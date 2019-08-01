const personalGreeting = document.querySelector('.personalGreeting');
const myButton = document.querySelector('button');
const chechTrainPicture = document.querySelector('.chechTrainPicture');
const ukrTrainPicture = document.querySelector('.ukrTrainPicture');

function setUserName()
{
    var userName3 = prompt("Enter please your Name");
    localStorage.setItem('userName3', userName3);
    personalGreeting.textContent = "Herzlich Willkommen, " + userName3;

}

if(!localStorage.getItem('userName3'))
    setUserName();
else{
    let userName3 = localStorage.getItem('userName3');
    personalGreeting.textContent = "Herzlich Willkommen, " + userName3;
}

myButton.onclick = function()
{
    setUserName();
}





ukrTrainPicture.onclick = function()
{
    var imageSource = ukrTrainPicture.getAttribute("src");
    //console.log(imageSource);  // For Debugging
    if(imageSource == "img/blueGreenTrain.jpg")
        ukrTrainPicture.setAttribute('src', "img/Dnepr.jpg");
    else
        ukrTrainPicture.setAttribute('src', "img/blueGreenTrain.jpg");
}

chechTrainPicture.onclick = function()
{
    let source = chechTrainPicture.getAttribute('src');
    //console.log(source);  // For Debugging
    if (source === "img/Gueterzug.jpg")
    {        
        chechTrainPicture.setAttribute('src', 'img/Personenzug.jpg');
    }
    else if (source === "img/Personenzug.jpg")
    {
        chechTrainPicture.setAttribute('src', 'img/Strassenbahn.jpg');
    }
    else
    {       
        chechTrainPicture.setAttribute('src', 'img/Gueterzug.jpg');
    }
}






