<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Talleres_model extends CI_Model{
function __construct()
{
	parent::__construct();
	$this->load->database();
}

function verificaInscripcon($rut,$taller)
{
	
	$sql="SELECT inscripcionTaller(?,?) as resp;";
	$query=$this->db->query($sql,array($rut,$taller));

	if($query->num_rows()>0) return $query;
	else return false;
}

function inscribeTaller($datos)
{
	$sql="INSERT INTO t004_inscrito(RUT, TALLER, FECHA_INSC, ESTADO) VALUES (?,?,now(),?);";
	$this->db->query($sql,$datos);

	$sql="select rolbackInscripcion (?,?,?) as estado;";
	$respuestas=$this->db->query($sql,array($datos[0],$datos[1],$datos[2]));
	if($respuestas->num_rows()==1) return $respuestas;
	else null;
	

}

function obtenInscr($rut)
{
	$sql="SELECT 
inscrito.ID as REGISTRO,
inscrito.rut AS RUT, 
alumno.nombre AS NOMBRE, 
inscrito.fecha_insc AS FECHA
, taller.nombre AS TALLER, 
estado.nombre AS ESTADO, 
curso.NOMBRE AS CURSO 
FROM t004_inscrito as inscrito 
left join t001_alumno as alumno on inscrito.RUT=alumno.RUT 
left join t003_talleres as taller on inscrito.TALLER=taller.id 
left join t006_estado_inscripcion as estado on inscrito.ESTADO=estado.ID 
left join t002_curso as curso on alumno.CURSO=curso.id 
WHERE inscrito.RUT=?";
	
	$query=$this->db->query($sql,array($rut));

	if($query->num_rows()>0) return $query;
	else return false;
	

}

}
?>