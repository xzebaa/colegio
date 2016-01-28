<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios_model extends CI_Model{
function __construct()
{
	parent::__construct();
	$this->load->database();
}

/*function crearCurso($data)
{
	$this->db->insert('cursos',array('nombreCUrso'=>$data['nombre'],'videosCursos'=>$data['video']));
}*/

function obtenerTalleres($rut)
{
	
	$sql="SELECT talleres.ID,talleres.NOMBRE,talleres.HORARIO,talleres.PROFESOR,talleres.UBICACION,talleres.CUPOS,talleres.INSCRITOS FROM t003_talleres as talleres left join t005_talleres_cursos as tallCursos on talleres.ID=tallCursos.TALLER left join t001_alumno as alumnos on tallCursos.CURSO= alumnos.CURSO where alumnos.RUT=?";
	
	$query=$this->db->query($sql,array($rut));

	if($query->num_rows()>0) return $query;
	else return $sql;
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