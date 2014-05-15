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
      $query=$this->db->query("SELECT     flota.idflota unidad_flota,
                              viaje.fecha_viaje fecha_viaje,
                              cliente.nombre_empresa nombre_cliente,
                              ( select t3.nombre from ruta t1 
                                 inner join ruta_lugar t2 on t1.id_ruta=t2.id_ruta
                                 inner join lugar t3 on t2.idlugar=t3.idlugar
                                 where t2.opcionruta='O' and t1.id_ruta=ruta.id_ruta) origen, 
                              ( select t3.nombre from ruta t1 
                                 inner join ruta_lugar t2 on t1.id_ruta=t2.id_ruta
                                 inner join lugar t3 on t2.idlugar=t3.idlugar
                                 where t2.opcionruta='D' and t1.id_ruta=ruta.id_ruta) destino,
                              ruta.distancia_km kilometraje,  
                              viaje.gasolina_asignada-ruta.gasolina_estimada gasto_combustible,
                              ruta.distancia_km*ruta.gasolina_estimada costo
                              from  viaje inner join cliente on viaje.idcliente=cliente.idcliente
                              inner join ruta on viaje.id_ruta=ruta.id_ruta
                              inner join flota on viaje.idflota=flota.idflota
                              where viaje.estado_viaje='T'");
      return $query->result_array();
      
   }
   public function llantas_desechadas()
   {
      $query=$this->db->query("SELECT  llanta.idllanta idllanta,
                                 llanta.serie_llanta serie,
                                 llanta.marca_llanta marca,
                                 llanta.fecha_asignacion fecha_asignacion,
                                 llanta.fecha_desecho fecha_desecho,
                                 flota.idflota unidad
      from flota_llanta inner join flota on flota_llanta.idflota=flota.idflota
      inner join llanta on flota_llanta.idllanta=llanta.idllanta
      where llanta.estado_desecho='T'");
      return $query->result_array();

   }
   public function asignacionllantas()
   {
      $query=$this->db->query("SELECT  llanta.fecha_asignacion fecha_asignacion,
      flota.idflota unidad,
      llanta.idllanta llanta,
      llanta.serie_llanta serie,
      llanta.marca_llanta marca
      from flota_llanta inner join llanta on flota_llanta.idllanta=llanta.idllanta
      inner join flota on flota_llanta.idflota=flota.idflota
      where llanta.estado_asignacion='T'");
      return $query->result_array();

   }
   public function comprasllantasxmarca()
   {
      $query=$this->db->query("SELECT  llanta.fecha_compra fecha,
      count(llanta.idllanta) cantidad,
      llanta.marca_llanta marca
      from llanta 
where llanta.estado_llanta='T'
group by marca");
      return $query->result_array();
   }
   public function movimientosllantas()
   {
      $query=$this->db->query("SELECT  flota.idflota unidad,
      llanta.fecha_compra fecha_compra,
      GROUP_CONCAT(llanta.idllanta ORDER BY llanta.idllanta desc SEPARATOR '<br><br><br><br><br><br>') cod_llantas,
      GROUP_CONCAT((CASE llanta.estado_llanta
                                WHEN 'T' THEN  'Comprada'
                              WHEN NULL THEN  '-'
                              WHEN '' THEN  '-'
                                END),'<br>',
                     (CASE llanta.estado_asignacion
                                WHEN 'T' THEN  'Asignada'
                              WHEN NULL THEN  '-'
                              WHEN '' THEN  '-'
                                END),'<br>',
                     (CASE llanta.estado_reencauche
                                WHEN 'T' THEN  'Reecauchada'
                              WHEN NULL THEN  '-'
                              WHEN '' THEN  '-'
                                END),'<br>',
                     (CASE llanta.estado_desecho
                                WHEN 'T' THEN  'Desechada'
                              WHEN NULL THEN  '-'
                              WHEN '' THEN  '-'                      
                                END) ORDER BY llanta.idllanta desc SEPARATOR '<br><br>') movimientos
FROM llanta inner join flota_llanta on llanta.idllanta=flota_llanta.idllanta
inner join flota on flota.idflota=flota_llanta.idflota
where flota.estado_flota='T'
group by unidad");
      return $query->result_array();

   }
} 
?>



