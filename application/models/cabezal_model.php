<?php
class Cabezal_model extends CI_Model
{
  public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   public function agregar_cabezal($identificador,$marca,$kmactual)
   {
    $this->db->set('identificador', $identificador);
    $this->db->set('marca', $marca);
    $this->db->set('kilometraje_actual', $kmactual);
    $this->db->set('estado_cabezal', 'T');
    $this->db->insert('cabezal');
 }

 public function load_cabezales()
 {
  $query=$this->db->query("SELECT * FROM cabezal WHERE estado_cabezal='T'");
      return $query->result_array();
 }
public function load_cabezal($nameCabezal)
{
    $this->db->select('*');
      $this->db->from('cabezal');
      $this->db->where('cabezal.identificador', $nameCabezal);
       $query=$this->db->get();
      return $query->row_array();
}

 public function updating_cabezal($idCabezal,$identificador,$marca,$kmactual)
 {
      $data = array(
               'identificador' => $namecabezal,
                 'marca'=> $surnamecabezal,
                 'kilometraje_actual'=> $dui
               );
    $this->db->where('idcabezal', $idCabezal);
    $this->db->update('cabezal', $data);
 }
 public function deleting_cabezal($idCabezal)
 {
    $data = array(
               
                 'estado_cabezal'=> 'F'
               );
    $this->db->where('idcabezal', $idCabezal);
    $this->db->update('cabezal', $data);
 }
} 
?>