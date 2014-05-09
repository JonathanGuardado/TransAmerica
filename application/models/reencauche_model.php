<?php

class Reencauche_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

  public function agregar_reencauche($idllanta,$fecha_re,$lugar,$costo,$observacion)
   {
    $this->db->set('idllanta',$idllanta);
    $this->db->set('observacion_re',$observacion);
    $this->db->set('lugar_reencauche',$lugar);
    $this->db->set('total_reencauche', $costo);
    $this->db->set('fecha_reencauche', $fecha_re);
    
    $this->db->insert('reencauche');
 }
 public function load_Reencauche()
 {
  $query=$this->db->get('reencauche');
  return $query->result_array();
 }


 public function updating_reencauche($idllanta,$fecha_re,$lugar,$costo,$observacion)
 {
      $data = array(
                 'fecha_reencauche' => $fecha_re,
                 'lugar_reencauche'=> $lugar,
                 'total_reencauche'=> $costo,
                 'observacion_re'=> $observacion,
                 'idllanta'=> $idllanta
               );

    $this->db->where('idllanta', $idllanta);
    $this->db->update('reencauche', $data);
 }

 public function load_reencauche_id($id)
 {

  $query= $this->db->where('idllanta',$id);
  $query= $this->db->get("reencauche");
  return $query->row_array();
 }


 
}	
?>
 