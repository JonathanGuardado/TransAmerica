<?php
class Cliente_model extends CI_Model
{
	public function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   public function ingresar_Cliente($nameClient,$nameContact,$phoneContact,$tarifa,$fechaIngreso)
   {   	
      $query = $this->db->query('INSERT INTO `cliente`(`nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`)  VALUES ("'.$nameClient.'","'.$nameContact.'", "'.$phoneContact.'", "'.$tarifa.'","'.$fechaIngreso.'")');
   }
   public function buscar_cliente($name)
	{
	    $this->db->select('idcliente');
	      $this->db->from('cliente');
	      $this->db->where('nombre_empresa', $name);
	       $query=$this->db->get();
	      return $query->row_array();
	}
}	

?>