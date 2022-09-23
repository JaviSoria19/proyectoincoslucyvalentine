<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_nombre_model extends CI_Model {


	public function listaTest_nombre()//select
    {
        $this->db->select('tn.idNombre,tn.nombre,tn.estado,tn.fechaRegistro,tn.fechaActualizacion');
        $this->db->from('test_nombre AS tn');
        $this->db->where('tn.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarTest_nombre($data)//create
    {
        $this->db->insert('test_nombre',$data); //tabla
    }
    public function eliminarTest_nombre($idtest_nombre)//delete
    {
        $this->db->where('idTest_nombre',$idtest_nombre); //condición where id
        $this->db->delete('test_nombre'); //tabla
    }
    public function recuperarTest_nombre($idtest_nombre)//get
    {
        $this->db->select('tn.idNombre,tn.nombre,tn.estado,tn.fechaRegistro,tn.fechaActualizacion');
        $this->db->from('test_nombre AS tn');
        $this->db->where('tn.idTest_nombre',$idtest_nombre);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaTest_nombreDeshabilitados()//select
    {
        $this->db->select('tn.idNombre,tn.nombre,tn.estado,tn.fechaRegistro,tn.fechaActualizacion');
        $this->db->from('test_nombre AS tn');
        $this->db->where('tn.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
