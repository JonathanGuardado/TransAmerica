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
	
	public function deleteChofer()
	{
		//Jala todos los Chofers de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee

		$this->load->model("chofer_model");
		$data=$this->chofer_model->load_choferes();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table  class="table">');
		$this->table->set_heading('Nombre Conductor', 'Apellido Conductor',' Dui ',' Nit ','Fecha Ingreso','Eliminar');
		foreach ($data as $dato) 
		{
			$this->table->add_row($dato["nombre_conductor"], $dato["apellido_conductor"],$dato["dui"],$dato["nit"],$dato["fecha_ingreso_cond"], ' <a style="color:#0D8CFB;font-weight: normal" class="delete" data-controller="chofer" data-method="deletingChofer"  onclick="deleteData('.$dato["idconductor"].');"  href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadChofers"] = $this->table->generate();

		$this->load->view("Administrator/Chofer/deleteChofer",$info);		
	}
	public function deletingChofer()
	{
		//obteniendo id del chofer a borrar 
		$idChofer=$this->input->post("id",true);
		$this->load->model("chofer_model");
		$data=$this->chofer_model->deleting_chofer($idChofer);
		$this->deleteChofer();
		//div que indica borrado
		//$data['message']="<div class='text-center'><h4>Chofer Borrado Exitosamente!</h4></div>";
		//$this->load->view("Administrator/Chofer/deleteChofer",$data);

	}
	public function searchChofer()
	{
		//Jala de la base todos los Chofers para llenarlos en un autocomplete
		$this->load->model("chofer_model");
		$data=$this->chofer_model->load_choferes();
		$this->load->view("Administrator/Chofer/searchChofer",$data);		
	}
	public function searchChofer2()
	{
		$nameChofer=$this->input->post("nameChofer",true);
		//Jala de la base los campos del Chofer para llenar el formulario
		$this->load->model("chofer_model");
		$data=$this->chofer_model->load_chofer($nameChofer);


		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Nombre Conductor', 'Apellido Conductor',' Dui ',' Nit ','Fecha Ingreso');
		$this->table->add_row($data["nombre_conductor"], $data["apellido_conductor"],$data["dui"],$data["nit"],$data["fecha_ingreso_cond"]);
		$this->table->set_template($plantilla);
		$info["tabla_searchChofer"] = $this->table->generate();

		$this->load->view("Administrator/Chofer/searchChofer2",$info);		
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

		//Se almacena en la base de datos
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
		$idChofer=$this->input->post("idChofer",true);

		//Se almacena en la base de datos
		$this->load->model("chofer_model");
		$this->chofer_model->updating_chofer($idChofer,$nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$estado);

		$data['message']="<div class='text-center'><h4>Chofer Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/editChofer",$data);
	}

	public function getData()
        {
	        $this->load->model("chofer_model");
			$sequential=$this->chofer_model->load_choferes();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['nombre_conductor']; // add each user id to the array
		    }
            echo json_encode($array);
        }



}
