<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

	public function listacategorias()//select
	{
        $this->db->select('*'); //select *
        $this->db->from('categoria'); //tabla
        $this->db->where('estado','1');
        return $this->db->get();
	}
    
    public function agregarcategorias($data)//create
    {
        $this->db->insert('categoria',$data); //tabla
    }
    public function eliminarcategorias($idcategoria)//delete
    {
        $this->db->where('idCategoria',$idcategoria); //condición where id
        $this->db->delete('categoria'); //tabla
    }
    public function recuperarcategorias($idcategoria)//get
    {
        $this->db->select('*'); //select *
        $this->db->from('categoria'); //tabla
        $this->db->where('idCategoria',$idcategoria);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function modificarcategorias($idcategoria,$data)//update
    {
        $this->db->where('idCategoria',$idcategoria);
        $this->db->update('categoria',$data);
    }
    public function listacategoriasdeshabilitados()//select
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
