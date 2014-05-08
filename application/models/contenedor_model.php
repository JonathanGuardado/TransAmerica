<?php
class Contenedor_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function newContenedor($tipoContenedor,$descripcion)
   {
      $this->db->set('tipo_contenedor', $tipoContenedor);
    $this->db->set('descripcion_contenedor', $descripcion);
    $this->db->insert('contenedor');
   }

}	

?>