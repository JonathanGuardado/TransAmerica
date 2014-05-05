<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index()
	{
		
	}

	public function newClient()
	{
		$this->load->view("Administrator/Client/newClient");		
	}
	public function editClient()
	{
		//Jala de la base todos los clientes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Client/editClient",$data);		
	}
	public function editClient2()
	{
		$nameClient=$this->input->post("nameClient",true);
		//Jala de la base los campos del cliente para llenar el formulario
		$data="";
		$this->load->view("Administrator/Client/editClient2",$data);		
	}
	public function deleteClient()
	{
		//Jala todos los clientes de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Client/deleteClient",$data);		
	}
	public function searchClient()
	{
		//Jala de la base todos los clientes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Client/searchClient",$data);		
	}
	public function searchClient2()
	{
		$nameClient=$this->input->post("nameClient",true);
		//Jala de la base los campos del cliente para llenar el formulario
		$data="";
		$this->load->view("Administrator/Client/searchClient2",$data);		
	}
	public function storeNewClient()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Cliente Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Client/newClient",$data);
	}
	public function storeEditClient()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Cliente Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Client/editClient",$data);
	}



}
