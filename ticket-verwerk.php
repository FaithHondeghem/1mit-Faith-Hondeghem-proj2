<?php
require_once dirname(__FILE__)."/src/repository/ticketrepository.php";
require_once dirname(__FILE__)."/src/helper/debug.php";
require_once dirname(__FILE__)."/src/model/ticket.php";

    //controleren of er effectief op de submitknop geklikt werd
    if(isset($_POST["submit"])){
        //controleren of alles werd ingevuld
        if(isset($_POST["voornaam"], $_POST["naam"], $_POST["postcode"], $_POST["email"])){
            //datum en tijd 
            $now = date_create('now')->format('Y-m-d H:i:s');
            
            $nieuwTicket = new Ticket(null, $_POST["naam"], $_POST["voornaam"],$_POST["postcode"], $_POST["email"], $_POST["earlybird"], $_POST["regular"], $_POST["student"], $_POST["vip"], $now);

            $aantalRijen = TicketRepository::createTicket($nieuwTicket);
            if($aantalRijen > 0){
                header("location:index.html");
            }
            else{
                echo "Bestelling mislukt";
            }
        }
        else{
            echo "Verkeerde data in het bestelformulier";
        }
    }
    else{
        echo "Bestelling mislukt vanornder";
    }
?>