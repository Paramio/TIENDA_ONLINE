<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /** Método encargado de comprobar si el inicio de sesion del usuario en la web es correcto,
     * si el login es correcto genera una session con los datos del usuario.
     */
    function loginok($nombre_usuario, $contra) {

        $query = $this->db->get_where('usuarios', array('Nombre_Usuario' => $nombre_usuario, 'Contraseña' =>  $contra, 'Activo'=>0));

        if ($query->num_rows() > 0) {
            $this->login_model->add_usuario_session($query->row());
            return true;
        } else {
            return false;
        }
    }

    /** Método encargado de añadir los datos del usuario logeado en sesiones*/
    function add_usuario_session($query) {
        $newdata = array(
            'id' => $query->Id,
            'dni' => $query->Dni,
            'nombre' => $query->Nombre,
            'apellidos' => $query->Apellidos,
            'nombre_usuario' => $query->Nombre_Usuario,
            'pass' => $query->Contraseña,
            'direccion' => $query->Direccion,
            'cp' => $query->Cp,
            'provincia' => $query->Provincia,
            'email' => $query->Email,
            'dentro' => TRUE,
            'tipo' => $query->Tipo
        );
        $this->session->set_userdata($newdata);
    }

    /** Método encargado de cerrar sesion */
    function cerrar_session() {
         $newdata = array(
            'nombre_usuario' => "",
            'pass' => "",
            'dentro' => FALSE
       ); 
        $this->session->set_userdata($newdata);
    }

    /** Método encargado de comprobar si existe una sesion o usuario dentro del sistema */
    function esta_dentro() {
      if($this->session->userdata("dentro")==true)
            return true;
        else 
        return false;
        }
    

    /** Método encargado de añadir un usuario a la base de datos */
    function añadir_usuario($array){
        
        $this->db->insert('usuarios', $array);
      
      }

    /** Método encargado de obtener la información de las provincias para 
     * luego utilizarlas en el controlador para la creación de un select */
    function creaSelect(){
        $query = $this->db->query("SELECT nombre FROM provincias");
		return $query->result();
    }

    /** Método encargado de obtener la información de un usuario por su email,
     * este método lo utilizamos para comprobar que cuando un usuario decide
     * recuperar su contraseña el correo que introduce se corresponde con el de algún
     * usuario de la base de datos. Los datos que obtenemos de la query los utilizaremos
     * luego para generar un correo con encriptación para que dicho usuario pueda recuperar
     * su cuenta.
     */
    function recuCorreo($email){
        $query = $this->db->get_where('usuarios', array('Email' => $email));
       
        if($query->row()){
             return $query->row();
        }else{
            return FALSE;
        }
    }

    /** Método encargado de obtener todos los datos de un usuario por su id */
    function getDatosMedianteId($id){
        $query = $this->db->get_where('usuarios', array('Id' => $id));
        return $query->row();
    }

    /** Método encargado de actualizar la contraseña de un usuario que acaba de cambiarla
     * mediante el email de recuperación de cuenta.
     */
    function restablecerContra($contra,$id){
        $datos=[
            'Contraseña'=>$contra,

        ];
        $query = $this->db
             ->where('Id', $id)
            ->update("usuarios", $datos);
    }

}