<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proceso_denuncia_model extends CI_Model {


	public function listaproceso_denuncias($iddenuncia)//select
	{
        $this->db->select('pd.idProceso,pd.idDenuncia,pd.estado,pd.fechaRegistro,pd.idUsuarioResponsable,pd.comentario');
        $this->db->from('proceso_denuncia AS pd');
        $this->db->where('pd.idDenuncia',$iddenuncia);
        return $this->db->get();
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
}