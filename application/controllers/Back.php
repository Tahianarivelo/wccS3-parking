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
         $this->load->view('back/template_back',$data);
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
      $res = array(
			'status' => 'error',
			'message' => '',
			'value' => null,
			'view' => 'lanydaty');
		if(isset($_COOKIE['token'])){
			//load
			$this->load->model('OccupationDetail');
         $this->load->database();
         $this->load->model('Util');

         $lesReser = array();
         $resFinal = array();
			try{
				$lesReser = $this->OccupationDetail->makaLanyDaty($this->db);
            $res['status'] = 'OK';
            //triage pardifference d'heure si ils depace le duree max de l'axe 
            foreach($lesReser as $resOne){
               if($this->Util->getDiffenHeure($resOne->date) > $resOne->dureemax){
                  $resFinal[] = $resOne;
               }
            }
            //si il est vide
				if(empty($resFinal)){
					$res['message'] = "Pas encore de reservation expirée.";
				}
				else{
					$res['message'] = 'Les reservations expirées.';
            }
            $res['value'] = $resFinal;
				$this->load->view('back/template_back',$res);
			}
			catch(Exception $e){
				$res['message'] = $e->getMessage();
				$this->load->view('back/template_back',$res);
			}
			finally{
				$this->db->close();
			}
		}
		else{
			$this->load->view('back/template_back',$res);
		}
   }
   public function parckingTerminerBack(){
      $id = $this->input->post('idOccupation');
      $this->db->set('etat',10);
      $this->db->where('id', $id);
      $this->db->update('occupation'); // gives UPDATE occupation SET etat = 10 WHERE id = 2
  
      redirect(base_url()."Back/LanyDaty", 'location',301);
  }
  public function AddAxe(){
      $res = array(
         'status' => 'error',
         'message' => '',
         'value' => null,
         'view' => 'dashboard');
      $this->load->database();
      try{
         $nom = $this->input->post('nom');
         $longueur = $this->input->post('longueur');
         $espace = $this->input->post('espace');
         $dureemax = $this->input->post('duree');

         $sql = "INSERT INTO axe VALUES(nextval('seq_axe'),?,?,?,?,0,0)";
         $this->db->query($sql, array($nom,$longueur,$espace,$dureemax));
         $data['view'] = 'dashboard';
         $this->load->view('back/template_back',$data);
      }catch(Exception $e){
        
      }
      finally
      {
         $this->db->close();
      }
  }
}
