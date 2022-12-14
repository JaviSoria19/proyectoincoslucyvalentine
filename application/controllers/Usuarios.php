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
                $lista=$this->usuario_model->listaUsuariosNoVerificados();
                $data['usuario']=$lista;
                if($this->session->userdata('rol')=='admin')
                {
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                elseif($this->session->userdata('rol')=='moderador')
                {
                        $this->load->view('moderador/inc/headergentelella');
                        $this->load->view('moderador/inc/sidebargentelella');
                        $this->load->view('moderador/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                        $this->load->view('moderador/inc/creditosgentelella');
                        $this->load->view('moderador/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
        public function vetados()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $lista=$this->usuario_model->listaUsuariosVetados();
                        $data['usuario']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_deshabilitados',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                elseif($this->session->userdata('rol')=='moderador')
                {
                        $lista=$this->usuario_model->listaUsuariosVetados();
                        $data['usuario']=$lista;
                        $this->load->view('moderador/inc/headergentelella');
                        $this->load->view('moderador/inc/sidebargentelella');
                        $this->load->view('moderador/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_deshabilitados',$data);
                        $this->load->view('moderador/inc/creditosgentelella');
                        $this->load->view('moderador/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
        public function todos()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $lista=$this->usuario_model->listaUsuarios();
                        $data['usuario']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_comunidad_todos',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                elseif($this->session->userdata('rol')=='moderador')
                {
                        $lista=$this->usuario_model->listaUsuarios();
                        $data['usuario']=$lista;
                        $this->load->view('moderador/inc/headergentelella');
                        $this->load->view('moderador/inc/sidebargentelella');
                        $this->load->view('moderador/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_comunidad_todos',$data);
                        $this->load->view('moderador/inc/creditosgentelella');
                        $this->load->view('moderador/inc/footergentelella');
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
                if($this->session->userdata('rol')=='admin')
                {
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_perfil',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                elseif ($this->session->userdata('rol')=='usuario') {
                        $this->load->view('usuario/inc/headergentelella');
                        $this->load->view('usuario/inc/sidebargentelella');
                        $this->load->view('usuario/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_perfil',$data);
                        $this->load->view('usuario/inc/creditosgentelella');
                        $this->load->view('usuario/inc/footergentelella');
                }
                elseif ($this->session->userdata('rol')=='policia') {
                        $this->load->view('policia/inc/headergentelella');
                        $this->load->view('policia/inc/sidebargentelella');
                        $this->load->view('policia/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_perfil',$data);
                        $this->load->view('policia/inc/creditosgentelella');
                        $this->load->view('policia/inc/footergentelella');
                }
                elseif ($this->session->userdata('rol')=='autoridad') {
                        $this->load->view('autoridad/inc/headergentelella');
                        $this->load->view('autoridad/inc/sidebargentelella');
                        $this->load->view('autoridad/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_perfil',$data);
                        $this->load->view('autoridad/inc/creditosgentelella');
                        $this->load->view('autoridad/inc/footergentelella');
                }
                elseif ($this->session->userdata('rol')=='moderador') {
                        $this->load->view('moderador/inc/headergentelella');
                        $this->load->view('moderador/inc/sidebargentelella');
                        $this->load->view('moderador/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_perfil',$data);
                        $this->load->view('moderador/inc/creditosgentelella');
                        $this->load->view('moderador/inc/footergentelella');
                }
                else{
                        redirect('usuarios/panel','refresh');
                }
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
                        'Contrase??a del Usuario',
                        'required|min_length[8]',
                        array(
                        'required'=>'Se requiere ingresar la contrase??a del usuario.',
                        'min_length'=>'??La contrase??a debe tener al menos 8 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'recontrasenha',
                        'Contrase??a repetida del Usuario',
                        'required|min_length[8]',
                        array(
                        'required'=>'??Se requiere repetir la contrase??a del usuario!.',
                        'min_length'=>'??La contrase??a debe tener al menos 8 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'??El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'N??mero de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'??El n??mero de celular es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de celular v??lido!.',
                        'max_length'=>'??El n??mero de celular no contiene m??s los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'N??mero de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'??El n??mero de carnet es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de carnet v??lido!.',
                        'max_length'=>'??El n??mero de carnet no contiene m??s de 8 caracteres!.',
                        'is_natural'=>'??No ingrese caracteres que no sean n??meros!.'
                        )
                    );
                if($this->form_validation->run()==FALSE || $_POST['contrasenha'] != $_POST['recontrasenha'])
                {
                        $lista=$this->departamento_model->listadepartamentos();
                        $data['departamento']=$lista;
                        $this->load->view('login/login_header');
                        $this->load->view('login/register_view',$data);
                        $this->load->view('login/login_footer'); 
                }
                else{
                        $data['idDepartamento']=$_POST['iddepartamento'];
                        $data['nombres']=trim($_POST['nombres']);
                        $data['primerApellido']=trim($_POST['primerapellido']);
                        $data['segundoApellido']=trim($_POST['segundoapellido']);
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=trim($_POST['numeroci']);
                        $data['sexo']=$_POST['sexo'];
                        $data['correo']=trim($_POST['correo']);
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
                        'Contrase??a del Usuario',
                        'required|min_length[8]',
                        array(
                        'required'=>'Se requiere ingresar la contrase??a del usuario.',
                        'min_length'=>'??La contrase??a debe tener al menos 8 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'nombres',
                        'Nombre del usuario',
                        'required|min_length[3]|max_length[30]',
                        array('required'=>'??Se requiere ingresar sus nombres!',
                        'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                        'max_length'=>'??El nombre no debe contener m??s de 30 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'??El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'N??mero de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'??El n??mero de celular es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de celular v??lido!.',
                        'max_length'=>'??El n??mero de celular no contiene m??s los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'N??mero de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'??El n??mero de carnet es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de carnet v??lido!.',
                        'max_length'=>'??El n??mero de carnet no contiene m??s de 8 caracteres!.',
                        'is_natural'=>'??No ingrese caracteres que no sean n??meros!.'
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
                        $data['nombres']=trim($_POST['nombres']);
                        $data['primerApellido']=trim($_POST['primerapellido']);
                        $data['segundoApellido']=trim($_POST['segundoapellido']);
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=trim($_POST['numeroci']);
                        $data['sexo']=$_POST['sexo'];
                        $data['correo']=trim($_POST['correo']);
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
                elseif($this->session->userdata('rol')=='moderador')
                {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                $lista=$this->departamento_model->listadepartamentos();
                $data['departamento']=$lista;
                $this->load->view('moderador/inc/headergentelella');
                $this->load->view('moderador/inc/sidebargentelella');
                $this->load->view('moderador/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_update',$data);
                $this->load->view('moderador/inc/creditosgentelella');
                $this->load->view('moderador/inc/footergentelella');
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
                        array('required'=>'??Se requiere ingresar sus nombres!',
                        'min_length'=>'El nombre debe tener al menos 3 caracteres.',
                        'max_length'=>'??El nombre no debe contener m??s de 30 caracteres!.'
                        )
                );
                $this->form_validation->set_rules(
                        'primerapellido',
                        'Primer apellido del usuario',
                        'required|min_length[4]|max_length[30]|alpha',
                        array('required'=>'??El primer apellido es obligatorio!.',
                        'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                );
                $this->form_validation->set_rules(
                    'segundoapellido',
                    'Segundo apellido del usuario',
                    'min_length[4]|max_length[30]|alpha',
                    array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                        'max_length'=>'??El apellido no debe contener m??s de 30 caracteres!.',
                        'alpha'=>'??El apellido solo debe contener letras!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numerocelular',
                    'N??mero de Celular del usuario',
                    'required|min_length[8]|max_length[13]',
                    array('required'=>'??El n??mero de celular es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de celular v??lido!.',
                        'max_length'=>'??El n??mero de celular no contiene m??s los 13 caracteres!.'
                        )
                    );
                $this->form_validation->set_rules(
                    'numeroci',
                    'N??mero de Carnet del usuario',
                    'required|min_length[6]|max_length[8]|is_natural',
                    array('required'=>'??El n??mero de carnet es obligatorio!',
                        'min_length'=>'??Ingrese un n??mero de carnet v??lido!.',
                        'max_length'=>'??El n??mero de carnet no contiene m??s de 8 caracteres!.',
                        'is_natural'=>'??No ingrese caracteres que no sean n??meros!.'
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
                        $data['nombres']=trim($_POST['nombres']);
                        $data['primerApellido']=trim($_POST['primerapellido']);
                        $data['segundoApellido']=trim($_POST['segundoapellido']);
                        $data['numeroCelular']=$_POST['numerocelular'];
                        $data['numeroCI']=trim($_POST['numeroci']);
                        $data['correo']=trim($_POST['correo']);
                        $data['idUsuario']=$_POST['idusuario'];
                        $data['fechaActualizacion']=date('Y-m-d H:i:s');
                        $this->usuario_model->modificarusuarios($idusuario,$data);
                        redirect('usuarios/inicio','refresh');
                }
        }

        public function habilitarbd($idusuario)
        {
                $data['estado']='1';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
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
                        $this->session->set_userdata('nombres',$row->nombres);
                        $this->session->set_userdata('primerapellido',$row->primerApellido);
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
                        elseif($this->session->userdata('rol')=='policia'){
                                redirect('publicacion/indexStaff','refresh');
                        }
                        elseif($this->session->userdata('rol')=='autoridad'){
                                redirect('publicacion/indexStaff','refresh');
                        }
                        elseif($this->session->userdata('rol')=='moderador'){
                                redirect('usuarios/inicio','refresh');
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
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $lista=$this->usuario_model->filtroUsuarioNoVerificado($fecha_inicio,$fecha_fin);
        $data['usuario']=$lista;
        if ($this->session->userdata('rol')=='admin') {
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
                $this->load->view('moderador/inc/headergentelella');
                $this->load->view('moderador/inc/sidebargentelella');
                $this->load->view('moderador/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_comunidad',$data);
                $this->load->view('moderador/inc/creditosgentelella');
                $this->load->view('moderador/inc/footergentelella');
        }
        else{
            redirect('usuarios/panel','refresh');
        }  
    }
    public function vetados_filtro()
        {
                $fecha_inicio=$_POST['date_inicio'];
                $fecha_fin=$_POST['date_fin'];
                $lista=$this->usuario_model->filtrolistaUsuariosVetados($fecha_inicio,$fecha_fin);
                $data['usuario']=$lista;
                if($this->session->userdata('rol')=='admin')
                {
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_deshabilitados',$data);
                        $this->load->view('admin/inc/creditosgentelella');
                        $this->load->view('admin/inc/footergentelella');
                }
                elseif($this->session->userdata('rol')=='moderador')
                {
                        $this->load->view('moderador/inc/headergentelella');
                        $this->load->view('moderador/inc/sidebargentelella');
                        $this->load->view('moderador/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read_deshabilitados',$data);
                        $this->load->view('moderador/inc/creditosgentelella');
                        $this->load->view('moderador/inc/footergentelella');
                }
                else
                {
                        redirect('usuarios/panel','refresh');
                }   
        }
    public function todos_filtro()
    {
        $fecha_inicio=$_POST['date_inicio'];
        $fecha_fin=$_POST['date_fin'];
        $lista=$this->usuario_model->filtroListaUsuarios($fecha_inicio,$fecha_fin);
        $data['usuario']=$lista;
        if ($this->session->userdata('rol')=='admin') {
                $this->load->view('admin/inc/headergentelella');
                $this->load->view('admin/inc/sidebargentelella');
                $this->load->view('admin/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_comunidad_todos',$data);
                $this->load->view('admin/inc/creditosgentelella');
                $this->load->view('admin/inc/footergentelella');
        }
        elseif ($this->session->userdata('rol')=='moderador') {
                $this->load->view('moderador/inc/headergentelella');
                $this->load->view('moderador/inc/sidebargentelella');
                $this->load->view('moderador/inc/topbargentelella');
                $this->load->view('admin/usuario/usuario_read_comunidad_todos',$data);
                $this->load->view('moderador/inc/creditosgentelella');
                $this->load->view('moderador/inc/footergentelella');
        }
        else{
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