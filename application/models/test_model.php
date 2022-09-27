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
    public function total_test_todas_las_fases()
    {
        $this->db->select('(SELECT COUNT(idTest) FROM test WHERE estado = 1 AND idNombre=1) AS totalfase1,
            (SELECT COUNT(idTest) FROM test WHERE estado = 1 AND idNombre=2) AS totalfase2,
            (SELECT COUNT(idTest) FROM test WHERE estado = 1 AND idNombre=3) AS totalfase3,
            (SELECT COUNT(idTest) FROM test WHERE estado = 1) AS totalrealizados');
        return $this->db->get();
    }
    public function total_fase_individual($idNombre)//select
    {
        $this->db->select('COUNT(idTest) AS totalfase'.$idNombre);
        $this->db->from('test');
        $this->db->where('estado','1');
        $this->db->where('idNombre',$idNombre);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function total_respuestas_por_pregunta_por_fase($idNombre,$res)
    {
        $respuesta='respuesta'.$res;
        $alias1='totalfase'.$idNombre.'respuesta'.$res.'opcion1';
        $alias2='totalfase'.$idNombre.'respuesta'.$res.'opcion2';
        $alias3='totalfase'.$idNombre.'respuesta'.$res.'opcion3';
        $this->db->select('(SELECT COUNT('.$respuesta.')
            FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND '.$respuesta.' = 0)AS '.$alias1.',
            (SELECT COUNT('.$respuesta.')
            FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND '.$respuesta.' = 1)AS '.$alias2.',
            (SELECT COUNT('.$respuesta.')
            FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND '.$respuesta.' = 2)AS '.$alias3);
        return $this->db->get();
    }
    public function total_respuestas_por_fase($idNombre)
    {
        $this->db->select('
            (SELECT COUNT(respuesta1) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta1 = 0)AS totalt'.$idNombre.'r1o1,
            (SELECT COUNT(respuesta1) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta1 = 1)AS totalt'.$idNombre.'r1o2,
            (SELECT COUNT(respuesta1) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta1 = 2)AS totalt'.$idNombre.'r1o3,
            (SELECT COUNT(respuesta2) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta2 = 0)AS totalt'.$idNombre.'r2o1,
            (SELECT COUNT(respuesta2) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta2 = 1)AS totalt'.$idNombre.'r2o2,
            (SELECT COUNT(respuesta2) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta2 = 2)AS totalt'.$idNombre.'r2o3,
            (SELECT COUNT(respuesta3) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta3 = 0)AS totalt'.$idNombre.'r3o1,
            (SELECT COUNT(respuesta3) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta3 = 1)AS totalt'.$idNombre.'r3o2,
            (SELECT COUNT(respuesta3) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta3 = 2)AS totalt'.$idNombre.'r3o3,
            (SELECT COUNT(respuesta4) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta4 = 0)AS totalt'.$idNombre.'r4o1,
            (SELECT COUNT(respuesta4) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta4 = 1)AS totalt'.$idNombre.'r4o2,
            (SELECT COUNT(respuesta4) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta4 = 2)AS totalt'.$idNombre.'r4o3,
            (SELECT COUNT(respuesta5) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta5 = 0)AS totalt'.$idNombre.'r5o1,
            (SELECT COUNT(respuesta5) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta5 = 1)AS totalt'.$idNombre.'r5o2,
            (SELECT COUNT(respuesta5) FROM test WHERE estado = 1 
            AND idNombre = '.$idNombre.' AND respuesta5 = 2)AS totalt'.$idNombre.'r5o3
        ');
        return $this->db->get();
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
