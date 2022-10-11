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
        if($this->form_validation->run()==FALSE)
        {
            $idcomentario=$_POST['idcomentario'];
            $data['infocomentario']=$this->comentario_model->recuperarcomentarios($idcomentario);
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

  }
