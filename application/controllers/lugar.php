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
		$this->load->model("lugar_model");
		$data=$this->lugar_model->lugars();

		//$this->lugar_model->eliminar_lugar($idlugar);
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
		$nombrelugar=$this->input->post("nombreLugar",true);
		$ciudad=$this->input->post("ciudad",true);
		$pais=$this->input->post("pais",true);
		
		$this->load->model("lugar_model");
		$idlugar=$this->lugar_model->buscar_lugar($nombrelugar);
		if(isset($idroute["idlugar"]))
		{
			$data['message']="<div class='text-center'><h4>Lugar Repetido</h4></div>";
				
		}
		else
		{
			$this->lugar_model->ingresar_lugar($nombrelugar,$ciudad,$pais);

			$data['message']="<div class='text-center'><h4>Ruta Agregada Exitosamente!</h4></div>";
		}
		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Lugar Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Lugar/newLugar",$data);
	}
	public function storeEditLugar()
	{
		$nombrelugar=$this->input->post("nombrelugar",true);
		$ciudad=$this->input->post("ciudad",true);
		$pais=$this->input->post("pais",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Lugar Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Lugar/editLugar",$data);
	}
}
