<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function checkUser()
	{
		
		$user=$this->input->post("user",true);
		$password=$this->input->post("password",true);
		if($user=="admin" &&  $password=="clave")
			$this->load->view("Administrator/welcome_message");
	}
}
