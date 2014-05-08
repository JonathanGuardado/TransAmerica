<?php

class Reencauche_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

  public function agregar_reencauche($fecha_re,$lugar,$costo,$observacion)
   {
    
    $this->db->set('observacion_re',$observacion);
    $this->db->set('lugar_reencauche',$lugar);
    $this->db->set('total_reencauche', $costo);
    $this->db->set('fecha_reencauche', $fecha_re);
    
    
    $this->db->insert('reencauche');
 }
 public function load_Reencauche()
 {
  $query=$this->db->query("SELECT nombre_conductor, apellido_conductor FROM llanta WHERE estado_conductor='T'");
  return $query->result_array();
 }


 public function updating_wheel($noSerie,$marca,$size,$estado,$fechaCompra,$descripcion)
 {
      $data = array(
                 'serie_llanta' => $noSerie,
                 'marca_llanta'=> $marca,
                 'tamanio_llanta'=> $size,
                 'estado_llanta'=> $estado,
                 'fecha_compra'=> $fechaCompra,
                 'descripcion_llanta'=> $descripcion
               );

    $this->db->where('serie_llanta', $noSerie);
    $this->db->update('llanta', $data);
 }

 public function load_reencauche_id($id)
 {

  $query= $this->db->where('id_reencauche',$id);
  $query= $this->db->get("reencauche");
  return $query->row_array();
 }
 
}	
?>
 