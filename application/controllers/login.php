<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
		$this->load->view("Templates/footer");

	}
	public function checkUser()
	{
		
		$user=$this->input->post("user",true);
		$password=$this->input->post("pass",true);
		


		$this->load->model("login_model");
		

		if ($this->login_model->comprobar_usuario($password, $user))
             {
             	$data=$this->login_model->comprobar_usuario($password, $user);
             	$this->load->library('session');
                $this->session->set_userdata($data);
                $jsondata['bandera']    = 1;
                $jsondata['nivel']    = "index.php/".$data['idtipousuario']."";          	
             }
        else
        {
        	$jsondata['bandera']    = 4;
        	$jsondata['mensaje']    = "LOS CAMPOS DE USUARIO Y CONTRASEÑA SON OBLIGATORIOS";
        }
   echo json_encode($jsondata);

	}
	public function logout()
       {
           $this->load->helper('url');
           $this->load->library('session');
           $data=array('idusuario'=>'','idtipousuario'=>'','nombre_usuario'=>'','clave'=>'');
           $this->session->unset_userdata($data);
           $this->session->sess_destroy();
           redirect("");
       }
}
