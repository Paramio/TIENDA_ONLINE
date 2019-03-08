<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model("Productos");
		$this->load->model("Pedidos");
    }

	/** Método encargado de mostrar el carrito */
	public function mostrar(){
		$stock=$this->Pedidos->compruebastock();
		$pag=$this->load->view("carro",[],TRUE);
		$this->load->view("template",[
			'cuerpo'=>$pag]);
	}
	
	/** Método encargado de eliminar un producto de un carrito */
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
	
	public function vaciar_carrito(){
		$this->cart->destroy();
		$pag=$this->load->view("carro",[],TRUE);

		$this->load->view("template",[
			'cuerpo'=>$pag]);
	}




}