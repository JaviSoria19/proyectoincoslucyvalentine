<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sucursal extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->sucursal_model->listasucursales();
            $data['sucursal']=$lista;
            $listadeshabilitados=$this->sucursal_model->listasucursalesdeshabilitados();
            $data['sucursaldeshabilitados']=$listadeshabilitados;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('sucursal/sucursal_read',$data);
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
        $this->load->view('sucursal/sucursal_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombresucursal',
            'Nombre de Sucursal',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar la sucursal del sucursal.',
                'min_length'=>'La sucursal debe tener al menos 3 caracteres.',
                'max_length'=>'¡La sucursal no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'direccion',
            'Dirección de la Sucursal',
            'required|min_length[6]|max_length[100]',
            array(
                'required'=>'Se requiere ingresar la sucursal del sucursal.',
                'min_length'=>'La sucursal debe tener al menos 6 caracteres.',
                'max_length'=>'¡La sucursal no debe contener más de 100 caracteres!.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('sucursal/sucursal_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['nombreSucursal']=$_POST['nombresucursal'];
            $data['direccion']=$_POST['direccion'];
            $this->sucursal_model->agregarsucursales($data);
            redirect('sucursal/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $idsucursal=$_POST['idsucursal'];
        $this->sucursal_model->eliminarsucursales($idsucursal);
        redirect('sucursal/index','refresh');
        
    }
        public function modificar()
    {
        $idsucursal=$_POST['idsucursal'];
        $data['infosucursal']=$this->sucursal_model->recuperarsucursales($idsucursal);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('sucursal/sucursal_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombresucursal',
            'Nombre de Sucursal',
            'required|min_length[2]|max_length[30]|alpha',
            array(
                'required'=>'Se requiere ingresar la sucursal del sucursal.',
                'min_length'=>'La sucursal debe tener al menos 2 caracteres.',
                'max_length'=>'¡La sucursal no debe contener más de 30 caracteres!.',
                'alpha'=>'La sucursal solo debe contener letras!'
                )
            );
        $this->form_validation->set_rules(
            'direccion',
            'Dirección de la Sucursal',
            'required|min_length[6]|max_length[100]',
            array(
                'required'=>'Se requiere ingresar la sucursal del sucursal.',
                'min_length'=>'La sucursal debe tener al menos 6 caracteres.',
                'max_length'=>'¡La sucursal no debe contener más de 100 caracteres!.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idsucursal=$_POST['idsucursal'];
            $data['infosucursal']=$this->sucursal_model->recuperarsucursales($idsucursal);
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('sucursal/sucursal_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idsucursal=$_POST['idsucursal'];
            $data['direccion']=$_POST['direccion'];
            $data['nombreSucursal']=$_POST['nombresucursal'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->sucursal_model->modificarsucursales($idsucursal,$data);
            redirect('sucursal/index','refresh');
        }
    }

        public function deshabilitarbd($idsucursal)
    {
        $data['estado']='0';
        $this->sucursal_model->modificarsucursales($idsucursal,$data);
        redirect('sucursal/index','refresh');
    }

        public function habilitarbd()
    {
        $idsucursal=$_POST['idsucursal'];
        $data['estado']='1';
        $this->sucursal_model->modificarsucursales($idsucursal,$data);
        redirect('sucursal/index','refresh');
    }

    /*queda pendiente modificar esta funcion*/
    public function guest()
    {
        $lista=$this->sucursal_model->listasucursales();
        $data['sucursal']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('sucursal/sucursal_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
