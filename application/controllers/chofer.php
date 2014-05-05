<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chofer extends CI_Controller {

	public function index()
	{
		
	}
	public function newChofer()
	{
		$this->load->view("Administrator/Chofer/newChofer");		
	}
	public function editChofer()
	{
		//Jala de la base todos los Chofers para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Chofer/editChofer",$data);		
	}
	public function editChofer2()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		//Jala de la base los campos del Chofer para llenar el formulario
		$data="";
		$this->load->view("Administrator/Chofer/editChofer2",$data);		
	}
	public function deleteChofer()
	{
		//Jala todos los Chofers de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Chofer/deleteChofer",$data);		
	}
	public function searchChofer()
	{
		//Jala de la base todos los Chofers para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Chofer/searchChofer",$data);		
	}
	public function searchChofer2()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		//Jala de la base los campos del Chofer para llenar el formulario
		$data="";
		$this->load->view("Administrator/Chofer/searchChofer2",$data);		
	}
	public function storeNewChofer()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Chofer Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/newChofer",$data);
	}
	public function storeEditChofer()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Chofer Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/editChofer",$data);
	}



}
