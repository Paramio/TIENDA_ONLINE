<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar_Productos extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }

	public function index($offset=0)
	{	
		$data = $this->Productos->get_Productos_Destacados();
		$config['base_url']=site_url('Mostrar_Productos/index');
		$config['per_page']=8;
		$config['total_rows']=count($data);
		
		$this->pagination->initialize($config);
		$page=$this->Productos->getPaginateDestacados($config['per_page'],$offset);

		$pag=$this->load->view("destacados",[
			'data'=>$page
		],TRUE);

		$this->load->view("template",[
			'cuerpo'=>$pag]);
	}

	public function getProductosPorCategoria($id,$offset=0)
	{	
		$data=$this->Productos->get_Productos_Por_Categorias($id);
		$config['base_url']=site_url('Mostrar_Productos/getProductosPorCategoria/'.$id);
		$config['uri_segment'] =4;
		$config['per_page']=8;
		$config['total_rows']=count($data);
		
		$this->pagination->initialize($config);
		$page=$this->Productos->getPaginatePorCategorias($id,$config['per_page'],$offset);
	
			$pag=$this->load->view("destacados",[
				'data'=>$page
			],TRUE);

			$this->load->view("template",[
				'cuerpo'=>$pag]);
	
	}

	public function getDetallesProducto($id)
	{	
		$productos_categoria=$this->Productos->getDetalles($id);

	
			$pag=$this->load->view("detalles",[
				'productos'=>$this->Productos->getDetalles($id)
			],TRUE);
	
			$this->load->view("template",[
				'cuerpo'=>$pag]);
	}
}
