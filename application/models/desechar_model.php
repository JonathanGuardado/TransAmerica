<?php
class Desechar_model extends CI_Model
{

	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
    public function desechar_llanta($fechaDesechar,$noWheel,$descripcion)
    {
    	$data = array(
               'fecha_desecho' => $fechaDesechar, 
                 'descripcion_llanta'=> $descripcion, // tantas descripciones q pense en sobre escribir la misma descripcion
                 
               );
    $this->db->where('idllanta', $noWheel);
    $this->db->update('llanta', $data);
    

    }
}
?>