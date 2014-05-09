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
		//segui el formato que tiene ever en sus controladores
		//$this->viaje_model->eliminar_viaje($idviaje);
		$this->load->view("Administrator/Viaje/deleteViaje",$data);		
	}
	public function searchViaje()
	{
		//Jala de la base todos los Viajes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Viaje/searchViaje",$data);		
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