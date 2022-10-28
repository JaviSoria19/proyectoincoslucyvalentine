<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Denuncia_model extends CI_Model {


	public function listadenuncias()//select
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.estado','1');
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function listadenunciasdescartadas()//select
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.estado','0');
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function agregardenuncias($data)//create
    {
        $this->db->insert('denuncia',$data); //tabla
        return $this->db->insert_id();
    }
    public function eliminardenuncias($iddenuncia)//delete
    {
        $this->db->where('idDenuncia',$iddenuncia);
        $this->db->delete('denuncia'); //tabla
    }
    public function recuperardenuncias($iddenuncia)//get
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.idDenuncia',$iddenuncia);
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function recuperardenunciasusuario($idusuario)//get
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.idUsuario',$idusuario);
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificardenuncias($iddenuncia,$data)//update
    {
        $this->db->where('idDenuncia',$iddenuncia);
        $this->db->update('denuncia',$data);
    }
    public function listadenunciasdeshabilitados()//select
    {
        $this->db->select('d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento');
        $this->db->from('denuncia AS d');
        $this->db->where('d.estado','0');
        $this->db->join('denuncia_categoria as c', 'd.idCategoria = c.idCategoria');
        $this->db->join('usuario as u', 'd.idUsuario = u.idUsuario');
        $this->db->join('departamento as dep', 'u.idDepartamento = dep.idDepartamento');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function filtroDenuncias($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento
            FROM denuncia AS d
            INNER JOIN denuncia_categoria AS c ON d.idCategoria = c.idCategoria
            INNER JOIN usuario AS u ON d.idUsuario = u.idUsuario
            INNER JOIN departamento AS dep ON u.idDepartamento = dep.idDepartamento
            WHERE d.estado = 1 AND d.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
    public function filtroDenunciasDescartadas($fecha_inicio,$fecha_fin)//select
    {
        $this->db->select("
            d.idDenuncia,d.idUsuario,d.idCategoria,d.declaracion,d.foto,d.audio,d.video,d.estado,d.fechaRegistro,d.fechaActualizacion,c.descripcionCategoria,u.idDepartamento,u.correo,u.nombres,u.primerApellido,u.segundoApellido,u.numeroCI,u.numeroCelular,u.sexo, u.estado AS estadoUsuario,dep.nombreDepartamento
            FROM denuncia AS d
            INNER JOIN denuncia_categoria AS c ON d.idCategoria = c.idCategoria
            INNER JOIN usuario AS u ON d.idUsuario = u.idUsuario
            INNER JOIN departamento AS dep ON u.idDepartamento = dep.idDepartamento
            WHERE d.estado = 0 AND d.fechaRegistro
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59'
            ");
        return $this->db->get();
    }
    public function total_denuncia_por_categoria()
    {
        $this->db->select("
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=1 AND estado = 1) AS v1,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=2 AND estado = 1) AS v2,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=3 AND estado = 1) AS v3,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=4 AND estado = 1) AS v4,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=5 AND estado = 1) AS v5,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=6 AND estado = 1) AS v6
            ");
        return $this->db->get();
    }
    public function filtro_total_denuncia_por_categoria($fecha_inicio,$fecha_fin)
    {
        $this->db->select("
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=1  AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v1,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=2 AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v2,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=3 AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v3,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=4 AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v4,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=5 AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v5,
            (SELECT COUNT(idDenuncia) FROM denuncia WHERE idCategoria=6 AND estado = 1 AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS v6
            ");
        return $this->db->get();
    }
    public function total_denuncia_por_proceso_denuncia()
    {
        $this->db->select("
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia descartada') AS d0,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia enviada') AS d1,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia recibida') AS d2,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Citada a brindar declaración') AS d3,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia en seguimiento') AS d4,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia finalizada') AS d5
        ");
        return $this->db->get();
    }
    public function filtro_total_denuncia_por_proceso_denuncia($fecha_inicio,$fecha_fin)
    {
        $this->db->select("
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia descartada' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d0,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia enviada' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d1,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia recibida' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d2,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Citada a brindar declaración' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d3,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia en seguimiento' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d4,
            (SELECT COUNT(estado) FROM proceso_denuncia WHERE estado = 'Denuncia finalizada' AND fechaRegistro 
            BETWEEN '".$fecha_inicio."' AND '".$fecha_fin." 23:59:59') AS d5
        ");
        return $this->db->get();
    }
    public function listadenunciasAsignadas($nombres,$primerApellido)//select
    {
        $this->db->select("
            D.idDenuncia,
            DEP.nombreDepartamento,DC.descripcionCategoria,
            U.nombres,U.primerApellido,U.segundoApellido,U.numeroCI,U.numeroCelular,U.sexo,
            (SELECT idUsuarioResponsable FROM proceso_denuncia WHERE idDenuncia = D.idDenuncia ORDER BY idProceso DESC LIMIT 1) AS responsable,
            D.idUsuario,D.fechaRegistro,D.foto
            FROM usuario U
            INNER JOIN denuncia D ON U.idUsuario=D.idUsuario
            INNER JOIN denuncia_categoria DC ON DC.idCategoria=D.idcategoria
            INNER JOIN departamento DEP ON U.idDepartamento=DEP.idDepartamento
            WHERE (SELECT idUsuarioResponsable FROM proceso_denuncia WHERE idDenuncia = D.idDenuncia ORDER BY idProceso DESC LIMIT 1) = '".$nombres." ".$primerApellido."'
            ORDER BY D.fechaRegistro DESC
            ");
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
