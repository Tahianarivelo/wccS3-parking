<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class GetReservation extends CI_Controller {
        public function index() {
           $this->load->model('Util');
           $heure = $this->Util->getDiffenHeure('2020-06-06');
           echo $heure;
        }
        public function AfficheReservation(){
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
        public function back(){
            $data = array('view' => 'dashboard');
            $this->load->view('back/template_back',$data);
        }
        public function lanyDaty(){
            $data = array('view' => 'lanydaty');
            $this->load->view('back/template_back',$data);
        }
    }
?>