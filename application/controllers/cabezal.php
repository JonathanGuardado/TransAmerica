<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabezal extends CI_Controller {

	public function index()
	{
		
	}
	public function newCabezal()
	{
		$this->load->view("Administrator/Cabezal/newCabezal");		
	}
	public function editCabezal()
	{
		//Jala de la base todos los Cabezals para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Cabezal/editCabezal",$data);		
	}
	public function editCabezal2()
	{
		$nameCabezal=$this->input->post("nameCabezal",true);
		//Jala de la base los campos del Cabezal para llenar el formulario
		$data="";
		$this->load->view("Administrator/Cabezal/editCabezal2",$data);		
	}
	public function deleteCabezal()
	{
		//Jala todos los Cabezals de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Cabezal/deleteCabezal",$data);		
	}
	public function searchCabezal()
	{
		//Jala de la base todos los Cabezals para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Cabezal/searchCabezal",$data);		
	}
	public function searchCabezal2()
	{
		$nameCabezal=$this->input->post("nameCabezal",true);
		//Jala de la base los campos del Cabezal para llenar el formulario
		$data="";
		$this->load->view("Administrator/Cabezal/searchCabezal2",$data);		
	}
	public function storeNewCabezal()
	{
		$identificador=$this->input->post("fechaCabezal",true);
		$marca=$this->input->post("noWheel",true);
		$kmactual=$this->input->post("descripcion",true);
		

		//Se almacena en la base de datos
		//Se almacena en la base de datos
		$this->load->model("cabezal_model");
		$this->cabezal_model->agregar_cabezal($identificador,$marca,$kmactual);

		$data['message']="<div class='text-center'><h4>Cabezal Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Cabezal/newCabezal",$data);
	}
	public function storeEditCabezal()
	{
		$fechaCabezal=$this->input->post("fechaCabezal",true);
		$noWheel=$this->input->post("noWheel",true);
		$descripcion=$this->input->post("descripcion",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Cabezal Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Cabezal/editCabezal",$data);
	}
}
