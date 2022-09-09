<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {

    public function agregarpersonas($data)//create
    {
        $this->db->insert('persona',$data);
        return $this->db->insert_id();
    }
    
    public function recuperarpersonas($idpersona)//get
    {
        $this->db->select('persona.idPersona,persona.idSucursal,persona.idPersona,sexo,persona.estado,persona.fechaRegistro,persona.fechaActualizacion,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,nombreSucursal,direccion');
        $this->db->from('persona');
        $this->db->where('idPersona',$idpersona);
        $this->db->join('sucursal', 'persona.idSucursal = sucursal.idSucursal');
        $this->db->join('persona', 'persona.idPersona = persona.idPersona');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarpersonas($idpersona,$data)//update
    {
        $this->db->where('idPersona',$idpersona);
        $this->db->update('persona',$data);
    }
}
