<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav_ctrl extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model("nav_model");
    }

	public function index()
	{	
		$this->load->view("nav",[
			'categorias'=>$this->nav_model->getCategorias()
		]);
	}
}