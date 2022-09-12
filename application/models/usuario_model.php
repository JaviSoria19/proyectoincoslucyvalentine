<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function validar($login,$password)
	{
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->group_start();
            $this->db->where('nombreUsuario',$login);
            $this->db->or_where('correo',$login);
            $this->db->group_start();
                $this->db->where('estado','1');
                $this->db->or_where('estado','2');
            $this->db->group_end();
        $this->db->group_end();
        $this->db->where('contrasenha',$password);

        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listausuarios()//select
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,nombreUsuario,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.estado','1');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        $this->db->or_where('u.estado','2');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function agregarusuarios($data)//create
    {
        $this->db->insert('usuario',$data); //tabla
    }

    public function eliminarusuarios($idusuario)//delete
    {
        $this->db->where('idUsuario',$idusuario); //condición where id
        $this->db->delete('usuario'); //tabla
    }

    public function recuperarusuarios($idusuario)//get
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,nombreUsuario,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.idUsuario',$idusuario);
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarusuarios($idusuario,$data)//update
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->update('usuario',$data);
    }

    public function listausuariosdeshabilitados()//select
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,nombreUsuario,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.estado','0'); //condición where estado = 1
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
