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
	public function showMantain()
	{
		$this->load->view("Administrator/content_mantain");		
	}
//Cliente
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
//Fin Cliente

//Route
	public function newRoute()
	{
		$this->load->view("Administrator/Route/newRoute");		
	}
	public function editRoute()
	{
		//Jala de la base todos los Rutas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Route/editRoute",$data);		
	}
	public function editRoute2()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		//Jala de la base los campos del Ruta para llenar el formulario
		$data="";
		$this->load->view("Administrator/Route/editRoute2",$data);		
	}
	public function deleteRoute()
	{
		//Jala todos los Rutas de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Route/deleteRoute",$data);		
	}
	public function searchRoute()
	{
		//Jala de la base todos los Rutas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Route/searchRoute",$data);		
	}
	public function searchRoute2()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		//Jala de la base los campos del Ruta para llenar el formulario
		$data="";
		$this->load->view("Administrator/Route/searchRoute2",$data);		
	}
	public function storeNewRoute()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		$origen=$this->input->post("origen",true);
		$destino=$this->input->post("destino",true);
		$tiempo=$this->input->post("tiempo",true);
		$distancia=$this->input->post("distancia",true);
		$gasolina=$this->input->post("gasolina",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Ruta Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Route/newRoute",$data);
	}
	public function storeEditRoute()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		$origen=$this->input->post("origen",true);
		$destino=$this->input->post("destino",true);
		$tiempo=$this->input->post("tiempo",true);
		$distancia=$this->input->post("distancia",true);
		$gasolina=$this->input->post("gasolina",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Ruta Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Route/editRoute",$data);
	}
//Fin Route
	
}
