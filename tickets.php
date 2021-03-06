<?php
require_once dirname(__FILE__)."/src/repository/ticketrepository.php";
require_once dirname(__FILE__)."/src/helper/debug.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
          rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://use.typekit.net/tev8ojx.css">
        <link rel="icon" href="img/logo-tabAsset2.png">
        <link rel="stylesheet" type="text/css" href="css/screen.css"/>  
        <script src="https://kit.fontawesome.com/7f4e74808c.js" crossorigin="anonymous"></script>
        <title>Multi-Mania</title>
    </head>
  <body>
    <header class="sticky-top">
      <nav class="c-nav navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="img/Logo-long.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <div class="mr-auto"></div>
          <ul class="c-nav navbar-nav mt-2 mt-lg-0">
            <li class="c-nav--item">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="c-nav--item">
              <a class="nav-link" href="sprekers.html">Sprekers</a>
            </li>
            <li class="c-nav--item">
              <a class="nav-link" href="planning.html">Planning</a>
            </li>
            <li class="c-nav--item">
              <a class="nav-link" href="sponsors.html">Sponsors</a>
            </li>
            <li class="c-nav--item active">
              <a class="nav-link" href="tickets.html">Tickets</a>
            </li>
            <li class="c-nav--item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
          <form class="c-search col-lg-2" action="#">
            <input class="c-search__txt" type="text" placeholder="Zoeken..." name="search">
            <button class="c-search__btn" type="submit"><i class="fa fa-search c-search__btn--icon"></i></button>
          </form>
        </div>
      </nav>
    </header>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="c-tickets">
              <h1 class="c-tickets__h1">Bestel hier uw tickets.</h1>
              <form action="ticket-verwerk.php" method="POST" class="c-tickets">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                      <label class="c-tickets--label" for="voornaam">Voornaam</label><br>
                      <input class="c-tickets--input" type="text" id="voornaam" name="voornaam" placeholder="Voornaam"><br>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                      <label class="c-tickets--label" for="naam">Naam</label><br>
                      <input class="c-tickets--input" type="text" id="naam" name="naam" placeholder="Naam"><br>
                  </div>
                </div>
                  <label class="c-tickets--label" for="postcode">Postcode</label><br>
                  <input class="c-tickets--input" type="text" id="postcode" name="postcode" placeholder="Postcode"><br>
                  <label class="c-tickets--label" for="email">Email</label><br>
                  <input class="c-tickets--input mb-5" type="email" id="email" name="email" placeholder="Email"><br>
                <div class="c-tickets--aantal">
                    <div class="row pb-3">
                        <div class="col-6">
                            <h5>Type</h2>
                        </div>
                        <div class="col-6">
                            <h5>Aantal</h2>                        
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-6">
                            <label class="form-label" for="earlybird">Early Bird (???30,00)</label>
                        </div>
                        <div class="col-6">
                            <input type="number" class="c-tickets--input" name="earlybird" id="earlybird" min="0" placeholder="0" />
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-6">
                            <label class="form-label" for="regular">Regular (???45,00)</label>
                        </div>
                        <div class="col-6">
                            <input type="number" class="c-tickets--input" name="regular" id="regular" min="0" placeholder="0" />
                        </div>
                    </div>
    
                    <div class="row pb-3">
                        <div class="col-6">
                            <label class="form-label" for="student">Student (???15,00)</label>
                        </div>
                        <div class="col-6">
                            <input type="number" class="c-tickets--input" name="student" id="student" min="0" placeholder="0" />
                        </div>
                    </div>
                  
                    <div class="row pb-3">
                        <div class="col-6">
                            <label class="form-label" for="vip">VIP (???60,00)</label>
                        </div>
                        <div class="col-6">
                            <input type="number" class="c-tickets--input" name="vip" id="vip" min="0" placeholder="0" />
                        </div>
                    </div>
                </div>
                <!-- <input type="submit" class="custom-btn btn-4 card-btn inline" value="submit"> -->
                <button name="submit" type="submit" class="custom-btn btn-4 card-btn inline"><span>Bestel nu <i class="fas fa-chevron-right"></i></span></button>
              </form>
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <img class="c-tickets--img" src="img/alexandre-debieve-DOu3JJ3eLQc-unsplash.jpg">
          </div>
        </div>
      </div>
    </main>
    <footer>
        <div class="container">
          <div class="c-footer">
            <div class="row">
              <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-1 order-xs-1">
                  <h4 class="text-uppercase">Navigatie</h4>
              </div>
              <div class="col-lg-4 col-sm-12 order-lg-2 order-sm-3 order-xs-3">
                  <h4 class="text-uppercase">Social Media</h4>
              </div>
              <div class="col-lg-4 col-sm-12 order-lg-3 order-sm-5 order-xs-5">
                  <h4 class="text-uppercase">Contact</h4>
              </div>
              <hr class="d-none d-lg-block d-md-block order-lg-4" size="2px" width="100%" color="#E0D07C"> 
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12 order-lg-5 order-sm-2 order-xs-2">
                <ul class="footer__nav">
                  <li class="footer__nav">
                    <a class="footer__nav--link" href="index.html">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="sprekers.html">Sprekers</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="planning.html">Planning</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="sponsors.html">Sponsors</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="tickets.html">Tickets</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="contact.html">Contact</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="privacybeleid.html">Privacybeleid</a>
                  </li>
                  <li class="footer__nav--item">
                    <a class="footer__nav--link" href="#">Admin login</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-4 col-sm-12 order-lg-6 order-sm-4 order-xs-4">
                <form>
                  <label class="c-form__email--label" for="email">Schrijf u in voor onze email!</label><br>
                  <input class="c-form__email--input" type="email" id="email" name="email" placeholder="Emailadres...">
                  <button class="c-form__email--btn" type="submit">Schrijf je in</button><br>
                </form>
                <a href="#" class="c-fb"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="c-twitter"><i class="fab fa-twitter-square"></i></a>
              </div>
              <div class="col-lg-4 col-sm-12 order-lg-7 order-sm-6 order-xs-6">
                  <p>info@multimania.com</p>
                  <p>+32 412 34 56 78</p>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__i container text-center">
            <i class="far fa-copyright"> <img src="/img/MultimaniaAsset3.png" alt="footer"> 2021</i>
        </div>
      </footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>  
</html>
