<?php
class Lugar_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function ingresar_lugar($nombrelugar,$ciudad,$pais)
   {   	
      $query = $this->db->query('INSERT INTO `lugar` ( `nombre`, `ciudad`, `pais`,`estado_lugar`)  VALUES ("'.$nombrelugar.'","'.$ciudad.'","'.$pais.'","T")');
   }
   public function buscar_lugar($name)
	{
	    $this->db->select('idlugar');
         $this->db->from('lugar');
         $this->db->where('nombre', $name,'estado_lugar',"T");
          $query=$this->db->get();
         return $query->row_array();
	}
   public function buscar_lugar2($name)
   {
       $this->db->select('*');
         $this->db->from('lugar');
         $this->db->where('nombre', $name,'estado_lugar',"T");
          $query=$this->db->get();
         return $query->row_array();
   }
   public function eliminar_lugar($idlugar)
   {
      $this->db->query('UPDATE `lugar` SET `estado_lugar`="F" WHERE `idlugar`='.$idlugar);
   }
   public function lugars()
   {
      $this->db->select('*');
         $this->db->from('lugar');
         $this->db->where('estado_lugar',"T");
          $query=$this->db->get();
         return $query->result_array();
   }
   public function update_lugar($name,$city,$pais,$idlugar)
   {
      $this->db->query('UPDATE `lugar` SET `nombre`="'.$name.'",`ciudad`="'.$city.'",`pais`="'.$pais.'" WHERE idlugar="'.$idlugar.'"');
         
   }
}	

?>