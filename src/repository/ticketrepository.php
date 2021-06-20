<?php
require_once dirname(__FILE__)."/../database/database.php";
require_once dirname(__FILE__)."/../model/ticket.php";

class TicketRepository {
    public static function createTicket($particket) {
        $int = Database::execute("INSERT INTO tickets (naam, voornaam, postcode, email, earlybird, regular, student, vip, besteldop) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)", [$particket->naam, $particket->voornaam, $particket->postcode, $particket->email, $particket->earlybird, $particket->regular, $particket->student, $particket->vip, $particket->besteldop]);
        return $int;
    }

    public static function getAllTickets() {
        $arr = Database::getRows("SELECT * FROM tickets", null, "Ticket");
        return $arr;
    }

    public static function deleteTicket($particketid) {
        $int = Database::execute("DELETE FROM tickets WHERE ticketid = ?", [$particketid]);
        return $int;
    }
}

?>