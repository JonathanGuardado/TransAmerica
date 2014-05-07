<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chofer extends CI_Controller {

	public function index()
	{
		
	}
	public function newChofer()
	{
		$this->load->view("Administrator/Chofer/newChofer");		
	}
	public function editChofer()
	{
		//Jala de la base todos los Chofers para llenarlos en un autocomplete
		$this->load->model("chofer_model");
		$data=$this->chofer_model->load_choferes();
		$this->load->view("Administrator/Chofer/editChofer",$data);		
	}
	public function editChofer2()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		//Jala de la base los campos del Chofer para llenar el formulario
		$this->load->model("chofer_model");
		$data=$data=$this->chofer_model->load_chofer($nameChofer);
		$this->load->view("Administrator/Chofer/editChofer2",$data);		
	}
	public function updateChofer()
	{
		//llamada del formulario cargado
		$nameChofer=$this->input->post("nameChofer",true);
		$surnameChofer=$this->input->post("surnameChofer",true);
		$dui=$this->input->post("dui",true);
		$nit=$this->input->post("nit",true);
		$fechaNac=$this->input->post("fechaNac",true);
		$estado=$this->input->post("estado",true);
		$this->load->model("chofer_model");
		$this->chofer_model->updating_chofer($nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$fechaIngreso,$estado);

		//div que muestre actualizacion



	}
	public function deleteChofer()
	{
		//Jala todos los Chofers de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Chofer/deleteChofer",$data);		
	}
	public function searchChofer()
	{
		//Jala de la base todos los Chofers para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Chofer/searchChofer",$data);		
	}
	public function searchChofer2()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		//Jala de la base los campos del Chofer para llenar el formulario
		$data="";
		$this->load->view("Administrator/Chofer/searchChofer2",$data);		
	}
	public function storeNewChofer()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		$surnameChofer=$this->input->post("surnameChofer",true);
		$dui=$this->input->post("dui",true);
		$nit=$this->input->post("nit",true);
		$fechaNac=$this->input->post("fechaNac",true);
		$estado=$this->input->post("estado",true);
		$time = time();
		$fechaIngreso = date('Y-m-d',$time);

		$this->load->model("chofer_model");
		$this->chofer_model->agregar_chofer($nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$fechaIngreso,$estado);

		$data['message']="<div class='text-center'><h4>Chofer Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/newChofer",$data);
	}
	public function storeEditChofer()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		$surnameChofer=$this->input->post("surnameChofer",true);
		$dui=$this->input->post("dui",true);
		$nit=$this->input->post("nit",true);
		$fechaNac=$this->input->post("fechaNac",true);
		$estado=$this->input->post("estado",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Chofer Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/editChofer",$data);
	}



}
