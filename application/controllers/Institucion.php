<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institucion extends CI_Controller {

    public function inicio()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_index');
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_index');
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_index');
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_index');
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_index');
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function Cochabamba()
    {
        $lista=$this->institucion_model->listainstituciones(3);
        $data['institucion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function La_Paz()
    {
        $lista=$this->institucion_model->listainstituciones(4);
        $data['institucion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function Santa_Cruz()
    {
        $lista=$this->institucion_model->listainstituciones(8);
        $data['institucion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function agregar()
    {
        if ($this->session->userdata('rol')=='admin') 
        {
            $lista=$this->departamento_model->listadepartamentos();
            $data['departamento']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_insert',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella'); 
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
    public function agregarbd()
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules(
                'nombreinstitucion',
                'Nombre de la institución',
                'required|min_length[4]|max_length[124]',
                array('required'=>'¡Se requiere ingresar el nombre de la institución!',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 125 caracteres!.'
                )
            );
            $this->form_validation->set_rules(
                'direccion',
                'Primer apellido del usuario',
                'required|min_length[4]|max_length[199]',
                array('required'=>'¡La dirección de la institución es obligatoria!.',
                'min_length'=>'La dirección debe tener al menos 4 caracteres.',
                'max_length'=>'¡La dirección apellido no debe contener más de 200 caracteres!.'
                )
            );
            $this->form_validation->set_rules(
                'telefono',
                'Número de Teléfono de la institución',
                'required|min_length[7]|max_length[13]',
                array('required'=>'¡El número de teléfono es obligatorio!',
                'min_length'=>'¡Ingrese un número de teléfono/celular válido!.',
                'max_length'=>'¡El número de celular no contiene más de 13 caracteres!.'
                )
            );
            if($this->form_validation->run()==FALSE)
            {
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/contacto/contacto_insert',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella'); 
            }
            else{
                $data['idDepartamento']=$_POST['iddepartamento'];
                $data['nombreInstitucion']=trim($_POST['nombreinstitucion']);
                $data['direccion']=trim($_POST['direccion']);
                $data['telefono']=trim($_POST['telefono']);
                $this->institucion_model->agregarinstituciones($data);
                redirect('institucion/inicio','refresh');
            }
        }
    public function modificar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $idinstitucion=$_POST['idinstitucion'];
            $data['infoinstitucion']=$this->institucion_model->recuperarinstituciones($idinstitucion);
            $lista=$this->departamento_model->listadepartamentos();
            $data['departamento']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_update',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
    public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
                'nombreinstitucion',
                'Nombre de la institución',
                'required|min_length[4]|max_length[124]',
                array('required'=>'¡Se requiere ingresar el nombre de la institución!',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 125 caracteres!.'
                )
            );
            $this->form_validation->set_rules(
                'direccion',
                'Primer apellido del usuario',
                'required|min_length[4]|max_length[199]',
                array('required'=>'¡La dirección de la institución es obligatoria!.',
                'min_length'=>'La dirección debe tener al menos 4 caracteres.',
                'max_length'=>'¡La dirección apellido no debe contener más de 200 caracteres!.'
                )
            );
            $this->form_validation->set_rules(
                'telefono',
                'Número de Teléfono de la institución',
                'required|min_length[7]|max_length[13]',
                array('required'=>'¡El número de teléfono es obligatorio!',
                'min_length'=>'¡Ingrese un número de teléfono/celular válido!.',
                'max_length'=>'¡El número de celular no contiene más de 13 caracteres!.'
                )
            );
            if($this->form_validation->run()==FALSE)
                {
                    if($this->session->userdata('rol')=='admin')
                    {
                        $idinstitucion=$_POST['idinstitucion'];
                        $data['infoinstitucion']=$this->institucion_model->recuperarinstituciones($idinstitucion);
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/contacto/contacto_update',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                    }
                    else
                    {
                        redirect('usuarios/panel','refresh');
                    }
                }
                else
                {
                    $idinstitucion=$_POST['idinstitucion'];
                    $data['idDepartamento']=$_POST['iddepartamento'];
                    $data['nombreInstitucion']=trim($_POST['nombreinstitucion']);
                    $data['direccion']=trim($_POST['direccion']);
                    $data['telefono']=trim($_POST['telefono']);
                    $data['fechaActualizacion']=date('Y-m-d H:i:s');
                    $this->institucion_model->modificarinstituciones($idinstitucion,$data);
                    redirect('institucion/inicio','refresh');
                }
        }
    public function habilitarbd($idinstitucion)
    {
        $data['estado']='1';
        $this->institucion_model->modificarinstituciones($idinstitucion,$data);
        redirect('institucion/inicio','refresh');
    }
    public function deshabilitarbd($idinstitucion)
    {
        $data['estado']='0';
        $this->institucion_model->modificarinstituciones($idinstitucion,$data);
        redirect('institucion/procesoRegistrado','refresh');
    }
    public function procesoRegistrado()
    {
        if ($this->session->userdata('rol')=='admin') {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_deshabilitar_confirmacion');
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
    public function deshabilitados()
    {
        $lista=$this->institucion_model->listainstitucionesdeshabilitados();
        $data['institucion']=$lista;
        if ($this->session->userdata('rol')=='admin') {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/contacto/contacto_read_deshabilitados',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
}