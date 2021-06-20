"use strict";

const init = function(){
    let sessionId = getSessieID();
    getSessieByID(sessionId);
};

document.addEventListener("DOMContentLoaded", init);

const getSessieID = function(){
    const urlParams = new URLSearchParams(window.location.search);
    const idVanSessie = urlParams.get("talkid");
    if (idVanSessie) {
        console.log(`Het id van de gekozen speaker is ${idVanSessie}`);
    } 
    else {
        console.log('De querystring ontbreekt');
    }
    return idVanSessie;
};

const getSessieByID = function(sessionId){
    handleData(`http://api.laprudence.be/project2/v2/talks/${sessionId}`, toonSessie, "GET", null);
};

const toonSessie = function(data){
    let sessieHTML = document.querySelector(".js-sessie");
    let sessie = "";

    let img = "";
    if (data.spreker.afbeelding == null){
        img = "img/avatar.jpg";
    } else {
        img = `img/${data.spreker.afbeelding}`;
    }

    sessie = `<div class="col-lg-6 col-sm-12">
    <h1>${data.titel}</h1>
    <h3>${data.spreker.voornaam} ${data.spreker.familienaam}</h3>
    <h5>${data.zaal.omschrijving}, ${data.start}</h5>
    <p>${data.omschrijving.nl}</p>
    <a class="c-sessiondetail__a" style="float: left;" href="#" class="c-fb"><i class="fab fa-facebook-square"></i></a>
    <a class="c-sessiondetail__a" style="float: left;" href="#" class="c-twitter"><i class="fab fa-twitter-square"></i></a>
    </div>
    <div class="col-lg-6 col-sm-12">
        <img class="c-sessiondetail__img" src="${img}" alt="spreker">
    </div>`;

    sessieHTML.innerHTML = sessie;
};