<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function index()
	{
		
	}
	public function newUnit()
	{
		$this->load->view("Administrator/Unit/newUnit");	
		//Se deben enviar 3 autocomplete para NoChasis, NoContenedor, Nombreunit, NoCabezal	
	}
	public function editUnit()
	{
		//Jala de la base todos los Unidads para llenarlos en un autocomplete

		$this->load->model("unit_model");
		$data=$this->unit_model->load_unites();
		$this->load->view("Administrator/Unit/editUnit",$data);		
	}
	public function editUnit2()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		//Jala de la base los campos del Unidad para llenar el formulario
		$this->load->model("unit_model");
		$data=$this->unit_model->load_unit($nameUnit);
		$this->load->view("Administrator/Unit/editUnit2",$data);		
	}
	public function deleteUnit()
	{
		//Jala todos los Unidads de la base para mostrarlos en una tabla y el usuario pueda eliminar el que desee
		$this->load->model("unit_model");
		$data=$this->unit_model->load_unites();

		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Placa Chasis', 'No Contenedor','Identificador Cabezal','Nombre Chofer','Eliminar');
		foreach ($data as $estudiantes) 
		{
			$this->table->add_row($estudiantes["placa"], $estudiantes["nocontenedor"],$estudiantes["identificador"],$estudiantes["nombreconductor"], ' <a id="student" style="color:#0D8CFB;font-weight: normal"  onclick="deletingChofer('.$estudiantes["idflota"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadUnits"] = $this->table->generate();



		$this->load->view("Administrator/Unit/deleteUnit",$info);		
	}
	public function deletingUnit()
	{
		//obteniendo id del chofer a borrar
		$idFlota=$this->input->post("idFlota",true);
		$this->load->model("unit_model");
		$data=$this->chofer_model->deleting_unit($idFlota);

		//div que indica borrado
		$data['message']="<div class='text-center'><h4>Chofer Borrado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Chofer/deleteChofer",$data);

	}
	public function searchUnit()
	{
		//Jala de la base todos los Unidads para llenarlos en un autocomplete
		$this->load->model("unit_model");
		$data=$this->unit_model->load_unites();
		$this->load->view("Administrator/Unit/searchUnit",$data);		
	}
	public function searchUnit2()
	{
		$nameUnit=$this->input->post("nameUnit",true);
		//Jala de la base los campos del Unidad para llenar el formulario
		$this->load->model("unit_model");
		$data=$this->unit_model->load_unit($nameUnit);


		//tabla
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table border="2" cellpadding="5" cellspacing="5"  class=""');
		$this->table->set_heading('Placa Chasis', 'No Contenedor','Identificador Cabezal','Nombre Chofer');
		$this->table->add_row($data["placa"], $data["tipo_contenedor"],$data["identificador"],$data["nombre_conductor"]);
		$this->table->set_template($plantilla);
		$info["tabla_searchUnit"] = $this->table->generate();
		$this->load->view("Administrator/Unit/searchUnit2",$info);		
	}
	public function storeNewUnit()
	{

		$noChasis=$this->input->post("noChasis",true);
		$noContenedor=$this->input->post("noContenedor",true);
		$noCabezal=$this->input->post("noCabezal",true);
		$nameChofer=$this->input->post("nameChofer",true);
		//Se almacena en la base de datos
		$this->load->model("unit_model");
		$idChasis=$this->unit_model->load_idChasis($noChasis);
		$idContenedor=$this->unit_model->load_idContenedor($noContenedor);
		$idCabezal=$this->unit_model->load_idCabezal($noCabezal);
		$idChofer=$this->unit_model->load_idChofer($nameChofer);
		$this->unit_model->agregar_unit($idChasis["idchasis"],$idContenedor["idcontenedor"],$idCabezal["idcabezal"],$idChofer["idconductor"]);

		$data['message']="<div class='text-center'><h4>Unidad Agregada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Unit/newUnit",$data);
	}
	public function storeEditUnit()
	{
		$noChasis=$this->input->post("noChasis",true);
		$noContenedor=$this->input->post("noContenedor",true);
		$noCabezal=$this->input->post("noCabezal",true);
		$nameChofer=$this->input->post("nameChofer",true);
		$idFlota=$this->input->post("idFlota",true);
		$idChasis=$this->input->post("idChasis",true);
		$idContenedor=$this->input->post("idContenedor",true);
		$idCabezal=$this->input->post("idCabezal",true);
		$idChofer=$this->input->post("idConductor",true);
		//Se almacena en la base de datos

		$this->load->model("unit_model");
		$this->unit_model->updating_unit_chasis($idChasis,$noChasis);
		$this->unit_model->updating_unit_contenedor($idContenedor,$noContenedor);
		$this->unit_model->updating_unit_cabezal($idCabezal,$noCabezal);
		$this->unit_model->updating_unit_chofer($idChofer,$nameChofer);
		$data['message']="<div class='text-center'><h4>Unidad Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Unit/editUnit",$data);
	}

	public function getData()
        {
	        $this->load->model("unit_model");
			$sequential=$this->chasis_model->load_unites();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['idflota']; // add each user id to the array
		    }
            echo json_encode($array);
        }
   public function getData2()
        {
	        $this->load->model("unit_model");
			$sequential=$this->chasis_model->load_placas_chasis();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['placa']; // add each user id to the array
		    }
            echo json_encode($array);
        }
   public function getData3()
        {
	        $this->load->model("unit_model");
			$sequential=$this->chasis_model->load_identificador_contenedor();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['tipo_contenedor']; // add each user id to the array
		    }
            echo json_encode($array);
        }
   public function getData4()
        {
	        $this->load->model("unit_model");
			$sequential=$this->chasis_model->load_identificador_cabezal();
			$array = array();

		    foreach($sequential as $row)
		    {
		        $array[] = $row['identificador']; // add each user id to the array
		    }
            echo json_encode($array);
        }
}
