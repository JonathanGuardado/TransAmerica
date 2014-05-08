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
		$data="";
		$this->load->view("Administrator/Wheel/deleteWheel",$data);		
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
		$unit_price =$this->input->post("precioUnitario",true);
		$iva        =$this->input->post("iva"           ,true);
		$totalprice =$this->input->post("precioTotal"   ,true);
		$fechaCompra=$this->input->post("fechaCompra"   ,true);
		$proveedores=$this->input->post("proveedor "    ,true);
		$estado     =$this->input->post("estado"        ,true);
		$descripcion=$this->input->post("descripcion"   ,true);		

		$query= $this->db->query("SELECT id_proveedor FROM proveedor_llanta WHERE nombre_proveedor="+$proveedores);//en regla
        

		$no_llanta='abc456';

		$data = $query->result_array();
		//Se almacena en la base de datos
		
		if(mysql_num_rows($query->result_array() === 0))
		{
			$data['message']="<div class='text-center'><h4>proveedor no existe</h4></div>";
			$this->load->view("Administrator/Wheel/newWheel",$data);
		}
		else
		{


		
		$this->buy_model->agregar_compra($noSerie,$marca,$size,$unit_price,$iva,$totalprice,$fechaCompra,$proveedores,$estado,$descripcion);

		$data['message']="<div class='text-center'><h4>Llanta Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Wheel/newWheel",$data);
	}
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
