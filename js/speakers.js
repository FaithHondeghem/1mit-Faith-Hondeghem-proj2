"use strict";
let data;
const aantalPerPage = 6;

const init = function(){
    getAllSpeakers();

};

document.addEventListener("DOMContentLoaded", init);

const getAllSpeakers = function(){
    handleData(`http://api.laprudence.be/project2/v2/sprekers?all`, toonSpeakers, "GET", null);
};

const toonSpeakers = function(api){
    data = api;
    let speakersHTML = document.querySelector(".js-speakers");
    let speakers = "";
    console.log(data.data[2].bio.nl.length);

    for (let i = 0; i < data.data.length; i++){
        let img = "";
        if (data.data[i].afbeelding == null){
            img = "avatar.jpg";
        } else {
            img = data.data[i].afbeelding;
        }

        let bio = "";
        if (data.data[i].bio.nl.length > 350){
            bio = `${data.data[i].bio.nl.substr(0, 350)}...`;
        } else {
            bio = data.data[i].bio.nl;
        }

        console.log("Hallo");
        speakers += `<div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" style="width: 22.5rem;">
            <div class="card-body">
                <img class="card-img-top" src="/img/${img}" alt="Card image cap">
                <h3 class="card-block__text">${data.data[i].voornaam} ${data.data[i].familienaam}</h3>
                <p class="card-text">${bio}</p>
                <a href="" style="float:left;" class="c-like__btn inline"><i id=${data.data[i].id} class="far fa-heart js-like"></i></a>
                <p style="float:left;" class="card-p">${data.data[i].love_teller} likes</p>
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