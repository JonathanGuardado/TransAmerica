<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenedor extends CI_Controller {

	public function index()
	{
		
	}
	public function newContenedor()
	{
		$this->load->view("Administrator/Contenedor/newContenedor");		
	}
	public function editContenedor()
	{
		//Jala de la base todos los Contenedors para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Contenedor/editContenedor",$data);		
	}
	public function editContenedor2()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		//Jala de la base los campos del Contenedor para llenar el formulario
		$this->load->model("contenedor_model");
		$data=$this->contenedor_model->load_contenedor($nameContenedor);
		$this->load->view("Administrator/Contenedor/editContenedor2",$data);		
	}
	public function deleteContenedor()
	{
		//Jala todos los Contenedors de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		
		$this->load->model("contenedor_model");
		$data=$this->contenedor_model->load_contenedores();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class="">');
		$this->table->set_heading('Descripcion Contenedor', 'Tipo contenedor','Eliminar');
		foreach ($data as $dato) 
		{
			$this->table->add_row($dato["descripcion_contenedor"], $dato["tipo_contenedor"], ' <a style="color:#0D8CFB;font-weight: normal" class="delete" data-controller="contenedor" data-method="deletingContenedor"  onclick="deleteData('.$dato["idcontenedor"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadContenedores"] = $this->table->generate();

		$this->load->view("Administrator/Contenedor/deleteContenedor",$info);		
	}
	public function deletingContenedor()
	{
		//obteniendo id del contenedor a borrar 
		$idContenedor=$this->input->post("id",true);
		$this->load->model("contenedor_model");
		$data=$this->contenedor_model->deleting_contenedor($idContenedor);
		$this->deleteContenedor();
		//div que indica borrado
		//$data['message']="<div class='text-center'><h4>Contenedor Borrado Exitosamente!</h4></div>";
		//$this->load->view("Administrator/Contenedor/deleteContenedor",$data);

	}
	public function searchContenedor()
	{
		//Jala de la base todos los Contenedors para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Contenedor/searchContenedor",$data);		
	}
	public function searchContenedor2()
	{
		$nameContenedor=$this->input->post("nameContenedor",true);
		//Jala de la base los campos del Contenedor para llenar el formulario
		
		$this->load->model("contenedor_model");

		$data=$this->contenedor_model->load_contenedor($nameContenedor);


		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Descripcion Contenedor', 'Tipo Contenedor');
		$this->table->add_row($data["descripcion_contenedor"], $data["tipo_contenedor"]);
		$this->table->set_template($plantilla);
		$info["tabla_searchContenedor"] = $this->table->generate();

		$this->load->view("Administrator/Contenedor/searchContenedor2",$info);		
	}
	public function storeNewContenedor()
	{
		$tipoContenedor=$this->input->post("tipoContenedor",true);
		$descripcion=$this->input->post("descripcion",true);


		//Se almacena en la base de datos
		$this->load->model("contenedor_model");
		$data=$this->contenedor_model->newContenedor($tipoContenedor,$descripcion);

		$data['message']="<div class='text-center'><h4>Contenedor Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Contenedor/newContenedor",$data);
	}
	public function storeEditContenedor()
	{
		$tipoContenedor=$this->input->post("tipoContenedor",true);
		$descripcion=$this->input->post("descripcion",true);
		$idContenedor=$this->input->post("idContenedor",true);

		//Se almacena en la base de datos
		$this->load->model("contenedor_model");
		$this->contenedor_model->updating_contenedor($idContenedor,$tipoContenedor,$descripcion);

		$data['message']="<div class='text-center'><h4>Contenedor Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Contenedor/editContenedor",$data);
	}
	public function getData()
        {
	        $this->load->model("contenedor_model");
			$sequential=$this->contenedor_model->load_contenedores();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['tipo_contenedor']; // add each user id to the array
		    }
            echo json_encode($array);
        }



}
