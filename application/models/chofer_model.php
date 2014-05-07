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

 public function load_choferes()
 {
  $query=$this->db->query("SELECT nombre_conductor, apellido_conductor FROM conductor WHERE estado_conductor='T'");
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

 public function updating_chofer($nameChofer,$surnameChofer,$dui,$nit,$fechaNac,$fechaIngreso,$estado)
 {
      $data = array(
               'nombre_conductor' => $nameChofer,
                 'apellido_conductor'=> $surnameChofer,
                 'apellido_conductor'=> $dui,
                 'apellido_conductor'=> $nit,
                 'apellido_conductor'=> $fechaNac,
                 'apellido_conductor'=> $estado
               );
    $this->db->where('nombre_conductor', $codigo);
    $this->db->update('conductor', $data);
 }
}	
?>