"use strict";

const init = function(){
    getSpeakerByID();
};

document.addEventListener("DOMContentLoaded", init);

const getSpeakerByID = function(){
    handleData(`http://api.laprudence.be/project2/v2/sprekers/${id}`, toonSpreker, "GET", null);
};

const toonSpreker = function(){
    let sprekerHTML = document.querySelector(".js-spreker");
    let spreker = "";
    console.log("hallo");
    spreker += `<div class="col-lg-6 col-sm-12">
    <img src="/img/${afbeelding}" alt="spreker">
    <div class="row">
        <div class="col-3">
            <a style="float: left;" href="#" class="c-fb"><i class="fab fa-facebook-square"></i></a>
            <a style="float: left;" href="#" class="c-twitter"><i class="fab fa-twitter-square"></i></a>
        </div>
        <div class="col-8">
            <p style="float: right;">936 likes</p>
        </div>
        <div class="col-1">
            <button style="float: right;" class="c-like__btn" type="submit"><i class="far fa-heart"></i></button>
        </div>
    </div>
    </div>
    <div class="col-lg-6 col-sm-12">
        <h1>Naam spreker</h1>
        <h4>Bedrijf</h4>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae id nemo illo voluptas dolore sequi neque iste incidunt molestiae perferendis, voluptatem, suscipit a pariatur cupiditate corporis odio est quas tenetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime assumenda libero rem labore vitae ex dolorem sapiente in ipsa consequatur! Cupiditate facere dicta voluptatibus dolorem vel modi fuga assumenda officiis!</p>
    </div>`;

    sprekerHTML.innerHTML= spreker;
};