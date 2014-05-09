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
	//Funcion control_nueva_llanta llantas/llanta
    //----------------------------------------------------------------------------------//
	public function newWheel()
	{
		
		$this->load->view("Administrator/Wheel/newWheel");		
	}

	public function storeNewWheel()
	{
		$idllanta   =$this->input->post("idllanta"       ,true);
		$noSerie    =$this->input->post("noSerie"       ,true);
		$marca      =$this->input->post("marca"         ,true);
		$size       =$this->input->post("size"          ,true);
		
		$estado     =$this->input->post("estado"        ,true);
		$descripcion=$this->input->post("descripcion"   ,true);		
		$fechaCompra=$this->input->post("fechaCompra"   ,true);

		
		$this->buy_model->agregar_compra($idllanta,$noSerie,$marca,$size,$fechaCompra,$estado,$descripcion);

		$data['message']="<div class='text-center'><h4>Llanta Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Wheel/newWheel",$data);
	
	}
	//----------------------------------------------------------------------------------//

	//Funcion control_nueva_llanta llantas/llanta
	//----------------------------------------------------------------------------------//

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
	//----------------------------------------------------------------------------------//



	//Funcion control_borrado_llanta llantas/llanta
	//----------------------------------------------------------------------------------//


	public function deleteWheel()
	{
		//Jala todos los Llantas de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
			

		$this->load->model("buy_model");

		$data=$this->buy_model->load_wheels();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class="" >');
		$this->table->set_heading(' Serie ', ' Marca ',' Tamaño ',' Estado ','Fecha de Compra',' Fecha Asignacion','Fecha de Desecho','Descripcion','codigo de flota','Eliminar');
		foreach ($data as $llantas) 
		{
			$query=$this->db->query("SELECT idflota  FROM flota_llanta WHERE idllanta = '".$llantas["idllanta"]."'");
			$idflota = $query->result_array();

			$this->table->add_row($llantas["serie_llanta"], $llantas["marca_llanta"],$llantas["tamanio_llanta"],$llantas["estado_llanta"],$llantas["fecha_compra"],$llantas["fecha_asignacion"],$llantas["fecha_desecho"],$llantas["descripcion_llanta"],$idflota[0]['idflota'], ' <a id="student" style="color:#0D8CFB;font-weight: normal"  onclick="deletingWheel('.$llantas["idllanta"].');" href=# >'." X ".'</a>');


		}
		$this->table->set_template($plantilla);
		$info["tabla_loadWheels"] = $this->table->generate();

		$this->load->view("Administrator/Wheel/deleteWheel",$info);	
	}

	public function deletingWheel()
	{
		//obteniendo id del chofer a borrar 
		$idllanta=$this->input->post("nameWheel",true);
		$this->load->model("buy_model");
		$data=$this->buy_model->deleting_Wheels($idllanta);

		//div que indica borrado
		$data['message']="<div class='text-center'><h4>llanta desechada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/deleteWheel",$data);

	}

	//----------------------------------------------------------------------------------//

	//Funcion control_borrado_llanta llantas/llanta
	//----------------------------------------------------------------------------------//
	public function searchwheel()
  {
        $this->load->model("buy_model");
		$data=$this->buy_model->load_Wheels();
		$this->load->view("Administrator/Wheel/searchWheel",$data);
  }
  public function searchWheel2()
  {
    $nameWheel = $this->input->post("nameWheel",true);
    //Jala de la base los campos del llantas para llenar el formulario
    $this->load->model("buy_model");
    $data=$this->buy_model->load_wheel($nameWheel);


       $this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class="" >');
		$this->table->set_heading(' Serie ', ' Marca ',' Tamaño ',' Estado ','Fecha de Compra',' Fecha Asignacion','Fecha de Desecho','Descripcion','Codigo de flota');
		$query=$this->db->query("SELECT idflota  FROM flota_llanta WHERE idllanta = '".$data["idllanta"]."'");
		$idflota = $query->result_array();		
		$this->table->add_row($data["serie_llanta"], $data["marca_llanta"],$data["tamanio_llanta"],$data["estado_llanta"],$data["fecha_compra"],$data["fecha_asignacion"],$data["fecha_desecho"],$data["descripcion_llanta"],$idflota[0]["idflota"]);
		
		$this->table->set_template($plantilla);
		$info["tabla_searWheel"] = $this->table->generate();

    $this->load->view("Administrator/Wheel/searchWheel2",$info);    
  }

	//----------------------------------------------------------------------------------//
	
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

	public function getDataWheels()
    {
       // $this->load->model("chasis_model");
		$sequential= $this->buy_model->load_wheels();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['serie_llanta']; // add each user id to the array
	    }
        echo json_encode($array);
    }



}
