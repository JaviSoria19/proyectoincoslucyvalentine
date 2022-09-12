<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario_model extends CI_Model {


	public function listacomentarios($idPublicacion)//select
	{
        $this->db->select('c.idComentario,c.idUsuario,c.idPublicacion,comentario,c.estado,c.fechaRegistro,c.fechaActualizacion,u.nombreUsuario,u.rol,u.estado AS estadoUsuario');
        $this->db->from('comentario AS c');
        $this->db->where('c.estado','1');
        $this->db->where('c.idPublicacion',$idPublicacion);
        $this->db->join('publicacion AS p', 'c.idPublicacion = p.idPublicacion');
        $this->db->join('usuario AS u', 'c.idUsuario = u.idUsuario');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function agregarcomentarios($data)//create
    {
        $this->db->insert('comentario',$data); //tabla
    }
    public function eliminarcomentarios($idcomentario)//delete
    {
        $this->db->where('idComentario',$idcomentario); //condición where id
        $this->db->delete('comentario'); //tabla
    }
    public function recuperarcomentarios($idcomentario)//get
    {
        $this->db->select('c.idComentario,c.idUsuario,c.idPublicacion,comentario,estado,c.fechaRegistro,c.fechaActualizacion,u.nombreUsuario,u.rol,u.estado');
        $this->db->from('comentario AS c');
        $this->db->where('idComentario',$idcomentario);
        $this->db->join('publicacion AS p', 'c.idPublicacion = p.idPublicacion');
        $this->db->join('usuario AS u', 'c.idUsuario = u.idUsuario');
         //condición where id
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarcomentarios($idcomentario,$data)//update
    {
        $this->db->where('idComentario',$idcomentario);
        $this->db->update('comentario',$data);
    }
    public function listacomentariosdeshabilitados()
    {
        $this->db->select('c.idComentario,c.idUsuario,c.idPublicacion,comentario,estado,c.fechaRegistro,c.fechaActualizacion,u.nombreUsuario,u.rol,u.estado');
        $this->db->from('comentario AS c');
        $this->db->where('comentario.estado','0');
        $this->db->join('publicacion AS p', 'c.idPublicacion = p.idPublicacion');
        $this->db->join('usuario AS u', 'c.idUsuario = u.idUsuario');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
