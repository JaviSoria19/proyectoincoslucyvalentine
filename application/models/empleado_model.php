<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {

	public function listaempleados()//select
	{
        $this->db->select('empleado.idEmpleado,empleado.idSucursal,empleado.idPersona,sexo,empleado.estado,empleado.fechaRegistro,empleado.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,nombreSucursal,direccion'); //select *
        $this->db->from('empleado'); //tabla productos
        $this->db->where('empleado.estado','1'); //condición where estado = 1
        $this->db->or_where('empleado.estado','2');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaempleadossinusuarios()//select
    {
        $this->db->select('empleado.idEmpleado,empleado.idSucursal,empleado.idPersona,sexo,empleado.estado,empleado.fechaRegistro,empleado.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,nombreSucursal,direccion');
        $this->db->from('empleado');
        $this->db->where('empleado.estado','1');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function agregarempleados($data)//create
    {
        $this->db->insert('empleado',$data);
    }

    public function eliminarempleados($idempleado)//delete
    {
        $this->db->where('idEmpleado',$idempleado);
        $this->db->delete('empleado'); //tabla
    }

    public function recuperarempleados($idempleado)//get
    {
        $this->db->select('empleado.idEmpleado,empleado.idSucursal,empleado.idPersona,sexo,empleado.estado,empleado.fechaRegistro,empleado.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,nombreSucursal,direccion');
        $this->db->from('empleado');
        $this->db->where('idEmpleado',$idempleado);
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarempleados($idempleado,$data)//update
    {
        $this->db->where('idEmpleado',$idempleado);
        $this->db->update('empleado',$data);
    }

    public function listaempleadosdeshabilitados()//select
    {
        $this->db->select('empleado.idEmpleado,empleado.idSucursal,empleado.idPersona,sexo,empleado.estado,empleado.fechaRegistro,empleado.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,nombreSucursal,direccion');
        $this->db->from('empleado');
        $this->db->where('empleado.estado','0');
        $this->db->join('sucursal', 'empleado.idSucursal = sucursal.idSucursal');
        $this->db->join('persona', 'empleado.idPersona = persona.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
