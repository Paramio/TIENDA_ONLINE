<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	/** Método encargado de obtener los datos de un usuario mediante su nombre de usuario*/
    public function getData(){
        
        $query = $this->db->get_where('usuarios', array('Nombre_Usuario'=>$this->session->userdata("nombre_usuario")));
		return $query->result();
    }
    
    /** Método encargado de modificar los datos del usuario */
    public function modify_user($data){
        $query = $this->db
        ->where('Nombre_Usuario', $this->session->userdata("nombre_usuario"))
       ->update("usuarios", $data);
        $newdata = array(
              'nombre_usuario' => $array["nombre_usuario_registro"],
              'pass' => $array["contraseña"],
              'dentro' => TRUE
          );
          $this->session->set_userdata($newdata);

    }

    /** método encargado de cancelar una cuenta de usuario */
    public function cancel_user($data){
        $query = $this->db
        ->where('Nombre_Usuario', $this->session->userdata("nombre_usuario"))
       ->update("usuarios", $data);
    }
}