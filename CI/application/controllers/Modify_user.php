<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modify_user extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model("Usuarios");
		$this->load->model("Login_model");
    }
	public function index() {

		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        

			$this->load->view('template', [
					"cuerpo"=>$this->load->view("modify_user",[
						"error"=>"",
						'data'=>$this->Usuarios->getData(),
						"select"=>$this->Login_model->creaSelect()
					],TRUE )
			   ]);
			 
	}

    /** Método encargado de comprobar el filtrado de la modificación de datos del usuario */
	public function modify(){
		$this->load->model("Registro_Model");
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required'
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellidos',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'direccion',
                'label' => 'Direccion',
                'rules' => 'required'
            ),
            array(
                'field' => 'cp',
                'label' => 'Codigo Postal',
                'rules' => 'required'
            ),
            array(
                'field' => 'provincia',
                'label' => 'Provincias',
                'rules' => 'required'
            ),
            array(
                'field' => 'dni',
                'label' => 'DNI',
                'rules' => 'required|max_length[9]'
            ),
            array(
                'field' => 'pass',
                'label' => 'Contraseña',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
			$this->load->view('modify_user', [
				"cuerpo"=>$this->load->view("logeo",[
					"error"=>"",
					'data'=>$this->Usuarios->getData(),
					"select"=>$this->Login_model->creaSelect()
				],TRUE )
		   ]);
        } else {
            
            $data = array(
                'Nombre' => $this->input->post('nombre'),
                'Apellidos' => $this->input->post('apellido'),
                'Email' => $this->input->post('email'),
                'Direccion' => $this->input->post('direccion'),
                'Cp' => $this->input->post('cp'),
                'Provincia' => $this->input->post('provincia'),
                'Dni' => $this->input->post('dni'),
                'Contraseña' => $this->input->post('pass'),
                'Activo' => 0
            );
        
            $this->Usuarios->modify_user($data);
            $this->Login_model->cerrar_session();
            redirect("",'refresh');
        }
    }
    
    /** Método encargado de dar de baja la cuenta del usuario*/
	public function cancel_user(){
		$data = array(
			'Activo' => 1
		);
		$this->load->model("Usuarios");
		$this->Usuarios->cancel_user($data);
		$this->load->model('Login_model');
        $this->Login_model->cerrar_session();
        redirect("", 'refresh');
	}
}