<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Codigofacilito_model extends CI_Model{
function __construct()
{
	parent::__construct();
	$this->load->database();
}

function crearCurso($data)
{
	$this->db->insert('cursos',array('nombreCUrso'=>$data['nombre'],'videosCursos'=>$data['video']));
}

function obtenerCursos()
{
	$query=$this->db->get('cursos');
	if($query->num_rows()>0) return $query;
	else return false;
}

function obtenerCurso($id)
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
}



}
?>