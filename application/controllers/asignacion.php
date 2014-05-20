<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignacion extends CI_Controller {

	public function __construct()
   	{
      parent::__construct();
      $this->load->model("asignar_model");
      $this->load->model("buy_model");
   	}

	public function index()
	{
		$this->load->view("Administrator/Asignacion/asignacionWheel");	
	}
	public function storeNewAsignacion()
	{
		$fechaAsignacion=$this->input->post("fechaAsignacion",true);
		$noUnit=$this->input->post("noUnit",true);
		$noWheel=$this->input->post("noWheel",true);
		$descripcion=$this->input->post("descripcion",true);

		//Almacenamos en la base la asignacion de la llanta
		$this->load->model("asignar_model");
		$this->asignar_model->asignar_unidad($fechaAsignacion,$noUnit,$noWheel,$descripcion);

		$data['message']="<div class='text-center'><h4>llanta asignada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Asignacion/asignacionWheel",$data);	
		
	}

    public function getDataWheels()
    {
       // $this->load->model("chasis_model");
		$sequential= $this->asignar_model->load_wheels();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['idllanta']; // add each user id to the array
	    }
        echo json_encode($array);
    }
}
