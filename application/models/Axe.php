<?php

class Axe extends CI_Model{
    public $id;
    public $nom;
    public $longueur;
    public $espace;
    public $dureeMax;
    public $coordX;
    public $coordY;

    public function __construct(){
        parent::__construct();
        $this->load->model('Occupation');
    }

    public static function getAllAxis($db) {
        $query = $db->query('select * from axe');
        $rows = $query->custom_result_object('Axe');
        return $rows;
    }

    public function getTakenOccupation($db) { // place occupe
        $request = "select * from occupation where idAxe='%s' and etat=%d";
        $request = sprintf($request, $this->id, 1);
        $query = $db->query($request);
        $rows = $query->custom_result_object('Occupation');
        return $rows;
    }
    public function getTakenLength($db) { // longueur occupe
        $occupation = $this->getTakenOccupation($db);
        $result = 0;
        foreach($occupation as $row) {
            $result += $row->longueur + $this->espace;
        }
        return $result;
    }
    public function getFreelength($db) { // longueur occupe
        $takenlLength = $this->getTakenLength($db);
        $result = $this->longueur - ($takenlLength + $this->espace);
        return $result;
    }

    public static function getFreeAxis($carLength, $db) {
        $allAxis = Axe::getAllAxis($db);
        $result = array();
        foreach($allAxis as $axis) {
            if($carLength <= $axis->getFreelength($db)) {
                array_push($result, $axis);
            }
        }
        if( empty($result) ) {
            throw new Exception("le parking est remplit et ne peut pas vous garer");
        }
        return $result;
    }
}

?>