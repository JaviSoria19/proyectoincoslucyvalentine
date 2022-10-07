<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	public function validar($login,$password)
	{
        $estados = array('1', '2');
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo',$login);
        $this->db->where_in('estado', $estados);
        $this->db->where('contrasenha',$password);
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function listaUsuariosNoVerificados()//select
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.estado','1');
        $this->db->where('rol','usuario');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaUsuarios()//select
    {
        $estados = array('1', '2');
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('rol','usuario');
        $this->db->where_in('u.estado', $estados);
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listaUsuariosStaff()//select
    {
        $estados = array('1', '2');
        $roles = array('admin', 'policia', 'autoridad');
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where_in('u.estado', $estados);
        $this->db->where_in('rol', $roles);
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function listaUsuariosPoliciayAutoridad()//select
    {
        $estados = array('1', '2');
        $roles = array('policia', 'autoridad');
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where_in('u.estado', $estados);
        $this->db->where_in('rol', $roles);
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }


    public function agregarusuarios($data)//create
    {
        $this->db->insert('usuario',$data); //tabla
    }

    public function eliminarusuarios($idusuario)//delete
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->delete('usuario');
    }

    public function recuperarusuarios($idusuario)//get
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.idUsuario',$idusuario);
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarusuarios($idusuario,$data)//update
    {
        $this->db->where('idUsuario',$idusuario);
        $this->db->update('usuario',$data);
    }

    public function listausuariosdeshabilitados()//select
    {
        $this->db->select('u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento');
        $this->db->from('usuario AS u');
        $this->db->where('u.estado','0');
        $this->db->join('departamento AS d', 'u.idDepartamento = d.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function validarCI($numeroci)
    {
        $estados = array('1', '2');
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('numeroCI',$numeroci);
        $this->db->where_in('u.estado', $estados);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function total_usuarios_por_sexo()
    {
        $this->db->select('
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND sexo= "M" ) AS totalm,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND sexo= "F" ) AS totalf,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2)) AS totalu
            ');
        return $this->db->get();
    }
    public function total_usuarios_por_departamento()
    {
        $this->db->select('
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=1) AS totalBN,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=2) AS totalCH,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=3) AS totalCO,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=4) AS totalLP,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=5) AS totalOR,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=6) AS totalPD,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=7) AS totalPT,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=8) AS totalSC,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=9) AS totalTJ
            ');
        return $this->db->get();
    }
    public function filtroUsuarioNoVerificado($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento
            FROM usuario AS u
            INNER JOIN departamento AS d ON u.idDepartamento = d.idDepartamento
            WHERE u.estado = 1 AND u.rol = 'usuario' AND u.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
    public function filtroListaUsuarios($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento
            FROM usuario AS u
            INNER JOIN departamento AS d ON u.idDepartamento = d.idDepartamento
            WHERE u.estado IN ('1','2') AND rol = 'usuario' AND u.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function filtroUsuarioStaff($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            u.idUsuario,u.idDepartamento,nombres,primerApellido,segundoApellido,numeroCelular,numeroCI,sexo,foto,correo,rol,u.estado,u.fechaRegistro,u.fechaActualizacion,d.nombreDepartamento
            FROM usuario AS u
            INNER JOIN departamento AS d ON u.idDepartamento = d.idDepartamento
            WHERE u.estado IN ('1','2') AND u.rol IN ('admin','policia','autoridad') AND u.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
    public function filtro_total_usuarios_por_sexo($fecha_inicio,$fecha_fin)
    {
        $this->db->select("
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND sexo= 'M' AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalm,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND sexo= 'F' AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalf,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalu
            ");
        return $this->db->get();
    }
    public function filtro_total_usuarios_por_departamento($fecha_inicio,$fecha_fin)
    {
        $this->db->select("
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=1 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalBN,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=2 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalCH,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=3 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalCO,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=4 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalLP,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=5 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalOR,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=6 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalPD,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=7 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalPT,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=8 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalSC,
            (SELECT COUNT(idUsuario) FROM usuario WHERE estado IN (1,2) AND idDepartamento=9 AND fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS totalTJ
            ");
        return $this->db->get();
    }
}
