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
        $stylesheet = file_get_contents('../bootstrap/css/bootstrap.css');
        //cargamos el estilo CSS
        $this->mpdf->WriteHTML($stylesheet,1);
        //CONTENIDO DEL PDF

        $datos=$this->reportes_model->inventario_llanta();
        //tabla
        /*
		llanta.fecha_asignacion FECHA_ASIGNACION, llanta.descripcion_llanta DESCRIPCION_LLANTA, llanta.serie_llanta SERIE LLANTA, llanta.tamanio_llanta TAMANO_LLANTA, llanta.marca_llanta MARCA_LLANTA, flota.idflota ULTIMA_UNIDAD
        */
        $img="<div class='row text-center'>
        	  <div class='col-lg-6'>
        	  <img src='img/transamerica.jpg' class='img-thumbnail' />
        	  </div>        	  
        	  <div class='col-lg-6'>
        	  <h2>Inventario de Llantas</h2>
        	  </div>
        	  <br><br></div>";
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Fecha Asignacion', 'Descripcion','Serie','Tama&ntilde;o','Marca','Ultima Unidad');
		foreach ($datos as $data) {
			$this->table->add_row($data["FECHA_ASIGNACION"], $data["DESCRIPCION_LLANTA"],$data["SERIE_LLANTA"],$data["TAMANO_LLANTA"],$data["MARCA_LLANTA"],$data["ULTIMA_UNIDAD"]);
		}
		
		$this->table->set_template($plantilla);
		//$info["tabla_searchUnit"] = $this->table->generate();
		
        $tabla = $this->table->generate();
        //ESCRIBIMOS AL PDF
        $html=$img." ".$tabla;
        $this->mpdf->WriteHTML($html,2);
        //SALIDA DE NUESTRO PDF
        $this->mpdf->Output();	

	}
	public function historialReencauche()
	{
		//Especificamos algunos parametros del PDF
        $this->mpdf->mPDF('utf-8','A4');
        $stylesheet = file_get_contents('../bootstrap/css/bootstrap.css');
        //cargamos el estilo CSS
        $this->mpdf->WriteHTML($stylesheet,1);
        //CONTENIDO DEL PDF

        $datos=$this->reportes_model->historial_reencauche();
        //tabla
        /*
		reencauche.fecha_reencauche, reencauche.total_reencauche, reencauche.lugar_reencauche, llanta.serie_llanta, flota_llanta.idflota, llanta.descripcion_llanta
        */
        $img="<div class='row text-center'>
        	  <div class='col-lg-6'>
        	  <img src='img/transamerica.jpg' class='img-thumbnail' />
        	  </div>        	  
        	  <div class='col-lg-6'>
        	  <h2>Historial Reencauches</h2>
        	  </div>
        	  <br><br></div>";
		$this->load->library('table');
		$plantilla = array ( 'table_open'  => '<table class="table">');
		$this->table->set_heading('Fecha ', 'Total ','Lugar','Serie','Ultima Unidad','Descripcion');
		foreach ($datos as $data) {
			$this->table->add_row($data["fecha_reencauche"], $data["total_reencauche"],$data["lugar_reencauche"],$data["serie_llanta"],$data["idflota"],$data["descripcion_llanta"]);
		}
		
		$this->table->set_template($plantilla);
		//$info["tabla_searchUnit"] = $this->table->generate();
		
        $tabla = $this->table->generate();
        //ESCRIBIMOS AL PDF
        $html=$img." ".$tabla;
        $this->mpdf->WriteHTML($html,2);
        //SALIDA DE NUESTRO PDF
        $this->mpdf->Output();	
	
	}


}

