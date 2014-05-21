<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notificacion extends CI_Controller {
    public function sendNotificationLlanta($id,$mk){
    	$stringMsj="Estimado watch : La llanta ".$id." Esta proxima a espirar";
    	       		$this->load->library('email');
        		$this->email->from("jADEv@company.com");
               $this->email->to("mr.alexx11@hotmail.com");
               $this->email->subject("Prueba Correo");
               $this->email->message("");        
               $this->email->send();
			   $this->email->clear();
			 
         
    }

}

?>	