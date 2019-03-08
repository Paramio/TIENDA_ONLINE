<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Model {

	public function __construct() { 
		$this->load->database(); 
	}


    /** Método encargado de realizar el pedido, creando el pedido en la base de datos y
     * sus respectivas lineas de pedido. Además resta la cantidad del pedido del stock 
     * total de cada producto y envia un email al correo del usuario que ha realizado 
     * la compra.*/
    public function terminarpedido(){
        $pedido=[
            'Usuarios_Id' => $this->session->userdata("id"),
            'Dni' => $this->session->userdata("dni"),
            'Nombre' => $this->session->userdata("nombre"),
            'Apellidos' =>$this->session->userdata("apellidos"),
            'Nombre_Usuario' => $this->session->userdata("nombre_usuario"),
            'Contraseña' => $this->session->userdata("pass"),
            'Direccion' => $this->session->userdata("direccion"),
            'Cp' => $this->session->userdata("cp"),
            'Provincia' => $this->session->userdata("provincia"),
            'Email' => $this->session->userdata("email"),
            'Estado' =>"P",
            'Fecha'=>date("Y/m/d"),
        ];

        $query= $this->db->insert('pedidos',$pedido);

        $idpedido=$this->db->query('SELECT Id FROM pedidos ORDER by Id DESC LIMIT 1');

        $idpedido=$idpedido->row();

        foreach ($this->cart->contents() as $item) {
            $linea=[
                'Pedido_Id' => $idpedido->Id,
                'Productos_Id' => $item['id'],
                'Cantidad' => $item['qty'],
                'Subtotal' => $item['subtotal'],
                'Precio' => $item['price'],
                'Nombre_producto' => $item['name'],
                'Imagen' => $item['img']
            ];

            $query= $this->db->insert('linea_pedidos',$linea);
            $this->subtractQty($item['id'],$item['qty']);
          

        }
                
       
        $this->load->library('email','','correo');
        $configuraciones['mailtype']='html';
        $this->correo->initialize($configuraciones);
        $this->correo->from('practicasantonioparamio@gmail.com', 'Paramio');
        $this->correo->to($this->session->userdata("email"));
        $cuerpo="Id Pedido:".$idpedido->Id.$this->load->view('plantilla_compra',"",TRUE);
        $this->correo->subject("Pedido");
    
        $this->load->library('Pdf');
      
        $mpdf = new \Mpdf\Mpdf();
        //$mpdf->SetHeader();
        $mpdf->WriteHTML($cuerpo);
        $mpdf->Output("Resumen.pdf");

        $pdfFilePath = FCPATH . 'attach\pdfs'.$idpedido->Id.'.pdf';
        $this->correo->attach('C:\Users\anton\Documents\Multiboot_Cache\Nueva_carpeta\htdocs\TIENDA_ONLINE\CI\application\assets\pdf'.$idpedido->Id.'.pdf', 'attachment', 'Factura'.$idpedido->Id.'.pdf');
        $this->correo->message($cuerpo);
        if($this->correo->send())
        {
         
        }else
        {
        show_error($this->correo->print_debugger());
        }
            $this->cart->destroy();
            redirect("", 'refresh');
           
    }

    /** Método encargado de comprobar si hay stock suficiente para el pedido que se está a punto
     * de realizar. En el caso de que el usuario intente pedir una cantidad mayor a la que existe
     * en el stock se le reducirá la cantidad en el carrito, al igual que si a la hora de finalizar
     * el pedido el stock varia debido a que otro usuario compre ese mismo producto.*/
    public function compruebastock(){
     

        foreach ($this->cart->contents() as $item) {
            $dato=$this->db->query('SELECT * FROM productos WHERE Id='.$item['id']);
            $dato=$dato->row();

            if($item['qty']>$dato->Stock){
                $data = array(
                    'rowid'   => $item['rowid'],
                    'qty'     => $dato->Stock,
                    'stock' =>"No hay stock"
                );
                $this->cart->update($data);
             
            }else{
                    $data = array(
                        'rowid'   => $item['rowid'],
                        'stock' =>"Hay stock"
                    );
                    $this->cart->update($data);
                   
                }
              

            }

        }

        /** Método encargado de descontar la cantidad del pedido del stock total de cada producto */
        public function subtractQty($id,$restar){
            $productos = $this->db->query("SELECT * FROM productos WHERE Id=".$id);
            $productos=$productos->row();
            $datos=[
                'Stock'=>$productos->Stock-$restar,
            ];
            $query = $this->db
                 ->where('Id', $id)
                ->update("productos", $datos);
        }

         /** Método encargado de aumentar la cantidad del stock total del producto después de cancelar un pedido */
        public function addQty($id,$sumar){
            $productos = $this->db->query("SELECT * FROM productos WHERE Id=".$id);
            $productos=$productos->row();
            $datos=[
                'Stock'=>$productos->Stock+$sumar,
            ];
            $query = $this->db
                 ->where('Id', $id)
                ->update("productos", $datos);
        }


        /** Método encargado de obtener todos los pedidos de un usuario determinado */
        public function muestra_pedidos(){
  
            $pedidos = $this->db->query("SELECT * FROM pedidos  WHERE Usuarios_Id=".$this->session->userdata("id")." ORDER BY Id DESC");
            return $pedidos->result();
        }

        /** Método encargado de obtener todas las lineas de productos de un pedido en concreto */
        public function muestra_lineas($id){
            $lineas = $this->db->query("SELECT * FROM linea_pedidos WHERE Pedido_Id=".$id);
            return $lineas->result();
        }

        /** Método encargado de anular un pedido llamando a su vez al método addQty() para recuperar el stock
         * previsto para el pedido que acaba de anularse */
        public function anular_pedido($id){
    
            $datos=[
                'Estado'=>'A',
            ];
            $query = $this->db
                 ->where('Id', $id ,'Estado', 'P')
                ->update("pedidos", $datos);

                $lineas = $this->db->query("SELECT * FROM linea_pedidos WHERE Pedido_Id=".$id);
                $lineas=$lineas->result();
                foreach($lineas as $producto){
                    $this->addQty($producto->Productos_Id,$producto->Cantidad);
                }
        
        }

    
    }

        
      