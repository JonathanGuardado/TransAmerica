<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viaje extends CI_Controller {

	public function index()
	{
		
	}
	public function newViaje()
	{
		$this->load->view("Administrator/Viaje/newViaje");		
	}
	public function editViaje()
	{
		//Jala de la base todos los Viajes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Viaje/editViaje",$data);		
	}
	public function editViaje2()
	{
		$nameViaje=$this->input->post("nameViaje",true);
		//Jala de la base los campos del Viaje para llenar el formulario
		$data="";
		$this->load->view("Administrator/Viaje/editViaje2",$data);		
	}
	public function deleteViaje()
	{
		//Jala todos los Viajes de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Viaje/deleteViaje",$data);		
	}
	public function searchViaje()
	{
		//Jala de la base todos los Viajes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Viaje/searchViaje",$data);		
	}
	public function searchViaje2()
	{
		$nameViaje=$this->input->post("nameViaje",true);
		//Jala de la base los campos del Viaje para llenar el formulario
		$data="";
		$this->load->view("Administrator/Viaje/searchViaje2",$data);		
	}
	public function storeNewViaje()
	{
		$nameViaje=$this->input->post("nameViaje",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Viaje Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Viaje/newViaje",$data);
	}
	public function storeEditViaje()
	{
		$nameViaje=$this->input->post("nameViaje",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Viaje Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Viaje/editViaje",$data);
	}

}
