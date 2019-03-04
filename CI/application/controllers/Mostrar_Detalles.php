<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mostrar_Detalles extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("Productos");
    }
	public function index() {

		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        
    
        $pag=$this->load->view("detalles",[
				'productos'=>$this->Productos->getDetalles($id)
			],TRUE);
		
			$this->load->view("template",[
				'cuerpo'=>$pag]);
	}


	public function add($id)
	{	
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
		$this->load->model('Productos');
		
		$config = array(
            array(
                'field' => 'cantidad',
                'label' => 'cantidad',
                'rules' => 'required|numeric'
            )
        );

		$this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
           
            $pag=$this->load->view("detalles",[
				'productos'=>$this->Productos->getDetalles($id)
			],TRUE);
		
			$this->load->view("template",[
				'cuerpo'=>$pag]);
            
        } else {
			$this->load->model('Productos');
			$detalles=$this->Productos->getDetalles($id);
		
			$data = array(
				'id'      => $detalles[0]->Id,
				'qty'     => $this->input->post('cantidad'),
				'price'   => $detalles[0]->Precio,
				'name'    => $detalles[0]->Nombre,
				'img'    => $detalles[0]->Imagen,
				'stock' =>"",
			);
			$this->cart->insert($data);
			   redirect('Mostrar_Productos');
		   }



	

	

	$pag=$this->load->view("detalles",[
		'productos'=>$this->Productos->getDetalles($id)
	],TRUE);

	$this->load->view("template",[
		'cuerpo'=>$pag]);
}
}