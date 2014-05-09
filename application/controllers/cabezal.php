<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cabezal extends CI_Controller {

	public function index()
	{
		
	}
	public function newCabezal()
	{
		$this->load->view("Administrator/Cabezal/newCabezal");		
	}
	public function editCabezal()
	{
		//Jala de la base todos los Cabezals para llenarlos en un autocomplete
		$this->load->model("cabezal_model");
		$data=$this->cabezal_model->load_cabezales();
		$this->load->view("Administrator/Cabezal/editCabezal",$data);		
	}
	public function editCabezal2()
	{
		$nameCabezal=$this->input->post("nameCabezal",true);
		//Jala de la base los campos del Cabezal para llenar el formulario
		$this->load->model("cabezal_model");
		$data=$data=$this->cabezal_model->load_cabezal($nameCabezal);
		$this->load->view("Administrator/Cabezal/editCabezal2",$data);		
	}
	public function deleteCabezal()
	{
		//Jala todos los Cabezals de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$this->load->model("cabezal_model");
		$data=$this->cabezal_model->load_cabezales();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Identificador', 'Marca','Kilometraje','Eliminar');
		foreach ($data as $estudiantes) 
		{
			$this->table->add_row($estudiantes["identificador"], $estudiantes["marca"],$estudiantes["kilometraje_actual"],' <a id="student" style="color:#0D8CFB;font-weight: normal"  onclick="deletingCabezal('.$estudiantes["idcabezal"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadCabezales"] = $this->table->generate();

		$this->load->view("Administrator/Cabezal/deleteCabezal",$info);		
	}
	public function deletingCabezal()
	{
		//obteniendo id del cabezal a borrar 
		$idCabezal=$this->input->post("idCabezal",true);
		$this->load->model("cabezal_model");
		$data=$this->cabezal_model->deleting_cabezal($idCabezal);

		//div que indica borrado
		$data['message']="<div class='text-center'><h4>Cabezal Borrado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Cabezal/deleteCabezal",$data);

	}
	public function searchCabezal()
	{
		//Jala de la base todos los Cabezals para llenarlos en un autocomplete
		$this->load->model("cabezal_model");
		$data=$this->cabezal_model->load_cabezales();
		$this->load->view("Administrator/Cabezal/searchCabezal",$data);		
	}
	public function searchCabezal2()
	{
		$nameCabezal=$this->input->post("nameCabezal",true);
		//Jala de la base los campos del Cabezal para llenar el formulario
		$this->load->model("cabezal_model");
		$data=$this->cabezal_model->load_cabezal($nameCabezal);


		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Identificador', 'Marca','Kilometraje');
		$this->table->add_row($data["identificador"], $data["marca"],$data["kilometraje_actual"]);
		$this->table->set_template($plantilla);
		$info["tabla_searchCabezal"] = $this->table->generate();
		$this->load->view("Administrator/Cabezal/searchCabezal2",$info);		
	}
	public function storeNewCabezal()
	{
		$identificador=$this->input->post("identificadorCabezal",true);
		$marca=$this->input->post("marca",true);
		$kmactual=$this->input->post("kilometraje",true);
		
		//Se almacena en la base de datos
		$this->load->model("cabezal_model");
		$this->cabezal_model->agregar_cabezal($identificador,$marca,$kmactual);

		$data['message']="<div class='text-center'><h4>Cabezal Agregado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Cabezal/newCabezal",$data);
	}
	public function storeEditCabezal()
	{
		$identificador=$this->input->post("identificadorCabezal",true);
		$marca=$this->input->post("marca",true);
		$kmactual=$this->input->post("kilometraje",true);
		$idCabezal=$this->input->post("idCabezal",true);

		//Se almacena en la base de datos
		$this->load->model("cabezal_model");
		$this->cabezal_model->updating_cabezal($idCabezal,$identificador,$marca,$kmactual);

		$data['message']="<div class='text-center'><h4>Cabezal Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Cabezal/editCabezal",$data);
	}
	public function getData()
        {
	        $this->load->model("cabezal_model");
			$sequential=$this->cabezal_model->load_cabezales();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['identificador']; // add each user id to the array
		    }
            echo json_encode($array);
        }
}
