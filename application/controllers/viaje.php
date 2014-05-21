<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viaje extends CI_Controller {

	public function index()
	{
		
	}
	public function newViaje()
	{
		$this->load->view("Administrator/Viaje/newViaje");		
	}
	
	public function editViaje()
	{
		//Jala de la base todos los Viajes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Viaje/editViaje",$data);		
	}
	public function editViaje2()
	{
		$nameviaje=$this->input->post("nameViaje",true);
		$this->load->model("viaje_model");
		$data=$data=$this->viaje_model->buscar_viaje($nameviaje);

		$a=$this->viaje_model->buscar_cliente3($data["idcliente"]);
		$data["cliente"]=$a["nombre_empresa"];

		$a=$this->viaje_model->buscar_ruta2($data["id_ruta"]);
		$data["descripcion"]=$a["descripcion"];

		$a=$this->viaje_model->buscar_conductor2($data["idconductor"]);
		$data["conductor"]=$a["nombre_conductor"];

		$this->load->view("Administrator/Viaje/editViaje2",$data);		
	}
	public function deleteViaje()
	{
		
		$this->load->model("viaje_model");
		$data=$this->viaje_model->viajes();
		
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Conductor', 'Flota','Cliente','ruta','Fecha Viaje','Tipo','Gasolina','Marchamos','Eliminar');
		foreach ($data as $dato) 
		{
			$nameClient=$this->viaje_model->buscar_cliente3($dato["idcliente"]);
			$nameRoute=$this->viaje_model->buscar_ruta2($dato["id_ruta"]);
			$conductor=$this->viaje_model->buscar_conductor2($dato["idconductor"]);

			$this->table->add_row($conductor["nombre_conductor"], $dato["idflota"],$nameClient["nombre_empresa"],$nameRoute["descripcion"],$dato["fecha_viaje"],$dato["tipo_viaje"],$dato["gasolina_asignada"],$dato["marchamos"],' <a style="color:#0D8CFB;font-weight: normal"  class="delete" data-controller="viaje" data-method="deletingViaje" onclick="deleteData('.$dato["idviaje"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadViaje"] = $this->table->generate();

		$this->load->view("Administrator/Viaje/deleteViaje",$info);		
	}
	public function deletingViaje()
	{
		//obteniendo id del cabezal a borrar 
		$idviaje=$this->input->post("id",true);
		$this->load->model("viaje_model");
		$data=$this->viaje_model->eliminar_viaje($idviaje);
		$this->deleteViaje();
		//div que indica borrado
		//$data['message']="<div class='text-center'><h4>Cabezal Borrado Exitosamente!</h4></div>";
		//$this->load->view("Administrator/Cabezal/deleteCabezal",$data);

	}
	public function searchViaje()
	{
		$this->load->model("viaje_model");
		$data=$this->viaje_model->viajes();
		
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Conductor', 'Flota','Cliente','ruta','Fecha Viaje','Tipo','Gasolina','Marchamos');
		foreach ($data as $dato) 
		{
			$nameClient=$this->viaje_model->buscar_cliente3($dato["idcliente"]);
			$nameRoute=$this->viaje_model->buscar_ruta2($dato["id_ruta"]);
			$conductor=$this->viaje_model->buscar_conductor2($dato["idconductor"]);

			$this->table->add_row($conductor["nombre_conductor"], $dato["idflota"],$nameClient["nombre_empresa"],$nameRoute["descripcion"],$dato["fecha_viaje"],$dato["tipo_viaje"],$dato["gasolina_asignada"],$dato["marchamos"]);

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadViaje"] = $this->table->generate();
		$this->load->view("Administrator/Viaje/searchViaje",$info);		
	}
	public function searchViaje2()
	{
		$nameViaje=$this->input->post("nameViaje",true);
		//Jala de la base los campos del Viaje para llenar el formulario
		$data="";
		$this->load->view("Administrator/Viaje/searchViaje2",$data);		
	}
	public function storeNewViaje()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameRoute=$this->input->post("nameRoute",true);
		$idFlota=$this->input->post("idFlota",true);
		$fechaViaje=$this->input->post("fechaViaje",true);
		$tipoViaje=$this->input->post("tipoViaje",true);
		$conductor=$this->input->post("conductor");//se necesita este campo
		$gas=$this->input->post("gas");//se necesita este campo
		$marchamos=$this->input->post("marchamos");//se necesita este campo
		
		$this->load->model("viaje_model");
		$nameClient=$this->viaje_model->buscar_cliente($nameClient);
		$nameRoute=$this->viaje_model->buscar_ruta($nameRoute);
		$conductor=$this->viaje_model->buscar_conductor($conductor);

			
		$this->viaje_model->ingresar_viaje($nameClient["idcliente"],$nameRoute["id_ruta"],$idFlota,$fechaViaje,$tipoViaje,$conductor["idconductor"],$gas,$marchamos);
		$data['message']="<div class='text-center'><h4>Viaje Agregado Exitosamente!</h4></div>";
		
		
		$this->load->view("Administrator/Viaje/newViaje",$data);
	}
	public function storeEditViaje()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameRoute=$this->input->post("nameRoute",true);
		$idFlota=$this->input->post("idFlota",true);
		$fechaViaje=$this->input->post("fechaViaje",true);
		$tipoViaje=$this->input->post("tipoViaje",true);
		$conductor=$this->input->post("conductor");//se necesita este campo
		$gas=$this->input->post("gas");//se necesita este campo
		$marchamos=$this->input->post("marchamos");
		$idviaje=$this->input->post("idviaje");

		$this->load->model("viaje_model");
		$nameClient=$this->viaje_model->buscar_cliente($nameClient);
		$nameRoute=$this->viaje_model->buscar_ruta($nameRoute);
		$conductor=$this->viaje_model->buscar_conductor($conductor);

		$this->viaje_model->update_viaje($nameClient["idcliente"],$nameRoute["id_ruta"],$idFlota,$fechaViaje,$tipoViaje,$conductor["idconductor"],$gas,$marchamos,$idviaje);

		$data['message']="<div class='text-center'><h4>Viaje Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Viaje/editViaje",$data);
	}
	public function finishViaje()
	{
		$this->load->model("viaje_model");
		$data=$this->viaje_model->viajes();
		
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Conductor', 'Flota','Cliente','ruta','Fecha Viaje','Tipo','Gasolina','Marchamos','Finalizar');
		foreach ($data as $dato) 
		{
			$nameClient=$this->viaje_model->buscar_cliente3($dato["idcliente"]);
			$nameRoute=$this->viaje_model->buscar_ruta2($dato["id_ruta"]);
			$conductor=$this->viaje_model->buscar_conductor2($dato["idconductor"]);

			$this->table->add_row($conductor["nombre_conductor"], $dato["idflota"],$nameClient["nombre_empresa"],$nameRoute["descripcion"],$dato["fecha_viaje"],$dato["tipo_viaje"],$dato["gasolina_asignada"],$dato["marchamos"],' <a style="color:#0D8CFB;font-weight: normal"  class="finish" data-controller="viaje" data-method="finishingViaje" onclick="finishData('.$dato["idviaje"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_finishViaje"] = $this->table->generate();

		$this->load->view("Administrator/Viaje/finishViaje",$info);		
	}
	public function finishingViaje()
	{
		$idviaje=$this->input->post("id",true);
		$this->load->model("viaje_model");	
		$viaje=$this->viaje_model->buscar_viaje($idviaje);
		$distanciaruta=$this->viaje_model->load_distancia_ruta($viaje["id_ruta"]);
		$data=$this->viaje_model->finalizar_viaje($idviaje,$viaje["idflota"],$distanciaruta["distancia_km"]);
		$this->finishViaje();
	}
	public function getData()
    {
        $this->load->model("viaje_model");
		$sequential=$this->viaje_model->viajes();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['idviaje']; // add each user id to the array
	    }
        echo json_encode($array);
    }

    public function getData2()
    {
        $this->load->model("viaje_model");
		$sequential=$this->viaje_model->buscar_cliente2();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['nombre_empresa']; // add each user id to the array
	    }
        echo json_encode($array);
    }
    public function getData3()
    {
        $this->load->model("viaje_model");
		$sequential=$this->viaje_model->routes();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['descripcion']; // add each user id to the array
	    }
        echo json_encode($array);
    }
    public function getData4()
    {
        $this->load->model("viaje_model");
		$sequential=$this->viaje_model->flotas();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['idflota']; // add each user id to the array
	    }
        echo json_encode($array);
    }
    public function getData5()
    {
        $this->load->model("viaje_model");
		$sequential=$this->viaje_model->conductors();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['nombre_conductor']; // add each user id to the array
	    }
        echo json_encode($array);
    }
}
?>