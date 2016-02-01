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
}

}
?>