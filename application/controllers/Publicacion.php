<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Publicacion extends CI_Controller {

	public function indexStaff()
	{
        $lista=$this->publicacion_model->listaPublicacionesStaff();
        $data['publicacion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_staff',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_staff',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_staff',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_staff',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_staff',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
	}
    public function eliminados()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $tipoPublicacion = '1';
            $data['tipoPublicacion']=$tipoPublicacion;
            $lista=$this->publicacion_model->listaPublicacionesEliminadas($tipoPublicacion);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_deshabilitados',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='policia') {
            $lista=$this->publicacion_model->listaPublicacionesEliminadas($tipoPublicacion);
            $data['publicacion']=$lista;
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_deshabilitados',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
    public function indexComunidad()
    {
        $lista=$this->publicacion_model->listaPublicacionesComunidad();
        $data['publicacion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function indexInformacionEducativa()
    {
        $lista=$this->publicacion_model->listaPublicacionesInformacionEducativa();
        $data['publicacion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info1',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info1',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info1',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info1',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info1',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function indexPautasdeSeguridad()
    {
        $lista=$this->publicacion_model->listaPublicacionesPautasdeSeguridad();
        $data['publicacion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info2',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info2',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info2',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info2',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info2',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function indexPromociondeActitudesIgualitarias()
    {
        $lista=$this->publicacion_model->listaPublicacionesPromociondeActitudesIgualitarias();
        $data['publicacion']=$lista;
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info3',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info3',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info3',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info3',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_info3',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function visualizar_post()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
        $lista=$this->comentario_model->listacomentarios($idpublicacion);
        $data['infocomentarios']=$lista;
        if ($this->session->userdata('rol')=='admin') {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_post',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_post',$data);
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='policia') {
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_post',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='autoridad') {
            $this->load->view('autoridad/inc/headergentelella');
            $this->load->view('autoridad/inc/sidebargentelella');
            $this->load->view('autoridad/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_post',$data);
            $this->load->view('autoridad/inc/creditosgentelella');
            $this->load->view('autoridad/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
            $this->load->view('moderador/inc/headergentelella');
            $this->load->view('moderador/inc/sidebargentelella');
            $this->load->view('moderador/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_post',$data);
            $this->load->view('moderador/inc/creditosgentelella');
            $this->load->view('moderador/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
        
    }
    public function agregar()
    {
        if($this->session->userdata('rol')=='admin')
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_insert_staff');
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }elseif ($this->session->userdata('rol')=='usuario') {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_insert_comunidad');
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }

    }

    public function adminAgregarStaffbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'titulo',
            'Titulo de la publicación',
            'required',
            array(
                'required'=>'Se requiere ingresar el nombre del publicacion.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_insert_staff');
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else{
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['fotoPublicacion']=base_url().'uploads/publicacion_default.jpg';
            $data['titulo']=trim($_POST['titulo']);
            $data['contenido']=$_POST['contenido'];
            $data['tipo']=$_POST['tipo'];
            $this->publicacion_model->agregarpublicaciones($data);
            redirect('publicacion/indexStaff','refresh');
        }
    }
    public function usuarioAgregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'titulo',
            'Titulo de la publicación',
            'required',
            array(
                'required'=>'Se requiere ingresar el nombre del publicacion.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('usuario/inc/headergentelella');
            $this->load->view('usuario/inc/sidebargentelella');
            $this->load->view('usuario/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_insert_comunidad');
            $this->load->view('usuario/inc/creditosgentelella');
            $this->load->view('usuario/inc/footergentelella');
        }
        else{
            $data['idUsuario']=$this->session->userdata('idusuario');
            $data['fotoPublicacion']=base_url().'uploads/publicacion_default.jpg';
            $data['titulo']=$_POST['titulo'];
            $data['contenido']=$_POST['contenido'];
            $data['tipo']='2';
            $this->publicacion_model->agregarpublicaciones($data);
            redirect('publicacion/indexComunidad','refresh');
        }
    }

        public function eliminarbd()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $this->publicacion_model->eliminarpublicaciones($idpublicacion);
        redirect('publicacion/index','refresh');
        
    }
        public function modificar()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
        $this->load->view('admin/inc/headergentelella');
        $this->load->view('admin/inc/sidebargentelella');
        $this->load->view('admin/inc/topbargentelella');
        $this->load->view('admin/publicacion/publicacion_update',$data);
        $this->load->view('admin/inc/creditosgentelella');
        $this->load->view('admin/inc/footergentelella');
    }

        public function modificarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'titulo',
            'Titulo de la publicación',
            'required',
            array(
                'required'=>'Se requiere ingresar el nombre del publicacion.'
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $idpublicacion=$_POST['idpublicacion'];
            $data['infopublicacion']=$this->publicacion_model->recuperarpublicaciones($idpublicacion);
            if ($this->session->userdata('rol')=='admin'){
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/publicacion/publicacion_update',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
            }
        }
        else
        {
            $idpublicacion=$_POST['idpublicacion'];
            //inicio lógica de guardado de archivos
            $nombrearchivo="publicacion_".$idpublicacion.".jpg";
            $config['upload_path']='./uploads';
            $config['file_name']=$nombrearchivo;
            $direccion="./uploads/".$nombrearchivo;
            if(file_exists($direccion))
            {
                unlink($direccion);
            }
            $config['allowed_types']='jpg|png|jpeg';
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload())
            {
                $data['error']=$this->upload->display_errors();
            }
            else
            {
                $data['fotoPublicacion']=base_url().'uploads/'.$nombrearchivo;
                $this->upload->data();
            }

            $data['titulo']=$_POST['titulo'];
            $data['contenido']=$_POST['contenido'];
            $data['fechaActualizacion']=date('Y-m-d H:i:s');
            $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
            if ($this->session->userdata('rol')=='admin') {
                redirect('publicacion/indexStaff','refresh');
            }else{
                redirect('publicacion/indexComunidad','refresh');
            }
        }
    }

        public function deshabilitarbd($idpublicacion)
    {
        $data['estado']='0';
        $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
        if ($this->session->userdata('rol')=='admin') {
            redirect('publicacion/indexStaff','refresh');
        }
        elseif ($this->session->userdata('rol')=='usuario') {
            redirect('publicacion/indexComunidad','refresh');
        }        
    }

        public function deshabilitados()
    {
        $lista=$this->publicacion_model->listapublicacionesdeshabilitados();
        $data['publicacion']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('publicacion/publicacion_deshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idpublicacion=$_POST['idpublicacion'];
        $data['estado']='1';
        $this->publicacion_model->modificarpublicaciones($idpublicacion,$data);
        redirect('publicacion/deshabilitados','refresh');
    }

    public function indexStaff_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->publicacion_model->filtroPublicacionStaff($fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_staff',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function indexComunidad_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->publicacion_model->filtroPublicacionComunidad($fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_comunidad',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function indexInformacionEducativa_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->publicacion_model->filtroPublicacionInfo1($fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info1',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function indexPautasdeSeguridad_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->publicacion_model->filtroPublicacionInfo2($fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info2',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function indexPromociondeActitudesIgualitarias_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
            $fecha_inicio=$_POST['date_inicio'];
            $fecha_fin=$_POST['date_fin'];
            
            $lista=$this->publicacion_model->filtroPublicacionInfo3($fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_info3',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function eliminados_filtro()
    {
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $tipoPublicacion =$_POST['tipopublicacion'];
        $data['tipoPublicacion']=$tipoPublicacion;
        if($this->session->userdata('rol')=='admin')
        {
            $lista=$this->publicacion_model->filtroPublicacionesEliminadas($tipoPublicacion,$fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('admin/inc/headergentelella');
            $this->load->view('admin/inc/sidebargentelella');
            $this->load->view('admin/inc/topbargentelella');
            $this->load->view('admin/publicacion/publicacion_read_deshabilitados',$data);
            $this->load->view('admin/inc/creditosgentelella');
            $this->load->view('admin/inc/footergentelella');
        }
        else if ($this->session->userdata('rol')=='policia') {
            $lista=$this->publicacion_model->filtroPublicacionesEliminadas($tipoPublicacion,$fecha_inicio,$fecha_fin);
            $data['publicacion']=$lista;
            $this->load->view('policia/inc/headergentelella');
            $this->load->view('policia/inc/sidebargentelella');
            $this->load->view('policia/inc/topbargentelella');
            $this->load->view('usuario/publicacion/publicacion_read_deshabilitados',$data);
            $this->load->view('policia/inc/creditosgentelella');
            $this->load->view('policia/inc/footergentelella');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }
  }
