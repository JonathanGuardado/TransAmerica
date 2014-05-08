<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends CI_Controller {

	public function index()
	{
		
	}

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

		$this->load->model("route_model");
		$idroute=$this->route_model->ingresar_route($nameRoute,$tiempo,$distancia,$gasolina);
		$id_or=$this->route_model->buscar_lugar($origen);
		$id_des=$this->route_model->buscar_lugar($destino);
		$this->route_model->ingresar_route_lugar($idroute["id_ruta"],$id_or["idlugar"],'O');
		$this->route_model->ingresar_route_lugar($idroute["id_ruta"],$id_des["idlugar"],'D');


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

}
