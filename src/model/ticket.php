<?php 

    class Ticket{
        public $ticketid;
        public $naam;
        public $voornaam;
        public $postcode;
        public $email;
        public $earlybird;
        public $regular;
        public $student;
        public $vip;
        public $besteldop;

        public function __construct($particketid=-1, $parnaam="", $parvoornaam="", $parpostcode="", $paremail="", $parearlybird=-1, $parregular=-1, $parstudent=-1, $parvip=-1, $parbesteldop=""){
            $this->ticketid = $particketid;
            $this->naam = $parnaam;
            $this->voornaam = $parvoornaam;
            $this->postcode = $parpostcode;
            $this->email = $paremail;
            $this->earlybird = $parearlybird;
            $this->regular = $parregular;
            $this->student = $parstudent;
            $this->vip = $parvip;
            $this->besteldop = $parbesteldop;
        }
    }

?>