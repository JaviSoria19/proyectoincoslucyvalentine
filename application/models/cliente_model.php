<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {


	public function listaclientes()//select
	{
        $this->db->select('cliente.idCliente,cliente.idPersona,cliente.estado,cliente.fechaRegistro,cliente.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI'); //select *
        $this->db->from('cliente'); //tabla productos
        $this->db->where('cliente.estado','1'); //condición where estado = 1
        $this->db->join('persona', 'cliente.idPersona = persona.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarclientes($data)//create
    {
        $this->db->insert('cliente',$data); //tabla
    }

    public function eliminarclientes($idcliente)//delete
    {
        $this->db->where('idCliente',$idcliente); //condición where id
        $this->db->delete('cliente'); //tabla
    }

    public function recuperarclientes($idcliente)//get
    {
        $this->db->select('cliente.idCliente,cliente.idPersona,cliente.estado,cliente.fechaRegistro,cliente.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI');  //select *
        $this->db->from('cliente'); //tabla
        $this->db->where('cliente.idCliente',$idcliente); //condición where id
        $this->db->join('persona', 'cliente.idPersona = persona.idPersona');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarclientes($idcliente,$data)//update
    {
        $this->db->where('idCliente',$idcliente);
        $this->db->update('cliente',$data);
    }

    public function listaclientesdeshabilitados()//select
    {
        $this->db->select('cliente.idCliente,cliente.idPersona,cliente.estado,cliente.fechaRegistro,cliente.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI');  //select *
        $this->db->from('cliente'); //tabla productos
        $this->db->where('cliente.estado','0'); //condición where estado = 1
        $this->db->join('persona', 'cliente.idPersona = persona.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
