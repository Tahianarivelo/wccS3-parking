<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() 
	{ 
	   parent::__construct(); 
	   $this->load->helper('url'); 
	   $this->load->database();
	   $this->load->model('Util');
	   $this->load->helper('cookie'); 
	   $this->load->model('Axe');
	}
	public function index()
	{
		if(get_cookie("token")==null){
			$data = array(
                'value' => $this->Util->getToken(),
            );

            $this->db->insert('token', $data);
			set_cookie('token',$this->Util->getToken(),60*60*24,'','/','',false,true);//1 jour expitation
		}
	
		$this->load->view('accueil');
	}
	public function recherche() {
		$data = null;
		try {
			$carLength = $this->input->post('longueur');
			$freeAxis = Axe::getFreeAxis($carLength, $this->db);
			$data = array(
				'freeAxis' => $freeAxis,
				'freeAxis' => $freeAxis[0],
				'view' => 'rechercheResult'
			);
			$this->load->view('template',$data);
		} catch(Exception $e) {
			$data = array(
				'error' => $e->getMessage(),
				'view' => 'rechercheResult',
			);
		} finally {
			$this->load->view('template', $data);
		}
	}
	public function reservation() {
		$data['view'] = 'reservation';
		$this->load->view('template',$data);
	}
	
}
