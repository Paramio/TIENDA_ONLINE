<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("Login_model");
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }

    
    public function index(){
         
        
        $this->load->view('template', [
            "cuerpo"=>$this->load->view("logeo",[
                "error"=>"",
                "select"=>$this->Login_model->creaSelect()
            ],TRUE )
       ]);
    }
    
    /** Método encargado de filtrar el login y llamar al modelo para realizar el login */
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
                    "error"=>"No existe ningun usuario con ese combinación de usuario/contraseña o bie tu cuenta ha sido cancelada",
                    "select"=>$this->Login_model->creaSelect()
                ],TRUE )
           ]);
            }
        }
    }
    
    /** Método encargado de cerrar la sesión actual */
    public function cerrar_sesion(){
        $this->load->model('Login_model');
        $this->Login_model->cerrar_session();
        redirect("", 'refresh');
        $this->cart->destroy;
}
    
    /** Método encargado del filtrado y realización del registro llamando al modelo */
    public function registro() {
        $this->load->model("login_model");
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
                'Activo' => 0,
                'Tipo' => "client",
            );
        
            $this->login_model->añadir_usuario($data);
            redirect("", 'refresh');
        }
    }

    /** Método encargado de mostrar la vista para cambiar la contraseña luego de pedir la recuperación de la cuenta */
     public function recuperarContra(){
        $this->load->view('template', [
            "cuerpo"=>$this->load->view("recuperarContra",[
            ],TRUE )
       ]);
     }   
  
     /** Método encargado del filtrado del email y del envio del correo para recuperar la cuenta. */
     public function enviarEmail(){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->model('login_model');

        $config = array(
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email'
            )
        );


        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE || $this->login_model->recuCorreo($this->input->post('email'))==FALSE) {
           
            $this->load->view('template', [
                "cuerpo"=>$this->load->view("recuperarContra",[
                ],TRUE )
           ]);
            
        } else {
            $this->load->library('email','','correo');
            $this->load->model('login_model');
            $data=$this->login_model->recuCorreo($this->input->post('email'));
            
 $hash =sha1($data->Dni);
                
            $this->correo->from('practicasantonioparamio@gmail.com', 'Paramio');
            $this->correo->to($this->input->post('email'));
            $this->correo->subject('Email enviado desde CodeIgneter');

            $this->correo->message('"'.site_url('login/restablecerContra/'.$data->Id.'/'.$hash).'"');
            if($this->correo->send())
            {
                $this->load->view('template', [
                    "cuerpo"=>$this->load->view("logeo",[
                        "error"=>"",
                        "select"=>$this->login_model->creaSelect()
                    ],TRUE )
               ]);
            }

            else
            {
            show_error($this->correo->print_debugger());
            }

     }

}

    /** Método encargado del filtrado del formulario de la nueva contraseña para la recuperación de la cuenta */
    function restablecerContra($id,$hash){
        $this->load->model('login_model');
        $this->load->library('form_validation');
        


        $config = array(
            array(
                'field' => 'contra1',
                'label' => 'contra1',
                'rules' => 'required'
            ),
            array(
                'field' => 'contra2',
                'label' => 'contra2',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);

        $datos=$this->login_model->getDatosMedianteId($id);
        $hashDB =sha1($datos->Dni);

        if($hash!=$hashDB) {
            echo "<h1>Has modificado la url</h1>";
            echo "<h3>Intentalo de nuevo sin hacer trampas</h3>";
        }
        else if($hash===$hashDB && $this->form_validation->run() == FALSE || $this->input->post('contra1')!==$this->input->post('contra2')){
            $this->load->view('template', [
                "cuerpo"=>$this->load->view("restablecerContra",[
                ],TRUE )
           ]); 
        }else{
                $this->load->model('login_model');
                $datos=$this->login_model->restablecerContra($this->input->post('contra1'),$id);
                redirect("", 'refresh');
            
        }
    }

    /*function restablecerContraseña(){
        $this->load->model('login_model');
        if($this->input->post('contra1')===$this->input->post('contra2')){
            $datos=$this->login_model->restablecerContra($this->input->post('contra1'));
        }
    }*/


}

//  <?php echo form_dropdown("provincias",db_result_to_array(get_provincias(),"cod","nombre","Seleccione provincia"),""); ?>