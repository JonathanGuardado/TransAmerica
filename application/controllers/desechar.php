<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desechar extends CI_Controller {

	public function index()
	{
		$this->load->view("Administrator/Desechar/desecharWheel");	
	}
	public function storeNewDesechar()
	{
		$fechaDesechar=$this->input->post("fechaDesechar",true);
		$noWheel=$this->input->post("noWheel",true);
		$descripcion=$this->input->post("descripcion",true);

		//Almacenamos en la base la Desechar de la llanta
		$this->load->view("Administrator/Desechar/desecharWheel");	
		
	}
}
