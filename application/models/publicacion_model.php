<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_model extends CI_Model {


	public function listaPublicacionesStaff()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','1');
        $this->db->where('u.rol','admin');
        $this->db->where('p.tipo','1');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaPublicacionesComunidad()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','1');
        $this->db->where('u.rol','usuario');
        $this->db->where('p.tipo','2');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaPublicacionesInformacionEducativa()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','1');
        $this->db->where('u.rol','admin');
        $this->db->where('p.tipo','3');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaPublicacionesPautasdeSeguridad()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','1');
        $this->db->where('u.rol','admin');
        $this->db->where('p.tipo','4');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaPublicacionesPromociondeActitudesIgualitarias()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','1');
        $this->db->where('u.rol','admin');
        $this->db->where('p.tipo','5');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarpublicaciones($data)//create
    {
        $this->db->insert('publicacion',$data); //tabla
    }
    public function eliminarpublicaciones($idpublicacion)//delete
    {
        $this->db->where('idPublicacion',$idpublicacion);
        $this->db->delete('publicacion'); //tabla
    }
    public function recuperarpublicaciones($idpublicacion)//get
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.idPublicacion',$idpublicacion);
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
         //condición where id
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarpublicaciones($idpublicacion,$data)//update
    {
        $this->db->where('idPublicacion',$idpublicacion);
        $this->db->update('publicacion',$data);
    }
    public function listapublicacionesdeshabilitados()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p');
        $this->db->where('p.estado','0'); //condición where estado = 1
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function filtroPublicacionStaff($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario
            FROM publicacion AS p
            INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
            WHERE p.estado = 1 AND u.rol = 'admin' AND p.tipo = '1' AND p.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get();
    }
    public function filtroPublicacionComunidad($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario
            FROM publicacion AS p
            INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
            WHERE p.estado = 1 AND u.rol = 'usuario' AND p.tipo = '2' AND p.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get();
    }
    public function filtroPublicacionInfo1($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario
            FROM publicacion AS p
            INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
            WHERE p.estado = 1 AND u.rol = 'admin' AND p.tipo = '3' AND p.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get();
    }
    public function filtroPublicacionInfo2($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario
            FROM publicacion AS p
            INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
            WHERE p.estado = 1 AND u.rol = 'admin' AND p.tipo = '4' AND p.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get();
    }
    public function filtroPublicacionInfo3($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario
            FROM publicacion AS p
            INNER JOIN usuario AS u ON p.idUsuario = u.idUsuario
            WHERE p.estado = 1 AND u.rol = 'admin' AND p.tipo = '5' AND p.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get();
    }
}
