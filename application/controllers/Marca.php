<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Marca extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;
            $listadeshabilitados=$this->marca_model->listamarcasdeshabilitados();
            $data['marcadeshabilitados']=$listadeshabilitados;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('marca/marca_read',$data);
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
        $this->load->view('marca/marca_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombremarca',
            'Nombre de Marca',
            'required|min_length[3]|max_length[30]|alpha',
            array(
                'required'=>'Se requiere ingresar la categoría del producto.',
                'min_length'=>'La categoría debe tener al menos 3 caracteres.',
                'max_length'=>'¡La categoría no debe contener más de 30 caracteres!.',
                'alpha'=>'La categoría solo debe contener letras!'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('marca/marca_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['nombreMarca']=strtoupper($_POST['nombremarca']);
            $this->marca_model->agregarmarcas($data);
            redirect('marca/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $idmarca=$_POST['idmarca'];
        $this->marca_model->eliminarmarcas($idmarca);
        redirect('marca/index','refresh');
        
    }
        public function modificar()
    {
        $idmarca=$_POST['idmarca'];
        $data['infomarca']=$this->marca_model->recuperarmarcas($idmarca);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('marca/marca_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombremarca',
            'Nombre de Marca',
            'required|min_length[3]|max_length[30]|alpha',
            array(
                'required'=>'Se requiere ingresar la categoría del producto.',
                'min_length'=>'La categoría debe tener al menos 3 caracteres.',
                'max_length'=>'¡La categoría no debe contener más de 30 caracteres!.',
                'alpha'=>'La categoría solo debe contener letras!'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idmarca=$_POST['idmarca'];
            $data['infomarca']=$this->marca_model->recuperarmarcas($idmarca);
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('marca/marca_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $idmarca=$_POST['idmarca'];
            $data['nombreMarca']=strtoupper($_POST['nombremarca']);
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->marca_model->modificarmarcas($idmarca,$data);
            redirect('marca/index','refresh');
        }
    }

        public function deshabilitarbd($idmarca)
    {
        $data['estado']='0';
        $this->marca_model->modificarmarcas($idmarca,$data);
        redirect('marca/index','refresh');
    }

        public function habilitarbd()
    {
        $idmarca=$_POST['idmarca'];
        $data['estado']='1';
        $this->marca_model->modificarmarcas($idmarca,$data);
        redirect('marca/index','refresh');
    }

    /*queda pendiente modificar esta funcion*/
    public function guest()
    {
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('marca/producto_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
