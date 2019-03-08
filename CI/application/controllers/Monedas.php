<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monedas extends CI_Controller {

    public function monedas(){
        $xml = simplexml_load_file("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml%22");
        //$namemoneda=[];
        //$monedavalor=[];
        $monedas= [];
        foreach ($xml->Cube->Cube->Cube as $c) {
            $attr = $c->attributes();
            //echo "Un euro equivale a ".$attr[1]." ".$attr[0]."<br>";
            $monedas[(string)$attr[0]]=(double)$attr[1];
    
        }
    
        $this->session->set_userdata('monedas',$monedas);

    }
}


    

