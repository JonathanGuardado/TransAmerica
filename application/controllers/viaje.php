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
		$nameViaje=$this->input->post("nameViaje",true);
		//Jala de la base los campos del Viaje para llenar el formulario
		$data="";
		$this->load->view("Administrator/Viaje/editViaje2",$data);		
	}
	public function deleteViaje()
	{
		
		$this->load->model("viaje_model");
		$data=$this->viaje_model->viajes();
		
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
		$conductor="xfsdfsdf";//$this->input->post("nombreConductor")//se necesita este campo
		$gas=100;//$this->input->post("gasolina")//se necesita este campo
		$marchamos="no se";//$this->input->post("marchamos")//se necesita este campo
		
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
		$fechaViaje=$this->input->post("fechaViaje",true);;
		$tipoViaje=$this->input->post("tipoViaje",true);

		//Se almacena en la base de datos

		$data['message']="<div class='text-center'><h4>Viaje Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Viaje/editViaje",$data);
	}

}
