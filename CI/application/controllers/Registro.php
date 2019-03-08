<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    /** Filtrado del registro de usuario */
    public function index() {
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
                "error"=>""
            ],TRUE 
            )
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
        
            $this->Registro_Model->añadir_usuario($data);
            redirect("Inicio");
        }
    }

}
