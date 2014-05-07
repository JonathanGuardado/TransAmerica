<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
		$this->load->view("Templates/header");
		$this->load->view("Administrator/menu");
		$this->load->view("Administrator/content_flotas");
		$this->load->view("Templates/footer");
	
		
	}
	public function showFleet()
	{
		
		$this->load->view("Administrator/content_flotas");
	}
	public function showFact()
	{
		$this->load->view("Administrator/content_facturacion");	
	}
	public function showMantain()
	{
		$this->load->view("Administrator/content_mantain");		
	}

}
