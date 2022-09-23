<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {


	public function listaTest()//select
    {
        $this->db->select('t.idTest,t.idUsuario,t.idNombre,t.respuesta1,t.respuesta2,t.respuesta3,t.respuesta4,t.respuesta5,t.resultado,t.estado,t.fechaRegistro,tn.nombre,u.nombres,u.primerApellido,u.segundoApellido');
        $this->db->from('test AS t');
        $this->db->where('t.estado','1');
        $this->db->join('test_nombre AS tn', 't.idNombre = tn.idNombre');
        $this->db->join('usuario AS u', 't.idUsuario = u.idUsuario');
        $this->db->order_by('t.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarTest($data)//create
    {
        $this->db->insert('test',$data); //tabla
    }
    public function eliminarTest($idtest)//delete
    {
        $this->db->where('idTest',$idtest); //condición where id
        $this->db->delete('test'); //tabla
    }
    public function recuperarTest($idtest)//get
    {
        $this->db->select('t.idTest,t.idUsuario,t.idNombre,t.respuesta1,t.respuesta2,t.respuesta3,t.respuesta4,t.respuesta5,t.resultado,t.estado,t.fechaRegistro,tn.nombre');
        $this->db->from('test AS t');
        $this->db->where('t.idTest',$idtest);
        $this->db->join('test_nombre AS tn', 't.idNombre = tn.idNombre');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function recuperarTestUsuario($idusuario)//get
    {
        $this->db->select('t.idTest,t.idUsuario,t.idNombre,t.respuesta1,t.respuesta2,t.respuesta3,t.respuesta4,t.respuesta5,t.resultado,t.estado,t.fechaRegistro,tn.nombre');
        $this->db->from('test AS t');
        $this->db->where('t.idUsuario',$idusuario);
        $this->db->join('test_nombre AS tn', 't.idNombre = tn.idNombre');
        $this->db->order_by('t.fechaRegistro', 'DESC');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaTestDeshabilitados()//select
    {
        $this->db->select('t.idTest,t.idUsuario,t.idNombre,t.respuesta1,t.respuesta2,t.respuesta3,t.respuesta4,t.respuesta5,t.resultado,t.estado,t.fechaRegistro,tn.nombre');
        $this->db->from('test AS t');
        $this->db->where('t.estado','0'); //condición where estado = 1
        $this->db->join('test_nombre AS tn', 't.idNombre = tn.idNombre');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','0');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
