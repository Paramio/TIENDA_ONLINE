<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	// Método encargado de buscar en la base de datos todas las categorias.
	public function getCategorias(){
		$query = $this->db->query("SELECT * FROM categorias");
		return $query->result();
	}
	
	
}