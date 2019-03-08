<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar_Productos extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }

	/* Funcion encargada de mostrar solo los productos destacados */
	public function index($offset=0)
	{	
		$this->monedas();


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

	/* Funcion encargada de mostrar solo los productos de una categoría en específico */
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

	/* Funcion encargada de mostrar un producto en específico con todas sus características */
	public function getDetallesProducto($id)
	{	
		$productos_categoria=$this->Productos->getDetalles($id);

	
			$pag=$this->load->view("detalles",[
				'productos'=>$this->Productos->getDetalles($id)
			],TRUE);
	
			$this->load->view("template",[
				'cuerpo'=>$pag]);
	}

	public function  monedas(){
        $xml = simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
        $monedas['EUR']=1;
        foreach ($xml->Cube->Cube->Cube as $c) {
            $attr = $c->attributes();
            //echo "Un euro equivale a ".$attr[1]." ".$attr[0]."<br>";
            $monedas[(string)$attr[0]]=(double)$attr[1];

        }

        $this->session->set_userdata('monedas',$monedas);

	}
	
	public function cambioMoneda(){
        //$this->form_validation->set_rules('moneda', 'Moneda');
        $this->input->post('moneda');
        $this->session->set_userdata('current_divisa',$this->input->post('moneda'));
        $this->session->userdata('monedas')[$this->session->userdata('current_divisa')];
        redirect('Mostrar_Productos/index');
    }
}
