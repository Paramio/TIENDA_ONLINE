<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}

	/**  Método encargado de buscar en la base de datos todos los productos destacados.*/
	public function get_Productos_Destacados(){
		$query = $this->db->get_where('productos', array('Destacado' => 1, 'Visible' => 1));
		return $query->result();
	}

	/**  Método encargado de buscar en la base de datos todos los productos de una categoria en concreto.*/
	public function get_Productos_Por_Categorias($id){
		$query = $this->db->get_where('productos', array('Categoria_Id' => $id, 'Visible' => 1));
		return $query->result();
	}
	
	/**  Método encargado de obtener todos los datos de un producto en concreto.*/
	public function getDetalles($id){
		$query = $this->db->get_where('productos', array('Id' => $id));
		return $query->result();
	}

	/** Método encargado de crear la paginación de la vista de destacados */
	public function getPaginateDestacados($limit,$offset){
		$query = $this->db->get_where('productos', array('Destacado' => 1, 'Visible' => 1),$limit,$offset);
		return $query->result();
	}

		/** Método encargado de crear la paginación de la vista de destacados por categorias */
	public function getPaginatePorCategorias($id,$limit,$offset){
		$query = $this->db->get_where('productos', array('Categoria_Id' => $id, 'Visible' => 1),$limit,$offset);
		return $query->result();
	}

	/** Método encargado de obtener todos los productos de la base de datos */
	public function get_all_products(){
		$query = $this->db->get_where('productos', array('Visible' => 1));
		return $query->result();
	}
}