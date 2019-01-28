<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BuscaPorCategorias extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model("MuestraPorCategoria");
    }

	public function getProductos($id)
	{	
		$productos_categoria=$this->MuestraPorCategoria->getProductos($id);

		if($productos_categoria)
			$this->load->view("destacados",[
				'productos'=>$this->MuestraPorCategoria->getProductos($id)
			]);
		else
		$this->load->view("error");
	}
}