<?php

class Users extends CI_Model{
    public $id;
    public $nom;
    public $longueur;
    public $espace;
    public $dureeMax;
    public $coordX;
    public $coordY;

    public function __construct(){
        parent::__construct();
    }
}

?>