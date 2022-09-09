<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->empleado_model->listaempleados();
        $data['empleado']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_read',$data);
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
        $lista=$this->sucursal_model->listasucursales();
        $data['sucursal']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_insert',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

        public function agregarbd()
    {
        $this->load->library('form_validation');

        //atributo, 
        //Alias(ponle cualquier wea),
        //atributos de control, array -> asignar mensajes empleadolizados al atributo de control.
        $this->form_validation->set_rules(
            'nombres',
            'Nombre del empleado',
            'required|min_length[4]|max_length[30]',
            array('required'=>'Se requiere ingresar el nombre del empleado.',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'primerapellido',
            'Primer apellido del empleado',
            'required|min_length[4]|max_length[30]|alpha',
            array('required'=>'Se requiere ingresar el primer apellido del empleado.',
                'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'segundoapellido',
            'Segundo apellido del empleado',
            'min_length[4]|max_length[30]',
            array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'numerocelular',
            'Número de Celular del empleado',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del empleado.',
                'exact_length'=>'¡Ingrese un número de celular válido!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );
        $this->form_validation->set_rules(
            'numeroci',
            'Número de Carnet del empleado',
            'required|min_length[6]|max_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el C.I. del empleado.',
                'min_length'=>'¡Ingrese un número de carnet válido!.',
                'max_length'=>'¡El número de carnet no debe contener más de 8 caracteres!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );

        if($this->form_validation->run()==FALSE)
        {
            $lista=$this->sucursal_model->listasucursales();
            $data['sucursal']=$lista;
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('empleado/empleado_insert',$data);
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
            
            $datatwo['sexo']=$_POST['sexo'];
            $datatwo['idSucursal']=$_POST['idsucursal'];
            $datatwo['idPersona']=$idPersona;
            $this->empleado_model->agregarempleados($datatwo);
            redirect('empleado/index','refresh');
        }

        
    }

        public function eliminarbd()
    {
        $idempleado=$_POST['idempleado'];
        $this->empleado_model->eliminarempleados($idempleado);
        redirect('empleado/index','refresh');
        
    }
        public function modificar()
    {
        $idempleado=$_POST['idempleado'];
        $data['infoempleado']=$this->empleado_model->recuperarempleados($idempleado);
        $lista=$this->sucursal_model->listasucursales();
        $data['sucursal']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombres',
            'Nombre del empleado',
            'required|min_length[4]|max_length[30]',
            array('required'=>'Se requiere ingresar el nombre del empleado.',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'primerapellido',
            'Primer apellido del empleado',
            'required|min_length[4]|max_length[30]|alpha',
            array('required'=>'Se requiere ingresar el primer apellido del empleado.',
                'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'segundoapellido',
            'Segundo apellido del empleado',
            'min_length[4]|max_length[30]',
            array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'numerocelular',
            'Número de Celular del empleado',
            'required|exact_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el Nro. Celular del empleado.',
                'exact_length'=>'¡Ingrese un número de celular válido!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );
        $this->form_validation->set_rules(
            'numeroci',
            'Número de Carnet del empleado',
            'required|min_length[6]|max_length[8]|is_natural',
            array('required'=>'Se requiere ingresar el C.I. del empleado.',
                'min_length'=>'¡Ingrese un número de carnet válido!.',
                'max_length'=>'¡El número de carnet no debe contener más de 8 caracteres!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );

        if($this->form_validation->run()==FALSE)
        {
            $idempleado=$_POST['idempleado'];
            $data['infoempleado']=$this->empleado_model->recuperarempleados($idempleado);
            $lista=$this->sucursal_model->listasucursales();
            $data['sucursal']=$lista;
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('empleado/empleado_update',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $idempleado=$_POST['idempleado'];
            $data['idSucursal']=$_POST['idsucursal'];
            $data['nombres']=$_POST['nombres'];
            $data['primerApellido']=$_POST['primerapellido'];
            $data['segundoApellido']=$_POST['segundoapellido'];
            $data['numeroCelular']=$_POST['numerocelular'];
            $data['numeroCI']=$_POST['numeroci'];
            $data['sexo']=$_POST['sexo'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->empleado_model->modificarempleados($idempleado,$data);
            redirect('empleado/index','refresh');
        }
    }

        public function deshabilitarbd($idempleado)
    {
        $data['estado']='0';
        $this->empleado_model->modificarempleados($idempleado,$data);
        redirect('empleado/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->empleado_model->listaempleadosdeshabilitados();
        $data['empleado']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idempleado=$_POST['idempleado'];
        $data['estado']='1';
        $this->empleado_model->modificarempleados($idempleado,$data);
        redirect('empleado/deshabilitados','refresh');
    }

  }
