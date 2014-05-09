<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reencauche extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      $this->load->model("reencauche_model");
   }

	public function index()
	{
		
	}
	public function newReencauche()
	{
		$this->load->view("Administrator/Reencauche/newReencauche");		
	}
	public function editReencauche()
	{
		//Jala de la base todos los Reencauches para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Reencauche/editReencauche",$data);		
	}
	public function editReencauche2()
	{
		$nameReencauche=$this->input->post("nameReencauche",true);
		//Jala de la base los campos del Reencauche para llenar el formulario
		$data=$this->reencauche_model->load_reencauche_id($nameReencauche);


		$this->load->view("Administrator/Reencauche/editReencauche2",$data);		
	}
	public function deleteReencauche()
	{
		$data= $this->reencauche_model->load_Reencauche();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Id LLanta', 'Fecha de Reencauche','Lugar','Costo','Observaciones');
		foreach ($data as $dato) 
		{
			$this->table->add_row($dato["idllanta"], $dato["fecha_reencauche"],$dato["lugar_reencauche"],$dato["total_reencauche"],$dato["observacion_re"],' <a style="color:#0D8CFB;font-weight: normal"  class="delete" data-controller="" data-method="deletingCabezal" onclick="deleteData('.$dato["idllanta"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadReencauche"] = $this->table->generate();


		//segui el formato de ever en sus controladores a la hora de eliminar
		$this->load->view("Administrator/Reencauche/deleteReencauche",$info);		
	}
	public function searchReencauche()
	{
		//Jala de la base todos los Reencauches para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Reencauche/searchReencauche",$data);		
	}
	public function searchReencauche2()
	{
		$nameReencauche=$this->input->post("nameReencauche",true);
		//Jala de la base los campos del Reencauche para llenar el formulario

		$data= $this->reencauche_model->load_reencauche_id($nameReencauche);

		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Id LLanta', 'Fecha de Reencauche','Lugar','Costo','Observaciones');
		$this->table->add_row($data["idllanta"], $data["fecha_reencauche"],$data["lugar_reencauche"],$data["total_reencauche"],$data["observacion_re"]);
		$this->table->set_template($plantilla);
		$info["tabla_loadReencauche"] = $this->table->generate();	

		
		$this->load->view("Administrator/Reencauche/searchReencauche2",$info);		
	}
	public function storeNewReencauche()
	{
		$idllanta=$this->input->post("idllanta",true);
		$fechaReencauche=$this->input->post("fechaReencauche",true);
		$lugar=$this->input->post("place",true);
		$observacion =$this->input->post("descripcion",true);
		$costo =$this->input->post("costo",true);

		//Se almacena en la base de datos

		$this->reencauche_model->agregar_reencauche($idllanta,$fechaReencauche,$lugar,$costo,$observacion);

		$data['message']="<div class='text-center'><h4>Reencauche Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Reencauche/newReencauche",$data);
	}
	public function storeEditReencauche()
	{
		$fechaReencauche=$this->input->post("fechaReencauche",true);
		$noWheel =$this->input->post("noWheel",true);
		$descripcion =$this->input->post("descripcion",true);
		$costo =$this->input->post("costo",true);
		$lugar=$this->input->post("lugar",true);


		//Se almacena en la base de datos

		$data = $this->reencauche_model->updating_reencauche($noWheel,$fechaReencauche,$lugar,$costo,$descripcion);

		$data['message']="<div class='text-center'><h4>Reencauche Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Reencauche/editReencauche",$data);
	}

	public function getDataReencauche()
    {
       // $this->load->model("chasis_model");
		$sequential= $this->reencauche_model->load_Reencauche();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['idllanta']; // add each user id to the array
	    }
        echo json_encode($array);
    }



}
