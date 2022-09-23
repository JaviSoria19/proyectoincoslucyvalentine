<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Publicacion extends CI_Controller {

	public function indexStaff()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->publicacion_model->listaPublicacionesStaff();
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_staff',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='usuario') {
            $lista=$this->publicacion_model->listaPublicacionesStaff();
            $data['publicacion']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_staff',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}
    public function indexComunidad()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->publicacion_model->listaPublicacionesComunidad();
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $lista=$this->publicacion_model->listaPublicacionesComunidad();
            $data['publicacion']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function visualizar_post()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
        $lista=$this->comentario_model->listacomentarios($idpublicacion);
        $data['infocomentarios']=$lista;
        $this->load->view('admin/inc/headergentelella');
        $this->load->view('admin/inc/sidebargentelella');
        $this->load->view('admin/inc/topbargentelella');
        $this->load->view('admin/publicacion/publicacion_read_post',$data);
        $this->load->view('admin/inc/creditosgentelella');
        $this->load->view('admin/inc/footergentelella');
    }
    public function adminAgregar()
	{
        $this->load->view('admin/inc/headergentelella');
        $this->load->view('admin/inc/sidebargentelella');
        $this->load->view('admin/inc/topbargentelella');
        $this->load->view('admin/publicacion/publicacion_insert_staff');
        $this->load->view('admin/inc/creditosgentelella');
        $this->load->view('admin/inc/footergentelella');
	}

    public function adminAgregarStaffbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'titulo',
            'Titulo de la publicación',
            'required',
            array(
                'required'=>'Se requiere ingresar el nombre del publicacion.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_insert_staff');
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else{
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['fotoPublicacion']='publicacion_default.png';
            $data['titulo']=$_POST['titulo'];
            $data['contenido']=$_POST['contenido'];

            $this->publicacion_model->agregarpublicaciones($data);
            redirect('publicacion/indexStaff','refresh');
        }
    }

        public function eliminarbd()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $this->publicacion_model->eliminarpublicaciones($idpublicacion);
        redirect('publicacion/index','refresh');
        
    }
        public function modificar()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('publicacion/publicacion_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombrepublicacion',
            'Nombre del publicacion',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del publicacion.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del publicacion',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del publicacion.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del publicacion',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del publicacion.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del publicacion',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del publicacion.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del publicacion',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del publicacion! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idpublicacion=$_POST['idpublicacion'];
            $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;  
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('publicacion/publicacion_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idpublicacion=$_POST['idpublicacion'];
            //inicio lógica de guardado de archivos
            $nombrearchivo=$idpublicacion."product.jpg";
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
                $data['nombrePublicacion']=$_POST['nombrepublicacion'];
                $data['idMarca']=strtoupper($_POST['idmarca']);
                $data['idCategoria']=$_POST['idcategoria'];
                $data['precio']=$_POST['precio'];
                $data['color']=$_POST['color'];
                $data['stock']=$_POST['stock'];
                $data['descripcion']=$_POST['descripcion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
                redirect('publicacion/index','refresh');
        }
    }

        public function deshabilitarbd($idpublicacion)
    {
        $data['estado']='0';
        $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
        redirect('publicacion/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->publicacion_model->listapublicacionesdeshabilitados();
        $data['publicacion']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('publicacion/publicacion_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['estado']='1';
        $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
        redirect('publicacion/deshabilitados','refresh');
    }


    public function guest()
    {
        $lista=$this->publicacion_model->listapublicaciones();
        $data['publicacion']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('publicacion/publicacion_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
