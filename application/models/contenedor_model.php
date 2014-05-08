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
   public function load_contenedores()
 {
  $query=$this->db->query("SELECT idcontenedor, tipo_contenedor,descripcion_contenedor FROM contenedor WHERE estado_contenedor='T'");
      return $query->result_array();
 }
 public function load_contenedor($nameContenedor)
{
    $this->db->select('*');
      $this->db->from('contenedor');
      $this->db->where('contenedor.idcontenedor', $nameContenedor);
       $query=$this->db->get();
      return $query->row_array();
}
public function updating_contenedor($idContenedor,$tipoContenedor,$descripcion)
 {
      $data = array(
               'descripcion_contenedor' => $descripcion,
                 'tipo_contenedor'=> $tipoContenedor
               );
    $this->db->where('idcontenedor', $idContenedor);
    $this->db->update('contenedor', $data);
 }
  public function deleting_contenedor($idContenedor)
 {
    $data = array(
               
                 'estado_contenedor'=> 'F'
               );
    $this->db->where('idcontenedor', $idContenedor);
    $this->db->update('contenedor', $data);
 }

}	

?>