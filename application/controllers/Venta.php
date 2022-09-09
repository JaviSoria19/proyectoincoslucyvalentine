<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Venta extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->venta_model->listaventas();
            $data['venta']=$lista;
            $listadeshabilitados=$this->venta_model->listaventasdeshabilitados();
            $data['ventadeshabilitados']=$listadeshabilitados;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('venta/venta_read',$data);
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
      
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('venta/venta_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombreventa',
            'Nombre de Venta',
            'required|min_length[2]|max_length[30]|alpha',
            array(
                'required'=>'Se requiere ingresar la categoría del producto.',
                'min_length'=>'La categoría debe tener al menos 2 caracteres.',
                'max_length'=>'¡La categoría no debe contener más de 30 caracteres!.',
                'alpha'=>'La categoría solo debe contener letras!'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('venta/venta_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['nombreVenta']=$_POST['nombreventa'];
            $this->venta_model->agregarventas($data);
            redirect('venta/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $idventa=$_POST['idventa'];
        $this->venta_model->eliminarventas($idventa);
        redirect('venta/index','refresh');
        
    }
        public function modificar()
    {
        $idventa=$_POST['idventa'];
        $data['infoventa']=$this->venta_model->recuperarventas($idventa);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('venta/venta_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombreventa',
            'Nombre de Venta',
            'required|min_length[2]|max_length[30]|alpha',
            array(
                'required'=>'Se requiere ingresar la categoría del producto.',
                'min_length'=>'La categoría debe tener al menos 2 caracteres.',
                'max_length'=>'¡La categoría no debe contener más de 30 caracteres!.',
                'alpha'=>'La categoría solo debe contener letras!'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idventa=$_POST['idventa'];
            $data['infoventa']=$this->venta_model->recuperarventas($idventa);
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('venta/venta_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idventa=$_POST['idventa'];
            $data['nombreVenta']=$_POST['nombreventa'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->venta_model->modificarventas($idventa,$data);
            redirect('venta/index','refresh');
        }
    }

        public function deshabilitarbd($idventa)
    {
        $data['estado']='0';
        $this->venta_model->modificarventas($idventa,$data);
        redirect('venta/index','refresh');
    }

        public function habilitarbd()
    {
        $idventa=$_POST['idventa'];
        $data['estado']='1';
        $this->venta_model->modificarventas($idventa,$data);
        redirect('venta/index','refresh');
    }

    /*queda pendiente modificar esta funcion*/
    public function guest()
    {
        $lista=$this->venta_model->listaventas();
        $data['venta']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('venta/producto_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
