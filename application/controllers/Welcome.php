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
		$this->load->view('index');
	}
	public function recherche(){
		$this->load->view('rechercheResult');
	}
	public function reservation(){
		$this->load->view('reservation');
	}
	public function elements(){
		$this->load->view('elements');
	}
}
