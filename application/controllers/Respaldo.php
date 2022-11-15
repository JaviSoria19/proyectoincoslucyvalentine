<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respaldo extends CI_Controller {

        public function inicio()
        {
                $data['msg']=$this->uri->segment(3);
                if($this->session->userdata('rol')=='admin')
                {
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/respaldo/respaldo_index',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
        public function exportar()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $login=$_SESSION['correo'];
                        $password=md5($_POST['seguridad']);
                        $consulta=$this->usuario_model->validar($login,$password);
                        if($consulta->num_rows()>0)
                        {
                                $nombre="LCV_respaldo_".date('Y_m_d___H_i_s').".gz";
                                // Carga la clase "DB utility"
                                $this->load->dbutil();
                                // Respalda de forma entera tu base de datos y lo asigna a una variable
                                $backup = $this->dbutil->backup();
                                // Carga el helper de archivos y escribre el archivo a tu servidor
                                $this->load->helper('file');
                                write_file('backupsDB/'.$nombre, $backup);
                                // Carga el helper de descargas y envía el archivo a tu escritorio
                                $this->load->helper('download');
                                force_download($nombre, $backup);
                        }
                        else
                        {
                                redirect('respaldo/inicio/1','refresh');
                        }
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
}