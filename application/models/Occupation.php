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

    public function getReservation($token,$db){
        $sql = "select * from occupation  where valuetoken = ?";
        $query = $db->query($sql,array($token));
        $rows = $query->custom_result_object('Occupation');
        return $rows;
    }

    public function getReservationToDay(){
        $sql = "select * from occupation  where valuetoken = ?";
        $query = $db->query($sql,array($token));
        $rows = $query->custom_result_object('Occupation');
        return $rows;
    }

    public function getReservationRecente(){
        $sql = "select * from occupation  where valuetoken = ?";
        $query = $db->query($sql,array($token));
        $rows = $query->custom_result_object('Occupation');
        return $rows;
    }
}

?>