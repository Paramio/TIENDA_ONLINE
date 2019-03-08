<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grocery extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}



	public function muestra_Productos(){
		
		$crud = new grocery_CRUD();
		$crud->set_table('productos');
		//$crud->columns('nombre','codigo','descripcion','precio', 'cantidad_dispo');
		 
		$output = $crud->render();
		
		$cuerpo=$this->_example_output($output);
		
		
}

public function muestra_Categorias(){
		
	$crud = new grocery_CRUD();
	$crud->set_table('categorias');
	//$crud->columns('nombre','codigo','descripcion','precio', 'cantidad_dispo');
	 
	$output = $crud->render();
	 
	$this->_example_output($output);
	
}

public function muestra_Usuarios(){
		
	$crud = new grocery_CRUD();
	$crud->set_table('usuarios');
	//$crud->columns('nombre','codigo','descripcion','precio', 'cantidad_dispo');
	 
	$output = $crud->render();
	 
	$this->_example_output($output);
	
}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	



}
