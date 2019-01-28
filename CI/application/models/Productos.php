<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	// Método encargado de buscar en la base de datos todos los productos destacados.
	public function get_Productos_Destacados(){
		$query = $this->db->get_where('productos', array('Destacado' => 1, 'Visible' => 1));
		return $query->result();
	}

	public function get_Productos_Por_Categorias($id){
		$query = $this->db->get_where('productos', array('Categorias_Id' => $id, 'Visible' => 1));
		return $query->result();
	}
	
	
}