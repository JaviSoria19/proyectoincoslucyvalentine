<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Like extends CI_Controller {

    public function agregarbd()
    {
        $data['idPublicacion']=$_POST['idpublicacion'];
        $data['idUsuario']=$this->session->userdata('idusuario');
        $this->like_model->agregarLike($data);
        switch ($_POST['tipo']) {
            case '1':
                redirect('publicacion/indexStaff','refresh');
                break;
            case '2':
                redirect('publicacion/indexComunidad','refresh');
                break;
            case '3':
                redirect('publicacion/indexInformacionEducativa','refresh');
                break;
            case '4':
                redirect('publicacion/indexPautasdeSeguridad','refresh');
                break;
            case '5':
                redirect('publicacion/indexPromociondeActitudesIgualitarias','refresh');
                break;
            default:
                redirect('publicacion/indexStaff','refresh');
                break;
        }
    }

  }
