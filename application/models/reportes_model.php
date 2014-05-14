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

   	$this->db->select('llanta.fecha_asignacion FECHA_ASIGNACION, llanta.descripcion_llanta DESCRIPCION_LLANTA, llanta.serie_llanta SERIE_LLANTA, llanta.tamanio_llanta TAMANO_LLANTA, llanta.marca_llanta MARCA_LLANTA, flota.idflota ULTIMA_UNIDAD');
      $this->db->from('flota_llanta');
      $this->db->join('llanta', 'flota_llanta.idllanta = llanta.idllanta','INNER');
      $this->db->join('flota', 'flota.idflota = flota_llanta.idflota','INNER');
      $this->db->where('flota.estado_flota','T','llanta.estado_llanta','T');
      $query=$this->db->get(); 
      return $query->result_array();
   }

   public function historial_reencauche()
   {
      $query=$this->db->query('SELECT reencauche.fecha_reencauche, reencauche.total_reencauche, reencauche.lugar_reencauche, llanta.serie_llanta, flota_llanta.idflota, llanta.descripcion_llanta
         FROM (reencauche INNER JOIN llanta ON reencauche.idllanta = llanta.idllanta) INNER JOIN flota_llanta ON llanta.idllanta = flota_llanta.idllanta
         GROUP BY reencauche.fecha_reencauche, reencauche.total_reencauche, reencauche.lugar_reencauche, reencauche.id_reencauche, reencauche.idllanta, llanta.serie_llanta, llanta.estado_llanta, flota_llanta.idflota, llanta.descripcion_llanta
         HAVING (((llanta.estado_llanta)="T"));
         ');
      return $query->result_array();

   }
   public function costo_viaje()
   {
      $query=$this->db->query('SELECT viaje.marchamos, viaje.fecha_viaje, cliente.nombre_empresa, ruta.distancia_km, ruta.gasolina_estimada, Min(lugar.nombre) AS Origen, Max(lugar.nombre) AS Destino, [distancia_km]*[gasolina_estimada] AS costo
FROM (((viaje INNER JOIN cliente ON viaje.idcliente = cliente.idcliente) INNER JOIN ruta ON viaje.id_ruta = ruta.id_ruta) INNER JOIN ruta_lugar ON ruta.id_ruta = ruta_lugar.id_ruta) INNER JOIN lugar ON ruta_lugar.idlugar = lugar.idlugar
GROUP BY viaje.marchamos, viaje.fecha_viaje, cliente.nombre_empresa, ruta.distancia_km, ruta.gasolina_estimada, [distancia_km]*[gasolina_estimada];');
      return $query->result_array();
      
   }
} 
?>



