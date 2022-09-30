<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function index()
	{
                $data['msg']=$this->uri->segment(3);
                if ($this->session->userdata('correo'))
                {//Usuario logueado
                        redirect('usuarios/panel','refresh');
                }
                else
                {//Usuario no logueado
                        $this->load->view('login/login_header');
                        $this->load->view('login/login_view',$data);
                        $this->load->view('login/login_footer');
                } 
        }

        public function inicio()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $lista=$this->usuario_model->listaUsuariosNoVerificados();
                        $data['usuario']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
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
                        $totalusuariosporsexo=$this->usuario_model->total_usuarios_por_sexo();
                        $data['totalusuariosporsexo']=$totalusuariosporsexo;
                        $totalusuariospordpto=$this->usuario_model->total_usuarios_por_departamento();
                        $data['totalusuariospordpto']=$totalusuariospordpto;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_reportes',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }

        public function adminVerStaff()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $lista=$this->usuario_model->listaUsuariosStaff();
                        $data['usuario']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_staff',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }

        public function perfil()
        {
                $idusuario=$this->session->userdata('idusuario');
                $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_perfil',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella'); 
        }

        public function agregar()
        {
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('login/login_header');
                $this->load->view('login/register_view',$data);
                $this->load->view('login/login_footer');  
        }
        public function agregarbd()
        {
                $this->load->library('form_validation');
                $this->form_validation->set_rules(
                        'contrasenha',
                        'Contraseña del Usuario',
                        'required|min_length[8]',
                        array(
                        'required'=>'Se requiere ingresar la contraseña del usuario.',
                        'min_length'=>'¡La contraseña debe tener al menos 8 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'¡El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'Número de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'¡El número de celular es obligatorio!',
                        'min_length'=>'¡Ingrese un número de celular válido!.',
                        'max_length'=>'¡El número de celular no contiene más los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'Número de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'¡El número de carnet es obligatorio!',
                        'min_length'=>'¡Ingrese un número de carnet válido!.',
                        'max_length'=>'¡El número de carnet no contiene más de 8 caracteres!.',
                        'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                        )
                    );
                if($this->form_validation->run()==FALSE)
                {
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('login/login_header');
                        $this->load->view('login/register_view',$data);
                        $this->load->view('login/login_footer'); 
                }
                else{
                        $data['idDepartamento']=$_POST['iddepartamento'];
                        $data['nombres']=$_POST['nombres'];
                        $data['primerApellido']=$_POST['primerapellido'];
                        $data['segundoApellido']=$_POST['segundoapellido'];
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=$_POST['numeroci'];
                        $data['sexo']=$_POST['sexo'];
                        $data['correo']=$_POST['correo'];
                        $data['contrasenha']=md5($_POST['contrasenha']);
                        $data['foto']=base_url().'uploads/user_default.png';
                        $data['rol']='usuario';
                        $this->usuario_model->agregarusuarios($data);
                        redirect('usuarios/index','refresh');
                }
        }
        public function adminAgregar()
        {
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_insert',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella'); 
        }
        public function adminAgregarbd()
        {
                $this->load->library('form_validation');
                $this->form_validation->set_rules(
                        'contrasenha',
                        'Contraseña del Usuario',
                        'required|min_length[8]',
                        array(
                        'required'=>'Se requiere ingresar la contraseña del usuario.',
                        'min_length'=>'¡La contraseña debe tener al menos 8 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'nombres',
                        'Nombre del usuario',
                        'required|min_length[3]|max_length[30]',
                        array('required'=>'¡Se requiere ingresar sus nombres!',
                        'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                        'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'¡El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'Número de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'¡El número de celular es obligatorio!',
                        'min_length'=>'¡Ingrese un número de celular válido!.',
                        'max_length'=>'¡El número de celular no contiene más los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'Número de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'¡El número de carnet es obligatorio!',
                        'min_length'=>'¡Ingrese un número de carnet válido!.',
                        'max_length'=>'¡El número de carnet no contiene más de 8 caracteres!.',
                        'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                        )
                    );
                if($this->form_validation->run()==FALSE)
                {
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_insert',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                else{
                        $data['idDepartamento']=$_POST['iddepartamento'];
                        $data['nombres']=$_POST['nombres'];
                        $data['primerApellido']=$_POST['primerapellido'];
                        $data['segundoApellido']=$_POST['segundoapellido'];
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=$_POST['numeroci'];
                        $data['sexo']=$_POST['sexo'];
                        $data['correo']=$_POST['correo'];
                        $data['contrasenha']=md5($_POST['contrasenha']);
                        $data['foto']=base_url().'uploads/admin_default.jpg';
                        $data['rol']=$_POST['rol'];
                        $data['estado']='2';
                        $this->usuario_model->agregarusuarios($data);
                        redirect('usuarios/adminVerStaff','refresh');
                }
        }
        public function modificar()
        {
                if($this->session->userdata('rol')=='admin')
                {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_update',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
                }
                elseif ($this->session->userdata('rol')=='usuario') {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('usuario/inc/headergentelella');
                $this->load->view('usuario/inc/sidebargentelella');
                $this->load->view('usuario/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_update',$data);
                $this->load->view('usuario/inc/creditosgentelella');
                $this->load->view('usuario/inc/footergentelella');
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
                        'nombres',
                        'Nombre del usuario',
                        'required|min_length[3]|max_length[30]',
                        array('required'=>'¡Se requiere ingresar sus nombres!',
                        'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                        'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'¡El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                        'alpha'=>'¡El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'Número de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'¡El número de celular es obligatorio!',
                        'min_length'=>'¡Ingrese un número de celular válido!.',
                        'max_length'=>'¡El número de celular no contiene más los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'Número de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'¡El número de carnet es obligatorio!',
                        'min_length'=>'¡Ingrese un número de carnet válido!.',
                        'max_length'=>'¡El número de carnet no contiene más de 8 caracteres!.',
                        'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                        )
                    );
                if($this->form_validation->run()==FALSE)
                {
                        if($this->session->userdata('rol')=='admin')
                        {
                        $idusuario=$_POST['idusuario'];
                        $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_update',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                        }
                        elseif ($this->session->userdata('rol')=='usuario') {
                        $idusuario=$_POST['idusuario'];
                        $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('usuario/inc/headergentelella');
                        $this->load->view('usuario/inc/sidebargentelella');
                        $this->load->view('usuario/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_update',$data);
                        $this->load->view('usuario/inc/creditosgentelella');
                        $this->load->view('usuario/inc/footergentelella');
                        }
                        else
                        {
                                redirect('usuarios/panel','refresh');
                        }
                }
                else{
                        $idusuario=$_POST['idusuario'];
                        $data['idDepartamento']=$_POST['iddepartamento'];
                        $data['nombres']=$_POST['nombres'];
                        $data['primerApellido']=$_POST['primerapellido'];
                        $data['segundoApellido']=$_POST['segundoapellido'];
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=$_POST['numeroci'];
                        $data['correo']=$_POST['correo'];
                        $data['idUsuario']=$_POST['idusuario'];
                        $data['fechaActualizacion']=date('Y-m-d H:i:s');
                        $this->usuario_model->modificarusuarios($idusuario,$data);
                        redirect('usuarios/inicio','refresh');
                }
        }

        public function deshabilitarbd($idusuario)
        {
                $data['estado']='0';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
        }
        public function verificarbd($idusuario)
        {
                $data['estado']='2';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
        }
        public function verificarstaffbd($idusuario)
        {
                $data['estado']='2';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/adminVerStaff','refresh');
        }
        public function undoverificarbd($idusuario)
        {
                $data['estado']='1';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
        }
        public function undoverificarstaffbd($idusuario)
        {
                $data['estado']='1';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/adminVerStaff','refresh');
        }

        public function habilitarbd()
        {
                $idusuario=$_POST['idusuario'];
                $data['estado']='1';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
        }
        
        public function validar()
        {
                $login=strtolower($_POST['login']);
                $password=md5($_POST['password']);
                $consulta=$this->usuario_model->validar($login,$password);
                if($consulta->num_rows()>0)
                {
                        //validacion efectiva
                        foreach ($consulta->result() as $row) {
                        $this->session->set_userdata('idusuario',$row->idUsuario);
                        $this->session->set_userdata('estado',$row->estado);
                        $this->session->set_userdata('correo',$row->correo);
                        $this->session->set_userdata('foto',$row->foto);
                        $this->session->set_userdata('rol',$row->rol);
                        $this->session->set_userdata('sexo',$row->sexo);
                        redirect('usuarios/panel','refresh');
                        }            
                }
                else
                {
                        //error al validar redirigimos al login
                        redirect('usuarios/index/2','refresh');
                }


        }
        public function validarCIExistente()
        {
                $numeroci=$_POST['numeroci'];
                $consulta=$this->usuario_model->validarCI($numeroci);
                if($consulta->num_rows()>0)
                {
                        alertaCIExistente();          
                }
                else
                {
                        redirect('usuarios/index/2','refresh');
                }
        }

        public function panel()
        {
                if ($this->session->userdata('correo'))
                {
                        if($this->session->userdata('rol')=='admin'){
                                //cargo admin
                                redirect('usuarios/inicio','refresh');

                        }
                        elseif($this->session->userdata('rol')=='usuario'){
                                redirect('publicacion/indexStaff','refresh');
                        }
                        else{
                                //cargo guest
                                redirect('producto/guest','refresh');
                        }
                }
                else
                {//USUARIO NO LOGUEADO 
                        redirect('usuarios/index','refresh');
                }
        }

        public function logout()
        {
                $this->session->sess_destroy();
                redirect('usuarios/index/1','refresh');
        }


    public function inicio_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
                $fecha_inicio=$_POST['date_inicio'];
                $fecha_fin=$_POST['date_fin'];

                $lista=$this->usuario_model->filtroUsuarioNoVerificado($fecha_inicio,$fecha_fin);
                $data['usuario']=$lista;
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function adminVerStaff_filtro()
    {
        if ($this->session->userdata('rol')=='admin') {
                $fecha_inicio=$_POST['date_inicio'];
                $fecha_fin=$_POST['date_fin'];

                $lista=$this->usuario_model->filtroUsuarioStaff($fecha_inicio,$fecha_fin);
                $data['usuario']=$lista;
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_staff',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
        }else{
            redirect('usuarios/panel','refresh');
        }  
    }
        public function reportes_filtro()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $fecha_inicio=$_POST['date_inicio'];
                        $fecha_fin=$_POST['date_fin'];
                        $totalusuariosporsexo=$this->usuario_model->filtro_total_usuarios_por_sexo($fecha_inicio,$fecha_fin);
                        $data['totalusuariosporsexo']=$totalusuariosporsexo;
                        $totalusuariospordpto=$this->usuario_model->filtro_total_usuarios_por_departamento($fecha_inicio,$fecha_fin);
                        $data['totalusuariospordpto']=$totalusuariospordpto;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_reportes',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
}