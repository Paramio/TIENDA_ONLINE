<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}


	
	public function getDescuentosiva($descuento, $iva, $precio){

        $precioiva=$precio*0.21;
        if($descuento>0){
        $preciodescuento=$precio/$descuento;}
        else{
            $preciodescuento=0;
        }
        $preciofin=$precioiva + $preciodescuento+$precio;
        
        if($this->session->userdata('current_divisa')==null){
            $preciofin=$this->session->userdata('monedas')['EUR'];
            $this->session->set_userdata('current_divisa','EUR');
        }else{
            $preciofin*=$this->session->userdata('monedas')[$this->session->userdata('current_divisa')];
        }
        $preciofin=round($preciofin);
        return $preciofin;
    }
}