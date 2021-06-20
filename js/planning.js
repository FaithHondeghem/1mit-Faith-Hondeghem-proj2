"use strict";

const init = function() {
    getAlleZalen();

};

document.addEventListener("DOMContentLoaded", init);

const getAlleZalen = function() {
    handleData(`http://api.laprudence.be/project2/v2/zalen`, toonZalen, "GET", null);
};

const getTalks = function(zaalid) {
    handleData(`http://api.laprudence.be/project2/v2/zalen/${zaalid}/talks`, toonTalks, "GET", null);
};

const toonZalen = function(data) {
    let zalenHTML = document.querySelector(".js-planning");
    let zalen = "";
    
    console.log(data);

    for (let i = 0; i < data.length; i++) {
        let zaalid = parseInt(i) + 100;
        zalen += `<table class="c-table" style="width:100%">
            <thead>
            <tr>
            <th class="c-table--titel" colspan="12">${data[i].omschrijving}</th>
            </tr>
            </thead>
            <tbody id="${zaalid}">

            </tbody>
        </table>`;
        getTalks(zaalid);
    }
    zalenHTML.innerHTML = zalen;
};

const toonTalks = function(data) {
    console.log(data);
    for (let talk of data.talks) {
        document.getElementById(data.id).innerHTML += `<tr class="c-table--row" onclick="window.location.href='sessie-detail.html?talkid=${talk.id}'" >
        <td colspan="2">${talk.start}</td>
        <td colspan="4">${talk.titel}</td>
        <td colspan="4">${talk.spreker.voornaam} ${talk.spreker.familienaam}</td>
        <td colspan="2"><i class="fas fa-chevron-right"></i></td>
      </tr>`;
    }
};
