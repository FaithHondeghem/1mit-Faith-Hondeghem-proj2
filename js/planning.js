"use strict";

const init = function() {
    getAlleZalen();

};

document.addEventListener("DOMContentLoaded", init);

const getAlleZalen = function() {
    handleData(`http://api.laprudence.be/project2/v2/talks?all`, toonZalen, "GET", null);
};

const toonZalen = function(data) {
    let zalenHTML = document.querySelector(".js-planning");
    let zalen = "";
    
    console.log(data);

    for (let i = 0; i < data.data.length; i++) {
        let zaalid = parseInt(i) + 100;
        zalen += `<table class="c-table" style="width:100%">
            <thead>
            <tr>
            <th class="c-table--titel" colspan="12">${data.data[i].zaal.omschrijving}</th>
            </tr>
            </thead>
            <tbody id="${zaalid}">
            <tr class="c-table--row" onclick="window.location.href='sessie-detail.html'" >
            <td>${data.data[i].start}</td>
            <td>${data.data[i].titel}</td>
            <td>${data.data[i].spreker.voornaam} ${data.data[i].spreker.familienaam}</td>
            <td><i class="fas fa-chevron-right"></i></td>
            </tr>
            </tbody>
        </table>`;
    }
    zalenHTML.innerHTML = zalen;

};
