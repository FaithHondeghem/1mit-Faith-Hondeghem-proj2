const init = function(){
    getSessieByID();
};

document.addEventListener("DOMContentLoaded", init);

const getSessieByID = function(){
    handleData(`http://api.laprudence.be/project2/v2/talks/${id}`, toonSessie, "GET", null);
};

const toonSessie = function(){
    let sessieHTML = document.querySelector(".js-sessie");
    let sessie = "";
    console.log("hallo");
    sessie += `<div class="col-lg-6 col-sm-12">
    <h1>Naam sessie</h1>
    <h3>Naam spreker</h3>
    <h5>Locatie, 13u00</h5>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae id nemo illo voluptas dolore sequi neque iste incidunt molestiae perferendis, voluptatem, suscipit a pariatur cupiditate corporis odio est quas tenetur? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime assumenda libero rem labore vitae ex dolorem sapiente in ipsa consequatur! Cupiditate facere dicta voluptatibus dolorem vel modi fuga assumenda officiis!</p>
    <a style="float: left;" href="#" class="c-fb"><i class="fab fa-facebook-square"></i></a>
    <a style="float: left;" href="#" class="c-twitter"><i class="fab fa-twitter-square"></i></a>
</div
><div class="col-lg-6 col-sm-12">
    <img src="/img/maxim-hopman-IayKLkmz6g0-unsplash.jpg" alt="spreker">
</div>`;

    sessieHTML.innerHTML= sessie;
};