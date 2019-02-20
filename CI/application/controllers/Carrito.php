<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }


	public function mostrar(){

		$pag=$this->load->view("carro",[],TRUE);
		$this->load->view("template",[
			'cuerpo'=>$pag]);
	}
	
	public function eliminar($rowid){
	
		$data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );

		$this->cart->update($data);
		$pag=$this->load->view("carro",[],TRUE);

		$this->load->view("template",[
			'cuerpo'=>$pag]);
	}
	
}