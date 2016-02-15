<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LOGIN_MODEL extends CI_Model{
function __construct()
{
	parent::__construct();
	$this->load->database();
}

/*function crearCurso($data)
{
	$this->db->insert('cursos',array('nombreCUrso'=>$data['nombre'],'videosCursos'=>$data['video']));
}*/

function verificaAlumno($rut)
{
	
	$sql="SELECT t001_alumno.CURSO as CURSOID,t001_alumno.NOMBRE,t002_curso.NOMBRE as CURSO FROM t001_alumno 
LEFT JOIN t002_curso ON
t001_alumno.CURSO=t002_curso.ID
where rut=?";
	$query=$this->db->query($sql,array($rut));

	if($query->num_rows()>0) return $query;
	else return false;
}

/*function obtenerCurso($id)
{
	$this->db->where('idCurso',$id);
	$query=$this->db->get('cursos');
	

	if($query->num_rows()>0) return $query;
	else return false;
}

function actualizarCurso($id,$data)
{
	$datos=array(
		'nombreCUrso'=>$data['nombre'],
		'videosCursos'=>$data['video']);
		
		$this->db->where('idCurso',$id);
		$this->db->update('cursos',$datos);
}

function eliminarCurso($id)
{
	$sql="delete from cursos where idCurso=?";
	$this->db->query($sql,array($id));
}*/



}
?>