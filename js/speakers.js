"use strict";
let data;
const aantalPerPage = 6;

const init = function(){
    getAllSpeakers();
    // document.querySelector(".js-popular").addEventListener("click", getMostPopularSpeakers);
};

document.addEventListener("DOMContentLoaded", init);

const getAllSpeakers = function(){
    handleData(`http://api.laprudence.be/project2/v2/sprekers?all`, toonSpeakers, "GET", null);
};

// const getMostPopularSpeakers = function() {
//     console.log("sorteren");
//     let likesSpeakers = new Array;
//     for (let speaker of data.data) {
//         likesSpeakers.push(speaker.love_teller);
//     }
//     likesSpeakers.sort(function(a,b){
//         return a - b;
//     });
//     console.log(likesSpeakers);
//     let laatsteVier = likesSpeakers.length-4;
//     console.log(laatsteVier);
//     for (let i = laatsteVier; i<likesSpeakers.length; i++) {
//         for (let speaker of data.data) {
//             if (likesSpeakers[i] == speaker.love_teller) {
//                 console.log(likesSpeakers[i]);
//                 console.log(data.data[i].voornaam);
//                 let speakersHTML = document.querySelector(".js-speakers");
//                 let speakers = "";
//                 let img = "";
//                 if (data.data[i].afbeelding == null){
//                     img = "img/avatar.jpg";
//                 } else {
//                     img = `img/${data.data[i].afbeelding}`;
//                 }

//                 let bio = "";
//                 if (data.data[i].bio.nl.length > 350){
//                     bio = `${data.data[i].bio.nl.substr(0, 350)}...`;
//                 } else {
//                     bio = data.data[i].bio.nl;
//                 }

//                 speakers += `<div class="col-lg-4 col-md-6 col-sm-12">
//                     <div class="card" style="width: 22.5rem;">
//                         <div class="card-body">
//                             <img src="${img}" class="card-img-top"  alt="Card image cap">
//                             <h3 class="card-block__text">${data.data[i].voornaam} ${data.data[i].familienaam}</h3>
//                             <p class="card-text">${bio}</p>
//                             <a href="" style="float:left;" class="c-like__btn inline"><i id=${data.data[i].id} class="far fa-heart js-like"></i></a>
//                             <p style="float:left;" class="card-p">${data.data[i].love_teller} likes</p>
//                             <button style="float:right;" onclick="window.location.href='spreker-detail.html?speakerid=${data.data[i].id}'"  class="custom-btn btn-4 card-btn inline"><span>Lees meer</span></button>
//                         </div>
//                     </div>
//                 </div>`;
//                 speakersHTML.innerHTML = speakers;
//             }
//         }
//     }
// };

const toonSpeakers = function(api){
    data = api;
    let speakersHTML = document.querySelector(".js-speakers");
    let speakers = "";
    console.log(data.data[2].bio.nl.length);

    for (let i = 0; i < data.data.length; i++){
        let img = "";
        if (data.data[i].afbeelding == null){
            img = "img/avatar.jpg";
        } else {
            img = `img/${data.data[i].afbeelding}`;
        }

        let bio = "";
        if (data.data[i].bio.nl.length > 350){
            bio = `${data.data[i].bio.nl.substr(0, 350)}...`;
        } else {
            bio = data.data[i].bio.nl;
        }

        speakers += `<div class="col-lg-4 col-md-6 col-sm-12">
        <div class="c-card" style="width: 22.5rem;">
            <div class="c-card__body">
                <img src="${img}" class="c-card__img--top" alt="Card image cap">
                <h3 class="c-card__block--text">${data.data[i].voornaam} ${data.data[i].familienaam}</h3>
                <p class="c-card__text">${bio}</p>
                <a href="" style="float:left;" class="c-like__btn inline"><i id=${data.data[i].id} class="far fa-heart js-like"></i></a>
                <p style="float:left;" class="c-card__p">${data.data[i].love_teller} likes</p>
                <button style="float:right;" onclick="window.location.href='spreker-detail.html?speakerid=${data.data[i].id}'"  class="custom-btn btn-4 card-btn inline"><span>Lees meer</span></button>
            </div>
        </div>
    </div>`;

        
        
    }
    speakersHTML.innerHTML = speakers;
    const likeBtns = document.querySelectorAll(".js-like");
    for (let likeBtn of likeBtns) {
        likeBtn.addEventListener("click", function(e){
            like(e);
        });
    }
    getMostPopularSpeakers();
};

const like = function(e){
    e.preventDefault();
    let id = e.target.getAttribute("id");
    handleData(`http://api.laprudence.be/project2/v2/sprekers/${id}/love`, null, "PATCH", null);
};

const toonLike = function(data){
    console.log("we zitten erin");
    // const likeBtns = document.querySelectorAll(".js-like");
    // for (likeBtn of likeBtns) {
    //     let speakerid = likeBtn.getAttribute("id");
    //     if (parseInt(speakerid) == parseInt(data.id)) {
    //         console.log("like is gelukt");
    //     }
    // }
};

const maakPagination = function (){
    const aantalPaginas = Math.ceil(data.length / aantalPerPage);
    for(let i = 1; i <= aantalPaginas; i++){
      document.querySelector(".js-pagination").innerHTML += `<a href="#" class="page-link">${i}</a>`;
    }
    const paginaKnoppen = document.querySelectorAll(".page-link");
    for(const knop of paginaKnoppen){
      knop.addEventListener('click', function(){
        const start = (parseInt(knop.innerHTML) - 1) * aantalPerPagina;
        toonSpeakers(start);
      });
    }
  };