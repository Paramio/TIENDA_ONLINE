<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	// Método encargado de buscar en la base de datos todos los productos destacados.
	public function login(){
		$query = $this->db->get_where('usuarios', array('Nombre_Usuario' =>$nombre, 'Contraseña' => $contra));
		return $query->result();
    }
    
    public function register(){
        $data = array(
            'title' => 'My title',
            'name' => 'My Name',
            'date' => 'My date'
    );
    
    $this->db->insert('mytable', $data);
    }

	

	
}