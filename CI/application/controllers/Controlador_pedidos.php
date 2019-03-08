<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador_pedidos extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model("Productos");
		$this->load->model("Pedidos");
    }

	/** Método encargado de mostrar un resumen del pedido a realizar */
    public function mostrarResumen(){
		
		if(count($this->cart->contents())==0){
			redirect("",'refresh');
	}else{


        $stock=$this->Pedidos->compruebastock();

        if($stock==false || $this->session->userdata("dentro")==false){
            $pag=$this->load->view("carro",[],TRUE);
		    $this->load->view("template",[
			'cuerpo'=>$pag]);
        }else{
            $pag=$this->load->view("terminarpedido",[],TRUE);
		$this->load->view("template",[
			'cuerpo'=>$pag]);
        }

		
	}	
	}
	
	/** Método encargado de terminar la realización del pedido */
	public function terminarpedido(){
        $stock=$this->Pedidos->compruebastock();

        if($this->session->userdata("dentro")==false){
            $pag=$this->load->view("carro",[],TRUE);
		    $this->load->view("template",[
			'cuerpo'=>$pag]);
        }else{
            $this->Pedidos->terminarpedido();  
        }        
		}
	
		/** Método encargado de mostrar la vista de los pedidos de un usuario */
		public function mostrar_pedidos(){
			$pedidos=$this->Pedidos->muestra_pedidos();

			$pag=$this->load->view("pedidos",[
				'pedidos'=>$pedidos
			],TRUE);
		    $this->load->view("template",[
			'cuerpo'=>$pag]);
		}

		/** Método encargado de mostrar la vista de las lineas de pedidos de un pedido específico */
		public function ver_detalles($id){
		
			$lineas=$this->Pedidos->muestra_lineas($id);

			$pag=$this->load->view("pedido_detalles",[
				'lineas'=>$lineas,
			],TRUE);
		    $this->load->view("template",[
			'cuerpo'=>$pag]);
		}

		/** Método encargado de anular un pedido */
		public function anular_pedido($id){
			$this->Pedidos->anular_pedido($id);

			$this->mostrar_pedidos();
		}

		/** Método encarado de crear un pdf */
		public function crear_pdf($id){
			$lineas=$this->Pedidos->muestra_lineas($id);

			$pag=$this->load->view("pedido_detalles",[
				'lineas'=>$lineas,
			],TRUE);


			$mpdf = new \Mpdf\Mpdf();
			//$mpdf->SetHeader();
			$mpdf->WriteHTML($pag);
			$mpdf->Output("Resumen.pdf","D");
		
		}
}
