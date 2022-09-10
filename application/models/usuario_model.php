<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function validar($login,$password)
	{
        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('nombreUsuario',$login);
        $this->db->where('contrasenha',$password);
        $this->db->where('estado','1');
        $this->db->or_where('correo',$login);
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listausuarios()//select
    {
        $this->db->select('idUsuario,foto,login,password,tipo,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado,empleado.idSucursal,nombreSucursal,nombres,primerApellido,segundoApellido'); //select *
        $this->db->from('usuario'); //tabla productos
        $this->db->where('usuario.estado','1'); //condición where estado = 1
        $this->db->join('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
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
        $this->db->select('foto,login,password,tipo,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado,empleado.idSucursal,nombreSucursal,nombres,primerApellido,segundoApellido,sexo,numeroCI,numeroCelular'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('idUsuario',$idusuario); //condición where id
        $this->db->join('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarusuarios($idusuario,$data)//update
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->update('usuario',$data);
    }

    public function listausuariosdeshabilitados()//select
    {
        $this->db->select('idUsuario,foto,login,password,tipo,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado,empleado.idSucursal,nombreSucursal,nombres,primerApellido,segundoApellido'); //select *
        $this->db->from('usuario'); //tabla productos
        $this->db->where('usuario.estado','0'); //condición where estado = 1
        $this->db->join('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
