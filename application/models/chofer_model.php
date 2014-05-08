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
    $this->db->set('estado_conductor', 'T');
    $this->db->insert('conductor');
 }

 public function load_choferes()
 {
  $query=$this->db->query("SELECT nombre_conductor, apellido_conductor,idconductor,dui,nit,fecha_ingreso_cond FROM conductor WHERE estado_conductor='T'");
      return $query->result_array();
 }
public function load_chofer($nameChofer)
{
    $this->db->select('*');
      $this->db->from('conductor');
      $this->db->where('conductor.nombre_conductor', $nameChofer);
       $query=$this->db->get();
      return $query->row_array();
}

 public function updating_chofer($idChofer,$nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$estado)
 {
      $data = array(
               'nombre_conductor' => $nameChofer,
                 'apellido_conductor'=> $surnameChofer,
                 'dui'=> $dui,
                 'nit'=> $nit,
                 'fecha_nacimiento'=> $fechaNac,
                 'estado_conductor'=> $estado
               );
    $this->db->where('idconductor', $idChofer);
    $this->db->update('conductor', $data);
 }
 public function deleting_chofer($idChofer)
 {
    $data = array(
               
                 'estado_conductor'=> 'F'
               );
    $this->db->where('idconductor', $idChofer);
    $this->db->update('conductor', $data);
 }
} 
?>