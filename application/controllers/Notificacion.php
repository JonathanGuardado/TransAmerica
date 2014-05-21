<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notificacion extends CI_Controller {
    public function sendNotificationLlanta($id,$mk){
        		$this->load->library('email');
        		$this->email->from("jADEv@company.com");
               $this->email->to("mr.alexx11@hotmail.com");
               $this->email->subject("Prueba Correo");
               $this->email->message("Estimado watch : La llanta ".$id." Esta proxima a espirar");        
               $this->email->send();
			   $this->email->clear();
			   		
        		$this->email->from("jADEv@company.com");
               $this->email->to("jonatha.guardado11@gmail.com");
               $this->email->subject("Prueba Correo");
               $this->email->message("Estimado watch : La llanta ".$id." Esta proxima a espirar");        
               $this->email->send();
			   $this->email->clear();
         
    }

}

?>