<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function index()
	{
		
	}
	public function newUnit()
	{
		$this->load->view("Administrator/Unit/newUnit");		
	}
	public function editUnit()
	{
		//Jala de la base todos los Unidads para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Unit/editUnit",$data);		
	}
	public function editUnit2()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		//Jala de la base los campos del Unidad para llenar el formulario
		$data="";
		$this->load->view("Administrator/Unit/editUnit2",$data);		
	}
	public function deleteUnit()
	{
		//Jala todos los Unidads de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Unit/deleteUnit",$data);		
	}
	public function searchUnit()
	{
		//Jala de la base todos los Unidads para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Unit/searchUnit",$data);		
	}
	public function searchUnit2()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		//Jala de la base los campos del Unidad para llenar el formulario
		$data="";
		$this->load->view("Administrator/Unit/searchUnit2",$data);		
	}
	public function storeNewUnit()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Unidad Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Unit/newUnit",$data);
	}
	public function storeEditUnit()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Unidad Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Unit/editUnit",$data);
	}



}
