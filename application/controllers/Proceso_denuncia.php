<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proceso_denuncia extends CI_Controller {

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'comentario',
            'Comentario de la denuncia',
            'required|min_length[4]|max_length[200]',
            array(
                'required'=>'El comentario es obligatorio.',
                'min_length'=>'El comentario debe tener al menos 4 caracteres.',
                'max_length'=>'¡El comentario no debe contener más de 200 caracteres!.'
                )
            );
        if($this->form_validation->run()==FALSE)
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
        else{
            $data['idDenuncia']=$_POST['iddenuncia'];
            $data['estado']=$_POST['estado'];
            $data['idUsuarioResponsable']=$_POST['idusuarioresponsable'];
            $data['comentario']=$_POST['comentario'];
            $idDenuncia=$this->proceso_denuncia_model->agregarproceso_denuncia($data);
            redirect('proceso_denuncia/procesoRegistrado','refresh');
        }
    }

    public function procesoRegistrado()
    {
        $this->load->view('admin/inc/headergentelella');
        $this->load->view('admin/inc/sidebargentelella');
        $this->load->view('admin/inc/topbargentelella');
        $this->load->view('admin/denuncia/denuncia_proceso_insert');
        $this->load->view('admin/inc/creditosgentelella');
        $this->load->view('admin/inc/footergentelella');
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
            'comentario',
            'Comentario de la denuncia',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del denuncia.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
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
}
