<?php

class Buy_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

   //Funcion agregar llantas
   //----------------------------------------------------------------------------------//

  public function agregar_compra($idllanta,$noSerie,$marca,$size,$fechaCompra,$estado,$descripcion)
   {
    $this->db->set('idllanta', $idllanta);
    $this->db->set('descripcion_llanta', $descripcion);
    $this->db->set('serie_llanta'      , $noSerie    );
    $this->db->set('tamanio_llanta'    , $size       );
    $this->db->set('marca_llanta'      , $marca      );
    $this->db->set('estado_llanta'     , $estado     );
    $this->db->set('fecha_compra'      , $fechaCompra);
   
    
    $this->db->insert('llanta');
 }

  //----------------------------------------------------------------------------------//

 //Funcion cargar llantas/llanta
 //----------------------------------------------------------------------------------//


 public function load_wheels()
 {
  $query=$this->db->query("SELECT * FROM llanta ");
  return $query->result_array();
 }

 public function load_wheel($idllanta)
 {
      $this->db->select('*');
      $this->db->from('llanta');
      $this->db->where('idllanta', $idllanta);
       $query=$this->db->get();
      return $query->row_array();
 }

 //----------------------------------------------------------------------------------//

 //Funcion actualizar llantas/llanta
 //----------------------------------------------------------------------------------//


 public function updating_wheel($idllanta,$noSerie,$marca,$size,$estado,$fechaCompra,$descripcion)
 {
      $data = array(
                 'idllanta' => $idllanta,
                 'serie_llanta' => $noSerie,
                 'marca_llanta'=> $marca,
                 'tamanio_llanta'=> $size,
                 'estado_llanta'=> $estado,
                 'fecha_compra'=> $fechaCompra,
                 'descripcion_llanta'=> $descripcion
               );

    $this->db->where('serie_llanta', $noSerie);
    $this->db->update('llanta', $data);
 }

 //----------------------------------------------------------------------------------//

//Funcion eliminar (las coloca como llantas/llanta
//----------------------------------------------------------------------------------//

public function deleting_Wheels($idllanta)
 {
    $date = getdate();

    $data = array(
               
                 'fecha_desecho'=> $date
               );
    $this->db->where('idllanta', $idllanta);
    $this->db->update('llanta', $data);
 }

 public function load_wheels_id($id)
 {

  $query= $this->db->where('serie_llanta',$id);
  $query= $this->db->get("llanta");
  return $query->row_array();
 }
 //----------------------------------------------------------------------------------//

 
 
 
}	
?>
 