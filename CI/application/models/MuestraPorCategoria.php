<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MuestraPorCategoria extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	// Método encargado de buscar en la base de datos todos los productos destacados.
	public function getProductos($id){
		$query = $this->db->get_where('productos', array('Categorias_Id' => $id, 'Visible' => 1));
		return $query->result();
	}
	
	
}