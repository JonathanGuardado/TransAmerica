<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wheel extends CI_Controller {

	public function index()
	{
		
	}
	public function newWheel()
	{
		$this->load->view("Administrator/Wheel/newWheel");		
	}
	public function editWheel()
	{
		//Jala de la base todos los Llantas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Wheel/editWheel",$data);		
	}
	public function editWheel2()
	{
		$nameWheel=$this->input->post("nameWheel",true);
		//Jala de la base los campos del Llanta para llenar el formulario
		$data="";
		$this->load->view("Administrator/Wheel/editWheel2",$data);		
	}
	public function deleteWheel()
	{
		//Jala todos los Llantas de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Wheel/deleteWheel",$data);		
	}
	public function searchWheel()
	{
		//Jala de la base todos los Llantas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Wheel/searchWheel",$data);		
	}
	public function searchWheel2()
	{
		$nameWheel=$this->input->post("nameWheel",true);
		//Jala de la base los campos del Llanta para llenar el formulario
		$data="";
		$this->load->view("Administrator/Wheel/searchWheel2",$data);		
	}
	public function storeNewWheel()
	{
		$noSerie=$this->input->post("noSerie",true);
		$marca=$this->input->post("marca",true);
		$size=$this->input->post("size",true);
		$estado=$this->input->post("estado",true);
		$fechaCompra=$this->input->post("fechaCompra",true);
		$descripcion=$this->input->post("descripcion",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Llanta Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Wheel/newWheel",$data);
	}
	public function storeEditWheel()
	{
		$noSerie=$this->input->post("noSerie",true);
		$marca=$this->input->post("marca",true);
		$size=$this->input->post("size",true);
		$estado=$this->input->post("estado",true);
		$fechaCompra=$this->input->post("fechaCompra",true);
		$descripcion=$this->input->post("descripcion",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Llanta Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Wheel/editWheel",$data);
	}



}
