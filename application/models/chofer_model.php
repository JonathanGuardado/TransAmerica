<?php
class Chofer_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function agregar_chofer($nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$fechaIngreso,$estado)
   {
    $this->db->set('nombre_conductor', $nameChofer);
    $this->db->set('apellido_conductor', $surnameChofer);
    $this->db->set('dui', $dui);
    $this->db->set('nit', $nit);
    $this->db->set('fecha_nacimiento', $fechaNac);
    $this->db->set('fecha_ingreso_cond', $fechaIngreso);
    $this->db->set('estado_conductor', $estado);
    $this->db->insert('conductor');
 }
}	
?>