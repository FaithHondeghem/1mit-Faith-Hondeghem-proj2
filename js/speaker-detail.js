"use strict";

const init = function(){
    let speakerId = getSpeakerID();
    getSpeakerByID(speakerId);
};

document.addEventListener("DOMContentLoaded", init);

const getSpeakerID = function(){
    const urlParams = new URLSearchParams(window.location.search);
    const idVanSpeaker = urlParams.get("speakerid");
    if (idVanSpeaker) {
        console.log(`Het id van de gekozen speaker is ${idVanSpeaker}`);
    } 
    else {
        console.log('De querystring ontbreekt');
    }
    return idVanSpeaker;
};

const getSpeakerByID = function(speakerId){
    handleData(`http://api.laprudence.be/project2/v2/sprekers/${speakerId}`, toonSpreker, "GET", null);
};

const toonSpreker = function(data){
    let sprekerHTML = document.querySelector(".js-spreker");
    let spreker = "";
    spreker = `
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <img src="img/${data.afbeelding}" alt="spreker">
            <div class="row">
                <div class="col-3">
                    <a style="float: left;" href="#" class="c-fb"><i class="fab fa-facebook-square"></i></a>
                    <a style="float: left;" href="#" class="c-twitter"><i class="fab fa-twitter-square"></i></a>
                </div>
                <div class="col-8">
                    <p style="float: right;">${data.love_teller} likes</p>
                </div>
                <div class="col-1">
                    <button style="float: right;" class="c-like__btn" type="submit"><i class="far fa-heart"></i></button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <h1>${data.voornaam} ${data.familienaam}</h1>
            <h4>${data.land.benaming.nl}</h4>
            <p>${data.bio.nl}</p>
        </div>
    </div>`;

    sprekerHTML.innerHTML= spreker;
};