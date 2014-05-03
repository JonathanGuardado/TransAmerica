<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function index()
	{
		
	}
	public function showFleet()
	{
		
		$this->load->view("Administrator/content_flotas");
	}
	public function showFact()
	{
		$this->load->view("Administrator/content_facturacion");	
	}
	public function showUsers()
	{
		$this->load->view("Administrator/content_users");		
	}
	public function newClient()
	{
		$this->load->view("Administrator/newClient");		
	}
}
