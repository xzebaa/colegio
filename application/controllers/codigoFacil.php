<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodigoFacil extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('mihelper');
		$this->load->helper('form');
		$this->load->model('codigofacilito_model');

	}


	public function index()
	{
		$this->load->library('Menu',array('Inicio','contacto','Curso'));
		$data['mi_menu']=$this->menu->contruirMenu();
		$this->load->view('codigoFacil/bienvenido',$data);
	}

	public function holaMundo()
	{
		$dato['string']="bienenido";
		$this->load->view('codigoFacil/headers');
		$this->load->view('codigoFacil/bienvenido',$dato);
	}

	public function nuevo()
	{
		$dato['string']="bienenido";
		$this->load->view('codigoFacil/headers');
		$this->load->view('codigoFacil/formulario');
	}

	function recibirdatos()
	{
		$data =array(
			'nombre'=>$this->input->post('nombre'),
			'video'=>$this->input->post('videos')
			);
		$this->codigofacilito_model->crearCurso($data);

		$this->load->view('codigoFacil/headers');
		$this->load->view('codigoFacil/bienvenido');
	}

	function sendMail()
	{
		$this->load->library("email");
		$this->email->from("ejemplo@codigo.com","sebatian alv");
		$this->email->to("salvarez@imagemaker.cl");
		$this->email->subject("proando codeig");
		$this->email->message("probando....probando");
		if($this->email->send())
		{
			echo "enviado";
		}else{
			echo "noenviado";
		}

	}
}

