<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function index()
	{
                if ($this->session->userdata('login'))
                {
                                //Usuario logueado
                         redirect('usuarios/panel','refresh');
                }
                else{
                                //Usuario no logueado
                         $this->load->view('login/vwheaderlogin');
                         $this->load->view('login/vwlogin');
                         $this->load->view('login/vwfooterlogin');
                } 
        }

        public function inicio()
        {

                if($this->session->userdata('tipo')=='admin')
                {
                $lista=$this->usuario_model->listausuarios();
                $data['usuario']=$lista;
                $listadeshabilitados=$this->usuario_model->listausuariosdeshabilitados();
                $data['usuariodeshabilitados']=$listadeshabilitados;
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_read',$data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');
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
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_perfil',$data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella'); 
        }

        public function agregar()
        {
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_insert',$data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');    
        }
        public function agregarbd()
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
                        $lista=$this->empleado_model->listaempleados();
                        $data['empleado']=$lista;
                        $this->load->view('inc/headergentelella');
                        $this->load->view('inc/sidebargentelella');
                        $this->load->view('inc/topbargentelella');
                        $this->load->view('usuario/usuario_formulario_insert',$data);
                        $this->load->view('inc/creditosgentelella');
                        $this->load->view('inc/footergentelella'); 
                }
                else{
                        $data['login']=strtolower($_POST['login']);
                        $data['password']=md5($_POST['password']);
                        $data['idEmpleado']=$_POST['idempleado'];
                        $data['tipo']=$_POST['tipo'];
                        $this->usuario_model->agregarusuarios($data);
                        redirect('usuarios/inicio','refresh');
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
                                        $this->session->set_userdata('login',$row->login);
                                        $this->session->set_userdata('tipo',$row->tipo);
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
                if ($this->session->userdata('login'))
                {

                        if ($this->session->userdata('tipo')=='admin'){
                                //cargo admin
                                redirect('producto/index','refresh');

                        }else{
                                //cargo guest
                                redirect('producto/guest','refresh');
                        }
                }
                else{

                                //USUARIO NO LOGUEADO
                                
                                redirect('usuarios/index','refresh');
                } 



        }

        public function logout()
        {
                $this->session->sess_destroy();
                redirect('usuarios/index','refresh');
        }

}