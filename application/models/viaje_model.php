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
	public function buscar_cliente3($name)
	{
	    $this->db->select('nombre_empresa');
	      $this->db->from('cliente');
	      $this->db->where('idcliente', $name,'estado_cliente',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function buscar_ruta($name)
	{
	    $this->db->select('id_ruta');
	      $this->db->from('ruta');
	      $this->db->where('descripcion', $name,'estado_ruta',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function buscar_ruta2($name)
	{
	    $this->db->select('descripcion');
	      $this->db->from('ruta');
	      $this->db->where('id_ruta', $name,'estado_ruta',"T");
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
	public function buscar_conductor2($name)
	{
		$this->db->select('nombre_conductor');
	      $this->db->from('conductor');
	      $this->db->where('idconductor', $name,'estado_conductor',"T");
	       $query=$this->db->get();
	      return $query->row_array();
	}
	public function eliminar_viaje($idviaje)
	{
		$this->db->query('UPDATE `viaje` SET `estado_viaje`="F" WHERE `idviaje`='.$idviaje);
	}
	public function finalizar_viaje($idviaje,$unidad,$distancia)
	{

		$this->db->query('UPDATE `viaje` SET `estado_viaje`="F" WHERE `idviaje`='.$idviaje);
		$llantas=$this->db->query("select * from flota_llanta 
									inner join llanta on llanta.idllanta=flota_llanta.idllanta
								where flota_llanta.idflota='".$unidad."'");

       foreach ($llantas->result_array() as $row)
   			{
   				$this->db->query('UPDATE `llanta` SET `kilometraje`=`kilometraje`+'.$distancia.' WHERE `idllanta`="'.$row['idllanta'].'"');
      			
   			}

	}





	public function viajes()
	{
		$this->db->select('*');
	      $this->db->from('viaje');
	      $this->db->where('estado_viaje',"T");
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
   public function flotas()
   {     
       $this->db->select('*');
       $this->db->from('flota');
       $this->db->where('estado_flota',"T");
       $query=$this->db->get();
       return $query->result_array();
   }
   public function conductors()
   {     
       $this->db->select('*');
       $this->db->from('conductor');
       $this->db->where('estado_conductor',"T");
       $query=$this->db->get();
       return $query->result_array();
   }
   public function update_viaje($Client,$Route,$Flota,$fecha,$tipo,$con,$gas,$marchamos,$idviaje)
   {
   		
   		$this->db->query('UPDATE `viaje` SET `idconductor`="'.$con.'",`idflota`="'.$Flota.'",`idcliente`="'.$Client.'",`id_ruta`="'.$Route.'",`fecha_viaje`="'.$fecha.'",`tipo_viaje`="'.$tipo.'",`gasolina_asignada`="'.$gas.'",`marchamos`="'.$marchamos.'" WHERE `idviaje`='.$idviaje);
   }
   public function load_distancia_ruta($idruta)
   {
   	$this->db->select('*');
	      $this->db->from('ruta');
	      $this->db->where('id_ruta', $idruta);
	       $query=$this->db->get();
	      return $query->row_array();
   }

	public function getDatosN($idllanta){
		$this->db->select('flota.idflota');
	      $this->db->from('flota_llanta inner join flota on flota_llanta.idflota=flota.idflota inner join llanta on flota_llanta.idllanta=llanta.idllanta');
	      $this->db->where(' llanta.idllanta', $idllanta);
	       $query=$this->db->get();
	      return $query->row_array();

	}

	public function stateLlanta($unidad) {
		$llantas=$this->db->query("select llanta.idllanta as llanta, (kilometraje_max - kilometraje) as kilometraje_rest from flota_llanta 
									inner join llanta on llanta.idllanta=flota_llanta.idllanta
								where flota_llanta.idflota='".$unidad."'");
		 return $llantas->result_array();
	}
//select flota.idflota from flota_llanta inner join flota on flota_llanta.idflota=flota.idflota inner join llanta on flota_llanta.idllanta=llanta.idllanta where llanta.idllanta='".$idllanta."'

}	

?>