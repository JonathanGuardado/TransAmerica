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
		
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Nombre', 'Contacto','Telefono','Tarifa','Fecha Ingreso','Eliminar');
		foreach ($data as $dato) 
		{
			$this->table->add_row($dato["nombre_empresa"], $dato["nombre_contacto"],$dato["telefono_contacto"],$dato["tarifa"],$dato["fecha_ingreso_cliente"],' <a style="color:#0D8CFB;font-weight: normal"  class="delete" data-controller="client" data-method="deletingClient" onclick="deleteData('.$dato["idcliente"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadClient"] = $this->table->generate();

		$this->load->view("Administrator/Client/deleteClient",$info);		
	}
	public function deletingClient()
	{
		//obteniendo id del cabezal a borrar 
		$idCliente=$this->input->post("id",true);
		$this->load->model("Cliente_model");
		$data=$this->Cliente_model->eliminar_Cliente($idCliente);
		$this->deleteClient();
		//div que indica borrado
		//$data['message']="<div class='text-center'><h4>Cabezal Borrado Exitosamente!</h4></div>";
		//$this->load->view("Administrator/Cabezal/deleteCabezal",$data);

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
