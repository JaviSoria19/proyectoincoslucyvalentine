<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departamento extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->departamento_model->listadepartamentos();
            $data['departamento']=$lista;
            $listadeshabilitados=$this->departamento_model->listadepartamentosdeshabilitados();
            $data['departamentodeshabilitados']=$listadeshabilitados;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('departamento/departamento_read',$data);
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
        $this->load->view('departamento/departamento_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombredepartamento',
            'Nombre de Departamento',
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
            $this->load->view('departamento/departamento_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['nombreDepartamento']=$_POST['nombredepartamento'];
            $this->departamento_model->agregardepartamentos($data);
            redirect('departamento/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $iddepartamento=$_POST['iddepartamento'];
        $this->departamento_model->eliminardepartamentos($iddepartamento);
        redirect('departamento/index','refresh');
        
    }
        public function modificar()
    {
        $iddepartamento=$_POST['iddepartamento'];
        $data['infodepartamento']=$this->departamento_model->recuperardepartamentos($iddepartamento);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('departamento/departamento_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombredepartamento',
            'Nombre de Departamento',
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
            $iddepartamento=$_POST['iddepartamento'];
            $data['infodepartamento']=$this->departamento_model->recuperardepartamentos($iddepartamento);
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('departamento/departamento_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $iddepartamento=$_POST['iddepartamento'];
            $data['nombreDepartamento']=$_POST['nombredepartamento'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->departamento_model->modificardepartamentos($iddepartamento,$data);
            redirect('departamento/index','refresh');
        }
    }

        public function deshabilitarbd($iddepartamento)
    {
        $data['estado']='0';
        $this->departamento_model->modificardepartamentos($iddepartamento,$data);
        redirect('departamento/index','refresh');
    }

        public function habilitarbd()
    {
        $iddepartamento=$_POST['iddepartamento'];
        $data['estado']='1';
        $this->departamento_model->modificardepartamentos($iddepartamento,$data);
        redirect('departamento/index','refresh');
    }

    /*queda pendiente modificar esta funcion*/
    public function guest()
    {
        $lista=$this->departamento_model->listadepartamentos();
        $data['departamento']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('departamento/producto_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
