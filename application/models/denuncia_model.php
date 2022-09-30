<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denuncia_model extends CI_Model {


	public function listadenuncias()//select
	{
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.autoridadAsignada,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.estado','1');
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function agregardenuncias($data)//create
    {
        $this->db->insert('denuncia',$data); //tabla
        return $this->db->insert_id();
    }
    public function eliminardenuncias($iddenuncia)//delete
    {
        $this->db->where('idDenuncia',$iddenuncia);
        $this->db->delete('denuncia'); //tabla
    }
    public function recuperardenuncias($iddenuncia)//get
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.autoridadAsignada,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.idDenuncia',$iddenuncia);
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function recuperardenunciasusuario($idusuario)//get
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.autoridadAsignada,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.idUsuario',$idusuario);
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificardenuncias($iddenuncia,$data)//update
    {
        $this->db->where('idDenuncia',$iddenuncia);
        $this->db->update('denuncia',$data);
    }
    public function listadenunciasdeshabilitados()//select
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.autoridadAsignada,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.estado','0');
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function filtroDenuncias($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.autoridadAsignada,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento
            FROM denuncia AS d
            INNER JOIN denuncia_categoria AS c ON d.idCategoria = c.idCategoria
            INNER JOIN usuario AS u ON d.idUsuario = u.idUsuario
            INNER JOIN departamento AS dep ON u.idDepartamento = dep.idDepartamento
            WHERE d.estado = 1 AND d.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
}
