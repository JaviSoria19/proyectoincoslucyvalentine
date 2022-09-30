<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alerta extends CI_Controller {

	public function inicio()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->alerta_model->listaAlerta();
            $data['alertas']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/alerta/alerta_index',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='usuario') {
            $idusuario=$this->session->userdata('idusuario');
            $lista=$this->alerta_model->recuperarAlertaUsuario($idusuario);
            $data['historial']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/alerta/alerta_index',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
    public function reportes()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->alerta_model->listaAlerta();
            $data['alertas']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/alerta/alerta_reportes',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else
        {
            redirect('usuarios/panel','refresh');
        }
    }
        public function eliminarbd()
    {
        $idalerta=$_POST['idalerta'];
        $this->alerta_model->eliminaralertaes($idalerta);
        redirect('alerta/index','refresh');
        
    }
        public function deshabilitarbd($idalerta)
    {
        $data['estado']='0';
        $this->alerta_model->modificaralertaes($idalerta,$data);
        redirect('alerta/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->alerta_model->listaalertaesdeshabilitados();
        $data['alerta']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('alerta/alerta_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idalerta=$_POST['idalerta'];
        $data['estado']='1';
        $this->alerta_model->modificaralertaes($idalerta,$data);
        redirect('alerta/deshabilitados','refresh');
    }   
    public function inicio_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->alerta_model->filtroAlerta($fecha_inicio,$fecha_fin);
            $data['alertas']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/alerta/alerta_index',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function reportes_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->alerta_model->filtroAlerta($fecha_inicio,$fecha_fin);
            $data['alertas']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/alerta/alerta_reportes',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
}
