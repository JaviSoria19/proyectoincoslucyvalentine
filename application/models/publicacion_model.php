<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion_model extends CI_Model {


	public function listaPublicacionesStaff()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p'); //tabla publicacion
        $this->db->where('p.estado','1'); //condición where estado = 1
        $this->db->where('u.rol','admin');
        $this->db->where('p.tipo','1');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaPublicacionesComunidad()//select
    {
        $this->db->select('p.idPublicacion,p.idUsuario,fotoPublicacion,titulo,contenido,tipo,p.estado,p.fechaRegistro,p.fechaActualizacion,u.correo,u.rol,u.estado AS estadoUsuario'); //select *
        $this->db->from('publicacion AS p'); //tabla publicacion
        $this->db->where('p.estado','1'); //condición where estado = 1
        $this->db->where('u.rol','usuario');
        $this->db->where('p.tipo','2');
        $this->db->join('usuario AS u', 'p.idUsuario = u.idUsuario');
        $this->db->order_by('p.fechaRegistro', 'DESC');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarpublicaciones($data)//create
    {
        $this->db->insert('publicacion',$data); //tabla
    }
    public function eliminarpublicaciones($idpublicacion)//delete
    {
        $this->db->where('idPublicacion',$idpublicacion); //condición where id
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
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
