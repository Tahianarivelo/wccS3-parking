<?php
class Back extends CI_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->helper('url');
      $this->load->database();
      $this->load->model('Users');
      $this->load->model('Util');
      session_start();
   }
   public function index()
   {
      if (isset($_SESSION['user'])) {
         //redirect to back accueil
         $data['view'] = "dashboard";
         $this->load->view('back/template_back', $data);
      } else {
         $data['page'] = "login";
         $this->load->view('back/auth', $data);
      }
   }
   public function InscriptionPage()
   {
      $data['page'] = "inscription";
      $this->load->view('back/auth', $data);
   }
   public function login()
   {
      $data = array();
      try {

         $nom = $this->input->post('nom');
         $mdp = $this->input->post('mdp');
         
         if ($nom === "") throw new Exception("nom invalide");
         else if ($mdp == "") throw new Exception("Mot de passe tsy normal");
         
         $query = $this->db->query("select * from users where nom='".$nom."'");
         $rows = $query->custom_result_object('Users');

         $pers=null;
         foreach ($rows as $row) {
            $pers = $row;
         }
         if($pers==null){
            throw new Exception("nom invalide");
         }else{
            if(password_verify($mdp,$pers->mdp)){
               $_SESSION['user']=$pers->id;
               //redirect to back accueil
               $data['view'] = "dashboard";
               $this->load->view('back/template_back', $data);
            }else{
               throw new Exception("Mot de passa diso");
            }
         }
      } catch (Exception $ex) {

         $data['error'] = $ex->getMessage();
         $data['page'] = "login";
         $this->load->view('back/auth', $data);
      }
      
   }
   public function logOut()
   {
      if (isset($_SESSION['user'])) $_SESSION['user'] = null;
      session_destroy();
      $data['page'] = "login";
      $this->load->view('back/auth', $data);
   }
   public function Inscription()
   {
      $data = array();
      try {
         $this->db->trans_begin();
         $nom = $this->input->post('nom');
         $mdp = $this->input->post('mdp');
         $confmdp = $this->input->post('ConfirMdp');
         if ($nom === "") throw new Exception("nom invalide");
         else if ($mdp == "") throw new Exception("Mot de passe tsy normal");
         else if ($mdp != $confmdp) throw new Exception("Mot de passe tsy mitovy");

         $requette = "select count(*) as nb from users where nom='" . $nom . "'";
         $query = $this->db->query($requette);
         $nb = 0;
         foreach ($query->result_array() as $row) {
            $nb = $row['nb'];
         }
         if ($nb == 0) {
            $id = "USR" . $this->Util->formatNumber($this->Util->getNextVal('seq_users'), 4);
            $passHash = password_hash($mdp, PASSWORD_BCRYPT);
            $dataInsert = array(
               'id' => $id,
               'nom' => $nom,
               'mdp' => $passHash

            );

            $this->db->insert('users', $dataInsert);
            $this->db->trans_commit();
            $data['page'] = "login";
            $this->load->view('back/auth', $data);
         } else {
            throw new Exception("Nom efa ao");
         }
      } catch (Exception $ex) {
         $this->db->trans_rollback();
         $data['error'] = $ex->getMessage();
         $data['page'] = "inscription";
         $this->load->view('back/auth', $data);
      }
   }
   public function Home(){
      $data['view'] = 'dashboard';
      $this->load->view('back/template_back',$data);
   }
   public function LanyDaty(){
      $data['view'] = 'lanydaty';
      $this->load->view('back/template_back',$data);
   }
}
