<?php

class Occupation extends CI_Model{
    public $id;
    public $idAxe;
    public $valueToken;
    public $longueur;
    public $numVoiture;
    public $date;
    public $etat;

    public function __construct(){
        parent::__construct();
    }
}

?>