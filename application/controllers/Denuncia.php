<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Denuncia extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin'){
            $lista=$this->denuncia_model->listadenuncias();
            $data['denuncia']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }elseif($this->session->userdata('rol')=='usuario'){
            $idusuario=$this->session->userdata('idusuario');
            $lista=$this->denuncia_model->recuperardenunciasusuario($idusuario);
            $data['historial']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/denuncia/denuncia_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }
	}
    public function visualizar_detalles()
    {
        $iddenuncia=$_POST['iddenuncia'];
        $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
        $data['proceso']=$this->proceso_denuncia_model->listaproceso_denuncias($iddenuncia);
        $data['listaautoridadpolicia']=$this->usuario_model->listaUsuariosPoliciayAutoridad();
        $this->load->view('admin/inc/headergentelella');
        $this->load->view('admin/inc/sidebargentelella');
        $this->load->view('admin/inc/topbargentelella');
        $this->load->view('admin/denuncia/denuncia_read_detalles',$data);
        $this->load->view('admin/inc/creditosgentelella');
        $this->load->view('admin/inc/footergentelella');
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
        $this->load->view('denuncia/denuncia_insert',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombredenuncia',
            'Nombre del denuncia',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del denuncia.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del denuncia',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del denuncia.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del denuncia',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del denuncia.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del denuncia',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del denuncia.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del denuncia',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del denuncia! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
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
            $this->load->view('denuncia/denuncia_insert',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['idCategoria']=$_POST['idcategoria'];
            $data['declaracion']=$_POST['declaracion'];
            $data['foto']=$_POST['foto'];
            $data['audio']=$_POST['audio'];
            $data['video']=$_POST['video'];
            $idDenuncia=$this->denuncia_model->agregardenuncias($data);

            $datatwo['idDenuncia']=$idDenuncia;
            $datatwo['idUsuarioResponsable']=$_POST['color'];
            $datatwo['comentario']=$_POST['color'];
            $this->proceso_denuncia_model->agregarproceso_denuncia($datatwo);
            redirect('denuncia/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $iddenuncia=$_POST['iddenuncia'];
        $this->denuncia_model->eliminardenuncias($iddenuncia);
        redirect('denuncia/index','refresh');
        
    }
        public function modificar()
    {
        $iddenuncia=$_POST['iddenuncia'];
        $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('denuncia/denuncia_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombredenuncia',
            'Nombre del denuncia',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del denuncia.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del denuncia',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del denuncia.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del denuncia',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del denuncia.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del denuncia',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del denuncia.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del denuncia',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del denuncia! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $iddenuncia=$_POST['iddenuncia'];
            $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;  
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('denuncia/denuncia_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $iddenuncia=$_POST['iddenuncia'];
            //inicio lógica de guardado de archivos
            $nombrearchivo=$iddenuncia."product.jpg";
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
                $data['nombreDenuncia']=$_POST['nombredenuncia'];
                $data['idMarca']=strtoupper($_POST['idmarca']);
                $data['idCategoria']=$_POST['idcategoria'];
                $data['precio']=$_POST['precio'];
                $data['color']=$_POST['color'];
                $data['stock']=$_POST['stock'];
                $data['descripcion']=$_POST['descripcion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                $this->denuncia_model->modificardenuncias($iddenuncia,$data);
                redirect('denuncia/index','refresh');
        }
    }

        public function deshabilitarbd($iddenuncia)
    {
        $data['estado']='0';
        $this->denuncia_model->modificardenuncias($iddenuncia,$data);
        redirect('denuncia/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->denuncia_model->listadenunciasdeshabilitados();
        $data['denuncia']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('denuncia/denuncia_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $iddenuncia=$_POST['iddenuncia'];
        $data['estado']='1';
        $this->denuncia_model->modificardenuncias($iddenuncia,$data);
        redirect('denuncia/deshabilitados','refresh');
    }


    public function guest()
    {
        $lista=$this->denuncia_model->listadenuncias();
        $data['denuncia']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('denuncia/denuncia_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
