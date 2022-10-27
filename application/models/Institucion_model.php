<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion_model extends CI_Model {

	public function listainstituciones($iddepartamento)//select
	{
        $this->db->select('i.idInstitucion, i.idDepartamento, i.nombreInstitucion, i.direccion, i.telefono, i.estado, i.fechaRegistro, i.fechaActualizacion, d.nombreDepartamento');
        $this->db->from('institucion AS i');
        $this->db->where('i.estado','1');
        $this->db->where('i.idDepartamento',$iddepartamento);
        $this->db->join('departamento AS d', 'i.idDepartamento = d.idDepartamento');
        return $this->db->get();
	}
    public function agregarinstituciones($data)//create
    {
        $this->db->insert('institucion',$data); //tabla
    }
    public function eliminarinstitucions($idinstitucion)//delete
    {
        $this->db->where('idInstitucion',$idinstitucion); //condición where id
        $this->db->delete('institucion'); //tabla
    }
    public function recuperarinstituciones($idinstitucion)//get
    {
        $this->db->select('i.idInstitucion, i.idDepartamento, i.nombreInstitucion, i.direccion, i.telefono, i.estado, i.fechaRegistro, i.fechaActualizacion, d.nombreDepartamento');
        $this->db->from('institucion AS i');
        $this->db->where('i.idInstitucion',$idinstitucion);
        $this->db->join('departamento AS d', 'i.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function modificarinstituciones($idinstitucion,$data)//update
    {
        $this->db->where('idInstitucion',$idinstitucion);
        $this->db->update('institucion',$data);
    }
    public function listainstitucionesdeshabilitados()//select
    {
        $this->db->select('i.idInstitucion, i.idDepartamento, i.nombreInstitucion, i.direccion, i.telefono, i.estado, i.fechaRegistro, i.fechaActualizacion, d.nombreDepartamento');
        $this->db->from('institucion AS i');
        $this->db->where('i.estado','0');
        $this->db->join('departamento AS d', 'i.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
