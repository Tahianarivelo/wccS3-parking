<?php

class Users extends CI_Model{
    public $id;
    public $nom;
    public $mdp;

    public function __construct(){
        parent::__construct();
    }
}

?>