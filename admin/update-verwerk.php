<?php
    require_once dirname(__FILE__)."/src/repository/ticketrepository.php";
    require_once dirname(__FILE__)."/src/helper/debug.php";
    require_once dirname(__FILE__)."/src/model/ticket.php";

    if (isset($_POST["submit"])){
        //datum en tijd van de update bijhouden
        $now = date_create('now')->format('Y-m-d H:i:s');
        //kijken welke tickets besteld werden
        if($_POST["type"] == "earlybird"){
            $nieuwTicket = new Ticket($_POST["id"], $_POST["naam"], $_POST["voornaam"],$_POST["postcode"], $_POST["email"], $_POST["aantal"], 0, 0, 0, $now);
        }
        if($_POST["type"] == "regular"){
            $nieuwTicket = new Ticket($_POST["id"], $_POST["naam"], $_POST["voornaam"],$_POST["postcode"], $_POST["email"], 0, $_POST["aantal"], 0, 0, $now);
        }
        if($_POST["type"] == "student"){
            $nieuwTicket = new Ticket($_POST["id"], $_POST["naam"], $_POST["voornaam"],$_POST["postcode"], $_POST["email"], 0, 0, $_POST["aantal"], 0, $now);
        }
        if($_POST["type"] == "earlybird"){
            $nieuwTicket = new Ticket($_POST["id"], $_POST["naam"], $_POST["voornaam"],$_POST["postcode"], $_POST["email"], 0, 0, 0, $_POST["aantal"], $now);
        }
        $aantalRijen = TicketRepository::updateTicket($nieuwTicket);
        if($aantalRijen > 0){
            header("location:overzicht.php");
        } else {
            echo "Er zijn geen records aangepast";
        }
    } else {
        echo "updaten mislukt";
    }
?>