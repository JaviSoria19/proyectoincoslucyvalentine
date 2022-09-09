<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta_model extends CI_Model {


	public function listaventas()//select
	{
        $this->db->select('idVenta,foto,nombreVenta,descripcion,precio,color,stock,venta.estado,venta.fechaRegistro,venta.fechaActualizacion,venta.idCategoria,nombreCategoria,venta.idMarca,nombreMarca'); //select *
        $this->db->from('venta'); //tabla venta
        $this->db->where('venta.estado','1'); //condición where estado = 1
        $this->db->join('categoria', 'venta.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'venta.idMarca = marca.idMarca');//inner join a una segunda tabla
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function agregarventas($data)//create
    {
        $this->db->insert('venta',$data); //tabla
    }
    public function eliminarventas($idventa)//delete
    {
        $this->db->where('idVenta',$idventa); //condición where id
        $this->db->delete('venta'); //tabla
    }
    public function recuperarventas($idventa)//get
    {
        $this->db->select('idVenta,foto,nombreVenta,descripcion,precio,color,stock,venta.estado,venta.fechaRegistro,venta.fechaActualizacion,venta.idCategoria,nombreCategoria,venta.idMarca,nombreMarca'); //select *
        $this->db->from('venta'); //tabla
        $this->db->where('idVenta',$idventa);
        $this->db->join('categoria', 'venta.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'venta.idMarca = marca.idMarca');
         //condición where id
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarventas($idventa,$data)//update
    {
        $this->db->where('idVenta',$idventa);
        $this->db->update('venta',$data);
    }
    public function listaventasdeshabilitados()//select
    {
        $this->db->select('idVenta,foto,nombreVenta,descripcion,precio,color,stock,venta.estado,venta.fechaRegistro,venta.fechaActualizacion,venta.idCategoria,nombreCategoria,venta.idMarca,nombreMarca'); //select *
        $this->db->from('venta'); //tabla venta
        $this->db->where('venta.estado','0'); //condición where estado = 1
        $this->db->join('categoria', 'venta.idCategoria = categoria.idCategoria');
        $this->db->join('marca', 'venta.idMarca = marca.idMarca');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
