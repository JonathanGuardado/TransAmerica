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
    $this->db->set('estado_chasis', 'T');
    $this->db->insert('chasis');
   }
   public function load_all_chasis()
   {
    $query=$this->db->query("SELECT idchasis,placa,marca,descripcion FROM chasis WHERE estado_chasis='T'");
      return $query->result_array();
   }
   public function load_chasis($nameChasis)
{
    $this->db->select('*');
      $this->db->from('chasis');
      $this->db->where('chasis.idchasis', $nameChasis);
       $query=$this->db->get();
      return $query->row_array();
}
public function updating_chasis($idChasis,$estadoChasis,$estadoChasis)
 {
      $data = array(
               'placa' => $estadoChasis,
                 'descripcion'=> $estadoChasis
               );
    $this->db->where('idconductor', $idChasis);
    $this->db->update('chasis', $data);
 }
 public function deleting_chasis($idChasis)
 {
    $data = array(
               
                 'estado_chasis'=> 'F'
               );
    $this->db->where('idchasis', $idChasis);
    $this->db->update('chasis', $data);
 }
}	
?>