<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	/**  Método encargado de buscar en la base de datos todas las categorias 
	 * para crear el cual los clientes usaran para navegar entre las distintas categorias*/
	public function getCategorias(){
		$query = $this->db->query("SELECT * FROM categorias");
		return $query->result();
	}

	public function importarCategorias($data){
		$result=$this->db->get_where('categorias', array('Id' => $data['Id']->__toString()))->row();
      
		if(!empty($result)){
			 $this->db
			->where('Id', $data['Id']->__toString())
		   ->update("categorias", $data);
		}else{
			$this->db->insert('categorias', $data);
		}
		
	}
	
	
	
}