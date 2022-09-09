<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->cliente_model->listaclientes();
        $data['cliente']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('cliente/cliente_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');

        /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
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
        $this->load->view('cliente/cliente_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

        public function agregarbd()
    {
        $this->load->library('form_validation');

        //atributo, 
        //Alias(ponle cualquier wea),
        //atributos de control, array -> asignar mensajes clientelizados al atributo de control.
        $this->form_validation->set_rules(
            'nombres',
            'Nombre del cliente',
            'required|min_length[4]|max_length[30]',
            array('required'=>'Se requiere ingresar el nombre del cliente.',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'primerapellido',
            'Primer apellido del cliente',
            'required|min_length[4]|max_length[30]|alpha',
            array('required'=>'Se requiere ingresar el primer apellido del cliente.',
                'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'segundoapellido',
            'Segundo apellido del cliente',
            'min_length[4]|max_length[30]|alpha',
            array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'numerocelular',
            'Número de Celular del cliente',
            'exact_length[8]|is_natural',
            array('exact_length'=>'¡Ingrese un número de celular válido!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );
        $this->form_validation->set_rules(
            'numeroci',
            'Número de Carnet del cliente',
            'min_length[6]|max_length[8]|is_natural',
            array('min_length'=>'¡Ingrese un número de carnet válido!.',
                'max_length'=>'¡El número de carnet no debe contener más de 8 caracteres!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/cliente_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $data['nombres']=$_POST['nombres'];
            $data['primerApellido']=$_POST['primerapellido'];
            $data['segundoApellido']=$_POST['segundoapellido'];
            $data['numeroCelular']=$_POST['numerocelular'];
            $data['numeroCI']=$_POST['numeroci'];
            $idPersona=$this->persona_model->agregarpersonas($data);
            $datatwo['idPersona']=$idPersona;
            $this->cliente_model->agregarclientes($datatwo);
            redirect('cliente/index','refresh');
        }

        
        
    }

        public function eliminarbd()
    {
        $idcliente=$_POST['idcliente'];
        $this->cliente_model->eliminarclientes($idcliente);
        redirect('cliente/index','refresh');
        
    }
        public function modificar()
    {
        $idcliente=$_POST['idcliente'];
        $data['infocliente']=$this->cliente_model->recuperarclientes($idcliente);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('cliente/cliente_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $idcliente=$_POST['idcliente'];
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerapellido'];
        $data['segundoApellido']=$_POST['segundoapellido'];
        $data['numeroCelular']=$_POST['numerocelular'];
        $data['numeroCI']=$_POST['numeroci'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');

        $this->cliente_model->modificarclientes($idcliente,$data);
        redirect('cliente/index','refresh');
    }

        public function deshabilitarbd($idcliente)
    {
        $data['estado']='0';
        $this->cliente_model->modificarclientes($idcliente,$data);
        redirect('cliente/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->cliente_model->listaclientesdeshabilitados();
        $data['cliente']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('cliente/cliente_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idcliente=$_POST['idcliente'];
        $data['estado']='1';

        $this->cliente_model->modificarclientes($idcliente,$data);
        redirect('cliente/deshabilitados','refresh');
    }

  }
