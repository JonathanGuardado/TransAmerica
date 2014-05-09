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
      $query = $this->db->query('INSERT INTO `cliente`(`nombre_empresa`, `nombre_contacto`, `telefono_contacto`, `tarifa`, `fecha_ingreso_cliente`,`estado_cliente`)  VALUES ("'.$nameClient.'","'.$nameContact.'", "'.$phoneContact.'", "'.$tarifa.'","'.$fechaIngreso.'","T")');
   }
   public function buscar_cliente($name)
	{
	    $this->db->select('idcliente');
         $this->db->from('cliente');
         $this->db->where('nombre_empresa', $name,'estado_cliente',"T");
          $query=$this->db->get();
         return $query->row_array();
	}
   public function buscar_cliente2($name)
   {
       $this->db->select('*');
         $this->db->from('cliente');
         $this->db->where('nombre_empresa', $name,'estado_cliente',"T");
          $query=$this->db->get();
         return $query->row_array();
   }
   public function eliminar_cliente($idcliente)
   {
      $this->db->query('UPDATE `cliente` SET `estado_cliente`="F" WHERE `idcliente`='.$idcliente);
   }
   public function clientes()
   {
      $this->db->select('nombre_empresa');
         $this->db->from('cliente');
         $this->db->where('estado_cliente',"T");
          $query=$this->db->get();
         return $query->result_array();
   }
   public function updating_cliente($nameClient,$nameContact,$phoneContact,$tarifa,$idcliente)
   {
      $this->db->query('UPDATE `cliente` SET `nombre_empresa`="'.$nameClient.'",`nombre_contacto`="'.$nameContact.'",`telefono_contacto`="'.$phoneContact.'",`tarifa`="'.$tarifa.'" WHERE `idcliente`='.$idcliente);
   }
}	

?>