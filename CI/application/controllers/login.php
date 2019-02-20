<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function index(){
         
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('Login_model');
        
    
        $this->load->view('template', [
            "cuerpo"=>$this->load->view("logeo",[
                "error"=>"",
                "select"=>$this->Login_model->creaSelect()
            ],TRUE )
       ]);
    }
    
    public function logear() {
        
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('Login_model');

        $config = array(
            array(
                'field' => 'nombre_usuario_login',
                'label' => 'Nombre Usuario',
                'rules' => 'required'
            ),
            array(
                'field' => 'pass_inicio',
                'label' => 'Contraseña',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
           
            $this->load->view('template', [
                "cuerpo"=>$this->load->view("logeo",[
                    "error"=>"",
                    "select"=>$this->Login_model->creaSelect()
                ],TRUE )
           ]);
            
        } else {
             $this->load->model('login_model');
            if ($this->login_model->loginok(
                    $this->input->post('nombre_usuario_login'), $this->input->post('pass_inicio'))) {

                redirect('Mostrar_Productos');
            } else {
               $this->load->view('template', [
                "cuerpo"=>$this->load->view("logeo",[
                    "error"=>"No existe ningun usuario con ese combinación de usuario/contraseña",
                    "select"=>$this->Login_model->creaSelect()
                ],TRUE )
           ]);
            }
        }
    }
    
    
    public function cerrar_sesion(){
        $this->load->model('login_model');
        $this->login_model->cerrar_session();
        redirect('Inicio');
    } 

    public function registro() {
        $this->load->model("login_model");
        $this->load->library('form_validation');
        $this->load->model('Login_model');

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
                'field' => 'nombre_usuario_registro',
                'label' => 'Nombre Usuario',
                'rules' => 'required|is_unique[usuarios.Nombre_Usuario]'
            ),
            array(
                'field' => 'pass',
                'label' => 'Contraseña',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template', [
                "cuerpo"=>$this->load->view("logeo",[
                    "error"=>"",
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
                'Nombre_Usuario' => $this->input->post('nombre_usuario_registro'),
                'Contraseña' => $this->input->post('pass'),
                'Activo' => 0
            );
        
            $this->login_model->añadir_usuario($data);
            redirect("Inicio");
        }
    }

  

}

//  <?php echo form_dropdown("provincias",db_result_to_array(get_provincias(),"cod","nombre","Seleccione provincia"),""); ?>