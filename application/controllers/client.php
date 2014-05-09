<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index()
	{
		
	}

	public function newClient()
	{
		$this->load->view("Administrator/Client/newClient");		
	}
	public function editClient()
	{
		//Jala de la base todos los clientes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Client/editClient",$data);		
	}
	public function editClient2()
	{
		$nameClient=$this->input->post("nameClient",true);
		$this->load->model("cliente_model");
		$data=$data=$this->cliente_model->buscar_cliente2($nameClient);
		$this->load->view("Administrator/Client/editClient2",$data);		
	}
	public function deleteClient()
	{
		$this->load->model("cliente_model");
		$data=$this->cliente_model->clientes();

		//$this->cliente_model->eliminar_cliente($idcliente);
		$this->load->view("Administrator/Client/deleteClient",$data);		
	}
	public function searchClient()
	{
		//Jala de la base todos los clientes para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Client/searchClient",$data);		
	}
	public function searchClient2()
	{
		$nameClient=$this->input->post("nameClient",true);
		//Jala de la base los campos del cliente para llenar el formulario
		$data="";
		$this->load->view("Administrator/Client/searchClient2",$data);		
	}
	public function storeNewClient()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);
		$time = time();
		$fechaIngreso = date('Y-m-d',$time);
		
		$this->load->model("cliente_model");
		$name=$this->cliente_model->buscar_cliente($nameClient);
		if(isset($name["idcliente"]))
		{
			$data['message']="<div class='text-center'><h4>Cliente Repetido</h4></div>";
				
		}
		else
		{
			$this->cliente_model->ingresar_cliente($nameClient,$nameContact,$phoneContact,$tarifa,$fechaIngreso);

			$data['message']="<div class='text-center'><h4>Cliente Agregado Exitosamente!</h4></div>";
				
		}
		
		$this->load->view("Administrator/Client/newClient",$data);
	}
	public function storeEditClient()
	{
		$nameClient=$this->input->post("nameClient",true);
		$nameContact=$this->input->post("nameContact",true);
		$phoneContact=$this->input->post("phoneContact",true);
		$tarifa=$this->input->post("tarifa",true);
		$idcliente=$this->input->post("idcliente",true);

		$this->load->model("cliente_model");
		$this->cliente_model->updating_cliente($nameClient,$nameContact,$phoneContact,$tarifa,$idcliente);

		$data['message']="<div class='text-center'><h4>Cliente Editado Exitosamente!</h4></div>";
		$this->load->view("Administrator/Client/editClient",$data);
	}
	public function getData()
    {
        $this->load->model("cliente_model");
		$sequential=$this->cliente_model->clientes();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['nombre_empresa']; // add each user id to the array
	    }
        echo json_encode($array);
    }


}
