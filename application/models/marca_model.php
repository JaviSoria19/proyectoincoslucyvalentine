<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca_model extends CI_Model {

	public function listamarcas()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('marca'); //tabla
        $this->db->where('estado','1');
        return $this->db->get();
	}
    public function agregarmarcas($data)//create
    {
        $this->db->insert('marca',$data); //tabla
    }
    public function eliminarmarcas($idmarca)//delete
    {
        $this->db->where('idMarca',$idmarca); //condición where id
        $this->db->delete('marca'); //tabla
    }
    public function recuperarmarcas($idmarca)//get
    {
        $this->db->select('*'); //select *
        $this->db->from('marca'); //tabla
        $this->db->where('idMarca',$idmarca);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function modificarmarcas($idmarca,$data)//update
    {
        $this->db->where('idMarca',$idmarca);
        $this->db->update('marca',$data);
    }
    public function listamarcasdeshabilitados()//select
    {
        $this->db->select('*');
        $this->db->from('marca');
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
