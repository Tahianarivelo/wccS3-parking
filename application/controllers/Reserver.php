<?php
class Reserver extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Util');
        $this->load->helper('cookie');
    }
    public function index()
    {
        $this->load->helper('url');
        $token = get_cookie("token");
        //verification si a deja fait 3 reservation valide
        $requette = "select count(*) as nb from occupation where valueToken='" . $token . "' and etat=1";
        $query = $this->db->query($requette);
        $nb = 0;
        foreach ($query->result_array() as $row) {
            $nb = $row['nb'];
        }
        if ($nb >= 3) {
            $error = " Efa nanao fangatahana mihoatra ny telo (3) ianao ka tsy mety intsony raha tsy miala eo amin'ny toerana ny iray";
            redirect(base_url().'?error='.$error, 'location',301);
        } else {
            $id = "OCP".$this->Util->formatNumber($this->Util->getNextVal('seq_occupation'), 4);
            $idaxe = $this->input->post('idAxe');
            $longueur = $this->input->post('longueurVehicule');
            $matricule = $this->input->post('matricule');
            // $reg="/^([0-9]{4})\s?([A-Za-z]{2,3})$/i";
            // if(!preg_match($reg,$matricule)){
            //     $data['errorMatr'] = "Matricule non valide";
            //     $data['view'] = 'rechercheResult';
		    //     $this->load->view('template',$data);
            // }
            $replaced = preg_replace("/\s+/", "", $matricule);
            $up=strtoupper($replaced);
            $matriculeFinal=substr($up, 0, 4).' '.substr($up, 4, 3);
            $date = new DateTime();
            $dataInsert = array(
                'id' => $id,
                'idaxe' => $idaxe,
                'valuetoken' => $token,
                'longueur' => $longueur,
                'numvoiture' => $matriculeFinal,
                'date' => $date->format("Y/m/d H:i:s"),
                'etat' => 1
            );

            $this->db->insert('occupation', $dataInsert);
            
            redirect(base_url().'welcome/reservation', 'location',301);
        }
    }
    public function parckingTerminer(){
        $id = $this->input->post('idOccupation');
        $this->db->set('etat',10);
        $this->db->where('id', $id);
        $this->db->update('occupation'); // gives UPDATE occupation SET etat = 10 WHERE id = 2
    
        redirect(base_url(), 'location',301);
    }
}
