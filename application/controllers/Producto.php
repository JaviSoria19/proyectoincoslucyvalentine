<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->producto_model->listaproductos();
            $data['producto']=$lista;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_read',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}
    public function agregar()
	{
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_insert',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombreproducto',
            'Nombre del producto',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del producto.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del producto',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del producto.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del producto',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del producto.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del producto',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del producto.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del producto',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del producto! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_insert',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['nombreProducto']=$_POST['nombreproducto'];
            $data['idMarca']=strtoupper($_POST['idmarca']);
            $data['idCategoria']=$_POST['idcategoria'];
            $data['precio']=$_POST['precio'];
            $data['color']=$_POST['color'];
            $data['stock']=$_POST['stock'];
            $data['descripcion']=$_POST['descripcion'];
            $this->producto_model->agregarproductos($data);
            redirect('producto/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $idproducto=$_POST['idproducto'];
        $this->producto_model->eliminarproductos($idproducto);
        redirect('producto/index','refresh');
        
    }
        public function modificar()
    {
        $idproducto=$_POST['idproducto'];
        $data['infoproducto']=$this->producto_model->recuperarproductos($idproducto);
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombreproducto',
            'Nombre del producto',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del producto.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del producto',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del producto.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del producto',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del producto.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del producto',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del producto.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del producto',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del producto! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idproducto=$_POST['idproducto'];
            $data['infoproducto']=$this->producto_model->recuperarproductos($idproducto);
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;  
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idproducto=$_POST['idproducto'];
            //inicio lógica de guardado de archivos
            $nombrearchivo=$idproducto."product.jpg";
            $config['upload_path']='./uploads';
            $config['file_name']=$nombrearchivo;
            $direccion="./uploads/".$nombrearchivo;

            if(file_exists($direccion))
            {
                unlink($direccion);
            }
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload())
            {
            $data['error']=$this->upload->display_errors();
            }
            else
            {
                $data['foto']=$nombrearchivo;
                $this->upload->data();
            }
                $data['nombreProducto']=$_POST['nombreproducto'];
                $data['idMarca']=strtoupper($_POST['idmarca']);
                $data['idCategoria']=$_POST['idcategoria'];
                $data['precio']=$_POST['precio'];
                $data['color']=$_POST['color'];
                $data['stock']=$_POST['stock'];
                $data['descripcion']=$_POST['descripcion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                $this->producto_model->modificarproductos($idproducto,$data);
                redirect('producto/index','refresh');
        }
    }

        public function deshabilitarbd($idproducto)
    {
        $data['estado']='0';
        $this->producto_model->modificarproductos($idproducto,$data);
        redirect('producto/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->producto_model->listaproductosdeshabilitados();
        $data['producto']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idproducto=$_POST['idproducto'];
        $data['estado']='1';
        $this->producto_model->modificarproductos($idproducto,$data);
        redirect('producto/deshabilitados','refresh');
    }


    public function guest()
    {
        $lista=$this->producto_model->listaproductos();
        $data['producto']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
