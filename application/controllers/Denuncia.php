<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Denuncia extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('rol')=='admin'){
            $lista=$this->denuncia_model->listadenuncias();
            $data['denuncia']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='usuario'){
            $idusuario=$this->session->userdata('idusuario');
            $lista=$this->denuncia_model->recuperardenunciasusuario($idusuario);
            $data['historial']=$lista;
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/denuncia/denuncia_read',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='policia'){
            $lista=$this->denuncia_model->listadenuncias();
            $data['denuncia']=$lista;
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='autoridad'){
            $lista=$this->denuncia_model->listadenuncias();
            $data['denuncia']=$lista;
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
	}
    public function descartados()
    {
        if($this->session->userdata('rol')=='admin'){
            $lista=$this->denuncia_model->listadenunciasdescartadas();
            $data['denuncia']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_deshabilitados',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='policia'){
            $lista=$this->denuncia_model->listadenunciasdescartadas();
            $data['denuncia']=$lista;
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_deshabilitados',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='autoridad'){
            $lista=$this->denuncia_model->listadenunciasdescartadas();
            $data['denuncia']=$lista;
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_deshabilitados',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function reportes()
    {
        $totaldenunciaporcategoria=$this->denuncia_model->total_denuncia_por_categoria();
        $data['totaldenunciaporcategoria']=$totaldenunciaporcategoria;
        $totaldenunciaporprocesodenuncia=$this->denuncia_model->total_denuncia_por_proceso_denuncia();
        $data['totaldenunciaporprocesodenuncia']=$totaldenunciaporprocesodenuncia;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_reportes',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='policia')
        {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_reportes',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='autoridad')
        {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_reportes',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }   
    }
    public function visualizar_detalles()
    {
        if ($this->session->userdata('rol')=='admin') {
            $iddenuncia=$_POST['iddenuncia'];
            $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
            $data['proceso']=$this->proceso_denuncia_model->listaproceso_denuncias($iddenuncia);
            $data['listaautoridadpolicia']=$this->usuario_model->listaUsuariosPoliciayAutoridad();
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_detalles',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }elseif ($this->session->userdata('rol')=='usuario') {
            $iddenuncia=$_POST['iddenuncia'];
            $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
            $data['proceso']=$this->proceso_denuncia_model->listaproceso_denuncias($iddenuncia);
            $data['listaautoridadpolicia']=$this->usuario_model->listaUsuariosPoliciayAutoridad();
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/denuncia/denuncia_read_detalles',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $iddenuncia=$_POST['iddenuncia'];
            $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
            $data['proceso']=$this->proceso_denuncia_model->listaproceso_denuncias($iddenuncia);
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('policia/denuncia/denuncia_read_detalles',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $iddenuncia=$_POST['iddenuncia'];
            $data['infodenuncia']=$this->denuncia_model->recuperardenuncias($iddenuncia);
            $data['proceso']=$this->proceso_denuncia_model->listaproceso_denuncias($iddenuncia);
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('autoridad/denuncia/denuncia_read_detalles',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function agregar()
	{
        $lista=$this->categoria_model->listacategorias();
        $data['categoria']=$lista;
        $lista=$this->marca_model->listamarcas();
        $data['marca']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('denuncia/denuncia_insert',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombredenuncia',
            'Nombre del denuncia',
            'required|min_length[3]|max_length[30]',
            array(
                'required'=>'Se requiere ingresar el nombre del denuncia.',
                'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'precio',
            'Precio del denuncia',
            'required|max_length[7]|numeric',
            array(
                'required'=>'Se requiere ingresar el precio del denuncia.',
                'max_length'=>'¡El precio no debe contener más de 7 caracteres!.',
                'numeric'=>'El precio solo debe contener números!.'
                )
            );
        $this->form_validation->set_rules(
            'color',
            'Color del denuncia',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required'=>'Se requiere ingresar el color del denuncia.',
                'min_length'=>'El color debe tener al menos 3 caracteres.',
                'max_length'=>'¡El color no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces'=>'¡El color solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'stock',
            'Stock del denuncia',
            'required|max_length[3]|is_natural',
            array(
                'required'=>'Se requiere ingresar el stock del denuncia.',
                'max_length'=>'¡El stock no puede exceder más de 999 unidades!.',
                'is_natural'=>'¡El stock solo debe contener números enteros!.'
                )
            );
        $this->form_validation->set_rules(
            'descripcion',
            'Descripcion del denuncia',
            'required|min_length[3]',
            array(
                'required'=>'¡Se requiere ingresar alguna descripción del denuncia! Puede agregar datos como por ejemplo: almacenamiento, memoria RAM, peso, procedencia, etc.',
                'min_length'=>'La descripción tener al menos 3 caracteres.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $lista=$this->categoria_model->listacategorias();
            $data['categoria']=$lista;
            $lista=$this->marca_model->listamarcas();
            $data['marca']=$lista;
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('denuncia/denuncia_insert',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['idCategoria']=$_POST['idcategoria'];
            $data['declaracion']=$_POST['declaracion'];
            $data['foto']=$_POST['foto'];
            $data['audio']=$_POST['audio'];
            $data['video']=$_POST['video'];
            $idDenuncia=$this->denuncia_model->agregardenuncias($data);

            $datatwo['idDenuncia']=$idDenuncia;
            $datatwo['idUsuarioResponsable']=$_POST['color'];
            $datatwo['comentario']=$_POST['color'];
            $this->proceso_denuncia_model->agregarproceso_denuncia($datatwo);
            redirect('denuncia/index','refresh');
        }
    }
        public function deshabilitarbd($iddenuncia)
    {
        $data['estado']='0';
        $this->denuncia_model->modificardenuncias($iddenuncia,$data);
        $datatwo['idDenuncia']=$iddenuncia;
        $datatwo['estado']='Denuncia descartada';
        $datatwo['idUsuarioResponsable']='...';
        $datatwo['comentario']='Su denuncia ha sido descartada.';
        $this->proceso_denuncia_model->agregarproceso_denuncia($datatwo);
        redirect('denuncia/index','refresh');

    }

        public function deshabilitados()
    {
        $lista=$this->denuncia_model->listadenunciasdeshabilitados();
        $data['denuncia']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('denuncia/denuncia_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $iddenuncia=$_POST['iddenuncia'];
        $data['estado']='1';
        $this->denuncia_model->modificardenuncias($iddenuncia,$data);
        redirect('denuncia/deshabilitados','refresh');
    }

    public function index_filtro()
    {
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $lista=$this->denuncia_model->filtroDenuncias($fecha_inicio,$fecha_fin);
        $data['denuncia']=$lista;
        if ($this->session->userdata('rol')=='admin') {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function descartados_filtro()
    {
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $lista=$this->denuncia_model->filtroDenunciasDescartadas($fecha_inicio,$fecha_fin);
        $data['denuncia']=$lista;
        if($this->session->userdata('rol')=='admin'){
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_deshabilitados',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='policia'){
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('admin/denuncia/denuncia_read_deshabilitados',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }
    }
    public function reportes_filtro()
    {
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $totaldenunciaporcategoria=$this->denuncia_model->filtro_total_denuncia_por_categoria($fecha_inicio,$fecha_fin);
        $data['totaldenunciaporcategoria']=$totaldenunciaporcategoria;
        $totaldenunciaporprocesodenuncia=$this->denuncia_model->filtro_total_denuncia_por_proceso_denuncia($fecha_inicio,$fecha_fin);
        $data['totaldenunciaporprocesodenuncia']=$totaldenunciaporprocesodenuncia;
        if($this->session->userdata('rol')=='admin')
        {
                    $this->load->view('admin/inc/headergentelella');
                    $this->load->view('admin/inc/sidebargentelella');
                    $this->load->view('admin/inc/topbargentelella');
                    $this->load->view('admin/denuncia/denuncia_reportes',$data);
                    $this->load->view('admin/inc/creditosgentelella');
                    $this->load->view('admin/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='policia')
        {
                    $this->load->view('policia/inc/headergentelella');
                    $this->load->view('policia/inc/sidebargentelella');
                    $this->load->view('policia/inc/topbargentelella');
                    $this->load->view('admin/denuncia/denuncia_reportes',$data);
                    $this->load->view('policia/inc/creditosgentelella');
                    $this->load->view('policia/inc/footergentelella');
        }
        elseif($this->session->userdata('rol')=='autoridad')
        {
                    $this->load->view('autoridad/inc/headergentelella');
                    $this->load->view('autoridad/inc/sidebargentelella');
                    $this->load->view('autoridad/inc/topbargentelella');
                    $this->load->view('admin/denuncia/denuncia_reportes',$data);
                    $this->load->view('autoridad/inc/creditosgentelella');
                    $this->load->view('autoridad/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }   
    }
}
