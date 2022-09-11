<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function index()
	{
                if ($this->session->userdata('nombreusuario'))
                {//Usuario logueado
                        redirect('usuarios/panel','refresh');
                }
                else
                {//Usuario no logueado
                        $this->load->view('login/login_header');
                        $this->load->view('login/login_view');
                        $this->load->view('login/login_footer');
                } 
        }

        public function inicio()
        {
                if($this->session->userdata('rol')=='admin')
                {
                        $lista=$this->usuario_model->listausuarios();
                        $data['usuario']=$lista;
                        $this->load->view('admin/inc/headergentelella');
                        $this->load->view('admin/inc/sidebargentelella');
                        $this->load->view('admin/inc/topbargentelella');
                        $this->load->view('admin/usuario/usuario_read',$data);
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
                        'nombreusuario',
                        'Username del Usuario',
                        'required|min_length[3]|max_length[50]|alpha',
                        array(
                        'required'=>'Se requiere ingresar el nombre de usuario!.',
                        'min_length'=>'El usuario debe tener al menos 3 caracteres.',
                        'max_length'=>'¡El usuario no debe contener más de 50 caracteres!.',
                        'alpha'=>'¡El login solo debe contener letras!.'
                        )
                );        
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
                        'required|min_length[4]|max_length[30]',
                        array('required'=>'¡Se requiere ingresar sus nombres!',
                        'min_length'=>'El nombre debe tener al menos 4 caracteres.',
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
                    'required|exact_length[8]|is_natural',
                    array('required'=>'¡El número de celular es obligatorio!',
                        'exact_length'=>'¡Ingrese un número de celular válido!.',
                        'is_natural'=>'¡No ingrese caracteres que no sean números!.'
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
                        $data['nombreUsuario']=strtolower($_POST['nombreusuario']);
                        $data['contrasenha']=md5($_POST['contrasenha']);
                        $data['foto']='1user.jpg';
                        $data['rol']='usuario';
                        $this->usuario_model->agregarusuarios($data);
                        redirect('usuarios/index','refresh');
                }
        }

        public function modificar()
        {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_update',$data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');
        }

        public function modificarbd()
        {
                $this->load->library('form_validation');
                $this->form_validation->set_rules(
                'login',
                'Username del Usuario',
                'required|min_length[3]|max_length[50]|alpha',
                array(
                'required'=>'Se requiere ingresar el nombre de usuario!.',
                'min_length'=>'El usuario debe tener al menos 3 caracteres.',
                'max_length'=>'¡El usuario no debe contener más de 50 caracteres!.',
                'alpha'=>'¡El login solo debe contener letras!.'
                )
                );        
                $this->form_validation->set_rules(
                'password',
                'Contraseña del Usuario',
                'required|min_length[8]',
                array(
                'required'=>'Se requiere ingresar la contraseña del usuario.',
                'min_length'=>'¡La contraseña debe tener al menos 8 caracteres!.'
                )
                );
                if($this->form_validation->run()==FALSE)
                {
                        $idusuario=$_POST['idusuario'];
                        $data['infousuario']=$this->usuario_model->recuperarusuarios($idusuario);
                        $this->load->view('inc/headergentelella');
                        $this->load->view('inc/sidebargentelella');
                        $this->load->view('inc/topbargentelella');
                        $this->load->view('usuario/usuario_update',$data);
                        $this->load->view('inc/creditosgentelella');
                        $this->load->view('inc/footergentelella'); 
                }
                else{
                        $idusuario=$_POST['idusuario'];
                        //inicio lógica de guardado de archivos
                        $nombrearchivo=$idusuario."user.jpg";
                        //ruta donde se guardan los archivos
                        $config['upload_path']='./uploads/';
                        //nombre del archivo
                        $config['file_name']=$nombrearchivo;
                        $direccion="./uploads/".$nombrearchivo;
                        if(file_exists($direccion))
                        {
                            unlink($direccion);
                        }
                        //tipos de archivos permitidos
                        $config['allowed_types']='jpg|png|jpeg';
                        $this->load->library('upload',$config);
                        if(!$this->upload->do_upload())
                        {
                            $data['error']=$this->upload->display_errors();
                        }
                        else
                        {
                            $data['foto']=$nombrearchivo;
                            $this->upload->data();
                        }
                        //fin lógica guardado de archivos
                        $data['login']=strtolower($_POST['login']);
                        $data['password']=md5($_POST['password']);
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
        public function undoverificarbd($idusuario)
        {
                $data['estado']='1';
                $this->usuario_model->modificarusuarios($idusuario,$data);
                redirect('usuarios/inicio','refresh');
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
                $login=$_POST['login'];
                $password=md5($_POST['password']);
                $consulta=$this->usuario_model->validar($login,$password);
                
                if($consulta->num_rows()>0)
                {
                                //validacion efectiva
                                foreach ($consulta->result() as $row) {
                                        $this->session->set_userdata('idusuario',$row->idUsuario);
                                        $this->session->set_userdata('nombreusuario',$row->nombreUsuario);
                                        $this->session->set_userdata('correo',$row->correo);
                                        $this->session->set_userdata('foto',$row->foto);
                                        $this->session->set_userdata('rol',$row->rol);
                                        redirect('usuarios/panel','refresh');
                                }            
                }
                else
                {
                                //error al validar redirigimos al login
                                redirect('usuarios/index','refresh');
                }


        }

        public function panel()
        {
                if ($this->session->userdata('nombreusuario'))
                {
                        if($this->session->userdata('rol')=='admin'){
                                //cargo admin
                                redirect('usuarios/inicio','refresh');

                        }
                        elseif($this->session->userdata('rol')=='usuario'){
                                redirect('producto/index','refresh');
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
                redirect('usuarios/index','refresh');
        }

}