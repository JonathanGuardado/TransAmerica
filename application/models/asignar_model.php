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

    // asinar la llanta a la flota
    $this->db->set('idflota', $noUnit);
    $this->db->set('idllanta', $noWheel);
    $this->db->insert('flota_llanta');

    //actualiza la descripcion y agrega la fecha de asignacion de la llanta
    $data = array(
               'fecha_asignacion' => $fechaAsignacion,
               'descripcion_llanta'=> $descripcion,//actualizacion de la descripcion
               );
    $this->db->where('idllanta', $noWheel);
    $this->db->update('llanta', $data);

   /* $this->db->set('fecha_asignacion', $fechaAsignacion);
    $this->db->set('descripcion', $descripcion);*/
    
   
   }

   
 


}



?>