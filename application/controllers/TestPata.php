<?php

class TestPata extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Axe');
    }
    public function __destruct() {
        $this->db->close();
        echo '</br>destruction';
    }
    public function index() {
        echo 'test Pata </br>';
        echo 'database </br>';
        $result = Axe::getFreeAxis(4, $this->db);
        foreach($result as $row) {
            echo $row->dureemax.'</br>';
        }
        $a = $result[0]->getFreelength($this->db);
        echo $a.'</br>';
        $freeAxis = Axe::getFreeAxis('', $this->db);
        $str = '28.43';
        echo floatval($str);
    }
    public function Axe() {

    }
}

?>