<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MuestraPorCategoria extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	// Método encargado de buscar en la base de datos todos los productos destacados.
	public function getDetalles($id){
		$query = $this->db->get_where('productos', array('Id' => $id));
		return $query->result();	
	}
	
	
}