<?php

class Compras extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }

  public function agregar_compra($idflota,$noSerie,$marca,$size,$estado,$fechaCompra,$descripcion)
   {
    
    $this->db->set('descripcion_llanta', $descripcion);
    $this->db->set('serie_llanta', $noSerie);
    $this->db->set('tamanio_llanta', $size);
    $this->db->set('marca_llanta', $marca);
    $this->db->set('estado_llanta', $estado);
    $this->db->set('fecha_compra', $fechaCompra);
    $this->db->set('idflota', $idflota);
    
    
    $this->db->insert('llanta');
 }
 public function eliminar_compra()
 {

  public function update_compra()
  {
    
  }
 }
}	
?>
?> 