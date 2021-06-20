<?php 
    require_once dirname(__FILE__) . "/../src/helper/debug.php";
    require_once dirname(__FILE__) . "/../src/repository/ticketrepository.php";
    if(isset($_GET["id"])){
        $res = TicketRepository::deleteTicket($_GET["id"]);
        if($res > 0){
            header("location:overzicht.php");
        }
        else{
            echo "Verwijderen mislukt";
        }
    }
    else{
        echo "Geen querystring gevonden";
    }
?>