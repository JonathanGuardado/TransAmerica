<?php

class Asignar_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function asignar_unidad($fechaAsignacion,$noUnit,$noWheel,$descripcion)
   {
    $this->db->set('idflota', $noUnit);
    $this->db->set('idllanta', $noWheel);
    $this->db->set('fecha_asignacion', $fechaAsignacion);
    $this->db->set('descripcion', $descripcion);
    
    $this->db->insert('flota_llanta');
   }
 


}



?>