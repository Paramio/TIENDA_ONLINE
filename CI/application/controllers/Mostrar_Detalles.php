<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar_Detalles extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }



	public function getDetallesProducto($id)
	{	
		$productos_categoria=$this->Productos->getDetalles($id);

	
			$this->load->view("detalles",[
				'productos'=>$this->Productos->getDetalles($id)
			]);
	
	}
}