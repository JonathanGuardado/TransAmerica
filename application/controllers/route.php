<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Route extends CI_Controller {

	public function index()
	{
		
	}

	public function newRoute()
	{
		$this->load->view("Administrator/Route/newRoute");		
	}
	public function editRoute()
	{
		//Jala de la base todos los Rutas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Route/editRoute",$data);		
	}
	public function editRoute2()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		$this->load->model("route_model");
		$data=$this->route_model->buscar_route2($nameRoute);
		$lugares=$this->route_model->buscar_route_lugar($data['id_ruta']);
		foreach($lugares as $row)
	    {
	    	if($row['opcionruta']=='O')
	    	{
	    		$data['orirulu'] = $row['idrutalugar'];
	    		$data['ori'] = $row['idlugar'];
	    	}
	    	if($row['opcionruta']=='D')
	    	{
	    		$data['desrulu'] = $row['idrutalugar'];
	    		$data['des'] = $row['idlugar'];
	    	}
	    }
	    $ori=$this->route_model->buscar_lugar2($data['ori']);
	    $des=$this->route_model->buscar_lugar2($data['des']);
	    $data["origen"]=$ori["nombre"];
	    $data["destino"]=$des["nombre"];
		$this->load->view("Administrator/Route/editRoute2",$data);		
	}
	public function deleteRoute()
	{
		$this->load->model("route_model");
		$data=$this->route_model->routes();

		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Descripcion', 'Tiempo(Horas)','Distancia(Km)','Gasolina','Eliminar');
		foreach ($data as $dato) 
		{
			$this->table->add_row($dato["descripcion"], $dato["tiempo_estimado"],$dato["distancia_km"],$dato["gasolina_estimada"],' <a style="color:#0D8CFB;font-weight: normal"  class="delete" data-controller="route" data-method="deletingRoute" onclick="deleteData('.$dato["id_ruta"].');" href=# >'." X ".'</a>');

		}
		$this->table->set_template($plantilla);
		$info["tabla_loadRoute"] = $this->table->generate();
		//segui el formato que tiene ever en sus controladores
		//$this->route_model->eliminar_route($idroute);
		$this->load->view("Administrator/Route/deleteRoute",$info);		
	}
	public function deletingRoute()
	{
		//obteniendo id del cabezal a borrar 
		$idroute=$this->input->post("id",true);
		$this->load->model("route_model");
		$data=$this->route_model->eliminar_route($idroute);
		$this->deleteRoute();
		//div que indica borrado
		//$data['message']="<div class='text-center'><h4>Cabezal Borrado Exitosamente!</h4></div>";
		//$this->load->view("Administrator/Cabezal/deleteCabezal",$data);

	}
	public function searchRoute()
	{
		//Jala de la base todos los Rutas para llenarlos en un autocomplete
		$data="";
		$this->load->view("Administrator/Route/searchRoute",$data);		
	}
	public function searchRoute2()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		//Jala de la base los campos del Ruta para llenar el formulario
		$data="";
		$this->load->view("Administrator/Route/searchRoute2",$data);		
	}
	public function storeNewRoute()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		$origen=$this->input->post("origen",true);
		$destino=$this->input->post("destino",true);
		$tiempo=$this->input->post("tiempo",true);
		$distancia=$this->input->post("distancia",true);
		$gasolina=$this->input->post("gasolina",true);

		$this->load->model("route_model");
		$idroute=$this->route_model->buscar_route($nameRoute,$tiempo,$distancia,$gasolina);
		if(isset($idroute["id_ruta"]))
		{
			$data['message']="<div class='text-center'><h4>Ruta Repetida</h4></div>";
				
		}
		else
		{
			$this->route_model->ingresar_route($nameRoute,$tiempo,$distancia,$gasolina);
			$idroute=$this->route_model->buscar_route($nameRoute,$tiempo,$distancia,$gasolina);
			$id_or=$this->route_model->buscar_lugar($origen);
			$id_des=$this->route_model->buscar_lugar($destino);
			$this->route_model->ingresar_route_lugar($idroute["id_ruta"],$id_or["idlugar"],'O');
			$this->route_model->ingresar_route_lugar($idroute["id_ruta"],$id_des["idlugar"],'D');

			$data['message']="<div class='text-center'><h4>Ruta Agregada Exitosamente!</h4></div>";
		}
		


		
		$this->load->view("Administrator/Route/newRoute",$data);
	}
	public function storeEditRoute()
	{
		$nameRoute=$this->input->post("nameRoute",true);
		$origen=$this->input->post("origen",true);
		$destino=$this->input->post("destino",true);
		$tiempo=$this->input->post("tiempo",true);
		$distancia=$this->input->post("distancia",true);
		$gasolina=$this->input->post("gasolina",true);

		$id_ruta=$this->input->post("id_ruta",true);
		$ori=$this->input->post("id_ori",true);
		$des=$this->input->post("id_des",true);

		$this->load->model("route_model");
		$id_or=$this->route_model->buscar_lugar($origen);
		$id_de=$this->route_model->buscar_lugar($destino);

		$this->route_model->update_route_lugar($id_or["idlugar"],$ori,$id_ruta,"O");
		$this->route_model->update_route_lugar($id_de["idlugar"],$des,$id_ruta,"D");

		$this->route_model->update_route($nameRoute,$tiempo,$distancia,$gasolina,$id_ruta);

		$data['message']="<div class='text-center'><h4>Ruta Editada Exitosamente!</h4></div>";
		$this->load->view("Administrator/Route/editRoute",$data);
	}
	public function getData()
    {
        $this->load->model("route_model");
		$sequential=$this->route_model->routes();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['descripcion']; // add each user id to the array
	    }
        echo json_encode($array);
    }
    public function getData2()
    {
        $this->load->model("route_model");
		$sequential=$this->route_model->lugars();
		$array = array();

	    foreach($sequential as $row)
	    {
	        $array[] = $row['nombre']; // add each user id to the array
	    }
        echo json_encode($array);
    }

}
