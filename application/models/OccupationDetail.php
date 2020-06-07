<?php

class OccupationDetail extends CI_Model{
    public $id;
    public $idAxe;
    public $valueToken;
    public $longueur;
    public $numVoiture;
    public $date;
    public $etat;
    public $nomAxe;
    public $longAxe;
    public $espace;
    public $dureemax;

    public function __construct(){
        parent::__construct();
    }

    public function getReservation($token,$db){
        $sql = "select * from occupationdetail  where valuetoken = ? and etat='1'";
        $query = $db->query($sql,array($token));
        $rows = $query->custom_result_object('OccupationDetail');
        return $rows;
    }

    public function manalaLanyDaty($db){
        
    }
}

?>