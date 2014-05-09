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
      $query = $this->db->query('INSERT INTO `viaje`(`id_ruta`, `idcliente`, `idconductor`, `idflota`, `fecha_viaje`, `tipo_viaje`, `gasolina_asignada`, `marchamos`,`estado_viaje`) VALUES ("'.$Route.'","'.$Client.'", "'.$con.'", "'.$Flota.'","'.$fecha.'","'.$tipo.'","'.$gas.'","'.$marchamos.'","T")');
   }
   public function buscar_cliente($name)
	{
	    $this->db->select('idcliente');
	      $this->db->from('cliente');
	      $this->db->where('nombre_empresa', $name,'estado_cliente',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function buscar_cliente2()
	{
	    $this->db->select('*');
	      $this->db->from('cliente');
	      $this->db->where('estado_cliente',"T");
	       $query=$this->db->get();
	      return $query->result_array();
	}
	public function buscar_ruta($name)
	{
	    $this->db->select('id_ruta');
	      $this->db->from('ruta');
	      $this->db->where('descripcion', $name,'estado_ruta',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function buscar_conductor($name)
	{
		$this->db->select('idconductor');
	      $this->db->from('conductor');
	      $this->db->where('nombre_conductor', $name,'estado_conductor',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function eliminar_viaje($idviaje)
	{
		$this->db->query('UPDATE `viaje` SET `estado_viaje`="F" WHERE `idviaje`='.$idviaje);
	}
	public function viajes()
	{
		$this->db->select('*');
	      $this->db->from('viaje');
	       $query=$this->db->get();
	      return $query->result_array();
	}
	public function buscar_viaje($name)
   {   	
      $this->db->select('*');
	      $this->db->from('viaje');
	      $this->db->where('idviaje', $name,'estado_viaje',"T");
	       $query=$this->db->get();
	      return $query->row_array();
   }
   public function routes()
   {     
       $this->db->select('*');
       $this->db->from('ruta');
       $this->db->where('estado_ruta',"T");
       $query=$this->db->get();
       return $query->result_array();
   }
   public function flotass()
   {     
       $this->db->select('*');
       $this->db->from('flota');
       $this->db->where('estado_flota',"T");
       $query=$this->db->get();
       return $query->result_array();
   }
}	

?>