<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {

	public function inicio()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->test_nombre_model->listaTest_nombre();
            $data['testDisponibles']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/test/test_index',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='usuario') {
            $lista=$this->test_nombre_model->listaTest_nombre();
            $data['testDisponibles']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/test/test_index',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}
    public function registros()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->test_model->listaTest();
            $data['test']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/test/test_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        if($this->session->userdata('rol')=='usuario')
        {
            $idusuario=$this->session->userdata('idusuario');
            $lista=$this->test_model->recuperarTestUsuario($idusuario);
            $data['historial']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/test/test_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
    }
    public function agregar()
	{
        if($this->session->userdata('rol')=='admin')
        {
            $idtest=$_POST['idtestnombre'];
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/test/test_insert_fase'.$idtest);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='usuario') 
        {
            $idtest=$_POST['idtestnombre'];
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('admin/test/test_insert_fase'.$idtest);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }

	}

        public function agregarbd()
    {
        $r1=$_POST['r1'];
        $r2=$_POST['r2'];
        $r3=$_POST['r3'];
        $r4=$_POST['r4'];
        $r5=$_POST['r5'];
        $resultado=$r1+$r2+$r3+$r4+$r5;
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['idNombre']=$_POST['idtestnombre'];
        $data['respuesta1']=$r1;
        $data['respuesta2']=$r2;
        $data['respuesta3']=$r3;
        $data['respuesta4']=$r4;
        $data['respuesta5']=$r5;
        $data['resultado']=$resultado;
        $this->test_model->agregarTest($data);
        $this->resultado($resultado);
    }
        public function resultado($resultado)
    {
        $mensaje='';
        if ($resultado>=5 && $resultado<=6) {
            $mensaje='Estimada, usted no sufre de violencia <br><br> "¡El amor no reclama posesiones sino que da libertad!"<br>-Rabindranath Tagore';
        }
        elseif ($resultado>=7 && $resultado<=10) {
            $mensaje='Estimada, usted está presentando algunos síntomas de violencia, le recomendamos dialogar con su pareja para resolver y mejorar su relación.';
        }
        elseif ($resultado>=11 && $resultado<=14) {
            $mensaje='Estimada, usted está presentando varios síntomas de violencia.';
        }
        elseif ($resultado==15) {
            $mensaje='Estimada, usted está sufriendo violencia en muchos aspectos y corre peligro, le recomendamos contactarse con el SLIM.<br><br>"Defiende tu vida, lucha por tu independencia, busca tu felicidad y aprende a quererte"<br>-Izaskun González';
        }
        if($this->session->userdata('rol')=='admin')
        {
            $data['mensaje']=$mensaje;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/test/test_resultado',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='usuario')
        {
            $data['mensaje']=$mensaje;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/test/test_resultado',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
    }
        public function eliminarbd()
    {
        $idtest=$_POST['idtest'];
        $this->test_model->eliminartestes($idtest);
        redirect('test/index','refresh');
        
    }
        public function deshabilitarbd($idtest)
    {
        $data['estado']='0';
        $this->test_model->modificartestes($idtest,$data);
        redirect('test/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->test_model->listatestesdeshabilitados();
        $data['test']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('test/test_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idtest=$_POST['idtest'];
        $data['estado']='1';
        $this->test_model->modificartestes($idtest,$data);
        redirect('test/deshabilitados','refresh');
    }
}
