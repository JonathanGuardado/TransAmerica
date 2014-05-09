<?php
class Unit_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function load_unites()
 {
  $this->db->select('flota.idflota idflota, chasis.placa placa, contenedor.tipo_contenedor nocontenedor, cabezal.identificador identificador, conductor.nombre_conductor nombreconductor');
      $this->db->from('flota');
      $this->db->join('chasis', 'flota.idchasis = chasis.idchasis','INNER');
      $this->db->join('contenedor', 'flota.idcontenedor = contenedor.idcontenedor','INNER');
      $this->db->join('cabezal', 'flota.idcabezal = cabezal.idcabezal','INNER');
      $this->db->join('conductor', 'flota.idconductor = conductor.idconductor','INNER');
      $this->db->where('flota.estado_flota','T');
      $query=$this->db->get(); 
      return $query->result_array();
 }
public function load_unit($nameUnit)
{
    $this->db->select('*');
      $this->db->from('flota');
      $this->db->join('chasis', 'flota.idchasis = chasis.idchasis','INNER');
      $this->db->join('contenedor', 'flota.idcontenedor = contenedor.idcontenedor','INNER');
      $this->db->join('cabezal', 'flota.idcabezal = cabezal.idcabezal','INNER');
      $this->db->join('conductor', 'flota.idconductor = conductor.idconductor','INNER');
      $this->db->where('flota.idflota', $nameUnit);
       $query=$this->db->get();
return $query->row_array();
}
  
  public function updating_unit($noUnidad,$idChasis,$idContenedor,$idCabezal,$idChofer)
 {
      $data = array(
               'idchasis' => $idChasis,
                 'idcontenedor'=> $idContenedor,
                 'idcabezal'=> $idCabezal,
                 'idconductor'=> $idChofer
               );
    $this->db->where('idflota', $noUnidad);
    $this->db->update('flota', $data);
 }
 public function updating_unit_chasis($idChasis,$noChasis)
 {
      $data = array(
               'placa' => $noChasis
               );
    $this->db->where('idchasis', $idChasis);
    $this->db->update('chasis', $data);
 }
 public function updating_unit_contenedor($idContenedor,$noContenedor)
 {
      $data = array(
               'tipo_contenedor' => $noContenedor
               );
    $this->db->where('idcontenedor', $idContenedor);
    $this->db->update('contenedor', $data);
 }
 public function updating_unit_cabezal($idCabezal,$noCabezal)
 {
      $data = array(
               'identificador' => $noCabezal
               );
    $this->db->where('idcabezal', $idCabezal);
    $this->db->update('cabezal', $data);
 }
 public function updating_unit_chofer($idChofer,$nameChofer)
 {
      $data = array(
               'nombre_conductor' => $nameChofer
               );
    $this->db->where('idconductor', $idChofer);
    $this->db->update('conductor', $data);
 }
 public function deleting_unit($idFlota)
 {
    $data = array(
               
                 'estado_flota'=> 'F'
               );
    $this->db->where('idflota', $idFlota);
    $this->db->update('flota', $data);
 }
 public function load_idChasis($noChasis)
 {
  $this->db->select('idchasis');
      $this->db->from('chasis');
      $this->db->where('chasis.placa', $noChasis);
       $query=$this->db->get();
      return $query->row_array();
 }
 public function load_idContenedor($noContenedor)
 {
  $this->db->select('idcontenedor');
      $this->db->from('contenedor');
      $this->db->where('contenedor.tipo_contenedor',$noContenedor);
       $query=$this->db->get();
      return $query->row_array();
 }
 public function load_idCabezal($noCabezal)
 {
  $this->db->select('idcabezal');
      $this->db->from('cabezal');
      $this->db->where('cabezal.identificador',$noCabezal);
       $query=$this->db->get();
      return $query->row_array();
 }
 public function load_idChofer($nameChofer)
 {
  $this->db->select('idconductor');
      $this->db->from('conductor');
      $this->db->where('conductor.nombre_conductor',$nameChofer);
       $query=$this->db->get();
      return $query->row_array();
 }
 public function agregar_unit($noUnidad,$idChasis,$idContenedor,$idCabezal,$idChofer)
 {
  $this->db->set('idflota', $noUnidad);
  $this->db->set('idchasis', $idChasis);
    $this->db->set('idcontenedor', $idContenedor);
    $this->db->set('idconductor', $idChofer);
    $this->db->set('idcabezal', $idCabezal);
    $this->db->set('estado_flota', 'T');
    $this->db->insert('flota');
 }
 public function load_placas_chasis()
 {
  $query=$this->db->query("SELECT * FROM chasis WHERE estado_chasis='T'");
      return $query->result_array();
 }
 public function load_identificador_contenedor()
 {
  $query=$this->db->query("SELECT * FROM contenedor WHERE estado_contenedor='T'");
      return $query->result_array();
 }
 public function load_identificador_cabezal()
 {
  $query=$this->db->query("SELECT * FROM cabezal WHERE estado_cabezal='T'");
      return $query->result_array();
 }
} 

?>