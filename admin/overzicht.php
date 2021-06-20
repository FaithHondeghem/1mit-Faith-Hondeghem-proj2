<?php
require_once dirname(__FILE__)."/../src/repository/ticketrepository.php";
require_once dirname(__FILE__)."/../src/helper/debug.php";

$arrTickets = TicketRepository::getAllTickets();
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
        <link rel="icon" href="../img/logo-tabAsset2.png">
        <link rel="stylesheet" type="text/css" href="../css/screen.css"/>  
        <script src="https://kit.fontawesome.com/7f4e74808c.js" crossorigin="anonymous"></script>
        <title>Multi-Mania</title>
    </head>
  <body>
    <header class="sticky-top">
      <nav class="c-nav navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.html"><img src="../img/Logo-long.png"></a>
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
            <li class="c-nav--item">
              <a class="nav-link" href="tickets.html">Tickets</a>
            </li>
            <li class="c-nav--item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
          <form class="c-search col-lg-2" action="#">
            <input class="c-search__txt" type="text" placeholder="Zoeken..." name="search">
            <button class="c-search__btn" type="search"><i class="fa fa-search c-search__btn--icon"></i></button>
          </form>
        </div>
      </nav>
    </header>
    <main>
        <table class="c-table container">
            <tr class="c-table--titel">
                <th class="c-table--titel">Type</th>
                <th class="c-table--titel">Aantal</th>
            </tr>
            <?php
                $earlybird = 0;
                $regular = 0;
                $student = 0;
                $vip = 0;
                foreach($arrTickets as $ticket){
                    if ($ticket->earlybird > 0) {
                        $earlybird += $ticket->earlybird;
                    } 
                    if ($ticket->regular) {
                        $regular += $ticket->regular;
                    } 
                    if ($ticket->student) {
                        $student += $ticket->student;
                    } 
                    if ($ticket->vip) {
                        $vip += $ticket->vip;

                    }
                }
                echo '<tr class="c-table--row">
                        <td>Earlybird</td>
                        <td>'.$earlybird.'</td>
                      </tr>
                      <tr class="c-table--row">
                        <td>Regular</td>
                        <td>'.$regular.'</td>
                      </tr>
                      <tr class="c-table--row">
                        <td>Student</td>
                        <td>'.$student.'</td>
                      </tr>
                      <tr class="c-table--row">
                        <td>VIP</td>
                        <td>'.$vip.'</td>
                      </tr>';
            ?>
        </table>
        <table class="c-table container text-center">
            <tr class="c-table--titel">
              <th class="c-table--titel">ID</th>
              <th class="c-table--titel">Naam</th>
              <th class="c-table--titel">Earlybird</th>
              <th class="c-table--titel">Regular</th>
              <th class="c-table--titel">Student</th>
              <th class="c-table--titel">VIP</th>
              <th class="c-table--titel--edit">Edit</th>
              <th class="c-table--titel--delete">Delete</th>
            </tr>
            <?php
                foreach ($arrTickets as $ticket){
                    $tempID = $ticket->ticketid;
                    echo '<tr class="c-table--row">
                    <td>'.$ticket->ticketid.'</td>
                    <td>'.$ticket->voornaam.' '.$ticket->naam.'</td>
                    <td>'.$ticket->earlybird.'</td>
                    <td>'.$ticket->regular.'</td>
                    <td>'.$ticket->student.'</td>
                    <td>'.$ticket->vip.'</td>
                    <td><a class="c-table__edit--btn" type="button" href="#">Edit</a></td>
                    <td><a class="c-table__delete--btn" type="button" href="delete-ticket.php?id='.$tempID.'"><i class="far fa-trash-alt"></i></a></td>
                  </tr>';
                }
            ?>
          </table>
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
                  <li class="footer__nav--item">
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
            <i class="far fa-copyright"> <img src="../img/MultimaniaAsset3.png" alt="footer"> 2021</i>
        </div>
    </footer>
  </body>
</html>