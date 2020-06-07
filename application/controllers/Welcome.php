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
		$loadView = 'template';
		try {
			$carLength = $this->input->post('longueur');
			$freeAxis = Axe::getFreeAxis($carLength, $this->db);
			$data = array(
				'carLength' => $carLength,
				'freeAxis' => $freeAxis,
				'suggestAxis' => $freeAxis[0],
				'view' => 'rechercheResult'
			);
		} catch(Exception $e) {
			$error = $e->getMessage();
			
				$data['error'] = $error;
				$loadView = 'accueil';
			
		} finally {
			$this->load->view($loadView, $data);
		}
	}
	public function reservation() {
		$res = array(
			'status' => 'error',
			'message' => '',
			'value' => null,
			'view' => 'reservation');
		if(isset($_COOKIE['token'])){
			//load
			$this->load->model('OccupationDetail');
			$this->load->helper('cookie');
			$this->load->database();

			$lesReser = null;
			try{
				$lesReser = $this->OccupationDetail->getReservation($_COOKIE['token'],$this->db);
				//si il est vide
				if(empty($lesReser)){
					$res['message'] = "vous n'avez pas encore de reservation.";
				}
				else{
					$res['message'] = 'vos reservations récentes.';
				}
				$res['status'] = 'OK';
				$res['value'] = $lesReser;
				$this->load->view('template',$res);
			}
			catch(Exception $e){
				$res['message'] = $e->getMessage();
				$this->load->view('template',$res);
			}
			finally{
				$this->db->close();
			}
		}
		else{
			$this->load->view('template',$res);
		}
	}
	
}
