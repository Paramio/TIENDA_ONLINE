<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Importar extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model("Productos");
		$this->load->model("Category_model");
    }

    public function importarCategorias(){
       
        $config['upload_path'] = './assets/xml';
        $config['file_name'] = time().'categorias.xml';
        $config['allowed_types']='xml';
            $this->load->library('upload',$config);
             
                  
                    if ( ! $this->upload->do_upload('xml_categorias')) { 
                        
                        $error = array('error' => $this->upload->display_errors()); 
                      var_dump($error);
                      die();
                    } else { 
                      
                        
         
                        $archivoCategoria = simplexml_load_file('./assets/xml/'.$config['file_name']);
                        
                    
                        foreach($archivoCategoria->categoria as $datos) {
                           
                                    $data= array(
                                        'Id'=>$datos->id,
                                        'Nombre'=>$datos->nombre,
                                        'Descripcion'=>$datos->descripcion,
                                        'Visible'=>$datos->visible,
                                    );
                             
                                    $this->Category_model->importarCategorias($data);
                                }
                       
                    } 
                
           
           
           
          
    }

    public function importarProductos(){
       
        $config['upload_path'] = './assets/xml';
        $config['file_name'] = time().'productos.xml';
        $config['allowed_types']='xml';
            $this->load->library('upload',$config);
             
                  
                    if ( ! $this->upload->do_upload('xml_productos')) { 
                        
                        $error = array('error' => $this->upload->display_errors()); 
                      var_dump($error);
                      die();
                    } else { 
                      
                        
         
                        $archivoCategoria = simplexml_load_file('./assets/xml/'.$config['file_name']);
                        
                    
                        foreach($archivoCategoria->producto as $datos) {
                          
                                    $data= array(
                                        'Id'=>$datos->id,
                                        'Codigo'=>$datos->codigo,
                                        'Nombre'=>$datos->nombre,
                                        'Descripcion'=>$datos->descripcion,
                                        'Precio'=>$datos->precio,
                                        'Stock'=>$datos->stock,
                                        'Descuento'=>$datos->descuento,
                                        'Imagen'=>$datos->imagen,
                                        'Iva'=>$datos->iva,
                                        'Visible'=>$datos->visible,
                                        'Destacado'=>$datos->destacado,
                                        'Fecha_Inicio'=>$datos->fecha_inicio,
                                        'Fecha_Final'=>$datos->fecha_final,
                                        'Categoria_Id'=>$datos->categoria_id,
                                    );
                             
                                    $this->Productos->importarProductos($data);
                                }
                               
                       
                    } 
                
                  
           
          
    }

    public function vista_importar(){


        $pag=$this->load->view("import_categorias",[
        ],TRUE);

        $this->load->view("template",[
            'cuerpo'=>$pag]);

    }

    public function vista_importar2(){


        $pag=$this->load->view("import_productos",[
        ],TRUE);

        $this->load->view("template",[
            'cuerpo'=>$pag]);

    }

    public function exportarCategorias(){
        $categorias=$this->Category_model->getCategorias();

        
        $cuerpo=$this->load->view("xmlcategorias",[
            'categorias'=>$categorias
        ]);  
    }

    public function exportarProductos(){
        $productos=$this->Productos->get_all_products();

        
        $cuerpo=$this->load->view("xmlproductos",[
            'productos'=>$productos
        ]);  
    }
	
}
