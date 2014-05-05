<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenedor extends CI_Controller {

	public function index()
	{
		
	}
	public function newContenedor()
	{
		$this->load->view("Administrator/Contenedor/newContenedor");		
	}
	public function editContenedor()
	{
		//Jala de la base todos los Contenedors para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Contenedor/editContenedor",$data);		
	}
	public function editContenedor2()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		//Jala de la base los campos del Contenedor para llenar el formulario
		$data="";
		$this->load->view("Administrator/Contenedor/editContenedor2",$data);		
	}
	public function deleteContenedor()
	{
		//Jala todos los Contenedors de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Contenedor/deleteContenedor",$data);		
	}
	public function searchContenedor()
	{
		//Jala de la base todos los Contenedors para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Contenedor/searchContenedor",$data);		
	}
	public function searchContenedor2()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		//Jala de la base los campos del Contenedor para llenar el formulario
		$data="";
		$this->load->view("Administrator/Contenedor/searchContenedor2",$data);		
	}
	public function storeNewContenedor()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Contenedor Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Contenedor/newContenedor",$data);
	}
	public function storeEditContenedor()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Contenedor Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Contenedor/editContenedor",$data);
	}



}
