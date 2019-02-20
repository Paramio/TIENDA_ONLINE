<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function loginok($nombre_usuario, $contra) {

        $query = $this->db->get_where('usuarios', array('Nombre_Usuario' => $nombre_usuario, 'Contraseña' =>  $contra));

        if ($query->num_rows() > 0) {
            $this->login_model->add_usuario_session($query->row());
            return true;
        } else {
            return false;
        }
    }

    function add_usuario_session($query) {
        $newdata = array(
            'nombre_usuario' => $query->Nombre_Usuario,
            'pass' => $query->Contraseña,
            'dentro' => TRUE
        );
        $this->session->set_userdata($newdata);
    }

    
    function cerrar_session() {
        $this->session->sess_destroy();
    }


    function esta_dentro() {
        return $this->session->userdata("dentro");
    }


    function añadir_usuario($array){
        
        $this->db->insert('usuarios', $array);
        $newdata = array(
              'nombre_usuario' => $array["nombre_usuario_registro"],
              'pass' => $array["contraseña"],
              'dentro' => TRUE
          );
          $this->session->set_userdata($newdata);
      }

    function creaSelect(){
        $query = $this->db->query("SELECT nombre FROM provincias");
		return $query->result();
    }
}
