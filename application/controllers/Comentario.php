<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Comentario extends CI_Controller {

    public function agregarbd()
    {
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['idPublicacion']=$_POST['idpublicacion'];
        $data['comentario']=$_POST['comentario'];
        $this->comentario_model->agregarcomentarios($data);
        redirect('publicacion/indexStaff','refresh');
    }

        public function eliminarbd()
    {
        $idcomentario=$_POST['idcomentario'];
        $this->comentario_model->eliminarcomentarios($idcomentario);
        redirect('publicacion/visualizar_post','refresh');        
    }
        public function modificar()
    {
        $idcomentario=$_POST['idcomentario'];
        $data['infocomentario']=$this->comentario_model->recuperarcomentarios($idcomentario);
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('comentario/comentario_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombrecomentario',
            'Nombre del comentario',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del comentario.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del comentario',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del comentario.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del comentario',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del comentario.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del comentario',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del comentario.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del comentario',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del comentario! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idcomentario=$_POST['idcomentario'];
            $data['infocomentario']=$this->comentario_model->recuperarcomentarios($idcomentario);
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;  
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('comentario/comentario_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idcomentario=$_POST['idcomentario'];
            //inicio lógica de guardado de archivos
            $nombrearchivo=$idcomentario."product.jpg";
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
                $data['nombreComentario']=$_POST['nombrecomentario'];
                $data['idMarca']=strtoupper($_POST['idmarca']);
                $data['idCategoria']=$_POST['idcategoria'];
                $data['precio']=$_POST['precio'];
                $data['color']=$_POST['color'];
                $data['stock']=$_POST['stock'];
                $data['descripcion']=$_POST['descripcion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                $this->comentario_model->modificarcomentarios($idcomentario,$data);
                redirect('comentario/index','refresh');
        }
    }

        public function deshabilitarbd($idcomentario)
    {
        $data['estado']='0';
        $this->comentario_model->modificarcomentarios($idcomentario,$data);
        redirect('comentario/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->comentario_model->listacomentariosdeshabilitados();
        $data['comentario']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('comentario/comentario_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idcomentario=$_POST['idcomentario'];
        $data['estado']='1';
        $this->comentario_model->modificarcomentarios($idcomentario,$data);
        redirect('comentario/deshabilitados','refresh');
    }


    public function guest()
    {
        $lista=$this->comentario_model->listacomentarios();
        $data['comentario']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('comentario/comentario_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
