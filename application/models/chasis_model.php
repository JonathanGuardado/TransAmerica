<?php
class Chasis_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function newChasis($estadoChasis,$descripcionChasis)
   {
      $this->db->set('placa', $estadoChasis);
    $this->db->set('descripcion', $descripcionChasis);
    $this->db->insert('chasis');
   }
   public function load_all_chasis()
   {
    $query=$this->db->query("SELECT descripcion FROM chasis WHERE estado_chasis='T'");
      return $query->result_array();
   }
}	
?>