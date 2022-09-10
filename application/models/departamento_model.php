<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamento_model extends CI_Model {

	public function listadepartamentos()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('departamento'); //tabla
        $this->db->where('estado','1');
        return $this->db->get();
	}
    public function agregardepartamentos($data)//create
    {
        $this->db->insert('departamento',$data); //tabla
    }
    public function eliminardepartamentos($iddepartamento)//delete
    {
        $this->db->where('idDepartamento',$iddepartamento); //condición where id
        $this->db->delete('departamento'); //tabla
    }
    public function recuperardepartamentos($iddepartamento)//get
    {
        $this->db->select('*'); //select *
        $this->db->from('departamento'); //tabla
        $this->db->where('idDepartamento',$iddepartamento);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function modificardepartamentos($iddepartamento,$data)//update
    {
        $this->db->where('idDepartamento',$iddepartamento);
        $this->db->update('departamento',$data);
    }
    public function listadepartamentosdeshabilitados()//select
    {
        $this->db->select('*');
        $this->db->from('departamento');
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
