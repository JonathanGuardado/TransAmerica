<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chasis extends CI_Controller {

	public function index()
	{
		
	}
	public function newChasis()
	{
		$this->load->view("Administrator/Chasis/newChasis");		
	}
	public function editChasis()
	{
		//Jala de la base todos los Chasiss para llenarlos en un autocomplete
		$data='';
		$this->load->view("Administrator/Chasis/editChasis",$data);		
	}
	public function editChasis2()
	{
		$nameChasis=$this->input->post("nameChasis",true);
		//Jala de la base los campos del Chasis para llenar el formulario
		$data="";
		$this->load->view("Administrator/Chasis/editChasis2",$data);		
	}
	public function deleteChasis()
	{
		//Jala todos los Chasiss de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$data="";
		$this->load->view("Administrator/Chasis/deleteChasis",$data);		
	}
	public function searchChasis()
	{
		//Jala de la base todos los Chasiss para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Chasis/searchChasis",$data);		
	}
	public function searchChasis2()
	{
		$nameChasis=$this->input->post("nameChasis",true);
		//Jala de la base los campos del Chasis para llenar el formulario
		$data="";
		$this->load->view("Administrator/Chasis/searchChasis2",$data);		
	}
	public function storeNewChasis()
	{
		//$nameChasis=$this->input->post("nameChasis",true);
		//$nameContact=$this->input->post("nameContact",true);
		//$phoneContact=$this->input->post("phoneContact",true);
		//$tarifa=$this->input->post("tarifa",true);

		$estadoChasis= $this->input->post("estado",true);
		$descripcionChasis= $this->input->post("descripcion",true);
		//Se almacena en la base de datos
		$this->load->model("chasis_model");
		$data=$this->chasis_model->newChasis($estadoChasis,$descripcionChasis);

		$data['message']="<div class='text-center'><h4>Chasis Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chasis/newChasis",$data);
	}
	public function storeEditChasis()
	{
		//$nameChasis=$this->input->post("nameChasis",true);
		//$nameContact=$this->input->post("nameContact",true);
		//$phoneContact=$this->input->post("phoneContact",true);
		//$tarifa=$this->input->post("tarifa",true);

		$estadoChasis= $this->input->post("estado",true);
		$descripcionChasis= $this->input->post("descripcion",true);

		//Se almacena en la base de datos
		$this->load->model("chasis");

		$data['message']="<div class='text-center'><h4>Chasis Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chasis/editChasis",$data);
	}
        public function getData(){
            $sequential = array("foo", "bar", "baz", "blong");
            echo json_encode($sequential);
        }



}
