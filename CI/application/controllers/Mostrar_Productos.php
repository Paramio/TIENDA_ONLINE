<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar_Productos extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }

	public function index()
	{	
		$this->load->view("destacados",[
			'productos'=>$this->Productos->get_Productos_Destacados()
		]);
	}

	public function getProductosPorCategoria($id)
	{	
		$productos_categoria=$this->Productos->get_Productos_Por_Categorias($id);

		if($productos_categoria)
			$this->load->view("destacados",[
				'productos'=>$this->Productos->get_Productos_Por_Categorias($id)
			]);
		else
		$this->load->view("error");
	}
}
