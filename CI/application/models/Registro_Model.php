<?php

class Registro_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /** Método encargado de añadir un usuario a la base de datos */
    function añadir_usuario($array){
        
      $this->db->insert('usuarios', $array);
      $newdata = array(
            'nombre_usuario' => $array["nombre_usuario_registro"],
            'pass' => $array["contraseña"],
            'dentro' => TRUE
        );
        $this->session->set_userdata($newdata);
    }
    
   
    
}
