<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal_model extends CI_Model {

	public function listasucursales()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('sucursal'); //tabla
        $this->db->where('estado','1');
        return $this->db->get();
	}
    public function agregarsucursales($data)//create
    {
        $this->db->insert('sucursal',$data); //tabla
    }
    public function eliminarsucursales($idsucursal)//delete
    {
        $this->db->where('idSucursal',$idsucursal); //condición where id
        $this->db->delete('sucursal'); //tabla
    }
    public function recuperarsucursales($idsucursal)//get
    {
        $this->db->select('*'); //select *
        $this->db->from('sucursal'); //tabla
        $this->db->where('idSucursal',$idsucursal);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function modificarsucursales($idsucursal,$data)//update
    {
        $this->db->where('idSucursal',$idsucursal);
        $this->db->update('sucursal',$data);
    }
    public function listasucursalesdeshabilitados()//select
    {
        $this->db->select('*');
        $this->db->from('sucursal');
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
