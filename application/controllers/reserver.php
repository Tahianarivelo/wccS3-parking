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

        $token = get_cookie("token");
        //verification si a deja fait 3 reservation valide
        $requette = "select count(*) as nb from occupation where valueToken='" . $token . "' and etat=1";
        $query = $this->db->query($requette);
        $nb = 0;
        foreach ($query->result_array() as $row) {
            $nb = $row['nb'];
        }
        if ($nb >= 3) {
            $data['error'] = " vous avez déjà fait 3 demande de parking";
            $this->load->view('accueil',$data);
        } else {
            $id = "OCP".$this->Util->formatNumber($this->Util->getNextVal('seq_occupation'), 4);
            $idaxe = $this->input->post('idAxe');
            $longueur = $this->input->post('longueurVehicule');
            $matricule = $this->input->post('matricule');
            $date = new DateTime();
            $dataInsert = array(
                'id' => $id,
                'idaxe' => $idaxe,
                'valuetoken' => $token,
                'longueur' => $longueur,
                'numvoiture' => $matricule,
                'date' => $date->format("Y/m/d H:i:s"),
                'etat' => 1
            );

            $this->db->insert('occupation', $dataInsert);

            $data['view'] = 'reservation';
		    $this->load->view('template',$data);
        }
    }
    public function parckingTerminer(){
        $id = $this->input->post('idOccupation');
        $this->db->set('etat',10);
        $this->db->where('id', $id);
        $this->db->update('occupation'); // gives UPDATE occupation SET etat = 10 WHERE id = 2
        $data['view'] = 'reservation';
		$this->load->view('template',$data);
    }
}
