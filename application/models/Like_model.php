<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Like_model extends CI_Model {

	public function totalLikesPublicacion($idpublicacion)//select
    {
        $this->db->select('COUNT(idMeGusta) AS totalLikes'); //select *
        $this->db->from('me_gusta');
        $this->db->where('idPublicacion',$idpublicacion);
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregarLike($data)//create
    {
        $this->db->insert('me_gusta',$data); //tabla
    }
}
