<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lugar extends CI_Controller {

	public function index()
	{
		
	}
	public function newLugar()
	{
		$this->load->view("Administrator/Lugar/newLugar");		
	}
	public function editLugar()
	{
		//Jala de la base todos los Lugars para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Lugar/editLugar",$data);		
	}
	public function editLugar2()
	{
		$nameLugar=$this->input->post("nameLugar",true);
		//Jala de la base los campos del Lugar para llenar el formulario
		$data="";
		$this->load->view("Administrator/Lugar/editLugar2",$data);		
	}
	public function deleteLugar()
	{
		//Jala todos los Lugars de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Lugar/deleteLugar",$data);		
	}
	public function searchLugar()
	{
		//Jala de la base todos los Lugars para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Lugar/searchLugar",$data);		
	}
	public function searchLugar2()
	{
		$nameLugar=$this->input->post("nameLugar",true);
		//Jala de la base los campos del Lugar para llenar el formulario
		$data="";
		$this->load->view("Administrator/Lugar/searchLugar2",$data);		
	}
	public function storeNewLugar()
	{
		$fechaLugar=$this->input->post("fechaLugar",true);
		$noWheel=$this->input->post("noWheel",true);
		$descripcion=$this->input->post("descripcion",true);
		

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Lugar Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Lugar/newLugar",$data);
	}
	public function storeEditLugar()
	{
		$fechaLugar=$this->input->post("fechaLugar",true);
		$noWheel=$this->input->post("noWheel",true);
		$descripcion=$this->input->post("descripcion",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Lugar Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Lugar/editLugar",$data);
	}
}
