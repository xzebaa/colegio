<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ADMIN_MODEL extends CI_Model{
function __construct()
{
	parent::__construct();
	$this->load->database();
}

/*function crearCurso($data)
{
	$this->db->insert('cursos',array('nombreCUrso'=>$data['nombre'],'videosCursos'=>$data['video']));
}*/

function obtenerTalleres()
{
	
	$sql="SELECT talleres.ID,
talleres.NOMBRE,
talleres.HORARIO
,talleres.PROFESOR
,talleres.UBICACION
,talleres.CUPOS
,talleres.INSCRITOS
,(select COUNT(*) from t004_inscrito where t004_inscrito.ESTADO=2 and t004_inscrito.TALLER=talleres.id) as ESPERA
,'' AS CURSOS
,IF((talleres.CUPOS-talleres.INSCRITOS) > 0, 'DISPONIBLE', 'COMPLETO') as ESTADO,
(talleres.CUPOS-talleres.INSCRITOS) AS DISPO FROM t003_talleres as talleres";
	
	$query=$this->db->query($sql);

	if($query->num_rows()>0) return $query;
	else return null;
}

public function get()
	{
			$sql="SELECT * FROM t001_alumno;";
	
	$query=$this->db->query($sql,array());
		if($query->num_rows()>0) return $query;
			else return null;
	}

function obtenerTalleresCursos($id)
{
	
	$sql="SELECT t002_curso.NOMBRE FROM t005_talleres_cursos
LEFT JOIN t002_curso ON t005_talleres_cursos.CURSO= t002_curso.ID
where t005_talleres_cursos.TALLER=?";
	
	$query=$this->db->query($sql,array($id));

	if($query->num_rows()>0) return $query;
	else return null;
}

function listaPorCurso($id)
{
	
	$sql="SELECT 
CONCAT(' ',t004_inscrito.RUT) as RUT,
t001_alumno.NOMBRE,
t003_talleres.NOMBRE as TALLER,
t002_curso.NOMBRE  as CURSO,
t004_inscrito.FECHA_INSC AS INSCRITO,
t006_estado_inscripcion.NOMBRE AS ESTADO
FROM t004_inscrito 
LEFT JOIN t001_alumno ON t004_inscrito.RUT=t001_alumno.RUT
LEFT JOIN t002_curso ON t002_curso.ID=t001_alumno.CURSO
LEFT JOIN t003_talleres ON t004_inscrito.TALLER=t003_talleres.ID
LEFT JOIN t006_estado_inscripcion ON t004_inscrito.ESTADO=t006_estado_inscripcion.ID
where TALLER=?";
	
	$query=$this->db->query($sql,array($id));

	if($query->num_rows()>0) return $query;
	else return null;
}

function obtenerAlumnoInscrito($id)
{
	
	$sql="SELECT 
t004_inscrito.RUT,
t001_alumno.NOMBRE,
t003_talleres.NOMBRE as TALLER,
t002_curso.NOMBRE as CURSO,
t004_inscrito.FECHA_INSC AS INSCRITO,
t006_estado_inscripcion.NOMBRE AS ESTADO
FROM t004_inscrito 
LEFT JOIN t001_alumno ON t004_inscrito.RUT=t001_alumno.RUT
LEFT JOIN t002_curso ON t002_curso.ID=t001_alumno.CURSO
LEFT JOIN t003_talleres ON t004_inscrito.TALLER=t003_talleres.ID
LEFT JOIN t006_estado_inscripcion ON t004_inscrito.ESTADO=t006_estado_inscripcion.ID
where t004_inscrito.RUT=?";
	
	$query=$this->db->query($sql,array($id));

	if($query->num_rows()>0) return $query;
	else return null;
}

function obtenernNombreTaller($id)
{
	
	$sql="SELECT 
NOMBRE AS TALLERNOMBRE
FROM t003_talleres WHERE ID=?";
	
	$query=$this->db->query($sql,array($id));

	if($query->num_rows()>0) return $query;
	else return null;
}

function obtenerAlumno($id)
{
	
	$sql="SELECT 
	t001_alumno.RUT,
	t001_alumno.NOMBRE,
	t002_curso.NOMBRE as CURSO,
	'NO INSCRITO' AS ESTADO
	FROM t001_alumno 
	LEFT JOIN t002_curso ON t002_curso.ID=t001_alumno.CURSO
	where t001_alumno.RUT=?";
	
	$query=$this->db->query($sql,array($id));

	if($query->num_rows()>0) return $query;
	else return null;
}



}
?>