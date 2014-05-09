<?php
class Reportes_model extends CI_Model
{
  public function __construct()
   {
      parent::__construct();
      $this->load->database();

   }
   public function inventario_llanta()
   {

   	$this->db->select('llanta.fecha_asignacion FECHA_ASIGNACION, llanta.descripcion_llanta DESCRIPCION_LLANTA, llanta.serie_llanta SERIE LLANTA, llanta.tamanio_llanta TAMANO_LLANTA, llanta.marca_llanta MARCA_LLANTA, flota.idflota ULTIMA_UNIDAD');
      $this->db->from('flota_llanta');
      $this->db->join('llanta', 'flota_llanta.idllanta = llanta.idllanta','INNER');
      $this->db->join('flota', 'flota.idflota = flota_llanta.idflota','INNER');
      $this->db->where('flota.estado_flota','T','llanta.estado_llanta','T');
      $query=$this->db->get(); 
      return $query->result_array();
   }

   public function historial_reencauche()
   {
   	
   }
} 
?>



