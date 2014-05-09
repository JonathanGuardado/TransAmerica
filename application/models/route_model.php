<?php
class Route_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function ingresar_route($nameRoute,$tiempo,$distancia,$gasolina)
   {   	

       $this->db->query('INSERT INTO `ruta`( `descripcion`, `tiempo_estimado`, `distancia_km`, `gasolina_estimada`, `estado_ruta`)   VALUES ("'.$nameRoute.'","'.$tiempo.'", "'.$distancia.'", "'.$gasolina.'","T")');       
   }
   public function ingresar_route_lugar($idrout,$lugar,$opciones)
	{
      $this->db->query('INSERT INTO `ruta_lugar`(`idlugar`, `id_ruta`, `opcionruta`)   VALUES ("'.$lugar.'","'.$idrout.'", "'.$opciones.'")');
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
       $this->db->select('nombre');
         $this->db->from('lugar');
         $this->db->where('idlugar', $name,'estado_lugar',"T");
          $query=$this->db->get();
         return $query->row_array();
   }
   public function buscar_route_lugar($idroute)
   {
       $this->db->select('*');
       $this->db->from('ruta_lugar');
       $this->db->where('id_ruta', $idroute);
       $query=$this->db->get();
       return $query->result_array();
   }
   public function buscar_route($nameRoute,$tiempo,$distancia,$gasolina)
   {     
       $this->db->select('id_ruta');
       $this->db->from('ruta');
       $this->db->where('descripcion', $nameRoute,'tiempo_estimado',$tiempo,'distancia_km',$distancia,'gasolina_estimada',$gasolina,'estado_ruta',"T");
       $query=$this->db->get();
       return $query->row_array();
   }
   public function buscar_route2($nameRoute)
   {     
       $this->db->select('*');
       $this->db->from('ruta');
       $this->db->where('descripcion', $nameRoute);
       $query=$this->db->get();
       return $query->row_array();
   }
   public function eliminar_route($idroute)
   {
      $this->db->query('UPDATE `ruta` SET `estado_ruta`="F" WHERE `idruta`='.$idroute);
   }
   public function routes()
   {
      $this->db->select('*');
         $this->db->from('ruta');
         $this->db->where('estado_ruta',"T");
          $query=$this->db->get();
         return $query->result_array();
   }
   public function lugars()
   {
      $this->db->select('*');
         $this->db->from('lugar');
          $query=$this->db->get();
         return $query->result_array();
   }
   public function update_route($nameRoute,$tiempo,$distancia,$gasolina,$id_ruta)
   {
      $this->db->query('UPDATE `ruta` SET `descripcion`="'.$nameRoute.'",`tiempo_estimado`="'.$tiempo.'",`distancia_km`="'.$distancia.'",`gasolina_estimada`="'.$gasolina.'" WHERE `id_ruta`='.$id_ruta);
   }
   public function update_route_lugar($idlugar,$rutalugar,$idruta,$op)
   {      
      $this->db->query('UPDATE `ruta_lugar` SET `idlugar`="'.$idlugar.'",`id_ruta`="'.$idruta.'",`opcionruta`="'.$op.'" WHERE `idrutalugar`='.$rutalugar);
   }
}	

?>