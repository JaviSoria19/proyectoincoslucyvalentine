<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alerta_model extends CI_Model {


	public function listaAlerta()//select
    {
        $this->db->select('a.idAlerta,a.idUsuario,a.latitud,a.longitud,a.estado,a.fechaRegistro,u.nombres,u.primerApellido,u.segundoApellido,u.correo,u.numeroCelular,d.nombreDepartamento');
        $this->db->from('alerta AS a');
        $this->db->where('a.estado','1');
        $this->db->join('usuario AS u', 'a.idUsuario = u.idUsuario');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarAlerta($data)//create
    {
        $this->db->insert('alerta',$data);
    }
    public function eliminarAlerta($idalerta)//delete
    {
        $this->db->where('idAlerta',$idalerta);
        $this->db->delete('alerta');
    }
    public function recuperarAlerta($idalerta)//get
    {
        $this->db->select('a.idAlerta,a.idUsuario,a.latitud,a.longitud,a.estado,a.fechaRegistro,u.nombres,u.primerApellido,u.segundoApellido,u.correo,u.numeroCelular,d.nombreDepartamento');
        $this->db->from('alerta AS a');
        $this->db->where('a.idAlerta',$idalerta);
        $this->db->join('usuario AS u', 'a.idUsuario = u.idUsuario');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function recuperarAlertaUsuario($idusuario)//get
    {
        $this->db->select('a.idAlerta,a.idUsuario,a.latitud,a.longitud,a.estado,a.fechaRegistro,u.nombres,u.primerApellido,u.segundoApellido,u.correo,u.numeroCelular,d.nombreDepartamento');
        $this->db->from('alerta AS a');
        $this->db->where('a.idUsuario',$idusuario);
        $this->db->join('usuario AS u', 'a.idUsuario = u.idUsuario');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaAlertaDeshabilitados()//select
    {
        $this->db->select('a.idAlerta,a.idUsuario,a.latitud,a.longitud,a.estado,a.fechaRegistro,u.nombres,u.primerApellido,u.segundoApellido,u.correo,u.numeroCelular,d.nombreDepartamento');
        $this->db->from('alerta AS a');
        $this->db->where('a.estado','0');
        $this->db->join('usuario AS u', 'a.idUsuario = u.idUsuario');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function filtroAlerta($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            a.idAlerta,a.idUsuario,a.latitud,a.longitud,a.estado,a.fechaRegistro,u.nombres,u.primerApellido,u.segundoApellido,u.correo,u.numeroCelular,d.nombreDepartamento 
            FROM alerta AS a 
            INNER JOIN usuario AS u ON a.idUsuario = u.idUsuario
            INNER JOIN departamento AS d ON u.idDepartamento = d.idDepartamento
            WHERE a.estado = 1 AND a.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
}
