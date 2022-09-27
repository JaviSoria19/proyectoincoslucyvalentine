<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proceso_proceso_denuncia_model extends CI_Model {


	public function listaproceso_denuncias($iddenuncia)//select
	{
        $this->db->select('pd.idProceso,pd.idDenuncia,pd.estado,pd.fechaRegistro,pd.idUsuarioResponsable,pd.comentario');
        $this->db->from('proceso_denuncia AS pd');
        $this->db->where('pd.estado','1');
        $this->db->where('pd.idDenuncia',$iddenuncia);
        return $this->db->get(); //devolucion del resultado de la consulta
	}
    public function agregarproceso_denuncia($data)//create
    {
        $this->db->insert('proceso_denuncia',$data); //tabla
    }
    public function eliminarproceso_denuncia($idproceso)//delete
    {
        $this->db->where('idProceso_proceso_denuncia',$idproceso_denuncia);
        $this->db->delete('proceso_denuncia'); //tabla
    }
    public function recuperarproceso_denuncia($idproceso)//get
    {
        $this->db->select('pd.idDenuncia,pd.estado,pd.fechaRegistro');
        $this->db->from('proceso_denuncia AS d');
        $this->db->where('d.idProceso_proceso_denuncia',$idproceso_denuncia);
        $this->db->join('proceso_denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
