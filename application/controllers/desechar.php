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
		$this->load->model("desechar_model");
		$this->desechar_model->desechar_llanta($fechaDesechar,$noWheel,$descripcion);
		$data['message']="<div class='text-center'><h4>modificacion de llanta  Exitosamente!</h4></div>";
		$this->load->view("Administrator/Desechar/desecharWheel",$data);	

	}
}
