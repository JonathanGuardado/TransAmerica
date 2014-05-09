<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library("mpdf");
        $this->load->model("reportes_model");
    }

	public function index()
	{
		
	}

	public function inventarioLlantas()
	{

	//Especificamos algunos parametros del PDF
        $this->mpdf->mPDF('utf-8','A4');
        //CONTENIDO DEL PDF
        $datos=$this->reportes_model->inventario_llanta();
        //tabla
        /*
		llanta.fecha_asignacion FECHA_ASIGNACION, llanta.descripcion_llanta DESCRIPCION_LLANTA, llanta.serie_llanta SERIE LLANTA, llanta.tamanio_llanta TAMANO_LLANTA, llanta.marca_llanta MARCA_LLANTA, flota.idflota ULTIMA_UNIDAD
        */
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Fecha Asignacion', 'Descripcion','Serie','Tama&ntilde;o','Marca','');

		$this->table->add_row($data["placa"], $data["tipo_contenedor"],$data["identificador"],$data["nombre_conductor"]);
		
		$this->table->set_template($plantilla);
		$info["tabla_searchUnit"] = $this->table->generate();
		
        foreach ($datos as $dato) {
        	
        }
        $html = "<h1>HOLA BIENVENIDOS</h1>";
        //ESCRIBIMOS AL PDF
        
        $this->mpdf->WriteHTML($html,2);
        //SALIDA DE NUESTRO PDF
        $this->mpdf->Output();			
	}
	public function historialReencauche()
	{
		
	}


}

