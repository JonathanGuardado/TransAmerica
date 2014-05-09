<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wheel extends CI_Controller {

	public function __construct()
   {
      parent::__construct();
      $this->load->model("buy_model");
   }

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

		//$data="";
		$this->load->view("Administrator/Wheel/editWheel");		
	}
	public function editWheel2()
	{
		$nameWheel=$this->input->post("nameWheel",true);
		//Jala de la base los campos del Llanta para llenar el formulario


		$data= $this->buy_model->load_wheels_id($nameWheel);
		$this->load->view("Administrator/Wheel/editWheel2",$data);		
	}
	public function deleteWheel()
	{
		//Jala todos los Llantas de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
			

		$this->load->model("buy_model");

		$data=$this->buy_model->load_wheels();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading(' Serie ', ' marca ',' Tamaño ',' Estado ','Fecha de Compra',' Fecha asignacion','fecha de desecho','codigo de flota','descripcion llanta','Eliminar');
		foreach ($data as $llantas) 
		{
			$query=$this->db->query("SELECT idflota  FROM flota_llanta WHERE idllanta = '".$llantas["idllanta"]."'");
			$idflota = $query->result_array();


			
			$this->table->add_row($llantas["serie_llanta"], $llantas["marca_llanta"],$llantas["tamanio_llanta"],$llantas["estado_llanta"],$llantas["fecha_compra"],$llantas["fecha_asignacion"],$llantas["fecha_desecho"],$idflota[0]["idflota"],$llantas["descripcion_llanta"], ' <a id="student" style="color:#0D8CFB;font-weight: normal"  onclick="deletingWheel('.$llantas["idllanta"].');" href=# >'." X ".'</a>');


		}
		$this->table->set_template($plantilla);
		$info["tabla_loadWheels"] = $this->table->generate();

		$this->load->view("Administrator/Wheel/deleteWheel",$info);	
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
		$noSerie    =$this->input->post("noSerie"       ,true);
		$marca      =$this->input->post("marca"         ,true);
		$size       =$this->input->post("size"          ,true);
		
		$estado     =$this->input->post("estado"        ,true);
		$descripcion=$this->input->post("descripcion"   ,true);		
		$fechaCompra=$this->input->post("fechaCompra"   ,true);

		
		$this->buy_model->agregar_compra($noSerie,$marca,$size,$fechaCompra,$estado,$descripcion);

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
		$this->buy_model->updating_wheel($noSerie,$marca,$size,$estado,$fechaCompra,$descripcion);

		$data['message']="<div class='text-center'><h4>Llanta Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Wheel/editWheel",$data);
	}



}
