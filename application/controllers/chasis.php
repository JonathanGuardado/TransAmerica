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
		$this->load->model("chasis_model");
		$data=$data=$this->chasis_model->load_chasis($nameChasis);
		$this->load->view("Administrator/Chasis/editChasis2",$data);		
	}
	public function deleteChasis()
	{
		//Jala todos los Chasiss de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		
		$this->load->model("chasis_model");
		$data=$this->chasis_model->load_all_chasis();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Placa', 'Marca','Descripcion','Eliminar');
		foreach ($data as $estudiantes) 
		{
			$this->table->add_row($estudiantes["placa"], $estudiantes["marca"],$estudiantes["descripcion"], ' <a id="student" style="color:#0D8CFB;font-weight: normal"  onclick="deletingChasis('.$estudiantes["idchasis"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadChasis"] = $this->table->generate();


		$this->load->view("Administrator/Chasis/deleteChasis",$info);		
	}
	public function deletingChasis()
	{
		//obteniendo id del chasis a borrar 
		$idChasis=$this->input->post("idChasis",true);
		$this->load->model("chasis_model");
		$data=$this->chasis_model->deleting_chasis($idChasis);

		//div que indica borrado
		$data['message']="<div class='text-center'><h4>Chasis Borrado Exitosamente!</h4></div>";
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
		
		$this->load->model("chasis_model");

		$data=$this->chasis_model->load_chasis($nameChasis);


		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Placa', 'Marca','Descripcion');
		$this->table->add_row($data["placa"], $data["marca"],$data["descripcion"]);
		$this->table->set_template($plantilla);
		$info["tabla_searchChasis"] = $this->table->generate();


		$this->load->view("Administrator/Chasis/searchChasis2",$info);		
	}
	public function storeNewChasis()
	{
		//$nameChasis=$this->input->post("nameChasis",true);
		//$nameContact=$this->input->post("nameContact",true);
		//$phoneContact=$this->input->post("phoneContact",true);
		//$tarifa=$this->input->post("tarifa",true);

		$marcaChasis= $this->input->post("marca",true);
		$descripcionChasis= $this->input->post("descripcion",true);
		$placaChasis=$this->input->post("placa",true);
		//Se almacena en la base de datos
		$this->load->model("chasis_model");
		$data=$this->chasis_model->newChasis($marcaChasis,$descripcionChasis,$placaChasis);

		$data['message']="<div class='text-center'><h4>Chasis Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chasis/newChasis",$data);
	}
	public function storeEditChasis()
	{
		//$nameChasis=$this->input->post("nameChasis",true);
		//$nameContact=$this->input->post("nameContact",true);
		//$phoneContact=$this->input->post("phoneContact",true);
		//$tarifa=$this->input->post("tarifa",true);

		$marcaChasis= $this->input->post("marca",true);
		$descripcionChasis= $this->input->post("descripcion",true);
		$placaChasis=$this->input->post("placa",true);
		$idChasis= $this->input->post("idChasis",true);

		
		$this->load->model("chasis_model");
		$this->chasis_model->updating_chasis($idChasis,$marcaChasis,$descripcionChasis,$placaChasis);

		$data['message']="<div class='text-center'><h4>Chasis Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chasis/editChasis",$data);
	}
    public function getData()
    {
        $this->load->model("chasis_model");
		$sequential=$this->chasis_model->load_all_chasis();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['placa']; // add each user id to the array
	    }
        echo json_encode($array);
    }



}
