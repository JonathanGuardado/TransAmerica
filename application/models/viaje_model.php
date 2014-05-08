<?php
class Viaje_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function ingresar_viaje($Client,$Route,$Flota,$fecha,$tipo,$con,$gas,$marchamos)
   {   	
      $query = $this->db->query('INSERT INTO `guia`(`id_ruta`, `idcliente`, `idconductor`, `idflota`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`) VALUES ("'.$Route.'","'.$Client.'", "'.$con.'", "'.$Flota.'","'.$fecha.'","'.$tipo.'","'.$gas.'","'.$marchamos.'")');
   }
   public function buscar_cliente($name)
	{
	    $this->db->select('idcliente');
	      $this->db->from('cliente');
	      $this->db->where('nombre_empresa', $name);
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function buscar_ruta($name)
	{
	    $this->db->select('id_ruta');
	      $this->db->from('ruta');
	      $this->db->where('descripcion', $name);
	       $query=$this->db->get();
	      return $query->row_array();
	}
}	

?>